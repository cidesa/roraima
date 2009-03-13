<?php

/**
 * tesretislr actions.
 *
 * @package    siga
 * @subpackage tesretislr
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesretislrActions extends autotesretislrActions
{
	 public function executeAjax()
  {
	$cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
	if ($this->getRequestParameter('ajax')=='1')
	 {
	   $dato=date("d/m/Y",strtotime(TsmovlibPeer::getNumero($this->getRequestParameter('codigo'))));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }

  	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='1')
	{
	  $this->tags=Herramientas::autocompleteAjax('REFLIB','Tsmovlib','Reflib',$this->getRequestParameter('tsentislr[numord]'));
    }
  }
}
