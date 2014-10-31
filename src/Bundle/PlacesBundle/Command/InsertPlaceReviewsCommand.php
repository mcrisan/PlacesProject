<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class InsertPlaceReviewsCommand extends ContainerAwareCommand {
    
    protected function configure() {
        $this
                ->setName('places:insert-place-reviews')
                ->setDescription('Insert place reviews.')
                ->addArgument(
                        'startid', InputArgument::OPTIONAL, 'Place type !'
                );
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $apiKey = $this->getContainer()->getParameter('api_key');
        $startid = $input->getArgument('startid');
        $comandOp = $this->getContainer()->get('commandOperations');
        $output->writeln($comandOp->addAllPlacesDetails($apiKey, 
                $startid, null, false, false, 1
            )
        );
    }
}
