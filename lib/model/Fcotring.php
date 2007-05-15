<?php

/**
 * Subclass for representing a row from the 'fcotring' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Fcotring extends BaseFcotring
{
	
	private $naccon;
	private $tipcon;
	private $nomconr;
	private $dirconr;
	private $nacconr;
	private $tipconr;  
  
	      
	public function getNaccon()
	  {  
	    if ($this->datosContribuyente())  
		  {
		    return $this->naccon;
		  }		  	
	  }	      

	public function getTipcon()
	  {  
		if ($this->datosContribuyente())  
		  {
		    return $this->tipcon;
		  }		   	
      }

    public function getNomconr()
	  {  
        if ($this->datosRepresentante())  
	      {
		    return $this->nomconr;
		  }		   	
      }	
      
	public function getDirconr()
	  {  
	    if ($this->datosRepresentante())  
		  {
		    return $this->dirconr;
		  }		   	
	  }   
	      
	public function getNacconr()
	  {  
	    if ($this->datosRepresentante())  
		  {
		    return $this->nacconr;
		  }		   	
	  }	      

	public function getTipconr()
	  {  
		if ($this->datosRepresentante())  
		  {
		    return $this->tipconr;
		  }		   	
      }      
	
	public function datosContribuyente()
	  {
	  	  $c = new Criteria;
	  	  $c->add(FcconrepPeer::REPCON,'C'); 
	  	  $c->addJoin(FcconrepPeer::RIFCON,FcotringPeer::RIFCON); 	 
	  	  $c->add(FcconrepPeer::RIFCON,self::getRifcon());
	  	  $this->contribuyente = FcconrepPeer::doSelect($c);
	  	  if ($this->contribuyente)
		  	{
		  		$this->nomcon = $this->contribuyente[0]->getNomcon();
		  		$this->dircon = $this->contribuyente[0]->getDircon();
		  		$this->naccon = $this->contribuyente[0]->getNaccon();
		  	    $this->tipcon = $this->contribuyente[0]->getTipcon();		  	    
		  	    return true;
		  	}
		  	else
		  	{
		  		$this->nomcon = 'No encontrado';
		  		$this->dircon = 'No encontrado';
		  		$this->naccon = 'No encontrado';
		  	    $this->tipcon = 'No encontrado';		  	    
		  	    return false;
		  	}
		  	
	  }		
	  
	public function datosRepresentante()
		  {
		  	  $c = new Criteria;
		  	  $c->add(FcconrepPeer::REPCON,'R'); 
		  	  $c->addJoin(FcconrepPeer::RIFCON,FcotringPeer::RIFREP); 	 
		  	  $c->add(FcconrepPeer::RIFCON,self::getRifrep());
		  	  $this->representante = FcconrepPeer::doSelect($c);
		  	  if ($this->representante)
			  	{
			  		$this->nomconr = $this->representante[0]->getNomcon();
			  	    $this->dirconr = $this->representante[0]->getDircon();
			  	    $this->nacconr = $this->representante[0]->getNaccon();
			  	    $this->tipconr = $this->representante[0]->getTipcon();		  	    
			  	    return true;
			  	}
			  	else
			  	{
			  		$this->nomconr = 'No encontrado';
			  	    $this->dirconr = 'No encontrado';
			  	    $this->nacconr = 'No encontrado';
			  	    $this->tipconr = 'No encontrado';		  	    
			  	    return false;
			  	}
			  	
		  }	  
}
