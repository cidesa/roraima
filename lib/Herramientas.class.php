<?php


/**
 * Herramientas Varias de manejo de datos.
 *
 * @package    Siga
 * @subpackage lib
 * @author     Grupo Desarrollo Cidesa <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: Herramientas.class.php $
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
}

