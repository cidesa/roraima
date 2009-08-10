<?php

/**
 * Subclass for representing a row from the 'tsmovban' table.
 *
 *
 *
 * @package lib.model
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
		$obj = TsdefbanPeer::doSelect($c);
		$objban=array();

		foreach ($obj as $o)
		{
			$objban[$o->getNumcue()]=$o->getNumcue();

		}

		return $objban;

	}


}
