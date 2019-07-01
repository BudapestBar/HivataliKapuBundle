<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Response;

/**
* 
*/
final class HivatalResponse extends FeladoResponse {

	private $krid;
	private $nev;
	private $rovidNev;

    

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
     * @return mixed
     */
    public function getRovidNev()
    {
        return $this->rovidNev;
    }

    /**
     * @param mixed $rovidNev
     *
     * @return self
     */
    public function setRovidNev($rovidNev)
    {
        $this->rovidNev = $rovidNev;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getKrid()
    {
        return $this->krid;
    }

    /**
     * @param mixed $krid
     *
     * @return self
     */
    public function setKrid($krid)
    {
        $this->krid = $krid;

        return $this;
    }
}