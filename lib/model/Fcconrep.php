<?php

/**
 * Subclass for representing a row from the 'fcconrep' table.
 *
 *
 *
 * @package lib.model
 */
class Fcconrep extends BaseFcconrep
{
   protected $codpar1="";
   protected $grid= array();
   public function getCodpar1()
   {
   	   $var=self::getCodpar()."-".self::getCodmun()."-".self::getCodedo()."-".self::getCodpai();
       return $var;
   }
}
