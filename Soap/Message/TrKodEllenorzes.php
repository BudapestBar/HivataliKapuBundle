<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message as BaseMessage;

/**
* 
*/
final class TrKodEllenorzes extends BaseMessage
{

	/*

	<?xml version="1.0" encoding="UTF-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://schemas.xmlsoap.org/soap/envelope/
http://schemas.xmlsoap.org/soap/envelope/">
	<soap:Header>
		<kri:sessionID xmlns:kri="http://www.iop.hu/2004/kri">KRI-1-1402041624817-142</kri:sessionID>
	</soap:Header>
	<soap:Body>
		<iop:Valasz xmlns:iop="http://www.iop.hu/2004">
			<iop:ValaszFejlec>
				<iop:Felhasznalo>workflow</iop:Felhasznalo>
				<iop:UzenetIdopont>2014-07-22T14:26:25Z</iop:UzenetIdopont>
			</iop:ValaszFejlec>
			<iop:Session>
				<iop:Property Source="SSO" Name="TranzakcioKod" 
					Value="2ySV7FUkicuu7WqSF3TU44rai5N3TPUmZBbOUEr+lDhyPSyJZYtjg"/>
				<iop:Property Source="AUTH" Name="Email" Value="geza.radvanyi@nisz.hu"/>
				<iop:Property Source="AUTH" Name="Minosites" Value="12"/>
				<iop:Property Source="AUTH" Name="Nev" Value="ATOTESZTEGY ROBOT"/>
				<iop:Property Source="KRI" Name="KapcsolatiKod" 
					Value="ecc82a6477b04da1735da4770fe9c91882f8742c335d7a855e99ce6162df4c56"/>
			</iop:Session>
		</iop:Valasz>
	</soap:Body>
</soap:Envelope>



	*/


	protected $service 	= "TranzakcioKodEllenorzes";
	protected $module	= "KRIServiceModule";
	protected $system 	= "KRI";


	public function __construct() {

		parent::__construct();
		
		$this->setSoapSzolgaltatas($this->module, $this->service);
		$this->setSoapRendszer($this->system);

	}

	public function setSoapData($trkod) {

		$propertyNode 	= $this->document->createElement("iop:Property");

		$attribute1Node	= $this->document->createAttribute("Source");
		$attribute2Node	= $this->document->createAttribute("Name");
		$attribute3Node	= $this->document->createAttribute("Value");

		$attribute1Node->value = 'SSO';
		$attribute2Node->value = 'TranzakcioKod';
		$attribute3Node->value = $trkod;

		$propertyNode->appendChild($attribute1Node);
		$propertyNode->appendChild($attribute2Node);
		$propertyNode->appendChild($attribute3Node);
		

		$sessionNode = $this->parser->query("//iop:Session")->item(0);
		$sessionNode->appendChild($propertyNode);

	}
	
}