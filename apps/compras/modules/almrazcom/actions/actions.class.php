<?php

/**
 * almrazcom actions.
 *
 * @package    siga
 * @subpackage almrazcom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almrazcomActions extends autoalmrazcomActions
{

  private $coderror = -1;
  
  public function executeEdit()
  {

    parent::executeEdit();

  }
   
 
  public function saveCarazcom($Carazcom)
  {
    $coderr = -1;
        
    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::salvarAlmaujoc($caajuoc,$grid);
      
      // OJO ----> Eliminar esta linea al modificar este método
      parent::saveCarazcom($Carazcom);
      
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


  public function deleteCarazcom($Carazcom)
  {
    
    $coderr = -1;
        
    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    
    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
      // $coderr = Compras::EliminarAlmaujoc($caajuoc,$grid);
      
      // OJO ----> Eliminar esta linea al modificar este método
      parent::deleteCarazcom($Carazcom);
      
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
        $this->carazcom= $this->getCarazcomOrCreate();
    
         $carazcom = $this->getRequestParameter('carazcom');
         $resp=Herramientas::ValidarCodigo(str_pad($carazcom['codrazcom'], 4, '0', STR_PAD_LEFT),$this->carazcom,'codrazcom');

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
	
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();
        
    $this->carazcom= $this->getCarazcomOrCreate();
    $this->updateCarazcomFromRequest();    
    
        
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);	    
        $this->getRequest()->setError('',$err);	
      }
    }
    return sfView::SUCCESS;

  }
  
  
	protected function updateCarazcomFromRequest()
	{
		$carazcom = $this->getRequestParameter('carazcom');
	
		if (isset($carazcom['codrazcom']))
		{
		   $this->carazcom->setCodrazcom(str_pad($carazcom['codrazcom'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($carazcom['desrazcom']))
	    {
	        $this->carazcom->setDesrazcom($carazcom['desrazcom']);
	    }
  }	  

}
