<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap;


/**
* 
*/
class Recipient
{

	const HIVATAL 		= 'Hivatal';
	const ALLAMPOLGAR 	= 'Allampolgar';
	const CEGKAPU 		= 'Cegkapu';

	protected $azonosito;
	protected $tipus;


	/*
	hkp:Cimzett>
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
	*/
	
	public function __construct($azonosito, $tipus) {

		if (!in_array($tipus, [self::ALLAMPOLGAR, self::HIVATAL, self::CEGKAPU])) {

			throw new \Exception("Invalid message recipient type", 1);
			
		}

		$this->tipus 		= $tipus;
		$this->azonosito 	= $azonosito;


	}


    /**
     * @return mixed
     */
    public function getAzonosito()
    {
        return $this->azonosito;
    }

    /**
     * @return mixed
     */
    public function getTipus()
    {
        return $this->tipus;
    }
}