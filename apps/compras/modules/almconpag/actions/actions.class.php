<?php

/**
 * almconpag actions.
 *
 * @package    Roraima
 * @subpackage almconpag
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almconpagActions extends autoalmconpagActions
{
   private $coderror = -1;
   
   
	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCaconpagFromRequest()
	{
		$caconpag = $this->getRequestParameter('caconpag');
	
		if (isset($caconpag['codconpag']))
		{
		  $this->caconpag->setCodconpag(str_pad($caconpag['codconpag'], 4, '0', STR_PAD_LEFT));
	    }
	    if (isset($caconpag['desconpag']))
	    {
	      $this->caconpag->setDesconpag($caconpag['desconpag']);
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

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->caconpag = $this->getCaconpagOrCreate();    
      $caconpag = $this->getRequestParameter('caconpag');
      $valor = $caconpag['codconpag'];
      $campo='codconpag';

      $resp=Herramientas::ValidarCodigo($valor,$this->caconpag,$campo);

      if($resp!=-1)
      {
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
        
     $this->caconpag = $this->getCaconpagOrCreate();
     $this->updateCaconpagFromRequest();    
          
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1)
      {
        $err = Herramientas::obtenerMensajeError($this->coderror);	    
        $this->getRequest()->setError('',$err);	
      }
    }
    return sfView::SUCCESS;
  }
	
}
