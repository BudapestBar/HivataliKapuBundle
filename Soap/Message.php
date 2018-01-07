<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap;


use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\XmlParser;

/**
* 
*/
abstract class Message
{

	protected $document;
	protected $attachments = [];
	protected $parser 	= null;

	protected $scheme = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
	<soap:Envelope  xsi:schemaLocation=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:wsa=\"http://schemas.xmlsoap.org/ws/2004/08/addressing\" xmlns:wsse=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd\" xmlns:wsu=\"http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-utility-1.0.xsd\" xmlns:hkp=\"http://iop.gov.hu/2008/10/hkp\">
<soap:Header>
	<wsse:Security>
		<wsse:UsernameToken>
			<wsse:Username></wsse:Username>
			<wsse:Password></wsse:Password>
		</wsse:UsernameToken>
	</wsse:Security>
</soap:Header>
<soap:Body>
	<iop:Kerdes xmlns:iop=\"http://www.iop.hu/2004\">
		<iop:KerdesFejlec>
			<iop:Felhasznalo></iop:Felhasznalo>
			<iop:UzenetIdopont></iop:UzenetIdopont>
		</iop:KerdesFejlec>
		<iop:Session></iop:Session>
		<iop:Parancs>
			<iop:Rendszer></iop:Rendszer>
			<iop:Szolgaltatas></iop:Szolgaltatas>
			<iop:Cimke/>
		</iop:Parancs>
		<iop:Form></iop:Form>
	</iop:Kerdes>
</soap:Body>
</soap:Envelope>";
	
	public function __construct() {


        $this->document = new \DOMDocument('1.0', 'UTF-8');

		$this->document->loadXML($this->scheme);

		$this->parser = new XmlParser($this->document);

	}

	public function getXml()
	{
		return $this->document->saveXML();
	}

	public function setSoapUsername($value) { 

		$this->setNodeValue("//wsse:Username", $value);

	}

	public function setSoapPassword($value) {

		$this->setNodeValue("//wsse:Password", $value);

	}

	public function setSoapKerdesFejlec($felhasznalo) {

		$date = new \DateTime();

		$this->setNodeValue("//iop:Felhasznalo", $felhasznalo);
		$this->setNodeValue("//iop:UzenetIdopont", $date->format('c'));

	}

	protected function setSoapRendszer($value) {

		$this->setNodeValue("//iop:Rendszer", $value);

	}

	protected function setSoapSzolgaltatas($module, $value) {

		$this->setNodeValue("//iop:Szolgaltatas", $value);
		$this->setNodeAttributes("//iop:Szolgaltatas", array('Module' => $module));

	}

	protected function setNodeAttributes($path, $attributes) {

		$elements = $this->parser->query($path);

		if (!is_null($elements) && $elements->length == 1) {

			foreach ($attributes as $key => $value) {
				
				$elements->item(0)->setAttribute($key, $value);

			}

		}
		else {
			
			throw new \Exception(sprintf("Error, %s node doesn't exists", $path), 1);

		}
		
	}

	protected function setNodeValue($path, $value) {

		$elements = $this->parser->query($path);

		if (!is_null($elements) && $elements->length == 1) {

			$elements->item(0)->nodeValue = $value;

		}
		else {

			throw new \Exception(sprintf("Error, %s node doesn't exists", $path), 1);

		}

	}

	abstract public function setSoapData($data);


    /**
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    /**
     * @param mixed $attachments
     *
     * @return self
     */
    public function addAttachment(Attachment $attachment, Recipient $recipient)
    {
        
        $this->attachments[] = ['file' => $attachment, 'recipient' => $recipient];

        return $this;

    }
}