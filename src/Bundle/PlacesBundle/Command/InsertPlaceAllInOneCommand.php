<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class InsertPlaceAllInOneCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('places:insert-all-places')
                ->setDescription('Insert places ref, details, photos, reviews, by type.')
                ->addArgument(
                        'type', InputArgument::OPTIONAL, 'Place type !'
                )
                ->addArgument(
                        'wlat', InputArgument::OPTIONAL, 'Latitude of westest point !'
                )
                ->addArgument(
                        'elat', InputArgument::OPTIONAL, 'Latitude of eastest point !'
                )
                ->addOption(
                        'yell', null, InputOption::VALUE_NONE, 'If set, the task message will yell in uppercase letters'
                )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $type = $input->getArgument('type');
        $wlat = $input->getArgument('wlat');
        $elat = $input->getArgument('elat');
        $comandOp = $this->getContainer()->get('commandOperations');
        $output->writeln($comandOp->addAllPlaces($type, $wlat, $elat));
    }
}