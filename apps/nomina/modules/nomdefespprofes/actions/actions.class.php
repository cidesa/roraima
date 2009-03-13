<?php

/**
 * nomdefespprofes actions.
 *
 * @package    siga
 * @subpackage nomdefespprofes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespprofesActions extends autonomdefespprofesActions
{

public function executeEdit()
  {
    $this->npprofesion = $this->getNpprofesionOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpprofesionFromRequest();

      $this->saveNpprofesion($this->npprofesion);

      $this->npprofesion->setId(Herramientas::getX_vacio('codprofes','npprofesion','id',$this->npprofesion->getCodprofes()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespprofes/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespprofes/list');
      }
      else
      {
        return $this->redirect('nomdefespprofes/edit?id='.$this->npprofesion->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

protected function updateNpprofesionFromRequest()
  {
    $npprofesion = $this->getRequestParameter('npprofesion');

    if (isset($npprofesion['codprofes']))
    {
      $this->npprofesion->setCodprofes(str_pad($npprofesion['codprofes'], 4, '0', STR_PAD_LEFT));
    }
    if (isset($npprofesion['desprofes']))
    {
      $this->npprofesion->setDesprofes($npprofesion['desprofes']);
    }
    if (isset($npprofesion['nivpro']))
    {
      $this->npprofesion->setNivpro($npprofesion['nivpro']);
    }
  }

 public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npprofesion = $this->getNpprofesionOrCreate();
    $this->updateNpprofesionFromRequest();

    $this->labels = $this->getLabels();

    if ($this->npprofesion->getId()!='')
	{
		$this->nuevo=true;
	}else
	{
		$this->nuevo=false;
	}

    return sfView::SUCCESS;
  }

}
