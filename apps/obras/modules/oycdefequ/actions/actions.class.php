<?php

/**
 * oycdefequ actions.
 *
 * @package    siga
 * @subpackage oycdefequ
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefequActions extends autooycdefequActions
{
  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=OctipequPeer::getDestipo($this->getRequestParameter('codigo'));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

  protected function deleteOcdefequ($ocdefequ)
  {
  	if (Herramientas::getX_vacio('CodEqu','OCProEqu','CodEqu',$ocdefequ->getCodequ())=='')
    {
    	$ocdefequ->delete();
    }
  }


}
