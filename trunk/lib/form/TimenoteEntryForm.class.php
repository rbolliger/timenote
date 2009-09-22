<?php

/**
 * TimenoteEntry form.
 *
 * @package    timenote
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfPropelFormTemplate.php 10377 2008-07-21 07:10:32Z dwhittle $
 */
class TimenoteEntryForm extends BaseTimenoteEntryForm
{
  public function configure()
  {

/*
    // getting root node
    $projectTreeListRoot = TimenoteProjectPeer::retrieveByPk('1') ;

    // adding incermential spaces
    foreach ($projectTreeListRoot->getDescendants() as $item) {

      $itm_prefix = '' ;

      for ($i=2 ; $i <= $item->getLevel() ; $i++) {
        $itm_prefix .= '&nbsp;&nbsp;' ;
      }
      
      $prjDropDown[$item->getId()] = $itm_prefix . $item->getTitle() ;

    }
 * 
 */

  /*  // configure the widget
    $this->widgetSchema['project_id'] = new sfWidgetFormChoice(array(
      'choices'  => $prjDropDown,
      'expanded' => false
    ));
*/
    // TODO: start_dt and end_dt input mask http://digitalbush.com/projects/masked-input-plugin/
    //$this->setWidgets['start_dt'] = new sfWidgetFormInput();

    // configure the widget
   // $this->widgetSchema['start_dt'] = new sfWidgetFormChoice(array(
   //   'choices'  => $prjDropDown,
   //   'expanded' => false
    //));

  $this->widgetSchema['start_dt'] = new sfWidgetFormDate();


  $this->widgetSchema['end_dt_time'] = new sfWidgetFormInput();



  }
}
