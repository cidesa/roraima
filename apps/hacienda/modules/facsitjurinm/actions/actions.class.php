<?php

/**
 * facsitjurinm actions.
 *
 * @package    siga
 * @subpackage facsitjurinm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facsitjurinmActions extends autofacsitjurinmActions
{
  
  public function executeEdit()
  {
    $this->fcsitjurinm = $this->getFcsitjurinmOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcsitjurinmFromRequest();

      $this->saveFcsitjurinm($this->fcsitjurinm);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('facsitjurinm/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('facsitjurinm/list');
      }
      else
      {
        return $this->redirect('facsitjurinm/edit?id='.$this->fcsitjurinm->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->fcsitjurinm = $this->getFcsitjurinmOrCreate();
    $this->updateFcsitjurinmFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }
  
  protected function saveFcsitjurinm($fcsitjurinm)
  {
    $fcsitjurinm->save();

  }
  
  protected function updateFcsitjurinmFromRequest()
  {
    $fcsitjurinm = $this->getRequestParameter('fcsitjurinm');

    if (isset($fcsitjurinm['codsitinm']))
    {
      $this->fcsitjurinm->setCodsitinm($fcsitjurinm['codsitinm']);
    }
    if (isset($fcsitjurinm['nomsitinm']))
    {
      $this->fcsitjurinm->setNomsitinm($fcsitjurinm['nomsitinm']);
    }
    if (isset($fcsitjurinm['stasitinm']))
    {
      $this->fcsitjurinm->setStasitinm($fcsitjurinm['stasitinm']);
    }
  }
  
  
}
