<?php

namespace Bundle\ProjectBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\ProjectBundle\Entity\PlaceDetails;
use Bundle\ProjectBundle\Entity\PlaceTypes;
use Bundle\ProjectBundle\Entity\Types;

class InsertPlacesDetailsCommand extends ContainerAwareCommand {

    protected function configure() {
        $this
                ->setName('places:insert-details')
                ->setDescription('Insert places by type.');
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getManager();
        $apiKey = $this->getContainer()->getParameter('api_key');
        if (!$apiKey){$output->writeln("Invalid api key.");exit();}
        $text = "";
        $output->writeln($this->addPlacesDetails($apiKey, $em));
    }

    function addPlacesDetails($apiKey, $em) {
        $detailsRef = $em->getRepository('BundleProjectBundle:Places')
            ->getPlacesDetailsRef();

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
                    // insert types retunred by request - in types table
                    $isType = $em->getRepository('BundleProjectBundle:Types')
                            ->isType($innerType);
                    if (!$isType) {
                        $tag = new Types();
                        $tag->setType($innerType);
                        $em->persist($tag);
                        $em->flush();
                        echo "Place name: '$slug'. Action: sec. tag '$innerType' inserted in types table ! \r\n";
                    } else {
                        echo "Place name: '$slug'. Action: sec tag '$innerType' already inserted in types table ! \r\n";
                    }
                    //return;*/
                }
               //exit();        
                // Insert in place_types - place_id, type_id, main/notmain
                $allTypes = $em->getRepository('BundleProjectBundle:Types')
                        ->getAllTypes();
                echo "<pre>";
                print_r($allTypes); // all types from types tb
                echo "</pre>";
                echo "\r\n";
                //exit();
                echo PHP_EOL;

                //print_r($types);exit();
                $currentTypes = json_decode(json_encode($types), TRUE);
                echo "<pre>";
                    print_r($currentTypes);
                echo "</pre>";
                
                // delete all types in tb. 'place_types' for current place
                $delete = $em->getRepository('BundleProjectBundle:PlaceTypes')
                        ->deletePlaces($placeId);
                //var_dump($delete);
                //exit();
                
                if ($delete->execute()) {
                    echo "Place name: '$slug' Action: place deleted from place_types tb. \r\n";
                }
                
                // run query's & insert details in place_types
                // on first run set main = true
                $inc = 0;
                foreach($allTypes as $typeInfo){
                    $typeId = $typeInfo['id'];
                    $typeValue = $typeInfo['type'];
                    
                    if(in_array($typeValue,$currentTypes)){
                        echo $typeId .".";
                        echo $typeValue ."\r\n";
                        //echo "Current place_id: ".$placeId;
                        $insertPlaceTypes = new PlaceTypes();
                        $insertPlaceTypes->setPlaceId($placeId);
                        $insertPlaceTypes->setTypeId($typeId);
                        if ($inc == 0) {
                            $insertPlaceTypes->setMain('true');
                        } else {
                            $insertPlaceTypes->setMain('false');
                        }
                        $em->persist($insertPlaceTypes);
                        $em->flush();
                        
                        echo "Place name: '$slug'. Action: type inserted ! \r\n";
                    }
                    $inc++;
                }
                //exit();
                
                //var_dump($diff);
                //exit();
                echo PHP_EOL;
                //exit();
                foreach ($geoLocation as $loc) {
                    $placeLat = $loc->lat;
                    $placeLng = $loc->lng;

                    $isPlace = $em->getRepository('BundleProjectBundle:PlaceDetails')
                            ->checkPlaceDetails($placeId);
                    if (!$isPlace) {
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

                        $em->persist($place);
                        $em->flush();

                        echo "Place name: '$slug'. Action: details inserted ! \r\n";
                    } else {
                        echo "Place name: '$slug'. Action: Details already inserted ! Uncomment update code.. in InsertPlacesDetailsCommand.php  \r\n";
//                        // update details table
//                        $updateDetails = $em->getRepository('BundleProjectBundle:PlaceDetails')
//                                ->updatePlaceDetails($placeId, $placeName, $placePhoneNumber, $placeAddr, $placeType, $placeLat, $placeLng, $placeRating, $placeIcon, $placeUrl, $placeWebSite);
//
//                        $updateDetails->execute();
//
//                        echo "Details for: '$placeName' updated ! \r\n";
//                        //exit();
                    }
                }
            }
        }
    }

}