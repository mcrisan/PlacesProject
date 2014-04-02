<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\PlacesBundle\Command\InsertPlacesDetailsCommand;
use Bundle\PlacesBundle\Command\InsertPlacesPhotosCommand;
use Bundle\PlacesBundle\Command\InsertPlaceReviewsCommand;
use Bundle\PlacesBundle\Services\Places;

class InsertAllDetailsCommand extends ContainerAwareCommand {

    private $placeop;
    private $photos;
    private $reviews;
    private $details;

    public function __construct(Places $placeop, InsertPlacesPhotosCommand $photos, InsertPlaceReviewsCommand $review, InsertPlacesDetailsCommand $details) {
        $this->placeop = $placeop;
        $this->photos = $photos;
        $this->reviews = $review;
        $this->details = $details;
    }

    // use $em with persist & flush..
    protected function configure() {
        $this
                ->setName('places:insert-all-details')
                ->setDescription('Insert all details for place.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $apiKey = $this->getContainer()->getParameter('api_key');
        if (!$apiKey) {
            $output->writeln("Invalid api key.");
            exit();
        }
        $id = $this->placeop->getLastPlaceId();
        $output->writeln($this->addAllPlacesDetails($apiKey, $id));
    }

    function addAllPlacesDetails($apiKey, $startId = null, $place = null) {

        if (!$place) {
            $detailsRef = $this->placeop->getPlacesDetailsRefWithId($startId);
        } else {
            $detailsRef = array(0 => array('id' => $place->getId(), 'detailsRef' => $place->getDetailsRef(), 'slug' => $place->getSlug()));
        }
        $nr = 0;
        foreach ($detailsRef as $place) {
            $detailsRef = $place['detailsRef'];
            $url = "https://maps.googleapis.com/maps/api/place/details/json?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
            $json = file_get_contents($url);
            $data = json_decode($json, TRUE);
            //details
            $this->details->addPlacesDetails($data, $place);
            //photos
            $this->photos->addPlacePhotos($data, $place, $apiKey);
            //reviews
            $this->reviews->addPlaceReviews($data, $place);
            $nr++;
        }
        $mes = "We have made: " . $nr . " querys to insert all details";
        $this->placeop->logMessage($mes);
    }

}
