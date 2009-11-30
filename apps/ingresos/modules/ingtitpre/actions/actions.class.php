<?php

/**
 * ingtitpre actions.
 *
 * @package    Roraima
 * @subpackage ingtitpre
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32380 2009-09-01 17:11:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingtitpreActions extends autoingtitpreActions
{

  // Para incluir funcionalidades al executeEdit()
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
		$this->setVars();

  }

  public function setVars()
  {

  	$this->mascarapresupuesto = Herramientas::getX('Codemp','Cidefniv','Forpre','001');
  	$this->longpre=strlen($this->mascarapresupuesto);

    }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateCideftitFromRequest()
  {
    $cideftit = $this->getRequestParameter('cideftit');

    if (isset($cideftit['codpre']))
    {
      $this->cideftit->setCodpre($cideftit['codpre']);
    }
    if (isset($cideftit['nompre']))
    {
      $this->cideftit->setNompre($cideftit['nompre']);
    }
    if (isset($cideftit['codcta']))
    {
      $this->cideftit->setCodcta($cideftit['codcta']);
    }

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
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
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $javascript="";
    switch ($ajax){
      case '1':
        $cad=split("-",$codigo);
        $max=count($cad);
        $i=0;
        $seguir=true;
        $cod=$cad[0];

        while ($i<$max-1 and $seguir){
          if (!H::buscarCodigoPadre('codpre','cideftit', $cod))
          {
           $seguir=false;
           $javascript="alert('Código Presupuestario inválido, no se ha definido el nivel anterior');";
    	   break;
          }else{
          	$i++;
          	$cod=$cod."-".$cad[$i];
          }
        }
        $output = '[["javascript","'.$javascript.'",""]]';
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
       break;
       case '2':
        $codigo = $this->getRequestParameter('codigo','');
    	$cajtexmos=$this->getRequestParameter('cajtexmos');
        $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
    	$dato2=ContabbPeer::getCargab($this->getRequestParameter('codigo'));
    	//print($dato2);exit;
    	if ($dato2=='S'){
    		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    	}else{
    		$javascript="alert('El código contable no es cargable');$('cideftit_codcta').value='';";
    		$output = '[["javascript","'.$javascript.'",""]]';
    	}


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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){


      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($cideftit)
  {
    $cad=split("-",$cideftit->getCodpre());
    $max=count($cad);
    $i=0;
    $error=-1;
    $seguir=true;
    $cod=$cad[0];

    while ($i<$max-1 and $seguir){
      if (!H::buscarCodigoPadre('codpre','cideftit', $cod))
      {
           $seguir=false;
           $error=1500;
    	   break;
      }else{
          	$i++;
          	$cod=$cod."-".$cad[$i];
      }
    }
    if ($seguir){
    	$cideftit->save();
    	$c = new Criteria();
    	$c->add(CiasiiniPeer::CODPRE,$cideftit->getCodpre());
    	$asig=CiasiiniPeer::doSelect($c);

      foreach ($asig as $per2){//Modificacion del nombre en la asignacion inicial

		 $per2->setNompre($cideftit->getNompre());
         $per2->save();
      }

    }
    return $error;
  }

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($cideftit)
  {
  	//$error=-1;

	//Verificamos que el codigo presupuestario no tenga movimiento asociados
  	if (Ingresos::movcod($cideftit->getCodpre())==1){
  		$error=1501;
  	}else{
  		$error=-1;
  	}

	//Verificamos que no sea codigo padre
  	if (strlen($cideftit->getCodpre())==$this->longpre){

  		$error=1503;

  	}else{
  		$error=-1;
  	}

	if ($error!=1501 and $error!=1503){
		$cideftit->delete();
	}

    return $error;
  }

}
