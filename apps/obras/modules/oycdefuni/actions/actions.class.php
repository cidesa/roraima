<?php

/**
 * oycdefuni actions.
 *
 * @package    siga
 * @subpackage oycdefuni
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefuniActions extends autooycdefuniActions
{
	protected function updateOcunidadFromRequest()
		{
			$ocunidad = $this->getRequestParameter('ocunidad');

			if (isset($ocunidad['coduni']))
			{
				$this->ocunidad->setCoduni(str_pad($ocunidad['coduni'], 4, '0', STR_PAD_LEFT));
			}
			if (isset($ocunidad['desuni']))
			{
				$this->ocunidad->setDesuni($ocunidad['desuni']);
			}
			if (isset($ocunidad['abruni']))
			{
				$this->ocunidad->setAbruni($ocunidad['abruni']);
			}
		}

	protected function getOcunidadOrCreate($id = 'id')
		{
			if (!$this->getRequestParameter($id))
			{
				$ocunidad = new Ocunidad();
			}
		    else
		    {
		    	$ocunidad = OcunidadPeer::retrieveByPk($this->getRequestParameter($id));

		    	$this->forward404Unless($ocunidad);
		    }
		    return $ocunidad;
		}

  public function executeAjax()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');

	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=OcunidadPeer::getDesuni(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

  protected function deleteOcunidad($ocunidad)
  {
  	if (Herramientas::getX_vacio('coduni','ocdefpar','coduni',$ocunidad->getCoduni())=='')
    {
    	$ocunidad->delete();
    }
  }

}
