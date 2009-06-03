<?php

/**
 * Subclass for representing a row from the 'catreginm' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catreginm extends BaseCatreginm
{
	protected $objterreno      = array();
	protected $objpersonas     = array();
	protected $objconstruccion = array();
	//protected $coddivgeo = '';
	//protected $jesus = '';

	public function getDesdivgeo()
	{
		return Herramientas::getX('coddivgeo', 'catdivgeo', 'desdivgeo',self::getCoddivgeo());
	}
}
