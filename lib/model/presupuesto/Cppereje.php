<?php

/**
 * Subclass for representing a row from the 'cppereje'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Cppereje.php 35042 2009-11-26 01:33:34Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cppereje extends BaseCppereje
{
	protected $fecdes2;
	protected $fechas2;

	public function getfecdes2($format = 'd/m/Y') {
		return parent::getFecdes($format);
	}

	public function getfechas2($format = 'd/m/Y') {
		return parent::getFechas($format);
	}
}
