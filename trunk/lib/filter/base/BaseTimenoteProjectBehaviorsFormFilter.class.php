<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * TimenoteProjectBehaviors filter form base class.
 *
 * @package    timenote
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTimenoteProjectBehaviorsFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'project_id'  => new sfWidgetFormPropelChoice(array('model' => 'TimenoteProject', 'add_empty' => true)),
      'title'       => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'project_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TimenoteProject', 'column' => 'id')),
      'title'       => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('timenote_project_behaviors_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TimenoteProjectBehaviors';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'project_id'  => 'ForeignKey',
      'title'       => 'Text',
      'description' => 'Text',
    );
  }
}
