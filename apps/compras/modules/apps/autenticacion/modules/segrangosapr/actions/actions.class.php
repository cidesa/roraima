<?php

/**
 * segrangosapr actions.
 *
 * @package    Roraima
 * @subpackage segrangosapr
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32375 2009-09-01 16:19:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class segrangosaprActions extends autosegrangosaprActions
{
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript=""; $dato="";

    switch ($ajax){
      case '1':
        $t= new Criteria();
	    $t->add(SegnivaprPeer::CODNIV,$codigo);
	    $data= SegnivaprPeer::doSelectOne($t);
	    if ($data)
	    {
          $dato=$data->getDesniv();
	    }else $javascript="alert('El Nivel de Aprobación no existe'); $('segranapr_codniv').value='';";
	    $output = '[["segranapr_desniv","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

    	$t= new Criteria();
    	$t->add(SegranaprPeer::CODNIV,$this->getRequestParameter('segranapr[codniv]'));
    	$t->add(SegranaprPeer::RANDES,H::tofloat($this->getRequestParameter('segranapr[randes]')));
    	$t->add(SegranaprPeer::RANHAS,H::tofloat($this->getRequestParameter('segranapr[ranhas]')));
    	$resultado= SegranaprPeer::doSelectOne($t);
    	if ($resultado)
    	{
    	  $this->coderr=206;
    	}

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }
}
