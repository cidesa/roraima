<?php

/**
 * almajuoc actions.
 *
 * @package    siga
 * @subpackage almajuoc
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almajuocActions extends autoalmajuocActions
{
	
  public function executeEdit()
  {
    $this->caajuoc = $this->getCaajuocOrCreate();
    $this->pagercaartaoc = CaartaocPeer::getPagerByAjuoc($this->caajuoc->getAjuoc()); 

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaajuocFromRequest();

      $this->saveCaajuoc($this->caajuoc);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almajuoc/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almajuoc/list');
      }
      else
      {
        return $this->redirect('almajuoc/edit?id='.$this->caajuoc->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
}
