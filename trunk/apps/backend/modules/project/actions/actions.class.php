<?php

require_once dirname(__FILE__).'/../lib/projectGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/projectGeneratorHelper.class.php';

/**
 * project actions.
 *
 * @package    timenote
 * @subpackage project
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class projectActions extends autoProjectActions
{
  public function executeAddChild(sfWebRequest $request)
  {
    $this->timenote_project = $this->getRoute()->getObject();

    // On récupère le parent pour insérer le nouveau projet sous ce parent et on le fait transiter via session
    $this->getUser()->setAttribute('timenote_project.addChild',$this->timenote_project->getPrimaryKey(), 'admin_module');

    $this->form = $this->configuration->getForm();
    $this->setTemplate('new');
  }

  /**
   * On surcharge le processForm pour récupérer le parent du projet à ajouter s'il existe
   *
   * @param sfWebRequest $request
   * @param sfForm $form
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    if ($parent = $this->getUser()->getAttribute('timenote_project.addChild', null, 'admin_module'))
    {
      $this->getUser()->getAttributeHolder()->remove('timenote_project.addChild', null, 'admin_module');
      $root = TimenoteProjectPeer::retrieveByPk($parent);
      $form->getObject()->insertAsLastChildOf($root);
    }

    parent::processForm($request,$form);
  }
  
  
  public function executeBatchSaveOrder(sfWebRequest $request)
  {
    $hash = $request->getParameter('hashValue');
    parse_str($hash, $list);
    TimenoteProjectPeer::saveOrder($list);
    $this->getUser()->setFlash('notice', 'New order saved');
  }
}
