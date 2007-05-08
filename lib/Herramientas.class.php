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

		for ($i=$comienzo;$i<$tamano;$i++){
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
	{   
	  $nivelcodigo='';
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
    
    public static function obtenerMensajeError($cod)
     {  	
  	   $errores = sfYaml::load('../config/errores.yml');
  	
  	   return $errores[$cod]['msj']; 	  	
    }


	/**
	 * Función para retornar datos a una variale con un filtro.
	 * Esta función retorna un registro.
	 *  
	 * @static
	 * @param string $fieldjoin Campo de la tabla a comparar.
	 * @param string $join Tabla a la que se va a consultar
	 * @return string $result es el nombre del campo que se quiere traer la data
	 * @param string $data variale con la que se va hacer el filtro.
	 */     
    //public static function getX($fieldjoin, $join, $result, $data)
    public static function getX($campos, $tabla, $result, $data)
     {
     	eval ('$field = '.ucfirst(strtolower($join)).'Peer::'.strtoupper($fieldjoin).';');
	
	   $c = new Criteria();
	   $c->add($field,$data);
	   eval ('$reg = '.ucfirst(strtolower($join)).'Peer::doSelectone($c);');
	   if ($reg){
	   	eval('$r = $reg->get'.ucfirst(strtolower($result)).'();');
		 return $r;
	  }else{
	  	return '<¡Registro no Encontrado o Vacio!>';
	  }
  	
  }
  
  	public static function getMascaraContable()
	  {
	  	  $c = new Criteria();  	  
	  	  $conta = ContabaPeer::doSelect($c);
		  if ($conta)
		  	return $conta[0]->getForcta();
		  else 
		    return ' ';
	  } 
	   
	public static function getMascaraPartida()
	  {
	  	  $c = new Criteria();
	  	  $c->add(CpnivelesPeer::CATPAR,'P');
	  	  $c->addAscendingOrderByColumn(CpnivelesPeer::CONSEC);  	    	  
	  	  $par = CpnivelesPeer::doSelect($c);
	  	  $i=0; 
	  	  $formato="";
	  	  $ruptura="";  	  
	  	  while ($i<count($par))   	   
	  	   {
	  	   		$lon=$par[$i]->getLonniv();
	  	   		$num='';
	  	   		$j=0;
	  	   		while ($j<$lon)
	  	   		{
	  	   			$num=$num.'#';
	  	   		$j++;	
	  	   		}
	  	   		
	  	   		if ($i!=(count($par)-1))
	  	   		{
	  	   			$num=$num.'-';
	  	   		}
	
	  	   		$ruptura=$ruptura.$num;
	  	   		$i++;
	  	   }  	   
		  	return $ruptura;	 
	  } 
	   
	public static function getMascaraUbicacion()
	  {
	  	  $c = new Criteria();  	  
	  	  $ubi = CadefartPeer::doSelect($c);
		  if ($ubi)
		  	return $ubi[0]->getForubi();
		  else 
		    return ' ';
	  }	
	  
	public static function getMascaraArticulo()
	  {
	  	  $c = new Criteria();  	  
	  	  $arti = CadefartPeer::doSelect($c);  	  
		  if ($arti)
		  	return str_pad($arti[0]->getForart(), 20 , ' ');
		  else 
		    return ' ';
	  }  
  
    public static function CargarDatosGrid(&$form,$obj)
     {
   	   	$i=0;

	  	$fil=count($obj["datos"])+$obj["filas"];
	  	$col=count($obj["grabar"]);
	  	$grabar=$obj["grabar"];
	  	$campos=$obj["campos"];
	  	$tipos=$obj["tipos"];
	  	$eliminar=split("-",$form->getRequestParameter('txtidborrar'));
	  	
  	
  	////////////////////////////////////////
	// CREAMOS EL ARREGLO DE OBJETOS A INCLUIR Y MODIFICAR
	  $objetos=array();
	  $objetos2=array(); 
  	  while ($i<$fil)
  	   {
  		$j=0;
  		$tabla = $obj['tabla'];
	  	$id='x'.$i.'id';
	  	$cajchk='x'.$i.'1';
	  	
	  	
	  	if ( ($form->getRequestParameter($id)!="") )//modificacion
	  	{
	  		eval('$clase = '.$tabla.'Peer::retrieveByPk($form->getRequestParameter($id));');
	  		
			while ($j<$col)
			{
				$pos=intval($grabar[$j]);
				$caja='x'.$i.$pos;
				$tira1='$clase->set';
				$tira2='(';
				$tira3=');';
				if ($tipos[$j]=="t")
				{
					$valor = "'".$form->getRequestParameter($caja)."'";
				}
				elseif ($tipos[$j]=="m")
				{
					$valor = str_replace(",","",$form->getRequestParameter($caja));
				}
				
				eval($tira1.$campos[$pos-1].$tira2.$valor.$tira3);
				
	  		$j++;
			}
			$objetos[] = $clase;
			
	  	}
	  	elseif ( ($form->getRequestParameter($id)=="") && (trim($form->getRequestParameter($cajchk)!="")) ) //nuevo
	  	{
	  		$clase = new Caartalm();
	  		
	  		while ($j<$col)
			{
				$pos=intval($grabar[$j]);
				$caja='x'.$i.$pos;
				$tira1='$clase->set';
				$tira2='(';
				$tira3=');';
				if ($tipos[$j]=="t")
				{
					$valor = "'".$form->getRequestParameter($caja)."'";
				}
				elseif ($tipos[$j]=="m")
				{
					$valor = str_replace(",","",$form->getRequestParameter($caja));
				}
				eval($tira1.$campos[$pos-1].$tira2.$valor.$tira3);
	  		$j++;
			}
			$objetos[] = $clase;
	  		
	  	 }
	 	
  	   $i++;
  	  } 	
      
	////////////////////////////////////////
	// CREAMOS EL ARREGLO DE OBJETOS A ELIMINAR
  	  $i=0;
  	
  	 while ($i<count($eliminar))
  	  {
  		
		eval('$clase2 = '.$tabla.'Peer::retrieveByPk($eliminar[$i]);');
		
		$objetos2[] = $clase2;
		
  	  $i++;	
  	 }
  	
  	$form->resultado=array($objetos,$objetos2);
  	
  	 return $form->resultado;
   }
   
   
   public static function Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados)
	  {
	  	$c = new Criteria();
	  	if ($filtros_tablas[0]!='')
	  	{
	  		for($a=0;$a<count($filtros_tablas);$a++)
	  		{
	  			eval('$c->add('.ucfirst(strtolower($tablas[0])).'Peer::'.strtoupper($filtros_tablas[$a]).','.chr(39).ucfirst(strtolower($filtros_variales[$a])).chr(39).');');
	  			//print ('$c->add('.ucfirst(strtolower($tablas[0])).'Peer::'.strtoupper($filtros_tablas[$a]).','.chr(39).ucfirst(strtolower($filtros_variales[$a])).chr(39).');');
	  		}
	  	}
	  	eval('$lista_arreglo = '.ucfirst(strtolower($tablas[0])).'Peer::doSelect($c);');
	  	$arreglo = array();
	  	foreach($lista_arreglo as $obj_estado)
	  	{
	  		eval('$arreglo[$obj_estado->get'.ucfirst(strtolower($campos_retornados[0])).'()] = $obj_estado->get'.ucfirst(strtolower($campos_retornados[1])).'();');
	  	}
	  	return $arreglo;
	  }
	  
	/**
	 * Función para retornar datos a una variable pero con mas de un filtro.
	 * Esta función retorna un registro.
	 *  
	 * @static
	 * @param string $tabla tabla a comparar.
	 * @param string $filtros arreglo de campos de la Tabla a la que se van a consultar y comparar.
	 * @return string $variables es el nombre del campo que se quiere traer la data.
	 * @param string $variables arreglo de variables o campos con la que se va hacer el filtro.
	 */   
   public static function getXx($tabla,$filtros,$variables,$campo_retornado)
	{
	  	$c = new Criteria();
	  	//print $variables[0];
	  	if (($filtros[0]!='') && ($variables[0]!=''))
	  	{
	  		for($a=0;$a<count($filtros);$a++)
	  		{
	  			eval('$c->add('.ucfirst(strtolower($tabla)).'Peer::'.strtoupper($filtros[$a]).','.chr(39).$variables[$a].chr(39).');');
	  		}
	  	}
	  	eval('$arreglo = '.ucfirst(strtolower($tabla)).'Peer::doSelectOne($c);');
	  	if($arreglo) return eval('$arreglo->get'.ucfirst(strtolower($campo_retornado)).'();');
		else return '<¡Registro no Encontrado o Vacio!>'; 	  	
	}	  
	  
	  

    public static function autocompleteAjax($fieldjoin, $join, $result, $data)
     {
	   eval ('$field = '.$join.'Peer::'.$fieldjoin.';');
	   $resultado=array();
	   $c = new Criteria();
	   $c->add($field, $data.'%', Criteria::LIKE);
	   eval ('$des = '.$join.'Peer::doSelect($c);');
	   if ($des){
	      $i=0;		 
		  while ($i<count($des))
		  {	
			eval('$resultado[$i] = $des[$i]->get'.$result.'();');
		 	$i++;
		  }	
		}else{
			$resultado[0]='<¡Registro no Encontrado o Vacio!>';
		}		
		 return $resultado;  	
  }
  
    public static function mediaNumber($numero)
	{
	    $resto = $numero % 2;
	    if ($resto == 0) return 0;
	    else return 1;
	}  
}



