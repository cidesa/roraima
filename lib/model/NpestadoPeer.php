<?php

/**
 * Subclass for performing query and update operations on the 'npestado' table.
 *
 *
 *
 * @package lib.model
 */
class NpestadoPeer extends BaseNpestadoPeer
{
  public static function getNomedo($codigo)
  {
	return Herramientas::getX('CODEDO','Npestado','Nomedo',str_pad($codigo,4,'0',STR_PAD_LEFT));
  }
}
