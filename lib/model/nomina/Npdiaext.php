<?php

/**
 * Subclass for representing a row from the 'npdiaext' table.
 *
 *
 *
 * @package lib.model
 */
class Npdiaext extends BaseNpdiaext
{
  public function getNomnom()
  {
  	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnom());
  }

  public function getNomemp()
  {
  	return Herramientas::getX('codemp','npasicaremp','nomemp',self::getCodemp());
  }
}
