<?php

/**
 * TimenoteProject form.
 *
 * @package    timenote
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TimenoteProjectForm extends BaseTimenoteProjectForm
{
  public function configure()
  {

    unset(
      $this['lft'],
      $this['rgt']
    );

    
  }
}
