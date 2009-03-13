<?php

/**
 * Subclass for representing a row from the 'tscheemi' table.
 *
 *
 *
 * @package lib.model
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


}
