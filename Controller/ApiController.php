<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Controller;

use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use \Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\XmlParser;

use \Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Entity\AllampolgarFelado;
use \Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Entity\HivatalFelado;
use \Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Dokumentum;
use \Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Entity\Nyomtatvany;

use \Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Resque\Job\StoreBoritekJob;
use \Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Exception\ApiException;

use \Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\GIPostaFiokLekerdezes as PostafiokService;
use \Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Curl\DokumentumokLekerdezeseGepiInterfeszAltal as DokumentumService;

class ApiController extends Controller
{

    /**
     * @Route("/api/call/postafiok_lekerdezes")
     * @Template()
     */
    public function postafiokAction()
    {

        $resque     = $this->get('bcc_resque.resque');
    	$service 	= $this->get("hivatali_kapu.postafiok_lekerdezes");
        
        $service->query(PostafiokService::POLGAR, "BUK01_15_EVES")->andWhere(PostafiokService::OSSZES);

        if (!$service->execute()) {

            // hkp hiba, valoszinuleg dobunk egy exceptiont, vagy elnyeljük.

            throw new ApiException($service->getErrorMessage(), $service->getErrorCode());

        
        }

        print $service->getOlvasatlanUzenetekSzama();
        
        return array(
            'osszes' => $service->getOlvasatlanUzenetekSzama()
        );
    
    }

    /**
     * @Route("/api/call/dokumentum_lekerdezes")
     * @Template("ThinkbigHivataliKapuBundle::Api:teszt.html.twig")
     */
    public function dokumentumAction()
    {

        $resque     = $this->get('bcc_resque.resque');
        $service    = $this->get("hivatali_kapu.dokumentum_lekerdezes");
        
        $service->query();

        if (!$service->execute()) {

            // hkp hiba, valoszinuleg dobunk egy exceptiont, vagy elnyeljük.

            throw new ApiException($service->getErrorMessage(), $service->getErrorCode());

        }

        $service->process();

        return array();
    
    }

    /**
     * @Route("/api/call/dokumentum_visszaigazolas")
     * @Template("ThinkbigHivataliKapuBundle:Api:postafiok.html.twig")
     */
    public function visszaigazolasAction(Request $request)
    {

        $resque     = $this->get('bcc_resque.resque');
        $service    = $this->get("hivatali_kapu.olvasas_visszaigazolas");
        
        $service->setConfirmation('200295979201505051151196333', false);

        if (!$service->execute()) {

            // hkp hiba, valoszinuleg dobunk egy exceptiont, vagy elnyeljük.

            throw new ApiException($service->getErrorMessage(), $service->getErrorCode());

        }
        
        return array();
    
    }

}
