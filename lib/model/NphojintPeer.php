<?php

/**
 * Subclass for performing query and update operations on the 'nphojint' table.
 *
 *
 *
 * @package lib.model
 */
class NphojintPeer extends BaseNphojintPeer
{
	const COLUMNS = 'columns';

	public static $columsname = array (
	self::COLUMNS => array (NphojintPeer::CODEMP => 'Código', NphojintPeer::NOMEMP => 'Descripción', ),);


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
     return Herramientas::getX('CODEMP','Nphojint','Nomemp',$codigo);
   }

   public static function getCodnom($codigo)
   {
     return Herramientas::getX('CODEMP','Npasicaremp','Codnom',$codigo);
   }

   public static function getCodcar($codigo)
   {
     return Herramientas::getX('CODEMP','Npasicaremp','Codcar',$codigo);
   }

   public static function getNomnom($codigo)
   {
     return Herramientas::getX('CODNOM','Npasicaremp','Nomnom',$codigo);
   }

   public static function getNomcar($codigo)
   {
     return Herramientas::getX('CODCAR','Npcargos','Nomcar',$codigo);
   }

   public static function getCedemp($codigo)
   {
     return Herramientas::getX('CODEMP','Nphojint','Cedemp',$codigo);
   }

   public static function getFecing($codigo)
   {
 		$c = new Criteria();
	  	$c->add(NpasiempcontPeer::CODEMP,$codigo);
	    $datos = NpasiempcontPeer::doSelectOne($c);
	    if ($datos)
	    {
	       return date("d/m/Y",strtotime($datos->getFeccal()));
	    }
	    else
	    {
			$cr = new Criteria();
		  	$cr->add(NphojintPeer::CODEMP,$codigo);
		    $resul = NphojintPeer::doSelectOne($cr);
		    if ($resul)
				return date("d/m/Y",strtotime($resul->getFecing()));
		    else
		        return "";
	    }
  }

   public static function getFecRet($codigo)
   {
     return Herramientas::getX('CODEMP','Nphojint','Fecret',$codigo);
   }
}
