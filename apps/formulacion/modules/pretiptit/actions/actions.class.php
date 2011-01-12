<?php

/**
 * pretiptit actions.
 *
 * @package    Roraima
 * @subpackage pretiptit
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pretiptitActions extends autopretiptitActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fortiptit = $this->getFortiptitOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFortiptitFromRequest();

      $this->saveFortiptit($this->fortiptit);
      
      $this->fortiptit->setId(Herramientas::getX_vacio('codtip','fortiptit','id',$this->fortiptit->getCodtip()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pretiptit/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pretiptit/list');
      }
      else
      {
        return $this->redirect('pretiptit/edit?id='.$this->fortiptit->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
