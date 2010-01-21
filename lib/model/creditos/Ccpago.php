<?php

/**
 * Subclass for representing a row from the 'ccpago' table.
 *
 *
 *
 * @package lib.model
 */
class Ccpago extends BaseCcpago
{
  protected $obj = array();
  protected $objpago=array();
  protected $nomben="";
  protected $debcre="";
  protected $ctacon="";
  protected $numexp="";

  public function getNombreBeneficiario(){
   $sql = "Select a.nomben from ccbenefi a, cccredit b where b.ccbenefi_id = a.id and b.id = ".self::getCccreditId();
   $resultado = array();
   H::BuscarDatos($sql, &$resultado);
   if($resultado){
     return $resultado[0]["nomben"];
   }
   else{
     return "---";
   }
  }

  public function getNomben(){
   return Herramientas::getX('cedrif','ccbenefi','nomben',self::getCedrifcue());
  }

  public function getNumexpediente(){
   return Herramientas::getX('id','cccredit','numexp',self::getCccreditId());
  }

  public function getCcdefamoId(){
    $c = new Criteria();
    $c->add(CcdefamoPeer::CCCREDIT_ID,self::getCccreditId());
    $defamo = CcdefamoPeer::doSelectOne($c);
    if($defamo){
      return $defamo->getId();
    }else{
      return "";
    }
  }

}
