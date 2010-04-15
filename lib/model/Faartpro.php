<?php

/**
 * Subclass for representing a row from the 'faartpro'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faartpro.php 33699 2009-10-01 22:15:36Z dmartinez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faartpro extends BaseFaartpro
{
	public $obj = array();

	public function getNomalm()
	{
		return Herramientas::getX('CODALM','Cadefalm','Nomalm',self::getCodalm());
	}
	public function getNompro()
	{
		return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodpro());
	}
	public function getRifpro()
	{
		return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodpro());
	}
    public function getDesart()
    {
  	    return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
    }
    public function getDescta()
    {
  	    return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
    }
}
