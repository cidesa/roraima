<?php

/**
 * nomperhispre actions.
 *
 * @package    siga
 * @subpackage nomperhispre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomperhispreActions extends autonomperhispreActions
{
  public $coderr =-1;


  public function executeEdit()
  {
    $this->nphispre = $this->getNphispreOrCreate();



    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNphispreFromRequest();

      if($this->saveNphispre($this->nphispre)==-1){
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('nomperhispre/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('nomperhispre/list');
	      }
   	      else
	      {
	        return $this->redirect('nomperhispre/edit?id='.$this->nphispre->getId());
	      }

      }else{
      	$this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');

	  if ($this->getRequestParameter('ajax')=='1')
	    {

	  		$dato=Herramientas::getX('codemp','Nphojint','nomemp',$this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

	  if ($this->getRequestParameter('ajax')=='2')
	    {

	  		$dato=Herramientas::getX('codtippre','Nptippre','destippre',$this->getRequestParameter('codigo'));

            $codemp=$this->getRequestParameter('codemp');
	  		$objNpasiconemp=NominaConceptos::obtenerObjNpasiconemp($this->getRequestParameter('codigo'),$codemp);




	  		if ($objNpasiconemp)
	  		{
	  			$anterior=$objNpasiconemp->getAcumulado();
	  			$cuota=$objNpasiconemp->getCantidad();

	   		}
	  		else{
                $anterior=0.00;
	  			$cuota=0.00;


	  		}

             $cajanterior='nphispre_salant';
             $cajamoncuota='nphispre_moncuota';

	         $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajanterior.'","'.$anterior.'",""],["'.$cajamoncuota.'","'.$cuota.'",""]]';
	    }

	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	  }


  protected function saveNphispre($nphispre)
  {
  	$resp=NominaConceptos::salvarNomperhispre($nphispre);
    if($resp!=-1){
      $this->coderror = $resp;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }
    return $resp;
  }

  protected function deleteNphispre($nphispre)
  {
    $resp=NominaConceptos::borrarNomperhispre($nphispre);
    if($resp!=-1){
      $this->coderror = $resp;
      $err = Herramientas::obtenerMensajeError($this->coderror);
      $this->getRequest()->setError('',$err);
    }
    return $resp;
  }


 public function validateEdit()
  {
  			 $this->params=array();
  			 $this->nphispre = $this->getNphispreOrCreate();
		  $this->updateNphispreFromRequest();
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

		  $resp=NominaConceptos::validarNomperhispre($this->nphispre->getCodtippre(),$this->nphispre->getCodemp());
		  if ($resp!=-1)  {
		  	$this->coderr=$resp;
		  	return false;
		  }
		  else return true;

  	}else return true;

  }

  public function handleErrorEdit()
  {
    $this->preExecute();



    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
     {
	 	if($this->coderr!=-1)
	      {
	       $err = Herramientas::obtenerMensajeError($this->coderr);
	       $this->getRequest()->setError('',$err);
	      }
      }
    return sfView::SUCCESS;
  }

}
