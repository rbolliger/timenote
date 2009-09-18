<?php

class TimenoteType extends BaseTimenoteType
{
  public function __toString()
  {
    return $this->getName();
  }
}
