<?php

/**
 * Social sign app. api-key
 *
 * @author amihut
 */

namespace Bundle\PlacesBundle\lib;

class ApiKey {
    
    private $apiKey = 'c2f34fe8782d701b5c64600b0c24349cca9829f3';

    // Get the api key
    public function getKey() {
        return $this->apiKey;
    }
}

?>
