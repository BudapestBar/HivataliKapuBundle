<?php

// src/Acme/DemoBundle/Command/GreetCommand.php
namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Command;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message\ViszontAzonositas as ViszontAzonositasMessage;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Helper\Table;

class ViszontAzonositasCommand extends ContainerAwareCommand {

	protected function configure()
    {
        $this
            ->setName('hivatalikapu:api:viszontazonositas')
            ->setDescription('Kapcsolati kod alapjan azonositasa')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $service = $this->getContainer()->get("hivatali_kapu.viszontazonositas");

        $message = new ViszontAzonositasMessage();

        $message->setKapcsolatiKod('58949fff45b34ef49fae4ce3feb7ace3');

        $data = [
            'ViseltNeve'    => ['CsaladiNev' => 'Paller', 'UtoNev1' => 'Ádám'],
            'AnyjaNeve'     => ['CsaladiNev' => 'Érdi', 'UtoNev1' => 'Emőke', 'UtoNev2' => 'Klára'],
            'SzuletesiIdo'  => '1977-07-18',
            'SzuletesiHely' => 'Budapest 07'

        ];

        $message->setSoapData($data);
        
        if (!$service->send($message)) {

            // hkp hiba, valoszinuleg dobunk egy exceptiont, vagy elnyeljük.

            //throw new ApiException($service->getErrorMessage(), $service->getErrorCode());
            $output->writeln($service->getErrorMessage());
            return;

        }

        $data = $service->process();

                
        return;

    }

}