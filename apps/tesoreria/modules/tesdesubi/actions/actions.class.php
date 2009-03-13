<?php

/**
 * tesdesubi actions.
 *
 * @package    siga
 * @subpackage tesdesubi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdesubiActions extends autotesdesubiActions
{
  public function executeEdit()
  {
    $this->bnubica = $this->getBnubicaOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBnubicaFromRequest();

      $this->saveBnubica($this->bnubica);

      $this->bnubica->setId(Herramientas::getX_vacio('codubi','bnubica','id',$this->bnubica->getCodubi()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdesubi/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdesubi/list');
      }
      else
      {
        return $this->redirect('tesdesubi/edit?id='.$this->bnubica->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateBnubicaFromRequest()
  {
    $bnubica = $this->getRequestParameter('bnubica');
    $this->setVars();

    if (isset($bnubica['codubi']))
    {
      $this->bnubica->setCodubi($bnubica['codubi']);
    }
    if (isset($bnubica['desubi']))
    {
      $this->bnubica->setDesubi($bnubica['desubi']);
    }

      $this->bnubica->setStacod('A');

  }

  public function setVars()
  {
   $this->mascaraubi = Herramientas::ObtenerFormato('Opdefemp','Forubi');
   $this->lonubi=strlen($this->mascaraubi);
  }
}


