<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl;

use Doctrine\ORM\EntityManager;

use \BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\AllampolgarFelado;
use \BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\HivatalFelado;
use \BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Dokumentum;
use \BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Nyomtatvany;

use \BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Resque\Job\StoreBoritekJob;

class DokumentumokLekerdezeseGepiInterfeszAltal extends Request
{

	protected $service 	= "DokumentumokLekerdezeseGepiInterfeszAltal";
	protected $module	= "HivataliModule";
	protected $system	= "HKP";

	/*

	Kerdes: 

	<hkp:DokumentumAdatokLetoltesKerdes>
		<hkp:PostafiokAlapjan>
			<hkp:FeladoTipusa>1</hkp:FeladoTipusa>
			<hkp:EredmenyekSzama>4</hkp:EredmenyekSzama>
		</hkp:PostafiokAlapjan>
	</hkp:DokumentumAdatokLetoltesKerdes>

	<hkp:DokumentumAdatokLetoltesKerdes>
		<hkp:ErkeztetesiSzamAlapjan>
			<hkp:ErkeztetesiSzam></hkp:ErkeztetesiSzam> // string
			<hkp:Tarhely></hkp:Tarhely>					// szam
		</hkp:ErkeztetesiSzam>
	</hkp:DokumentumAdatokLetoltesKerdes>

	----

	Valasz: 

	Hiba / nincs üzenet

	
	<iop:Valasz xmlns:iop=\"http://www.iop.hu/2004\">
		<iop:ValaszFejlec>
			<iop:Felhasznalo>GW</iop:Felhasznalo>
			<iop:UzenetIdopont>2015-04-27T13:43:08Z</iop:UzenetIdopont>
		</iop:ValaszFejlec>
		<iop:HibaUzenet>
			<iop:Szam>22</iop:Szam>
			<iop:Tartalom>Üzenet nem létezik</iop:Tartalom>
		</iop:HibaUzenet>
	</iop:Valasz>
	
	Vannak dokumentumok: mime parolás elsőként

	<iop:Valasz xmlns:iop="http://www.iop.hu/2004">
		<iop:ValaszFejlec>
			<iop:Felhasznalo>TEST1</iop:Felhasznalo>
			<iop:UzenetIdopont>2008-12-04T13:19:45Z</iop:UzenetIdopont>
		</iop:ValaszFejlec>
		<iop:Session/>
		<iop:Form>
			<ns5:DokumentumAdatokLetoltesValasz xmlns:ns5="http://iop.gov.hu/2008/10/hkp">
				<ns5:DokumentumAdatok href="24287">
					<ns5:Felado>
						<ns12:AllampolgarFelado>
							<ns12:KapcsolatiKod>kapcskod</ns12:KapcsolatiKod>
							<ns12:Nev>nev</ns12:Nev>
							<ns12:Email>email</ns12:Email>
						</ns12:AllampolgarFelado> 
					</ns5:Felado>
					<ns5:Cimzett>4803</ns5:Cimzett> 
					<ns5:ErkeztetesiSzam>123456789200812041419024287</ns5:ErkeztetesiSzam>
					<ns5:HivatkozasiSzam>78789788787</ns5:HivatkozasiSzam>
					<ns5:DokTipusHivatal>TESZTHIVATAL</ns5:DokTipusHivatal>
					<ns5:DokTipusAzonosito>válasz</ns5:DokTipusAzonosito>
					<ns5:DokTipusLeiras>Válasz</ns5:DokTipusLeiras>
					<ns5:Megjegyzes>megjegyzes</ns5:Megjegyzes>
					<ns5:FileNev>hatarozat.pdf</ns5:FileNev>
					<ns5:ErvenyessegiDatum>2008-12-09T14:19:25+0100</ns5:ErvenyessegiDatum>
					<ns5:ErkeztetesiDatum>2008-12-04T13:19:25.000Z</ns5:ErkeztetesiDatum>
					<ns5:Kezbesitettseg>0</ns5:Kezbesitettseg> <ns5:Idopecset>DdvbFms=</ns5:Idopecset>
					<ns5:ValaszTitkositas>false</ns5:ValaszTitkositas>
					<ns5:ValaszUtvonal>0</ns5:ValaszUtvonal>
					<ns5:Rendszeruzenet>false</ns5:Rendszeruzenet>
					<ns5:Tarterulet>0</ns5:Tarterulet>
				</ns5:DokumentumAdatok>
				<ns5:DokumentumAdatok href="24288">
					<ns5:Felado>
						<ns5:HivatalFelado>
							<ns5:RovidNev>teszt</ns5:RovidNev>
							<ns5:Nev>teszt</ns5:Nev>
							<ns5:MAKKod>123456</ns5:MAKKod>
							<ns5:KRID>123456</ns5:KRID>
						</ns5:HivatalFelado>
					</ns5:Felado>
					<ns5:Cimzett>4803</ns5:Cimzett> <ns5:ErkeztetesiSzam>123456789200812041419024288</ns5:ErkeztetesiSzam>
					<ns5:DokTipusHivatal>TESZTHIVATAL</ns5:DokTipusHivatal>
					<ns5:DokTipusAzonosito>válasz</ns5:DokTipusAzonosito>
					<ns5:DokTipusLeiras>Válasz</ns5:DokTipusLeiras>
					<ns5:Megjegyzes>megjegyzes</ns5:Megjegyzes>
					<ns5:FileNev>akarmi.pdf</ns5:FileNev>
					<ns5:ErvenyessegiDatum>2008-12-09T14:19:25+0100</ns5:ErvenyessegiDatum>
					<ns5:ErkeztetesiDatum>2008-12-04T13:19:25.000Z</ns5:ErkeztetesiDatum>
					<ns5:Kezbesitettseg>0</ns5:Kezbesitettseg> <ns5:Idopecset>JC7wqLsU=</ns5:Idopecset>
					<ns5:ValaszTitkositas>false</ns5:ValaszTitkositas>
					<ns5:ValaszUtvonal>0</ns5:ValaszUtvonal>
					<ns5:Rendszeruzenet>false</ns5:Rendszeruzenet>
					<ns5:Tarterulet>0</ns5:Tarterulet>
				</ns5:DokumentumAdatok>
			</ns5:DokumentumAdatokLetoltesValasz>
		</iop:Form>
	</iop:Valasz>


	 */

	public function __construct(EntityManager $manager, $resque) {

		parent::__construct();

		$this->setSoapSzolgaltatas($this->module, $this->service);
		$this->setSoapRendszer($this->system);

		$this->em 		= $manager;
		$this->resque 	= $resque;

	}

	protected function setSoapForm() {

		$formNode = $this->xpath()->query("//iop:Form")->item(0);



		if (($dokumentumokNode = $this->getChildNode($formNode, 'hkp:DokumentumAdatokLetoltesKerdes')) !== false) {

			return $dokumentumokNode;

		}

		$dokumentumokNode	= $this->document->createElement("hkp:DokumentumAdatokLetoltesKerdes");


		$queryNode			= $this->document->createElement("hkp:PostafiokAlapjan");

		$dokumentumokNode->appendChild($queryNode);

		$formNode->appendChild($dokumentumokNode);

		/*

		$eN 	= $this->document->createElement("hkp:ErkeztetesiSzamAlapjan");

		$szN 	= $this->document->createElement("hkp:ErkeztetesiSzam", 200295979201504291600111278);

		$eN->appendChild($szN);
		$dokumentumokNode->appendChild($eN);

		*/

		$tipusNode 			= $this->document->createElement("hkp:DokumentumTipusAzonosito", "BUK01_15_EVES"); 
		$eredmenyekNode 	= $this->document->createElement("hkp:EredmenyekSzama", 64);
		$feladoNode 		= $this->document->createElement("hkp:FeladoTipusa", 0); 


//		$queryNode->appendChild($tipusNode);
		$queryNode->appendChild($eredmenyekNode);
//		$queryNode->appendChild($feladoNode);

		return $dokumentumokNode;
		
	}

	public function query() {

		$this->setSoapForm();
	}

	public function parseResponse() {

		if ($this->xpath($this->response)->query("//ns12:DokumentumAdatokLetoltesValasz")->length == 0) {

			throw new \Exception("Error Processing Xml", 1);
			
		}

		$data = $this->xpath($this->response)->query("//ns12:DokumentumAdatokLetoltesValasz")->item(0);

	}

	public function process() {

        $counter 		= array();
        $resque     	= $this->resque;

        $dokumentumok 	= $this->xpath($this->response)->query("//ns12:DokumentumAdatok");

        foreach ($dokumentumok as $data) {

            $boritek = XmlParser::toArray($data);

            if (isset($boritek['ns12:Felado']['ns12:AllampolgarFelado'])) {

                if (!$felado = $this->em->getRepository('BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\AllampolgarFelado')->findOneBy(array('kapcsolatikod' => $boritek['ns12:Felado']['ns12:AllampolgarFelado']['ns12:KapcsolatiKod']))) {

                    $felado = new AllampolgarFelado();
                    $felado->setKapcsolatiKod($boritek['ns12:Felado']['ns12:AllampolgarFelado']['ns12:KapcsolatiKod']);

                }
                
                $felado->setNev($boritek['ns12:Felado']['ns12:AllampolgarFelado']['ns12:Nev']);
                $felado->setEmail($boritek['ns12:Felado']['ns12:AllampolgarFelado']['ns12:Email']);


            }
            elseif(isset($boritek['ns12:Felado']['ns12:HivatalFelado'])) {

                if (!$felado = $this->em->getRepository('BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\HivatalFelado')->findOneBy(array('krId' => $boritek['ns12:Felado']['ns12:HivatalFelado']['ns12:KRID']))) {

                    $felado = new HivatalFelado();

                    $felado->setNev($boritek['ns12:Felado']['ns12:HivatalFelado']['ns12:Nev']);
                    $felado->setRovidNev($boritek['ns12:Felado']['ns12:HivatalFelado']['ns12:rovidNev']);
                    $felado->setMakKod($boritek['ns12:Felado']['ns12:HivatalFelado']['ns12:MAKKod']);
                    $felado->setKrId($boritek['ns12:Felado']['ns12:HivatalFelado']['ns12:KRID']);
                }

            }

            if (!$dokumentum = $this->em->getRepository('BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Dokumentum')->findOneBy(array('erkeztetesiSzam' => $boritek['ns12:ErkeztetesiSzam']))) {

                $dokumentum = new Dokumentum();

            }

            $dokumentum->setErkeztetesiSzam($boritek['ns12:ErkeztetesiSzam'])
            ->setNyomtatvanyHivatal($boritek['ns12:DokTipusHivatal'])
            ->setNyomtatvanyAzonosito($boritek['ns12:DokTipusAzonosito'])
            ->setNyomtatvanyLeiras($boritek['ns12:DokTipusLeiras'])
            //->setMegjegyzes($boritek['ns12:Megjegyzes'])
            ->setFileNev($boritek['ns12:FileNev'])
            ->setErvenyessegiDatum(new \DateTime($boritek['ns12:ErvenyessegiDatum']))
            ->setErkeztetesiDatum(new \DateTime($boritek['ns12:ErkeztetesiDatum']))
            ->setKezbesitettseg($boritek['ns12:Kezbesitettseg'])
            ->setIdopecset($boritek['ns12:Idopecset'])
            ->setValaszTitkositas($boritek['ns12:ValaszTitkositas'])
            ->setValaszUtvonal($boritek['ns12:ValaszUtvonal'])
            ->setRendszeruzenet($boritek['ns12:Rendszeruzenet'])
            ->setTarterulet($boritek['ns12:Tarterulet']);

            if (isset($this->attachments[$boritek['ns12:ErkeztetesiSzam']])) {

            	if (!$nyomtatvany = $dokumentum->getNyomtatvany()) {

                	$nyomtatvany = new Nyomtatvany();

            	}

                $nyomtatvany->setEncrypted($this->attachments[$boritek['ns12:ErkeztetesiSzam']]);

                $nyomtatvany->setStatus(Nyomtatvany::STATUS_QUEUED);
                $nyomtatvany->setDokumentum($dokumentum);

                $this->em->persist($nyomtatvany);

            }

            $dokumentum->setFelado($felado);

            $this->em->persist($dokumentum);
            $this->em->persist($felado);


            // create your job
            $job = new StoreBoritekJob();
            $job->args = array(
                    
                'id'      => $boritek['ns12:ErkeztetesiSzam']
                
            );

            // enqueue your job
            $resque->enqueue($job);


        }
            
        $this->em->flush();

	}

}