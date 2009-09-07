<?php

/**
 * pretipfin actions.
 *
 * @package    Roraima
 * @subpackage pretipfin
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pretipfinActions extends autopretipfinActions
{
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fortipfin = $this->getFortipfinOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFortipfinFromRequest();

      $this->saveFortipfin($this->fortipfin);
      
      $this->fortipfin->setId(Herramientas::getX_vacio('codfin','fortipfin','id',$this->fortipfin->getCodfin()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pretipfin/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pretipfin/list');
      }
      else
      {
        return $this->redirect('pretipfin/edit?id='.$this->fortipfin->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
