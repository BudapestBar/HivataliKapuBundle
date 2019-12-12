<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message as BaseMessage;

/**
* 
*/
final class DokumentumokAllapota2 extends BaseMessage
{

	const HIVTALIKAPU 	= 1;
	const CEGKAPU 		= 2;
	const PERKAPU 		= 7;

	protected $service 	= "DokumentumokAllapota2";
	protected $module	= "HivataliModule";
	protected $system 	= "HKP";

	/*

	<soap:Envelope xsi:schemaLocation="http://schemas.xmlsoap.org/soap/envelope/ http://schemas.xmlsoap.org/soap/envelope/" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <soap:Header>
      <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
         <wsse:UsernameToken>
            <wsse:Username>TESZT</wsse:Username>
            <wsse:Password>pass</wsse:Password>
         </wsse:UsernameToken>
      </wsse:Security>
   </soap:Header>
   <soap:Body>
      <iop:Kerdes xmlns:iop="http://www.iop.hu/2004">
         <iop:KerdesFejlec>
            <iop:Felhasznalo>TESZT</iop:Felhasznalo>
            <iop:UzenetIdopont>2016-03-20T12:59:09</iop:UzenetIdopont>
         </iop:KerdesFejlec>
         <iop:Session/>
         <iop:Parancs>
            <iop:Rendszer>HKP</iop:Rendszer>
            <iop:Szolgaltatas Module="HivataliModule">DokumentumokAllapota2</iop:Szolgaltatas>
            <iop:Cimke/>
         </iop:Parancs>
         <iop:Form xmlns:hkp="http://iop.gov.hu/2008/10/hkp">
            <hkp:DokumentumAllapotKerdes>
               <hkp:ErkeztetesiSzamAlapjan>
                  <hkp:ErkeztetesiSzam>504018398201603211518489678</hkp:ErkeztetesiSzam>
                  <hkp:Tarhely>0</hkp:Tarhely>
               </hkp:ErkeztetesiSzamAlapjan>
            </hkp:DokumentumAllapotKerdes>
         </iop:Form>
      </iop:Kerdes>
   </soap:Body>
</soap:Envelope>




// ------------

<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
   <soapenv:Header>
      <kri:sessionID xmlns:kri="http://www.iop.hu/2004/kri">KRI-1-1458740379480-4</kri:sessionID>
   </soapenv:Header>
   <soapenv:Body>
      <iop:Valasz xmlns:iop="http://www.iop.hu/2004">
         <iop:ValaszFejlec>
            <iop:Felhasznalo>TESZTV3</iop:Felhasznalo>
            <iop:UzenetIdopont>2016-03-23T13:52:50Z</iop:UzenetIdopont>
         </iop:ValaszFejlec>
         <iop:Session/>
         <iop:Form>
            <ns12:DokumentumAllapotValasz xmlns:ns12="http://iop.gov.hu/2008/10/hkp">
               <ns12:DokumentumAdatok href="" xsi:type="ns12:DokumentumAllapotTipus" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
                  <ns12:Felado>
                     <ns12:AllampolgarFelado>
                        <ns12:KapcsolatiKod>c2a813ee31ac2a4db6ca030089bb8625</ns12:KapcsolatiKod>
                        <ns12:Nev>TESZT3 ELEK</ns12:Nev>
                        <ns12:Email>t.zs@nisz.hu</ns12:Email>
                     </ns12:AllampolgarFelado>
                  </ns12:Felado>
						<ns12:FeladoUgyintezo>
							<ns12:KapcsolatiKod>zuz=jjkjgGGhh665=</ns12:KapcsolatiKod>
							<ns12:Nev>TESZT3 ELEK</ns12:Nev>
							<ns12:Email>t.zs@nisz.hu</ns12:Email>
						</ns12:FeladoUgyintezo>
						<ns12:CimzettUgyintezok>
							<ns12:CimzettUgyintezo>
								<ns12:KapcsolatiKod>quz=jjkjgGGhh665=</ns12:KapcsolatiKod>
								<ns12:Nev>TESZT4 ELEK</ns12:Nev>
								<ns12:Email>t4.zs@nisz.hu</ns12:Email>
							</ns12:CimzettUgyintezo>
							<ns12:CimzettUgyintezo>
								<ns12:KapcsolatiKod>wuz=jjkjgGGhh664=</ns12:KapcsolatiKod>
								<ns12:Nev>TESZT5 ELEK</ns12:Nev>
								<ns12:Email>t5.zs@nisz.hu</ns12:Email>
							</hkp:CimzettUgyintezo>
						</hkp:CimzettUgyintezok>
                  <ns12:ErkeztetesiSzam>504018398201603211518489678</ns12:ErkeztetesiSzam>
                  <ns12:DokTipusHivatal>TESZTV3</ns12:DokTipusHivatal>
                  <ns12:DokTipusAzonosito>06Teszt</ns12:DokTipusAzonosito>
                  <ns12:DokTipusLeiras>06Teszt</ns12:DokTipusLeiras>
                  <ns12:Megjegyzes/>
                  <ns12:FileNev>teszt.kr</ns12:FileNev>
                  <ns12:ErvenyessegiDatum>2016-04-20T15:18:55+0200</ns12:ErvenyessegiDatum>
                  <ns12:ErkeztetesiDatum>2016-03-21T14:18:55.000Z</ns12:ErkeztetesiDatum>
                  <ns12:Kezbesitettseg>0</ns12:Kezbesitettseg>
	               <ns12:Idopecset>…</ns12:Idopecset>
                  <ns12:ValaszTitkositas>false</ns12:ValaszTitkositas>
                  <ns12:ValaszUtvonal>1</ns12:ValaszUtvonal>
                  <ns12:Rendszeruzenet>false</ns12:Rendszeruzenet>
                  <ns12:Tarterulet>0</ns12:Tarterulet>
                  <ns12:Olvasottsag>0</ns12:Olvasottsag>
               </ns12:DokumentumAdatok>
            </ns12:DokumentumAllapotValasz>
         </iop:Form>
      </iop:Valasz>
   </soapenv:Body>
</soapenv:Envelope>




	*/

	public function __construct() {

		parent::__construct();

		$this->setSoapSzolgaltatas($this->module, $this->service);
		$this->setSoapRendszer($this->system);

	}


	public function setSoapData($data) {

		$formNode 		= $this->parser->query("//iop:Form")->item(0);

		$kerdesNode 	= $this->document->createElement("hkp:DokumentumAllapotKerdes");

		$subNode 		= $this->document->createElement("hkp:ErkeztetesiSzamAlapjan");

		if(!isset($data['ErkeztetesiSzam'])) {

			throw new \Exception("Érkeztetési számot kötelező megadni", 1);
			

		}
      
      $dataNodes     = array();

		$dataNodes[] = $this->document->createElement("hkp:ErkeztetesiSzam", $data['ErkeztetesiSzam']);
		
		if(!isset($data['Tarhely'])) {

			$data['Tarhely'] = 0;

		}

		$dataNodes[] = $this->document->createElement("hkp:Tarhely", $data['Tarhely']);

		


		foreach ($dataNodes as $dataNode) {
			
			$subNode->appendChild($dataNode);
		
		}

		$kerdesNode->appendChild($subNode);
		$formNode->appendChild($kerdesNode);

	}

}