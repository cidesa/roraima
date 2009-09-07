<?php

/**
 * liemppar actions.
 *
 * @package    Roraima
 * @subpackage liemppar
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class liempparActions extends autoliempparActions
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
    if ($this->liemppar->getId())
    $this->configGrid($this->liemppar->getLireglicId());
    else $this->configGrid($this->getRequestParameter('liemppar[lireglic_id]'));

  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($idLic='')
  {
  	$c = new Criteria();
    $c->add(LiempparPeer::LIREGLIC_ID,$idLic);
    $per = LiempparPeer::doSelect($c);
    $reg=$per;
    $obj= array('codpro' => 1, 'nompro' => 2);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/liemppar/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_empresas');
    $this->columnas[1][0]->setCatalogo('caprovee','sf_admin_edit_form',$obj,'Liemppar_caprovee');

    $this->obj = $this->columnas[0]->getConfig($reg);

    $this->liemppar->setObjempresas($this->obj);
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
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $javascript="";
    switch ($ajax){
      case '1':
       $c= new Criteria();
	   $c->add(LireglicPeer::CODLIC,$codigo);
       $reg=LireglicPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getDeslic();
       	$id=$reg->getId();
       	$dato1=$reg->getLitiplic()->getDestiplic();
       	$dato2=date("d/m/Y",strtotime($reg->getFecreg()));
       }else {
       	$dato="";
       	$id="";
       	$dato1="";
       	$dato2="";
       $javascript="alert('La Licitación no esta Registrada');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["liemppar_destiplic","'.$dato1.'",""],["liemppar_lireglic_id","'.$id.'",""],["liemppar_fecreglic","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
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

      $this->liemppar= $this->getLiempparOrCreate();
      $this->updateLiempparFromRequest();
      $this->configGrid($this->liemppar->getCodlic());

      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

      $encontrado=false;
      foreach($grid[0] as $item){
        if($item->getCodpro()!=""){
          $encontrado=true;
        }
      }
      if (!$encontrado) { $this->coderr = 903; return false;}

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
      $this->liemppar= $this->getLiempparOrCreate();
      $this->updateLiempparFromRequest();
      $this->configGrid();
      $this->liemppar->afterHydrate();
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
  public function saving($liemppar)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Licitacion::salvarEmpresasOfertas($liemppar,$grid);
    return -1;
  }

    /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/liemppar/filters');

    // pager
    $this->pager = new sfPropelPager('Lireglic', 10);
    $c = new Criteria();
    $c->addJoin(LireglicPeer::ID,LiempparPeer::LIREGLIC_ID);
	$c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getLiempparOrCreate($id = 'id', $codlic = 'codlic')
  {
    if (!$this->getRequestParameter($codlic))
    {
      $liemppar = new Liemppar();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(LiempparPeer::CODLIC,$this->getRequestParameter($codlic));
  	  $liemppar = LiempparPeer::doSelectOne($c);

      $this->forward404Unless($liemppar);
    }

    return $liemppar;
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
  public function deleting($liemppar)
  {
    $c= new Criteria();
    $c->add(LiempparPeer::CODLIC,$liemppar->getCodlic());
    LiempparPeer::doDelete($c);

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
    $this->updateError();
    $this->params=array();

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);

      }
    }
    return sfView::SUCCESS;
  }
}
