<?php

class TimenoteProject extends BaseTimenoteProjectNestedSet
{
  public function __toString() {
    return $this->getTitle();
  }
}
