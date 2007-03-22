<?php

/**
 * nomconceptoscompensacion actions.
 *
 * @package    siga
 * @subpackage nomconceptoscompensacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomconceptoscompensacionActions extends autonomconceptoscompensacionActions
{
public function getMostrar_TIPONOM()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npconcomp->getCodnom(),3,' ');
  	  $c->add(NpnominaPeer::CODNOM, $this->campo);
  	  $this->nomina = NpnominaPeer::doSelect($c);
	  if ($this->nomina)
	  	return $this->nomina[0]->getNomnom();
	  else 
	    return ' ';
  }
	
public function getMostrar_CONCEPTO()
  {
  	  $c = new Criteria;
  	  $this->campo = str_pad($this->npconcomp->getCodcon(),3,' ');
  	  $c->add(NpdefcptPeer::CODCON, $this->campo);
  	  $this->concep = NpdefcptPeer::doSelect($c);
	  if ($this->concep)
	  	return $this->concep[0]->getNomcon();
	  else 
	    return ' ';
  }	
	
	
	
public function executeEdit()
  {
    $this->npconcomp = $this->getNpconcompOrCreate();
    $this->nomina = $this->getMostrar_TIPONOM();
    $this->concepto = $this->getMostrar_CONCEPTO();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpconcompFromRequest();

      $this->saveNpconcomp($this->npconcomp);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomconceptoscompensacion/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomconceptoscompensacion/list');
      }
      else
      {
        return $this->redirect('nomconceptoscompensacion/edit?id='.$this->npconcomp->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
	
	
}
