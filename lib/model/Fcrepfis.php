<?php

/**
 * Subclass for representing a row from the 'fcrepfis'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fcrepfis extends BaseFcrepfis
{
	private $rifcon;
	private $nomcon;
	private $dircon;
	private $naccon;
	private $tipcon;
	
    public function getRifcon()
	  {  
        if ($this->datosContribuyente())  
	      {
		    return $this->rifcon;
		  }		   	
      }	   
	
	public function getNomcon()
	  {  
        if ($this->datosContribuyente())  
	      {
		    return $this->nomcon;
		  }		   	
      }	
      
	public function getDircon()
	  {  
	    if ($this->datosContribuyente())  
		  {
		    return $this->dircon;
		  }		   	
	  }   
	      
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
	
	public function datosContribuyente()
	  {
	    
	  	  $rif=Herramientas::getX('NUMREF','Fcdeclar','Rifcon',self::getNumlic());
	  	  $c = new Criteria;	  	  	  	  	 
	  	  $c->add(FcconrepPeer::RIFCON,$rif);
	  	  $this->contribuyente = FcconrepPeer::doSelect($c);
	  	  if ($this->contribuyente)
		  	{
		  		$this->rifcon = $this->contribuyente[0]->getRifcon();
		  		$this->nomcon = $this->contribuyente[0]->getNomcon();
		  		$this->dircon = $this->contribuyente[0]->getDircon();
		  		$this->naccon = $this->contribuyente[0]->getNaccon();
		  	    $this->tipcon = $this->contribuyente[0]->getTipcon();		  	    
		  	    return true;
		  	}
		  	else
		  	{
		  		$this->rifcon = 'No encontrado';
		  		$this->nomcon = 'No encontrado';
		  		$this->dircon = 'No encontrado';
		  		$this->naccon = 'No encontrado';
		  	    $this->tipcon = 'No encontrado';		  	    
		  	    return false;
		  	}
		  	
	  }	
}
