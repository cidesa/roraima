<?php

/**
 * Subclase para representar una fila de la tabla 'npfalper'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
