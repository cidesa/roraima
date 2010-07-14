<?php

/**
 * Subclase para representar una fila de la tabla 'npcargos'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Npcargos.php 39456 2010-07-14 17:18:57Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npcargos extends BaseNpcargos
{
	protected $carasi = '0';
        protected $canpmix = '0,00';
        protected $canvmix = '0,00';
	protected $porcen="0,00";
	protected $codnom="";
	protected $objcar=array();
        protected $carvan2="0,00";
        protected $check="";
        protected $fecaum="";
        protected $motaum="";
        protected $porcentaje="0,00";
        protected $cantidad="0,00";

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
			return H::FormatoMonto($result[0]["codcar"]);
		}else return '0,00';
	}

	public function getCanhom($va=false)
	{
		$result=array();
		$sql = "select coalesce(count(a.codcar),0) as codcar from npasicaremp a, nphojint b where a.codcar='".self::getCodcar()."' and a.codemp=b.codemp and b.sexemp='M' group by codcar";
		if (H::BuscarDatos($sql,$result))
		{
			return H::FormatoMonto($result[0]["codcar"]);
		}else return '0,00';
	}

	public function getCanmix($va=false)
	{
            $sum= self::getCanmuj()+self::getCanhom();

            return H::FormatoMonto($sum);
	}

	public function getCanpmix($va=false)
	{
            $sum= self::getCanpmuj()+self::getCanphom();

            return H::FormatoMonto($sum);
	}
        public function getCanvmix($va=false)
	{
            $sum= self::getCanvmuj()+self::getCanvhom();

            return H::FormatoMonto($sum);
	}
        public function getCanvmuj($va=false)
	{
            if(self::getCanpmuj()!=0)
            {
                $sum= self::getCanpmuj()-self::getCanmuj();

                return H::FormatoMonto($sum);
            }else
                return $this->canvmuj=='' ? '0,00' : $this->canvmuj;
	}

	public function getCanvhom($va=false)
	{
            if(self::getCanphom()!=0)
            {
                $sum= self::getCanphom()-self::getCanhom();

                return H::FormatoMonto($sum);
            }else
                return $this->canvhom=='' ? '0,00' : $this->canvhom;
	}



}
