<?php

/**
 * oycdefesp actions.
 *
 * @package    siga
 * @subpackage oycdefesp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefespActions extends autooycdefespActions
{
  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=OctipespPeer::getDestipesp(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

  protected function deleteOctipesp($octipesp)
  {
  	if (Herramientas::getX_vacio('CodTipEsp','OCPROESP','CodTipEsp',$octipesp->getCodtipesp())=='')
    {
    	$octipesp->delete();
    }
  }
}

