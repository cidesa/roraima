<?php

/**
 * nomdefespguarde actions.
 *
 * @package    siga
 * @subpackage nomdefespguarde
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespguardeActions extends autonomdefespguardeActions
{

  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';		 			 	    
	    } 
	   
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	 
 
	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODCON','Npdefcpt','CODCON',$this->getRequestParameter('npguarde[codcon]'));
	    }	   
	}

}
