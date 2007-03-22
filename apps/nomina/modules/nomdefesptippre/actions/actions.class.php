<?php

/**
 * nomdefesptippre actions.
 *
 * @package    siga
 * @subpackage nomdefesptippre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefesptippreActions extends autonomdefesptippreActions
{	
  public function getNomCon()
  {
  	  $c = new Criteria;
  	  $c->add(NpdefcptPeer::CODCON,str_pad($this->nptippre->getCodcon(),3,'0',STR_PAD_LEFT));
  	  $this->misdatos = NpdefcptPeer::doSelect($c);
  	  if ($this->misdatos)
	  	return $this->misdatos[0]->getNomcon();
	  else return ' ';	
  }
	

  public function executeEdit()
  {
    $this->nptippre = $this->getNptippreOrCreate();
    $this->nomcon = $this->getNomCon();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNptippreFromRequest();

      $this->saveNptippre($this->nptippre);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefesptippre/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefesptippre/list');
      }
      else
      {
        return $this->redirect('nomdefesptippre/edit?id='.$this->nptippre->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateNptippreFromRequest()
  {
    $nptippre = $this->getRequestParameter('nptippre');

    if (isset($nptippre['codcon']))
    {
      $this->nptippre->setCodcon(str_pad($nptippre['codcon'],3,'0',STR_PAD_LEFT));
    }
    if (isset($nptippre['tippre']))
    {
      $this->nptippre->setTippre($nptippre['tippre']);
    }
    if (isset($nptippre['codtippre']))
    {
      $this->nptippre->setCodtippre(str_pad($nptippre['codtippre'],4,'0',STR_PAD_LEFT));
    }
    if (isset($nptippre['destippre']))
    {
      $this->nptippre->setDestippre($nptippre['destippre']);
    }
  }
	
}
