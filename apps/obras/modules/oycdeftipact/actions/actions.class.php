<?php

/**
 * oycdeftipact actions.
 *
 * @package    siga
 * @subpackage oycdeftipact
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdeftipactActions extends autooycdeftipactActions
{
  protected function updateOctipactFromRequest()
  {
    $octipact = $this->getRequestParameter('octipact');

    if (isset($octipact['codtipact']))
    {
      $this->octipact->setCodtipact(str_pad($octipact['codtipact'],4,'0',STR_PAD_LEFT));
    }
    if (isset($octipact['destipact']))
    {
      $this->octipact->setDestipact($octipact['destipact']);
    }
  }


  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=OctipactPeer::getDestipact(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

  protected function deleteOctipact($octipact)
  {
   	Obras::Borrar_Octipact($octipact);
  }

}
