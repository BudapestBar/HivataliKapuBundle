<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap;

/**
* 
*/
class XmlParser extends \DOMXPath
{


	public function __construct(\DOMDocument $document) {

		parent::__construct($document);

		$this->registerNamespace('iop', "http://www.iop.hu/2004");
        $this->registerNamespace('reg', "http://www.iop.hu/2004/reg");
        $this->registerNamespace('kri', "http://www.iop.hu/2004/kri");
		$this->registerNamespace('hkp', "http://iop.gov.hu/2008/10/hkp");
        $this->registerNamespace('ns5', "http://iop.gov.hu/2008/10/hkp");
        $this->registerNamespace('ns12', "http://iop.gov.hu/2008/10/hkp");
        
		$this->registerNamespace('wsse', "http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd");
		$this->registerNamespace('soap', "http://schemas.xmlsoap.org/soap/envelope/");

        $this->registerNamespace('soapenv', "http://schemas.xmlsoap.org/soap/envelope");

	}

	public static function toArray($root) {

        $result = array();

        if ($root->hasAttributes()) {
            $attrs = $root->attributes;
            foreach ($attrs as $attr) {
                $result['@attributes'][$attr->name] = $attr->value;
            }
        }

        if ($root->hasChildNodes()) {

            $children = $root->childNodes;
            
            if ($children->length == 1) {
            
                $child = $children->item(0);
            
                if ($child->nodeType == XML_TEXT_NODE) {
            
                    $result['_value'] = $child->nodeValue;
        
                
                }
                else {

                    $result[$child->nodeName] = self::toArray($child);

                }

                return (count($result) == 1 && isset($result['_value'])) ? $result['_value'] : $result;
            
            }
            else {

                $i = 0;

                foreach ($children as $child) {

                    $i++;

                    if ($child->nodeType != XML_TEXT_NODE) {
                
                        $result[$child->nodeName.$i] = self::toArray($child);
                    }
                    else {

                        $result[$child->nodeName.$i] = $child->nodeValue;

                    }
                }

            }
        }

        return $result;
	}

}