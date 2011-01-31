<?php

/**
 * Subclase para representar una fila de la tabla 'npdefjorlab'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Npdefjorlab extends BaseNpdefjorlab
{
 protected $lunes=0;
 
 public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
	  if($this->lunes == 'S' || $this->lunes()==1)
	    $this->lunes='S';
	  else
	  	$this->lunes=0;	
			
	  if($this->martes == 'S' || $this->martes == 1)
	    $this->martes='S';
	  else
	  	$this->martes=0;	
	  if($this->miercoles == 'S' || $this->miercoles == 1)
	    $this->miercoles='S';
	  else
	  	$this->miercoles=0;		
	  if($this->jueves == 'S' || $this->jueves == 1)
	    $this->jueves='S';
	  else
	  	$this->jueves=0;		
	  if($this->viernes == 'S' || $this->viernes == 1)
	    $this->viernes='S';
	  else
	  	$this->viernes=0;		
	  if($this->sabado == 'S' || $this->sabado == 1)
	    $this->sabado='S';
	  else
	  	$this->sabado=0;		
	  if($this->domingo == 'S' || $this->domingo == 1)
	    $this->domingo='S';
	  else
	  	$this->domingo=0;		
   }	
   
   public function getNomnom()
   {
   	 return H::GetX('Codnom','Npnomina','Nomnom',$this->codnom);
   }
}
