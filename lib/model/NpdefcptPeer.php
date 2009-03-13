<?php

/**
 * Subclass for performing query and update operations on the 'npdefcpt' table.
 *
 *
 *
 * @package lib.model
 */
class NpdefcptPeer extends BaseNpdefcptPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (NpdefcptPeer::CODCON => 'Código', NpdefcptPeer::NOMCON => 'Descripción', NpdefcptPeer::CODPAR => 'Partida Presupuestaria', ),);


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

  public static function getDescon($codigo)
  {
	return Herramientas::getX('CODCON','Npdefcpt','Nomcon',str_pad($codigo,3,'0',STR_PAD_LEFT));
  }

  public static function getNomconnom($codigocon, $codigonom)
  {

  	      $c= new Criteria();
	      $c->add(NpdefmovPeer::CODNOM,$codigonom);
	      $c->addJoin(NpdefmovPeer::CODCON,NpdefcptPeer::CODCON);
	      $c->add(NpdefcptPeer::CODCON,$codigocon);

	      $obj = NpdefcptPeer::doSelectOne($c);

	      if (!$obj)
	      {
	      	$nombre = 'Registro no encontrado';
	      }
	      else
	      {
	      	$nombre = $obj->getNomcon();
	      }


	return $nombre;
  }

}
