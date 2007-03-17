<?php

/**
 * almreq actions.
 *
 * @package    siga
 * @subpackage almreq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almreqActions extends autoalmreqActions
{

 public function executeEdit()
  {
    $this->careqart = $this->getCareqartOrCreate();
    $this->desubi = BnubibiePeer::getDesUbi($this->careqart->getCodcatreq());
    $this->pagerArtreq = CaartreqPeer::getPagerByReqart($this->careqart->getReqart());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCareqartFromRequest();

      $this->saveCareqart($this->careqart);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almreq/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almreq/list');
      }
      else
      {
        return $this->redirect('almreq/edit?id='.$this->careqart->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
}
