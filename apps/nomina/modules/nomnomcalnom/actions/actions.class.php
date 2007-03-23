<?php

/**
 * nomnomcalnom actions.
 *
 * @package    siga
 * @subpackage nomnomcalnom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnomcalnomActions extends autonomnomcalnomActions
{

	 public function executeEdit()
  {
    $this->npnomina = $this->getNpnominaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
    //  $this->updateNpnominaFromRequest();

    //  $this->saveNpnomina($this->npnomina);

      $this->setFlash('notice', 'El calculo de la nomina fue realizado correctamente...');

      return $this->redirect('nomnomcalnom/edit?id='.$this->npnomina->getId());
     
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
}
