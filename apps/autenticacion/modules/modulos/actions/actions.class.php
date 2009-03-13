<?php

/**
 * modulos actions.
 *
 * @package    siga
 * @subpackage modulos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class modulosActions extends automodulosActions
{
   public function executeEdit()
  {
    $this->aplicacion = $this->getAplicacionOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateAplicacionFromRequest();

      $this->saveAplicacion($this->aplicacion);

      $this->aplicacion->setId(Herramientas::getX_vacio('codapl','aplicacion','id',$this->aplicacion->getCodapl()));

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('modulos/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('modulos/list');
      }
      else
      {
        return $this->redirect('modulos/edit?id='.$this->aplicacion->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   protected function updateAplicacionFromRequest()
  {
    $aplicacion = $this->getRequestParameter('aplicacion');

    if (isset($aplicacion['codapl']))
    {
      $this->aplicacion->setCodapl($aplicacion['codapl']);
    }
    if (isset($aplicacion['nomapl']))
    {
      $this->aplicacion->setNomapl($aplicacion['nomapl']);
    }
    if (isset($aplicacion['nomyml']))
    {
      $this->aplicacion->setNomyml($aplicacion['nomyml']);
    }

    $this->aplicacion->setNomuse('SIMA');
    $this->aplicacion->setAplact('S');
    $this->aplicacion->setAplpri('S');

    }
}
