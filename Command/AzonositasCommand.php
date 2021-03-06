<?php

// src/Acme/DemoBundle/Command/GreetCommand.php
namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Command;

use Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message\Azonositas as AzonositasMessage;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Helper\Table;

use AppBundle\Entity\Kamara;

class AzonositasCommand extends ContainerAwareCommand {

	protected function configure()
    {
        $this
            ->setName('hivatalikapu:api:azonositas')
            ->setDescription('Allampolgar azonositasa')
            ->addArgument('id', InputArgument::REQUIRED, 'Adatbázis id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $service        = $this->getContainer()->get("hivatali_kapu.azonositas");
        $kamara         = $this->getContainer()->get('doctrine')->getRepository(Kamara::class)->find(1);

        $service->setHivatal($kamara);

        $message = new AzonositasMessage();

        $data = [
            'ViseltNeve'    => ['CsaladiNev' => 'Réti', 'UtoNev1' => 'László'],
            'AnyjaNeve'     => ['CsaladiNev' => 'KRISZTINKOVICH', 'UtoNev1' => 'Gabriella'],
            'SzuletesiIdo'  => '1957-06-08',
            'SzuletesiHely' => 'Budapest'

        ];

        $message->setSoapData($data);
        
        if (!$service->send($message)) {

            // hkp hiba, valoszinuleg dobunk egy exceptiont, vagy elnyeljük.

            //throw new ApiException($service->getErrorMessage(), $service->getErrorCode());
            $output->writeln($service->getErrorMessage());
            return;

        }

        $data = $service->process();

        $output->writeln($data->getKapcsolatiKod());
        
        return;

    }

}