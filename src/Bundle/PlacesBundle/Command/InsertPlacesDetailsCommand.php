<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\PlacesBundle\Entities\PlaceDetails;
use Bundle\PlacesBundle\Entities\Tags;
use Bundle\PlacesBundle\Services\Places;

class InsertPlacesDetailsCommand extends ContainerAwareCommand {

    private $placeop;

    public function __construct(Places $placeop) {
        $this->placeop = $placeop;
    }

    protected function configure() {
        $this
                ->setName('places:insert-details')
                ->setDescription('Insert places by type.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $apiKey = $this->getContainer()->getParameter('api_key');
        if (!$apiKey) {
            $output->writeln("Invalid api key.");
            exit();
        }
        $id = $this->placeop->getLastPlaceId();
        $output->writeln();
    }

    function addPlacesDetails($data, $place) {
        $placeId = $place['id'];
        $slug = $place['slug'];
        $status = $data['status'];
        if ($status == "REQUEST_DENIED") {
            $mes = "Request denied while inserting the details for place: " . $placeId;
            $this->placeop->logMessage($mes);
            return;
        }
        if ($status == "NOT_FOUND") {
            $mes = "Place: " . $placeId . " not found while inserting details";
            $this->placeop->logMessage($mes);
            return;
        }
        if ($status != "OK") {
            return;
        }
        $detailsResults = $data['result'];
        $types = $detailsResults['types'];
        $geoGeometry = $detailsResults['geometry'];
        $geoLocation = $geoGeometry['location'];
        $placeUrl = $detailsResults['url'];
        // root->el
        $placeName = $detailsResults['name'];
        if (isset($detailsResults['formatted_address'])) {
            $placeAddr = $detailsResults['formatted_address'];
        } else {
            $placeAddr = "";
        }
        if (isset($detailsResults['formatted_phone_number'])) {
            $placePhoneNumber = $detailsResults['formatted_phone_number'];
        } else {
            $placePhoneNumber = "";
        }
        if (isset($detailsResults['rating'])) {
            $placeRating = $detailsResults['rating'];
        } else {
            $placeRating = "";
        }
        if (isset($detailsResults['website'])) {
            $placeWebSite = $detailsResults['website'];
        } else {
            $placeWebSite = "";
        }
        if (isset($detailsResults['icon'])) {
            $placeIcon = $detailsResults['icon'];
        } else {
            $placeIcon = "";
        }
        // insert current types in db
        foreach ($types as $innerType) {
            $tag = new Tags();
            $tag->setTag($innerType);
            $this->placeop->insertTag($tag);
        }
        //create category
        $this->placeop->createCategory($placeId, $types, $command=1);
        //place_tag
        $this->placeop->insertPlaceTag($types, $placeId);
        $placeLat = $geoLocation['lat'];
        $placeLng = $geoLocation['lng'];
        $place = $this->placeop->getPlaceDetails($placeId);
        if (!$place) {
            //insert new place
            $place = new PlaceDetails();
            $place->setPlaceId($placeId);
        }
        // echo "update";
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

        $this->placeop->insertPlaceDetails($place);
    }

}
