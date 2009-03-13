<?php

/**
 * oycdefpro actions.
 *
 * @package    siga
 * @subpackage oycdefpro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefproActions extends autooycdefproActions
{
  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=OctipproPeer::getDestippro(trim($this->getRequestParameter('codigo')));
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
