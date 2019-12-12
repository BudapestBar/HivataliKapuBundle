<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Client;
use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\TrKodEllenorzesResponse;
use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;


class TrKodEllenorzes extends BaseRequest
{


	public function __construct(Client $client, $felhasznalo, $username, $password) {

        $this->document         = new \DOMDocument();
		$this->client 	        = $client;
        $this->felhasznalo      = $felhasznalo;
        $this->username         = $username;
        $this->password         = $password;

        $this->uploadFiles      = [];
        $this->downloadFiles    = [];

	}

	public function process()
	{

		$response 			= new TrKodEllenorzesResponse();
		
		$nevNode   			= $this->xpath->query("//iop:Property[@Name='Nev']")->item(0);
		$emailNode   		= $this->xpath->query("//iop:Property[@Name='Email']")->item(0);
		$minositesNode   	= $this->xpath->query("//iop:Property[@Name='Minosites']")->item(0);
		$kapcsolatiKodNode  = $this->xpath->query("//iop:Property[@Name='KapcsolatiKod']")->item(0);

		$response->setNev($nevNode->getAttribute('Value'));
		$response->setKapcsolatiKod($kapcsolatiKodNode->getAttribute('Value'));
		$response->setEmail($emailNode->getAttribute('Value'));
		$response->setMinosites($minositesNode->getAttribute('Value'));

		return $response;

	}

}