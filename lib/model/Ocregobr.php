<?php

/**
 * Subclass for representing a row from the 'ocregobr' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Ocregobr extends BaseOcregobr
{
  public function getDescon()
  {
  	return Herramientas::getX('CODCON','OCRegCon','Descon',self::getCodcon());  	
  }
 public function getNompro()
  {
  	return Herramientas::getX('CODPRO','Caprovee','Nompro',self::getCodpro());  	
  }	 
 public function getDestipobr()
  {
  	return Herramientas::getX('CODTIPOBR','Octipobr','Destipobr',self::getCodtipobr());  	
  }	 
 public function getNompai()
  {
  	return Herramientas::getX('CODPAI','Ocpais','Nompai',self::getCodpai());  	
  }	 
 public function getNomedo()
  {
/*
		return $destipact= Herramientas::getXx('Ocasiact',$filtros_tablas,$filtros_variables,'Destipact');
  */
		$filtros_tablas=array('CODPAI','CODEDO');//arreglo donde mando los filtros de las clases
		$filtros_variables=array(self::getCodpai(),self::getCodedo());//arreglo donde mando los parametros de la funcion
  
  	//return $nomedo= Herramientas::getX('Ocestado',$filtros_tablas,$filtros_variables,'Nomedo');  	
  }	 
 public function getNommun()
  {
/*
		return $destipact= Herramientas::getXx('Ocasiact',$filtros_tablas,$filtros_variables,'Destipact');
  */
		$filtros_tablas=array('CODPAI','CODEDO');//arreglo donde mando los filtros de las clases
		$filtros_variables=array(self::getCodpai(),self::getCodedo());//arreglo donde mando los parametros de la funcion
  
  	//return $nomedo= Herramientas::getX('Ocestado',$filtros_tablas,$filtros_variables,'Nomedo');  	
  }	 
 public function getNompar()
  {
/*
		return $destipact= Herramientas::getXx('Ocasiact',$filtros_tablas,$filtros_variables,'Destipact');
  */
		$filtros_tablas=array('CODPAI','CODEDO');//arreglo donde mando los filtros de las clases
		$filtros_variables=array(self::getCodpai(),self::getCodedo());//arreglo donde mando los parametros de la funcion
  
  	//return $nomedo= Herramientas::getX('Ocestado',$filtros_tablas,$filtros_variables,'Nomedo');  	
  }	 
 public function getNomsec()
  {
/*
		return $destipact= Herramientas::getXx('Ocasiact',$filtros_tablas,$filtros_variables,'Destipact');
  */
		$filtros_tablas=array('CODPAI','CODEDO');//arreglo donde mando los filtros de las clases
		$filtros_variables=array(self::getCodpai(),self::getCodedo());//arreglo donde mando los parametros de la funcion
  
  	//return $nomedo= Herramientas::getX('Ocestado',$filtros_tablas,$filtros_variables,'Nomedo');  	
  }	 


}
