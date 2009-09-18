<?php

/**
 * Entry form base class.
 *
 * @package    timenote
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEntryForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'project_id'  => new sfWidgetFormPropelChoice(array('model' => 'tnProject', 'add_empty' => true)),
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'TimenoteCategory', 'add_empty' => true)),
      'comment'     => new sfWidgetFormInput(),
      'start_dt'    => new sfWidgetFormDate(),
      'end_dt'      => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorPropelChoice(array('model' => 'Entry', 'column' => 'id', 'required' => false)),
      'project_id'  => new sfValidatorPropelChoice(array('model' => 'tnProject', 'column' => 'id', 'required' => false)),
      'category_id' => new sfValidatorPropelChoice(array('model' => 'TimenoteCategory', 'column' => 'id', 'required' => false)),
      'comment'     => new sfValidatorString(array('max_length' => 255)),
      'start_dt'    => new sfValidatorDate(array('required' => false)),
      'end_dt'      => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('entry[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Entry';
  }


}
