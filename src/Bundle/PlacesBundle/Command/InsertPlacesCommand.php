<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class InsertPlacesCommand extends ContainerAwareCommand {

    // use $em with persist & flush..
    protected function configure() {
        $this
                ->setName('places:insert-places')
                ->setDescription('Insert places by type.')
                ->addArgument(
                        'type', InputArgument::OPTIONAL, 'Place type !'
                )
                ->addOption(
                        'yell', null, InputOption::VALUE_NONE, 'If set, the task message will yell in uppercase letters'
                )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $apiKey = $this->getContainer()->getParameter('api_key');
        $latLng = $this->getContainer()->getParameter('latLng');
        $radius = 1011;
        $type = $input->getArgument('type');
        $comandOp = $this->getContainer()->get('commandOperations');
        $output->writeln($comandOp->addPlaces($type, $apiKey, $latLng, $radius));
    }
}
