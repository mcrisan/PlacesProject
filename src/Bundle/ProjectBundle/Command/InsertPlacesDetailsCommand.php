<?php

namespace Bundle\ProjectBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\ProjectBundle\Entity\PlaceDetails;
use Bundle\ProjectBundle\Entity\PlaceTags;
use Bundle\ProjectBundle\Entity\Tags;

class InsertPlacesDetailsCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('places:insert-details')
                ->setDescription('Insert places by type.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $placeop = $this->getContainer()->get('placeop');
        $apiKey = $this->getContainer()->getParameter('api_key');
        if (!$apiKey) {
            $output->writeln("Invalid api key.");
            exit();
        }
        $text = "";
        $output->writeln($this->addPlacesDetails($apiKey, $placeop));
    }

    function addPlacesDetails($apiKey, $placeop) {
        $detailsRef = $placeop->getPlacesDetailsRef();
        
        foreach ($detailsRef as $place) {
            $placeId = $place['id'];
            $slug = $place['slug'];
            $detailsRef = $place['detailsRef'];
            $url = "https://maps.googleapis.com/maps/api/place/details/xml?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
            $placesDetails = simplexml_load_file($url);
            $placeDetails = $placesDetails->result;

            foreach ($placeDetails as $placeDetail) {
                // inner elements in array
                $types = $placeDetail->type;
                $geoGeometry = $placeDetail->geometry;
                $geoLocation = $geoGeometry->location;
                $placeUrl = $placeDetail->url;

                // root->el
                $placeName = $placeDetail->name;
                $placeAddr = $placeDetail->formatted_address;
                $placePhoneNumber = $placeDetail->formatted_phone_number;
                $placeRating = $placeDetail->rating;
                $placeWebSite = $placeDetail->website;
                $placeIcon = $placeDetail->icon;

                // insert current types in db
                foreach ($types as $innerType) {
                    $tag = new Tags();
                    $tag->setTag($innerType);
                    $placeop->checkTag($tag);
                }

                //place_tag
                $placeop->checkPlaceTag($types, $placeId);

                foreach ($geoLocation as $loc) {
                    $placeLat = $loc->lat;
                    $placeLng = $loc->lng;
                    $place = new PlaceDetails();
                    $place->setPlaceId($placeId);
                    $place->setPlaceName($placeName);
                    $place->setPlacePhonenumber($placePhoneNumber);
                    $place->setPlaceVicinity($placeAddr);
                    $place->setPlaceLat($placeLat);
                    $place->setPlaceLng($placeLng);
                    $place->setPlaceRating($placeRating);
                    $place->setPlaceIcon($placeIcon);
                    $place->setPlaceUrl($placeUrl);
                    $place->setPlaceWebsite($placeWebSite);
                    $placeop->checkPlaceDetails($place);
                }
            }
        }
    }

}
