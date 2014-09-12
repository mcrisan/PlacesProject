<?php

namespace Bundle\PlacesBundle\Services;
/**
 * Description of CityMetaProvider
 *
 * @author mcrisan
 */
class CityMetaProvider {
    private $nwCorner = array('x' => 46.701731, 'y' => 23.748214);
    private $seCorner = array('x' => 46.815099, 'y' => 23.459823);
    
    public function GetCurrentCityCoordinates(){
        return array(
            'nw' => $this->nwCorner,
            'se' => $this->seCorner
        );
    }
}
