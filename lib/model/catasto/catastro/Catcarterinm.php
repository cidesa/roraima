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

  public function getTotal()
  {
	return self::getDimensiones() * self::getValor();
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

}
