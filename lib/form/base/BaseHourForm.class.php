<?php

/**
 * Hour form base class.
 *
 * @package    timenote
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseHourForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'                   => new sfWidgetFormInputHidden(),
      'project_id'           => new sfWidgetFormPropelChoice(array('model' => 'TimenoteProject', 'add_empty' => false)),
      'type_id'              => new sfWidgetFormPropelChoice(array('model' => 'TimenoteType', 'add_empty' => false)),
      'user_id'              => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'start_dt'             => new sfWidgetFormDateTime(),
      'end_dt'               => new sfWidgetFormDateTime(),
      'comment'              => new sfWidgetFormInput(),
      'user_profile_version' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUserProfile', 'add_empty' => false, 'key_method' => 'getVersion')),
    ));

    $this->setValidators(array(
      'id'                   => new sfValidatorPropelChoice(array('model' => 'Hour', 'column' => 'id', 'required' => false)),
      'project_id'           => new sfValidatorPropelChoice(array('model' => 'TimenoteProject', 'column' => 'id')),
      'type_id'              => new sfValidatorPropelChoice(array('model' => 'TimenoteType', 'column' => 'id')),
      'user_id'              => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'start_dt'             => new sfValidatorDateTime(array('required' => false)),
      'end_dt'               => new sfValidatorDateTime(array('required' => false)),
      'comment'              => new sfValidatorString(array('max_length' => 255)),
      'user_profile_version' => new sfValidatorPropelChoice(array('model' => 'sfGuardUserProfile', 'column' => 'version')),
    ));

    $this->widgetSchema->setNameFormat('hour[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Hour';
  }


}
