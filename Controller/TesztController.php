<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use \BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\XmlParser;

class TesztController extends Controller
{
    /**
     * @Route("/parse")
     * @Template("BudapestBarHivataliKapuBundle:Api:postafiok.html.twig")
     */
    public function tesztAction()
    {
        

    	$file = $this->container->getParameter("kernel.root_dir").'/../var/xml/teszt.xml';
    	
    	$data = file_get_contents($file);

    	$response 		= null;
        $attachments 	= array();

		$line = strstr($data,"\n",true);

        if(strpos($line, '--') === 0) {
            
            $boundary = rtrim($line);

        }

        if (isset($boundary)) {

            $parts = explode($boundary, $data);

            array_shift($parts); # delete up to the first boundary
            array_pop($parts); # delete after the last boundary

            $binaries = array();

            foreach($parts as $part) {

                list($header, $binary) = preg_split("/\R\R/m", $part, 2);

                if (stripos($header, "Content-Disposition") !== false) {

                    preg_match("/Content-ID: <(\d*)>/m", $header, $filename);

                    $filename = $filename[1];

                    $attachments[$filename] = utf8_encode($binary);

                }
                else {

                    $response = $binary;

                }
            
            }    


        }
        else {

        	$response = $data;

        }

        //print ($response);

        foreach ($attachments as $key => $block) {

        	print $block;

        }

        return array();

    }

}