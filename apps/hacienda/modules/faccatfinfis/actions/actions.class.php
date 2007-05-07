<?php

/**
 * faccatfinfis actions.
 *
 * @package    siga
 * @subpackage faccatfinfis
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faccatfinfisActions extends autofaccatfinfisActions
{
  
  public function executeEdit()
  {
    $this->fccatfis = $this->getFccatfisOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFccatfisFromRequest();

      $this->saveFccatfis($this->fccatfis);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('faccatfinfis/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('faccatfinfis/list');
      }
      else
      {
        return $this->redirect('faccatfinfis/edit?id='.$this->fccatfis->getId());
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
    $this->fccatfis = $this->getFccatfisOrCreate();
    $this->updateFccatfisFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveFccatfis($fccatfis)
  {
    $fccatfis->save();

  }
  
  protected function updateFccatfisFromRequest()
  {
    $fccatfis = $this->getRequestParameter('fccatfis');

    if (isset($fccatfis['codcatfis']))
    {
      $codcatfis = $fccatfis['codcatfis'];
      if(strrchr($codcatfis,' ')) $codcatfis = str_replace(' ','-',$fccatfis['codcatfis']);
      
      $codcatfis = rpad($codcatfis,30,' ');
 
      $this->fccatfis->setCodcatfis($fccatfis['codcatfis']);
    }
    if (isset($fccatfis['nomcatfis']))
    {
      $this->fccatfis->setNomcatfis($fccatfis['nomcatfis']);
    }
    if (isset($fccatfis['linnor']))
    {
      $this->fccatfis->setLinnor($fccatfis['linnor']);
    }
    if (isset($fccatfis['linsur']))
    {
      $this->fccatfis->setLinsur($fccatfis['linsur']);
    }
    if (isset($fccatfis['linest']))
    {
      $this->fccatfis->setLinest($fccatfis['linest']);
    }
    if (isset($fccatfis['linoes']))
    {
      $this->fccatfis->setLinoes($fccatfis['linoes']);
    }
  }
  
  
}
