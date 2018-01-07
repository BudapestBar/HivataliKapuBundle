<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl;

class GIPostaFiokLekerdezes extends Request
{

	protected $service 	= "GIPostaFiokLekerdezes";
	protected $module	= "Workflow";
	protected $system	= "HKP";

	const OSSZES 	= "OlvasatlanUzenetekSzama";
	const HIVATAL 	= "HivataltolEkezettOlvasatlanUzenetekSzama";
	const RENDSZER 	= "RenszertolEkezettOlvasatlanUzenetekSzama";
	const POLGAR 	= "AllampolgartolErkezettOlvasatlanUzenetekSzama";

	private $olvasatlanUzenetekSzama;
	private $rendszertolErkezettOlvasatlanUzenetekSzama;
	private $hivataltolErkezettOlvasatlanUzenetekSzama;
	private $allampolgartolErkezettOlvasatlanUzenetekSzama;

	/*
	
	<hkp:GIPostaFiokAdatokLekerdezeseKerdes>
		<hkp:OlvasatlanUzenetekSzama></hkp:OlvasatlanUzenetekSzama>
		<hkp:AllampolgartolErkezettOlvasatlanUzenetekSzama></hkp:AllampolgartolErkezettOlvasatlanUzenetekSzama>
		<hkp:RenszertolEkezettOlvasatlanUzenetekSzama>
			<hkp:DokumentumTipusAzonosito>ElNemOlvasott</hkp:DokumentumTipusAzonosito>
		</hkp:RenszertolEkezettOlvasatlanUzenetekSzama>
	</hkp:GIPostaFiokAdatokLekerdezeseKerdes>

	 */

	public function __construct() {

		parent::__construct();
		$this->setSoapSzolgaltatas($this->module, $this->service);
		$this->setSoapRendszer($this->system);

	}

	protected function setSoapForm() {

		$formNode = $this->xpath()->query("//iop:Form")->item(0);

		if (($postafiokNode = $this->getChildNode($formNode, 'hkp:GIPostaFiokAdatokLekerdezeseKerdes')) !== false) {

			return $postafiokNode;

		}

		$postafiokNode	= $this->document->createElement("hkp:GIPostaFiokAdatokLekerdezeseKerdes");

		$formNode->appendChild($postafiokNode);

		return $postafiokNode;
		
	}

	public function query($key, $value = null) {

		$postafiokNode = $this->setSoapForm();

		if (!in_array($key, array(self::HIVATAL, self::OSSZES, self::POLGAR, self::RENDSZER))) {

			throw new \Exception("Error Processing query", 1);

		}

		$queryNode = $this->document->createElement("hkp:{$key}");

		if ($value !== null) {

			$tipusNode = $this->document->createElement("hkp:DokumentumTipusAzonosito", $value);
			$queryNode->appendChild($tipusNode);

		}

		$postafiokNode->appendChild($queryNode);		

		return $this; 

	}

	public function andWhere($key, $value = null) {

		return $this->query($key, $value);

	}

	public function parseResponse() {

		if ($this->xpath($this->response)->query("//ns12:GIPostaFiokAdatokLekerdezeseValasz")->length == 0) {

			throw new \Exception("Error Processing Xml", 1);
			
		}

		$data = $this->xpath($this->response)->query("//ns12:GIPostaFiokAdatokLekerdezeseValasz")->item(0);

		$data = XmlParser::toArray($data);


		if (array_key_exists('ns12:OlvasatlanUzenetekSzama', $data)) {

			$this->olvasatlanUzenetekSzama 						= $data['ns12:OlvasatlanUzenetekSzama'];

		}
		if (array_key_exists('ns12:RendszertolErkezettOlvasatlanUzenetekSzama', $data)) {

			$this->rendszertolErkezettOlvasatlanUzenetekSzama 		= $data['ns12:RendszertolErkezettOlvasatlanUzenetekSzama'];
		
		}
		if (array_key_exists('ns12:HivataltolErkezettOlvasatlanUzenetekSzama', $data)) {

			$this->hivataltolErkezettOlvasatlanUzenetekSzama 		= $data['ns12:HivataltolErkezettOlvasatlanUzenetekSzama'];
		
		}
		if (array_key_exists('ns12:AllampolgartolErkezettOlvasatlanUzenetekSzama', $data)) {

			$this->allampolgartolErkezettOlvasatlanUzenetekSzama 	= $data['ns12:AllampolgartolErkezettOlvasatlanUzenetekSzama'];

		}

		
	}

	public function getOlvasatlanUzenetekSzama() {

		return $this->olvasatlanUzenetekSzama;

	}

	public function getHivataltolErkezettOlvasatlanUzenetekSzama() {

		return $this->hivataltolErkezettOlvasatlanUzenetekSzama;

	}

	public function getRendszertolErkezettOlvasatlanUzenetekSzama() {

		return $this->rendszertolErkezettOlvasatlanUzenetekSzama;
		
	}

	public function getAllampolgartolErkezettOlvasatlanUzenetekSzama() {

		return $this->allampolgartolErkezettOlvasatlanUzenetekSzama;
		
	}


}