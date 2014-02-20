<?php

namespace Bundle\ProjectBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Bundle\ProjectBundle\Entity\Places;

class InsertPlacesCommand extends ContainerAwareCommand {

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
        $doctrine = $this->getContainer()->get('doctrine');
        $em = $doctrine->getManager();

        $apiKey = $this->getContainer()->getParameter('api_key');
        $latLng = $this->getContainer()->getParameter('latLng');

        //var_dump($apiKey);exit();
        $radius = 5000;

        $type = $input->getArgument('type');

        $output->writeln($this->addPlaces($type, $apiKey, $latLng, $radius, $em));
    }

    function addPlaces($type, $apiKey, $latLng, $radius, $em) {
        $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/xml?location=" . $latLng . "&radius=" . $radius . "&types=" . $type . "&sensor=false&key=" . $apiKey;
        $this->addPlacesByUrl($url, $type, $apiKey, $latLng, $radius, $em);
    }

    private function addPlacesByUrl($url, $placeType, $apiKey, $latLng, $radius, $em) {
        sleep(3);
        $places = simplexml_load_file($url);

        if ($places->status != 'ZERO_RESULTS') {
            var_dump($places);
        }


        $placeItems = $places->result;
        $pageToken = $places->next_page_token;


        //var_dump($places);
        // Run the results
        $i = 1;
        
        foreach ($placeItems as $item) {
            $extId = $item->id;
            $name = $item->name;
            $slug = $this->gen_slug($name);

//            $str = "abcdef12345";
//            $slug .="-".str_shuffle($str);

            echo $name . PHP_EOL;

            $checkSlug = $em->getRepository('BundleProjectBundle:Places')
                    ->checkCurrentSlug($slug);
            $lastSlug = $em->getRepository('BundleProjectBundle:Places') // last slug
                    ->getLastSlug($slug . '-');
            $detailsRef = $item->reference;

            $isPlace = $em->getRepository('BundleProjectBundle:Places')
                    ->checkCurrentExtId($extId);
            if (!$isPlace) { // if not-insert place   
                //$detailsRef = $item->reference;
                if ($checkSlug) {
                    if ($lastSlug) { // if the place 'has number-to-slug'
                        $lastSlugId = explode('-', $lastSlug[0]['slug']);
                        $allKeys = array_keys($lastSlugId);
                        
                        echo $maxIndex = end($allKeys);
                        $nextNoToSlug = $lastSlugId[$maxIndex] + 1;
                        echo $slug .="-" . $nextNoToSlug;
                        //exit();
                    } else {
                        $slug .="-" . $i;
                    }
                }
                //exit();


                $origin = "google";

                if (!empty($detailsRef)) {
                    $detailsRef = $item->reference;
                } else {
                    $detailsRef = "no ref";
                }

                // set and insert
                $place = new Places();
                $place->setExtId($extId);
                $place->setSlug($slug);
                $place->setDetailsRef($detailsRef);
                $place->setOrigin($origin);
                $place->setHasOwner(0);

                $em->persist($place);
                $em->flush($place);

                echo "Place: place name '$slug' origin '$origin' inserted ! \r\n";
            } else {
                // check
//                if($checkSlug){
//                    echo "continue..";
//                    continue;
//                }
                // update 
//                $update = $em->getRepository('BundleProjectBundle:Places')
//                        ->updatePlace($extId,$slug,$detailsRef);
//                $update->execute();
//                
//                echo "Place: place name '$slug' updated ! \r\n";
                //exit();
                //echo "Place: place name '" . $slug . "' already inserted ! Try update ! \r\n";
            }
        }
        if ($pageToken[0] != "") {
            $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/xml?location=" . $latLng . "&radius=" . $radius . "&types=" . $placeType . "&sensor=false&key=" . $apiKey . "&pagetoken=" . $pageToken[0];
            $this->addPlacesByUrl($url, $placeType, $apiKey, $latLng, $radius, $em);
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