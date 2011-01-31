<?php

/**
 * Subclass for representing a row from the 'ccfiador' table.
 *
 *
 *
 * @package lib.model
 */
class Ccfiador extends BaseCcfiador
{
   protected $numexp='';
   protected $nomben='';
   protected $objfiador=array();


  /*public function getNombreBeneficiario(){
        $c = new Criteria();
        $c->add(CccreditPeer::ID,$this->cccredit_id);
        $c->add(CccreditPeer::CCBENFI_ID,CcbenefiPeer::ID);
	    $beneficiario = CcbenefiPeer::doSelect($c);

	    $nomben = $beneficiario->getNomben();
	    return $nomben;
  }*/

  public function getNumExp(){
   return Herramientas::getX('id','cccredit','numexp',self::getCccreditId());
  }


     public function getCcestadoId()
     {
   	   $parroq = $this->getCcparroq();
   	   if ($parroq)
   	   {
   	   	 $munici = $parroq->getCcmunici();
   	   	 if ($munici)
   	   	 {
   	   	 	return $munici->getCcestadoId();
   	   	 }
   	   	 else return '';
   	   }else return '';
     }

     public function getCcmuniciId()
     {
   	   $parroq = $this->getCcparroq();
   	   if ($parroq)
   	   {
  	 	return $parroq->getCcmuniciId();
   	   }else return '';
     }

}
