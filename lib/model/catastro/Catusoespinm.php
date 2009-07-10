<?php

/**
 * Subclass for representing a row from the 'catusoespinm' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catusoespinm extends BaseCatusoespinm
{
	protected $tipocons='';

  public static function Tipocons()
  {
    $c = new Criteria();
    $lista = CatusoespPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
    	$modulos += array($arr->getId() => $arr->getDesuso());
    }
	return $modulos;
  }
}
