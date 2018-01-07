<?php

// src/Acme/DemoBundle/Command/GreetCommand.php
namespace BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Command;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Message\UjDokumentumokFeltolteseGepiInterfeszAltal as FeltoltesMessage;

use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Attachment;
use BudapestBar\Bundle\HivataliKapu\HivataliKapuBundle\Soap\Recipient;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Console\Helper\Table;

use AppBundle\Entity\Kamara;

class DokumentumFeltoltesCommand extends ContainerAwareCommand {

	protected function configure()
    {
        $this
            ->setName('hivatalikapu:postafiok:feltoltes')
            ->setDescription('Dokumentumok feltöltése')
        //    ->addArgument('id', InputArgument::REQUIRED, 'Adatbázis id')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $kamara         = $this->getContainer()->get('doctrine')->getRepository(Kamara::class)->find(1);

        $fileManager    = $this->getContainer()->get('oneup_flysystem.mount_manager')->getFilesystem('nfs');
        $soapService    = $this->getContainer()->get("hivatali_kapu.dokumentumkuldes"); 

        $soapService->setHivatal($kamara);

        $message        = new FeltoltesMessage();

        $message->addAttachment(
            new Attachment($fileManager->get('Z9D5/nyomtatvany.pdf'), [
                'DokTipusHivatal'   => $kamara,
                'DokTipusAzonosito' => 'JT-Z9D5',
                'DokTipusLeiras'    => 'Kamarai jogtanácsosi felvételi kérelem',
                'Megjegyzes'        => 'Borbély Gábor'
            ]), 
            new Recipient('a91529723997eeecbd8d02b0177cc728', Recipient::ALLAMPOLGAR)
        ); 

        $message->setSoapData();
        
        if (!$soapService->send($message)) {

            // hkp hiba, valoszinuleg dobunk egy exceptiont, vagy elnyeljük.

            //throw new ApiException($service->getErrorMessage(), $service->getErrorCode());
            $output->writeln($soapService->getErrorMessage());
            return;

        }

        $data = $soapService->process();
        
        return;

    }

}