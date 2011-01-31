<?php

/**
 * Subclase para representar una fila de la tabla  'catreginm'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.catastro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Catreginm extends BaseCatreginm
{
	protected $objterreno      = array();
	protected $objpersonas     = array();
	protected $objconstruccion = array();
	protected $objusoespec = array();
    protected $cant="";
    protected $corinicas="";


	public function getDesdivgeo()
	{
		return Herramientas::getX('coddivgeo', 'catdivgeo', 'desdivgeo',self::getCoddivgeo());
	}
}
