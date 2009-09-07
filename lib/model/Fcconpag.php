<?php

/**
 * Subclass for representing a row from the 'fcconpag'.
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
class Fcconpag extends BaseFcconpag
{
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
	  	  $c = new Criteria;
	  	  $c->add(FcconrepPeer::REPCON,'C'); 
	  	  $c->addJoin(FcconrepPeer::RIFCON,FcconpagPeer::RIFCON); 	 
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
}
