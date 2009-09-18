<?php

/**
 * search actions.
 *
 * @package    timenote
 * @subpackage search
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class searchActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->timenote_entry_list = TimenoteEntryPeer::doSelect(new Criteria());
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new TimenoteEntryForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));

    $this->form = new TimenoteEntryForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($timenote_entry = TimenoteEntryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object timenote_entry does not exist (%s).', $request->getParameter('id')));
    $this->form = new TimenoteEntryForm($timenote_entry);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($timenote_entry = TimenoteEntryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object timenote_entry does not exist (%s).', $request->getParameter('id')));
    $this->form = new TimenoteEntryForm($timenote_entry);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($timenote_entry = TimenoteEntryPeer::retrieveByPk($request->getParameter('id')), sprintf('Object timenote_entry does not exist (%s).', $request->getParameter('id')));
    $timenote_entry->delete();

    $this->redirect('search/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $timenote_entry = $form->save();

      $this->redirect('search/edit?id='.$timenote_entry->getId());
    }
  }
}
