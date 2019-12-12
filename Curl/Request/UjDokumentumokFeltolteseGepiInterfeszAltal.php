<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\TrKodEllenorzesResponse;
use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\XmlParser;

class UjDokumentumokFeltolteseGepiInterfeszAltal extends BaseRequest
{

	public function process()
	{

		$valasz = $this->xpath->query("//hkp:DokumentumTarolasValasz ")->item(0);

		$data = XmlParser::toArray($valasz);

		return $data;

	}

}