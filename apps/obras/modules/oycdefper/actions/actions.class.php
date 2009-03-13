<?php

/**
 * oycdefper actions.
 *
 * @package    siga
 * @subpackage oycdefper
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefperActions extends autooycdefperActions
{
  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=OcdefperPeer::getNomper(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }
	 else if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=OctipcarPeer::getDestipo($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }
	 else if ($this->getRequestParameter('ajax')=='3')
	 {
	 	$dato=OctipproPeer::getDestipo($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

	 }
	 else if ($this->getRequestParameter('ajax')=='4')
	 {
	 	$dato=OctipperPeer::getDestipo($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 }
	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 return sfView::HEADER_ONLY;
  }

  protected function deleteOcdefper($ocdefper)
  {
  	if (Herramientas::getX_vacio('CedPer','OCProPer','CedPer',$ocdefper->getCedper())=='')
  	{
    	$ocdefper->delete();
  	}

  }

}
