<?php

/**
 * TimelineGenerator form base class.
 *
 * @package    timenote
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTimelineGeneratorForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'date_start'  => new sfWidgetFormDateTime(),
      'workdays'    => new sfWidgetFormTextarea(),
      'off_days'    => new sfWidgetFormTextarea(),
      'hours_start' => new sfWidgetFormTextarea(),
      'hours_stop'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'TimelineGenerator', 'column' => 'id', 'required' => false)),
      'date_start'  => new sfValidatorDateTime(array('required' => false)),
      'workdays'    => new sfValidatorString(array('required' => false)),
      'off_days'    => new sfValidatorString(array('required' => false)),
      'hours_start' => new sfValidatorString(array('required' => false)),
      'hours_stop'  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('timeline_generator[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TimelineGenerator';
  }


}
