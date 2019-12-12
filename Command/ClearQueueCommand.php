<?php

// src/Acme/DemoBundle/Command/GreetCommand.php
namespace Thinkbig\Bundle\HivataliKapu\HivataliKapuBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Helper\Table;


class ClearQueueCommand extends ContainerAwareCommand {

	protected function configure()
    {
        $this
            ->setName('hivatalikapu:queue:clear')
            ->setDescription('Hivatali kapuról letöltött kr állomány kicsomagolása')
            ->addArgument('id', InputArgument::REQUIRED, 'A kicsomagolandó id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $id     = $input->getArgument('id');

        $resque = $this->getContainer()->get('bcc_resque.resque');

        $resque->clearQueue($id);

        return;

    }

}