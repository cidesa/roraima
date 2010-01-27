<?php

/**
 * aciayudas actions.
 *
 * @package    Roraima
 * @subpackage aciayudas
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class aciayudasActions extends autoaciayudasActions
{

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    return $this->forward('aciayudas', 'edit');
  }

  public function updatingfromrequest($atayudas)
  {
    $this->atayudas->setCedsol($atayudas['cedsol']);
    $this->atayudas->setNomsol($atayudas['nomsol']);

    $this->atayudas->setCedben($atayudas['cedben']);
    $this->atayudas->setNomben($atayudas['nomben']);

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
    if (!$this->getRequestParameter('id'))
    {
      $this->atayudas->setFecsol(date('Y-m-d'));
    }
    $rubros = Ciudadanos::getRubros($this->atayudas->getAttipayuId());
    $this->atayudas->setRubros($rubros);

    $this->configGrid();
    $this->atayudas->afterHydrate();

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {

    // Detalle de Ayudas
    $reg = $this->atayudas->getAtdetayus();

    if(!$reg) $reg = array();

    $this->columns = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/aciayudas/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atdetayu');

    $this->columns[1][1]->setCatalogo('atdonaciones', 'sf_admin_edit_form', array('id'=>'1' ,'coddon'=>'2', 'desdon'=>'3', 'unidon' =>'5'), 'Atdonaciones_Aciayudas', array( 'param1'=>"" ) );

    $this->obj = $this->columns[0]->getConfig($reg);

    $this->atayudas->setObjitems($this->obj);

    // Detalle de Recaudos
    $this->configGridRecaudos();

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRecaudos($idrubros='')
  {
    $reg = $this->atayudas->getAtdetrecayus();
    $regrecaudos = array();
    $c = new Criteria();
    if($idrubros!='') $c->add(AtdetrecrubPeer::ATRUBROS_ID,$idrubros);
    else $c->add(AtdetrecrubPeer::ATRUBROS_ID,$this->atayudas->getAtrubrosId());

    $recaudos = AtdetrecrubPeer::doSelect($c);

    //H::PrintR($reg);

    if($recaudos){
      foreach($recaudos as $rec){
        $idrec = $rec->getAtrecaudId();
        $encontrado=false;
        $iddetrecayu = '';
        if($reg){
          foreach($reg as $r){
            if($r->getAtrecaudId()==$idrec){
              $encontrado=true;
              $iddetrecayu = $r->getId();
            }
          }
        }

        if($iddetrecayu!=''){
          $regaxu = AtdetrecayuPeer::retrieveByPK($iddetrecayu);
          $regaxu->setEntregado(true);
        }else{
          $regaxu = new Atdetrecayu();
          $regaxu->setAtrecaudId($idrec);
          $regaxu->setAtayudasId($this->atayudas->getId());
          $regaxu->afterHydrate();
        }

        //if($encontrado) $regaxu->setEntregado(true);
        //else $regaxu->setEntregado(false);

        $regrecaudos[] = $regaxu;
      }
    }

    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/aciayudas/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atdetrecayu',$regrecaudos);

    $this->atayudas->setObjrecaudos($this->obj);

  }


  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');

    $fila = $this->getRequestParameter('fila','');


      $coddon = $grid[$fila][1];

      if($coddon!=''){
        $c = new Criteria();
        $c->add(AtdonacionesPeer::CODDON,$coddon);
        $atdonaciones = AtdonacionesPeer::doSelectOne($c);
        if($atdonaciones){
          $grid[$fila][0] = $atdonaciones->getId();
          $grid[$fila][1] = $atdonaciones->getCoddon();
          $grid[$fila][2] = $atdonaciones->getDesdon();
        }else{
          $grid[$fila][0] = '';
          $grid[$fila][1] = '';
          $grid[$fila][2] = Constantes::REGVACIO;
        }
      }



    $output = Herramientas::grid_to_json($grid,$name);

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

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
    $this->ajax = $ajax;

    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';

        $this->atayudas = $this->getAtayudasOrCreate();

        $this->configGridRecaudos($codigo);
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '3':
      case '4':

        $atayudas_nombre = $this->getRequestParameter('atayudas_nomben','');

        $c = new Criteria();
        $c->addJoin(AtayudasPeer::ATBENEFI, AtciudadanoPeer::ID);
        $c->add(AtciudadanoPeer::CEDCIU,trim($codigo));

        $ayuda = AtayudasPeer::doSelectOne($c);

        if($ayuda){

            $js = "alert('El ciudadano ya contiene un expediente con el Nro. ".$ayuda->getNroexp().", creado el ".$ayuda->getCreatedAt('m/d/Y')."');";

            $output = '[["javascript","'.$js.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        }else{

          if($ajax==3){
            $nom = 'atayudas_nomsol';
            $id = 'atayudas_atsolici';
            $ced = 'atayudas_cedsol';
          }else{
            $nom = 'atayudas_nomben';
            $id = 'atayudas_atbenefi';
            $ced = 'atayudas_cedben';
          }

          $c = new Criteria();
          $c->add(AtciudadanoPeer::CEDCIU,trim($codigo));

          $ciudadano = AtciudadanoPeer::doSelectOne($c);

          if($ciudadano){
            $output = '[["'.$nom.'","'.$ciudadano->getNomciu().' '.$ciudadano->getApeciu().'",""],["'.$id.'","'.$ciudadano->getId().'",""],["'.$ced.'","'.$ciudadano->getCedsol().'",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          }else{
            $output = '[["'.$nom.'","'.H::REGVACIO.'",""],["'.$id.'","",""],["'.$ced.'","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          }


        }
        return sfView::HEADER_ONLY;

        break;
     case '5':

        $output = '[["","",""],["","",""],["","",""]]';

        $this->atayudas = $this->getAtayudasOrCreate();
        $this->atayudas->setRubros(Ciudadanos::getRubros($codigo));
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
     case '6':
         $nom = 'atayudas_nombremed';
         $id = 'atayudas_atmedico';
         $ced = 'atayudas_cedrifmed';
         $c = new Criteria();
         $c->add(AtmedicoPeer::CEDRIFMED,trim($codigo));

          $ciudadano = AtmedicoPeer::doSelectOne($c);

          if($ciudadano){
            $output = '[["'.$nom.'","'.$ciudadano->getNombremed().' '.$ciudadano->getApellimed().'",""],["'.$id.'","'.$ciudadano->getId().'",""],["'.$ced.'","'.$ciudadano->getCedrifmed().'",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          }else{
            $output = '[["'.$nom.'","'.H::REGVACIO.'",""],["'.$id.'","",""],["'.$ced.'","",""],["","",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          }
        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista


  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
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

      $this->atayudas= $this->getAtayudasOrCreate();
      $this->updateAtayudasFromRequest();
      $rubros = Ciudadanos::getRubros($this->atayudas->getAttipayuId());
      $this->atayudas->setRubros($rubros);
      $this->configGrid();

      $griditems = Herramientas::CargarDatosGridv2($this,$this->atayudas->getObjitems());
      $gridrecaudos = Herramientas::CargarDatosGridv2($this,$this->atayudas->getObjrecaudos());

      if(count($griditems[0])==0){
        $this->coderr = 1100;
        return false;
      }

      foreach($griditems[0] as $item){
        if($item->getAprobado()){
          if($item->getPrecio()<=0.0){ $this->coderr = 1402; return false;}
          if($item->getCanapr()<=0.0){ $this->coderr = 1402; return false;}
        }
      }

      foreach($gridrecaudos[0] as $recado){
        $requerido = $recado->getRequerido();
        $entregado = $recado->getRequerido();
        if($requerido && !$entregado){
          $this->coderr = 1101;
          return false;
        }
      }

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
      $this->atayudas= $this->getAtayudasOrCreate();
      $this->updateAtayudasFromRequest();
      $rubros = Ciudadanos::getRubros($this->atayudas->getAttipayuId());
      $this->atayudas->setRubros($rubros);
      $this->configGrid();
      $this->atayudas->afterHydrate();

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
  public function saving($Atayudas)
  {

      $datosvista = $this->getRequestParameter('gridc');

      $this->configGrid();

      $griditems = Herramientas::CargarDatosGridv2($this,$this->atayudas->getObjitems());

      $gridr = Herramientas::CargarDatosGridv2($this,$this->atayudas->getObjrecaudos());
      
      if($Atayudas->getAtsolici()=='') $Atayudas->setAtsolici($Atayudas->getAtbenefi());

      $coderr = Ciudadanos::salvarAciayudas($Atayudas,$griditems,$gridr);
      return $coderr;
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
  public function deleting($Atayudas)
  {
    $coderr = Ciudadanos::eliminarAciayudas($Atayudas);

    return $coderr;
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
