<?php


/**
 * Herramientas Varias de manejo de datos.
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: $
 * @copyright  Copyright 2007, Cidesa C.A.
 * 
 */
class Herramientas
{
	/**
	 * @static 
	 * @var string $prueba Definición del comentario de una variable.
	 */
	static $prueba = 'Variable de Prueba'; 
	

	/**
	 * Función para retornar datos a partir de una sentencia sql.
	 * Esta función retorna un arreglo de registros (Arreglo Bidimencional).
	 * @todo Agregar el manejo de errores de base de datos
	 *  
	 * @static
	 * @param string $sql Instrucción SQL.
	 * @param array &$output Arreglo bidimencional de respuesta.
	 * @return bool verdadero si encontro datos.
	 */ 
	public static function BuscarDatos($sql,&$output)
    {
		$con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$stmt = $con->createStatement();
		$rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
		$i = pg_num_fields($rs->getResource());
		$fieldname = array();
		$result = array();
		$output = array();
		for ($j = 0; $j < $i; $j++)
			{
				$fieldname[]  = pg_field_name($rs->getResource(),$j);
			}
		while ($rs->next())
		{
			$a=0;
			while ($a < $i)
			{
				$fila = $rs->getRow();
				$result[$fieldname[$a]] = $fila[$a];
				$a++;
			}
			$output[] = $result;
		}
		if (count($rs)>0) return true; else return false;
	}
	
	public static function instr($palabra,$busqueda,$comienzo,$concurrencia){
		
		$tamano=strlen($palabra);
		$cont=0;
		$cont_conc=0;
		
		for ($i=$comienzo;$i<=$tamano;$i++){
			$cont=$cont+1;
			if ($palabra[$i]==$busqueda):
				$cont_conc=$cont_conc+1;
				
				if ($cont_conc==$concurrencia): 
					$i=$tamano;
				endif;
			endif;
		}
			if ($concurrencia > $cont_conc ):
				 $cont=0;
			else:
				 $cont;
			endif;
		
		return $instr=$cont;
		}
		
	public static function FormarCodigoPadre($codigo,&$nivelcodigo,&$ultimo)
	 {   $nivelcodigo=''; 	 
	 	 $c = new Criteria();  	  
	  	 $arti = CadefartPeer::doSelect($c);
	  	 $cadena=$arti[0]->getForart();
	  	 $loncad=split("-",$cadena);
	  	 $lonniv=strlen($loncad[0]);
	  	 $loncodigo=(strlen($codigo));  	 	 
	  	  if ($lonniv==$loncodigo){  	  	
	  	  	$nivelcodigo=1;
	  	   	$padre=''; 
	  	   	return false; 	  	
	  	  }else{  	  
	  	  	$nivelcodigo=0;
	  	  	$padre=Herramientas::instr($codigo,'-',0,1);  
	  	  	$pad=($padre-1);
	  	  	$cad=(substr($codigo,0,$pad));
	  	  	$ultimo=str_pad($cad,20,' ');  	  	  
	  	    return true; 	
	  	  } 
 	}
	public static function buscar_codigo_padre($codigo2)
		{  
		  $c = new Criteria;  	      
	  	  $c->add(CaregartPeer::CODART, $codigo2);
	  	  $datos = CaregartPeer::doSelect($c);
		   if ($datos){	   
		      return true;
		   }
		   else{	   
		      return false;}	
		}
		
	public static function ObtenerDescripcionError($codigoerror)
		{
		if ($codigoerror=1)
			{
			return 'El Nivel Anterior No Existe';		
		    }
		    else
		    { if ($codigoerror=2)
		    	{
		    		return 'XXXXXXX';
		    	}
		    }		
	     }
}


