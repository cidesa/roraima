<?php

/**
 * Subclass for performing query and update operations on the 'npnomina' table.
 *
 *
 *
 * @package lib.model
 */
class NpnominaPeer extends BaseNpnominaPeer
{
	const COLUMNS = 'columns';
	public $nomnom='';

	public static $columsname = array (
	self::COLUMNS => array (NpnominaPeer::CODNOM => 'Código', NpnominaPeer::NOMNOM => 'Descripción', NpnominaPeer::ULTFEC => 'Ultima Fecha de Procesamiento', NpnominaPeer::FRECAL => 'Frecuencia de Calculo', NpnominaPeer::PROFEC => 'Próxima Fecha de Procesamiento',),);


	static public function getColumName($colum)
	{
		return self::$columsname[self::COLUMNS][$colum];
	}

	static public function getNomnom($codnom)
	{
    $c = new Criteria();
    $c->add(NpnominaPeer::CODNOM,$codnom);
    $per = NpnominaPeer::doSelectOne($c);
    if ($per)
    {
    	$nomnom= $per->getNomnom();
       	return $nomnom;
    }
    else
        return "";
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

  public static function getDesnom($codigo)
  {
     $c= new Criteria();
     //$c->add(NpdefmovPeer::CODNOM,$codigo);
     $c->add(NpnominaPeer::CODNOM,$codigo);
     $objNpnomina = NpnominaPeer::doSelectOne($c);

     if ($objNpnomina)
        return $objNpnomina->getNomnom();
     else
        return 'Registro no encontrado';
  }

  public static function getDesnomesp($codigonom,$codnomesp)
  {
  	$nomina = Herramientas::getXx('Npnomespnomtip',array('CODNOM','CODNOMESP'),array(strtoupper($codigonom),strtoupper($codnomesp)),'Codnom');

	return Herramientas::getX('CODNOM','Npnomina','Nomnom',strtoupper($nomina));
  }

}
