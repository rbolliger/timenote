<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * Entry filter form base class.
 *
 * @package    timenote
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseEntryFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'project_id'  => new sfWidgetFormPropelChoice(array('model' => 'tnProject', 'add_empty' => true)),
      'category_id' => new sfWidgetFormPropelChoice(array('model' => 'TimenoteCategory', 'add_empty' => true)),
      'comment'     => new sfWidgetFormFilterInput(),
      'start_dt'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'end_dt'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
    ));

    $this->setValidators(array(
      'project_id'  => new sfValidatorPropelChoice(array('required' => false, 'model' => 'tnProject', 'column' => 'id')),
      'category_id' => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TimenoteCategory', 'column' => 'id')),
      'comment'     => new sfValidatorPass(array('required' => false)),
      'start_dt'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'end_dt'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('entry_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Entry';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'project_id'  => 'ForeignKey',
      'category_id' => 'ForeignKey',
      'comment'     => 'Text',
      'start_dt'    => 'Date',
      'end_dt'      => 'Date',
    );
  }
}
