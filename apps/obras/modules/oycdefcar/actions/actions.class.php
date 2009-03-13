<?php

/**
 * oycdefcar actions.
 *
 * @package    siga
 * @subpackage oycdefcar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefcarActions extends autooycdefcarActions
{
  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=OctipcarPeer::getDestipcar(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

  protected function deleteOctipcar($octipcar)
  {
  	if (Herramientas::getX_vacio('CodTipCar','OCDefPer','CodTipCar',$octipcar->getCodtipcar())=='')
    {
    	$octipcar->delete();
    }
  }
}
