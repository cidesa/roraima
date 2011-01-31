<?php

/**
 * farecarg actions.
 *
 * @package    Roraima
 * @subpackage farecarg
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class farecargActions extends autofarecargActions
{

  private $coderror = -1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {

    parent::executeEdit();
	    $this->farecarg = $this->getFarecargOrCreate();
	    $this->setVars();

  }


   public function setVars()
	{
	   $c = new Criteria();
      $dato= CadefartPeer::doSelectOne($c);
      if ($dato)
          $this->tipoformato=$dato->getAsiparrec();
      else
          $this->tipoformato="";
	  $this->mascarapresupuestaria = Herramientas::Obtener_FormatoPresupuesto();
	  $this->longpre=strlen($this->mascarapresupuestaria);
	  $this->mascaracontabilidad = Herramientas::ObtenerFormato('Contaba','Forcta');
	  $this->longcon=strlen($this->mascaracontabilidad);
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
	  		$dato=CpdeftitPeer::getDestit($this->getRequestParameter('codigo'));
            //$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","","c"]]';
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
	  		$dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODPRE','Cpdeftit','codpre',$this->getRequestParameter('farecarg[codpre]'));
	    }
	    else  if ($this->getRequestParameter('ajax')=='2')
	    {
	    	$this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',$this->getRequestParameter('farecarg[descta]'));
	    }
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
  public function saveFarecarg($Farecarg)
  {
    $coderr = -1;

    try {

      parent::saveFarecarg($Farecarg);

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }

    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }


  public function deleteFarecarg($Farecarg)
  {

    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);

      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteFarecarg($Farecarg);

      if(is_array($coderr)){
        foreach ($coderror as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderror);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }


    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderror);
      $this->getRequest()->setError('',$err);

    }

  }

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $resp=-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

       //Para que el codigo no se pueda cambiar al editar el registro:
       $this->farecarg= $this->getFarecargOrCreate();
       $farecarg = $this->getRequestParameter('farecarg');
       $valor = $farecarg['codrgo'];
       $campo='codrgo';

       $resp=Herramientas::ValidarCodigo($valor,$this->farecarg,$campo);

      if($resp!=-1)
      {
        $this->coderror = $resp;
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
    $this->labels = $this->getLabels();

    $this->farecarg= $this->getFarecargOrCreate();
    $this->updateFarecargFromRequest();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }

	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFarecargFromRequest()
	  {
	    $farecarg = $this->getRequestParameter('farecarg');
	    $this->setVars();

	    if (isset($farecarg['codrgo']))
	    {
	      $this->farecarg->setCodrgo($farecarg['codrgo']);
	    }
	    if (isset($farecarg['nomrgo']))
	    {
	      $this->farecarg->setNomrgo($farecarg['nomrgo']);
	    }
	    if (isset($farecarg['tiprgo']))
	    {
	      $this->farecarg->setTiprgo($farecarg['tiprgo']);
	    }
	    if (isset($farecarg['monrgo']))
	    {
	      $this->farecarg->setMonrgo($farecarg['monrgo']);
	    }
	    if (isset($farecarg['codpre']))
	    {
	      $this->farecarg->setCodpre($farecarg['codpre']);
	    }
	    if (isset($farecarg['nompre']))
	    {
	      $this->farecarg->setNompre($farecarg['nompre']);
	    }
	    if (isset($farecarg['codcta']))
	    {
	      $this->farecarg->setCodcta($farecarg['codcta']);
	    }
	    if (isset($farecarg['descta']))
	    {
	      $this->farecarg->setDescta($farecarg['descta']);
	    }
	  }

}
