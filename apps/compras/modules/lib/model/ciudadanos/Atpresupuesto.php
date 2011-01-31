<?php

/**
 * Subclase para representar una fila de la tabla 'atpresupuesto'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
                        
    if($atprovee1){$this->rifpro1 = $atprovee1->getRifpro(); $this->nompro1 = $atprovee1->getNompro();} 
    if($atprovee2){$this->rifpro2 = $atprovee2->getRifpro(); $this->nompro2 = $atprovee2->getNompro();} 
    if($atprovee3){$this->rifpro3 = $atprovee3->getRifpro(); $this->nompro3 = $atprovee3->getNompro();} 
    if($atprovee4){$this->rifpro4 = $atprovee4->getRifpro(); $this->nompro4 = $atprovee4->getNompro();} 
    if($atprovee5){$this->rifpro5 = $atprovee5->getRifpro(); $this->nompro5 = $atprovee5->getNompro();} 
    if($atprovee6){$this->rifpro6 = $atprovee6->getRifpro(); $this->nompro6 = $atprovee6->getNompro();} 
    

  }

  
  public function getNomsolben()
  {
    if($this->nomben!='') return $this->nomben.'  |  '.$this->nomsol;
    else return '';
  }
  
}
