<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InsertAllDetailsCommand extends ContainerAwareCommand {
    // use $em with persist & flush..
    protected function configure() {
        $this
                ->setName('places:insert-all-details')
                ->setDescription('Insert all details for place.')
                ->addArgument(
                        'startid', InputArgument::OPTIONAL, 'Place type !'
                );
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $apiKey = $this->getContainer()->getParameter('api_key');
        if (!$apiKey) {
            $output->writeln("Invalid api key.");
            exit();
        }
        $startid = $input->getArgument('startid');
        $comandOp = $this->getContainer()->get('commandOperations');
        $output->writeln($comandOp->addAllPlacesDetails($apiKey, $startid, null, true, true, true));
    }
}
