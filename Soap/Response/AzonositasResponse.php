<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response;

/**
* 
*/
final class AzonositasResponse extends FeladoResponse {

	private $kapcsolatiKod;
	private $nev;
	private $email;

    /**
     * Gets the value of kapcsolatiKod.
     *
     * @return mixed
     */
    public function getKapcsolatiKod()
    {
        return $this->kapcsolatiKod;
    }

    /**
     * Sets the value of kapcsolatiKod.
     *
     * @param mixed $kapcsolatiKod the kapcsolati kod
     *
     * @return self
     */
    public function setKapcsolatiKod($kapcsolatiKod)
    {
        $this->kapcsolatiKod = $kapcsolatiKod;

        return $this;
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


}