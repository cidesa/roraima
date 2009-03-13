<?php

/**
 * Subclass for representing a row from the 'viaregtipser' table.
 *
 *
 *
 * @package lib.model
 */
class Viaregtipser extends BaseViaregtipser
{
	protected $obj = array();
/*
  public static function desctiptab()
  {
    $c = new Criteria();
    $lista = ViaregtiptabPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
      $modulos += array($arr->getId() => $arr->getdestiptab());
    }
    return $modulos;
  }
*/
}
