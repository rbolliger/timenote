<?php

/**
 * UserWorktime form base class.
 *
 * @package    timenote
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUserWorktimeForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                             => new sfWidgetFormInputHidden(),
      'user_id'                        => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'serie_start'                    => new sfWidgetFormDateTime(),
      'timeline_generator_id'          => new sfWidgetFormPropelChoice(array('model' => 'TimelineGenerator', 'add_empty' => true)),
      'timeline_generator_workdays'    => new sfWidgetFormTextarea(),
      'timeline_generator_offdays'     => new sfWidgetFormTextarea(),
      'timeline_generator_hours_start' => new sfWidgetFormTextarea(),
      'timeline_generator_hours_stop'  => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'                             => new sfValidatorPropelChoice(array('model' => 'UserWorktime', 'column' => 'id', 'required' => false)),
      'user_id'                        => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'serie_start'                    => new sfValidatorDateTime(array('required' => false)),
      'timeline_generator_id'          => new sfValidatorPropelChoice(array('model' => 'TimelineGenerator', 'column' => 'id', 'required' => false)),
      'timeline_generator_workdays'    => new sfValidatorString(array('required' => false)),
      'timeline_generator_offdays'     => new sfValidatorString(array('required' => false)),
      'timeline_generator_hours_start' => new sfValidatorString(array('required' => false)),
      'timeline_generator_hours_stop'  => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_worktime[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserWorktime';
  }


}
