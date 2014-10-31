<?php
namespace Bundle\PlacesBundle\Services;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CurlRequest implements HttpRequest
{
    private $handle = null;
   
    public function initCurl($url){
        $this->handle = curl_init($url);
    }

    public function setOption($name, $value) {
        curl_setopt($this->handle, $name, $value);
    }

    public function execute() {
       $exec = curl_exec($this->handle);
       if(curl_errno($this->handle)){
            throw new Exception(curl_error($this->handle));
        }
        return $exec;
    }

    public function getInfo() {
        return curl_getinfo($this->handle);
    }

    public function close() {
        curl_close($this->handle);
    }
}