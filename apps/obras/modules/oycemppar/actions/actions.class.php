<?php

/**
 * oycemppar actions.
 *
 * @package    Roraima
 * @subpackage oycemppar
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycempparActions extends autooycempparActions
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
    if ($this->ocemppar->getId())
    $this->configGrid($this->ocemppar->getCodobr());
    else $this->configGrid($this->getRequestParameter('ocemppar[codobr]'));

  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
  {
  	$c = new Criteria();
    $c->add(OcempparPeer::CODOBR,$codigo);
    $per = OcempparPeer::doSelect($c);
    $reg=$per;
    $obj= array('codpro' => 1, 'nompro' => 2);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/oycemppar/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_empresas');
    $this->columnas[1][0]->setCatalogo('caprovee','sf_admin_edit_form',$obj,'Caprovee_Ocoferpre');

    $this->obj = $this->columnas[0]->getConfig($reg);

    $this->ocemppar->setObjempresas($this->obj);
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
	   $c->add(OcregobrPeer::CODOBR,$codigo);
       $reg=OcregobrPeer::doSelectOne($c);
       if ($reg)
       {
       	$dato=$reg->getDesobr();
       	$dato1=$reg->getCodtipobr();
       	$dato4=Herramientas::getX('CODTIPOBR','Octipobr','Destipobr',$dato1);
       	$dato2=date("d/m/Y",strtotime($reg->getFecini()));
       	$dato3=date("d/m/Y",strtotime($reg->getFecfin()));
       	$dato5=number_format($reg->getMonobr(),2,',','.');
       }else {
       $javascript="alert('La Obra no esta Registrada no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["ocemppar_codtipobr","'.$dato1.'",""],["ocemppar_fecini","'.$dato2.'",""],["ocemppar_fecfin","'.$dato3.'",""],["ocemppar_destipobr","'.$dato4.'",""],["ocemppar_monobr","'.$dato5.'",""],["javascript","'.$javascript.'",""]]';
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($ocemppar)
  {
  	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
  	Obras::salvarEmpresasOfertas($ocemppar,$grid);
    return -1;
  }

  public function deleting($ocemppar)
  {
    $c= new Criteria();
    $c->add(OcempparPeer::CODOBR,$ocemppar->getCodpar());
    OcempparPeer::doDelete($c);

    return -1;
  }

    public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/ocemppar/filters');

    // pager
    $this->pager = new sfPropelPager('Ocregobr', 10);
    $c = new Criteria();
    $c->addJoin(OcregobrPeer::CODOBR,OcempparPeer::CODOBR);
	$c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getOcempparOrCreate($id = 'id', $obra = 'obra')
  {
    if (!$this->getRequestParameter($obra))
    {
      $ocemppar = new Ocemppar();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(OcempparPeer::CODOBR,$this->getRequestParameter($obra));
  	  $ocemppar = OcempparPeer::doSelectOne($c);

      $this->forward404Unless($ocemppar);
    }

    return $ocemppar;
  }


}
