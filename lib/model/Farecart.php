<?php

/**
 * Subclass for representing a row from the 'farecart'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Farecart.php 33699 2009-10-01 22:15:36Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Farecart extends BaseFarecart
{
    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }

    public function getNomrgo()
    {
  	    return Herramientas::getX('CODRGO','Farecarg','Nomrgo',self::getCodrgo());
    }

}
