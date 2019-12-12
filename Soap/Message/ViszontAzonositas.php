<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message as BaseMessage;

/**
* 
*/
final class ViszontAzonositas extends BaseMessage
{

	protected $service 	= "Viszontazonositas";
	protected $module	= "UkapuXmlServices";
	protected $system 	= "REG";

	/*

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

	<?xml version="1.0" encoding="UTF-8"?>
<soap:Envelope xsi:schemaLocation="http://schemas.xmlsoap.org/soap/envelope/http://schemas.xmlsoap.org/soap/envelope/" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
   <soap:Header />
   <soap:Body>
      <iop:Kerdes xmlns:iop="http://www.iop.hu/2004">
         <iop:KerdesFejlec>
            <iop:Felhasznalo>TESZT</iop:Felhasznalo>
            <iop:UzenetIdopont>2013-11-19T11:00:00Z</iop:UzenetIdopont>
         </iop:KerdesFejlec>
         <iop:Session>
            <iop:Property Source="KRI" Name="KapcsolatiKod" Value="ecc82a6477b04da1735da4770fe9c91882f8742c335d7a855e99ce6162df4c56"/>
         </iop:Session>
         <iop:Form>
            <reg:TermeszetesSzemelyAzonositok xmlns:reg="http://www.iop.hu/2004/reg">
               <iop:ViseltNev>
                  <iop:TagoltNev DrJelzo="0">
                     <iop:CsaladiNev>ATOTESZTEGY</iop:CsaladiNev>
                     <iop:UtoNev1>ROBOT</iop:UtoNev1>
                     <iop:UtoNev2/>
                  </iop:TagoltNev>
               </iop:ViseltNev>
               <iop:SzuletesiNev>
                  <iop:TagoltNev DrJelzo="0">
                     <iop:CsaladiNev/>
                     <iop:UtoNev1/>
                     <iop:UtoNev2/>
                  </iop:TagoltNev>
               </iop:SzuletesiNev>
               <iop:Neme KodCsoport="8" KodErtek="1">1</iop:Neme>
               <iop:SzuletesiHely>
                  <iop:Telepules>VAC</iop:Telepules>
               </iop:SzuletesiHely>
               <iop:SzuletesiIdo>
                  <iop:SzuletesDatum>1999-01-01</iop:SzuletesDatum>
               </iop:SzuletesiIdo>
               <iop:AnyjaNeve>
                  <iop:TagoltNev DrJelzo="0">
                     <iop:CsaladiNev>TESZT</iop:CsaladiNev>
                     <iop:UtoNev1>GIZI</iop:UtoNev1>
                     <iop:UtoNev2/>
                  </iop:TagoltNev>
               </iop:AnyjaNeve>
               <iop:Allampolgarsag/>
            </reg:TermeszetesSzemelyAzonositok>
         </iop:Form>
         <iop:Parancs>
            <iop:Rendszer>REG</iop:Rendszer>
            <iop:Szolgaltatas Module="UkapuXmlServices">Viszontazonositas</iop:Szolgaltatas>
            <iop:Cimke/>
         </iop:Parancs>
      </iop:Kerdes>
   </soap:Body>
</soap:Envelope>

<?xml version="1.0"?>
<Envelope xmlns="http://schemas.xmlsoap.org/soap/envelope/" xmlns:wsa="http://schemas.xmlsoap.org/ws/2004/08/addressing" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd" xmlns:wsu="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:hkp="http://iop.gov.hu/2008/10/hkp">
  <Header>
    <wsse:Security>
      <wsse:UsernameToken>
        <wsse:Username>BUK01</wsse:Username>
        <wsse:Password>YhEGV9wj</wsse:Password>
      </wsse:UsernameToken>
    </wsse:Security>
  </Header>
  <Body>
    <iop:Kerdes xmlns:iop="http://www.iop.hu/2004">
      <iop:KerdesFejlec>
        <iop:Felhasznalo>BUK01</iop:Felhasznalo>
        <iop:UzenetIdopont>2017-02-09T14:32:33+01:00</iop:UzenetIdopont>
      </iop:KerdesFejlec>
      <iop:Session>
        <iop:Property Source="KRI" Name="KapcsolatiKod" Value="58949fff45b34ef49fae4ce3feb7ace3"/>
      </iop:Session>
      <iop:Form>
        <reg:TermeszetesSzemelyAzonositok xmlns:reg="http://www.iop.hu/2004/reg">
          <iop:ViseltNev>
            <iop:TagoltNev DrJelzo="0">
              <iop:CsaladiNev>Paller</iop:CsaladiNev>
              <iop:UtoNev1>&#xC1;d&#xE1;m</iop:UtoNev1>
            </iop:TagoltNev>
          </iop:ViseltNev>
          <iop:AnyjaNeve>
            <iop:TagoltNev DrJelzo="0">
              <iop:CsaladiNev>&#xC9;rdi</iop:CsaladiNev>
              <iop:UtoNev1>Em&#x151;ke</iop:UtoNev1>
              <iop:UtoNev2>Kl&#xE1;ra</iop:UtoNev2>
            </iop:TagoltNev>
          </iop:AnyjaNeve>
          <iop:SzuletesiHely>
            <iop:Telepules>Budapest 07</iop:Telepules>
          </iop:SzuletesiHely>
          <iop:SzuletesiIdo>
            <iop:SzuletesDatum>1977-07-18</iop:SzuletesDatum>
          </iop:SzuletesiIdo>
        </reg:TermeszetesSzemelyAzonositok>
      </iop:Form>
      <iop:Parancs>
        <iop:Rendszer>REG</iop:Rendszer>
        <iop:Szolgaltatas Module="UkapuXmlServices">Viszontazonositas</iop:Szolgaltatas>
        <iop:Cimke/>
      </iop:Parancs>
    </iop:Kerdes>
  </Body>
</Envelope>


	*/

	public function __construct() {

		parent::__construct();

		$this->setSoapSzolgaltatas($this->module, $this->service);
		$this->setSoapRendszer($this->system);

	}

	public function setKapcsolatiKod($value) {

		$this->setSessionPropertyData('KRI', 'KapcsolatiKod', $value);

	}


	public function setSoapData($data) {

		

		$azonositoNode 	= $this->document->createElementNs("http://www.iop.hu/2004/reg", "reg:TermeszetesSzemelyAzonositok");



		$dataNodes 		= array();

		if(isset($data['ViseltNeve'])) {

			$dataNodes[] = $this->createNevNode('ViseltNev', $data['ViseltNeve']);

		}

		if(isset($data['SzuletesiNeve'])) {

			$dataNodes[] = $this->createNevNode('SzuletesiNev', $data['SzuletesiNeve']);

		}

		if(isset($data['SzuletesiHely'])) {

			$helyNode 	= $this->document->createElement("iop:SzuletesiHely");
			$telepNode 	= $this->document->createElement("iop:Telepules", $data['SzuletesiHely']);

			$helyNode->appendChild($telepNode);

			$dataNodes[] = $helyNode;

		}

		if(isset($data['SzuletesiIdo'])) {

			$idoNode 	= $this->document->createElement("iop:SzuletesiIdo");
			$datumNode 	= $this->document->createElement("iop:SzuletesDatum", $data['SzuletesiIdo']);

			$idoNode->appendChild($datumNode);

			$dataNodes[] = $idoNode;

		}

		if(isset($data['AnyjaNeve'])) {

			$dataNodes[] = $this->createNevNode('AnyjaNeve', $data['AnyjaNeve']);

		}

		foreach ($dataNodes as $dataNode) {
			
			$azonositoNode->appendChild($dataNode);
		
		}


		$formNode 		= $this->parser->query("//iop:Form")->item(0);
		$formNode->appendChild($azonositoNode);

	}

	private function createNevNode($key, $nev, $drjelzo = false) {

		$nevNode 		= $this->document->createElement("iop:".$key);

		$tagoltNevNode 	= $this->document->createElement("iop:TagoltNev");

		$domAttribute 	= $this->document->createAttribute('DrJelzo');
		$domAttribute->value = ($drjelzo) ? 1 : 0;

		$tagoltNevNode->appendChild($domAttribute);

		$sub1Node 	= $this->document->createElement("iop:CsaladiNev", $nev['CsaladiNev']);
		$tagoltNevNode->appendChild($sub1Node);

		$sub2Node 	= $this->document->createElement("iop:UtoNev1", $nev['UtoNev1']);
		$tagoltNevNode->appendChild($sub2Node);

		if (isset($nev['UtoNev2'])) {

			$sub3Node 	= $this->document->createElement("iop:UtoNev2", $nev['UtoNev2']);
			$tagoltNevNode->appendChild($sub3Node);

		}

		$nevNode->appendChild($tagoltNevNode);

		return $nevNode;

	}

	private function setSessionPropertyData($source, $name, $value) {

		$propertyNode 	= $this->document->createElement("iop:Property");

		$attribute1Node	= $this->document->createAttribute("Source");
		$attribute2Node	= $this->document->createAttribute("Name");
		$attribute3Node	= $this->document->createAttribute("Value");

		
		$attribute1Node->value = $source;
		$attribute2Node->value = $name;
		$attribute3Node->value = $value;

		$propertyNode->appendChild($attribute1Node);
		$propertyNode->appendChild($attribute2Node);
		$propertyNode->appendChild($attribute3Node);
		

		$sessionNode = $this->parser->query("//iop:Session")->item(0);
		$sessionNode->appendChild($propertyNode);

	}

}