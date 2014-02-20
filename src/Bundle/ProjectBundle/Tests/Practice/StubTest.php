<?php

require 'AClass.php';

class StubTest extends PHPUnit_Framework_TestCase{

    function __construct() {
        
    }
    function testStub () {
        /* create a stub for the class
        // stub - the practice of replacing an object with a test double that (optionally) returns config. values
        // getMock() - generate an obj. that can act as a 'test double'
        // by default all obj. of the class are replaced and returns NULL
         * getMock
         * (
         *  "className",
         *  "arrayWithMethods",
         *  "arrayPassedToTheOriginalClassConstructor",
         *  "testDoubleClassName", - generatedClass
         *  "disableOriginalClassCloneConstructor",
         *  "disableAutoLoad"
         * )
        */
        
        $stub = $this->getMock('AClass');
        
        // map of args. to return values
        $map = array(
          array('a','b','c'),
          array('d','e','f')
        );
        
        // configure the stub
        // phpunit generate auto. a new class that implements the desired behavior when getMock method is used
        $stub->expects($this->any())
             ->method('foo')
             //->will($this->returnValue("foo"));
             //->will($this->returnArgument(0));
             //->will($this->returnSelf());
             //->will($this->returnValueMap($map));
                
             /* when the stub method should return a calculated value we can use returnCallback()
              * to have the stubbed method return the result of the callback method
              * ALTERNATIVE
              * onConsecutiveCalls(1,2,3)
             */ 
//               ->will($this->returnCallback(function(){
//                   return 'abc';
//               }));
//                ->will($this->onConsecutiveCalls(1,2,3));
                ->will($this->throwException(new Exception(new Exception)));
                $stub->foo();
               
        //testing
        //$this->assertEquals('abc',$stub->foo('foo')); //returnCallback
        // onConsecutiveCalls
        $this->assertEquals(1,$stub->foo());
        $this->assertEquals(3,$stub->foo());
//        $this->assertEquals(2,$stub->foo());
        
        // maping return values
//        $this->assertEquals('c',$stub->foo('a','b'));
//        $this->assertEquals('e',$stub->foo('d','f'));
  
        //returnValue()
//        $this->assertEquals('foo',$stub->foo());

        //returnArgument(0)
//        $this->assertEquals('foo',$stub->foo('foo'));
        
        //return self
//        $this->assertEquals($stub,$stub->foo());
        
    }

}
?>
