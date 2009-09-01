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
	protected $objusoespec = array();


	public function getDesdivgeo()
	{
		return Herramientas::getX('coddivgeo', 'catdivgeo', 'desdivgeo',self::getCoddivgeo());
	}
}
