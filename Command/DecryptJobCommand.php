<?php

// src/Acme/DemoBundle/Command/GreetCommand.php
namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Helper\Table;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Curl;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Resque\Job\DecryptJob;


class DecryptJobCommand extends ContainerAwareCommand {

	protected function configure()
    {
        $this
            ->setName('hivatalikapu:krboritek:decrypt')
            ->setDescription('Hivatali kapuról letöltött kr állomány kicsomagolása')
            ->addArgument('id', InputArgument::REQUIRED, 'A kicsomagolandó id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $id     = $input->getArgument('id');

        $resque = $this->getContainer()->get('bcc_resque.resque');

        // create your job
        $job = new DecryptJob();
        $job->args = array(
            
            'id'    => $id
        );

        // enqueue your job
        $resque->enqueue($job);

        return;

    }

}