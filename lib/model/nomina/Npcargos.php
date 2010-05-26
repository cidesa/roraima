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
	protected $carasi = '0';
	protected $porcen="0,00";
	protected $codnom="";	
	protected $objcar=array();

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
		$result=array();
		$sql = "select coalesce(count(codcar),0) as codcar from npasicaremp where codcar='".self::getCodcar()."'group by codcar";
		if (H::BuscarDatos($sql,$result))
		{
			return $result[0]["codcar"];
		}else return '0';
	}

	public function getCanmuj($va=false)
	{
		$result=array();
		$sql = "select coalesce(count(a.codcar),0) as codcar from npasicaremp a, nphojint b where a.codcar='".self::getCodcar()."' and a.codemp=b.codemp and b.sexemp='F' group by codcar";
		if (H::BuscarDatos($sql,$result))
		{
			return $result[0]["codcar"];
		}else return '0';
	}

	public function getCanhom($va=false)
	{
		$result=array();
		$sql = "select coalesce(count(a.codcar),0) as codcar from npasicaremp a, nphojint b where a.codcar='".self::getCodcar()."' and a.codemp=b.codemp and b.sexemp='M' group by codcar";
		if (H::BuscarDatos($sql,$result))
		{
			return $result[0]["codcar"];
		}else return '0';
}

	public function getCanmix($va=false)
	{
            $sum= self::getCanmuj()+self::getCanhom();

            return $sum;
	}


}
