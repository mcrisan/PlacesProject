<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\PlacesBundle\Command\InsertPlacesCommand;
use Bundle\PlacesBundle\Command\InsertPlacesDetailsCommand;
use Bundle\PlacesBundle\Command\InsertPlacesPhotosCommand;
use Bundle\PlacesBundle\Command\InsertPlaceReviewsCommand;

class InsertPlaceAllInOneCommand extends ContainerAwareCommand {

    // use $em with persist & flush..
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
        // vf. type!
        $type = $input->getArgument('type');
        $apiKey = $this->getContainer()->getParameter('api_key');
        $placeop = $this->getContainer()->get('placeop');
        //$placeop->test("vara");
        //$output->writeln($placeop->addAllPlaces($type, $apiKey));
        $output->writeln($this->addAllPlaces($type, $placeop));
    }

    private function addAllPlaces($type, $placeop) {
        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getManager();
        $apiKey = $this->getContainer()->getParameter('api_key');
        $nr=0;
//        $lat = $this->getContainer()->getParameter('lat');
//        $lng = $this->getContainer()->getParameter('lng');

        //'x' => 46.701731, 'y' => 23.748214
        //'x' => 46.815099, 'y' => 23.459823
        // p1 -> floresti 46.747154,23.491462
        // p2 -> someseni 46.786427,23.660721
        // a -> 46.781725,23.535408
        // b -> 46.777963,23.691963
        
        $p1 = array('x' => 46.701731, 'y' => 23.748214);
        $p2 = array('x' => 46.815099, 'y' => 23.459823);
        
        $step = 0.01; // 1/100 -> aprox. 1km 11m
        $radius = 1011; // 1011 m
        
        $place = new InsertPlacesCommand();

        $x = 46.77461;
        $y = 23.59215;
        $type='establishment';
        $id = $placeop->getLastPlaceId();
        echo $id;
        //$p2['x'] =46.71;
        //$p1['x'] =46.71;
        //$p2['x'] =46.72;
        $p1['x'] =46.73;
        $p2['x'] =46.735;
        $mes = "Inserting places from lat ".$p1['x'] ." to lat " .$p2['x'] ;
        $placeop->logMessage($mes);
        $mes = "Inserting places from long ".$p1['y'] ." to long " .$p1['y'] ;
        $placeop->logMessage($mes);
        for ($x = $p1['x']; $x <= $p2['x']; $x+=$step)
        {
            //echo $x.','.$p1['y'];
            //$x=46.701731;
            for ($y = $p1['y']; $y >= $p2['y']; $y-=$step)
            {
                $nr++;
                $run = $place->addPlaces($type, $apiKey, $x.','.$y, $radius, $placeop);
            //    echo '.';
            }
          //  echo $y;
          //  echo PHP_EOL;
        }
//        $id2 = $placeop->getLastPlaceId();
//        $nr_places = $id2 - $id;
//        //$nr_places = 85;
        $mes = "We have made: ". $nr ." querys to search for places";
        $placeop->logMessage($mes);
//        $mes = "We have inserted: ". $nr_places ." places";
//        $placeop->logMessage($mes);
       // $nr++;
        //exit();        
        //insert details
//        $id=2018;
        $placeDetails = new InsertPlacesDetailsCommand();
        $placeDetails->addPlacesDetails($apiKey, $placeop, $id);
        
        //$mes = "We have inserted details for: ". $nr_places ." places";
        //$placeop->logMessage($mes);
        //$nr++;

        //insert photos
        $placePhotos = new InsertPlacesPhotosCommand();
        $placePhotos->addPlacePhotos($apiKey, $placeop, $id);
        
        //$mes = "We have inserted photos for: ". $nr_places ." places";
        //$placeop->logMessage($mes);
        //$nr++;
        
        //insert reviews - run this cmd only ones (truncate reviews table before import) or recode
        // cmd is: app/console places:insert-place-reviews
        $placeReviews = new InsertPlaceReviewsCommand();
        $placeReviews->addPlaceReviews($apiKey, $placeop, $id);
        
        //$mes = "We have inserted reviews for: ". $nr_places ." places";
        //$placeop->logMessage($mes);
        
        //$mes = "We have inserted: ". $nr_places ." places";
        //$placeop->logMessage($mes);
        //$nr++;
        
        //$mes = "We have made: ". $nr_places*nr ." querys";
        //$placeop->logMessage($mes);
        
    }

}