<?php
class Subject
{
    protected $observers = array();
 
    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }
 
    public function doSomething()
    {
        // Do something.
        // ...
 
        // Notify observers that we did something.
        $this->notify('something');
    }
 
    public function doSomethingBad()
    {
        foreach ($this->observers as $observer) {
            $observer->reportError(42, 'Something bad happened', $this);
        }
    }
 
    protected function notify($argument)
    {
        foreach ($this->observers as $observer) {
            $observer->update($argument);
        }
    }
 
    // Other methods.
}
 
class Observer
{
    public function update($argument)
    {
        // Do something.
    }
 
    public function reportError($errorCode, $errorMessage, Subject $subject)
    {
        // Do something
    }
 
    // Other methods.
}
?>