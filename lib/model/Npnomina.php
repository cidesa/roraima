<?php

/**
 * Subclass for representing a row from the 'npnomina' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npnomina extends BaseNpnomina
{
  public function getMonto()
  {
  	//consulta a 3 tablas para saber la foma de entrega
  	  $c = new Criteria;
  	  $this->campo = self::getCodnom();	  
  	  $c->add(NpdefcptPeer::CODCON, $this->campo);	  
  	  $c->addJoin(NpasiconnomPeer::CODCON,NpdefcptPeer::CODCON);
  	  $this->rt = NpasiconnomPeer::doSelect($c);
  	  if ($this->rt)
	  	{
	  		$this->codcon = $this->rt[0]->getCodcon();
            $c->add(NpdefmovPeer::CODNOM, $this->campo);
            $c->add(NpdefmovPeer::CODCON, $this->codcon);
            $c->add(NpdefmovPeer::STATUS, 'M');	
            $this->rt = NpdefmovPeer::doSelect($c);       
            if ($this->rt)
            {
               return $this->monto = '<img src="/images/check.gif" width="16" height="15">'; 
            }
	  	}
	  	else
	  	{
	  	    return  $this->monto = false;
	  	}
	  	 
  }	 	
  public function getCantidad()
  {
  	//consulta a 3 tablas para saber la foma de entrega
  	  $c = new Criteria;
  	  $this->campo = self::getCodnom();	  
  	  $c->add(NpdefcptPeer::CODCON, $this->campo);	  
  	  $c->addJoin(NpasiconnomPeer::CODCON,NpdefcptPeer::CODCON);
  	  $this->rt = NpasiconnomPeer::doSelect($c);
  	  if ($this->rt)
	  	{
	  		$this->codcon = $this->rt[0]->getCodcon();
            $c->add(NpdefmovPeer::CODNOM, $this->campo);
            $c->add(NpdefmovPeer::CODCON, $this->codcon);
            $c->add(NpdefmovPeer::STATUS, 'C');	
            $this->rt = NpdefmovPeer::doSelect($c);       
            if ($this->rt)
            {
               return $this->cantidad = '<img src="/images/check.gif" width="16" height="15">'; 
            }            
	  	}
	  	else
	  	{
	  	    return $this->cantidad = false;	  	    
	  	}
	  	 
  }	 	  
	
}
