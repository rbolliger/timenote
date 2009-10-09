<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * TimelineGenerator filter form base class.
 *
 * @package    timenote
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseTimelineGeneratorFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'date_start'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'workdays'    => new sfWidgetFormFilterInput(),
      'off_days'    => new sfWidgetFormFilterInput(),
      'hours_start' => new sfWidgetFormFilterInput(),
      'hours_stop'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'date_start'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'workdays'    => new sfValidatorPass(array('required' => false)),
      'off_days'    => new sfValidatorPass(array('required' => false)),
      'hours_start' => new sfValidatorPass(array('required' => false)),
      'hours_stop'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('timeline_generator_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'TimelineGenerator';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'date_start'  => 'Date',
      'workdays'    => 'Text',
      'off_days'    => 'Text',
      'hours_start' => 'Text',
      'hours_stop'  => 'Text',
    );
  }
}
