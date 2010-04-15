<?php

/**
 * Subclase para representar una fila de la tabla 'npciudad'.
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
class Npciudad extends BaseNpciudad
{
public function getNompai()
  {
	return Herramientas::getX('CODPAI','Nppais','Nompai',self::getCodpai());
  }

public function getNomedo()
  {
	return Herramientas::getXx('Npestado',array('codpai','codedo'),array(self::getCodpai(),self::getCodedo()),'nomedo');
  }

}
