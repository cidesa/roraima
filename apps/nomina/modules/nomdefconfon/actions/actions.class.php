<?php

/**
 * nomdefconfon actions.
 *
 * @package    siga
 * @subpackage nomdefconfon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefconfonActions extends autonomdefconfonActions
{
  public function getMostrarNomina()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npconfon->getCodnom(),3,' ');
  	  $c->add(NpnominaPeer::CODNOM, $this->campo);
  	  $this->nom = NpnominaPeer::doSelect($c);
	  if ($this->nom)
	  	return $this->nom[0]->getNomnom();
	  else 
	    return ' ';
  }
	
  public function getMostrarConcepto()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npconfon->getCodcon(),3,' ');
  	  $c->add(NpdefcptPeer::CODCON, $this->campo);
  	  $this->nom1 = NpdefcptPeer::doSelect($c);
	  if ($this->nom1)
	  	return $this->nom1[0]->getNomcon();
	  else 
	    return ' ';
  }
  
  public function executeEdit()
  {
    $c = new Criteria();
	$this->pagerNpconfon = NpconfonPeer::getPagerByCriteria($c,$this->getRequestParameter('page',1));
  	
  	$this->npconfon = $this->getNpconfonOrCreate();
    $this->nombre = $this->getMostrarNomina();
    $this->nombrec = $this->getMostrarConcepto();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      //$this->updateNpconfonFromRequest();

      //$this->saveNpconfon($this->npconfon);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefconfon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefconfon/list');
      }
      else
      {
        return $this->redirect('nomdefconfon/edit?id='.$this->npconfon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
  
  protected function updateNpconfonFromRequest()
  {
    $npconfon = $this->getRequestParameter('npconfon');

    if (isset($npconfon['codnom']))
    {
      $this->npconfon->setCodnom($npconfon['codnom']);
    }
    if (isset($npconfon['codcon']))
    {
      $this->npconfon->setCodcon($npconfon['codcon']);
    }
    if (isset($npconfon['tipcon']))
    {
      $this->npconfon->setTipcon($npconfon['tipcon']);
    }
  }
  
  
}
