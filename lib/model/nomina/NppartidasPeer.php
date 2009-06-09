<?php

/**
 * Subclass for performing query and update operations on the 'nppartidas' table.
 *
 *
 *
 * @package lib.model
 */
class NppartidasPeer extends BaseNppartidasPeer
{

  public static function getNompar($codigo)
  {
      return Herramientas::getX('CODPAR','Nppartidas','Nompar',trim($codigo));
  }

}
