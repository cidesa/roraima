<?php

/**
 * Subclass for performing query and update operations on the 'bnclafun' table.
 *
 *
 *
 * @package lib.model
 */
class BnclafunPeer extends BaseBnclafunPeer
{
  public static function getDescla_ajax($codigo)
  {
    return Herramientas::getX('codcla','Bnclafun','descla',str_pad($codigo,3,'0',STR_PAD_LEFT));
  }
}
