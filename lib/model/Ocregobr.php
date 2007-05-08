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
	 * Función para retornar el nombre del Titulo Presupuestario.
	 * Esta función retorna un registro.
	 *  
	 */     
 public function getNompre() 
  {  	
  	return Herramientas::getX('CODPRE','Cpdeftit','Codpre',self::getCodpre());  	

  }	 

}
