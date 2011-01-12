<?php

/**
 * Subclass for representing a row from the 'ccestcred' table.
 *
 *
 *
 * @package lib.model
 */
class Ccestcred extends BaseCcestcred
{
  //protected $gerenciaid = '';
  //protected $ccanalisid = '';
  //protected $ccsoliciId = '';
  protected $numsol='';
  protected $nomben='';
  protected $div=false;
  protected $origen='';
  protected $analista='';
  protected $ccanalis_id='';

  public function getNumsolicitud(){
   return Herramientas::getX('id','ccsolici','numsol',self::getCcsoliciId());
  }

  public function getBeneficiario(){
   $beneficiario = Herramientas::getX('id','ccsolici','ccbenefi_id',self::getCcsoliciId());
   return Herramientas::getX('id','ccbenefi','nomben',$beneficiario);
  }

  public function getOrigen(){
  	return Herramientas::getX('id','ccgerenc','nomger',self::getCcgerencoriId());
  }

  public function getDestino(){
  	return Herramientas::getX('id','ccgerenc','nomger',self::getCcgerencdesId());
  }

  public function getEstatus(){
  	return Herramientas::getX('id','ccestatu','nombre',self::getCcestatuId());
  }

  public function getEstatusasig(){
  	$c = new Criteria();
   	$c->add(CcasiganaPeer::CCSOLICI_ID,self::getCcsoliciId());
   	$c->add(CcasiganaPeer::ESTATUS,'A');
   	$asigana = CcasiganaPeer::doSelectOne($c);
   	if (!$asigana){
   		return Herramientas::getX('id','ccestatu','nombre',self::getCcestatuId());
   	}else{
   		return 'Asignada';
   	}

  }

  public function getNomanalis()
   {
    return Herramientas::getX('id','ccusuint','nomusuint',self::getCcusuintId());
   }

  public function getAnalisasig()
   {
   	$c = new Criteria();
   	$c->add(CcasiganaPeer::CCSOLICI_ID,self::getCcsoliciId());
   	$c->add(CcasiganaPeer::ESTATUS,'A');
   	$asigana = CcasiganaPeer::doSelectOne($c);
   	if ($asigana){
   		return Herramientas::getX('id','ccanalis','nomana',$asigana->getCcanalisId());
   	}else{
   		return 'No Asignado';
   	}

   }

   /*public function getEstatusasig(){
     $asigana = self::getAnalisasig();
     if($asigana == 'No Asignado'){
     	return self::getEstatus();
     }
     else {
     	return 'Asignada';
     }
   }*/

  public function getFechas(){
   $fecha = self::getFecha('d/m/Y');
   return $fecha;
  }

  public function getEstado(){
   $estado = self::getCcestsigId();
   if ($estado==''){
     return 'Sin gestión';
   }
   else {
   	 return 'Gestionada';//Herramientas::getX('id','ccestatu','nombre',self::getCcestsigId());
   }
  }

  public function getCcanalisId(){
     return $this->ccanalis_id;
  }

  public function setCcanalisId($v){
     $this->ccanalis_id = $v;
  }

    public function getNomben()
   {
    $solici = $this->getCcsolici();
    if($solici)
    {
     $beneficiario=$solici->getCcbenefi();
     if ($beneficiario)
        return $beneficiario->getNomben();
     else
        return "";
    }
    else return '';
   }

   public function getNumsol()
   {
    $solici = $this->getCcsolici();
    if($solici){return $solici->getNumsol();}
    else return '';
   }

   public function getNomana()
   {
    $analista = $this->getCcanalis();
    if($analista) return $analista->getNomana();
    else return '';
   }

   public function getCedana()
   {
    $analista = $this->getCcanalis();
    if($analista) return $analista->getCedana();
    else return '';
   }

}
