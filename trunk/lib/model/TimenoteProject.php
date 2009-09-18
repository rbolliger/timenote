<?php

class TimenoteProject extends BaseTimenoteProjectNestedSet
{

  public function __toString()
  {
    return $this->getTitle();
  }

  public function saveChildren($children)
	{
	  foreach($children as $child)
	  {
	    $item = TimenoteProjectPeer::retrieveByPk($child['id']);
	    if (!empty($child['children']))
	    {
	      $item->saveChildren($child['children']);
	    }
	    $item->moveToLastChildOf($this);
      $item->save();
	  }
	}
}
