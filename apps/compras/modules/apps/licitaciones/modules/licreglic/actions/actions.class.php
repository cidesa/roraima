<?php

/**
 * licreglic actions.
 *
 * @package    Roraima
 * @subpackage licreglic
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class licreglicActions extends autolicreglicActions
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
    if (!$this->lireglic->getId())
    {$this->configGrid($this->getRequestParameter('lireglic[codlic]'));}
    else { $this->configGrid($this->lireglic->getCodlic());}


  }

 /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigolic='')
  {
    $c = new Criteria();
  	$c->add(LilichisPeer::CODLIC,$codigolic);
  	$lichist = LilichisPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licreglic/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_historial');

    $this->columnas[1][4]->setCombo(Constantes::ListaMeses());

    $this->obj = $this->columnas[0]->getConfig($lichist);

    $this->lireglic->setObjhistorial($this->obj);
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
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    switch ($ajax){
     case '1':
         $num = 'lireglic_numsol';
         $des = 'lireglic_dessol';
         $id = 'lireglic_liregsol_id';
         $coduni = 'lireglic_coduniste';
         $desuni = 'lireglic_desuniste';
         $c = new Criteria();
         $c->add(LiregsolPeer::NUMSOL,$codigo);

          $solici = LiregsolPeer::doSelectOne($c);

          if($solici){
        	$lidatste = $solici->getLidatste();
		    if($lidatste)
		    {
		      $coduniste = $lidatste->getCoduniste();
		      $desuniste = $lidatste->getDesuniste();
		    }
            $output = '[["'.$num.'","'.$solici->getNumsol().'",""],["'.$id.'","'.$solici->getId().'",""],["'.$des.'","'.$solici->getDessol().'",""],["'.$coduni.'","'.$coduniste.'",""],["'.$desuni.'","'.$desuniste.'",""]]';
          }else{
            $output = '[["'.$num.'","'.H::REGVACIO.'",""],["'.$id.'","",""],["'.$des.'","",""],["'.$coduni.'","",""],["'.$desuni.'","",""]]';
          }
        break;
      case '2':
         $dato=Herramientas::getX('codfin','Fortipfin','nomext',$codigo);
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;
      case '3':
         $dato=Herramientas::getX('codclacomp','Occlacomp','desclacomp',$codigo);
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
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

      $this->lireglic= $this->getLireglicOrCreate();
      $this->updateLireglicFromRequest();
      $this->configGrid($this->lireglic->getCodlic());
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

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
      $this->lireglic= $this->getLireglicOrCreate();
      $this->updateLireglicFromRequest();
      $this->configGrid($this->lireglic->getCodlic());
     $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
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
  public function saving($lireglic)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
    Licitacion::salvarLicitacion($lireglic,$grid);
    return -1;
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
  public function deleting($lireglic)
  {
  	$c= new Criteria();
  	$c->add(OclichisPeer::CODLIC,$lireglic->getCodlic());
  	OclichisPeer::doDelete($c);

  	$lireglic->delete();

    return -1;
  }
  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->lireglic = $this->getLireglicOrCreate();
    $this->updateLireglicFromRequest();
      $this->configGrid($this->lireglic->getCodlic());
      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
        $this->updateError();
      }
    }
    return sfView::SUCCESS;
  }

}
