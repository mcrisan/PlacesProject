<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class InsertPlaceAllInOneCommand extends ContainerAwareCommand {

        private $placeop;
        private $alldet;
        
//        public function __construct( PlaceOperations $placeop, InsertAllDetailsCommand $alldet) {
//        $this->alldet = $alldet;
//        $this->placeop = $placeop;
//    }
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
        $placeDet = $this->getContainer()->get('insertalldetails');
        $place = $this->getContainer()->get('insertplace');
        //$placeop->test("vara");
        //$output->writeln($placeop->addAllPlaces($type, $apiKey));
        $output->writeln($this->addAllPlaces($type, $placeop, $placeDet, $place));
    }

    private function addAllPlaces($type, $placeop, $placeDet, $place) {
        echo "23";
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
        
        //$place = new InsertPlacesCommand();
        //$place = $this->getContainer()->get('insertplace');
        $x = 46.77461;
        $y = 23.59215;
        $type='establishment';
        $id = $placeop->getLastPlaceId();
        echo $id;

        $p1['x'] =46.75;
        $p2['x'] =46.755;
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
        $placeop->logMessage($mes);
          //$id = 2879;
        //$placeDet = new InsertAllDetailsCommand();
        //$placeDet = $this->getContainer()->get('insertalldetails');
        $placeDet->addAllPlacesDetails($apiKey, $id );
               
    }

}