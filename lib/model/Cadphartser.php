<?php

/**
 * Subclass for representing a row from the 'cadphartser'.
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
class Cadphartser extends BaseCadphartser
{
  public function getNomcat()
  {
	//return Herramientas::getX('codcat','Npcatpre','Nomcat',self::getCodori());
	 return Herramientas::getX('CODUBI','Bnubibie','Desubi',self::getCodori());
  }

  public function getDesreqart()
  {
	return Herramientas::getX('reqart','Careqartser','desreq',self::getReqart());
  }
}
