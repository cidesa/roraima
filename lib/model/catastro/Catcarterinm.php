<?php

/**
 * Subclass for representing a row from the 'catcarterinm' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catcarterinm extends BaseCatcarterinm
{
	protected $total;
	protected $tipoterr;

  public function getTotal()
  {
  	return H::FormatoMonto(self::getDimensiones() * self::getValor());
  }


  public static function CargarTerrenos()
  {
    $c = new Criteria();
    $lista = CatcarterPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
      $modulos += array($arr->getId() => $arr->getDester());
    }
    return $modulos;
  }


  public function getTipoterr()
  {
    $c = new Criteria();
    $lista = CatcarterPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
    	$modulos += array($arr->getTertip() => $arr->getTertip());
    }
	return $modulos;
  }


  public function getDester()
  {
    return Herramientas::getX('id','catcarter','dester',self::getCatcarterid());
  }
}
