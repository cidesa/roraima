<?php

/**
 * Subclass for representing a row from the 'tsmovban'.
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
class Tsmovban extends BaseTsmovban
{
	protected $check='';
	public function getNombanco()
	{
		return Herramientas::getX('NumCue','tsdefban','nomcue',self::getNumcue());
	}

	public function getNommovim()
	{
		return Herramientas::getX('CodTip','TsTipMov','destip',self::getTipmov());
	}


	public function getCuentas()
	{
		$c = new Criteria();
                $c->addAscendingOrderByColumn(TsdefbanPeer::NUMCUE);
		$obj = TsdefbanPeer::doSelect($c);
		$objban=array();

		foreach ($obj as $o)
		{
			$objban[$o->getNumcue()]=$o->getNumcue();

		}

		return $objban;

	}


}
