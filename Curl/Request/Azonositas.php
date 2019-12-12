<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\AzonositasResponse;
use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;

class Azonositas extends BaseRequest
{

	public function process()
	{
		
		$response 			= [];
		$azonositottak 		= $this->xpath->query("//hkp:AzonositasValasz")->item(0);

		

        if (!count($azonositottak->childNodes)) {

            throw new \Exception("Megadott adatokkal azonosított nem található", 1);

        }

		foreach ($azonositottak as $azonositott) {

			$ugyfelkapu 		= new AzonositasResponse();

			$ugyfelkapu->setNev($azonositott->getElementsByTagName('Nev')->item(0)->nodeValue);
			$ugyfelkapu->setEmail($azonositott->getElementsByTagName('Email')->item(0)->nodeValue);
			$ugyfelkapu->setKapcsolatiKod($azonositott->getElementsByTagName('KapcsolatiKod')->item(0)->nodeValue);

			$response[] 		= $ugyfelkapu;
			
		}

		return $response;

	}

}