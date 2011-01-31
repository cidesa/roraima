<?php

/**
 * Subclass for representing a row from the 'caretser'.
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
class Caretser extends BaseCaretser
{
	public function getDesart()
	{
		return Herramientas::getX('codart','caregart','desart',self::getCodser());
	}
	public function getDestip()
	{
		return Herramientas::getX('codtip','optipret','destip',self::getCodret());
	}
/*	public function getCodser()
	{
		$c = new Criteria();
		$c->setDistinct(CaretserPeer::CODSER);   
		$nomemp = CaretserPeer::doSelectone($c);
		return $nomemp->getCodser();
	}*/		
}
