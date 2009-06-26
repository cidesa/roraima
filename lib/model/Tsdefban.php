<?php

/**
 * Subclass for representing a row from the 'tsdefban' table.
 *
 *
 *
 * @package lib.model
 */
class Tsdefban extends BaseTsdefban
{
	protected $fechades = '';
	protected $fechahas = '';
	protected $gripmovban = '';
	protected $gripmovlib = '';
	protected $gripdesmovlib = '';
	protected $gripdesmovban = '';

    public function getDestip()
  {
    return Herramientas::getX('CODTIP','Tstipcue','Destip',self::getTipcue());
  }

    public function getDestipren()
  {
    return Herramientas::getX('CODTIP','Tstipren','Destip',self::getTipren());
  }


  public function CalcularDisponibilidad(&$deb,&$cre)
  {
    $result=array();
      $fecinicio="";
        $fecactual="";
        $deb="";
        $cre="";
    $c = new Criteria();
      $c->add(ContabaPeer::CODEMP,'001');
      $dato = ContabaPeer::doSelectOne($c);
      if ($dato)
      {
        $fecinicio = $dato->getFecini();
          $fecinicio =date("d/m/Y",strtotime($fecinicio));
      }
      $fechaactual=date('d/m/Y');

    $sql = "SELECT coalesce(SUM(CASE WHEN A.DEBCRE='D' THEN B.MONMOV ELSE 0 END)) as debitos, coalesce(SUM(CASE WHEN A.DEBCRE='C' THEN B.MONMOV ELSE 0 END)) as creditos "
      . "FROM TSTIPMOV A,TSMOVLIB B,TSDEFBAN C WHERE B.NUMCUE = '". self::getNumcue(). "' AND b.numcue = c.numcue and "
      . "B.TIPMOV = A.CODTIP AND "
      . "B.FECLib <= to_date('". $fechaactual ."','dd/mm/yyyy') AND "
      . "B.FECLib >= to_date('". $fecinicio ."','dd/mm/yyyy')";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $deb = $result[0]['debitos'];
      $cre = $result[0]['creditos'];
    }

  }


  public function getDeblibdis()
    {
    self::CalcularDisponibilidad(&$deb,&$cre);
    return number_format($deb,2,',','.');
   }


  public function getCrelibdis()
    {
    self::CalcularDisponibilidad(&$deb,&$cre);
    return number_format($cre,2,',','.');
   }


  public function getSaltotlib()
  {
    $saltot= self::getAntlib() + Herramientas::convnume(self::getDeblibdis()) - Herramientas::convnume(self::getCrelibdis());
    return number_format($saltot,2,',','.');
  }


  public function getSaltotban()
  {
    $saltot= self::getAntban() + self::getDebban() - self::getCreban();
  return number_format($saltot,2,',','.');
  }

  public function getCantdigact()
  {
    if (self::getCantdig()!='')
       return self::getCantdig();
    else
       return 8;
  }
 }
