<?php

/**
 * pagretcon actions.
 *
 * @package    siga
 * @subpackage pagretcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagretconActions extends autopagretconActions
{
  public function getDescon()
  {
  	  $c = new Criteria;
  	  $c->add(NpdefcptPeer::CODCON,$this->opretcon->getCodcon());
  	  $this->Nomcom = NpdefcptPeer::doSelect($c);
  	  if ($this->Nomcom)
	    return $this->Nomcom[0]->getNomcon();
	  else 
	    return ' ';
  }	
	
  public function getDesnom()
  {
  	  $c = new Criteria;
  	  $c->add(NpnominaPeer::CODNOM,$this->opretcon->getCodnom());
  	  $this->Nomnom = NpnominaPeer::doSelect($c);
  	  if ($this->Nomnom)
	    return $this->Nomnom[0]->getNomnom();
	  else 
	    return ' ';
  }	
  
  public function getDesret()
  {
  	  $c = new Criteria;
  	  $c->add(OptipretPeer::CODTIP,$this->opretcon->getCodtip());
  	  $this->Nomret = OptipretPeer::doSelect($c);
  	  if ($this->Nomret)
	    return $this->Nomret[0]->getDestip();
	  else 
	    return ' ';
  }
  
  public function executeEdit()
  {
    $this->opretcon = $this->getOpretconOrCreate();
    $this->descon = $this->getDescon();
    $this->desnom = $this->getDesnom();
    $this->desret = $this->getDesret();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpretconFromRequest();

      $this->saveOpretcon($this->opretcon);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagretcon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagretcon/list');
      }
      else
      {
        return $this->redirect('pagretcon/edit?id='.$this->opretcon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
