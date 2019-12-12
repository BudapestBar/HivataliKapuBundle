<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Criteria;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Allampolgar
 * @ORM\Table(name="HivataliKapuBundle_AllampolgarFelado")
 * @ORM\Entity()
 */
class AllampolgarFelado extends Felado
{

    /**
     * @ORM\Column(type="string")
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     */
    protected $kapcsolatikod;

    public function __construct() {

    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of kapcsolatikod.
     *
     * @return mixed
     */
    public function getKapcsolatikod()
    {
        return $this->kapcsolatikod;
    }

    /**
     * Sets the value of kapcsolatikod.
     *
     * @param mixed $kapcsolatikod the kapcsolatikod
     *
     * @return self
     */
    public function setKapcsolatikod($kapcsolatikod)
    {
        $this->kapcsolatikod = $kapcsolatikod;

        return $this;
    }
}
