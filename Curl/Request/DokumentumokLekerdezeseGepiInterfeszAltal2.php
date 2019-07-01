<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\TrKodEllenorzesResponse;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\XmlParser;

class DokumentumokLekerdezeseGepiInterfeszAltal2 extends BaseRequest
{

	public function process()
	{

		$valasz = $this->xpath->query("//hkp:DokumentumAdatokLetoltesValasz")->item(0);

		$data = XmlParser::toArray($valasz);

		return $data;

	}

}