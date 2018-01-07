<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message as BaseMessage;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Recipient;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Allampolgar;


/**
* 
*/
final class UjDokumentumokFeltolteseGepiInterfeszAltal extends BaseMessage
{

	protected $service 	= "UjDokumentumokFeltolteseGepiInterfeszAltal";
	protected $module	= "HivataliModule";
	protected $system 	= "HKP";

	/*

	<hkp:DokumentumFeltoltesKerdes>
					<hkp:DokumentumAdatok href="csat-1">
						<hkp:HivatkozasiSzam>473847878968976324</hkp:HivatkozasiSzam>
						<hkp:Cimzett>
							<hkp:KRID>1</hkp:KRID>
						</hkp:Cimzett>
						<hkp:DokTipusHivatal>APEHDOK</hkp:DokTipusHivatal>
						<hkp:DokTipusAzonosito>0058</hkp:DokTipusAzonosito>
						<hkp:DokTipusLeiras>Értesítés EVA bevallásról</hkp:DokTipusLeiras>
						<hkp:Megjegyzes>Fontos</hkp:Megjegyzes>
						<hkp:FileNev>ertesites.pdf</hkp:FileNev>
						<hkp:ValaszUtvonal>1</hkp:ValaszUtvonal>
						<hkp:ValaszTitkositas>true</hkp:ValaszTitkositas>
						<hkp:RendszerUzenet>false</hkp:RendszerUzenet>
						<hkp:ETertiveveny>true</hkp:ETertiveveny>
						<hkp:Lenyomat>//6756jhhjh=(/=89789</hkp:Lenyomat>
					</hkp:DokumentumAdatok>
					<hkp:DokumentumAdatok href="csat-2">
						<hkp:Cimzett>
							<hkp:KapcsolatiKod>zuz=jjkjgGGhh665=</hkp:KapcsolatiKod>
						</hkp:Cimzett>
						<hkp:DokTipusHivatal>APEHDOK</hkp:DokTipusHivatal>
						<hkp:DokTipusAzonosito>0058</hkp:DokTipusAzonosito>
						<hkp:DokTipusLeiras>Értesítés EVA bevallásról</hkp:DokTipusLeiras>
						<hkp:Megjegyzes>Fontos</hkp:Megjegyzes>
						<hkp:FileNev>ertesites.pdf</hkp:FileNev>
						<hkp:ValaszUtvonal>1</hkp:ValaszUtvonal>
						<hkp:ValaszTitkositas>false</hkp:ValaszTitkositas>
						<hkp:RendszerUzenet>false</hkp:RendszerUzenet>
						<hkp:ETertiveveny>false</hkp:ETertiveveny>
						<hkp:Lenyomat>//6756jhhjh=(/=89789</hkp:Lenyomat>
					</hkp:DokumentumAdatok>
				</hkp:DokumentumFeltoltesKerdes>

	*/

	public function __construct() {

		parent::__construct();

		$this->setSoapSzolgaltatas($this->module, $this->service);
		$this->setSoapRendszer($this->system);

	}


	public function setSoapData($data = null) {

		$formNode 		= $this->parser->query("//iop:Form")->item(0);

		$kerdesNode 	= $this->document->createElement("hkp:DokumentumFeltoltesKerdes");

		$index 			= 0;

		foreach ($this->attachments as $attachment) {
			
			$node = $this->createDokumentumNode($attachment, $index);
			$kerdesNode->appendChild($node);

			$index++;
		
		}

		$formNode->appendChild($kerdesNode);

	}

	private function createDokumentumNode($attachment, $index = 0) {

		/*

		<hkp:DokumentumAdatok href="csat-2">
						<hkp:Cimzett>
							<hkp:KapcsolatiKod>zuz=jjkjgGGhh665=</hkp:KapcsolatiKod>
						</hkp:Cimzett>
						<hkp:DokTipusHivatal>APEHDOK</hkp:DokTipusHivatal>
						<hkp:DokTipusAzonosito>0058</hkp:DokTipusAzonosito>
						<hkp:DokTipusLeiras>Értesítés EVA bevallásról</hkp:DokTipusLeiras>
						<hkp:Megjegyzes>Fontos</hkp:Megjegyzes>
						<hkp:FileNev>ertesites.pdf</hkp:FileNev>
						<hkp:ValaszUtvonal>1</hkp:ValaszUtvonal>
						<hkp:ValaszTitkositas>false</hkp:ValaszTitkositas>
						<hkp:RendszerUzenet>false</hkp:RendszerUzenet>
						<hkp:ETertiveveny>false</hkp:ETertiveveny>
						<hkp:Lenyomat>//6756jhhjh=(/=89789</hkp:Lenyomat>
					</hkp:DokumentumAdatok>

		*/

		$dokumentumAdatokNode 	= $this->document->createElement("hkp:DokumentumAdatok");

		$attributum 			= $this->document->createAttribute('href');
		$attributum->value 		= sprintf('csat-%d', $index);

		$dokumentumAdatokNode->appendChild($attributum);

		// --------

		$node 	= $this->document->createElement("hkp:HivatkozasiSzam");
		$dokumentumAdatokNode->appendChild($node);

		$cimzettNode 			= $this->document->createElement("hkp:Cimzett");


		switch ($attachment['recipient']->getTipus()) {
			case Recipient::ALLAMPOLGAR:
				
					$nodeName = "hkp:KapcsolatiKod";

				break;
			case Recipient::HIVATAL:
				
					$nodeName = "hkp:KRID";

				break;
			
			default:
				
				throw new \Exception("Nincs jo cimzett megadva", 1);
				
				break;
		}

		

		$cimNode = $this->document->createElement($nodeName, $attachment['recipient']->getAzonosito());
		$cimzettNode->appendChild($cimNode);

		$dokumentumAdatokNode->appendChild($cimzettNode);

		$nodes = ['DokTipusHivatal', 'DokTipusAzonosito', 'DokTipusLeiras', 'Megjegyzes', 'FileNev', 'ValaszUtvonal', 'ValaszTitkositas', 'RendszerUzenet', 'ETertiveveny', 'Lenyomat'];

		foreach ($nodes as $nodeName) {

			$method = sprintf('get%s', $nodeName);
			
			$node 	= $this->document->createElement("hkp:$nodeName", $attachment['file']->$method());
			$dokumentumAdatokNode->appendChild($node);

		}

		return $dokumentumAdatokNode;

	}

}