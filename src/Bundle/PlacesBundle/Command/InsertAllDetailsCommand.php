<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\PlacesBundle\Entity\Places;
use Bundle\PlacesBundle\Command\InsertPlacesDetailsCommand;
use Bundle\PlacesBundle\Command\InsertPlacesPhotosCommand;
use Bundle\PlacesBundle\Command\InsertPlaceReviewsCommand;

class InsertAllDetailsCommand extends ContainerAwareCommand {

    // use $em with persist & flush..
    protected function configure() {
        $this
                ->setName('places:insert-all-details')
                ->setDescription('Insert all details for place.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $placeop = $this->getContainer()->get('placeop');
        $apiKey = $this->getContainer()->getParameter('api_key');
        if (!$apiKey) {
            $output->writeln("Invalid api key.");
            exit();
        }
        $id = $placeop->getLastPlaceId();
        $output->writeln($this->addAllPlacesDetails($apiKey, $placeop, $id));
    }

    function addAllPlacesDetails($apiKey, $placeop, $startId=null, $place=null ) {
        if(!$place){
        $detailsRef = $placeop->getPlacesDetailsRefWithId($startId);
        //$stopId = 2711;
        //$detailsRef = $placeop->getPlacesDetail($startId, $stopId);
        }else{
            //echo "place det";
        // var_dump($place);
         $detailsRef =  array(0 => array('id' =>$place->getId(), 'detailsRef' => $place->getDetailsRef(), 'slug' => $place->getSlug()));   
        }
        $nr=0;
       // var_dump($detailsRef);
        foreach ($detailsRef as $place) {
            $detailsRef = $place['detailsRef'];
            //var_dump($detailsRef);
            $url = "https://maps.googleapis.com/maps/api/place/details/json?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
            $json = file_get_contents($url);
            $data = json_decode($json, TRUE);
            //details
            $placeDetails = new InsertPlacesDetailsCommand();
            $placeDetails->addPlacesDetails2($data, $place, $placeop); 
            //photos
            $placePhotos = new InsertPlacesPhotosCommand;
            $placePhotos->addPlacePhotos2($data, $place, $placeop, $apiKey); 
            //reviews
            $placePhotos = new InsertPlaceReviewsCommand;
            $placePhotos->addPlaceReviews2($data, $place, $placeop);
            $nr++;
        }
        $mes = "We have made: ". $nr . " querys to insert all details";
        $placeop->logMessage($mes);
    }

   

}
