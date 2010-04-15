<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npnomesptipos'.
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
class NpnomesptiposPeer extends BaseNpnomesptiposPeer
{

public static function getDesnomesp($codigo)
  {
	return Herramientas::getX('CODNOMESP','Npnomesptipos','desnomesp',strtoupper($codigo));
  }

public static function getFecnomdes($codigo)
  {
	return Herramientas::getX('CODNOMESP','Npnomesptipos','Fecnomdes',strtoupper($codigo));
  }

public static function getFecnomhas($codigo)
  {
	return Herramientas::getX('CODNOMESP','Npnomesptipos','fecnomhas',strtoupper($codigo));
  }




}
