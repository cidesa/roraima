<?php

/**
 * asignarcategoriasconceptosxempleado actions.
 *
 * @package    siga
 * @subpackage asignarcategoriasconceptosxempleado
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class asignarcategoriasconceptosxempleadoActions extends autoasignarcategoriasconceptosxempleadoActions
{
	
  public function executeEdit()
  {
    $this->npdefcpt = $this->getNpdefcptOrCreate();
    $this->pagerNpasicatconemp = NpasicatconempPeer::getPagerByCodcon($this->npdefcpt->getCodcon(),$this->getRequestParameter('page',1));

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpdefcptFromRequest();

      $this->saveNpdefcpt($this->npdefcpt);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('asignarcategoriasconceptosxempleado/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('asignarcategoriasconceptosxempleado/list');
      }
      else
      {
        return $this->redirect('asignarcategoriasconceptosxempleado/edit?id='.$this->npdefcpt->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
}
