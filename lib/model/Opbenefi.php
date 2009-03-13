<?php

/**
 * Subclass for representing a row from the 'opbenefi' table.
 *
 *
 *
 * @package lib.model
 */ 
class Opbenefi extends BaseOpbenefi
{
	public function getNomcuentacont()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodcta()));
	}
	public function getNomcuentaord()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodord()));
	}
	public function getNomcuentapercon()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodpercon()));
	}
	public function getTipobene()
	{
		return Herramientas::getX('CodTipBen','OpTipBen','DesTipBen',trim(self::getCodtipben()));
	}
	public function getNomcuentacontsecun()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodctasec()));
	}
	public function getNomcuentaordsecun()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodordadi()));
	}
	public function getNomcuentaperconsecun()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodperconadi()));
	}
	public function getNomctacajchi()
	{
		return Herramientas::getX('Codcta','contabb','descta',trim(self::getCodctacajchi()));
	}	
}
