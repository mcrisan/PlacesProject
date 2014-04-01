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
                ->addOption(
                        'yell', null, InputOption::VALUE_NONE, 'If set, the task message will yell in uppercase letters'
                )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $type = $input->getArgument('type');
        $apiKey = $this->getContainer()->getParameter('api_key');
        $placeop = $this->getContainer()->get('placeOperation');
        $placeDet = $this->getContainer()->get('insertalldetails');
        $place = $this->getContainer()->get('insertplace');
        $output->writeln($this->addAllPlaces($type, $placeop, $placeDet, $place));
    }

    private function addAllPlaces($type, $placeop, $placeDet, $place) {
        $doctrine = $this->getContainer()->get('doctrine');
        $apiKey = $this->getContainer()->getParameter('api_key');
        $nr=0;
      
        $p1 = array('x' => 46.701731, 'y' => 23.748214);
        $p2 = array('x' => 46.815099, 'y' => 23.459823);
        
        $step = 0.01; // 1/100 -> aprox. 1km 11m
        $radius = 1011; // 1011 m
        
        $x = 46.77461;
        $y = 23.59215;
        $type='establishment';
        $id = $placeop->getLastPlaceId();
        echo $id;

        $p1['x'] =46.76;
        $p2['x'] =46.77;
        $mes = "Inserting places from lat ".$p1['x'] ." to lat " .$p2['x'] ;
        $placeop->logMessage($mes);
        $mes = "Inserting places from long ".$p1['y'] ." to long " .$p1['y'] ;
        $placeop->logMessage($mes);
        for ($x = $p1['x']; $x <= $p2['x']; $x+=$step)
        {
            for ($y = $p1['y']; $y >= $p2['y']; $y-=$step)
            {
                $nr++;
                $place->addPlaces($type, $apiKey, $x.','.$y, $radius);
            }
        }

        $mes = "We have made: ". $nr ." querys to search for places";
        echo "3486";
        $id =3486;
        $placeop->logMessage($mes);
        $placeDet->addAllPlacesDetails($apiKey, $id );
               
    }

}