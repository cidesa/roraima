<?php

/**
 * Subclass for representing a row from the 'fcdefrecdes'.
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
class Fcdefrecdes extends BaseFcdefrecdes
{
	protected $desrec="";

    public function getDesrec()//Condición de pago
    {
        return Herramientas::getX_vacio('codrec','Carecaud','desrec',self::getCodrec());
    }


}
