<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message as BaseMessage;

/**
* 
*/
final class HivatalokLekerdezese extends BaseMessage
{

	const HIVTALIKAPU 	= 1;
	const CEGKAPU 		= 2;
	const PERKAPU 		= 7;

	protected $service 	= "HivatalokLekerdezese";
	protected $module	= "Workflow";
	protected $system 	= "HKP";

	/*

	<?xml version="1.0" encoding="UTF-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://schemas.xmlsoap.org/soap/envelope/
http://schemas.xmlsoap.org/soap/envelope/">
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
				<iop:Felhasznalo> TESZT </iop:Felhasznalo>
				<iop:UzenetIdopont>2009-05-14T07:46:34Z</iop:UzenetIdopont>
			</iop:KerdesFejlec>
			<iop:Session>
         </iop:Session>
			<iop:Parancs>
				<iop:Rendszer>HKP</iop:Rendszer>
				<iop:Szolgaltatas Module="Workflow">HivatalokLekerdezese</iop:Szolgaltatas>
				<iop:Cimke/>
			</iop:Parancs>
			<iop:Form>
				<hkp:GIHivatalokLekerdezeseKerdes xmlns:hkp="http://iop.gov.hu/2008/10/hkp">
					<hkp:RovidNevSzures>APEH</hkp:RovidNevSzures>
					<hkp:NevSzures>ADO</hkp:NevSzures>
				</hkp:GIHivatalokLekerdezeseKerdes>
			</iop:Form>
		</iop:Kerdes>
	</soap:Body>
</soap:Envelope>



// ------------

<?xml version="1.0" encoding="UTF-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://schemas.xmlsoap.org/soap/envelope/
http://schemas.xmlsoap.org/soap/envelope/">
	<soap:Header>
		<kri:sessionID xmlns:kri="http://www.iop.hu/2004/kri">KRI-1-1243258747716-1435</kri:sessionID>
	</soap:Header>
	<soap:Body>
		<iop:Valasz xmlns:iop="http://www.iop.hu/2004">
			<iop:ValaszFejlec>
				<iop:Felhasznalo>TESZT </iop:Felhasznalo>
				<iop:UzenetIdopont>2009-05-26T12:04:15Z</iop:UzenetIdopont>
			</iop:ValaszFejlec>
			<iop:Form>
				<hkp:GIHivatalokLekerdezeseValasz xmlns:hkp="http://iop.gov.hu/2008/10/hkp">
					<hkp:RovidNev>APEH</hkp:RovidNev>
					<hkp:Nev>ADOHIVATAL</hkp:Nev>
					<hkp:MAKKod>342342389 </hkp:MAKKod>
					<hkp:KRID>123</hkp:KRID>
				</hkp:GIHivatalokLekerdezeseValasz>
			</iop:Form>
		</iop:Valasz>
	</soap:Body>
</soap:Envelope>



	*/

	public function __construct() {

		parent::__construct();

		$this->setSoapSzolgaltatas($this->module, $this->service);
		$this->setSoapRendszer($this->system);

	}


	public function setSoapData($data) {

		$formNode 		= $this->parser->query("//iop:Form")->item(0);

		$kerdesNode 	= $this->document->createElement("hkp:GIHivatalokLekerdezeseKerdes");

		if(isset($data['rovidNev'])) {

			$dataNodes[] = $this->document->createElement("hkp:RovidNevSzures", $data['rovidNev']);

		}

		if(isset($data['nev'])) {

			$dataNodes[] = $this->document->createElement("hkp:NevSzures", htmlspecialchars($data['nev']));

		}

		if(isset($data['tipus'])) {

			$dataNodes[] = $this->document->createElement("hkp:TipusSzures", $data['tipus']);

		}



		foreach ($dataNodes as $dataNode) {
			
			$kerdesNode->appendChild($dataNode);
		
		}
		$formNode->appendChild($kerdesNode);

	}

}