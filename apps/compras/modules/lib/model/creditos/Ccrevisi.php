<?php

/**
 * Subclass for representing a row from the 'ccrevisi' table.
 *
 *
 *
 * @package lib.model
 */
class Ccrevisi extends BaseCcrevisi
{
  protected $numsol='';
  protected $ccgerencid='';


  public function getTitulo(){
   return Herramientas::getX('id','ccinform','titulo',self::getCcinformId());
  }

    public function getContenido(){
   return Herramientas::getX('id','ccinform','conten',self::getCcinformId());
  }

    public function getAnalista(){
    $analista = Herramientas::getX('id','ccinform','ccanalis_id',self::getCcinformId());
    return Herramientas::getX('id','ccanalis','nomana',$analista);
  }





}
