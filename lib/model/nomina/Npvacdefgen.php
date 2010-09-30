<?php

/**
 * Subclase para representar una fila de la tabla 'npvacdefgen'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Npvacdefgen.php 40875 2010-09-30 21:01:47Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npvacdefgen extends BaseNpvacdefgen
{
	public function getNomnom()
	{
    	return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnomvac());
    }

	public function getNomcon1()

	{
		return Herramientas::getX('codcon','npdefcpt','nomcon',self::getCodconvac());
	}

        public function getNomcon2()

	{
		return Herramientas::getX('codcon','npdefcpt','nomcon',self::getCodconuti());
	}

        public function getNomcon3()

	{
		return Herramientas::getX('codcon','npdefcpt','nomcon',self::getCodconadi());
	}




}
