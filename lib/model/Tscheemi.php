<?php

/**
 * Subclass for representing a row from the 'tscheemi'.
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
class Tscheemi extends BaseTscheemi
{
	protected $tippagordpag="";
	protected $descriordpag="";
	protected $montotordpag="0,00";

	protected $montotcompro="0,00";

	protected $montotprecom="0,00";

	protected $conceppagnap="";
	protected $montotpagnap="0,00";
	protected $mondtopagnap="0,00";
	protected $condtopagnap="";
	protected $totnetpagnap="0,00";

	protected $conceppagdir="";
	protected $totnetpagdir="0,00";
	protected $mondtopagdir="0,00";
	protected $condtopagdir="";

	protected $operacion="";
	protected $caducado="";
	protected $faldat="";
	protected $bloqueado="";
	protected $filasord="";
	protected $firmado="";
	protected $objeto=array();
	protected $grid=array();
	protected $check="";

    public function getNomben()
	{
		return Herramientas::getX('CEDRIF','Opbenefi','Nomben',$this->getCedrif());
	}


	public function getOrden()
	{
		$sql="SELECT A.NUMORD as numord
				FROM OPORDCHE A,OPORDPAG B
				WHERE A.NUMCHE='".self::getNumche()."' AND A.NUMORD=B.NUMORD ORDER BY A.NUMORD";
		if (Herramientas::BuscarDatos($sql,&$result))
		{
			$numord='';
			$first=true;
			foreach ($result as $arre)
			{
				if ($first)
				{
					$numord=$arre["numord"];
					$first=false;
				}
				else
				{
					$numord=$numord.', '.$arre["numord"];
				}
			}
		}
		else
		{
			$numord='';
		}

	return $numord;
	}

	public function getNumcom()
	{
		$sql="SELECT B.NUMCOM as numcom
				FROM OPORDCHE A,OPORDPAG B
				WHERE A.NUMCHE='".self::getNumche()."' AND A.NUMORD=B.NUMORD ORDER BY A.NUMORD";
		if (Herramientas::BuscarDatos($sql,&$result))
		{
			$numcom='';
			$first=true;
			foreach ($result as $arre)
			{
				if ($first)
				{
					$numcom=$arre["numcom"];
					$first=false;
				}
				else
				{
					$numcom=$numcom.', '.$arre["numcom"];
				}
			}
		}
		else
		{
			$numcom='';
		}

	return $numcom;
	}

  public function getBenefi()
  {
	  return Herramientas::getX('CEDRIF','Opbenefi','Nomben',$this->getCedrif());
  }


	public function getDestip()
	{
		return Herramientas::getX('CODTIP','Tstipmov','Destip',$this->getTipdoc());
	}

	public function getNomcue()
  {
  	return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',$this->getNumcue());
  }

  public function getEscheque()
  {
    return Herramientas::getX('CODTIP','Tstipmov','escheque',$this->getTipdoc());
  }

  public function getEstatus()
  {
  	$estatus="";

  	if (self::getStatus()=='C')
  	{
  		$estatus='CAJA';
  	}
  	else if (self::getStatus()=='E')
  	{
  		$estatus='ENTREGADO';
  	}
  	else if (self::getStatus()=='A')
  	{
  		$estatus='ANULADO';
  	}
  	return $estatus;
  }

  public function getFecha()
  {
  	$fecha="";

  	if (self::getStatus()=='E')
  	{
  		$fecha=date('d/m/Y',strtotime(self::getFecent()));
  	}
  	else if (self::getStatus()=='A')
  	{
  		$fecha=date('d/m/Y',strtotime(self::getFecanu()));
  	}
  	return $fecha;
  }


}
