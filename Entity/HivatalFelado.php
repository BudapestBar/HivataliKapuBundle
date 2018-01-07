<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Allampolgar
 * @ORM\Table(name="HivataliKapuBundle_HivatalFelado")
 * @ORM\Entity()
 */
class HivatalFelado extends Felado
{

    
    /**
     * @ORM\Column(type="string")
     */
    protected $rovidNev;

    /**
     * @ORM\Column(type="string")
     */
    protected $MakKod;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $KrId;


    public function __construct() {

    }



    /**
     * Gets the value of rovidNev.
     *
     * @return mixed
     */
    public function getRovidNev()
    {
        return $this->rovidNev;
    }

    /**
     * Sets the value of rovidNev.
     *
     * @param mixed $rovidNev the rovid nev
     *
     * @return self
     */
    public function setRovidNev($rovidNev)
    {
        $this->rovidNev = $rovidNev;

        return $this;
    }

    /**
     * Gets the value of MakKod.
     *
     * @return mixed
     */
    public function getMakKod()
    {
        return $this->MakKod;
    }

    /**
     * Sets the value of MakKod.
     *
     * @param mixed $MakKod the mak kod
     *
     * @return self
     */
    public function setMakKod($MakKod)
    {
        $this->MakKod = $MakKod;

        return $this;
    }

    /**
     * Gets the value of KrId.
     *
     * @return mixed
     */
    public function getKrId()
    {
        return $this->KrId;
    }

    /**
     * Sets the value of KrId.
     *
     * @param mixed $KrId the kr id
     *
     * @return self
     */
    public function setKrId($KrId)
    {
        $this->KrId = $KrId;

        return $this;
    }
}
