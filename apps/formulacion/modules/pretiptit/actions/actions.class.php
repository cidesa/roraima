<?php

/**
 * pretiptit actions.
 *
 * @package    siga
 * @subpackage pretiptit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pretiptitActions extends autopretiptitActions
{
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
