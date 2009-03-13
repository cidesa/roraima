<?php

/**
 * Subclass for performing query and update operations on the 'bndefact' table.
 *
 *
 *
 * @package lib.model
 */
class BndefactPeer extends BaseBndefactPeer
{
  public static function getDesact($codubi)
  {
      return Herramientas::getX('CODACT','Bndefact','Desact',trim($codubi));
  }


}
