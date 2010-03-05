<?php

/**
 * Subclass for representing a row from the 'tsdefban'.
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
class Tsdefban extends BaseTsdefban
{
	protected $fechades = '';
	protected $fechahas = '';
	protected $gripmovban = '';
	protected $gripmovlib = '';
	protected $gripdesmovlib = '';
	protected $gripdesmovban = '';
        protected $deblibdis=0;
        protected $crelibdis=0;
        protected $debbandis=0;
        protected $crebandis=0;
        protected $tiedatrel="";

   public function __toString()
  {
    return array($this->numcue => $this->numcue);
  }

  public function afterHydrate()
  {
    self::CalcularDisponibilidad(&$deb,&$cre);
    self::CalcularDisponibilidad2(&$deb2,&$cre2);

      $this->deblibdis=number_format($deb,2,',','.');
      $this->crelibdis=number_format($cre,2,',','.');
      $this->debbandis=number_format($deb2,2,',','.');
      $this->crebandis=number_format($cre2,2,',','.');
    

  }

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

    $sql = "SELECT coalesce(SUM(CASE WHEN A.DEBCRE='D' THEN B.MONMOV ELSE 0 END),0) as debitos, coalesce(SUM(CASE WHEN A.DEBCRE='C' THEN B.MONMOV ELSE 0 END),0) as creditos "
      . "FROM TSTIPMOV A,TSMOVLIB B,TSDEFBAN C WHERE B.NUMCUE = '". self::getNumcue(). "' AND b.numcue = c.numcue and "
      . "B.TIPMOV = A.CODTIP AND "
      . "B.FECLib <= to_date('". $fechaactual ."','dd/mm/yyyy') AND "
      . "B.FECLib >= to_date('". $fecinicio ."','dd/mm/yyyy')";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      $deb = $result[0]['debitos'];
      $cre = $result[0]['creditos'];
    }else{
        $deb=0;
        $cre=0;
    }
  }

  public function CalcularDisponibilidad2(&$deb2,&$cre2)
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

    $sql = "SELECT coalesce(SUM(CASE WHEN A.DEBCRE='D' THEN B.MONMOV ELSE 0 END),0) as debitos, coalesce(SUM(CASE WHEN A.DEBCRE='C' THEN B.MONMOV ELSE 0 END),0) as creditos "
      . "FROM TSTIPMOV A,TSMOVBAN B,TSDEFBAN C WHERE B.NUMCUE = '". self::getNumcue(). "' AND b.numcue = c.numcue and "
      . "B.TIPMOV = A.CODTIP AND "
      . "B.FECBAN <= to_date('". $fechaactual ."','dd/mm/yyyy') AND "
      . "B.FECBAN >= to_date('". $fecinicio ."','dd/mm/yyyy')";
//print $sql; exit;
      if (Herramientas::BuscarDatos($sql,&$result))
    {
      $deb2 = $result[0]['debitos'];
      $cre2 = $result[0]['creditos'];
    }else{
        $deb2=0;
        $cre2=0;
    }

  }


  /*public function getDeblibdis()
    {
    self::CalcularDisponibilidad(&$deb,&$cre);
    return number_format($deb,2,',','.');
   }


  public function getCrelibdis()
    {
    self::CalcularDisponibilidad(&$deb,&$cre);
    return number_format($cre,2,',','.');
   }

     public function getDebbandis()
    {
    self::CalcularDisponibilidad2(&$deb,&$cre);
    return number_format($deb,2,',','.');
   }


  public function getCrebandis()
    {
    self::CalcularDisponibilidad2(&$deb,&$cre);
    return number_format($cre,2,',','.');
   }*/


  public function getSaltotlib()
  {
    $saltot= self::getAntlib() + Herramientas::toFloat($this->deblibdis) - Herramientas::toFloat($this->crelibdis);
    return number_format($saltot,2,',','.');
  }


  public function getSaltotban()
  {
    $saltot= self::getAntban() + Herramientas::toFloat($this->debbandis) - Herramientas::toFloat($this->crebandis);
  return number_format($saltot,2,',','.');
  }

  public function getCantdigact()
  {
    if (self::getCantdig()!='')
       return self::getCantdig();
    else
       return 8;
  }

  public function getTiedatrel()
  {
  	  $valor="N";
  	  $d= new Criteria();
  	  $d->add(TsmovlibPeer::NUMCUE,self::getNumcue());
  	  $resul= TsmovlibPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else {
  	  $d= new Criteria();
  	  $d->add(TsmovbanPeer::NUMCUE,self::getNumcue());
  	  $resul= TsmovbanPeer::doSelectOne($d);
  	  if ($resul)
  	  {
  	  	$valor= 'S';
  	  }else $valor= 'N';
  	  }

  	return $valor;
  }

  public function setTiedatrel()
  {
  	return $this->tiedatrel;
  }

 }
