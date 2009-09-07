<?php

/**
 * Subclass for representing a row from the 'ocregobr'.
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
class Ocregobr extends BaseOcregobr
{
  protected $totalp=0.0;
  protected $totala=0.0;
  protected $totaldif=0.0;
  protected $totalc=0.0;
  protected $totalcv=0.0;
  protected $pordif=0.0;
  protected $porvarcon=0.0;
  protected $moneje=0.0;
  protected $poreje=0.0;
  protected $monporeje=0.0;
  protected $porxeje=0.0;
  protected $obrejefis=0.0;
  protected $totobreje=0.0;


  public function getDescon()
  {
  	return Herramientas::getX('CODCON','OCRegCon','Descon',self::getCodcon());
  }

  public function getNompreiva()
  {
  	return Herramientas::getX('CODPRE','Cpdeftit','Nompre',self::getCodpreiva());
  }

 public function getNompro()
  {
  	return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }
 public function getDestipobr()
  {
  	return Herramientas::getX('CODTIPOBR','Octipobr','Destipobr',self::getCodtipobr());
  }
 public function getNompai()
  {
  	return Herramientas::getX('CODPAI','Ocpais','Nompai',self::getCodpai());
  }
	/**
	 * Función para retornar el nombre del Estado.
	 * Esta función retorna un registro.
	 *
	 */
 public function getNomedo()
  {
  	return Herramientas::getX('CODEDO','Ocestado','Nomedo',self::getCodedo());

  }
	/**
	 * Función para retornar el nombre del Titulo Presupuestario.
	 * Esta función retorna un registro.
	 *
	 */
 public function getNompre()
  {
  	return Herramientas::getX('CODPRE','Cpdeftit','Nompre',self::getCodpre());

  }

  ///Situacion de la obra/////////

  public function getTotalp()
  {
  	$sql="Select coalesce(Sum(CanObr*CosUni),0) as montotalp From OCPreObr where CodObr = '".self::getCodobr()."' ";
  	if (Herramientas :: BuscarDatos($sql, & $result))
    {
      $valtotp=number_format($result[0]["montotalp"],2,',','.');
    }else { $valtotp='0,00';}

    return $valtotp;
  }

  public function getTotala()
  {
  	/*$sql="Select coalesce(Sum(ApoOrg),0) as montotala From OCAsiObr where CodObr = '".self::getCodobr()."' ";
  	if (Herramientas :: BuscarDatos($sql, & $result))
    {
      $valtota=number_format($result[0]["montotala"],2,',','.');
    }else { $valtota='0,00';}*/
    $valtota='0,00';
    return $valtota;
  }

  public function getTotaldif()
  {
  	$totp=Herramientas::convnume(self::getTotalp());
  	$topa=Herramientas::convnume(self::getTotala());
  	$resul= $totp - $topa;
  	$valtotdif= number_format($resul,2,',','.');
  	return $valtotdif;
  }

  public function getTotalc()
  {
  	$sql="Select coalesce(Sum(MonCon/(1+PorIva/100)),0) as montotalc From OCRegCon where CodObr = '".self::getCodobr()."' and stacon<>'N'";
  	if (Herramientas :: BuscarDatos($sql, & $result))
    {
      $valtotc=number_format($result[0]["montotalc"],2,',','.');
    }else { $valtotc='0,00';}

    return $valtotc;
  }

  public function getTotalcv()
  {
  	$sql="Select RV.AumObr as ao,RV.DisObr as do,RV.ObrExt as oe from OcRegVal RV,OcRegCon RC,OcRegObr RO where RV.codcon=RC.CodCon and codtipval='03' and RC.CodObr=RO.CodObr and RO.CodObr='".self::getCodobr()."'";
  	if (Herramientas :: BuscarDatos($sql, & $result))
    {
      $cal=(($result[0]["ao"]+$result[0]["oe"]-$result[0]["do"])/1.16);
      $valtotc=number_format($cal,2,',','.');
    }else { $valtotcv='0,00';}

    return $valtotcv;
  }

  public function getPordif()
  {
  	$totp=Herramientas::convnume(self::getTotalp());
  	$totc=Herramientas::convnume(self::getTotalc());
    $topa=Herramientas::convnume(self::getTotala());
  	if ($totc>0)
  	{
      $calculo=(100-(100/$totp)*$topa);
  	  $valpordif=number_format($calculo,2,',','.');
    }else { $valpordif='0,00';}

    return $valpordif;
  }

  public function getPorvarcon()
  {

  	$totp=Herramientas::convnume(self::getTotalp());
    $topcv=Herramientas::convnume(self::getTotalcv());
    if ($totp>0)
    {
      $calcu= 100*($topcv/$totp);
  	  $valporvarcon=number_format($calcu,2,',','.');
    }else { $valporvarcon='0,00';}

    return $valporvarcon;
  }

  public function getMoneje()
  {
  	return '0,00';
  }

  public function getPoreje()
  {
  	return '0,00';
  }

    public function getMonporeje()
  {
  	return '0,00';
  }

  public function getPorxeje()
  {
  	return '0,00';
  }

    public function getObrejefis()
  {
  	return '0,00';
  }

  public function getTotobreje()
  {
  	return '0,00';
  }


}
