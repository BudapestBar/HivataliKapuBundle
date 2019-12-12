<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message as BaseMessage;

/**
* 
*/
final class Azonositas extends BaseMessage
{

	protected $service 	= "Azonositas";
	protected $module	= "Workflow";
	protected $system 	= "KRI";

	/*

	<?xml version="1.0" encoding="UTF-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://schemas.xmlsoap.org/soap/envelope/
http://schemas.xmlsoap.org/soap/envelope/">
	<soap:Header />
	<soap:Body>
		<iop:Kerdes xmlns:iop="http://www.iop.hu/2004">
			<iop:KerdesFejlec>
				<iop:Felhasznalo>TESZT</iop:Felhasznalo>
				<iop:UzenetIdopont>2013-11-19T15:00:00Z</iop:UzenetIdopont>
			</iop:KerdesFejlec>
			<iop:Session />
			<iop:Parancs>
				<iop:Rendszer>KRI</iop:Rendszer>
				<iop:Szolgaltatas Module="Workflow">Azonositas</iop:Szolgaltatas>
			</iop:Parancs>
			<iop:Form>
				<hkp:AzonositasKerdes xmlns:hkp="http://iop.gov.hu/2008/10/hkp">
					<hkp:TermeszetesSzemelyAzonosito>
						<hkp:ViseltNeve>
							<hkp:CsaladiNev>ATOTESZTEGY</hkp:CsaladiNev>
							<hkp:UtoNev1>ROBOT</hkp:UtoNev1>
							<hkp:UtoNev2/>
						</hkp:ViseltNeve>
						<hkp:SzuletesiNeve>
							<hkp:CsaladiNev/>
							<hkp:UtoNev1/>
							<hkp:UtoNev2/>
						</hkp:SzuletesiNeve>
						<hkp:AnyjaNeve>
							<hkp:CsaladiNev>TESZT</hkp:CsaladiNev>
							<hkp:UtoNev1>GIZI</hkp:UtoNev1>
							<hkp:UtoNev2/>
						</hkp:AnyjaNeve>
						<hkp:SzuletesiHely>
							<hkp:Telepules>VAC</hkp:Telepules>
						</hkp:SzuletesiHely>
						<hkp:SzuletesiIdo>1999-01-01</hkp:SzuletesiIdo>
					</hkp:TermeszetesSzemelyAzonosito>
				</hkp:AzonositasKerdes>
			</iop:Form>
		</iop:Kerdes>
	</soap:Body>
</soap:Envelope>


// ------------

<?xml version="1.0" encoding="UTF-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://schemas.xmlsoap.org/soap/envelope/
http://schemas.xmlsoap.org/soap/envelope/">
	<soap:Header>
		<kri:sessionID xmlns:kri="http://www.iop.hu/2004/kri">KRI-1-1402041624817-97</kri:sessionID>
	</soap:Header>
	<soap:Body>
		<iop:Valasz xmlns:iop="http://www.iop.hu/2004">
			<iop:ValaszFejlec>
				<iop:Felhasznalo>TESZT</iop:Felhasznalo>
				<iop:UzenetIdopont>2014-07-21T13:05:49Z</iop:UzenetIdopont>
			</iop:ValaszFejlec>
			<iop:Session>
				<iop:Property Name="HivatalRovidNeve" Source="UI" Value="TESZTHKPGI"/>
			</iop:Session>
			<iop:Form>
				<hkp:AzonositasValasz xmlns:hkp="http://iop.gov.hu/2008/10/hkp">
					<hkp:Azonositott>
						<hkp:AzonositottAdatok>
							<hkp:KapcsolatiKod>
							ecc82a6477b04da1735da4770fe9c91882f8742c335d7a855e99ce6162df4c56
							</hkp:KapcsolatiKod>
							<hkp:Nev>ATOTESZTEGY ROBOT</hkp:Nev>
							<hkp:Email>itoteszt@nisz.hu</hkp:Email>
						</hkp:AzonositottAdatok>
					</hkp:Azonositott>
				</hkp:AzonositasValasz>
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

		$kerdesNode 	= $this->document->createElement("hkp:AzonositasKerdes");
		$azonositoNode 	= $this->document->createElement("hkp:TermeszetesSzemelyAzonosito");

		$dataNodes 		= array();

		if(isset($data['ViseltNeve'])) {

			$dataNodes[] = $this->createNevNode('ViseltNeve', $data['ViseltNeve']);

		}

		if(isset($data['SzuletesiNeve'])) {

			$dataNodes[] = $this->createNevNode('SzuletesiNeve', $data['SzuletesiNeve']);

		}

		if(isset($data['AnyjaNeve'])) {

			$dataNodes[] = $this->createNevNode('AnyjaNeve', $data['AnyjaNeve']);

		}

		if(isset($data['SzuletesiHely'])) {

			$helyNode 	= $this->document->createElement("hkp:SzuletesiHely");
			$telepNode 	= $this->document->createElement("hkp:Telepules", $data['SzuletesiHely']);

			$helyNode->appendChild($telepNode);

			$dataNodes[] = $helyNode;

		}

		if(isset($data['SzuletesiIdo'])) {

			$dataNodes[] = $this->document->createElement("hkp:SzuletesiIdo", $data['SzuletesiIdo']);

		}

		foreach ($dataNodes as $dataNode) {
			
			$azonositoNode->appendChild($dataNode);
		
		}

		$kerdesNode->appendChild($azonositoNode);
		$formNode->appendChild($kerdesNode);

	}

	private function createNevNode($key, $nev) {

		$nevNode 	= $this->document->createElement("hkp:".$key);

		if (isset($nev['doktor'])) {

			$drNode 	= $this->document->createElement("hkp:doktor", true);
			$nevNode->appendChild($drNode);

		}

		$sub1Node 	= $this->document->createElement("hkp:CsaladiNev", $nev['CsaladiNev']);
		$nevNode->appendChild($sub1Node);

		$sub2Node 	= $this->document->createElement("hkp:UtoNev1", $nev['UtoNev1']);
		$nevNode->appendChild($sub2Node);

		if (isset($nev['UtoNev2'])) {

			$sub3Node 	= $this->document->createElement("hkp:UtoNev2", $nev['UtoNev2']);
			$nevNode->appendChild($sub3Node);

		}

		return $nevNode;

	}

}