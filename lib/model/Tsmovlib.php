<?php

/**
 * Subclass for representing a row from the 'tsmovlib' table.
 *
 *
 *
 * @package lib.model
 */
class Tsmovlib extends BaseTsmovlib
{
  protected $ctacon = '';
  protected $debcre = '';

	public function getNomcue()
    {
		return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcue());
    }

	public function getDestip()
    {
		return Herramientas::getX('CODTIP','Tstipmov','Destip',self::getTipmov());
    }

	public function getIdrefer()
	{
		return Herramientas::getX_vacio('numcom','contabc','id',self::getNumcom());
	}

	public function getDescom()
	{
		return Herramientas::getX_vacio('numcom','contabc','descom',self::getNumcom());
	}

	public function __toString()
    {
		return $this->getReflib();
    }


}
