<?php

/**
 * Subclass for representing a row from the 'atpresupuesto' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Atpresupuesto extends BaseAtpresupuesto
{
  protected $cedben = '';
  protected $nomben = '';

  protected $cedsol = '';
  protected $nomsol = '';
  
  protected $nroexp = '';
  
  public function __toString()
  {
    
    $atayudas = $this->getAtayudas();
    if($atayudas) return $atayudas->getNroexp();
    else return '';

  }  
  
  public function afterHydrate()
  {
    $atayuda = $this->getAtayudas();
    if($atayuda){
      $this->cedben = $atayuda->getCedben();
      $this->nomben = $atayuda->getNomben();      
      $this->cedsol = $atayuda->getCedsol();      
      $this->nomsol = $atayuda->getNomsol();      
      
      $this->nroexp = $atayuda->getNroexp();      
    }
  }

  
  public function getNomsolben()
  {
    if($this->nomben!='') return $this->nomben.'  |  '.$this->nomsol;
    else return '';
  }
  
}
