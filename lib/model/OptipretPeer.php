<?php

/**
 * Subclass for performing query and update operations on the 'optipret' table.
 *
 *
 *
 * @package lib.model
 */
class OptipretPeer extends BaseOptipretPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (OptipretPeer::CODTIP => 'Código', OptipretPeer::DESTIP => 'Descripción', OptipretPeer::CODCON => 'Cta. Contable', OptipretPeer::BASIMP => 'Base Imponible', OptipretPeer::PORRET => '% Retencion', OptipretPeer::FACTOR => 'Factor', OptipretPeer::PORSUS => '% Sustraendo',  OptipretPeer::UNITRI => 'Unidad'),);


	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}

	static public function getColumsNames()
	{
		return self::$columsname[self::COLUMNS];
	}


	static public function getArrayFieldsNames()
	{
		$col = self::$columsname[self::COLUMNS];
		$columnas = array();
		foreach($col as $key => $value)
		{
			$punto = strpos($key,'.');
			$tabla = substr($key,0,$punto);
			$campo = substr($key,$punto+1);
			$columnas[] = ucfirst(strtolower($campo));

		}
		return $columnas;
	}

  public static function getRetencion($codigo)
  {
	return Herramientas::getX('CODTIP','Optipret','Destip',$codigo);
  }

  public static function getDato($codigo, $nomdat)
  {
   	return Herramientas::getX('CODTIP','Optipret',$nomdat,$codigo);
  }

  public static function getEsta($cod)
  {
    $codigo="";
    $c = new Criteria();
    $c->add(TsretivaPeer::CODRET,$cod);
    $datos = TsretivaPeer::doSelect($c);
    if ($datos)
    {
      foreach ($datos as $codigos)
      {
        $codigo=$codigo."_".$codigos->getCodpar();
      }

      return $codigo;
    }else return 'N';
  }

  public static function getEstaislr($cod)
  {
    $c = new Criteria();
    $c->add(TsrepretPeer::CODREP,'002');
    $c->add(TsrepretPeer::CODRET,$cod);
    $datos = TsrepretPeer::doSelect($c);
    if ($datos)
    { return 'S';} else { return 'N';}
  }

   public static function getEsta1xmil($cod)
   {
    $c = new Criteria();
    $c->add(TsrepretPeer::CODREP,'003');
    $c->add(TsrepretPeer::CODRET,$cod);
    $datos = TsrepretPeer::doSelect($c);
    if ($datos)
    { return 'S';} else { return 'N';}
   }

   public static function getMontoiva($cod)
   {
   	$mont=0;
    $c = new Criteria();
    $c->add(TsretivaPeer::CODRET,$cod);
    $result = TsretivaPeer::doSelectOne($c);
    if ($result)
    {
       $c= new Criteria();
       $c->add(CarecargPeer::CODRGO,$result->getCodrec());
       $resul= CarecargPeer::doSelectOne($c);
       if ($resul)
       {
       	$mont=$resul->getMonrgo();
         return $mont;
       }else {return $mont;}
    }
    else
    {
      return $mont;
    }
   }

}
