<?php

/**
 * Subclase para representar una fila de la tabla 'npcargos'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
