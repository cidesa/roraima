<?php

/**
 * aciateayu actions.
 *
 * @package    Roraima
 * @subpackage aciateayu
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class aciateayuActions extends autoaciateayuActions
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
  public function configGrid($reg = array(),$regelim = array())
  {

    // Detalle de Ayudas
    $reg = $this->atayudas->getAtdetayus();

    if(!$reg) $reg = Array();

    $this->columns = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/aciateayu/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atdetayu');

    $this->columns[1][5]->setCatalogo('atdonaciones', 'sf_admin_edit_form', array('id'=>'5' ,'coddon'=>'6', 'desdon'=>'7'), 'Atdonaciones_Aciayudas', array( 'param1'=>"" ) );

    $this->obj = $this->columns[0]->getConfig($reg);

    $atestayu = $this->atayudas->getAtestayu();
    if($atestayu){
      if($atestayu->getComest()=='1'){
    $this->obj['deshabilitar'] = true;
      }
    }

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


    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/aciateayu/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atdetrecayu',$regrecaudos);

    $atestayu = $this->atayudas->getAtestayu();
    if($atestayu){
      if($atestayu->getComest()=='1'){
    $this->obj['deshabilitar'] = true;
      }
    }


    $this->atayudas->setObjrecaudos($this->obj);

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
    $inputtag = $this->getRequestParameter('cajtexmos','');
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

        $atayudas_nombre = $this->getRequestParameter('atayudas_nombre','');

        $c = new Criteria();
        $c->add(AtsoliciPeer::CEDULA,trim($codigo));

        $solici = AtsoliciPeer::doSelectOne($c);

        if($solici){
          $output = '[["atayudas_nombre","'.$solici->getNombre().'",""],["atayudas_atsolici_id","'.$solici->getId().'",""],["atayudas_cedula","'.$solici->getCedula().'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        }else{
          $output = '[["atayudas_nombre","'.H::REGVACIO.'",""],["atayudas_atsolici_id","",""],["atayudas_cedula","",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        }

        //return sfView::HEADER_ONLY;

        break;
     case '5':

        $output = '[["","",""],["","",""],["","",""]]';

        $this->atayudas = $this->getAtayudasOrCreate();
        $this->atayudas->setRubros(Ciudadanos::getRubros($codigo));
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '6':
        $c = new Criteria();
        $c->add(AtproveePeer::RIFPRO, $codigo);
        $atprovee = AtproveePeer::doSelectOne($c);
        if($atprovee){
          $output = '[["'.$inputtag.'","'.$atprovee->getNompro().'",""],["","",""],["","",""]]';
        }else $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      case '8':
        $c = new Criteria();
        $c->add(CpdeftitPeer::CODPRE,"trim(".CpdeftitPeer::CODPRE.")='".$codigo."'",Criteria::CUSTOM);
        $cpdeftit = CpdeftitPeer::doSelectOne($c);

        if($cpdeftit){
          $output = '[["atayudas_nompre","'.$cpdeftit->getNompre().'",""],["atayudas_codpre","'.$cpdeftit->getCodpre().'",""],["","",""]]';
        }else{
          $output = '[["atayudas_nompre","'.H::REGVACIO.'",""],["atayudas_codpre","",""],["","",""]]';
        }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        return sfView::HEADER_ONLY;

        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista

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
    $columna = $this->getRequestParameter('columna','');

    if($columna=='6'){
      $codgru = $grid[$fila][1];

      $c = new Criteria();
      $c->add(AtgrudonPeer::CODGRU,$codgru);
      $atgrudo = AtgrudonPeer::doSelectOne($c);

      if($atgrudo){
        $grid[$fila][0] = $atgrudo->getId();
        $grid[$fila][2] = $atgrudo->getDesgru();

        $coddon = $grid[$fila][4];

        if($coddon!=''){
          $c = new Criteria();
          $c->add(AtdonacionesPeer::CODDON,$coddon);
          $c->add(AtdonacionesPeer::ATGRUDON_ID,$atgrudo->getId());
          $atdonaciones = AtdonacionesPeer::doSelectOne($c);
          if($atdonaciones){
            $grid[$fila][3] = $atdonaciones->getId();
            $grid[$fila][4] = $atdonaciones->getCoddon();
            $grid[$fila][5] = $atdonaciones->getDesdon();
          }else{
            $grid[$fila][3] = '';
            $grid[$fila][4] = '';
            $grid[$fila][5] = Constantes::REGVACIO;
          }
        }
      }else{
        $grid[$fila][0] = '';
        $grid[$fila][1] = '';
        $grid[$fila][2] = Constantes::REGVACIO;


        $coddon = $grid[$fila][5];

        if($coddon!=''){
          $c = new Criteria();
          $c->add(AtdonacionesPeer::CODDON,$coddon);
          $atdonaciones = AtdonacionesPeer::doSelectOne($c);
          if($atdonaciones){
            $grid[$fila][4] = $atdonaciones->getId();
            $grid[$fila][5] = $atdonaciones->getCoddon();
            $grid[$fila][6] = $atdonaciones->getDesdon();

            $idgru = $atdonaciones->getAtgrudonId();

            $c = new Criteria();
            $c->add(AtgrudonPeer::ID,$idgru);
            $atgrudo = AtgrudonPeer::doSelectOne($c);

            if($atgrudo){
              $grid[$fila][0] = $atgrudo->getId();
              $grid[$fila][2] = $atgrudo->getDesgru();
            }

          }else{
            $grid[$fila][3] = '';
            $grid[$fila][4] = '';
            $grid[$fila][5] = Constantes::REGVACIO;
          }
        }
      }
    }elseif($columna=='9' || $columna=='10'){
      $grid[$fila][10] = H::FormatoMonto((H::FloatVEtoFloat($grid[$fila][8]) * H::FloatVEtoFloat($grid[$fila][9]))) ;
    }


    $output = Herramientas::grid_to_json($grid,$name);

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

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
        $this->coderror = 1100;
        return false;
      }

      foreach($griditems[0] as $item){
        if($item->getAprobado()){
          if($item->getPrecio()<=0.0) { $this->coderr = 1402; return false;}
          if($item->getCanapr()<=0.0) { $this->coderr = 1402; return false;}
        }
      }

      foreach($gridrecaudos[0] as $recado){
        $requerido = $recado->getRequerido();
        $entregado = $recado->getRequerido();
        if($requerido && !$entregado){
          $this->coderror = 1101;
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
      $this->configGrid();

      $griditems =Herramientas::CargarDatosGridv2($this,$Atayudas->getObjitems());

      $gridr = Herramientas::CargarDatosGridv2($this,$Atayudas->getObjrecaudos());

      $coderr = Ciudadanos::salvarAciayudas($Atayudas,$griditems,$gridr);

     // $this->redirect('aciateayu/list');

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
  public function deleting($clasemodelo)
  {
    $coderr = Ciudadanos::eliminarAciayudas($clasemodelo);

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
    $this->preExecute();
    $this->atayudas = $this->getAtayudasOrCreate();
    $this->updateAtayudasFromRequest();
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
