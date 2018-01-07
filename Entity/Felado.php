<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\ArrayCollection;

use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="HivataliKapuBundle_Felado")
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"felado" = "Felado", "allampolgar" = "AllampolgarFelado", "hivatal" = "HivatalFelado"})
 */
class Felado
{

    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $nev;

    /**
     * @ORM\OneToMany(targetEntity="BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Dokumentum", mappedBy="Felado", orphanRemoval=true)
     */
    protected $Dokumentumok;

    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    public function __construct() {

    	$this->Dokumentumok = new ArrayCollection();

    }

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
     * Gets the value of nev.
     *
     * @return mixed
     */
    public function getNev()
    {
        return $this->nev;
    }
    
    /**
     * Sets the value of nev.
     *
     * @param mixed $nev the nev 
     *
     * @return self
     */
    public function setNev($nev)
    {
        $this->nev = $nev;

        return $this;
    }

    /**
     * Gets the value of Dokumentumok.
     *
     * @return mixed
     */
    public function getDokumentumok()
    {

        return $this->Dokumentumok->toArray();
    
    }

    /**
     * Sets the value of Dokumentumok.
     *
     * @param mixed $Dokumentumok the dokumentumok
     *
     * @return self
     */
    protected function addDokumentum(Dokumentum $dokumentum)
    {

        if ($this->Dokumentumok->contains($dokumentum)) {

            $this->Dokumentumok->add($adoszam);
        
        }

        return $this;
    }

    public function removeDokumentum(Dokumentum $dokumentum)
    {

        if ($this->Dokumentumok->contains($dokumentum)) {

            $this->Dokumentumok->removeElement($dokumentum);
        
        }

        return $this;
    
    }
}