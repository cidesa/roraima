<?php

/**
 * Subclass for representing a row from the 'fcdefpgi'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdefpgi.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcdefpgi extends BaseFcdefpgi
{
	protected $grid= array();
	protected $descuo= '';

	public function getDescuo22()
	{
		return "Tasa por Licencia";
	}


}