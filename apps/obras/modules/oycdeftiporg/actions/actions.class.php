<?php

/**
 * oycdeftiporg actions.
 *
 * @package    siga
 * @subpackage oycdeftiporg
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeftiporgActions extends autooycdeftiporgActions
{
  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=OctiporgPeer::getDestiporg(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

  protected function deleteOctiporg($octiporg)
  {
  	if (Herramientas::getX_vacio('codtiporg','ocdeforg','codtiporg',$octiporg->getCodtiporg())=='')
    {
    	$octiporg->delete();
    }
  }
}
