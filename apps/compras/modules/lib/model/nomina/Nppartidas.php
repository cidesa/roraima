<?php

/**
 * Subclase para representar una fila de la tabla 'nppartidas'.
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
class Nppartidas extends BaseNppartidas
{
  public function getCodpar2()
  {
  	return self::getCodpar();
  }

  public function getNompar2()
  {
  	return self::getNompar();
  }

}
