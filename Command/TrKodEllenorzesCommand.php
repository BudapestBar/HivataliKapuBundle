<?php

// src/Acme/DemoBundle/Command/GreetCommand.php
namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Helper\Table;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message\TrKodEllenorzes as TrKodEllenorzesMessage;


class TrKodEllenorzesCommand extends ContainerAwareCommand {

	protected function configure()
    {
        $this
            ->setName('hivatalikapu:api:trkod_ellenorzes')
            ->setDescription('Tranzakciós kód ellenőrzése')
            ->addArgument('trkod', InputArgument::REQUIRED, 'Tranzakciós kód')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $trkod   = $input->getArgument('trkod');

        $service = $this->getContainer()->get("hivatali_kapu.trkod_ellenorzes");

        $message = new TrKodEllenorzesMessage();

        $message->setSoapData($trkod);
        
        if (!$service->send($message)) {

            // hkp hiba, valoszinuleg dobunk egy exceptiont, vagy elnyeljük.

            //throw new ApiException($service->getErrorMessage(), $service->getErrorCode());
            $output->writeln($service->getErrorMessage());
            return;

        }

        $data = $service->process();

        var_dump($data);
        
        return;

    }

}