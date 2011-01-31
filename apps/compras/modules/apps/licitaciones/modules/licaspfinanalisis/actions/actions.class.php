<?php

/**
 * licasptecanalisis actions.
 *
 * @package    Roraima
 * @subpackage licasptecanalisis
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class licaspfinanalisisActions extends autolicaspfinanalisisActions
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
    if ($this->liaspfinanalis->getId())
      $this->configGrid($this->liaspfinanalis->getCodlic(),$this->liaspfinanalis->getCodpro() );
    else $this->configGrid($this->getRequestParameter('liaspfinanalis[codlic]'),$this->getRequestParameter('liaspfinanalis[codpro]'));

  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codlic,$codpro)
   {
    $c = new Criteria();
    $c->add(LiaspfinanalisPeer::CODLIC,$codlic);
    $c->add(LiaspfinanalisPeer::CODPRO,$codpro);
    $regcriteriosoferentes =  LiaspfinanalisPeer::doSelect($c);;

    $regfinal = array();

    $c = new Criteria();
    $c->addAscendingOrderByColumn(LiaspfincrievaPeer :: CODCRI);
    $regcriterios = LiaspfincrievaPeer::doSelect($c);

    if($regcriterios){
      foreach($regcriterios as $rec){
        $idcriterio = $rec->getId();
        $encontrado=false;
        $id="";
        if($regcriteriosoferentes){
          foreach($regcriteriosoferentes as $r){
            if($r->getLiaspfincrievaId()==$idcriterio){
              $encontrado=true;
              $id=$r->getId();
            }
          }
        }

        if($id!=''){
          $regaxu = LiaspfinanalisPeer::retrieveByPK($id);
          $regaxu->setSeleccionado(true);
        }else{
          $regaxu = new Liaspfinanalis();
          $regaxu->setLiaspfincrievaId($idcriterio);
          $regaxu->setCodlic($codlic);
          $regaxu->setCodpro($codpro);
          $regaxu->afterHydrate();
        }

        $regfinal[] = $regaxu;
      }
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licaspfinanalisis/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_criterios');
    $this->columnas[1][4]->setHTML('onBlur=javascript: ValidarMontoGridv2(this); ValidarPuntaje(this.id); ');
    $this->obj = $this->columnas[0]->getConfig($regfinal);
    $this->liaspfinanalis->setObjcriterios($this->obj);
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
    $javascript="";
    switch ($ajax){
      case '1':
       $c= new Criteria();
	   $c->add(LireglicPeer::CODLIC,$codigo);
       $reg=LireglicPeer::doSelectOne($c);
       if ($reg)
       {
       	$cri= new Criteria();
	    $cri->add(LiempofePeer::CODLIC,$codigo);
        $regemp=LiempofePeer::doSelectOne($cri);
		if ($regemp)
        {
	       	$dato=$reg->getDeslic();
	       	$id=$reg->getId();
	       	$dato1=$reg->getLitiplic()->getDestiplic();
	       	$dato2=date("d/m/Y",strtotime($reg->getFecreg()));
        }
        else//la licitacion no tiene empresas participantes asociadas
        {
        	$dato="";
         	$id="";
        	$dato1="";
        	$dato2="";
            $javascript="alert('La Licitación no tiene empresas oferentes registradas');";
        }
       }else {
       	$dato="";
       	$id="";
       	$dato1="";
       	$dato2="";
        $javascript="alert('La Licitación no esta Registrada');";
       }
       $output = '[["liaspfinanalis_deslic","'.$dato.'",""],["liaspfinanalis_destiplic","'.$dato1.'",""],["liaspfinanalis_lireglic_id","'.$id.'",""],["liaspfinanalis_fecreglic","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
       break;
     case '2':
      $codlic = $this->getRequestParameter('codlic','');
      if ($codlic=='')
      {
        $dato="";
        $javascript="alert('Primero debe seleccionar el Código de la Licitación');";
      }
      else
      {
       $c= new Criteria();
	   $c->add(CaproveePeer::CODPRO,$codigo);
       $reg=CaproveePeer::doSelectOne($c);
       if ($reg)
       {
       	$cri= new Criteria();
	    $cri->add(LiempofePeer::CODPRO,$codigo);
	    $cri->add(LiempofePeer::CODLIC,$codlic);
        $regemp=LiempofePeer::doSelectOne($cri);
		if ($regemp)
        {
	       	$dato=$reg->getNompro();
	       	$javascript="";
        }
        else//la licitacion no tiene empresas participantes asociadas
        {
        	$dato="";
            $javascript="alert('Esta empresa no es oferente para la Licitación Seleccionada');";
        }
       }else {
       	$dato="";
        $javascript="alert('La Empresa no esta Registrada');";
       }
      }// if ($codlic=='')
       $output = '[["liaspfinanalis_nompro","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->liaspfinanalis =  new Liaspfinanalis();
       $this->liaspfinanalis->setCodlic($codlic);
       $this->liaspfinanalis->setCodpro($codigo);
       $this->configGrid($codlic, $codigo);
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       break;

     default:
        $output = '[["","",""],["","",""],["","",""]]';
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

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->liaspfinanalis= $this->getLiaspfinanalisOrCreate();
      $this->updateLiaspfinanalisFromRequest();
      $this->configGrid($this->liaspfinanalis->getCodlic(), $this->liaspfinanalis->getCodpro());

      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

      if ($this->liaspfinanalis->getCodpro() and $this->liaspfinanalis->getCodlic())
      {
		  $cri= new Criteria();
		  $cri->add(LiempofePeer::CODPRO,$this->liaspfinanalis->getCodpro());
		  $cri->add(LiempofePeer::CODLIC,$this->liaspfinanalis->getCodlic());
		  $regemp=LiempofePeer::doSelectOne($cri);
		  if (!$regemp) { $this->coderr = 905; return false;}
      }
      $oferente=false;
      foreach($grid[0] as $item){
        if($item->getSeleccionado()){
          $oferente=true;
          if ($item->getPuntaje()<=0){ $this->coderr = 906; return false;}
        }
      }
      if (!$oferente) { $this->coderr = 907; return false;}

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
      $this->liaspfinanalis= $this->getLiaspfinanalisOrCreate();
      $this->updateLiaspfinanalisFromRequest();
      $this->configGrid($this->liaspfinanalis->getCodlic(), $this->liaspfinanalis->getCodpro());
      $this->liaspfinanalis->afterHydrate();

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
  public function saving($liaspfinanalis)
  {
    $grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Licitacion::salvarEmpresasCriteriosFinancieros($liaspfinanalis,$grid);
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/liaspfinanalis/filters');

    // pager
    $this->pager = new sfPropelPager('Liempofe', 10);
    $c = new Criteria();
    $c->addJoin(LiempofePeer::LIREGLIC_ID,LiaspfinanalisPeer::LIREGLIC_ID);
    $c->addJoin(LiempofePeer::CODPRO,LiaspfinanalisPeer::CODPRO);
	$c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getLiaspfinanalisOrCreate($id = 'id', $codlic = 'codlic', $codpro = 'codpro')
  {
    if (!$this->getRequestParameter($codlic))
    {
      $liaspfinanalis = new Liaspfinanalis();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(LiaspfinanalisPeer::CODLIC,$this->getRequestParameter($codlic));
  	  $c->add(LiaspfinanalisPeer::CODPRO,$this->getRequestParameter($codpro));
  	  $liaspfinanalis = LiaspfinanalisPeer::doSelectOne($c);

      $this->forward404Unless($liaspfinanalis);
    }

    return $liaspfinanalis;
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
  public function deleting($liaspfinanalis)
  {
    $c= new Criteria();
    $c->add(LiaspfinanalisPeer::CODLIC,$liaspfinanalis->getCodlic());
    $c->add(LiaspfinanalisPeer::CODPRO,$liaspfinanalis->getCodpro());
    LiaspfinanalisPeer::doDelete($c);

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
