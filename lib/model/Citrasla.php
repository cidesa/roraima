<?php

/**
 * Subclass for representing a row from the 'citrasla'.
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
class Citrasla extends BaseCitrasla
{

	protected $grid= array();

	public function getLongpre()
    {
    	return strlen(Herramientas::getX_vacio('CODEMP','Cidefniv','Forpre','001'));
    }

	public function getEtiqueta()
    {
    	if (Herramientas::getX_vacio('REFTRA','Citrasla','Statra',self::getReftra())=='N'){
    		return "Traslado Anulado";
    	}
    }
}
