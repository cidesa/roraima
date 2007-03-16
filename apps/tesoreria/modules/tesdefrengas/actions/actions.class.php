<?php

/**
 * tesdefrengas actions.
 *
 * @package    siga
 * @subpackage tesdefrengas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesdefrengasActions extends autotesdefrengasActions
{

public function getMostrar_tipo2()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->tsdefrengas->getPagrepcaj(),4,' ');
  	  $c->add(CpdoccauPeer::TIPCAU, $this->campo);
  	  $this->causa = CpdoccauPeer::doSelect($c);
	  if ($this->causa)
	  	return $this->causa[0]->getNomext();
	  else 
	    return ' ';
  }
  
public function getMostrar_cuenta()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->tsdefrengas->getCtarepcaj(),32,' ');
  	  $c->add(ContabbPeer::CODCTA, $this->campo);
  	  $this->ctap = ContabbPeer::doSelect($c);
	  if ($this->ctap)
	  	return $this->ctap[0]->getDescta();
	  else 
	    return ' ';
  }
  
public function getMostrar_cuenta2()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->tsdefrengas->getCtacheant(),32,' ');
  	  $c->add(ContabbPeer::CODCTA, $this->campo);
  	  $this->ctap = ContabbPeer::doSelect($c);
	  if ($this->ctap)
	  	return $this->ctap[0]->getDescta();
	  else 
	    return ' ';
  }
  
public function getMostrar_tipmov()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->tsdefrengas->getMovreicaj(),4,' ');
  	  $c->add(TstipmovPeer::CODTIP, $this->campo);
  	  $this->codigo = TstipmovPeer::doSelect($c);
	  if ($this->codigo)
	  	return $this->codigo[0]->getDestip();
	  else 
	    return ' ';
  }

	public function executeEdit()
  {
     $this->tsdefrengas = $this->getTsdefrengasOrCreate();
     $this->causado = $this->getMostrar_tipo2();
     $this->ctatrans = $this->getMostrar_cuenta();
     $this->ctafondos = $this->getMostrar_cuenta2();
     $this->movimiento = $this->getMostrar_tipmov();
    

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateTsdefrengasFromRequest();

      $this->saveTsdefrengas($this->tsdefrengas);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('tesdefrengas/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('tesdefrengas/list');
      }
      else
      {
        return $this->redirect('tesdefrengas/edit?id='.$this->tsdefrengas->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

}

