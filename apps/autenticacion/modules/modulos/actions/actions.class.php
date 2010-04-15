<?php

/**
 * modulos actions.
 *
 * @package    Roraima
 * @subpackage modulos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class modulosActions extends automodulosActions
{
   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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

   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
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
