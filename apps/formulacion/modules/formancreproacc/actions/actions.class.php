<?php

/**
 * formancreproacc actions.
 *
 * @package    siga
 * @subpackage formancreproacc
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
 */
class formancreproaccActions extends sfActions
{


  public function executeIndex()
  {
   // $this->forward('default', 'module');
  }

  public function handleErrorEdit222()
  {
    $this->labels = $this->getLabels();

    //$this->forencpryaccespmet= $this->getForencpryaccespmetOrCreate();
   // $this->updateForencpryaccespmetFromRequest();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }

  public function executeMigrar()
  {
	try{
			$var=$this->getRequestParameter('var');
			 if ($var=='1')
			 {
				$this->coderr=$coderr=Migracion::Generar('fordefpry');
				//$this->msgerr
			 }else	 if ($var=='2')
			 {
				$this->coderr=Migracion::Generar('fordefaccesp');
			 }else	 if ($var=='3')
			 {
				$this->coderr=Migracion::Generar('fordefcatpre');
			 }else	 if ($var=='4')
			 {
				//$this->coderr=Migracion::Generar('fordefparegr');
				$this->coderr="No se ha definido una funcion...";
			 }else	 if ($var=='5')
			 {
				$this->coderr=Migracion::Generar('fordefparegr');

			 }
/*
		if (is_array($this->coderr)) {
			foreach ($this->coderr as $ERR) {
				$err = Herramientas :: obtenerMensajeError($ERR);
				$this->getRequest()->setError('', $err);
				//$this->ActualizarGrid();
			}
		}
		elseif ($this->coderr != -1) {
			$err = Herramientas :: obtenerMensajeError($this->coderr);
			echo $err;
			$this->getRequest()->setError('', $err);
//			$this->ActualizarGrid();
		}*/

	} catch (Exception $ex) {

		//$coderr = 0;
		$err = Herramientas :: obtenerMensajeError($coderr);
		$this->getRequest()->setError('', $err);
	}
  }
}
