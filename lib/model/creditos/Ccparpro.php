<?php

/**
 * Subclass for representing a row from the 'ccparpro' table.
 *
 *
 *
 * @package lib.model
 */
class Ccparpro extends BaseCcparpro
{

      public function getNompar()
   {
    $partid = $this->getCcpartid();
    if($partid){return $partid->getNompar();}
    else return '';
   }

    public function getNompro()
   {
    $progra = $this->getCcprogra();
    if($progra){return $progra->getNompro();}
    else return '';
   }

    public function getCodcta()
   {
     return Herramientas::getX('id','contabb','codcta',self::getContabbId());
   }

   public function getDescta()
   {
     return Herramientas::getX('id','contabb','descta',self::getContabbId());
   }

}
