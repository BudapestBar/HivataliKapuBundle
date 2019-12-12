<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class HivataliKapuExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {

        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (isset($config['enabled']) && $config['enabled']) {

            $container->setParameter('hivatali_kapu.url', $config['url']);
        //    $container->setParameter('hivatali_kapu.felhasznalo', $config['felhasznalo']);
        //    $container->setParameter('hivatali_kapu.wsse.username', $config['wsse']['username']);
        //    $container->setParameter('hivatali_kapu.wsse.password', $config['wsse']['password']);

            $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
            $loader->load('services.yml');
        }


        
    }

}
