<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Resque\Job;

use ResqueBundle\ContainerAwareJob;

use BudapestBar\Bundle\Iroda\BeszamoloBundle\Resque\Job\ImportBeszamoloJob;
use \BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Nyomtatvany;

class DecryptJob extends ContainerAwareJob
{

	public function __construct()
    {
        $this->queue = 'hivatalikapu_file_decrypt';
    }

    public function run($args)
    {

    	$id   = $args['id'];

    	if (!isset($id)) {

    		throw new \Exception("missing parameters", 1);
    		
    	}


        $resque     = $this->getContainer()->get('bcc_resque.resque');
        $em         = $this->getContainer()->get('doctrine')->getManager("hivatali_kapu");

        $dokumentum = $em->getRepository('BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Dokumentum')->findOneBy(array('erkeztetesiSzam' => $id));


        $file = $this->getContainer()->getParameter('hivatali_kapu.resources_path')."/Encrypted/{$id}.kr";

        $path = $this->getContainer()->getParameter('hivatali_kapu.resources_path')."/Forms/{$dokumentum->getNyomtatvanyAzonosito()}/{$id}";

    	if (!file_exists($file)) {

    		throw new \Exception("Nincs ilyen kr file: {$id}", 1);

    	}

    	if (!file_exists($path)) {

    		if (!mkdir($path, 0777, true)) {

    			throw new \Exception("Nem lehet celkonyvtarat letrehozni", 1);

    		}

    	}


    	$jar  = $this->getContainer()->getParameter('hivatali_kapu.jar_path');
    	$key  = $this->getContainer()->getParameter('hivatali_kapu.privatekey_path');
    	$pass = $this->getContainer()->getParameter('hivatali_kapu.privatekey_password');

    	// add type to dest path 
    	// makedir if not exists
 
        exec("java -jar {$jar} {$file} {$path} {$key} {$pass}", $output, $status);

        list($nyomtatvany, $csatolmanyok) = $this->scan($path);

        $dokumentum->getNyomtatvany()->setDecrypted($nyomtatvany);
        $dokumentum->getNyomtatvany()->setStatus(Nyomtatvany::STATUS_DECRYPTED);

        if (!empty($csatolmanyok)) {

            $dokumentum->getNyomtatvany()->setAttachments($csatolmanyok);

        }

        $em->persist($dokumentum->getNyomtatvany());
        $em->flush();


        // create your job
        $job = new ImportBeszamoloJob();
        $job->args = array(

            'id'        => $dokumentum->getErkeztetesiSzam()
        
        );

        // enqueue your job
        $resque->enqueue($job);

    
    }

    private function scan($path) {

        $nyomtatvany    = "";
        $csatolmanyok   = array();

        $scanned = array_diff(scandir($path), array('..', '.'));

        foreach ($scanned as $element) {

            if (is_dir($path.'/'.$element)) {

                $scanned2 = array_diff(scandir($path.'/'.$element), array('..', '.'));

                foreach ($scanned2 as $element2) {

                    $csatolmanyok[$element2] = utf8_encode(file_get_contents($path.'/'.$element.'/'.$element2));

                }

            }
            else {

                $nyomtatvany = file_get_contents($path.'/'.$element);

            }

        }

        return array($nyomtatvany, $csatolmanyok);

    }


}