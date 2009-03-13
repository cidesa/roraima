<?php

/**
 * nomdefespban actions.
 *
 * @package    siga
 * @subpackage nomdefespban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespbanActions extends autonomdefespbanActions
{
  public function executeEdit()
  {
    $this->npbancos = $this->getNpbancosOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpbancosFromRequest();

      $this->saveNpbancos($this->npbancos);

      $this->npbancos->setId(Herramientas::getX_vacio('codban','npbancos','id',$this->npbancos->getCodban()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespban/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespban/list');
      }
      else
      {
        return $this->redirect('nomdefespban/edit?id='.$this->npbancos->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateNpbancosFromRequest()
  {
    $npbancos = $this->getRequestParameter('npbancos');

  if (isset($npbancos['codban']))
    {
      $this->npbancos->setCodban(str_pad($npbancos['codban'],2,'0',STR_PAD_LEFT));
    }
    if (isset($npbancos['nomban']))
    {
      $this->npbancos->setNomban($npbancos['nomban']);
    }
  }

   public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npbancos = $this->getNpbancosOrCreate();
    $this->updateNpbancosFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
