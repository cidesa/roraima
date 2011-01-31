<?php

/**
 * nomcodprenom actions.
 *
 * @package    Roraima
 * @subpackage nomcodprenom
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomcodprenomActions extends autonomcodprenomActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npdefcpt/filters');

     // 15    // pager
    $this->pager = new sfPropelPager('Npdefcpt', 15);
    $c = new Criteria();
    $c->addJoin(NpdefcptPeer::CODCON,NpasicodprePeer::CODCON);
	$c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();

  }


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

    if ($this->npdefcpt->getId())
      $this->configGrid($this->npdefcpt->getCodcon());
    else $this->configGrid($this->getRequestParameter('npdefcpt[codcon]'));
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codcon='')
   {
   	$registro=array();

	    $c = new Criteria();
	    $c->add(NpasiconnomPeer::CODCON,$codcon);
	    $c->addAscendingOrderByColumn(NpasiconnomPeer :: CODCON);
	    $npasiconnom =  NpasiconnomPeer::doSelect($c);
	    foreach($npasiconnom as $regconnom)
	    {
	        $aux=	new Npasiconnom();
	    	$aux->setCodcon($regconnom->getCodcon());
	    	$aux->setCodnom($regconnom->getCodnom());
	    	$cri= new Criteria();
	    	$cri->add(NpasicodprePeer::CODCON,$codcon);
	    	$cri->add(NpasicodprePeer::CODNOM,$regconnom->getCodnom());
	    	$regasicodpre =  NpasicodprePeer::doSelectOne($cri);
	    	if ($regasicodpre)
	    	{
              $aux->setCodpre($regasicodpre->getCodpre());
              $aux->setNompar($regasicodpre->getNompar());
	    	}
	    	$registro[] = $aux;
	    }//foreach


    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomcodprenom/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_nominas');
    $objcat= array('codpar' => 3, 'nompar' => 4);
    $this->columnas[1][2]->setCatalogo('Nppartidas','sf_admin_edit_form',$objcat,'Nppartidas_Almregrgo');
    $this->obj = $this->columnas[0]->getConfig($registro);

    $this->npdefcpt->setObjnominas($this->obj);

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
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
         $cajcodcon = 'npdefcpt_codcon';
         $cajnomcon = 'npdefcpt_nomcon';
         $c = new Criteria();
         $c->add(NpdefcptPeer::CODCON,$codigo);

         $datos = NpdefcptPeer::doSelectOne($c);

          if($datos){
		     $nomcon = $datos->getNomcon();
             $output = '[["'.$cajnomcon.'","'.$nomcon.'",""]]';
          }
          else
          {
          	$javascript="alert('Concepto no existe...');";
            $output = '[["'.$cajcodcon.'","",""],["'.$cajnomcon.'","",""],["javascript","'.$javascript.'",""]]';
          }
	       $this->npdefcpt = $this->getNpdefcptOrCreate();
	       $this->npdefcpt->setCodcon($codigo);
	       $this->configGrid($codigo);
	       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
  //  return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.
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
  public function saving($npdefcpt)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Nomina::salvarNomcodprenom($npdefcpt,$grid);
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
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }



  protected function getNpdefcptOrCreate($id = 'id',$codcon='codcon')
  {
    if (!$this->getRequestParameter($codcon))
    {
      $npdefcpt = new Npdefcpt();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpdefcptPeer::CODCON,$this->getRequestParameter($codcon));
  	  $npdefcpt = NpdefcptPeer::doSelectOne($c);


      $this->forward404Unless($npdefcpt);
    }

    return $npdefcpt;
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
    $this->npdefcpt = $this->getNpdefcptOrCreate();
    $this->updateNpdefcptFromRequest();
    $this->configGrid($this->npdefcpt->getCodcon());
	$this->updateError();
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
