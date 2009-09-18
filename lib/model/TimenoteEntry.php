<?php

class TimenoteEntry extends BaseTimenoteEntry
{
  public function __toString()
  {
    return $this->getName();
  }
}
