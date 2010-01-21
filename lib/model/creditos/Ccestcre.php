<?php

/**
 * Subclass for representing a row from the 'ccestcre' table.
 *
 *
 *
 * @package lib.model
 */
class Ccestcre extends BaseCcestcre
{

  protected $objanalis=array();
  protected $analista=array();
  protected $ccanalisid=0;
  protected $ccgerenc_id=0;

  public function getCcgerencId(){
  	return $this->ccgerenc_id;
  }

  public function setCcgerencId($val=0){
  	$this->ccgerenc_id = $val;
  }

  public function getNomben()
   {
    $credit = $this->getCccredit();
    if($credit)
    {
     $beneficiario=$credit->getCcbenefi();
     if ($beneficiario)
        return $beneficiario->getNomben();
     else
        return "";
    }
    else return '';
   }

   public function getNumexp()
   {
    $credit = $this->getCccredit();
    if($credit){return $credit->getNumexp();}
    else return '';
   }

   public function getCcanalisId(){

   	 $c= new Criteria();
     $c->add(CcanacrePeer::CCCREDIT_ID,self::getCccreditId());
     $resul= CcanacrePeer::doSelectOne($c);
     if ($resul)
     {
   	  $dato=$resul->getCcanalisId();
   	  return $dato;
     }else
     {
     	return $this->ccanalisid;
     }
  }

   public function getCedana(){
   return Herramientas::getX('id','ccanalis','cedana',self::getCcanalisId());
  }

  public function getNomana(){
   return Herramientas::getX('id','ccanalis','nomana',self::getCcanalisId());
  }

  public function getAnalisasig(){
  	$c = new Criteria();
  	$c->add(CcanacrePeer::CCANALIS_ID,self::getCcanalisId());
  	$ccanacre = CcanacrePeer::doSelect($c);
  	if($ccanacre){
  		return self::getNomana();
  	}
  	else {
  		return "No asignado";
  	}
  }


}
