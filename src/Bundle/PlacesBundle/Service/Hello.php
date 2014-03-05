<?php

namespace Bundle\PlacesBundle\Service;

class Hello
{
  public function __construct($mood)
  {
    $this->mood = $mood;
  }

  public function __toString()
  {
    if ($this->mood)
    {
      return "sunshine reggae!";
    }

    return 'Oh no';
  }
}