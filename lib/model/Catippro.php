<?php

/**
 * Subclass for representing a row from the 'catippro' table.
 *
 *
 *
 * @package lib.model
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
