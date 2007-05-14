<?php

/**
 * facfueing actions.
 *
 * @package    siga
 * @subpackage facfueing
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facfueingActions extends autofacfueingActions
{
	public function executeEdit()
	  {	   
	  	$this->lista = array();
	    $this->listafrecuencia = Constantes::ListaFrecuencia();
	    parent::executeEdit();
	  }	
}
