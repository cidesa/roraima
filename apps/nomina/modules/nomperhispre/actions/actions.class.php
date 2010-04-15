<?php

/**
 * nomperhispre actions.
 *
 * @package    Roraima
 * @subpackage nomperhispre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomperhispreActions extends autonomperhispreActions
{
  public $coderr =-1;


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
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


  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
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


 
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
