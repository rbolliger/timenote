<?php

class TimenoteHourCategory extends BaseTimenoteHourCategory
{
  public function __toString() {
    return $this->getTitle();
  }
}
