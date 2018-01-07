<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap;

use League\Flysystem\File;

/**
* 
*/
final class Attachment
{

	protected $file;
	protected $fileNev;
	protected $dokTipusHivatal;
	protected $dokTipusAzonosito;
	protected $dokTipusLeiras;
	protected $megjegyzes;
	protected $valaszUtvonal;
	protected $valaszTitkositas;
	protected $rendszerUzenet;
	protected $eTertiveveny;
	protected $lenyomat;


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
	
	public function __construct(File $file, array $options = []) {

		$this->file 				= $file;

		$this->fileNev 				= $options['FileNev'] ?? pathinfo($file->getPath(), PATHINFO_BASENAME);
		$this->dokTipusHivatal 		= $options['DokTipusHivatal'] ?? 'Ügyvédi Kamara';
		$this->dokTipusAzonosito	= $options['DokTipusAzonosito'] ?? '1';
		$this->dokTipusLeiras 		= $options['DokTipusLeiras'] ?? '1';
		$this->megjegyzes 			= $options['Megjegyzes'] ?? '1';
		$this->valaszUtvonal 		= $options['ValaszUtvonal'] ?? 0;
		$this->valaszTitkositas 	= $options['ValaszTitkositas'] ?? false;
		$this->rendszerUzenet 		= $options['RendszerUzenet'] ?? false;
		$this->eTertiveveny 		= $options['ETertiveveny'] ?? false;
		$this->lenyomat 			= $options['Lenyomat'] ?? sha1($file->read());

	}


    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     *
     * @return self
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileNev()
    {
        return $this->fileNev;
    }

    /**
     * @param mixed $fileNev
     *
     * @return self
     */
    public function setFileNev($fileNev)
    {
        $this->fileNev = $fileNev;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDokTipusHivatal()
    {
        return $this->dokTipusHivatal;
    }

    /**
     * @param mixed $dokTipusHivatal
     *
     * @return self
     */
    public function setDokTipusHivatal($dokTipusHivatal)
    {
        $this->dokTipusHivatal = $dokTipusHivatal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDokTipusAzonosito()
    {
        return $this->dokTipusAzonosito;
    }

    /**
     * @param mixed $dokTipusAzonosito
     *
     * @return self
     */
    public function setDokTipusAzonosito($dokTipusAzonosito)
    {
        $this->dokTipusAzonosito = $dokTipusAzonosito;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDokTipusLeiras()
    {
        return $this->dokTipusLeiras;
    }

    /**
     * @param mixed $dokTipusLeiras
     *
     * @return self
     */
    public function setDokTipusLeiras($dokTipusLeiras)
    {
        $this->dokTipusLeiras = $dokTipusLeiras;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMegjegyzes()
    {
        return $this->megjegyzes;
    }

    /**
     * @param mixed $megjegyzes
     *
     * @return self
     */
    public function setMegjegyzes($megjegyzes)
    {
        $this->megjegyzes = $megjegyzes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValaszUtvonal()
    {
        return $this->valaszUtvonal;
    }

    /**
     * @param mixed $valaszUtvonal
     *
     * @return self
     */
    public function setValaszUtvonal($valaszUtvonal)
    {
        $this->valaszUtvonal = $valaszUtvonal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getValaszTitkositas()
    {
        return $this->valaszTitkositas;
    }

    /**
     * @param mixed $valaszTitkositas
     *
     * @return self
     */
    public function setValaszTitkositas($valaszTitkositas)
    {
        $this->valaszTitkositas = $valaszTitkositas;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getETertiveveny()
    {
        return $this->eTertiveveny;
    }

    /**
     * @param mixed $eTertiveveny
     *
     * @return self
     */
    public function setETertiveveny($eTertiveveny)
    {
        $this->eTertiveveny = $eTertiveveny;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLenyomat()
    {
        return $this->lenyomat;
    }

    /**
     * @param mixed $lenyomat
     *
     * @return self
     */
    public function setLenyomat($lenyomat)
    {
        $this->lenyomat = $lenyomat;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getRendszerUzenet()
    {
        return $this->rendszerUzenet;
    }

    /**
     * @param mixed $rendszerUzenet
     *
     * @return self
     */
    public function setRendszerUzenet($rendszerUzenet)
    {
        $this->rendszerUzenet = $rendszerUzenet;

        return $this;
    }
}