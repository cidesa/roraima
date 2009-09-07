<?php

/**
 * licoferpresupuesto actions.
 *
 * @package    Roraima
 * @subpackage licoferpresupuesto
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class licoferpresupuestoActions extends autolicoferpresupuestoActions
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
    if ($this->lioferpre->getId())
    $this->configGrid($this->lioferpre->getCodlic(),$this->lioferpre->getCodpro());
    else $this->configGrid($this->getRequestParameter('lioferpre[codlic]'),$this->getRequestParameter('codpro]'));

  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codLic='',$codpro='')
  {
  	$c = new Criteria();
    $c->add(LioferprePeer::CODLIC,$codLic);
    $c->add(LioferprePeer::CODPRO,$codpro);
    $per = LioferprePeer::doSelect($c);
    $reg=$per;
    $obj= array('codpar' => 1, 'despar' => 2, 'cosuni' => 4);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licoferpresupuesto/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_partidas');
    $this->columnas[1][0]->setCatalogo('ocdefpar','sf_admin_edit_form',$obj,'Ocdefpar_Oycdefemp');

    $this->obj = $this->columnas[0]->getConfig($reg);

    $this->lioferpre->setObjpartidas($this->obj);
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
       $output = '[["lioferpre_deslic","'.$dato.'",""],["lioferpre_destiplic","'.$dato1.'",""],["lioferpre_lireglic_id","'.$id.'",""],["lioferpre_fecreglic","'.$dato2.'",""],["javascript","'.$javascript.'",""]]';
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
       $output = '[["lioferpre_nompro","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->lioferpre =  new Lioferpre();
       $this->lioferpre->setCodlic($codlic);
       $this->lioferpre->setCodpro($codigo);
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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){
      $this->lioferpre= $this->getLioferpreOrCreate();
      $this->updateLioferpreFromRequest();
      $this->configGrid($this->lioferpre->getCodlic(),$this->lioferpre->getCodpro());

      $grid=Herramientas::CargarDatosGridv2($this,$this->obj);

  	  if ($this->lioferpre->getCodpro() and $this->lioferpre->getCodlic())
      {
		  $cri= new Criteria();
		  $cri->add(LiempofePeer::CODPRO,$this->lioferpre->getCodpro());
		  $cri->add(LiempofePeer::CODLIC,$this->lioferpre->getCodlic());
		  $regemp=LiempofePeer::doSelectOne($cri);
		  if (!$regemp) { $this->coderr = 905; return false;}
       }

      $encontrado=false;
      foreach($grid[0] as $item){
        if($item->getCodPar()!=""){
          $encontrado=true;
          if ($item->getMontot()<=0){ $this->coderr = 910; return false;}
        }
      }
      if (!$encontrado) { $this->coderr = 909; return false;}

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
      $this->lioferpre= $this->getLioferpreOrCreate();
      $this->updateLioferpreFromRequest();
      $this->configGrid();
      $this->lioferpre->afterHydrate();
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
  public function saving($lioferpre)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Licitacion::salvarOferPre($lioferpre,$grid);
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
  public function deleting($lioferpre)
  {
    $c= new Criteria();
    $c->add(LioferprePeer::CODLIC,$lioferpre->getCodlic());
    $c->add(LioferprePeer::CODPRO,$lioferpre->getCodpro());
    LioferprePeer::doDelete($c);

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

   /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/lioferpre/filters');

    // pager
    $this->pager = new sfPropelPager('Liempofe', 10);
    $c = new Criteria();
    $c->addJoin(LiempofePeer::LIREGLIC_ID,LioferprePeer::LIREGLIC_ID);
    $c->addJoin(LiempofePeer::CODPRO,LioferprePeer::CODPRO);
	$c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getLioferpreOrCreate($id = 'id', $codlic = 'codlic', $codpro = 'codpro')
  {
    if (!$this->getRequestParameter($codlic))
    {
      $lioferpre = new Lioferpre();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(LioferprePeer::CODLIC,$this->getRequestParameter($codlic));
  	  $c->add(LioferprePeer::CODPRO,$this->getRequestParameter($codpro));
  	  $lioferpre = LioferprePeer::doSelectOne($c);

      $this->forward404Unless($lioferpre);
    }

    return $lioferpre;
  }

}
