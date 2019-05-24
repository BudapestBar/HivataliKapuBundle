<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Event\HivataliKapuEvents;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Event\ConnectionEvent;

use League\Flysystem\File;

use Symfony\Component\EventDispatcher\EventDispatcher;

class Client
{

    private $eventDispatcher;

	private $handler;
	private $headers;
	private $options;
    private $attachments;

	private $url;
	private $xml;

	public function __construct(EventDispatcher $eventDispatcher, $url) {

        $this->eventDispatcher = $eventDispatcher;

        $this->attachments      = [];

		$this->url 		= $url;
		$this->handler 	= curl_init();

	}

    public function setUrl($url) {

        $this->url = $url;

    }

	private function setXml($xml) {

		$this->xml = $xml;

	}

	private function setCurlHeaders() {

        $this->headers = array(

            "Accept: text/xml",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            sprintf("SOAPAction: %s", $this->url), 
            // sprintf("Content-length: %d", strlen($this->xml)),

        );

        if (count($this->attachments)) {

            $this->headers[] = 'Content-type: multipart/related; boundary=MIME_boundary; type="text/xml"; start="<envelope.xml>"';

        }
        else {

            $this->headers[] = 'Content-type: text/xml';

        }


	}

	private function setCurlOptions() {

        if (!$this->handler) {

            $this->handler = curl_init();

        }

        curl_setopt($this->handler, CURLOPT_VERBOSE, false);
		curl_setopt($this->handler, CURLOPT_URL, $this->url);
        curl_setopt($this->handler, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->handler, CURLOPT_TIMEOUT, 20);
        curl_setopt($this->handler, CURLOPT_POST, true);
        curl_setopt($this->handler, CURLOPT_HTTPHEADER, $this->headers);




		
	}

    private function setBody() {

        
        if (count($this->attachments)) {

            $index  = 0;

            $body   = "--MIME_boundary\r\nContent-Type: \"text/xml\"; charset=utf-8\r\nContent-Transfer-Encoding: 8bit\r\nContent-ID: <envelope.xml>\r\n\r\n"
            .$this->xml."\r\n"; 

            foreach ($this->attachments as $file) {


                $body .= sprintf("--MIME_boundary\r\nContent-ID: <%s>\r\nContent-Type: \"%s\";\r\nContent-Transfer-Encoding: base64\r\nContent-Disposition: attachment; filename=%s\r\n\r\n%s\r\n", sprintf('csat-%d', $index), $file->getMimeType(), pathinfo($file->getPath(), PATHINFO_BASENAME),  base64_encode($file->read()))."\r\n";

                $index++;
            }

            $body .= "--MIME_boundary--\r\n\r\n";

        }
        else {

            $body = $this->xml;

        }

        curl_setopt($this->handler, CURLOPT_POSTFIELDS, $body); // the SOAP request


    }

	public function execute($xml = NULL) {

		if (is_null($xml)) {

			throw new \Exception("Error Processing Request", 1);
			
		}
		
		$this->setXml($xml);

		$this->setCurlHeaders();
		$this->setCurlOptions();

        $this->setBody();

		$content = curl_exec($this->handler); 

        // curl info es hiba ellenorzes
        
        
        if ($content === false) {

            $this->eventDispatcher->dispatch(HivataliKapuEvents::HKP_API_CONNECTION, new ConnectionEvent($xml, curl_error($this->handler), curl_errno($this->handler)));

        	throw new \Exception(curl_error($this->handler), curl_errno($this->handler));
        	
        }

        $this->eventDispatcher->dispatch(HivataliKapuEvents::HKP_API_CONNECTION, new ConnectionEvent($xml, $content, curl_errno($this->handler)));

        curl_close($this->handler);
		
        $this->handler = false;

        return $this->parseResponse($content);

	}

    public function addAttachment(File $file) {

        $this->attachments[] = $file;

    }

	private function parseResponse($body) {

        $response 		= null;
        $attachments 	= array();

		$line = strstr($body,"\n",true);

        if(strpos($line, '--') === 0) {
            
            $boundary = rtrim($line);

        }

        if (isset($boundary)) {

            $parts = explode($boundary, $body);

            array_shift($parts); # delete up to the first boundary
            array_pop($parts); # delete after the last boundary

            $binaries = array();

            foreach($parts as $part) {

                list($header, $binary) = preg_split("/\R\R/m", $part, 2);

                if (stripos($header, "Content-Disposition") !== false) {

                    preg_match("/Content-ID: <(\d*)>/m", $header, $filename);

                    $filename = $filename[1];

                    $attachments[$filename] = utf8_encode($binary);

                }
                else {

                    $response = $binary;

                }
            
            }    


        }
        else {

        	$response = $body;

        }

        return array($response, $attachments);

	}
}
