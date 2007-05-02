<?php

/**
 * Subclass for representing a row from the 'ocregact' table.
 *
 *
 *
 * @package lib.model
 */
class Ocregact extends BaseOcregact
{
	public function getDestipact()
	{
		return Herramientas::getX('codtipact','octipact','destipact',str_pad(self::getCodcon(), 32 , ' '));
	}


	public function getNumofi()
	{
		$filtros_tablas=array('CODCON','CODTIPACT');//arreglo donde mando los filtros de las clases
		$filtros_variables=array(self::getCodcon(),self::getCedins());//arreglo donde mando los parametros de la funcion
		return $destipact= Herramientas::getXx('Ocasiact',$filtros_tablas,$filtros_variables,'Destipact');
	}	
}
