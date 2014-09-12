<?php

namespace Bundle\PlacesBundle\Services;
/**
 * Description of InputService
 *
 * @author mcrisan
 */
class InputValidationService {
    public function getDataElement($data, $key, $default = Null){
        if (isset($data[$key])) {
            return $data[$key];
        }
        
        return $default;
    }
    
    private function decodeJson($json){
        if(empty($json)){
            throw new InvalidArgumentException;
        }
        
        $data = json_decode($json, TRUE);
        if(!is_array($data)){
            throw new InvalidArgumentException;
        }
        
        return $data;
    }
    
    private function checkDataStatus($data){
        $status = $data['status'];
        if ($status == "REQUEST_DENIED") {
            $this->placeop->logMessage("Request denied while inserting places ");
            throw new UnexpectedValueException;
        }
        
        if ($status != "OK") {
            throw new UnexpectedValueException;
        }
    }
}
