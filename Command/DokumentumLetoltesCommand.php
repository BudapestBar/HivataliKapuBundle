<?php

// src/Acme/DemoBundle/Command/GreetCommand.php
namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Helper\Table;




class DokumentumLetoltesCommand extends ContainerAwareCommand {

	protected function configure()
    {
        $this
            ->setName('hivatalikapu:api:dokumentum_letoltes')
            ->setDescription('Hivatali kapuról letöltött kr állomány kicsomagolása')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $service    = $this->getContainer()->get("hivatali_kapu.dokumentum_lekerdezes");
        
        $service->query();

        if (!$service->execute()) {

            // hkp hiba, valoszinuleg dobunk egy exceptiont, vagy elnyeljük.

            //throw new ApiException($service->getErrorMessage(), $service->getErrorCode());
            $output->writeln($service->getErrorMessage());
            return;

        }

        $service->process();

        return;

    }

}