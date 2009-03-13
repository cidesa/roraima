<?php

/**
 * biedefclafun actions.
 *
 * @package    siga
 * @subpackage biedefclafun
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefclafunActions extends autobiedefclafunActions
{

  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=BnclafunPeer::getDescla_ajax(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags="";
	    }
	}

	protected function updateBnclafunFromRequest()
	{
		$bnclafun = $this->getRequestParameter('bnclafun');

		if (isset($bnclafun['codcla']))
    {
      $this->bnclafun->setCodcla(str_pad($bnclafun['codcla'],3,'0',STR_PAD_LEFT));
    }
    if (isset($bnclafun['descla']))
    {
      $this->bnclafun->setDescla($bnclafun['descla']);
    }
  }

}
