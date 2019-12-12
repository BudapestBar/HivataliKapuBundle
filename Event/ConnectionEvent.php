<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Event;

use Symfony\Component\EventDispatcher\Event;

class ConnectionEvent extends Event
{

    private $request;
    private $response;
    private $level;

    /**
     */
    public function __construct($request, $response, $level)
    {

        $this->request   = $request;
        $this->response  = $response;
        $this->level     = $level;
        
    }

    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Gets the value of response.
     *
     * @return string
     */
    public function getResponse()
    {

        return $this->response;
    
    }

    public function getLevel()
    {
        return $this->level;
    }

}