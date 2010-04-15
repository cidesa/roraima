<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npestado'.
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
class NpestadoPeer extends BaseNpestadoPeer
{
  public static function getNomedo($codigo)
  {
	return Herramientas::getX('CODEDO','Npestado','Nomedo',str_pad($codigo,4,'0',STR_PAD_LEFT));
  }
}
