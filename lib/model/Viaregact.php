<?php

/**
 * Subclass for representing a row from the 'viaregact' table.
 *
 *
 *
 * @package lib.model
 */
class Viaregact extends BaseViaregact
{
  public static function ListAct()
  {
    $c = new Criteria();
    $lista = ViaregactPeer::doSelect($c);
    $modulos = array();
    foreach($lista as $arr)
    {
      $modulos += array($arr->getId() => $arr->getDesact());
    }
    return $modulos;
  }

}
