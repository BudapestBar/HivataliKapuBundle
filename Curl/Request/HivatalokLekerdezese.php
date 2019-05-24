<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\HivatalResponse;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;

class HivatalokLekerdezese extends BaseRequest
{

	public function process()
	{
		
		$response 		= [];
		$hivatalok 		= $this->xpath->query("//hkp:GIHivatalokLekerdezeseValasz")->item(0) ;

        if (!count($hivatalok)) {

            throw new \Exception("Megadott adatokkal hivatal nem található", 1);

        }

		foreach ($azonositottak as $azonositott) {

			$hivatal 		= new HivatalResponse();

			$hivatal->setNev($azonositott->getElementsByTagName('Nev')->item(0)->nodeValue);
			$hivatal->setRovidNev($azonositott->getElementsByTagName('RovidNev')->item(0)->nodeValue);
			$hivatal->setKrid($azonositott->getElementsByTagName('KRID')->item(0)->nodeValue);

			$response[] 	= $hivatal;
			
		}

		return $response;

	}

}