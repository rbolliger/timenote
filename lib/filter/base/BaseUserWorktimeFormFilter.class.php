<?php

require_once(sfConfig::get('sf_lib_dir').'/filter/base/BaseFormFilterPropel.class.php');

/**
 * UserWorktime filter form base class.
 *
 * @package    timenote
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormFilterGeneratedTemplate.php 16976 2009-04-04 12:47:44Z fabien $
 */
class BaseUserWorktimeFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'user_id'                        => new sfWidgetFormPropelChoice(array('model' => 'sfGuardUser', 'add_empty' => true)),
      'serie_start'                    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => true)),
      'timeline_generator_id'          => new sfWidgetFormPropelChoice(array('model' => 'TimelineGenerator', 'add_empty' => true)),
      'timeline_generator_workdays'    => new sfWidgetFormFilterInput(),
      'timeline_generator_offdays'     => new sfWidgetFormFilterInput(),
      'timeline_generator_hours_start' => new sfWidgetFormFilterInput(),
      'timeline_generator_hours_stop'  => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'user_id'                        => new sfValidatorPropelChoice(array('required' => false, 'model' => 'sfGuardUser', 'column' => 'id')),
      'serie_start'                    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'timeline_generator_id'          => new sfValidatorPropelChoice(array('required' => false, 'model' => 'TimelineGenerator', 'column' => 'id')),
      'timeline_generator_workdays'    => new sfValidatorPass(array('required' => false)),
      'timeline_generator_offdays'     => new sfValidatorPass(array('required' => false)),
      'timeline_generator_hours_start' => new sfValidatorPass(array('required' => false)),
      'timeline_generator_hours_stop'  => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('user_worktime_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'UserWorktime';
  }

  public function getFields()
  {
    return array(
      'id'                             => 'Number',
      'user_id'                        => 'ForeignKey',
      'serie_start'                    => 'Date',
      'timeline_generator_id'          => 'ForeignKey',
      'timeline_generator_workdays'    => 'Text',
      'timeline_generator_offdays'     => 'Text',
      'timeline_generator_hours_start' => 'Text',
      'timeline_generator_hours_stop'  => 'Text',
    );
  }
}
