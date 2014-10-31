<?php
namespace Bundle\PlacesBundle\Services;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
interface HttpRequest
{
    public function initCurl($url);
    public function setOption($name, $value);
    public function execute();
    public function getInfo();
    public function close();
}

