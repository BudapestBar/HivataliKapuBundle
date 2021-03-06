<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response\DokumentumResponse;
use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Request as BaseRequest;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\XmlParser;

class DokumentumokLekerdezeseGepiInterfeszAltal2 extends BaseRequest
{

	public function process()
	{

		$response 		= [];
		$dokumentumok 	= $this->xpath->query("//hkp:DokumentumAdatok");

        if ($dokumentumok->length == 0) {

            throw new \Exception("Megadott adatokkal hivatal nem található", 1);

        }

		foreach ($dokumentumok as $row) {

			$dokumentum 		= new DokumentumResponse();

			$dokumentum->setErkeztetesiSzam($row->getElementsByTagName('ErkeztetesiSzam')->item(0)->nodeValue);
			$dokumentum->setHivatkozasiSzam($row->getElementsByTagName('HivatkozasiSzam')->item(0)->nodeValue);
			$dokumentum->setErvenyessegiDatum($row->getElementsByTagName('ErvenyessegiDatum')->item(0)->nodeValue);
			$dokumentum->setErkeztetesiDatum($row->getElementsByTagName('ErkeztetesiDatum')->item(0)->nodeValue);
			$dokumentum->setMegjegyzes($row->getElementsByTagName('Megjegyzes')->item(0)->nodeValue);
			$dokumentum->setIdopecset($row->getElementsByTagName('Idopecset')->item(0)->nodeValue);
			$dokumentum->setFileNev($row->getElementsByTagName('FileNev')->item(0)->nodeValue);
			$dokumentum->setDokTipusHivatal($row->getElementsByTagName('DokTipusHivatal')->item(0)->nodeValue);
			$dokumentum->setDokTipusAzonosito($row->getElementsByTagName('DokTipusAzonosito')->item(0)->nodeValue);
			$dokumentum->setDokTipusLeiras($row->getElementsByTagName('DokTipusLeiras')->item(0)->nodeValue);

			$response[] 	= $dokumentum;


			
		}

		return $response;

	}

}