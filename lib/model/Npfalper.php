<?php

/**
 * Subclass for representing a row from the 'npfalper' table.
 *
 *
 *
 * @package lib.model
 */
class Npfalper extends BaseNpfalper
{
  public function getNomemp()
  {
 	return Herramientas::getX('codemp','Nphojint','Nomemp',trim(self::getCodemp()));
  }

  public function getDesmotfal()
  {
  	return Herramientas::getX('codmotfal','npmotfal','desmotfal',trim(self::getCodmot()));
  }

  public function getNomnom()
  {
  	return Herramientas::getX('codnom','Npnomina','Nomnom',trim(self::getCodnom()));
  }

}
