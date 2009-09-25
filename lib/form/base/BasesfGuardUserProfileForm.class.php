<?php

/**
 * sfGuardUserProfile form base class.
 *
 * @package    timenote
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BasesfGuardUserProfileForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'user_id'    => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => false)),
      'remember'   => new sfWidgetFormInputCheckbox(),
      'first_name' => new sfWidgetFormInput(),
      'last_name'  => new sfWidgetFormInput(),
      'email'      => new sfWidgetFormInput(),
      'birthday'   => new sfWidgetFormDate(),
      'sciper'     => new sfWidgetFormInput(),
      'created_by' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'version'    => new sfWidgetFormInput(),
      'percent'    => new sfWidgetFormInput(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorPropelChoice(array('model' => 'sfGuardUserProfile', 'column' => 'id', 'required' => false)),
      'user_id'    => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id')),
      'remember'   => new sfValidatorBoolean(array('required' => false)),
      'first_name' => new sfValidatorString(array('max_length' => 120, 'required' => false)),
      'last_name'  => new sfValidatorString(array('max_length' => 120, 'required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'birthday'   => new sfValidatorDate(array('required' => false)),
      'sciper'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'created_by' => new sfValidatorPropelChoice(array('model' => 'sfGuardUser', 'column' => 'id', 'required' => false)),
      'version'    => new sfValidatorInteger(array('required' => false)),
      'percent'    => new sfValidatorNumber(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user_profile[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'sfGuardUserProfile';
  }


}
