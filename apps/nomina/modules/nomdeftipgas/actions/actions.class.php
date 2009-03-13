<?php

/**
 * nomdeftipgas actions.
 *
 * @package    siga
 * @subpackage nomdeftipgas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdeftipgasActions extends autonomdeftipgasActions
{

	public function executeEdit()
  {
    $this->nptipgas = $this->getNptipgasOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptipgasFromRequest();

      $this->saveNptipgas($this->nptipgas);

      $this->nptipgas->setId(Herramientas::getX_vacio('codtipgas','nptipgas','id',$this->nptipgas->getCodtipgas()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdeftipgas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdeftipgas/list');
      }
      else
      {
        return $this->redirect('nomdeftipgas/edit?id='.$this->nptipgas->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateNptipgasFromRequest()
  {
    $nptipgas = $this->getRequestParameter('nptipgas');

    if (isset($nptipgas['codtipgas']))
    {
      $this->nptipgas->setCodtipgas(str_pad($nptipgas['codtipgas'],4,'0',STR_PAD_LEFT));
    }
    if (isset($nptipgas['destipgas']))
    {
      $this->nptipgas->setDestipgas($nptipgas['destipgas']);
    }
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->nptipgas = $this->getNptipgasOrCreate();
    $this->updateNptipgasFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
