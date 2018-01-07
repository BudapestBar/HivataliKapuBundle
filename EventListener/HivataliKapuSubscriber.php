<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Event\ConnectionEvent;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Event\HivataliKapuEvents;

class HivataliKapuSubscriber implements EventSubscriberInterface
{

    protected $logger;
    protected $path;

    /**
     * @param @container
     */
    public function __construct($logger)
    {
        $this->logger = $logger;
    }

    public function setPath($path) {

        $this->path = $path;
    }

    public static function getSubscribedEvents()
    {
        return array(
            HivataliKapuEvents::HKP_API_CONNECTION => array('onConnection', 0),
            HivataliKapuEvents::HKP_API_DOKUMENTUMOK_LEKERDEZESE => array('onConnection', 0),
            HivataliKapuEvents::HKP_API_POSTAFIOK_LEKERDEZESE => array('onConnection', 0),
        );
    }

    /**
     * @param AppBundle\Events\MessageUserEvent $event
     */
    public function onConnection(ConnectionEvent $event)
    {

        $uniqid         = uniqid('', true); // with entropy

        $requestXml     = sprintf("%s%s_request.xml", $this->path."/Soap/", $uniqid);
        $responseXml    = sprintf("%s%s_response.xml", $this->path."/Soap/", $uniqid);

        file_put_contents($requestXml, $event->getRequest());

        if ($event->getLevel() == 0) {

            file_put_contents($responseXml, $event->getResponse());

            $this->logger->notice(
                'Connected to Hivatali Kapu', 
                [
                    'requestXml' => $requestXml,
                    'responseXml' => $responseXml,
                    'request' => $event->getRequest(), 
                    'response' => $event->getResponse(), 
                    'uid' => $uniqid
                ]
            );


        }
        else {

            $this->logger->error(
                'Faild to connect to Hivatali Kapu', 
                [
                    'requestXml'    => $requestXml,
                    'request'       => $event->getRequest(), 
                    'uid'           => $uniqid
                ]
            );

        }

        
        
    }
}