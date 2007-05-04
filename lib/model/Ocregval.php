<?php

/**
 * Subclass for representing a row from the 'ocregval' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Ocregval extends BaseOcregval
{
	private $codobr;
	private $codpro;
	private $tipcon;
	private $gasree2;
	private $moncon;
	
	public function getDesobr()
	  {  
	  	if ($this->datosContrato())  
	  	{
	  	  $obra=$this->codobr;
	  	  $c = new Criteria();
	  	  $c->add(OcregobrPeer::CODOBR,$obra);
	  	  $descripcion = OcregobrPeer::doSelectone($c);
		  if ($descripcion)
		  	return $descripcion->getDesobr();
		  else 
		    return 'No encontrado';  
	  	}	  	
	  }
	  
	public function getNompro()
	  {  
	  	if ($this->datosContrato())  
	  	{
	  	  $proveedor=$this->codpro;
	  	  $c = new Criteria();
	  	  $c->add(CaproveePeer::CODPRO,$proveedor);
	  	  $nompro = CaproveePeer::doSelectone($c);
		  if ($nompro)
		  	return $nompro->getNompro();
		  else 
		    return 'No encontrado';  
	  	}	  	 
	  }	 

	public function getTipcon()
	  {  
	    if ($this->datosContrato())  
		  {
		    return $this->tipcon;
		  }		   	
	   }	

	public function getGasree2()
	  {  
		if ($this->datosContrato())  
		  {
			return $this->gasree2;
		  }		  
	  }	

	public function getMoncon()
	  {  
		if ($this->datosContrato())  
		  {
			return $this->moncon;
		  }		  		  	
	   }		   
  
  public function datosContrato()
  {
  	  $c = new Criteria; 
  	  $c->addJoin(OcregconPeer::CODCON,OcregvalPeer::CODCON); 	 
  	  $c->add(OcregconPeer::CODCON,self::getCodcon());
  	  $this->nombre = OcregconPeer::doSelect($c);
  	  if ($this->nombre)
	  	{
	  		$this->codobr = $this->nombre[0]->getCodobr();
	  	    $this->codpro = $this->nombre[0]->getCodpro();
	  	    $this->tipcon = $this->nombre[0]->getTipcon();
	  	    $this->gasree2 = $this->nombre[0]->getGasree();
	  	    $this->moncon = $this->nombre[0]->getMoncon();
	  	    return true;
	  	}
	  	else
	  	{
	  		$this->codobr = 'No encontrado';
	  	    $this->codpro = 'No encontrado';
	  	    $this->tipcon = 'No encontrado';
	  	    $this->gasree = 'No encontrado';
	  	    $this->moncon = 'No encontrado';
	  	    return false;
	  	}
	  	
  }	
}

