<?php

/**
 * Subclass for performing query and update operations on the 'bncobseg' table.
 *
 *
 *
 * @package lib.model
 */
class BncobsegPeer extends BaseBncobsegPeer
{
  public static function getDesubi($codigo)
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',str_pad($codigo,4,'0',STR_PAD_LEFT));
  }
}
