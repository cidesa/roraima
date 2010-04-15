<?php

/**
 * Subclass for representing a row from the 'ocregcon'.
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
class Ocregcon extends BaseOcregcon
{
  protected $totcon='0,00';
  protected $totalc='0,00';
  protected $totalv='0,00';
  protected $totalcv='0,00';
  protected $monper='0,00';
  protected $aumobr='0,00';
  protected $disobr='0,00';
  protected $monded='0,00';
  protected $obrext='0,00';
  protected $poreje='0,00';
  protected $moneje='0,00';
  protected $totobreje='0,00';
  protected $totobrejefis='0,00';
  protected $totales='0,00';
  protected $fecact='';
  protected $pormul='0,00';
  protected $plaini='';
  protected $totofer='0,00';
  protected $codpreiva='';
  protected $contratado=0.00;
  protected $contrapar=0.00;
  protected $disponible='';

 public function getDesobr()
  {
  	return Herramientas::getX('CODOBR','OCRegObr','Desobr',self::getCodobr());
  }
 public function getNompro()
  {
  	return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());
  }
  public function getNomtipcon()
  {
  	return Herramientas::getX('CodTipCon','OCTipCon','DesTipCon',self::getTipcon());
  }

  public function getTotalc()
  {
  	$sql="Select coalesce(Sum(MonCon/(1+PorIva/100)),0) as montotalc From OCRegCon where Codcon = '".self::getCodcon()."'";
  	if (Herramientas :: BuscarDatos($sql, & $result))
    {
      $valtotc=number_format($result[0]["montotalc"],2,',','.');
    }else { $valtotc='0,00';}

    return $valtotc;
  }

  public function getMonper()
  {
  	$sql="Select coalesce(Sum(MonPer),0) as tmonper from OcRegVal where CodCon='".self::getCodcon()."' and NumVal='01' and CodTipVal='01' group by codcon;";
  	if (Herramientas :: BuscarDatos($sql, & $result))
    {
      $valmonper=number_format($result[0]["tmonper"],2,',','.');
    }else { $valmonper='0,00';}

    return $valmonper;
  }

  public function getMonded()
  {
  	/*$sql="Select Sum(MonDed) as tmonded from OcDedCon where CodCon='".self::getCodcon()."' group by codcon;";
  	if (Herramientas :: BuscarDatos($sql, & $result))
    {
      $valmonded=number_format($result[0]["tmonded"],2,',','.');
    }else { $valmonded='0,00';}*/

    $valmonded='0,00';

    return $valmonded;
  }

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $sql1="select poriva from ocregcon where codcon='".self::getCodcon()."'";
      if (Herramientas :: BuscarDatos($sql1, & $result1))
      {
         $sql="Select coalesce(Sum(AumObr),0) as ao,coalesce(Sum(DisObr),0) as do,coalesce(Sum(ObrExt),0) as oe from OcRegVal where CodCon='".self::getCodcon()."' group by codcon;";
         if (Herramientas :: BuscarDatos($sql, & $result))
         {
          $cal1=($result[0]["ao"]/(1+$result1[0]["poriva"]/100));
          $cal2=($result[0]["do"]/(1+$result1[0]["poriva"]/100));
          $cal3=($result[0]["oe"]/(1+$result1[0]["poriva"]/100));
          $this->aumobr=number_format($cal1,2,',','.');
          $this->disobr=number_format($cal2,2,',','.');
          $this->obrext=number_format($cal3,2,',','.');
          $cal4=((Herramientas::convnume(self::getTotalc()) + Herramientas::convnume($this->aumobr) - Herramientas::convnume($this->disobr) + Herramientas::convnume($this->obrext))-Herramientas::convnume(self::getTotalc()));
          $this->totalcv=number_format($cal4,2,',','.');
          $cal5=(Herramientas::convnume($this->totalcv)/Herramientas::convnume(self::getTotalc())*100);
          $this->totalv=number_format($cal5,2,',','.');
         }
         else
         {
           	$this->aumobr='0,00';
         	$this->disobr='0,00';
         	$this->obrext='0,00';
         	$this->totalcv='0,00';
         	$this->totalv='0,00';
         }
      }
      else
         {
         	$this->aumobr='0,00';
         	$this->disobr='0,00';
         	$this->obrext='0,00';
         	$this->totalcv='0,00';
         	$this->totalv='0,00';
         }
   }

  public function getFecact()
  {
  	$val=date('d/m/Y');
  	return $val;
  }

   public function getPormul()
  {  $c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $valor=number_format($reg->getPormul(),2,',','.');
    }else { $valor="";}
    return $valor;
  }

  public function getPlaini()
  {  $c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $valor=$reg->getPlaini();
    }else { $valor="";}
    return $valor;
  }

}
