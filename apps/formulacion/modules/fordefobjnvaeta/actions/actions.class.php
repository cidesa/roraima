<?php

/**
 * fordefobjnvaeta actions.
 *
 * @package    Roraima
 * @subpackage fordefobjnvaeta
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefobjnvaetaActions extends autofordefobjnvaetaActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefobjestnvaeta = $this->getFordefobjestnvaetaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefobjestnvaetaFromRequest();

      $this->saveFordefobjestnvaeta($this->fordefobjestnvaeta);

     // $this->fordefobjestnvaeta->setId(Herramientas::getX_vacio('codobjnvaeta','fordefobjestnvaeta','id',$this->fordefobjestnvaeta->getCodobjnvaeta()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefobjnvaeta/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefobjnvaeta/list');
      }
      else
      {
        return $this->redirect('fordefobjnvaeta/edit?id='.$this->fordefobjestnvaeta->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}

