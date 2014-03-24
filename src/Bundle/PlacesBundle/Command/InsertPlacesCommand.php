<?php

namespace Bundle\PlacesBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\PlacesBundle\Entity\Places;
use Bundle\PlacesBundle\Service\PlaceOperations;

class InsertPlacesCommand extends ContainerAwareCommand {

    private $placeop;

    public function __construct(PlaceOperations $placeop) {
        $this->placeop = $placeop;
    }

    // use $em with persist & flush..
    protected function configure() {
        $this
                ->setName('places:insert-places')
                ->setDescription('Insert places by type.')
                ->addArgument(
                        'type', InputArgument::OPTIONAL, 'Place type !'
                )
                ->addOption(
                        'yell', null, InputOption::VALUE_NONE, 'If set, the task message will yell in uppercase letters'
                )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        //$placeop = $this->getContainer()->get('placeop');
        $apiKey = $this->getContainer()->getParameter('api_key');
        $latLng = $this->getContainer()->getParameter('latLng');
        $radius = 5000;
        $type = $input->getArgument('type');
        $output->writeln($this->addPlaces($type, $apiKey, $latLng, $radius));
    }

    function addPlaces($type, $apiKey, $latLng, $radius, &$placeNames = null, $s = null) {
        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $latLng . "&radius=" . $radius . "&types=" . $type . "&sensor=false&key=" . $apiKey;
        //$url = "https://maps.googleapis.com/maps/api/js/PlaceService.FindPlaces?1m6&1m2&1d46.7524711471588&2d23.577259023485567&2m2&1d46.77043745284119&2d23.60348577651439&2sen-US&4sbar&callback=_xdc_._jxbr54&token=60012";
        $this->addPlacesByUrl($url, $type, $apiKey, $latLng, $radius, $placeNames, $s);
    }

    private function addPlacesByUrl($url, $placeType, $apiKey, $latLng, $radius, &$placeNames = null, $s = null) {
        sleep(3);
        if (!$placeNames) {
            $placeNames = array();
            $i = 0;
        } else {
            $i = count($placeNames);
        }
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $status = $data['status'];
        if ($status == "REQUEST_DENIED") {
            $mes = "Request denied while inserting places ";
            $this->placeop->logMessage($mes);
            return;
        }
        if ($status != "OK") {
            return;
        }
        $placeItems = $data['results'];
        //echo "place items";
        //var_dump($placeItems);
        if (isset($data['next_page_token'])) {
            $pageToken = $data['next_page_token'];
        } else {
            $pageToken = "";
        }
        foreach ($placeItems as $item) {
            $placeNames[$i] = array();
            $extId = $item['id'];
            $name = $item['name'];
            $slug = $this->gen_slug($name);
            $origin = "google";
            if (isset($item['reference'])) {
                $detailsRef = $item['reference'];
            } else {
                $detailsRef = "no ref";
            }
            if (isset($item['rating'])) {
                $rating = $item['rating'];
            }else{
                $rating="";
            }
            $place = new Places();
            $place->setExtId($extId);
            $place->setSlug($slug);
            $place->setDetailsRef($detailsRef);
            $place->setOrigin($origin);
            $place->setHasOwner(0);
            if ($s) {
                //$placeNames[$i]['placeId'] = $place;
                $placeNames[$i]['place'] = $place;
                $placeNames[$i]['placeName'] = $name;
                $i++;
            } else {
                $newPlace = $this->placeop->insertPlace($place);
                //var_dump($newPlace);
                //$placeNames[$i]['place'] = $newPlace;
                $placeNames[$i]['placeId'] = $newPlace->getId();
                $placeNames[$i]['placeName'] = $name;
                $placeNames[$i]['placeRating'] = $rating;
                $placeNames[$i]['slug'] = $newPlace->getSlug();
                $i++;
                $s = null;
            }
        }
        if ($pageToken != "") {
            $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=" . $latLng . "&radius=" . $radius . "&types=" . $placeType . "&sensor=false&key=" . $apiKey . "&pagetoken=" . $pageToken;
            $this->addPlacesByUrl($url, $placeType, $apiKey, $latLng, $radius, $placeNames, $s);
        }
    }

    // private
    // generate slug
    private function gen_slug($str) {
        # special accents
        $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'Ð', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', '?', '?', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', '?', '?', 'L', 'l', 'N', 'n', 'N', 'n', 'N', 'n', '?', 'O', 'o', 'O', 'o', 'O', 'o', 'Œ', 'œ', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'Š', 'š', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Ÿ', 'Z', 'z', 'Z', 'z', 'Ž', 'ž', '?', 'ƒ', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', '?', '?', '?', '?', '?', '?');
        $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
        return strtolower(preg_replace(array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'), array('', '-', ''), str_replace($a, $b, $str)));
    }

}
