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
	protected $numeroord="";
	protected $fecord="";
	protected $filnumordfec="";
        protected $aprmonche="";


    public function getNomben()
	{
		return Herramientas::getX('CEDRIF','Opbenefi','Nomben',$this->getCedrif());
	}


	public function getOrden()
	{
		$sql="SELECT A.NUMORD as numord
				FROM OPORDCHE A,OPORDPAG B
				WHERE A.NUMCHE='".self::getNumche()."' AND A.CODCTA='".self::getNumcue()."' AND A.TIPMOV='".self::getTipdoc()."' AND A.NUMORD=B.NUMORD ORDER BY A.NUMORD";
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
				WHERE A.NUMCHE='".self::getNumche()."' AND A.CODCTA='".self::getNumcue()."' AND A.TIPMOV='".self::getTipdoc()."' AND A.NUMORD=B.NUMORD ORDER BY A.NUMORD";
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
        else if (self::getStatus()=='D')
  	{
  		$estatus='DEVUELTO';
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

  public function getFilnumordfec()
  {

    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('filnumordfec',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['filnumordfec'];
}
         }
     return $dato;
  }

  public function setFilnumordfec()
  {
  	return $this->filnumordfec;
  }

  public function getAprmonche()
  {
    $dato="";
    $varemp = sfContext::getInstance()->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('tesmovemiche',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('aprmonche',$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']))
	       {
	       	$dato=$varemp['aplicacion']['tesoreria']['modulos']['tesmovemiche']['aprmonche'];
}
         }
     return $dato;
  }

  public function setAprmonche()
  {
  	return $this->aprmonche;
  }

    public function getMontominche()
    {
        $t= new Criteria();
        $reg= OpdefempPeer::doSelectOne($t);
        if ($reg)
        {
            $montoche=$reg->getMonche();
        }else $montoche=0;

        return $montoche;
    }

}
