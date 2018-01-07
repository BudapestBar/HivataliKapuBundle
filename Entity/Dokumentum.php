<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\ArrayCollection;

use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="HivataliKapuBundle_Dokumentum")
 */
class Dokumentum
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Felado", inversedBy="Dokumentumok")
     */
    protected $Felado;

    /**
     * @ORM\OneToOne(targetEntity="BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Nyomtatvany", mappedBy="Dokumentum", orphanRemoval=true)
     */
    protected $Nyomtatvany;

    /**
     * @ORM\Column(type="string")
     */
    protected $erkeztetesiSzam;

    /**
     * @ORM\Column(type="string")
     */
    protected $nyomtatvanyHivatal;

    /**
     * @ORM\Column(type="string")
     */
    protected $nyomtatvanyAzonosito;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $nyomtatvanyLeiras;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $megjegyzes;

    /**
     * @ORM\Column(type="string")
     */
    protected $fileNev;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    protected $ervenyessegiDatum;

    /**
     * @ORM\Column(type="datetime", nullable=true )
     */
    protected $erkeztetesiDatum;

    /**
     * @ORM\Column(type="smallint", length=1)
     */
    protected $kezbesitettseg;

    /**
     * @ORM\Column(type="text")
     */
    protected $idopecset;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $valaszTitkositas;

    /**
     * @ORM\Column(type="smallint", length=1)
     */
    protected $valaszUtvonal;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $rendszeruzenet;

    /**
     * @ORM\Column(type="smallint", length=1)
     */
    protected $tarterulet;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    protected $fileContent;

    
    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    /**
     * Gets the value of id.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Gets the value of Felado.
     *
     * @return mixed
     */
    public function getFelado()
    {
        return $this->Felado;
    }

    /**
     * Sets the value of Felado.
     *
     * @param mixed $Felado the felado
     *
     * @return self
     */
    public function setFelado($Felado)
    {
        $this->Felado = $Felado;

        return $this;
    }

    /**
     * Gets the value of Nyomtatvany.
     *
     * @return mixed
     */
    public function getNyomtatvany()
    {
        return $this->Nyomtatvany;
    }

    /**
     * Sets the value of Nyomtatvany.
     *
     * @param mixed $Nyomtatvany the kr boritek
     *
     * @return self
     */
    public function setNyomtatvany($Nyomtatvany)
    {
        $this->Nyomtatvany = $Nyomtatvany;

        return $this;
    }

    /**
     * Gets the value of erkeztetesiSzam.
     *
     * @return mixed
     */
    public function getErkeztetesiSzam()
    {
        return $this->erkeztetesiSzam;
    }

    /**
     * Sets the value of erkeztetesiSzam.
     *
     * @param mixed $erkeztetesiSzam the erkeztetesi szam
     *
     * @return self
     */
    public function setErkeztetesiSzam($erkeztetesiSzam)
    {
        $this->erkeztetesiSzam = $erkeztetesiSzam;

        return $this;
    }

    /**
     * Gets the value of nyomtatvanyHivatal.
     *
     * @return mixed
     */
    public function getNyomtatvanyHivatal()
    {
        return $this->nyomtatvanyHivatal;
    }

    /**
     * Sets the value of nyomtatvanyHivatal.
     *
     * @param mixed $nyomtatvanyHivatal the nyomtatvany hivatal
     *
     * @return self
     */
    public function setNyomtatvanyHivatal($nyomtatvanyHivatal)
    {
        $this->nyomtatvanyHivatal = $nyomtatvanyHivatal;

        return $this;
    }

    /**
     * Gets the value of nyomtatvanyAzonosito.
     *
     * @return mixed
     */
    public function getNyomtatvanyAzonosito()
    {
        return $this->nyomtatvanyAzonosito;
    }

    /**
     * Sets the value of nyomtatvanyAzonosito.
     *
     * @param mixed $nyomtatvanyAzonosito the nyomtatvany azonosito
     *
     * @return self
     */
    public function setNyomtatvanyAzonosito($nyomtatvanyAzonosito)
    {
        $this->nyomtatvanyAzonosito = $nyomtatvanyAzonosito;

        return $this;
    }

    /**
     * Gets the value of nyomtatvanyLeiras.
     *
     * @return mixed
     */
    public function getNyomtatvanyLeiras()
    {
        return $this->nyomtatvanyLeiras;
    }

    /**
     * Sets the value of nyomtatvanyLeiras.
     *
     * @param mixed $nyomtatvanyLeiras the nyomtatvany leiras
     *
     * @return self
     */
    public function setNyomtatvanyLeiras($nyomtatvanyLeiras)
    {
        $this->nyomtatvanyLeiras = $nyomtatvanyLeiras;

        return $this;
    }

    /**
     * Gets the value of megjegyzes.
     *
     * @return mixed
     */
    public function getMegjegyzes()
    {
        return $this->megjegyzes;
    }

    /**
     * Sets the value of megjegyzes.
     *
     * @param mixed $megjegyzes the megjegyzes
     *
     * @return self
     */
    public function setMegjegyzes($megjegyzes)
    {
        $this->megjegyzes = $megjegyzes;

        return $this;
    }

    /**
     * Gets the value of fileNev.
     *
     * @return mixed
     */
    public function getFileNev()
    {
        return $this->fileNev;
    }

    /**
     * Sets the value of fileNev.
     *
     * @param mixed $fileNev the fajl nev
     *
     * @return self
     */
    public function setFileNev($fileNev)
    {
        $this->fileNev = $fileNev;

        return $this;
    }

    /**
     * Gets the value of ervenyessegiDatum.
     *
     * @return mixed
     */
    public function getErvenyessegiDatum()
    {
        return $this->ervenyessegiDatum;
    }

    /**
     * Sets the value of ervenyessegiDatum.
     *
     * @param mixed $ervenyessegiDatum the ervenyessegi datum
     *
     * @return self
     */
    public function setErvenyessegiDatum($ervenyessegiDatum)
    {
        $this->ervenyessegiDatum = $ervenyessegiDatum;

        return $this;
    }

    /**
     * Gets the value of erkeztetesiDatum.
     *
     * @return mixed
     */
    public function getErkeztetesiDatum()
    {
        return $this->erkeztetesiDatum;
    }

    /**
     * Sets the value of erkeztetesiDatum.
     *
     * @param mixed $erkeztetesiDatum the erkeztetesi datum
     *
     * @return self
     */
    public function setErkeztetesiDatum($erkeztetesiDatum)
    {
        $this->erkeztetesiDatum = $erkeztetesiDatum;

        return $this;
    }

    /**
     * Gets the value of kezbesitettseg.
     *
     * @return mixed
     */
    public function getKezbesitettseg()
    {
        return $this->kezbesitettseg;
    }

    /**
     * Sets the value of kezbesitettseg.
     *
     * @param mixed $kezbesitettseg the kezbesitettseg
     *
     * @return self
     */
    public function setKezbesitettseg($kezbesitettseg)
    {
        $this->kezbesitettseg = $kezbesitettseg;

        return $this;
    }

    /**
     * Gets the value of idopecset.
     *
     * @return mixed
     */
    public function getIdopecset()
    {
        return $this->idopecset;
    }

    /**
     * Sets the value of idopecset.
     *
     * @param mixed $idopecset the idopecset
     *
     * @return self
     */
    public function setIdopecset($idopecset)
    {
        $this->idopecset = $idopecset;

        return $this;
    }

    /**
     * Gets the value of valaszTitkositas.
     *
     * @return mixed
     */
    public function getValaszTitkositas()
    {
        return $this->valaszTitkositas;
    }

    /**
     * Sets the value of valaszTitkositas.
     *
     * @param mixed $valaszTitkositas the valasz titkositas
     *
     * @return self
     */
    public function setValaszTitkositas($valaszTitkositas)
    {
        $this->valaszTitkositas = $valaszTitkositas;

        return $this;
    }

    /**
     * Gets the value of valaszUtvonal.
     *
     * @return mixed
     */
    public function getValaszUtvonal()
    {
        return $this->valaszUtvonal;
    }

    /**
     * Sets the value of valaszUtvonal.
     *
     * @param mixed $valaszUtvonal the valasz utvonal
     *
     * @return self
     */
    public function setValaszUtvonal($valaszUtvonal)
    {
        $this->valaszUtvonal = $valaszUtvonal;

        return $this;
    }

    /**
     * Gets the value of rendszeruzenet.
     *
     * @return mixed
     */
    public function getRendszeruzenet()
    {
        return $this->rendszeruzenet;
    }

    /**
     * Sets the value of rendszeruzenet.
     *
     * @param mixed $rendszeruzenet the rendszeruzenet
     *
     * @return self
     */
    public function setRendszeruzenet($rendszeruzenet)
    {
        $this->rendszeruzenet = $rendszeruzenet;

        return $this;
    }

    /**
     * Gets the value of tarterulet.
     *
     * @return mixed
     */
    public function getTarterulet()
    {
        return $this->tarterulet;
    }

    /**
     * Sets the value of tarterulet.
     *
     * @param mixed $tarterulet the tarterulet
     *
     * @return self
     */
    public function setTarterulet($tarterulet)
    {
        $this->tarterulet = $tarterulet;

        return $this;
    }

    /**
     * Gets the value of binary.
     *
     * @return mixed
     */
    public function getBinary()
    {
        return $this->fileContent;
    }

    /**
     * Sets the value of binary.
     *
     * @param mixed $binary the binary
     *
     * @return self
     */
    public function setBinary($binary)
    {
        $this->fileContent = $binary;

        return $this;
    }
}