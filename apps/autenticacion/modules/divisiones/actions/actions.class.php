<?php

/**
 * divisiones actions.
 *
 * @package    Roraima
 * @subpackage divisiones
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class divisionesActions extends autodivisionesActions
{
   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->division = $this->getDivisionOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateDivisionFromRequest();

      $this->saveDivision($this->division);

      $this->division->setId(Herramientas::getX_vacio('coddiv','division','id',$this->division->getCoddiv()));

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('divisiones/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('divisiones/list');
      }
      else
      {
        return $this->redirect('divisiones/edit?id='.$this->division->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
