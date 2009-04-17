<?php

/**
 * Subclass for representing a row from the 'ciasiini' table.
 *
 *
 *
 * @package lib.model
 */
class Ciasiini extends BaseCiasiini
{
  protected $grid= array();
  protected $movimiento='';
  protected $montos=0;
  protected $porc=0;

  public function getNompre()
  {
    // Se obtiene Nomnom de la tabla Npasicaremp

    $c = new Criteria();
    $c->add(CideftitPeer::CODPRE,self::getCodpre());
    $registro = CideftitPeer::doSelectOne($c);
    if($registro) return $registro->getNompre();
    else return null;
  }

  public function getAnopre()
  {
   return substr(Herramientas::getX('codemp','cidefniv','fecper','001'),0,4);
  }

}
