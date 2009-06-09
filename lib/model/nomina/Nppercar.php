<?php

/**
 * Subclass for representing a row from the 'nppercar' table.
 *
 *
 *
 * @package lib.model
 */
class Nppercar extends BaseNppercar
{
   public function getDesperfil()
   {
	 return Herramientas::getX('CODPERFIL', 'Npperfil', 'Desperfil',self::getCodperfil());

	}
}
