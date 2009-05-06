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
  protected $rifpro1 ='';
  protected $rifpro2 ='';
  protected $rifpro3 ='';
  protected $rifpro4 ='';
  protected $rifpro5 ='';
  protected $rifpro6 ='';
  
  protected $nompro1 ='';
  protected $nompro2 ='';
  protected $nompro3 ='';
  protected $nompro4 ='';
  protected $nompro5 ='';
  protected $nompro6 ='';
  
  
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
    
    $atprovee1 = $this->getAtproveeRelatedByAtprovee1();
    $atprovee2 = $this->getAtproveeRelatedByAtprovee2();
    $atprovee3 = $this->getAtproveeRelatedByAtprovee3();
    $atprovee4 = $this->getAtproveeRelatedByAtprovee4();
    $atprovee5 = $this->getAtproveeRelatedByAtprovee5();
    $atprovee6 = $this->getAtproveeRelatedByAtprovee6();
                        
    if($atprovee1){$rifpro1 = $atprovee1->getRifpro(); $nompro1 = $atprovee1->getNompro();} 
    if($atprovee2){$rifpro2 = $atprovee2->getRifpro(); $nompro2 = $atprovee2->getNompro();} 
    if($atprovee3){$rifpro3 = $atprovee3->getRifpro(); $nompro3 = $atprovee3->getNompro();} 
    if($atprovee4){$rifpro4 = $atprovee4->getRifpro(); $nompro4 = $atprovee4->getNompro();} 
    if($atprovee5){$rifpro5 = $atprovee5->getRifpro(); $nompro5 = $atprovee5->getNompro();} 
    if($atprovee6){$rifpro6 = $atprovee6->getRifpro(); $nompro6 = $atprovee6->getNompro();} 
    

  }

  
  public function getNomsolben()
  {
    if($this->nomben!='') return $this->nomben.'  |  '.$this->nomsol;
    else return '';
  }
  
}
