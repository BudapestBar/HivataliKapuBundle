<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

class SoapServiceCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
    	/*
        if (!$container->has('hivatali_kapu.client')) {
            return;
        }

        $clientDefinition   = $container->getDefinition('hivatali_kapu.client'); 
        $taggedServices     = $container->findTaggedServiceIds('hivatali_kapu.soapservice');

        //$clientDefinition->addMethodCall('setUrl', array("%hivatali_kapu.url%"));

        foreach ($taggedServices as $service => $tag) {
           
        	$definition = $container->getDefinition($service);   
              
			$definition->addMethodCall('setSoapUsername', array("%hivatali_kapu.wsse.username%"));
			$definition->addMethodCall('setSoapPassword', array("%hivatali_kapu.wsse.password%"));

        }
        */
    }
}