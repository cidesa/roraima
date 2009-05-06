<?php

/**
 * aciateayu actions.
 *
 * @package    siga
 * @subpackage aciateayu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class aciateayuActions extends autoaciateayuActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $rubros = Ciudadanos::getRubros($this->atayudas->getAttipayuId());
    $this->atayudas->setRubros($rubros);

    $this->configGrid();
    $this->atayudas->afterHydrate();

  }

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

  public function executeAjaxfila()
  {
    $name = $this->getRequestParameter('grid','a');
    $grid = $this->getRequestParameter('grid'.$name,'');

    $fila = $this->getRequestParameter('fila','');

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


      $coddon = $grid[$fila][4];

      if($coddon!=''){
        $c = new Criteria();
        $c->add(AtdonacionesPeer::CODDON,$coddon);
        $atdonaciones = AtdonacionesPeer::doSelectOne($c);
        if($atdonaciones){
          $grid[$fila][3] = $atdonaciones->getId();
          $grid[$fila][4] = $atdonaciones->getCoddon();
          $grid[$fila][5] = $atdonaciones->getDesdon();

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



//      $grid[$fila][3] = '';
//      $grid[$fila][5] = Constantes::REGVACIO;
    }

//    print $codgru;

    $output = Herramientas::grid_to_json($grid,$name);

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

  }

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

  public function saving($Atayudas)
  {
      $this->configGrid();

      $griditems =Herramientas::CargarDatosGridv2($this,$Atayudas->getObjitems());

      $gridr = Herramientas::CargarDatosGridv2($this,$Atayudas->getObjrecaudos());

      $coderr = Ciudadanos::salvarAciayudas($Atayudas,$griditems,$gridr);

     // $this->redirect('aciateayu/list');

      return $coderr;
  }

  public function deleting($clasemodelo)
  {
    $coderr = Ciudadanos::eliminarAciayudas($clasemodelo);

    return $coderr;
  }


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
