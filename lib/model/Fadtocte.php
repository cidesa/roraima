<?php

/**
 * Subclass for representing a row from the 'fadtocte'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fadtocte.php 33699 2009-10-01 22:15:36Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fadtocte extends BaseFadtocte
{
	public $obj = array();

    public function getDesdesc()
    {
  	    return Herramientas::getX('CODDESC','Fadescto','Desdesc',self::getCoddesc());
    }

    public function getMondesc()
    {
  	    return number_format(Herramientas::getX('CODDESC','Fadescto','Mondesc',self::getCoddesc()),2,',','.');
    }

}
