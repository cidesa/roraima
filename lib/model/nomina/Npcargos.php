<?php

/**
 * Subclass for representing a row from the 'npcargos' table.
 *
 *
 *
 * @package lib.model
 */
class Npcargos extends BaseNpcargos
{
	protected $carasi = '';
	protected $porcen="0,00";

	public function getNomtip()
	{
		return Herramientas::getX('codtipcar','Nptipcar','destipcar',self::getCodtip());
	}

	public function getCodcarnew()
	{
		return self::getCodcar();
	}

	public function getNomcarnew()
	{
		return self::getNomcar();
	}

	public function getCarasi()
	{
		$result='';
		$sql = "select count(codcar) as codcar from npasicaremp group by codcar";
		if (H::BuscarDatos($sql,$result))
		{
			return $result[0]["codcar"];
		}
	}


}
