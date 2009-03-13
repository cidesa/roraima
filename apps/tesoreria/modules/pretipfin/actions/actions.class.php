<?php

/**
 * pretipfin actions.
 *
 * @package    siga
 * @subpackage pretipfin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pretipfinActions extends autopretipfinActions
{
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
