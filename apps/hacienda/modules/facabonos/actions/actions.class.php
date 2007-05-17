<?php

/**
 * facabonos actions.
 *
 * @package    siga
 * @subpackage facabonos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facabonosActions extends autofacabonosActions
{
  public function CargarFuentes()
	{
	$c = new Criteria();
	$lista_tip = FcfueprePeer::doSelect($c);
	
	$tipos = array();
	
	foreach($lista_tip as $obj_tip)
	{
	   $tipos += array($obj_tip->getCodfue()=> $obj_tip->getCodfue()." - ".$obj_tip->getNomfue());    
	}
	return $tipos;
    }
    
    public function executeEdit()
  {
    $this->fcabonos = $this->getFcabonosOrCreate();
    $this->fuentes = $this->CargarFuentes();
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcabonosFromRequest();

      $this->saveFcabonos($this->fcabonos);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('facabonos/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('facabonos/list');
      }
      else
      {
        return $this->redirect('facabonos/edit?id='.$this->fcabonos->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
    
}
