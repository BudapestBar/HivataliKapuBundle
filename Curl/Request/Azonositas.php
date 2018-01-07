<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\AzonositasResponse;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;

class Azonositas extends BaseRequest
{

	public function process()
	{
		
		$response 			= [];
		$azonositottak 		= $this->xpath->query("//hkp:Azonositott");

		

        if (!count($azonositottak)) {

            throw new \Exception("Ugyfelkapu nem talalhato", 1);

        }

		foreach ($azonositottak as $azonositott) {

			$ugyfelkapu 		= new AzonositasResponse();

			$ugyfelkapu->setNev($azonositott->getElementsByTagName('Nev')->item(0)->nodeValue);
			$ugyfelkapu->setEmail($azonositott->getElementsByTagName('Email')->item(0)->nodeValue);
			$ugyfelkapu->setKapcsolatiKod($azonositott->getElementsByTagName('KapcsolatiKod')->item(0)->nodeValue);

			$response[] 		= $ugyfelkapu;
			
		}

		return $response;

		$valasz = $this->xpath->query("//hkp:AzonositasValasz")->item(0);

		$data = XmlParser::toArray($valasz);

		return $data;

	}

}