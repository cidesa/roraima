<?php

/**
 * Subclass for performing query and update operations on the 'npmotfal' table.
 *
 *
 *
 * @package lib.model
 */
class NpmotfalPeer extends BaseNpmotfalPeer
{
   public static function getDesmotfal_text($codigo)
   {
     return Herramientas::getX('codmotfal','npmotfal','desmotfal',$codigo);
   }
}
