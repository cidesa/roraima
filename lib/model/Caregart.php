<?php

/**
 * Subclass for representing a row from the 'caregart' table.
 *
 *
 *
 * @package lib.model
 */
class Caregart extends BaseCaregart
{
  protected $ubicacion = '';
  protected $gencorart="";

public function getNomram($val=false)
	{
		return Herramientas::getX('RAMART','Caramart','Nomram',self::getRamart());
	}


public function getDisponibilidad($val=false)
  {
	$filtros=array('CODART','CODALM');//arreglo donde mando los filtros de las clases
	$variables=array(self::getCodart(),self::getCodalm());//arreglo donde mando los parametros de la funcion
  	return $destipact= Herramientas::getXx('CAARTALM',$filtros,$variables,'Destipact');
  }

    public function getDessnc()
	{
		return Herramientas::getX('CODSNC','Cacatsnc','Dessnc',self::getCodartsnc());
	}

public function getNompar()
	{
		return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpar());
	}

	public function getGencorart()
    {
      $d= new Criteria();
      $data=CadefartPeer::doSelectOne($d);
      if ($data)
      {
      	$si=$data->getGencorart();
      }else $si=null;
      return $si;
    }
}
