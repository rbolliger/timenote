<?php

/**
 * TimenoteProjectBehaviors form base class.
 *
 * @package    timenote
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTimenoteProjectBehaviorsForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'project_id'  => new sfWidgetFormPropelChoice(array('model' => 'TimenoteProject', 'add_empty' => false)),
      'title'       => new sfWidgetFormInput(),
      'description' => new sfWidgetFormTextarea(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'TimenoteProjectBehaviors', 'column' => 'id', 'required' => false)),
      'project_id'  => new sfValidatorPropelChoice(array('model' => 'TimenoteProject', 'column' => 'id')),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'description' => new sfValidatorString(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('timenote_project_behaviors[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TimenoteProjectBehaviors';
  }


}
