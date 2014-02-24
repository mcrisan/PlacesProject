<?php

namespace Bundle\ProjectBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\ProjectBundle\Entity\PlaceReviews;
use Bundle\ProjectBundle\Entity\Places;
use Bundle\ProjectBundle\Entity\PlacesRepository;

class InsertPlaceReviewsCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('places:insert-place-reviews')
                ->setDescription('Insert place reviews.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $placeop = $this->getContainer()->get('placeop');
        $apiKey = $this->getContainer()->getParameter('api_key');
        $output->writeln($this->addPlaceReviews($apiKey, $placeop));
    }

    /**
     * recode ..
     */
    function addPlaceReviews($apiKey, $placeop) {

        $detailsRef = $placeop->getPlacesDetailsRef();
        foreach ($detailsRef as $place) {
            $placeId = $place['id'];
            $placeName = $place['slug'];
            $detailsRef = $place['detailsRef'];
            $url = "https://maps.googleapis.com/maps/api/place/details/xml?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
            $placeDetails = simplexml_load_file($url);
            $detailsResults = $placeDetails->result;
            foreach ($detailsResults as $place) {
                $reviews = $place->review;
                var_dump($reviews);
                // delete existing reviews for place
                $delete = $placeop->deletePlaceReviews($placeId);
                if ($delete->execute()) {
                    echo "Reviews deleted from place_reviews tb. \r\n";
                }
                //insert reviews for place
                foreach ($reviews as $review) {
                    $time = $review->time;
                    $text = $review->text;
                    $authorName = $review->author_name;
                    $authorUrl = $review->author_url;
                    $aspects = $review->aspect;
                    foreach ($aspects as $aspect) {
                        $aspectType = $aspect->type;
                        $aspectRating = $aspect->rating;
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
                    $placeop->checkPlaceReview($placeReview);
                    echo "Review for: " . $placeName . " inserted ! \r\n";
                }
            }
        }
    }

}
