<?php

/**
 * nomnomcienom actions.
 *
 * @package    siga
 * @subpackage nomnomcienom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnomcienomActions extends autonomnomcienomActions
{
	 public function executeEdit()
  {
    $this->npnomina = $this->getNpnominaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->setFlash('notice', 'El cierre de la Nomina se ha realizado correctamente');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomnomcienom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomnomcienom/list');
      }
      else
      {
        return $this->redirect('nomnomcienom/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
}
