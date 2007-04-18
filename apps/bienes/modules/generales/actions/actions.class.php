<?php

/**
 * generales actions.
 *
 * @package    siga
 * @subpackage generales
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class generalesActions extends sfActions
{
  
  public function executeLogin()
  {
  	
  	
  }
  
  public function executeCatalogo()
  {
  	
  	$clase = $this->getRequestParameter('clase');
  	if($clase)
  	{
  		$c = new Criteria();
  		$this->registros = array();
  		$this->campos = array();
  		$this->columnas = array();
  		$this->tabla = '';  		
  		$str = '$this->registros = '.$clase.'Peer::doSelect($c);';
  		eval($str);
  		$str = '$this->campos = '.$clase.'Peer::getArrayFieldsNames();';
  		eval($str);
  		$str = '$this->tabla = ucfirst(strtolower('.$clase.'Peer::TABLE_NAME));';
  		eval($str);
  		$str = '$this->columnas = '.$clase.'Peer::getColumsNames();';
  		eval($str);
  	}
  	else return sfView::SUCCESS;
  	
  	
  } 
  
}
