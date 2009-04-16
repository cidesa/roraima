<?php

/**
 * ingajustenew actions.
 *
 * @package    siga
 * @subpackage ingajustenew
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingajustenewActions extends autoingajustenewActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->setVars();
    $this->configGrid($this->ciajuste->getRefaju(),$this->getRequestParameter('ciajuste[refere]'));
  }

  public function setVars()
  {
    $this->mascarapresupuesto = Herramientas::getX('Codemp','Cidefniv','Forpre','001');
    $this->longpre=strlen($this->mascarapresupuesto);
  }


  public function configGrid($refing='',$refiere='')
  {
  if ($refiere!=''){//Si refiere a movimiento
    $c = new Criteria();
    $c->addJoin(CiimpingPeer::REFING,CiregingPeer::REFING);
    $c->add(CiimpingPeer::REFING,$refiere);
    $per = CiimpingPeer::doSelect($c);

  }
  else{//No refiere a movimiento
    $c = new Criteria();
    $c->add(CimovajuPeer::REFAJU,$refing);
    $per = CimovajuPeer::doSelect($c);

  }

  $mascara=$this->mascarapresupuesto;
  $longitud=$this->longpre;
  $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingajustenew/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

  if ($refiere!='') $this->columnas[0]->setTabla('Ciimping');

  $obj= array('codpre' => 1);
  $params= array('param1' => $longitud, 'val2');
  $this->columnas[1][0]->setCatalogo('Cideftit','sf_admin_edit_form',$obj,'Ingajustenew_cideftit',$params);
  $this->columnas[1][0]->setHTML('type="text" size="32" maxlength="'.chr(39).$longitud.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascara.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="if (esultimonivel(event,this.id)){ repetido(event,this.id),ajaxcodpre(event,this.id) }"');
  //$this->columnas[1][1]->setHTML('size="10" onBlur="event.keyCode=13;return valcod(event,this.id),calculartotal1(),haydisponibilidad(event,this.id)"');
  //$this->columnas[1][2]->setHTML('size="10" value="'.$this->monto.'"');

  if ($refiere==''){
    $this->columnas[1][1]->setHTML('size="10"  onBlur="event.keyCode=13;return valcod(event,this.id),calculartotal1(),haydisponibilidad(event,this.id)"');
    $this->columnas[1][2]->setOculta(true);

  }else{
    $this->columnas[1][1]->setHTML('size="10" onBlur="event.keyCode=13;return valcod(event,this.id),valmonto(event,this.id),calculartotal1(),haydisponibilidad(event,this.id)"');

  }

  $this->grid = $this->columnas[0]->getConfig($per);
  $this->ciajuste->setGrid($this->grid);
  }


  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript="";

    switch ($ajax){
        case '1':
        $ref = $this->getRequestParameter('codigo','');

        $c= new Criteria();
        $c->add(CiregingPeer::REFING,$ref);
        $datos=CiregingPeer::doSelectOne($c);
        $refing='';
        $desing='';

        if ($datos){
          $refing=$datos->getRefing();
          $desing=$datos->getDesing();
        }

        $this->ciajuste = $this->getCiajusteOrCreate();
        $this->configGrid('',$ref);
        $output = '[["ciajuste_desing","'.$desing.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

        break;

        case '2':
        $codigo = $this->getRequestParameter('codigo');
        $cajtexcom = $this->getRequestParameter('cajtexcom');

        $c= new Criteria();
        $c->add(CideftitPeer::CODPRE,$codigo);
        $reg=CideftitPeer::doSelectOne($c);

        if (!$reg)
        {
          $javascript="alert('Código presupuestario no existe');$(id).value='';";
        }

        $output = '[["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;

        case '3':

        $codigo = $this->getRequestParameter('codigo');
        $monto = $this->getRequestParameter('monto');
        $javascript="";

        $c= new Criteria();
        $c->add(CiasiiniPeer::CODPRE,$codigo);
        $c->add(CiasiiniPeer::ANOPRE,substr((CidefnivPeer::FECCIE),0,4));
        $reg=CiasiiniPeer::doSelectOne($c);
        if ($reg)
        {
          if (H::convnume($monto)>$reg->getMondis()){
            $javascript="alert('No existe disponibilidad para hacer este ajuste');$(id).value='0,00';";
          }
        }

        $output = '[["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

        break;
    }
  }

    public function executeSalvaranu()
  {
    $refanu=$this->getRequestParameter('refanu');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');

     $c= new Criteria();
     $c->add(CimovajuPeer::REFAJU,$refanu);
     $reg=CimovajuPeer::doSelect($c);
     $anular=1;

     foreach ($reg as $dato){
       if (!Ingresos::verificardisponibilidadajuste($dato->getCodpre(),$dato->getMonmov())){
               $anular=0;
               break;
       }
     }


   if ($anular==1){

    $c = new Criteria();
    $c->add(CiajustePeer::REFAJU,$refanu);
    $this->ciajuste = CiajustePeer::doSelectOne($c);

    $this->ciajuste->setDesanu($desanu);
    $this->ciajuste->setFecanu($fecanu);
    $this->ciajuste->setStaaju('N');
    $this->ciajuste->save();

  //Anular Mov_aju
    $c = new Criteria();
    $c->add(CimovajuPeer::REFAJU,$refanu);
    $per = CimovajuPeer::doSelect($c);

    foreach ($per as $dato){
      $dato->setStamov('N');
        $dato->save();
    }
   }else{
    $this->msg="No se pudo anular el ajuste, el monto de la partida es menor que el monto del traslado y al disminuirla por el monto del traslado quedar&iacute;a negativa";
    }


    sfView::SUCCESS;
  }

    public function executeAnular()
    {
    $refaju=$this->getRequestParameter('refaju');
    $fecha=$this->getRequestParameter('fecaju');
    $fecaju = split('/', $fecha);
    $fecaju = $fecaju[2] . "-" . $fecaju[1] . "-" . $fecaju[0];


    $c = new Criteria();
    $c->add(CiajustePeer::REFAJU,$refaju);
    $c->add(CiajustePeer::FECAJU,$fecaju);
    $this->ciajuste = CiajustePeer::doSelectOne($c);
    sfView::SUCCESS;
  }


  public function validateEdit()
  {
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){

       $this->ciajuste  =  $this->getCiajusteOrCreate();
       $this->updateCiajusteFromRequest();

       $this->editing();
       $grid = Herramientas::CargarDatosGridv2($this,$this->grid);

       $this->coderr = Herramientas::ValidarGrid($grid);

       if ($this->coderr == '-1')
       {
         $this->coderr = Ingresos::ValidarIngajustenew($this->ciajuste);
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
   $this->configGrid();
   $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
  }

  public function saving($ciajuste)
  {
    $ano=substr(date('d/m/YY'),6,4);
    $ciajuste->setAnoaju($ano);
    $ciajuste->setStaaju('A');
    if ($ciajuste->getRefere()==''){
      $ciajuste->setRefere('NULO');
      $refiere='';
    }else{$refiere='S';}

    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    Ingresos::salvarMovaju($ciajuste, $grid, $refiere);
    $ciajuste->save();

    return -1;

  }


  public function deleting($ciajuste)
  {
  try{
     $c= new Criteria();
     $c->add(CimovajuPeer::REFAJU,$ciajuste->getRefaju());
     $reg=CimovajuPeer::doSelect($c);
     $eliminar=true;
     //$error=-1;

     foreach ($reg as $dato){
       if (!Ingresos::verificardisponibilidadajuste($dato->getCodpre(),$dato->getMonaju())){
               $eliminar=false;
               break;
       }
     }

  //print $eliminar; exit;
     if ($eliminar){

       $c= new Criteria();
       $c->add(CimovajuPeer::REFAJU,$ciajuste->getRefaju());
       $reg=CimovajuPeer::doDelete($c);

       $ciajuste->delete();
       $error=-1;

    }else{
      $error=1502;

    }
    return $error;
  } catch (Exception $ex){
    return 0;
  }
  }
}
