<?php

/**
 * forcreaasiini actions.
 *
 * @package    siga
 * @subpackage forcreaasiini
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class forcreaasiiniActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    //$this->forward('default', 'module');
  	if(SF_ENVIRONMENT=='dev'){
    	$this->ent='_dev';
    }else
    {
    	$this->ent='';
    }
  }

  public function executeCrear()
  {
	try{
			$var=$this->getRequestParameter('ajax');
			$param=$this->getRequestParameter('ajax');
		//	 if ($var=='1')
			// {
				$this->coderr=$coderr=Migracion::Generar('cpasiini',$param);
				//$this->msgerr
			 //}

	} catch (Exception $ex) {

		$coderr = 0;
		$err = Herramientas :: obtenerMensajeError($coderr);
		$this->getRequest()->setError('', $err);
	}
  }


	public function executeAjax()
	{

		if ($this->getRequestParameter('ajax') == '1')
		{
			$c=new Criteria();
			$reg= CpasiiniPeer::doSelectOne($c);

			if ($reg)  //Si tiene Datos
			{
				$datos='1';
			}else{
				$datos='0';
			}
			$output = '[["sw","'.$datos.'",""]]';
			$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			return sfView::HEADER_ONLY;
		}
	}
}
