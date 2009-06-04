<?php

/**
 * Subclass for representing a row from the 'catcarconinm' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catcarconinm extends BaseCatcarconinm
{
	protected $total;
	protected $tipocons;

  public function getTotal()
  {
	return H::FormatoMonto(self::getCancar() * self::getMetare());
  }


  public function getNomcarcon()
  {
    return Herramientas::getX('id','catcarcon','Nomcarcon',self::getCatcarconid());
  }


  public function getTipocons()
  {
    $c = new Criteria();
    $lista = CatcarconPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
    	$modulos += array($arr->getTipo() => $arr->getTipo());
    }
	return $modulos;
  }


}
