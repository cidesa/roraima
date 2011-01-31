<?php

/**
 * nomjorlabind actions.
 *
 * @package    Roraima
 * @subpackage nomjorlabind
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomjorlabindActions extends autonomjorlabindActions
{

 /* private $coderror = -1;
  
  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {

    parent::executeEdit();

  }*/
  
  
  
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
	  		$dato=NphojintPeer::getNomemp($this->getRequestParameter('codigo'));	  			 
			$dato2=NphojintPeer::getCodnom($this->getRequestParameter('codigo'));	  			 
	  		$dato3=NphojintPeer::getNomcar($this->getRequestParameter('codigo'));	  			 
			
	  		if ($dato2== '<!Registro no Encontrado o Vacio!>' )
	  		{
	  			$dato2='Este empleado no esta asociado a una nomina';
	  			}
	  		if ($dato3== '<!Registro no Encontrado o Vacio!>')
	  		{
	  			$dato3='Este empleado no esta asociado a un cargo';
	  			}
	  		 
	  		
	  		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["npempjorlab_codnom","'.$dato2.'",""],["npempjorlab_nomcar","'.$dato3.'",""]]';		 			 	    
			//$output = '[["npempjorlab_nomemp","a",""]]';
  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')'); 
	    return sfView::HEADER_ONLY;
	  		
	    } 
	  else if ($this->getRequestParameter('ajax')=='2')
	    {//ojo esto aqui aun no funciona viernes 24
	  		$idejor=$this->getRequestParameter('codigo');	  	
	  		$nomina=$this->getRequestParameter('nom');			 
			$this->l=NpdefjorlabPeer::getLunes($idejor,$nomina);
			$this->m=NpdefjorlabPeer::getMartes($idejor,$nomina);
			$this->i=NpdefjorlabPeer::getMiercoles($idejor,$nomina);
			$this->j=NpdefjorlabPeer::getJueves($idejor,$nomina);
			$this->v=NpdefjorlabPeer::getViernes($idejor,$nomina);
			$this->s=NpdefjorlabPeer::getSabado($idejor,$nomina);
			$this->d=NpdefjorlabPeer::getDomingo($idejor,$nomina);
	  		//$output = '[["'.$cajtexmos.'","'.$dato.'",""],["npempjorlab_codemp","'.$l.'",""],["npempjorlab_martes","'.$m.'",""],["npempjorlab_miercoles","'.$i.'",""],["npempjorlab_jueves","'.$j.'",""],["npempjorlab_viernes","'.$v.'",""],["npempjorlab_sabado","'.$s.'",""],["npempjorlab_domingo","'.$d.'",""]]';		 			 	    
			//$output = '[["npempjorlab_nomemp","a",""]]';

	    } 
	   
	}	 
 

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODEMP','Nphojint','CODEMP',$this->getRequestParameter('npempjorlab[codemp]'));
	    }	  
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
	    	$datox=$this->getRequestParameter('x');
	    	$datico=$this->getRequestParameter('npempjorlab[idejor]');
	     $sql="select idejor from npdefjorlab where codnom='".$datox."'
               and idejor like '".$datico."%' ";
	     if (Herramientas::BuscarDatos($sql,&$result))
	     {
	     	$arr=array();
	     	
	     	foreach ($result as $resultico)
	     	{$arr[]=$resultico["idejor"];
	     	}
	     	$this->tags=$arr;
	     }
	    }
	}
	

 /* /**
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
  public function saveNpempjorlab($Npempjorlab)
  {
    $coderr = -1;
        
    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);
      
      // OJO ----> Eliminar esta linea al modificar este método
      parent::saveNpempjorlab($Npempjorlab);
      
     if(is_array($coderr)){
        foreach ($coderror as $ERR){
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


  public function deleteNpempjorlab($Npempjorlab)
  {
    
    $coderr = -1;
        
    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);
      
      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteNpempjorlab($Npempjorlab);
      
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

      // $this->caajuoc = $this->getCaajuocOrCreate();
      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      
      
      
      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en 
      // el archivo errors.yml en la función handleErrorEdit()

      if($resp!=-1){
        $this->coderror = $resp; 
        return false;
      } else return true;

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
        
    $this->Npempjorlab= $this->getNpempjorlabOrCreate();
    $this->updateNpempjorlabFromRequest();    
    
        
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
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *  

  public function ActualizarGrid()
  {
    $this->configGrid();
      
    $grid = Herramientas::CargarDatosGrid($this,$this->obj);
    
    $this->configGrid($grid[0],$grid[1]);
    
  }*/

	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpempjorlabFromRequest()
  {
    $npempjorlab = $this->getRequestParameter('npempjorlab');

    if (isset($npempjorlab['codemp']))
    {
      $this->npempjorlab->setCodemp($npempjorlab['codemp']);
    }
    if (isset($npempjorlab['codnom']))
    {
      $this->npempjorlab->setCodnom($npempjorlab['codnom']);
    }
    if (isset($npempjorlab['idejor']))
    {
      $this->npempjorlab->setIdejor($npempjorlab['idejor']);
    }
  }
	
}
