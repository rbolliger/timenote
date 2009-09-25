<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Hour filter form base class.
 *
 * @package    timenote
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseHourFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'project_id'           => new sfWidgetFormPropelChoice(array('model' => 'TimenoteProject', 'add_empty' => true)),
      'type_id'              => new sfWidgetFormPropelChoice(array('model' => 'TimenoteType', 'add_empty' => true)),
      'user_id'              => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'start_dt'             => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'end_dt'               => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'comment'              => new sfWidgetFormFilterInput(),
      'user_profile_version' => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUserProfile', 'add_empty' => true, 'key_method' => 'getVersion')),
    ));

    $this->setValidators(array(
      'project_id'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TimenoteProject', 'column' => 'id')),
      'type_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TimenoteType', 'column' => 'id')),
      'user_id'              => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'start_dt'             => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'end_dt'               => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'comment'              => new sfValidatorPass(array('required' => false)),
      'user_profile_version' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUserProfile', 'column' => 'version')),
    ));

    $this->widgetSchema->setNameFormat('hour_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Hour';
  }

  public function getFields()
  {
    return array(
      'id'                   => 'Number',
      'project_id'           => 'ForeignKey',
      'type_id'              => 'ForeignKey',
      'user_id'              => 'ForeignKey',
      'start_dt'             => 'Date',
      'end_dt'               => 'Date',
      'comment'              => 'Text',
      'user_profile_version' => 'ForeignKey',
    );
  }
}
