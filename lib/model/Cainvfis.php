<?php

/**
 * Subclass for representing a row from the 'cainvfis'.
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
class Cainvfis extends BaseCainvfis
{
  private $unialter ='';
  protected $ubicacion = '';
  protected $totalm="0,00";

  public function getDesart()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getCodart());
  }

  public function getDesartdesde()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getArtdesde());
  }

  public function getDesarthasta()
  {
	return Herramientas::getX('CODART','Caregart','Desart',self::getArthasta());
  }

  public function getUnimed()
  {
	return Herramientas::getX('CODART','Caregart','Unimed',self::getCodart());
  }

  public function getUnimed2()
  {
	return Herramientas::getX('CODART','Caregart','Unialt',self::getCodart());
  }

  public function getCodpro($cod)
  {
 	  return Herramientas::getX('ordcom','caordcom','codpro',str_pad($cod,8,'0',STR_PAD_LEFT));
  }

  public function getFecord($cod)
  {
 	  return Herramientas::getX('ordcom','caordcom','fecord',str_pad($cod,8,'0',STR_PAD_LEFT));
  }

  public function getDesalm()
  {
  	  return Herramientas::getX('codalm','cadefalm','nomalm',self::getCodalm());
  }

  public function getArtdesde()///
  {
    $result=array();
    $fecha=self::getFecinv();
    $codalm=self::getCodalm();
    if ($fecha=='') $fecha=date('Y-m-d');
	  $sql = "select min(codart) as codart from cainvfis where fecinv='".$fecha."' and codalm='".$codalm."' ";
	  $h=Herramientas::BuscarDatos($sql,&$result);
	  if (count($result)>0)
	   {
             $campo = $result[0]['codart'];
             return $campo;
	   }
	   else  return '';
  }

  public function getArthasta()
  {
    $result=array();
    $fecha=self::getFecinv();
    $codalm=self::getCodalm();
    if ($fecha=='') $fecha=date('Y-m-d');
	  $sql = "select max(codart) as codart from cainvfis where fecinv='".$fecha."' and codalm='".$codalm."' ";
	  $h=Herramientas::BuscarDatos($sql,&$result);
	  if (count($result)>0)
	  {
             $campo = $result[0]['codart'];
             return $campo;
	   }
	   else  return '';
  }

  public function getUnialter()
  {
	$var = Herramientas::getX_vacio('codart','Caregart','Unialt',self::getCodart());
	return $var;
  }

  public function getUnialter_()
  {
	return $this->unialter;
  }

  public function setUnialter($val)
  {
	$this->unialter = $val;
  }

  public function getTotalm()
  {
    $e= new Criteria();
    $e->add(CaartalmPeer::CODALM,self::getCodalm());
    $e->add(CaartalmPeer::CODART,self::getCodart());
    $reg= CaartalmPeer::doSelectOne($e);
    if ($reg)
    {
        $totalm=number_format($reg->getExiact(),2,',','.');
    }else $totalm="0,00";

    return $totalm;
}

  public function setTotalm(){

    return $this->totalm;
  }
}
