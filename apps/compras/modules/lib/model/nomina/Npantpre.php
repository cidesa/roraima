<?php

/**
 * Subclase para representar una fila de la tabla 'npantpre'.
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
class Npantpre extends BaseNpantpre
{
public function getNomemp()
  {
  	return Herramientas::getX('codemp','nphojint','nomemp',self::getCodemp());  	
  }
}
