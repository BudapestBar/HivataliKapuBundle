<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl;

class SikeresDokumentumokOlvasas extends Request
{

	protected $service 	= "SikeresDokumentumokOlvasas";
	protected $module	= "HivataliModule";
	protected $system	= "HKP";

	/*

	Kerdes: 

	
	<hkp:OlvasasVisszaigazolas xmlns:hkp="http://iop.gov.hu/2008/10/hkp">
		<hkp:VisszaigazolasAdatok> 
			<hkp:ErkeztetesiSzam>123456789200812041419024287</hkp:ErkeztetesiSzam>
			<hkp:Sikeres>true</hkp:Sikeres>
		</hkp:VisszaigazolasAdatok>
		<hkp:VisszaigazolasAdatok> 
			<hkp:ErkeztetesiSzam>123456789200812041419024288</hkp:ErkeztetesiSzam>
			<hkp:Sikeres>true</hkp:Sikeres>
		</hkp:VisszaigazolasAdatok>
	</hkp:OlvasasVisszaigazolas>

	----

	Valasz: 

	Hiba / sikeres

	<?xml version='1.0' encoding='utf-8'?>
	<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
		<soapenv:Header>
			<kri:sessionID xmlns:kri="http://www.iop.hu/2004/kri">KRI-1-1242996737985-24608</kri:sessionID>
		</soapenv:Header>
		<soapenv:Body>
			<iop:Valasz xmlns:iop="http://www.iop.hu/2004">
				<iop:ValaszFejlec>
					<iop:Felhasznalo>TESZT</iop:Felhasznalo>
					<iop:UzenetIdopont>2008-01-27T13:43:36Z</iop:UzenetIdopont>
				</iop:ValaszFejlec>
				<iop:Session />
				<iop:Form>
					<ns12:OlvasasVisszaigazolasokValasz xmlns:ns12="http://iop.gov.hu/2008/10/hkp">
						<ns12:VisszaIgazolasValasz>
							<ns12:Uzenet>
								<ns12:Szam>0</ns12:Szam>
								<ns12:Szoveg>Sikeres</ns12:Szoveg>
							</ns12:Uzenet>
						</ns12:VisszaIgazolasValasz>
						<ns12:VisszaIgazolasValasz>
							<ns12:Hiba>
								<ns12:HibaLeiras>
									<ns12:HibaKod>0</ns12:HibaKod>
									<ns12:HibaSzoveg>Sikeres</ns12:HibaSzoveg>
								<ns12:HibaLeiras>
							</ns12:Hiba>
						</ns12:VisszaIgazolasValasz>
					</ns12:OlvasasVisszaigazolasokValasz>
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

	protected function setSoapForm() {

		$formNode = $this->xpath()->query("//iop:Form")->item(0);

		if (($dokumentumokNode = $this->getChildNode($formNode, 'hkp:OlvasasVisszaigazolas')) !== false) {

			return $dokumentumokNode;

		}

		$dokumentumokNode	= $this->document->createElement("hkp:OlvasasVisszaigazolas");

		$formNode->appendChild($dokumentumokNode);

		return $dokumentumokNode;
		
	}

	public function setConfirmation($id, $status = true) {


		$postafiokNode = $this->setSoapForm();

		$queryNode = $this->document->createElement("hkp:VisszaigazolasAdatok");

		$idNode 	= $this->document->createElement("hkp:ErkeztetesiSzam", $id);
		$statusNode = $this->document->createElement("hkp:Sikeres", $status ? 'true' : 'false');

		$queryNode->appendChild($idNode);
		$queryNode->appendChild($statusNode);


		$postafiokNode->appendChild($queryNode);


	}

	public function parseResponse() {

		if ($this->xpath($this->response)->query("//ns12:OlvasasVisszaigazolasokValasz")->length == 0) {

			throw new \Exception("Error Processing Xml", 1);
			
		}

		 
	}


}