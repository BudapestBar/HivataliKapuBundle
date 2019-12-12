<?php

namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\DependencyInjection\Compiler\SoapServiceCompilerPass;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\DependencyInjection\HivataliKapuExtension;

class ThinkbigHivataliKapuBundle extends Bundle
{

	public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new SoapServiceCompilerPass());
    }

    public function getContainerExtension()
    {

        return new HivataliKapuExtension();
    
    }

    public function getAlias() {

    	return 'hivatali_kapu';

    }


}
