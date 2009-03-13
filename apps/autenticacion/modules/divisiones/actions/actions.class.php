<?php

/**
 * divisiones actions.
 *
 * @package    siga
 * @subpackage divisiones
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class divisionesActions extends autodivisionesActions
{
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
