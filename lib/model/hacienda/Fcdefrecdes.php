<?php

/**
 * Subclass for representing a row from the 'fcdefrecdes'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdefrecdes.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcdefrecdes extends BaseFcdefrecdes
{
	protected $desrec="";

    public function getDesrec()//Condición de pago
    {
        return Herramientas::getX_vacio('codrec','Carecaud','desrec',self::getCodrec());
    }


}
