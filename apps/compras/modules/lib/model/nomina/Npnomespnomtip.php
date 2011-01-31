<?php

/**
 * Subclase para representar una fila de la tabla 'npnomespnomtip'.
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
class Npnomespnomtip extends BaseNpnomespnomtip
{
  public function getNomnomesp()
  {
  	return Herramientas::getX('codnomesp','npnomesptipos','desnomesp',self::getCodnomesp());
  }

  public function getNomnom()
  {
  	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnom());
  }
}
