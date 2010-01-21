<?php

/**
 * Subclass for representing a row from the 'ccrepben' table.
 *
 *
 *
 * @package lib.model
 */
class Ccrepben extends BaseCcrepben
{
	protected $div=true;
	//protected $ccestado_id=0;
	//protected $ccmunici_id=0;
	protected $objbenefi=array();

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
