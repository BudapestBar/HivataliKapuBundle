<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message as BaseMessage;

/**
* 
*/
final class DokumentumokLekerdezeseGepiInterfeszAltal2 extends BaseMessage
{

	const HIVTALIKAPU 	= 1;
	const CEGKAPU 		= 2;
	const PERKAPU 		= 7;

	protected $service 	  = "DokumentumokLekerdezeseGepiInterfeszAltal2";
	protected $module      = "HivataliModule";
	protected $system 	  = "HKP";

	/*

	<?xml version="1.0" encoding="UTF-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://schemas.xmlsoap.org/soap/envelope/
http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Header>
      <wsse:Security xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
         <wsse:UsernameToken>
            <wsse:Username>TESZT</wsse:Username>
            <wsse:Password>pass</wsse:Password>
         </wsse:UsernameToken>
      </wsse:Security>
   </soap:Header>
   <soap:Body>
      <iop:Kerdes xmlns:iop="http://www.iop.hu/2004">
         <iop:KerdesFejlec>
            <iop:Felhasznalo>TESZT</iop:Felhasznalo>
            <iop:UzenetIdopont>2013-11-19T17:00:00Z</iop:UzenetIdopont>
         </iop:KerdesFejlec>
         <iop:Parancs>
            <iop:Rendszer>HKP</iop:Rendszer>
            <iop:Szolgaltatas Module="HivataliModule">DokumentumokLekerdezeseGepiInterfeszAltal2</iop:Szolgaltatas>
         </iop:Parancs>
         <iop:Form xmlns:hkp="http://iop.gov.hu/2008/10/hkp">
            <hkp:DokumentumAdatokLetoltesKerdes>
               <hkp:PostafiokAlapjan>
                  <hkp:EredmenyekSzama>4</hkp:EredmenyekSzama>
               </hkp:PostafiokAlapjan>
            </hkp:DokumentumAdatokLetoltesKerdes>
         </iop:Form>
      </iop:Kerdes>
   </soap:Body>
</soap:Envelope>



// ------------

<?xml version="1.0" encoding="UTF-8"?>
<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://schemas.xmlsoap.org/soap/envelope/
http://schemas.xmlsoap.org/soap/envelope/">
   <soap:Header>
      <kri:sessionID xmlns:kri="http://www.iop.hu/2004/kri">KRI-1-1402041624817-916</kri:sessionID>
   </soap:Header>
   <soap:Body>
      <iop:Valasz xmlns:iop="http://www.iop.hu/2004">
         <iop:ValaszFejlec>
            <iop:Felhasznalo>TESZT</iop:Felhasznalo>
            <iop:UzenetIdopont>2014-07-23T13:47:17Z</iop:UzenetIdopont>
         </iop:ValaszFejlec>
         <iop:Session/>
         <iop:Form>
            <hkp:DokumentumAdatokLetoltesValasz xmlns:hkp="http://iop.gov.hu/2008/10/hkp">
               <hkp:DokumentumAdatok href="504383394201407231547285390">
                  <hkp:Felado>
                     <hkp:HivatalFelado>
                        <hkp:RovidNev>TESZTHKPGI</hkp:RovidNev>
                        <hkp:Nev>teszt hkp gi</hkp:Nev>
                        <hkp:MAKKod>012345678</hkp:MAKKod>
                        <hkp:KRID>504383394</hkp:KRID>
                     </hkp:HivatalFelado>
                  </hkp:Felado>
                  <hkp:FeladoUgyintezo>
                     <hkp:KapcsolatiKod>zuz=jjkjgGGhh665=</hkp:KapcsolatiKod>
                           <hkp:Nev>TESZT3 ELEK</hkp:Nev>
                     <hkp:Email>t.zs@nisz.hu</hkp:Email>
                  </hkp:FeladoUgyintezo>
                  <hkp:CimzettUgyintezok>
                     <hkp:CimzettUgyintezo>
                        <hkp:KapcsolatiKod>quz=jjkjgGGhh665=</hkp:KapcsolatiKod>
                        <hkp:Nev>TESZT4 ELEK</hkp:Nev>
                        <hkp:Email>t4.zs@nisz.hu</hkp:Email>
                     </hkp:CimzettUgyintezo>
                     <hkp:CimzettUgyintezo>
                        <hkp:KapcsolatiKod>wuz=jjkjgGGhh664=</hkp:KapcsolatiKod>
                        <hkp:Nev>TESZT5 ELEK</hkp:Nev>
                        <hkp:Email>t5.zs@nisz.hu</hkp:Email>
                     </hkp:CimzettUgyintezo>
                  </hkp:CimzettUgyintezok>
                  <hkp:ErkeztetesiSzam>504383394201407231547285390</hkp:ErkeztetesiSzam>
                  <hkp:HivatkozasiSzam>473847878968976324</hkp:HivatkozasiSzam>
                  <hkp:DokTipusHivatal>TESZTHKPGI</hkp:DokTipusHivatal>
                  <hkp:DokTipusAzonosito>krgi_errors</hkp:DokTipusAzonosito>
                  <hkp:DokTipusLeiras>project: krgi_errors</hkp:DokTipusLeiras>
                  <hkp:Megjegyzes>megjegyzes</hkp:Megjegyzes>
                  <hkp:FileNev>lorem.pdf</hkp:FileNev>
                  <hkp:ErvenyessegiDatum>2014-08-22T15:47:14+0200</hkp:ErvenyessegiDatum>
                  <hkp:ErkeztetesiDatum>2014-07-23T13:47:14.000Z</hkp:ErkeztetesiDatum>
                  <hkp:Kezbesitettseg>0</hkp:Kezbesitettseg>
                  <hkp:Idopecset>MII…</hkp:Idopecset>
                  <hkp:ValaszTitkositas>false</hkp:ValaszTitkositas>
                  <hkp:ValaszUtvonal>1</hkp:ValaszUtvonal>
                  <hkp:Rendszeruzenet>false</hkp:Rendszeruzenet>
                  <hkp:Tarterulet>0</hkp:Tarterulet>
               </hkp:DokumentumAdatok>
               <hkp:DokumentumAdatok href="504383394201407231547285392">
                  <hkp:Felado>
                     <hkp:HivatalFelado>
                        <hkp:RovidNev>TESZTHKPGI</hkp:RovidNev>
                        <hkp:Nev>teszt hkp gi</hkp:Nev>
                        <hkp:MAKKod>012345678</hkp:MAKKod>
                        <hkp:KRID>504383394</hkp:KRID>
                     </hkp:HivatalFelado>
                  </hkp:Felado>
                  <hkp:CimzettUgyintezok>
                     <hkp:CimzettUgyintezo>
                        <hkp:KapcsolatiKod>quz=jjkjgGGhh665=</hkp:KapcsolatiKod>
                        <hkp:Nev>TESZT4 ELEK</hkp:Nev>
                        <hkp:Email>t4.zs@nisz.hu</hkp:Email>
                     </hkp:CimzettUgyintezo>
                     <hkp:CimzettUgyintezo>
                        <hkp:KapcsolatiKod>wuz=jjkjgGGhh664=</hkp:KapcsolatiKod>
                        <hkp:Nev>TESZT5 ELEK</hkp:Nev>
                        <hkp:Email>t5.zs@nisz.hu</hkp:Email>
                     </hkp:CimzettUgyintezo>
                  </hkp:CimzettUgyintezok>
                  <hkp:ErkeztetesiSzam>504383394201407231547285392</hkp:ErkeztetesiSzam>
                  <hkp:HivatkozasiSzam>473847878968976324</hkp:HivatkozasiSzam>
                  <hkp:DokTipusHivatal>TESZTHKPGI</hkp:DokTipusHivatal>
                  <hkp:DokTipusAzonosito>krgi_errors</hkp:DokTipusAzonosito>
                  <hkp:DokTipusLeiras>project: krgi_errors</hkp:DokTipusLeiras>
                  <hkp:Megjegyzes>megjegyzes</hkp:Megjegyzes>
                  <hkp:FileNev>lorem.pdf</hkp:FileNev>
                  <hkp:ErvenyessegiDatum>2014-08-22T15:47:15+0200</hkp:ErvenyessegiDatum>
                  <hkp:ErkeztetesiDatum>2014-07-23T13:47:15.000Z</hkp:ErkeztetesiDatum>
                  <hkp:Kezbesitettseg>0</hkp:Kezbesitettseg>
                  <hkp:Idopecset>MIIN…</hkp:Idopecset>
                  <hkp:ValaszTitkositas>true</hkp:ValaszTitkositas>
                  <hkp:ValaszUtvonal>1</hkp:ValaszUtvonal>
                  <hkp:Rendszeruzenet>false</hkp:Rendszeruzenet>
                  <hkp:Tarterulet>0</hkp:Tarterulet>
               </hkp:DokumentumAdatok>
               <hkp:DokumentumAdatok href="504383394201407231547285393">
                  <hkp:Felado>
                     <hkp:HivatalFelado>
                        <hkp:RovidNev>TESZTHKPGI</hkp:RovidNev>
                        <hkp:Nev>teszt hkp gi</hkp:Nev>
                        <hkp:MAKKod>012345678</hkp:MAKKod>
                        <hkp:KRID>504383394</hkp:KRID>
                     </hkp:HivatalFelado>
                  </hkp:Felado>
                  <hkp:FeladoUgyintezo>
                     <hkp:KapcsolatiKod>zuz=jjkjgGGhh665=</hkp:KapcsolatiKod>
                           <hkp:Nev>TESZT3 ELEK</hkp:Nev>
                     <hkp:Email>t.zs@nisz.hu</hkp:Email>
                  </hkp:FeladoUgyintezo>
                  <hkp:ErkeztetesiSzam>504383394201407231547285393</hkp:ErkeztetesiSzam>
                  <hkp:HivatkozasiSzam>473847878968976324</hkp:HivatkozasiSzam>
                  <hkp:DokTipusHivatal>TESZTHKPGI</hkp:DokTipusHivatal>
                  <hkp:DokTipusAzonosito>krgi_errors</hkp:DokTipusAzonosito>
                  <hkp:DokTipusLeiras>project: krgi_errors</hkp:DokTipusLeiras>
                  <hkp:Megjegyzes>megjegyzes</hkp:Megjegyzes>
                  <hkp:FileNev>lorem.pdf</hkp:FileNev>
                  <hkp:ErvenyessegiDatum>2014-08-22T15:47:15+0200</hkp:ErvenyessegiDatum>
                  <hkp:ErkeztetesiDatum>2014-07-23T13:47:15.000Z</hkp:ErkeztetesiDatum>
                  <hkp:Kezbesitettseg>0</hkp:Kezbesitettseg>
                  <hkp:Idopecset>MII…</hkp:Idopecset>
                  <hkp:ValaszTitkositas>true</hkp:ValaszTitkositas>
                  <hkp:ValaszUtvonal>1</hkp:ValaszUtvonal>
                  <hkp:Rendszeruzenet>false</hkp:Rendszeruzenet>
                  <hkp:Tarterulet>0</hkp:Tarterulet>
               </hkp:DokumentumAdatok>
               <hkp:DokumentumAdatok href="504383394201407231547285395">
                  <hkp:Felado>
                     <hkp:HivatalFelado>
                        <hkp:RovidNev>TESZTHKPGI</hkp:RovidNev>
                        <hkp:Nev>teszt hkp gi</hkp:Nev>
                        <hkp:MAKKod>012345678</hkp:MAKKod>
                        <hkp:KRID>504383394</hkp:KRID>
                     </hkp:HivatalFelado>
                  </hkp:Felado>
                  <hkp:ErkeztetesiSzam>504383394201407231547285395</hkp:ErkeztetesiSzam>
                  <hkp:HivatkozasiSzam>473847878968976324</hkp:HivatkozasiSzam>
                  <hkp:DokTipusHivatal>TESZTHKPGI</hkp:DokTipusHivatal>
                  <hkp:DokTipusAzonosito>krgi_errors</hkp:DokTipusAzonosito>
                  <hkp:DokTipusLeiras>project: krgi_errors</hkp:DokTipusLeiras>
                  <hkp:Megjegyzes>megjegyzes</hkp:Megjegyzes>
                  <hkp:FileNev>lorem.pdf</hkp:FileNev>
                  <hkp:ErvenyessegiDatum>2014-08-22T15:47:16+0200</hkp:ErvenyessegiDatum>
                  <hkp:ErkeztetesiDatum>2014-07-23T13:47:16.000Z</hkp:ErkeztetesiDatum>
                  <hkp:Kezbesitettseg>0</hkp:Kezbesitettseg>
                  <hkp:Idopecset>MII…</hkp:Idopecset>
                  <hkp:ValaszTitkositas>false</hkp:ValaszTitkositas>
                  <hkp:ValaszUtvonal>1</hkp:ValaszUtvonal>
                  <hkp:Rendszeruzenet>false</hkp:Rendszeruzenet>
                  <hkp:Tarterulet>0</hkp:Tarterulet>
               </hkp:DokumentumAdatok>
            </hkp:DokumentumAdatokLetoltesValasz>
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

		$kerdesNode 	= $this->document->createElement("hkp:DokumentumAdatokLetoltesKerdes");

		$subNode 		= $this->document->createElement("hkp:PostafiokAlapjan");

      $dataNodes     = array();


      if (isset($data['EredmenyekSzama'])) {


         $dataNodes[] = $this->document->createElement("hkp:EredmenyekSzama", $data['EredmenyekSzama']);


      }

      if (isset($data['DokumentumTipusAzonosito'])) {


         $dataNodes[] = $this->document->createElement("hkp:DokumentumTipusAzonosito", $data['DokumentumTipusAzonosito']);


      }

      if (isset($data['FeladoTipusa'])) {


         $dataNodes[] = $this->document->createElement("hkp:FeladoTipusa", $data['FeladoTipusa']);


      }

		foreach ($dataNodes as $dataNode) {
			
			$subNode->appendChild($dataNode);
		
		}

		$kerdesNode->appendChild($subNode);
		$formNode->appendChild($kerdesNode);

	}

}
