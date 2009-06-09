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
   protected $rifrep="";
   protected $grid= array();
   public function getCodpar1()
   {
   	   $var=self::getCodpar()."-".self::getCodmun()."-".self::getCodedo()."-".self::getCodpai();
       return $var;
   }

   public function getNomconrep()
   {
      return Herramientas::getX('rifcon','fcconrep','nomcon',self::getRifcon());
   }

   public function getRifrep()
   {
      return self::getRifcon();
   }


}
