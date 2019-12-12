<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message;
use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\Client;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\XmlParser;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Model\HivatalakiKapuHivatalInterface;

class Request
{

	protected $document;

	protected $client;

    protected $hivatal;

    protected $felhasznalo;
    protected $username;
    protected $password;

	protected $response;
	protected $attachments;
    protected $downloadFiles;

	protected $errorMessage;
	protected $errorCode; 



	public function __construct(Client $client) {

        $this->document         = new \DOMDocument();
		$this->client 	        = $client;
        //$this->felhasznalo      = $felhasznalo;
        //$this->username         = $username;
        //$this->password         = $password;

        $this->downloadFiles    = [];

	}

    public function setHivatal(HivatalakiKapuHivatalInterface $hivatal)
    {
        $this->hivatal      = $hivatal;

        $this->felhasznalo  = $hivatal->getHivatalikapuFelhasznalo();
        $this->username     = $hivatal->getHivatalikapuWSSEUsername();
        $this->password     = $hivatal->getHivatalikapuWSSEPassword();

    }


	public function send( $message) {

        if (!$this->felhasznalo || !$this->username || !$this->password ) {

            throw new \Exception("Hivatal nincs beállítva", 1);
            


        }

        $message->setSoapKerdesFejlec($this->felhasznalo);
        $message->setSoapUsername($this->username);
        $message->setSoapPassword($this->password);

        foreach ($message->getAttachments() as $attachment) {

            $this->client->addAttachment($attachment['file']->getFile());
        
        }

		list($this->response, $this->downloadFiles) = $this->client->execute($message->getXML());

		$this->document->loadXML($this->response);

        

		$this->xpath = new XmlParser($this->document);

		if ($this->xpath->query("//iop:HibaUzenet")->length != 0) {

            $error = $this->xpath->query("//iop:HibaUzenet")->item(0);

            $error = XmlParser::toArray($error);

            //$this->errorCode 		= $error['iop:Szam'];
            //$this->errorMessage 	= $error['iop:Tartalom'];

            return false;

        } 
        else {

        	if ($this->xpath->query("//iop:Session")->length == 0) {

                throw new \Exception("Error Processing Xml", 1);
                
            }

        	return true;

        }

        throw new \Exception("Rossz formátum", 1);
        

	}

    public function process() {

        $data   = $this->xpath->query("//iop:Valasz");

        return $data;

    }

    public function toArray() {

        return XmlParser::toArray($this->process());

    }

	protected function getChildNode($parent, $name) {

		if ($parent->hasChildNodes()) {

		  	foreach ($parent->childNodes as $c) {

		   		if ($c->nodeType == XML_ELEMENT_NODE && $c->nodeName == $name){
		   			
		   			return $c;
		   		
		   		}

		  	}
		
		}
		return false;

	}

	protected function hasChildNodes($parent) {

		if ($parent->hasChildNodes()) {

		  	foreach ($parent->childNodes as $c) {

		   		if ($c->nodeType == XML_ELEMENT_NODE){
		   			
		   			return true;
		   		
		   		}

		  	}
		
		}
		return false;

	}

    /**
     * Gets the value of errorMessage.
     *
     * @return mixed
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;
    }

    /**
     * Gets the value of errorCode.
     *
     * @return mixed
     */
    public function getErrorCode()
    {
        return $this->errorCode;
    }

    /**
     * Gets the value of response.
     *
     * @return mixed
     */
    public function getResponse($format = 'array')
    {

        return $this->response;
    }

    /**
     * Gets the value of attachments.
     *
     * @return mixed
     */
    public function getAttachments()
    {
        return $this->attachments;
    }

    public function addAttachment($attachment) {

        $this->client->addAttachment($attachment);

        return $this;

    }


    /**
     * @return mixed
     */
    public function getDownloadFiles()
    {
        return $this->downloadFiles;
    }
}