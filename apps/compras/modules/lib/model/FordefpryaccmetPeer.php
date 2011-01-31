<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'fordefpryaccmet'.
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
class FordefpryaccmetPeer extends BaseFordefpryaccmetPeer
{
	public static function getDesmet($codmet, $codpro, $codaccesp)  //Meta
	{
	  return  Herramientas::getXx('Fordefpryaccmet',array('CODMET','CODPRO','CODACCESP'),array($codmet, $codpro, $codaccesp),'Desmet');
	}

	public static function getCanmet($codmet, $codpro, $codaccesp)  //Cant Program Anual
	{
	  return  Herramientas::getXx('Fordefpryaccmet',array('CODMET','CODPRO','CODACCESP'),array($codmet, $codpro, $codaccesp),'Canmet');
	}
}
