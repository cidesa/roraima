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
	/**
	 * Función para retornar el nombre del Estado.
	 * Esta función retorna un registro.
	 *  
	 */     
 public function getNomedo() 
  {  	
  	return Herramientas::getX('CODEDO','Ocestado','Nomedo',self::getCodedo());  	

  }	 
	/**
	 * Función para retornar el nombre del Municipio.
	 * Esta función retorna un registro.
	 *  
	 */      
  public function getNommun() 
  {
		$filtros_tablas=array('CODPAI','CODEDO'); 
		$filtros_variables=array(self::getCodpai(),self::getCodedo());
  
  	return Herramientas::getXx('Ocmunici',$filtros_tablas,$filtros_variables,'Nommun');  	
  }	 
 public function getNompar()  //Nombre de la Parroquia
  {
		$filtros_tablas=array('CODPAI','CODEDO','CODMUN');
		$filtros_variables=array(self::getCodpai(),self::getCodedo(),self::getCodmun());
  
  	return Herramientas::getXx('Ocparroq',$filtros_tablas,$filtros_variables,'Nompar');  	
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
