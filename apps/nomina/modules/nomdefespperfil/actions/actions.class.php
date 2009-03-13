<?php

/**
 * nomdefespperfil actions.
 *
 * @package    siga
 * @subpackage nomdefespperfil
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespperfilActions extends autonomdefespperfilActions
{
 public function executeEdit()
  {
    $this->npperfil = $this->getNpperfilOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpperfilFromRequest();

      $this->saveNpperfil($this->npperfil);

      $this->npperfil->setId(Herramientas::getX_vacio('codperfil','npperfil','id',$this->npperfil->getCodperfil()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespperfil/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespperfil/list');
      }
      else
      {
        return $this->redirect('nomdefespperfil/edit?id='.$this->npperfil->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

protected function updateNpperfilFromRequest()
  {
    $npperfil = $this->getRequestParameter('npperfil');

    if (isset($npperfil['codperfil']))
    {
      $this->npperfil->setCodperfil(str_pad($npperfil['codperfil'],4,'0',STR_PAD_LEFT));
    }
    if (isset($npperfil['desperfil']))
    {
      $this->npperfil->setDesperfil($npperfil['desperfil']);
    }
  }

 public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npperfil = $this->getNpperfilOrCreate();
    $this->updateNpperfilFromRequest();

    $this->labels = $this->getLabels();

	if ($this->npperfil->getId()!='')
    {
    	$this->nuevo=true;
    }else
    {
    	$this->nuevo=false;
    }

    return sfView::SUCCESS;
  }


}
