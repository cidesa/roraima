<?php

/**
 * Subclass for representing a row from the 'forasometobj'.
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
class Forasometobj extends BaseForasometobj
{
    protected $obj=array();
    
    public function getDesobj()
    {
      return Herramientas::getX('CODOBJ','Fordefobj','Desobj',self::getCodobj());
    }

    public function getDesmet()
    {
      return Herramientas::getX('CODMET','Fordefmet','Desmet',self::getCodmet());
    }
}
