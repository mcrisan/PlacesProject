<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\PlacesBundle\Entity\PlaceReviews;
use Bundle\PlacesBundle\Entity\Places;
use Bundle\PlacesBundle\Entity\PlacesRepository;


class InsertPlaceReviewsCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('places:insert-place-reviews')
                ->setDescription('Insert place reviews.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $placeop = $this->getContainer()->get('placeop');
        $apiKey = $this->getContainer()->getParameter('api_key');
        $id = $placeop->getLastPlaceId();
        $output->writeln($this->addPlaceReviews($apiKey, $placeop, $id));
    }

    /**
     * recode ..
     */
    function addPlaceReviews($apiKey, $placeop, $startId) {

        //$detailsRef = $placeop->getPlacesDetailsRef();
        $nr=0;
        $detailsRef = $placeop->getPlacesDetailsRefWithId($startId);
        foreach ($detailsRef as $place) {
            $placeId = $place['id'];
            $placeName = $place['slug'];
            $detailsRef = $place['detailsRef'];
            $url = "https://maps.googleapis.com/maps/api/place/details/json?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
            $json = file_get_contents($url);
            $data = json_decode($json, TRUE);
            $status = $data['status'];
            if ($status =="REQUEST_DENIED"){
                echo "er";
                $mes = "Request denied while inserting the reviews for place: ". $placeId;
                $placeop->logMessage($mes);
                break;
            }
            if ($status =="NOT_FOUND"){
                $mes = "Place: ". $placeId . " not found while inserting reviews";
                $placeop->logMessage($mes);
                continue;
            }
            if ($status !="OK"){
                continue;
            }
            $detailsResults = $data['result'];
            if( isset( $detailsResults['reviews'] ) ){
                $reviews = $detailsResults['reviews'];
                // delete existing reviews for place
                $delete = $placeop->deletePlaceReviews($placeId);
                if ($delete->execute()) {
                    echo "Reviews deleted from place_reviews tb. \r\n";
                }
                //insert reviews for place
                foreach ($reviews as $review) {
                    $time = $review['time'];
                    $text = $review['text'];
                    $authorName = $review['author_name'];
                    if( isset( $review['author_url'] ) ){
                    $authorUrl = $review['author_url'];
                    }else{
                       $authorUrl=""; 
                    }
                    $aspects = $review['aspects'];
                    foreach ($aspects as $aspect) {
                        $aspectType = $aspect['type'];
                        $aspectRating = $aspect['rating'];
                    }
                    $p = $placeop->getPlace($placeId);
                    $placeReview = new PlaceReviews();
                    $placeReview->setPlaces($p);
                    $placeReview->setAuthor($authorName);
                    $placeReview->setAuthorUrl($authorUrl);
                    $placeReview->setReview($text);
                    $placeReview->setRatingAspect($aspectType);
                    $placeReview->setRating($aspectRating);
                    $placeReview->setDate($time);
                    $placeop->InsertPlaceReview($placeReview);
                    echo "Review for: " . $placeName . " inserted ! \r\n";
                }
            }
            $nr++;
        }
        $mes = "We have inserted reviews for: ". $nr . " places";
        $placeop->logMessage($mes);
    }

}
