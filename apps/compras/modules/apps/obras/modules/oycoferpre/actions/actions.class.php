<?php

/**
 * oycoferpre actions.
 *
 * @package    Roraima
 * @subpackage oycoferpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycoferpreActions extends autooycoferpreActions
{
  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/ocoferpre/filters');

    // pager
    $this->pager = new sfPropelPager('Ocemppar', 10);
    $c = new Criteria();
    $c->addJoin(OcempparPeer::CODPRO,OcoferprePeer::CODPRO);
    $c->addJoin(OcempparPeer::CODOBR,OcoferprePeer::CODOBR);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

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
    if ($this->ocoferpre->getId())
    $this->configGrid2($this->ocoferpre->getCodobr(),$this->ocoferpre->getCodpro());
    else $this->configGrid($this->getRequestParameter('ocoferpre[codobr]'));
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2($codigoobr='',$codpro='')
  {
    $c = new Criteria();
  	$c->add(OcoferprePeer::CODOBR,$codigoobr);
  	$c->add(OcoferprePeer::CODPRO,$codpro);
  	$obraspartidas = OcoferprePeer::doSelect($c);
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/oycoferpre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_partidas_con',$obraspartidas);

    $this->ocoferpre->setObjpartidas($this->obj);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigoobr='')
  {
    $c = new Criteria();
  	$c->add(OcpreobrPeer::CODOBR,$codigoobr);
  	$obraspartidas = OcpreobrPeer::doSelect($c);
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/oycoferpre/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_partidas',$obraspartidas);

    $this->ocoferpre->setObjpartidas($this->obj);
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
    $dato="";
    switch ($ajax){
      case '1':
       $c= new Criteria();
	   $c->add(OcempparPeer::CODPRO,$codigo);
       $reg=OcempparPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getNompro();
       }else {
       $javascript="alert('El Contratista no existe como Empresa Ofertante');";
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
      case '2':
       $c= new Criteria();
	   $c->add(OcregobrPeer::CODOBR,$codigo);
       $reg=OcregobrPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getDesobr();
       	$this->ocoferpre=$this->getOcoferpreOrCreate();
       	$this->configGrid($codigo);
       }else {
       $javascript="alert('La Obra no esta registrada');";
       }

       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {

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
  public function saving($ocoferpre)
  {
   $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Obras::salvarPresupEmp($ocoferpre,$grid);
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
  public function deleting($ocoferpre)
  {
    $c= new Criteria();
    $c->add(OcoferprePeer::CODPRO,$ocoferpre->getCodpro());
    $c->add(OcoferprePeer::CODOBR,$ocoferpre->getCodobr());
    OcoferprePeer::doDelete($c);

    return -1;
  }

  protected function getOcoferpreOrCreate($id = 'id', $contratista='contratista', $obra='obra')
  {
    if (!$this->getRequestParameter($contratista))
    {
      $ocoferpre = new Ocoferpre();
    }
    else
    {
      //$ocoferpre = OcoferprePeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
  	  $c->add(OcoferprePeer::CODPRO,$this->getRequestParameter($contratista));
  	  $c->add(OcoferprePeer::CODOBR,$this->getRequestParameter($obra));
  	  $ocoferpre = OcoferprePeer::doSelectOne($c);

      $this->forward404Unless($ocoferpre);
    }

    return $ocoferpre;
  }


}
