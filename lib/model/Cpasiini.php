<?php

/**
 * Subclass for representing a row from the 'cpasiini'.
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
class Cpasiini extends BaseCpasiini
{
	protected $obj = array();
	protected $monmov = '';


    public function AfterHydrate()
    {
    	//$this->monmov ='10';
    }

    public function getNompre()
    {
    	return Herramientas::getX('codpre','cpdeftit','nompre',self::getCodpre());
    }

}
