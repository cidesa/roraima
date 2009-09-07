<?php

/**
 * asignarpartidasconceptos actions.
 *
 * @package    Roraima
 * @subpackage asignarpartidasconceptos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class asignarpartidasconceptosActions extends autoasignarpartidasconceptosActions
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
  public function configGrid($codcon='',$codcar='',$codpar='')
   {
     $registro=array();
     $sql = "Select Distinct npasicaremp.codnom,
           npasicaremp.codcar, npasiconemp.codcon, npasiparcon.codpar, '9' as id, npasiparcon.id as borrar
        From
          npasicaremp  LEFT outer JOIN npasiparcon on (npasicaremp.codnom=npasiparcon.codnom and npasicaremp.codcar=npasiparcon.codcar and npasiparcon.codcon='$codcon'),
          npasiconemp
        Where
          npasicaremp.codcar=npasiconemp.codcar and
          npasiconemp.codcon='$codcon'
        Order By
          npasicaremp.codnom, npasicaremp.codcar, npasiconemp.codcon,  npasiparcon.codpar";

    //echo $sql;
    $new_array = array();

    if (H::BuscarDatos($sql,&$registro))
    {
      $i = 0;
      foreach ($registro as $reg)
      {
          if ($codcar == $reg['codcar'])
          {
            //$reg['check']=1;
            $reg['codpar']=$codpar;
          }else{
            $reg['check']=0;
          }
          //$new_array[$i]['check']=$reg['check'];
          $new_array[$i]['codnom']=$reg['codnom'];
          $new_array[$i]['nomnom']=Herramientas::getX('codnom', 'npnomina', 'nomnom',$reg['codnom']);
          $new_array[$i]['codcar']=$reg['codcar'];
          $new_array[$i]['nomcar']=Herramientas::getX('codcar', 'npcargos', 'nomcar',$reg['codcar']);
          $new_array[$i]['codcon']=$reg['codcon'];
          $new_array[$i]['nomcon']=Herramientas::getX('codcon', 'npdefcpt', 'nomcon',$reg['codcon']);
          $new_array[$i]['codpar']=$reg['codpar'];
          $new_array[$i]['nompar']=Herramientas::getX('codpar', 'nppartidas', 'nompar',$reg['codpar']);
          $new_array[$i]['id']=$reg['id'];
          $new_array[$i]['idborrar']=$reg['borrar'];
        $i++;
      }
    }
      $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/asignarpartidasconceptos/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_nominas');
      $this->columnas[1][6]->setCatalogo('nppartidas','sf_admin_edit_form', array('codpar'=>'7','nompar'=>'8'), 'Asignarpartidasconceptos_Nppartidas');
      $this->grid = $this->columnas[0]->getConfig($new_array);
      $this->npdefcpt->setObjnominas($this->grid);
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
      case '2';
        $codcar = $this->getRequestParameter('codcar','');
        $codpar = $this->getRequestParameter('codpar','');
        $codcon = $this->getRequestParameter('codcon','');

    $this->npdefcpt = $this->getNpdefcptOrCreate();
    $this->updateNpdefcptFromRequest();
        $output = '[["","",""],["","",""],["","",""]]';

       $this->configGrid($codcon,$codcar,$codpar);
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
    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->npdefcpt = $this->getNpdefcptOrCreate();
       $this->configGrid($this->getRequestParameter('npdefcpt[codcon]'));

       $grid = Herramientas::CargarDatosGridv2($this,$this->grid, true);
       $this->coderr = Herramientas::ValidarGrid($grid);

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
    $grid=Herramientas::CargarDatosGridv2($this,$npdefcpt->getObjnominas(),true);
    return Nomina::Salvarasignarpartidasconceptos($npdefcpt,$grid);
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
    	//echo $this->coderr;exit('66');
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }


}
