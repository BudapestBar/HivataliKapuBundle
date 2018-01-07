<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\TrKodEllenorzesResponse;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;


class Viszontazonositas extends BaseRequest
{

	public function process()
	{

		return $this->xpath->query("//reg:Azonositott")->item(0)->nodeValue;

	}

}