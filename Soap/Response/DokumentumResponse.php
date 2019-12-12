<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response;

/**
* 
*/
final class DokumentumResponse {

	private $Felado;
	private $ErkeztetesiSzam;
	private $HivatkozasiSzam;
	private $DokTipusHivatal;
	private $DokTipusAzonosito;
	private $DokTipusLeiras;
	private $Megjegyzes;
	private $FileNev;
	private $ErvenyessegiDatum;
	private $ErkeztetesiDatum;
	private $Idopecset;
	

    /**
     * @return mixed
     */
    public function getFelado()
    {
        return $this->Felado;
    }

    /**
     * @param mixed $Felado
     *
     * @return self
     */
    public function setFelado($Felado)
    {
        $this->Felado = $Felado;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getErkeztetesiSzam()
    {
        return $this->ErkeztetesiSzam;
    }

    /**
     * @param mixed $ErkeztetesiSzam
     *
     * @return self
     */
    public function setErkeztetesiSzam($ErkeztetesiSzam)
    {
        $this->ErkeztetesiSzam = $ErkeztetesiSzam;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getHivatkozasiSzam()
    {
        return $this->HivatkozasiSzam;
    }

    /**
     * @param mixed $HivatkozasiSzam
     *
     * @return self
     */
    public function setHivatkozasiSzam($HivatkozasiSzam)
    {
        $this->HivatkozasiSzam = $HivatkozasiSzam;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDokTipusHivatal()
    {
        return $this->DokTipusHivatal;
    }

    /**
     * @param mixed $DokTipusHivatal
     *
     * @return self
     */
    public function setDokTipusHivatal($DokTipusHivatal)
    {
        $this->DokTipusHivatal = $DokTipusHivatal;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDokTipusAzonosito()
    {
        return $this->DokTipusAzonosito;
    }

    /**
     * @param mixed $DokTipusAzonosito
     *
     * @return self
     */
    public function setDokTipusAzonosito($DokTipusAzonosito)
    {
        $this->DokTipusAzonosito = $DokTipusAzonosito;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDokTipusLeiras()
    {
        return $this->DokTipusLeiras;
    }

    /**
     * @param mixed $DokTipusLeiras
     *
     * @return self
     */
    public function setDokTipusLeiras($DokTipusLeiras)
    {
        $this->DokTipusLeiras = $DokTipusLeiras;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMegjegyzes()
    {
        return $this->Megjegyzes;
    }

    /**
     * @param mixed $Megjegyzes
     *
     * @return self
     */
    public function setMegjegyzes($Megjegyzes)
    {
        $this->Megjegyzes = $Megjegyzes;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFileNev()
    {
        return $this->FileNev;
    }

    /**
     * @param mixed $FileNev
     *
     * @return self
     */
    public function setFileNev($FileNev)
    {
        $this->FileNev = $FileNev;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getErvenyessegiDatum()
    {
        return $this->ErvenyessegiDatum;
    }

    /**
     * @param mixed $ErvenyessegiDatum
     *
     * @return self
     */
    public function setErvenyessegiDatum($ErvenyessegiDatum)
    {
        $this->ErvenyessegiDatum = $ErvenyessegiDatum;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getErkeztetesiDatum()
    {
        return $this->ErkeztetesiDatum;
    }

    /**
     * @param mixed $ErkeztetesiDatum
     *
     * @return self
     */
    public function setErkeztetesiDatum($ErkeztetesiDatum)
    {
        $this->ErkeztetesiDatum = $ErkeztetesiDatum;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getIdopecset()
    {
        return $this->Idopecset;
    }

    /**
     * @param mixed $Idopecset
     *
     * @return self
     */
    public function setIdopecset($Idopecset)
    {
        $this->Idopecset = $Idopecset;

        return $this;
    }
}