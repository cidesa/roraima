<?php

/**
 * Facranpaginm actions.
 *
 * @package    Roraima
 * @subpackage Facranpaginm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FacranpaginmActions extends autoFacranpaginmActions
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
    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fcranpaginm/filters');
     // 15    // pager
    $this->pager = new sfPropelPager('Fcvalinm', 15);
    $c = new Criteria();
	    $c->addSelectColumn(FcvalinmPeer::CODZON);
	    $c->addSelectColumn(FcvalinmPeer::DESZON);
	    $c->addSelectColumn("0 AS CODTIP");
	    $c->addSelectColumn("0 AS VALMTR");
	    $c->addSelectColumn("0 AS VALFIS");
	    $c->addSelectColumn("0 AS ALITIP");
	    $c->addSelectColumn("0 AS ANUAL");
	    $c->addSelectColumn("0 AS ALITIPT");
	    $c->addSelectColumn("0 AS ANUALT");
	    $c->addSelectColumn("0 AS ANOVIG");
	    $c->addSelectColumn("0 AS PORVALFIS");
	    $c->addSelectColumn("0 AS ID");
	    $c->addGroupByColumn(FcvalinmPeer::CODZON);
	    $c->addGroupByColumn(FcvalinmPeer::DESZON);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $id=Herramientas::getX_vacio('codzon','Fcvalinm','id',trim($this->getRequestParameter('codzon')));
    /* $this->fcvalinm = FcvalinmPeer::retrieveByPk($this->getRequestParameter('id'));
    exit("hhhhhhhhhh ".$this->fcvalinm->getId());*/
    //print $this->getRequestParameter('codzon')."///".$this->fcvalinm->getId();
    /*$this->forward404Unless($this->fcvalinm);*/

    try
    {
      $c = new Criteria();
      $c->add(FcvalinmPeer::CODZON,$this->getRequestParameter('codzon'));
      FcvalinmPeer::doDelete($c);
      //$id= $this->fcvalinm->getId();
      $this->SalvarBitacora($id ,'Elimino');

    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'No se puede eliminar porque tiene registros asociados.');
      return $this->forward('facranpaginm', 'list');
    }
    return $this->forward('facranpaginm', 'list');
   }

  protected function getFcvalinmOrCreate($id = 'id', $codzon = 'codzon')
  {
    if (!$this->getRequestParameter($codzon))
    {
      $fcvalinm = new Fcvalinm();
    }
    else
	    {
	    	$fcvalinm_valor = $this->getRequestParameter('fcvalinm');
	    	if ($this->getRequestParameter($codzon)=="")
	    	    $cod_zona=$fcvalinm_valor['codzon'];
	    	else
	    	    $cod_zona=$this->getRequestParameter($codzon);
	    	$id=Herramientas::getX_vacio('codzon','Fcvalinm','id',trim($cod_zona));
            $fcvalinm = FcvalinmPeer::retrieveByPk($id);
	        $this->forward404Unless($fcvalinm);
	    }
	    return $fcvalinm;
  }


  // Para incluir funcionalidades al executeEdit()
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
		$this->configGrid();
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
  public function deleting($fcvalinm)
  {
   if ($fcvalinm->getId()!="")
   {
	$c = new Criteria();
	$c->add(FcvalinmPeer::CODZON,$fcvalinm->getCodzon());
	FcvalinmPeer::doDelete($c);
    $fcvalinm->delete();
    return -1;
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
    $c = new Criteria();
    $c->add(FcvalinmPeer::CODZON,$this->fcvalinm->getCodzon());
    $c->addDescendingOrderByColumn(FcvalinmPeer::DESZON);
    $per = FcvalinmPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facranpaginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcvalinm->setGrid($this->grid);
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
    $ajax   = $this->getRequestParameter('ajax','');
    $numper="";
    $denumper="";
    $numvic="";
    $nivinm="";
    $nomext1="";
    $nomabr1="";
    $tamano1="1";
    $nomext2="";
    $nomabr2="";
    $tamano2="1";
    $nomext3="";
    $nomabr3="";
    $tamano3="1";
    $nomext4="";
    $nomabr4="";
    $tamano4="1";
    $nomext5="";
    $nomabr5="";
    $tamano5="1";
    $nomext6="";
    $nomabr6="";
    $tamano6="1";
    $nomext7="";
    $nomabr7="";
    $tamano7="1";
    $nomext8="";
    $nomabr8="";
    $tamano8="1";
    $nomext9="";
    $nomabr9="";
    $tamano9="1";
    $nomext10="";
    $nomabr10="";
    $tamano10="1";

	$parr = substr($codigo,0,4);
	$mun = substr($codigo,5,4);
	$est = substr($codigo,10,4);
	$pais = substr($codigo,15,4);

    switch ($ajax){
      case '1':
        $result=array();
        $sql = "Select " .
        		"numper,denumper,numniv,nivinm," .
        		"nomext1,nomabr1,tamano1," .
        		"nomext2,nomabr2,tamano2," .
        		"nomext3,nomabr3,tamano3," .
        		"nomext4,nomabr4,tamano4," .
        		"nomext5,nomabr5,tamano5," .
        		"nomext6,nomabr6,tamano6," .
        		"nomext7,nomabr7,tamano7," .
        		"nomext8,nomabr8,tamano8," .
        		"nomext9,nomabr9,tamano9," .
        		"nomext10,nomabr10,tamano10 " .
        		"from FCDEFNCA where ( CodPar='".$parr."' AND CodMun='".$mun."' AND CodEdo='".$est."'  AND CodPai='".$pais."')";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $numper=$result[0]['numper'];
          $denumper=$result[0]['denumper'];
        }
        $output = '[["fcdefnca_nomext1","'.$nomext1.'",""],' .
        		  '["fcdefnca_nivinm","'.$nivinm.'",""]]';
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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGrid($this,$this->obj);
    $this->configGrid($grid[0],$grid[1]);

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
  public function saving($fcvalinm)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Hacienda::salvar_grid_Fcranpaginm($fcvalinm, $grid);
    return -1;
  }



  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->params=array();
    $this->fcvalinm = $this->getFcvalinmOrCreate();

    $this->editing();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFcvalinmFromRequest();

      if($this->saveFcvalinm($this->fcvalinm) ==-1){
        {$this->setFlash('notice', 'Your modifications have been saved');

         $id_buscado=Herramientas::getX_vacio('codzon','Fcvalinm','id',trim($this->fcvalinm->getCodzon()));
		 $id= $this->fcvalinm->getId();
         $this->SalvarBitacora($id ,'Guardo');}

        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('facranpaginm/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('facranpaginm/list');
        }
        else
        {
            return $this->redirect('facranpaginm/edit?id='.$id_buscado.'&codzon='.$this->fcvalinm->getCodzon());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


}
