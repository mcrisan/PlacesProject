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
        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getManager();

       
        
        $apiKey = $this->getContainer()->getParameter('api_key');

        $output->writeln($this->addPlaceReviews($apiKey, $em));
    }

    /**
     * recode ..
     */
    function addPlaceReviews($apiKey, $em) {

        $detailsRef = $em->getRepository('BundleProjectBundle:Places')
                ->getPlacesDetailsRef();

        foreach ($detailsRef as $place) {
            $placeId = $place['id'];
            $placeName = $place['slug'];
            $detailsRef = $place['detailsRef'];

            $url = "https://maps.googleapis.com/maps/api/place/details/xml?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
            $placeDetails = simplexml_load_file($url);
            $detailsResults = $placeDetails->result;
            
            foreach($detailsResults as $place){
                $reviews = $place->review;
                foreach($reviews as $review){
                    $time = $review->time;
                    $text = $review->text;
                    $authorName = $review->author_name;
                    $authorUrl = $review->author_url;
                    $aspects = $review->aspect;
                    foreach($aspects as $aspect){
                        $aspectType = $aspect->type;
                        $aspectRating = $aspect->rating;
                    }
                    
//                    $a = $em->getRepository('BundleProjectBundle:Places')->find($placeId);
//                    echo $a->getId();
//                    exit();
                   $bool = $em->getRepository('BundleProjectBundle:PlaceReviews')
                           ->checkForPlaceReviews($placeId);
                   
                   
                     $p = $this->getPlace($placeId);
                     $placeReview = new PlaceReviews();

                     $placeReview->setPlaces($p);
                     $placeReview->setAuthor($authorName);
                     $placeReview->setAuthorUrl($authorUrl);
                     $placeReview->setReview($text);
                     $placeReview->setRatingAspect($aspectType);
                     $placeReview->setRating($aspectRating);
                     $placeReview->setDate($time);

                     $em->persist($placeReview);
                     $em->flush();

                     echo "Review for: ".$placeName ." inserted ! \r\n";
                   
                    
                }
                //exit();
            }
           
            
            
        }
    }
    
    // getPlace and insert review
    private function getPlace($place_id) {
        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getManager();

        $place = $em->getRepository('BundleProjectBundle:Places')->find($place_id);

        if (!$place) {
            return "error";
        }

        return $place;
    }
    

// addPlaceReviews
}