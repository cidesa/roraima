<?php

/**
 * Subclass for representing a row from the 'viaregdetsolvia' table.
 *
 *
 *
 * @package lib.model
 */
class Viaregdetsolvia extends BaseViaregdetsolvia
{
  protected $gastos = '';

  public function afterHydrate()
  {
    $viaregente = $this->getViaregente();
    $viaregact  = $this->getViaregact();
    //$ciudad     = $this->getOcciudad();

    if($viaregente){ $this->desente = $viaregente->getDesente(); }
    if($viaregact) { $this->desact  = $viaregact->getDesact();   }
    //if($ciudad)    { $this->nomciu  = $ciudad->getNomciu();      }


    ////Gastos
  	$c = new Criteria();
  	//	echo self::getId();
  	$c->add(ViaregdetgassolviaPeer::VIAREGDETSOLVIA_ID,self::getId());
  	//$c->add(ViaregdetgassolviaPeer::ID,self::getViaregdetsolviaid());
  	$per = ViaregdetgassolviaPeer::doSelect($c);
    $arreglo='';
    foreach ($per as $arr){
    	$arreglo .= $arr->getViaregtipserid().'_'.H::FormatoMonto($arr->getDetgasmont()).'_/';
    }

	$this->gastos=$arreglo;
	//////
  }

  public function getGastos555()
  {
  	$c = new Criteria();
  	$c->add(ViaregdetgassolviaPeer::VIAREGSOLVIA_ID,self::getViaregsolviaid());
  	$per = ViaregdetgassolviaPeer::doSelect($c);
    $arreglo='';
    foreach ($per as $arr){
    	$arreglo .= $arr->getViaregtipserid().'_'.H::FormatoMonto($arr->getDetgasmont()).'_/';
    }

	return $arreglo;
  }

  public function setGastos555($val)
  {
  	//return parent::getGastos(true);
  	echo $val." jesus";
  	//$this->gastos = $val;
  }
/*

   public function setGastos($val)
    {
	   $this->datos = $val;
	}


   public function getGrid_()
    {
	   return $this->datos;
	}
	*/
}


