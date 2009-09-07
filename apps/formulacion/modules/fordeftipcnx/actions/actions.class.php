<?php

/**
 * fordeftipcnx actions.
 *
 * @package    Roraima
 * @subpackage fordeftipcnx
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordeftipcnxActions extends autofordeftipcnxActions
{
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordeftipcnx = $this->getFordeftipcnxOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordeftipcnxFromRequest();

      $this->saveFordeftipcnx($this->fordeftipcnx);
      
      $this->fordeftipcnx->setId(Herramientas::getX_vacio('codtipcnx','fordeftipcnx','id',$this->fordeftipcnx->getCodtipcnx()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordeftipcnx/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordeftipcnx/list');
      }
      else
      {
        return $this->redirect('fordeftipcnx/edit?id='.$this->fordeftipcnx->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
