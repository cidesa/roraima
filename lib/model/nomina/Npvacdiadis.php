<?php

/**
 * Subclase para representar una fila de la tabla 'npvacdiadis'.
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
class Npvacdiadis extends BaseNpvacdiadis
{
	public function getNomnom()
	{
		return Herramientas::getX('codnom','Npnomina','nomnom',self::getCodnom());
    }
	public function getJornada()
	{
		if($this->jornada=='' || $this->jornada=='H')
			return 'H';
		else	
			return 'C';
    }

}
