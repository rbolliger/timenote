<?php

/**
 * TimenoteHour form.
 *
 * @package    timenote
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TimenoteHourForm extends BaseTimenoteHourForm
{
  public function configure()
  {
/*
    // getting root node
    $projectTreeListRoot = TimenoteProjectPeer::retrieveByPk('1') ;

    // adding incermential spaces
    foreach ($projectTreeListRoot->getDescendants() as $item) {

      $itm_prefix = '' ;

      for ($i=2 ; $i <= $item->getLevel() ; $i++) {
        $itm_prefix .= '&nbsp;&nbsp;' ;
      }

      $prjDropDown[$item->getId()] = $itm_prefix . $item->getTitle() ;

    }
 */


 // Date fields without time
  $this->widgetSchema['start_dt'] = new sfWidgetFormDate();
  $this->widgetSchema['end_dt'] = new sfWidgetFormDate();

// Additional Time fields
  $this->widgetSchema['start_time'] = new sfWidgetFormInput();
  $this->widgetSchema['end_time'] = new sfWidgetFormInput();

// Time fields validators
//  $this->validatorSchema['start_time'] = new sfValidatorString(array('required' => true, 'min_length' => 5, 'max_length' => 5)); // 00:00
//  $this->validatorSchema['end_time'] = new sfValidatorString(array('required' => true, 'min_length' => 5, 'max_length' => 5)); // 00:00

    $this->setValidators(array(
      // ...
      'start_time' => new sfValidatorAnd(array(
        new sfValidatorString(array('required' => true, 'min_length' => 5, 'max_length' => 5)),
        new sfValidatorRegex(array('pattern' => '/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/')),
      )),
      'end_time' => new sfValidatorAnd(array(
        new sfValidatorString(array('required' => true, 'min_length' => 5, 'max_length' => 5)),
        new sfValidatorRegex(array('pattern' => '/^([0-1][0-9]|[2][0-3]):([0-5][0-9])$/')),
      )),
    ));


  $this->validatorSchema->setPostValidator(
    new sfValidatorSchemaCompare('start_date', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'end_date',
      array('throw_global_error' => true),
      array('invalid' => 'The start date ("%left_field%") must be before the end date ("%right_field%")')
    )
  );
  }
}
