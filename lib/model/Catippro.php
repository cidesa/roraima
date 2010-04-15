<?php

/**
 * Subclass for representing a row from the 'catippro'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Catippro extends BaseCatippro
{
		public static function getDescta($cod)
		{
	    	return Herramientas::getX('CODCTA','Contabb','descta',$cod);
		}

	    public function getDescta_ord()
	    {
			return Herramientas::getX_vacio('codcta','contabb','descta',trim(self::getCtaord()));
	    }

	    public function getDescta_pre()
	    {
			return Herramientas::getX_vacio('codcta','contabb','descta',trim(self::getCtaper()));
	    }

	}
