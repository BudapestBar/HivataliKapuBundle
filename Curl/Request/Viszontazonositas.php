<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\TrKodEllenorzesResponse;
use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;


class Viszontazonositas extends BaseRequest
{

	public function process()
	{

		return $this->xpath->query("//reg:Azonositott")->item(0)->nodeValue;

	}

}