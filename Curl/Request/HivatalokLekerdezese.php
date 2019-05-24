<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\HivatalResponse;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;

class HivatalokLekerdezese extends BaseRequest
{

	public function process()
	{
		
		$response 		= [];
		$data 			= $this->xpath->query("//hkp:GIHivatalokLekerdezeseValasz");

        if ($data->length == 0) {

            throw new \Exception("Megadott adatokkal hivatal nem található", 1);

        }

		foreach ($data as $row) {

			$hivatal 		= new HivatalResponse();

			$hivatal->setNev($row->getElementsByTagName('Nev')->item(0)->nodeValue);
			$hivatal->setRovidNev($row->getElementsByTagName('RovidNev')->item(0)->nodeValue);
			$hivatal->setKrid($row->getElementsByTagName('KRID')->item(0)->nodeValue);

			$response[] 	= $hivatal;


			
		}

		return $response;

	}

}