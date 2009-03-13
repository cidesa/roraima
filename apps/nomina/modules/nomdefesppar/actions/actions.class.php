<?php

/**
 * nomdefesppar actions.
 *
 * @package    siga
 * @subpackage nomdefesppar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespparActions extends autonomdefespparActions
{
public function executeEdit()
  {
    $this->nptippar = $this->getNptipparOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptipparFromRequest();

      $this->saveNptippar($this->nptippar);

      $this->nptippar->setId(Herramientas::getX_vacio('tippar','nptippar','id',$this->nptippar->getTippar()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefesppar/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefesppar/list');
      }
      else
      {
        return $this->redirect('nomdefesppar/edit?id='.$this->nptippar->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


	protected function updateNptipparFromRequest()
  {
    $nptippar = $this->getRequestParameter('nptippar');

    if (isset($nptippar['tippar']))
    {
      $this->nptippar->setTippar(str_pad($nptippar['tippar'],3,'0',STR_PAD_LEFT));
    }
    if (isset($nptippar['despar']))
    {
      $this->nptippar->setDespar($nptippar['despar']);
    }
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->nptippar = $this->getNptipparOrCreate();
    $this->updateNptipparFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
