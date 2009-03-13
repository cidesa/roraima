<?php

/**
 * oycdefrec actions.
 *
 * @package    siga
 * @subpackage oycdefrec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefrecActions extends autooycdefrecActions
{

  protected function deleteCarecaud($carecaud)
  {
  	$resp = Obras::eliminarCarecaud($carecaud);
    if($resp==-1){
      $this->coderror = $resp;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }

  }

  protected function saveCarecaud($carecaud)
  {
	$carecaud->save();
  }

  protected function getCarecaudOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $carecaud = new Carecaud();

    }
    else
    {
      $carecaud = CarecaudPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($carecaud);
    }

    return $carecaud;
  }

  protected function updateCarecaudFromRequest()
  {
    $carecaud = $this->getRequestParameter('carecaud');

    if (isset($carecaud['codrec']))
    {
      $this->carecaud->setCodrec($carecaud['codrec']);
    }
    if (isset($carecaud['desrec']))
    {
      $this->carecaud->setDesrec($carecaud['desrec']);
    }
    if (isset($carecaud['limrec']))
    {
      $this->carecaud->setLimrec($carecaud['limrec']);
    }
    if (isset($carecaud['canutr']))
    {
      $this->carecaud->setCanutr($carecaud['canutr']);
    }
    if (isset($carecaud['codtiprec']))
    {
      $this->carecaud->setCodtiprec($carecaud['codtiprec']);
    }
    if (isset($carecaud['destiprec']))
    {
      $this->carecaud->setDestiprec($carecaud['destiprec']);
    }
  }

    public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
	  		$dato=CatiprecPeer::getDestip($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}


}
