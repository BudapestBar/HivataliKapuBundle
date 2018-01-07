<?php

namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\DependencyInjection\Compiler\SoapServiceCompilerPass;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\DependencyInjection\HivataliKapuExtension;

class BudapestBarHivataliKapuBundle extends Bundle
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
