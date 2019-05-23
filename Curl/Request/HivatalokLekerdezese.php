<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\HivatalResponse;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;

class HivatalokLekerdezese extends BaseRequest
{

	public function process()
	{
		
		$response 			= [];
		$azonositottak 		= $this->xpath->query("//hkp:GIHivatalokLekerdezeseValasz");

		

        if (!count($azonositottak)) {

            throw new \Exception("Ugyfelkapu nem talalhato", 1);

        }

		foreach ($azonositottak as $azonositott) {

			$ugyfelkapu 		= new HivatalResponse();

			$ugyfelkapu->setNev($azonositott->getElementsByTagName('Nev')->item(0)->nodeValue);
			$ugyfelkapu->setRovidNev($azonositott->getElementsByTagName('RovidNev')->item(0)->nodeValue);
			$ugyfelkapu->setKrid($azonositott->getElementsByTagName('KRID')->item(0)->nodeValue);

			$response[] 		= $ugyfelkapu;
			
		}

		return $response;

	}

}