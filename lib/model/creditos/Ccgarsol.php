<?php

/**
 * Subclass for representing a row from the 'ccgarsol' table.
 *
 *
 *
 * @package lib.model
 */
class Ccgarsol extends BaseCcgarsol
{


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
