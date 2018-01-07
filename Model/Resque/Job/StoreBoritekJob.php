<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Resque\Job;

use BCC\ResqueBundle\ContainerAwareJob;
use \BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Dokumentum;
use \BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Nyomtatvany;

class StoreBoritekJob extends ContainerAwareJob
{

	public function __construct()
    {
        $this->queue = 'hivatalikapu_file_process';
    }


    public function run($args)
    {

    	$id      = $args['id'];

        $resque    = $this->getContainer()->get('bcc_resque.resque');
        $service   = $this->getContainer()->get('hivatali_kapu.olvasas_visszaigazolas');

        $em        = $this->getContainer()->get('doctrine')->getManager("hivatali_kapu");

        if (!isset($id)) {

            throw new \Exception("missing parameters", 1);
            
        }

    	$dokumentum = $em->getRepository('BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Dokumentum')->findOneBy(array('erkeztetesiSzam' => $id));

    	if (!$dokumentum) {

    		throw new \Exception(sprintf("Nem létezik az adatbázisban a jobhoz tartozó %s érkeztetési szám", $id), 1);
    		
    	}

    	$path = $this->getContainer()->getParameter('hivatali_kapu.resources_path').'/Encrypted/';

        $filename   = $path.$id.".kr";

        $encrypted  = utf8_decode($dokumentum->getNyomtatvany()->getEncrypted());

    	file_put_contents($filename, $encrypted);

        $service->setConfirmation($id, true);

        if (!$service->execute()) {

            // hkp hiba, valoszinuleg dobunk egy exceptiont, vagy elnyeljük.

            throw new ApiException($service->getErrorMessage(), $service->getErrorCode());

        }

        $doc        = new \DOMDocument();

        $doc->loadXML($encrypted);

        $xpath      = new \DOMXpath($doc);

        $xpath->registerNamespace('abev', "http://iop.gov.hu/2006/01/boritek");
        $xpath->registerNamespace('ds', "http://www.w3.org/2000/09/xmldsig");
        $xpath->registerNamespace('', "http://www.w3.org/2001/04/xmlenc");

        if ($xpath->query("//abev:FileNev")->length != 0) {

            $fileNev = $xpath->query("//abev:FileNev")->item(0)->nodeValue;

            $dokumentum->getNyomtatvany()->setFileNev($fileNev);

        }

        $dokumentum->getNyomtatvany()->setIsConfirmed(true);
        $dokumentum->getNyomtatvany()->setStatus(Nyomtatvany::STATUS_STORED);

        $em->persist($dokumentum->getNyomtatvany());
        $em->flush();


        // create your job
        $job = new DecryptJob();
        $job->args = array(
            'id'        => $id
        );

        // enqueue your job
        $resque->enqueue($job);


    }
}