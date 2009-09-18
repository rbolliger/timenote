<?php

class TimenoteProjectPeer extends BaseTimenoteProjectNestedSetPeer
{

  public static function saveOrder($hash)
  {
    $root = self::retrieveRoot();

    foreach ($hash['main_list'] as $project)
    {
      $u = self::retrieveByPk($project['id']);

      if (!empty($project['children']))
      {
        $u->saveChildren($project['children']);
      }

      $u->moveToLastChildOf($root);
      $u->save();
    }
  }
}
