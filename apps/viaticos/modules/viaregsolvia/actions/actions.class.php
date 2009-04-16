<?php

/**
 * viaregsolvia actions.
 *
 * @package    siga
 * @subpackage viaregsolvia
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class viaregsolviaActions extends autoviaregsolviaActions
{
  //private $formatopresupuesto='';

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $this->configGrid();   //Plan de Trabajo
     //$this->configGridGastos();

  }

  public function configGrid($reg = array(),$regelim = array())  //Plan de Trabajo
  {
   // $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

   $c = new Criteria();
   $c->add(ViaregdetsolviaPeer::VIAREGSOLVIA_ID,$this->viaregsolvia->getId());
   $per = ViaregdetsolviaPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viaregsolvia/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_plantrabajo');

   //Codigo Ente
   $this->columnas[1][0]->setCatalogo('viaregente','sf_admin_edit_form', array('desente'=>'2','id'=>'1'), 'Viaregsolvia_Viaregente');

   //Cod/Actividad
   $this->columnas[1][2]->setCatalogo('viaregact','sf_admin_edit_form', array('desact'=>'4','id'=>'3'), 'Viaregsolvia_Viaregact');
   $signo="+";
   $signo2="-";
   $this->columnas[1][2]->setHTML(' onBlur="toAjaxUpdater(obtenerColumna(this.id,2,'.chr(39).$signo.chr(39).'),4,getUrlModuloAjax(),this.value+'.chr(39).'!'.chr(39).'+obtenerColumna(this.id,1,'.chr(39).$signo.chr(39).')+'.chr(39).'!'.chr(39).'+$F(obtenerColumna(this.id,2,'.chr(39).$signo2.chr(39).')));" ');

   //Ciudad
     $this->columnas[1][4]->setCombo(self::ListaCiudades());

   //Moneda
     $this->columnas[1][5]->setCombo(self::ListaMoneda());

   $this->obj = $this->columnas[0]->getConfig($per);

   $this->viaregsolvia->setObjplantrabajo($this->obj);

  }

  public function ListaMoneda()
  {
    $c = new Criteria;
    $c->addAscendingOrderByColumn(TsdesmonPeer::NOMMON);
    $lista = TsdesmonPeer::doSelect($c);

    $modulos = array();

    foreach($lista as $arr)
    {
      $modulos += array($arr->getCodmon() => $arr->getNommon());
    }
    return $modulos;

  }

  public function configGridGastos($ciudad='',$id='',$gripgastos=array(),$moneda='',$tabulador='',$filaafectada='')  //Gastos Globales
  {
     $per = array();
  if ($gripgastos=='')   //Nuevo
  {
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viaregsolvia/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_gastos');

      $this->columnas[1][0]->setCombo(self::ListaServicios($tabulador,$ciudad));  //Servicios o Gastos
      $this->columnas[1][0]->setHTML(' onChange=javascript: MostrarMontoServicio(this.id,$F('.chr(39).'gx_0_3'.chr(39).')) ');
      //El titulo es dinamico, dependiendo del tipo de monera que selecciona
      $nommon = Herramientas::getX('codmon','tsdesmon','nommon',$moneda);
      $this->columnas[1][1]->setTitulo($nommon);  //Titulo Moneda

        $per[0]["filafectada"]=$filaafectada;
        $per[0]["id"]='';
      $this->obj = $this->columnas[0]->getConfig($per);
      $this->viaregsolvia->setObjgastos($this->obj);

  }else{   //Consulta

    $gastos_filas    = split("/",$gripgastos);
    array_pop($gastos_filas);  //Elimina la ultima posicion del array
    $i = 0;
    foreach ($gastos_filas as $gastos)
    {
      $gastos = split("_",substr($gastos,0,strlen($gastos)-1));
      $array_gatos[$i]["viaregtipserid"] = $gastos[0];
      $array_gatos[$i]["detgasmon"] = $gastos[1];
      $array_gatos[$i]["filafectada"] = $filaafectada;
      $array_gatos[$i]["id"] = '';
        $i++;
    }

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viaregsolvia/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_gastos');

    $this->columnas[1][0]->setCombo(self::ListaServicios($tabulador,$ciudad));  //Servicios o Gastos
    $this->columnas[1][0]->setHTML(' onChange=javascript: MostrarMontoServicio(this.id,$F('.chr(39).'gx_0_3'.chr(39).')) ');

      //El titulo es dinamico, dependiendo del tipo de monera que selecciona
      $nommon = Herramientas::getX('codmon','tsdesmon','nommon',$moneda);
      $this->columnas[1][1]->setTitulo($nommon);  //Titulo Moneda
      $this->obj = $this->columnas[0]->getConfig($array_gatos);
      $this->viaregsolvia->setObjgastos($this->obj);
  }
  }


  public function configGridGastos_copia($codente='',$id='',$gripgastos=array())  //Gastos Globales
  {
   $c = new Criteria();
   $c->add(ViaregdetgassolviaPeer::VIAREGSOLVIA_ID,$codente);
   $per = ViaregdetgassolviaPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viaregsolvia/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_gastos');
     $this->columnas[1][0]->setCombo(self::ListaCiudades($codente));  //Ciudaddes
     $this->columnas[1][1]->setCombo(Constantes::ListaMoneda());      //Moneda
     $this->columnas[1][1]->setHTML('onChange=toAjaxUpdater(obtenerColumnaSiguiente(this.id),3,getUrlModulo()+"ajax",this.value,"",{"ciudad" :""+$(this.id).up().previous(0).descendants()[0].value  })');

   $this->obj = $this->columnas[0]->getConfig($per);

   $this->viaregsolvia->setObjgastos($this->obj);

  }



  public function ListaServicios($tabulador='',$ciudad='')
  {
    $c = new Criteria();
    $c->add(ViadettipserPeer::VIAREGTIPTAB_ID,$tabulador);
    $c->add(ViadettipserPeer::OCCIUDAD_ID,$ciudad);
    $c->addJoin(ViadettipserPeer::VIAREGTIPSER_ID,ViaregtipserPeer::ID);
    $lista = ViaregtipserPeer::doSelect($c);

    $reg = array();
    $dat = array();
    foreach($lista as $reg)
    {
      $dat += array($reg->getId() => $reg->getDestipser());
    }
    return $dat;
  }

  public function ListaCiudades($codente='',$reg='')
  {
    //H::printR($reg);
    $c = new Criteria();
    if ($codente)   $c->add(ViaciuentePeer::VIAREGENTE_ID,$codente);
    //else $c->add(ViaciuentePeer::VIAREGENTE_ID,$reg->getViaregente_id());
    $c->addJoin(ViaciuentePeer::OCCIUDAD_ID,OcciudadPeer::ID);
    $lista = OcciudadPeer::doSelect($c);

    $financ = array();
    if ($lista){
      foreach($lista as $obj_financ)
      {
        $financ += array($obj_financ->getId() => $obj_financ->getNomciu());
      }
    }else{
      $financ = array(''=>'No Existe');
    }
    return $financ;
  }


 public function executeAjaxfilass()
  {
    $name = $this->getRequestParameter('grid','gastos');
    $grid = $this->getRequestParameter('grid'.$name,'');
    $fila = $this->getRequestParameter('fila','');

    // Aqui podemos modificar el arreglo con los datos que necesitemos modificar en la vista
/*
    $montoajuste = 0;
    $montorecargo = 0;
    $montototal = 0;
    $costo = 0;
    $cantidadOrd = 0;
    $ajuste = 0;

    $costo = Herramientas::toFloat($grid[$fila][6]);
    $cantidadOrd = Herramientas::toFloat($grid[$fila][4]);
    $ajuste = Herramientas::toFloat($grid[$fila][3]);

    $codart = $grid[$fila][0];
    $codcat = $grid[$fila][2];


    if($costo>0 && $cantidadOrd>0 && $ajuste>0){
      $montoajuste = $costo*$ajuste;
    }
*/

    $c = new Criteria;
    $c->add(ViadettipserPeer::ORDCOM,$ordcom);

    $reg_ordcom = CaordcomPeer::doSelectOne($c);

    $montorecargo = Compras::Calcular_Recargo($reg_ordcom->getOrdCom(),$ajuste,$codart,$codcat);
    $montototal = $montoajuste + $montorecargo;

    $grid[$fila][7] = number_format($montoajuste,2,',','.');
    $grid[$fila][8] = number_format($montorecargo,2,',','.');
    $grid[$fila][9] = number_format($montototal,2,',','.');

    // Inicio de la conversión y envio Json+Ajax

    $output = Herramientas::grid_to_json($grid,$name);

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

  }

  public function executeAjax()
  {
    $codigo    = $this->getRequestParameter('codigo','');
    $ajax      = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');

    switch ($ajax){
      case '1':
        $nomemp = Herramientas::getX('cedemp','nphojint','nomemp',$codigo);
        $codemp = Herramientas::getX('cedemp','nphojint','codemp',$codigo);
        $emaemp = Herramientas::getX('cedemp','nphojint','emaemp',$codigo);
        $telhab = Herramientas::getX('cedemp','nphojint','telhab',$codigo);
        $codniv = Herramientas::getX('cedemp','nphojint','codniv',$codigo);
        $desniv = Herramientas::getX('codniv','npestorg','desniv',$codniv);
//17136814
        $descar = Herramientas::getXx('npasicaremp',array('codemp','status'),array($codemp,'V'),'nomcar');

        $output = '[["'.$cajtexmos.'","'.$nomemp.'",""],["viaregsolvia_emaemp","'.$emaemp.'",""],["viaregsolvia_telhab","'.$telhab.'",""],["viaregsolvia_desniv","'.$desniv.'",""],["viaregsolvia_descar","'.$descar.'",""]]';

      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;

        break;

      case '2':    //Grid Gastos
        $id                  =  $this->getRequestParameter('id','');
        $gridgastos          =  $this->getRequestParameter('gridgastos','');
        $ciudad              =  $this->getRequestParameter('ciudad','');
        $moneda              =  $this->getRequestParameter('moneda','');
        $tabulador           =  $this->getRequestParameter('tabulador','');
        $filafectada         =  $this->getRequestParameter('fila','');

        $this->viaregsolvia  =  $this->getViaregsolviaOrCreate();
        $this->configGridGastos($ciudad,$id,$gridgastos,$moneda,$tabulador,$filafectada);
        $javascript          =  "$('divGrid').show()";
        $output              =  '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

      case '3':

        $ciudad    = $this->getRequestParameter('ciudad','');
        //echo $gripgatos = $this->getRequestParameter('gripgatos','');
        //$gripgatos
        $montoP  = 0;
        $montoH  = 0;
        $montoMI = 0;
        $montoC  = 0;
            $montoO  = 0;
        //// Hospedaje
        $hospedaje = 'gastosx_0_3';
        $c = new Criteria();
        $c->add(ViaregtipserPeer::DESTIPSER,'%Hospedaje%',Criteria::LIKE);
        $c->add(ViadettipserPeer::OCCIUDAD_ID,$ciudad);
        $c->addJoin(ViaregtipserPeer::ID,ViadettipserPeer::VIAREGTIPSER_ID);
        $c->setIgnoreCase(true);
        $per = ViadettipserPeer::doSelectone($c);

        if ($per)
        {
          if      ($codigo=='B'){ $montoH = H::FormatoMonto($per->getMontobs());  }
          else if ($codigo=='E'){ $montoH = H::FormatoMonto($per->getMontoeur()); }
          else if ($codigo=='D'){ $montoH = H::FormatoMonto($per->getMontodol()); }
        }

            //// Pasaje
            $pasaje = 'gastosx_0_4';
        $c = new Criteria();
        $c->add(ViaregtipserPeer::DESTIPSER,'%Pasaje%',Criteria::LIKE);
        $c->add(ViadettipserPeer::OCCIUDAD_ID,$ciudad);
        $c->addJoin(ViaregtipserPeer::ID,ViadettipserPeer::VIAREGTIPSER_ID);
        $c->setIgnoreCase(false);
        $per = ViadettipserPeer::doSelectone($c);

        if ($per)
        {
          if      ($codigo=='B'){ $montoP = H::FormatoMonto($per->getMontobs());  }
          else if ($codigo=='E'){ $montoP = H::FormatoMonto($per->getMontoeur()); }
          else if ($codigo=='D'){ $montoP = H::FormatoMonto($per->getMontodol()); }
        }


            //// Movilizacion Interna
            $movili = 'gastosx_0_5';
        $c = new Criteria();
        $c->add(ViaregtipserPeer::DESTIPSER,'%Movili%',Criteria::LIKE);
        $c->add(ViadettipserPeer::OCCIUDAD_ID,$ciudad);
        $c->addJoin(ViaregtipserPeer::ID,ViadettipserPeer::VIAREGTIPSER_ID);
        $c->setIgnoreCase(false);
        $per = ViadettipserPeer::doSelectone($c);

        if ($per)
        {
          if      ($codigo=='B'){ $montoMI = H::FormatoMonto($per->getMontobs());  }
          else if ($codigo=='E'){ $montoMI = H::FormatoMonto($per->getMontoeur()); }
          else if ($codigo=='D'){ $montoMI = H::FormatoMonto($per->getMontodol()); }
        }

            //// Comida
            $comida = 'gastosx_0_6';
        $c = new Criteria();
        $c->add(ViaregtipserPeer::DESTIPSER,'%Comida%',Criteria::LIKE);
        $c->add(ViadettipserPeer::OCCIUDAD_ID,$ciudad);
        $c->addJoin(ViaregtipserPeer::ID,ViadettipserPeer::VIAREGTIPSER_ID);
        $c->setIgnoreCase(false);
        $per = ViadettipserPeer::doSelectone($c);

        if ($per)
        {
          if      ($codigo=='B'){ $montoC = H::FormatoMonto($per->getMontobs());  }
          else if ($codigo=='E'){ $montoC = H::FormatoMonto($per->getMontoeur()); }
          else if ($codigo=='D'){ $montoC = H::FormatoMonto($per->getMontodol()); }
        }


            //// Otros
            $otro = 'gastosx_0_7';
        $c = new Criteria();
        $c->add(ViaregtipserPeer::DESTIPSER,'%Otros%',Criteria::LIKE);
        $c->add(ViadettipserPeer::OCCIUDAD_ID,$ciudad);
        $c->addJoin(ViaregtipserPeer::ID,ViadettipserPeer::VIAREGTIPSER_ID);
        $c->setIgnoreCase(false);
        $per = ViadettipserPeer::doSelectone($c);

        if ($per)
        {
          if      ($codigo=='B'){ $montoO = H::FormatoMonto($per->getMontobs());  }
          else if ($codigo=='E'){ $montoO = H::FormatoMonto($per->getMontoeur()); }
          else if ($codigo=='D'){ $montoO = H::FormatoMonto($per->getMontodol()); }
        }

          $output = '[["'.$hospedaje.'","'.$montoH.'",""],["'.$pasaje.'","'.$montoP.'",""],["'.$comida.'","'.$montoC.'",""],["'.$movili.'","'.$montoMI.'",""],["'.$otro.'","'.$montoO.'",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
        break;

      case 4:         //Ajax de Codigo de la Actividad
        $datos     = split('!',$this->getRequestParameter('codigo'));
        $codact    = $datos[0];
        $cajtexmos = $datos[1];
        $codente   = $datos[2];

        $desente = Herramientas::getX('id','viaregact','desact',$codact);

        $output = '[["'.$cajtexmos.'","'.$desente.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        $this->ciudad = self::ListaCiudades($codente);

      break;

      case 5:     //Calcula el monto dependiendo del servicio y lo imprimie en el grip de gastos
        $ciudad              =  $this->getRequestParameter('ciudad','');
        $moneda              =  $this->getRequestParameter('moneda','');
        $tabulador           =  $this->getRequestParameter('tabulador','');
        $servicio            =  $this->getRequestParameter('servicio','');

        //Para saber que campo, ya que varia el tipo de moneda
        $nommon = Herramientas::getX('codmon','tsdesmon','nommon',$moneda);
        if (strtoupper($nommon)=='BOLIVAR'){
          $monto = 'montobs';
        }
        elseif (strtoupper($nommon)=='EURO'){
          $monto = 'montoeur';
        }
        elseif (strtoupper($nommon)=='DOLAR'){
          $monto = 'montodol';
        }
        $monto = H::FormatoMonto(H::getXx('viadettipser',array('viaregtiptab_id','occiudad_id','viaregtipser_id'),array($tabulador,$ciudad,$servicio),$monto));

        $output = '[["'.$cajtexmos.'","'.$monto.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
      break;

      case 6:         //Ajax de Codigo del Ente
        $datos     = split('!',$this->getRequestParameter('codigo'));
        $codente   = $datos[0];
        $cajtexmos = $datos[1];

        $desente = Herramientas::getX('id','viaregente','desente',$codente);

        $output = '[["'.$cajtexmos.'","'.$desente.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;
        //$this->ciudad = self::ListaCiudades($codente);

      break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
  }


  public function validateEdit444()
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

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    $this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
  try{
    $gridTrabajo = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjplantrabajo());
    return Viaticos::SalvarViaregsolvia($clasemodelo,$gridTrabajo);
  } catch (Exception $ex){
    exit($ex);
    return 0;
  }
  }

  public function deleting($clasemodelo)
  {
    try{
      $coderr = -1;
      if ((Viaticos::ValidarCompromiso($this->viaregsolvia))!=(-1)) { return 1604; }
    if ((Viaticos::EliminarGastos($clasemodelo))!=(-1))     { return 1602; }
    if ((Viaticos::EliminarPlanTrabajo($clasemodelo))!=(-1)){ return 1603; }
    if ((Viaticos::EliminarCompromiso($clasemodelo))!=(-1));
    $clasemodelo->delete();

    return $coderr;

  } catch (Exception $ex){
    return 0;
  }
  }

}

