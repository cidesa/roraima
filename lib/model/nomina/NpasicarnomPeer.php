<?php

/**
 * Subclass for performing query and update operations on the 'npasicarnom' table.
 *
 *
 *
 * @package lib.model
 */
class NpasicarnomPeer extends BaseNpasicarnomPeer
{
   public static function getNomnom($codigo)
    {
  	  return Herramientas::getX('codnom','npnomina','nomnom',$codigo);
    }
}
