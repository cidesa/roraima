<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'npasicaremp'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class NpasicarempPeer extends BaseNpasicarempPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (NpasicarempPeer::CODEMP => 'Código', NpasicarempPeer::NOMEMP => 'Descripción'),);


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

  public static function getNomemp($codigo)
  {
    $c = new Criteria();
    $c->add(NpasicarempPeer::CODEMP,$codigo);
    $per = NpasicarempPeer::doSelectOne($c);
    if ($per)
    {
    	$nomemp= $per->getNomemp();
    	//print $nomnom; exit;
    	return $nomemp;
    }
  }

  public static function getNomempnom($codigoemp, $codigonom)
  {
  		$c= new Criteria();
	      $c->add(NpasicarnomPeer::CODNOM,$codigonom);
	      $c->addJoin(NpasicarempPeer::CODCAR,NpasicarnomPeer::CODCAR);
	      $c->add(NpasicarempPeer::STATUS,'V');
	      $c->add(NpasicarempPeer::CODEMP,$codigoemp);
	      $obj = NpasicarempPeer::doSelectOne($c);

	      if (!$obj)
	      {
	      	$nombre = '';
	      }
	      else
	      {
	      	$nombre = $obj->getNomemp();
	      }


	return $nombre;
  }
}
