<?php

/**
 * nomtipcar actions.
 *
 * @package    siga
 * @subpackage nomtipcar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomtipcarActions extends autonomtipcarActions
{
public function executeEdit()
  {
    $this->nptipcar = $this->getNptipcarOrCreate();

    if ($this->nptipcar->getId()!='')
    {
    	$this->nuevo=true;
    }else
    {
    	$this->nuevo=false;
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptipcarFromRequest();

      $this->saveNptipcar($this->nptipcar);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomtipcar/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomtipcar/list');
      }
      else
      {
        return $this->redirect('nomtipcar/edit?id='.$this->nptipcar->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateNptipcarFromRequest()
  {
    $nptipcar = $this->getRequestParameter('nptipcar');

    if (isset($nptipcar['codtipcar']))
    {
      $this->nptipcar->setCodtipcar(str_pad($nptipcar['codtipcar'],3,'0',STR_PAD_LEFT));
    }
    if (isset($nptipcar['destipcar']))
    {
      $this->nptipcar->setDestipcar($nptipcar['destipcar']);
    }
  }
   public function handleErrorEdit()
  {
    $this->preExecute();
    $this->nptipcar = $this->getNptipcarOrCreate();
    $this->updateNptipcarFromRequest();

    $this->labels = $this->getLabels();

    if ($this->nptipcar->getId()!='')
    {
    	$this->nuevo=true;
    }else
    {
    	$this->nuevo=false;
    }

    return sfView::SUCCESS;
  }

}
