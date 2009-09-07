<?php

/**
 * biecatact actions.
 *
 * @package    Roraima
 * @subpackage biecatact
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class biecatactActions extends autobiecatactActions
{

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->setVars();
    parent::executeEdit();
  }

  public function setVars()
  {
    $this->foract = Herramientas::ObtenerFormato('Bndefins','foract');
    $this->lonact=strlen($this->foract);
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
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=BndefactPeer::getDesact(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
  }

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags="";
	    }
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
    $this->bndefact = $this->getBndefactOrCreate();
    $this->updateBndefactFromRequest();
    $this->setVars();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
