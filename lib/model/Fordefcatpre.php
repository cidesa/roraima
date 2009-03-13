<?php

/**
 * Subclass for representing a row from the 'fordefcatpre' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefcatpre extends BaseFordefcatpre
{
 	public function getCodunieje()
	{
		return "";
	}

	public function getNomemp()
	{
      return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodemp());
	}
}
