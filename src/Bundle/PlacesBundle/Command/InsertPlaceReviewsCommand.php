<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\PlacesBundle\Entities\PlaceReviews;
use Bundle\PlacesBundle\Entities\Places;
use Bundle\PlacesBundle\Service\Places;

class InsertPlaceReviewsCommand extends ContainerAwareCommand {

    private $placeop;

    public function __construct(Places $placeop) {
        $this->placeop = $placeop;
    }
    
    protected function configure() {
        $this
                ->setName('places:insert-place-reviews')
                ->setDescription('Insert place reviews.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $apiKey = $this->getContainer()->getParameter('api_key');
        $id = $this->placeop->getLastPlaceId();
        $output->writeln();
    }
   
    
    function addPlaceReviews($data, $place) {

            $placeId = $place['id'];
            $status = $data['status'];
            if ($status =="REQUEST_DENIED"){
                $mes = "Request denied while inserting the reviews for place: ". $placeId;
                $this->placeop->logMessage($mes);
                return;
            }
            if ($status =="NOT_FOUND"){
                $mes = "Place: ". $placeId . " not found while inserting reviews";
                $this->placeop->logMessage($mes);
                return;
            }
            if ($status !="OK"){
                return;
            }
            $detailsResults = $data['result'];
            if( isset( $detailsResults['reviews'] ) ){
                $reviews = $detailsResults['reviews'];
                // delete existing reviews for place
                $delete = $this->placeop->deletePlaceReviews($placeId);
                if ($delete->execute()) {
                 //   echo "Reviews deleted from place_reviews tb. \r\n";
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
                    $p = $this->placeop->getPlace($placeId);
                    $placeReview = new PlaceReviews();
                    $placeReview->setPlaces($p);
                    $placeReview->setAuthor($authorName);
                    $placeReview->setAuthorUrl($authorUrl);
                    $placeReview->setReview($text);
                    $placeReview->setRatingAspect($aspectType);
                    $placeReview->setRating($aspectRating);
                    $placeReview->setDate($time);
                    $this->placeop->InsertPlaceReview($placeReview);
                }
            }
    }

}
