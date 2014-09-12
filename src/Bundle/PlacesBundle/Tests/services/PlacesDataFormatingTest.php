<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Bundle\PlacesBundle\Tests\Services;

use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Bundle\PlacesBundle\Services\PlacesDataFormating;


/**
 * Description of PlacesDataFormatingTest
 *
 * @author mcrisan
 */
class PlacesDataFormatingTest extends \PHPUnit_Framework_TestCase{
    /**
     * @dataProvider slugInputProvider
     */
    public function testGenerate_Slug($text, $expected){
        $placeformating = new PlacesDataFormating();
        $data =  $placeformating->gen_slug($text);
        $this->assertEquals($data, $expected);
    }
    
    public function slugInputProvider(){
        return array(
            array("'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë'", 'aaaaaaaeceeee'),
            array('À', 'a'),
            array('Á', 'a'),
            array('Â', 'a'),
        );
    }
    
    public function testGetPlaceDataFromArraySetsCorrectData(){
        $item = array('id' => '1',
                      'name' => 'name',
                      'reference' => 'ref',
                      'rating' => 'rating'
                    );
        $validation = $this->getMock('InputValidationService', array('getDataElement'));
        $validation->expects($this->exactly(4))
                    ->method('getDataElement')
                    ->with($this->equalTo($item),
                           $this->logicalOr(
                                $this->equalTo('id'),
                                $this->equalTo('name'),
                                $this->equalTo('reference'),
                                $this->equalTo('rating')))
                    ->will($this->returnCallback(
                            function() {
                                $data = func_get_args();
                                return $data[0][$data[1]];
                            }
                        )
                    );
                        
        $placeformating = $this->getMockBuilder('Bundle\PlacesBundle\Services\PlacesDataFormating')
            ->setConstructorArgs(array($validation))
            ->setMethods(array('gen_slug'))
            ->getMock();
        
        $placeformating->expects($this->once())
               ->method('gen_slug')
               ->will($this->returnValue($item['name']));

        $placeData = $placeformating->getPlaceDataFromArray($item);
        $this->assertEquals($item['id'], $placeData['extId']);
        $this->assertEquals($item['name'], $placeData['slug']);
        $this->assertEquals($item['reference'], $placeData['detailsRef']);
        $this->assertEquals($item['rating'], $placeData['rating']);
    }
    
    public function testGetPlacePhotoDetailsInvalidReference(){
        $api_key = 'AIzaSyBcy7J0eaTaMSxAj7re31bLUKSr9W9EPYE';
        $item = array('photo_reference' => '1'
                    );
        $placeop = $this->getMockBuilder('Places')
            ->setMethods(array('logMessage'))
            ->getMock();
        $placeformating = $this->getMockBuilder('Bundle\PlacesBundle\Services\PlacesDataFormating')
            ->setConstructorArgs(array(null, $placeop))
            ->setMethods(array('getImgUrl'))
            ->getMock();
        $placeformating->expects($this->once())
                       ->method('getImgUrl');
        $placeData = $placeformating->getPlacePhotoDetails($item, $api_key);
        $this->assertEquals(null, $placeData['imgUrl']);
    }
    
    public function testGetPlacePhotoDetailsInvalidKey(){
        $api_key = 'AIzaSyBcy7J0eaTaMSxAj7re31bLUKSr9W9EPYE22';
        $item = array('photo_reference' => 'CnRqAAAAm8lMyZKzHpOXAxMkghzc2nkXMA2vjfCttFZcZrT0JKN22Z0cTr06QL8bUWCOin71ymYM3lF4ZLSxfAq5SFTtACqe6rG8r3oPqqWdggI2ASJzBxjKnSk2woA84skfXbXNr6bTJ6g_V3-YgsDjC1-46BIQVdDZkz7yOiZGR7m8KdYo8xoUp47TzYmnhao5Voq4yv4hGkPlIeg'
                    );
        $placeop = $this->getMockBuilder('Places')
            ->setMethods(array('logMessage'))
            ->getMock();
        $placeformating = $this->getMockBuilder('Bundle\PlacesBundle\Services\PlacesDataFormating')
            ->setConstructorArgs(array(null, $placeop))
            ->setMethods(array('getImgUrl'))
            ->getMock();
        $placeformating->expects($this->once())
                       ->method('getImgUrl');
        $placeData = $placeformating->getPlacePhotoDetails($item, $api_key);
        $this->assertEquals(null, $placeData['imgUrl']);
    }
    
    public function testGetPlacePhotoDetailsSetsPhoto(){
        $api_key = 'AIzaSyBcy7J0eaTaMSxAj7re31bLUKSr9W9EPYE';
        $expected_result = 'https://lh5.googleusercontent.com/-sT0rdPi492w/UTpLf4cfDOI/AAAAAAAAjQg/p8stYzrirRs/s1600-w400/IMG_0067.JPG';
        $item = array('photo_reference' => 'CnRqAAAAm8lMyZKzHpOXAxMkghzc2nkXMA2vjfCttFZcZrT0JKN22Z0cTr06QL8bUWCOin71ymYM3lF4ZLSxfAq5SFTtACqe6rG8r3oPqqWdggI2ASJzBxjKnSk2woA84skfXbXNr6bTJ6g_V3-YgsDjC1-46BIQVdDZkz7yOiZGR7m8KdYo8xoUp47TzYmnhao5Voq4yv4hGkPlIeg'
                    );
        $placeop = $this->getMockBuilder('Places')
            ->setMethods(array('logMessage'))
            ->getMock();
        $placeformating = $this->getMockBuilder('Bundle\PlacesBundle\Services\PlacesDataFormating')
            ->setConstructorArgs(array(null, $placeop))
            ->setMethods(array('getImgUrl'))
            ->getMock();
        $placeformating->expects($this->once())
                       ->method('getImgUrl')
                       ->will($this->returnValue($expected_result));
        $placeData = $placeformating->getPlacePhotoDetails($item, $api_key);
        $this->assertEquals($expected_result, $placeData['imgUrl']);
    }
    
    public function testGetImgUrlReturnsData(){
       $expected = array('redirect_url' => "data");
       $http = $this->getMockBuilder('HTTPRequest')
                    ->setMethods(array('initCurl', 'setOption', 'execute', 'getInfo'))
                    ->getMock();
       
       $http->expects($this->any())
                        ->method('getInfo')
                        ->will($this->returnValue($expected));
       $placeformating = new PlacesDataFormating(null, null, $http);
       $result = $placeformating->getImgUrl('121');
       $this->assertEquals($expected['redirect_url'], $result);
    }
    
    /**
     * @expectedException InvalidArgumentException
     */
    public function testGetImgUrlThrowsException(){
       $expected = array('redirect_url' => "data");
       $http = $this->getMockBuilder('HTTPRequest')
                    ->setMethods(array('initCurl', 'setOption', 'execute', 'getInfo'))
                    ->getMock();
       
       $http->expects($this->any())
                        ->method('execute')
                        ->will($this->throwException(new InvalidArgumentException("invalid data")));
        $placeformating = new PlacesDataFormating(null, null, $http);
        $placeformating->getImgUrl('121');
    }
    
    
}
