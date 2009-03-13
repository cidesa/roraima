<?php

/**
 * nomdefespvar actions.
 *
 * @package    siga
 * @subpackage nomdefespvar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespvarActions extends autonomdefespvarActions
{
  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));	  			 
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';		 			 	    
	    } 
	   
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	}	 
 
	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npdefvar[codnom]'));
	    }	  	   
	}
}
