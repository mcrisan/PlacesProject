<?php

namespace Bundle\ProjectBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\ProjectBundle\Entity\PlaceDetails;
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
        $output->writeln($this->addPlacesDetails($apiKey, $placeop));
    }

    function addPlacesDetails($apiKey, $placeop) {
        $detailsRef = $placeop->getPlacesDetailsRef();

        foreach ($detailsRef as $place) {
            $placeId = $place['id'];
            $slug = $place['slug'];
            $detailsRef = $place['detailsRef'];
            $url = "https://maps.googleapis.com/maps/api/place/details/json?reference=" . $detailsRef . "&sensor=true&key=" . $apiKey;
            $json = file_get_contents($url);
            $data = json_decode($json, TRUE);
            $detailsResults = $data['result'];
            $types = $detailsResults['types'];
            $geoGeometry = $detailsResults['geometry'];
            $geoLocation = $geoGeometry['location'];
            $placeUrl = $detailsResults['url'];
            // root->el
            $placeName = $detailsResults['name'];
            if (isset($detailsResults['formatted_address'])) {
            $placeAddr = $detailsResults['formatted_address'];
            }
            if (isset($detailsResults['formatted_phone_number'])) {
                $placePhoneNumber = $detailsResults['formatted_phone_number'];
            }
            if (isset($detailsResults['rating'])) {
                $placeRating = $detailsResults['rating'];
            }
            if (isset($detailsResults['website'])) {
                $placeWebSite = $detailsResults['website'];
            }
            if (isset($detailsResults['icon'])) {
            $placeIcon = $detailsResults['icon'];
            }
            // insert current types in db
            foreach ($types as $innerType) {
                $tag = new Tags();
                $tag->setTag($innerType);
                $placeop->insertTag($tag);
            }
            //place_tag
            $placeop->insertPlaceTag($types, $placeId);
            $placeLat = $geoLocation['lat'];
            $placeLng = $geoLocation['lng'];
            $place = $placeop->getPlaceDetails($placeId);
            if (!$place) {
                //insert new place
                echo "new place";
                $place = new PlaceDetails();
                $place->setPlaceId($placeId);
            }
            echo "update";
            //update place if it exists in db or introduce new one if it does not exist
            $place->setPlaceName($placeName);
            $place->setPlacePhonenumber($placePhoneNumber);
            $place->setPlaceVicinity($placeAddr);
            $place->setPlaceLat($placeLat);
            $place->setPlaceLng($placeLng);
            $place->setPlaceRating($placeRating);
            $place->setPlaceIcon($placeIcon);
            $place->setPlaceUrl($placeUrl);
            $place->setPlaceWebsite($placeWebSite);
            $placeop->insertPlaceDetails($place);
        }
    }

}
