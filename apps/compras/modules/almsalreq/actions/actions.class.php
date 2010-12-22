<?php

/**
 * almsalreq actions.
 *
 * @package    siga
 * @subpackage almsalreq
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almsalreqActions extends autoalmsalreqActions
{

  public function editing()
  {
    $this->configGrid($this->casalalm->getCodsal());
  }

  public function configGrid($codsal='',$reqart='')
  {
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almsalreq/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_detalle');

    if ($reqart!="")
    {
        $c = new Criteria();
        $c->add(CaartreqPeer::REQART,$reqart);
        $det = CaartreqPeer::doSelect($c);
        if ($det)
        {
            foreach ($det as $obj)
            {
              $cadetsal2= new Cadetsal();
              $cadetsal2->setCodart($obj->getCodart());
              $cadetsal2->setDesart(H::getX('CODART','Caregart','Desart',$obj->getCodart()));
              $cadetsal2->setCantot($obj->getCanreq());
              $cadetsal2->setTotart($obj->getMontot());
              $detalle[]=$cadetsal2;
            }
        }
    }else {
        $c = new Criteria();
        $c->add(CadetsalPeer::CODSAL,$codsal);
        $detalle = CadetsalPeer::doSelect($c);
    }
    
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    $mascaraart=Herramientas::getMascaraArticulo();
    $lonart=strlen($mascaraart);

    $obj= array('codart' => 1, 'desart' => 2);
    if ($manartlot=='S')
        $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraart.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjaxUpdater(\'\'+$(this.id).up().next(10).descendants()[0].id+\'\',\'6\',getUrlModuloAjax(),this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&idcodalm=\'+$(this.id).up().next(4).descendants()[0].id+\'&idnomalm=\'+$(this.id).up().next(5).descendants()[0].id+\'&idcodubi=\'+$(this.id).up().next(6).descendants()[0].id+\'&idnomubi=\'+$(this.id).up().next(7).descendants()[0].id+\'&cajtexcom=\'+this.id)"');
    else
        $this->columnas[1][0]->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraart.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="toAjax(\'5\',getUrlModuloAjax(),this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&idcodalm=\'+$(this.id).up().next(4).descendants()[0].id+\'&idnomalm=\'+$(this.id).up().next(5).descendants()[0].id+\'&idcodubi=\'+$(this.id).up().next(6).descendants()[0].id+\'&idnomubi=\'+$(this.id).up().next(7).descendants()[0].id+\'&cajtexcom=\'+this.id)"');
    $this->columnas[1][0]->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almentalm');
    $signomas="+";
     if ($manartlot=='S')
        $this->columnas[1][5]->setHTML('type="text" size="10" maxlength=20 onBlur="toAjaxUpdater(\'\'+$(this.id).up().next(5).descendants()[0].id+\'\',\'8\',getUrlModuloAjax(),this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&codart=\'+$(this.id).up().previous(4).descendants()[0].value+\'&idcodubi=\'+$(this.id).up().next(1).descendants()[0].id+\'&idnomubi=\'+$(this.id).up().next(2).descendants()[0].id+\'&cajtexcom=\'+this.id)"');
     else
         $this->columnas[1][5]->setHTML('type="text" size="10" maxlength=20 onBlur="toAjax(\'7\',getUrlModuloAjax(),this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&codart=\'+$(this.id).up().previous(4).descendants()[0].value+\'&idcodubi=\'+$(this.id).up().next(1).descendants()[0].id+\'&idnomubi=\'+$(this.id).up().next(2).descendants()[0].id+\'&cajtexcom=\'+this.id)"');

    
    $objubi= array ('codubi' => '8','nomubi' =>'9');
    $params = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
    $mascaraubi=Herramientas::ObtenerFormato('Cadefart','Forubi');
    $lonubi=strlen($mascaraubi);
    if ($manartlot=='S')                                                                                                                                                                         
        $this->columnas[1][7]->setHTML('type="text" size="10" maxlength="'.chr(39).$lonubi.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubi.chr(39).')" onBlur="toAjaxUpdater(\'\'+$(this.id).up().next(3).descendants()[0].id+\'\',\'10\',getUrlModuloAjax(),this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&codart=\'+$(this.id).up().previous(6).descendants()[0].value+\'&codalm=\'+$(this.id).up().previos(1).descendants()[0].value+\'&cajtexcom=\'+this.id)"');
    else
        $this->columnas[1][7]->setHTML('type="text" size="10" maxlength="'.chr(39).$lonubi.chr(39).'" onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraubi.chr(39).')" onBlur="toAjax(\'9\',getUrlModuloAjax(),this.value,\'\',\'&cajtexmos=\'+$(this.id).up().next(0).descendants()[0].id+\'&codart=\'+$(this.id).up().previous(6).descendants()[0].value+\'&codalm=\'+$(this.id).up().previos(1).descendants()[0].value+\'&cajtexcom=\'+this.id)"');
    $this->columnas[1][7]->setCatalogo('Cadefubi','sf_admin_edit_form',$objubi,'Cadefubi_Almdes',$params);

    $recmer=H::getConfApp2('recmer', 'compras', 'almsalalm');
    if ($recmer=='S')
    {
        $this->columnas[1][9]->setOculta(false);
        $this->columnas[1][10]->setOculta(false);
    }
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    if ($manartlot=='S')
    {
      $this->columnas[1][11]->setOculta(false);
      if ($this->casalalm->getId())
      {
          $this->columnas[1][11]->setTipo(Columna::TEXTO);
       //   $this->columnas[1][11]->setNombreCampo('numlot');
//          $this->columnas[1][11]->setEsGrabable(true);
          $this->columnas[1][11]->setHTML('size=10 readonly=true');
      }
    }

    $this->obj =$this->columnas[0]->getConfig($detalle);

    $this->casalalm->setObj($this->obj);
  }

  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $js=""; $dato="";
    $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
    
    switch ($ajax){
      case '1':
          $t= new Criteria();
          $t->add(CaproveePeer::CODPRO,$codigo);
          $t->add(CaproveePeer::ESTPRO,'A');
          $reg= CaproveePeer::doSelectOne($t);
          if ($reg)
          {
            $dato=eregi_replace("[\n|\r|\n\r]", "", $reg->getNompro());
          }else {
              $js="alert('La Contratistas de Bienes o Servicio y Cooperativas No Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '2':
          $t= new Criteria();
          $t->add(CatipsalPeer::CODTIPSAL,$codigo);
          $reg= CatipsalPeer::doSelectOne($t);
          if ($reg)
          {
            $dato=$reg->getDestipsal();
          }else {
              $js="alert('El Tipo Movimiento No Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '3':
          $q= new Criteria();
          $q->add(CadefcenPeer::CODCEN,$codigo);
          $reg= CadefcenPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=$reg->getDescen();
          }else {
             $js="alert('El Centro de Costo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '4':
          $q= new Criteria();
          $q->add(CareqartPeer::REQART,$codigo);
          $reg= CareqartPeer::doSelectOne($q);
          if ($reg)
          {
             $dato=$reg->getDesreq();
             $this->params=array();
             $this->casalalm = $this->getCasalalmOrCreate();
             $this->updateCasalalmFromRequest();
             $this->labels = $this->getLabels();

             $this->configGrid('',$codigo);
          }else {
              $js="alert_('La Requisici&oacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '5':
          $mascaraart=Herramientas::getMascaraArticulo();
          $lonart=strlen($mascaraart);
          $idcodalm=$this->getRequestParameter('idcodalm');
          $idnomalm=$this->getRequestParameter('idnomalm');
          $idcodubi=$this->getRequestParameter('idcodubi');
          $idnomubi=$this->getRequestParameter('idnomubi');
          $com='';

          $q= new Criteria();
          $q->add(CaregartPeer::CODART,$codigo);
          $reg= CaregartPeer::doSelectOne($q);
          if ($reg)
          {
             if ($lonart==strlen($codigo))
             {
                 $dato=eregi_replace("[\n|\r|\n\r]", "", $reg->getDesart());
                 $c = new Criteria();
                 $c->add(CaartalmubiPeer::CODART,$codigo);
                 $c->addAscendingOrderByColumn(CaartalmubiPeer::CODALM);
                 $alm = CaartalmubiPeer::doSelectOne($c);
                 if ($alm)
                 {
                    $codalm=$alm->getCodalm();
                    $nomalm=CadefalmPeer::getDesalmacen($codalm);
                    $codubi=$alm->getCodubi();
                    $nomubi=CadefubiPeer::getDesubicacion($codubi);
                    if ($manartlot=='S')
                        $numlot=$alm->getNumlot();
                    $com=',["'.$idcodalm.'","'.$codalm.'",""],["'.$idnomalm.'","'.$nomalm.'",""],["'.$idcodubi.'","'.$codubi.'",""],["'.$idnomubi.'","'.$nomubi.'",""]';
                 }else {
                 $js="alert_('El C&oacute;digo del Art&iacute;culo: ".$codigo."  no esta asociado a ning&uacute;n almac&eacute;n'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
             }
             }else {
                 $js="alert_('El C&oacute;digo del Art&iacute;culo No es de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
             }
          }else {
             $js="alert_('El C&oacute;digo del Art&iacute;culo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]'.$com.']';
        break;
      case '6':
        $mascaraart=Herramientas::getMascaraArticulo();
          $lonart=strlen($mascaraart);
          $idcodalm=$this->getRequestParameter('idcodalm');
          $idnomalm=$this->getRequestParameter('idnomalm');
          $idcodubi=$this->getRequestParameter('idcodubi');
          $idnomubi=$this->getRequestParameter('idnomubi');
          $com=''; $numlot='';

          $q= new Criteria();
          $q->add(CaregartPeer::CODART,$codigo);
          $reg= CaregartPeer::doSelectOne($q);
          if ($reg)
          {
             if ($lonart==strlen($codigo))
             {
                 $dato=eregi_replace("[\n|\r|\n\r]", "", $reg->getDesart());
                 $c = new Criteria();
                 $c->add(CaartalmubiPeer::CODART,$codigo);
                 $c->addAscendingOrderByColumn(CaartalmubiPeer::CODALM);
                 $alm = CaartalmubiPeer::doSelectOne($c);
                 if ($alm)
                 {
                    $codalm=$alm->getCodalm();
                    $nomalm=CadefalmPeer::getDesalmacen($codalm);
                    $codubi=$alm->getCodubi();
                    $nomubi=CadefubiPeer::getDesubicacion($codubi);
                    if ($manartlot=='S')
                        $numlot=$alm->getNumlot();
                    $com=',["'.$idcodalm.'","'.$codalm.'",""],["'.$idnomalm.'","'.$nomalm.'",""],["'.$idcodubi.'","'.$codubi.'",""],["'.$idnomubi.'","'.$nomubi.'",""]';
                 }else {
                 $js="alert_('El C&oacute;digo del Art&iacute;culo: ".$codigo."  no esta asociado a ning&uacute;n almac&eacute;n'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
             }
             }else {
                 $js="alert_('El C&oacute;digo del Art&iacute;culo No es de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
             }
          }else {
             $js="alert_('El C&oacute;digo del Art&iacute;culo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $this->numlot=$numlot;
        $this->lotes=$this->ObtenerNumlotxart($codigo,$codalm,$codubi);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]'.$com.']';
        break;
      case '7':
          $codart=$this->getRequestParameter('codart');
          $idcodubi=$this->getRequestParameter('idcodubi');
          $idnomubi=$this->getRequestParameter('idnomubi');
          $com='';
          if ($codart!="")
          {
              $q= new Criteria();
              $q->add(CadefalmPeer::CODALM,$codigo);
              $reg= CadefalmPeer::doSelectOne($q);
              if ($reg)
              {
                 $manaartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
                 $dato=$reg->getNomalm();

                 $d = new Criteria();
                 $d->add(CaartalmubiPeer::CODALM,$codigo);
                 $d->add(CaartalmubiPeer::CODART,$codart);
                 $d->addAscendingOrderByColumn(CaartalmubiPeer::CODUBI);
                 $alm = CaartalmubiPeer::doSelectOne($d);
                 if ($alm)
                 {
                     $codubi=$alm->getCodubi();
                     $nomubi=CadefubiPeer::getDesubicacion($codubi);
                     if ($manartlot=='S')
                       $numlot=$alm->getNumlot();
                     else $numlot="";

                     $com=',["'.$idcodubi.'","'.$codubi.'",""],["'.$idnomubi.'","'.$nomubi.'",""]';
                 }else {
                     $js="alert_('El Art&iacute;culo : ".$codart.", no existe en el Almac&eacute;n seleccionado: ".$codigo." ');  $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                 }

              }else {
                 $js="alert_('El Almace&eacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }
          }else {
            $js="alert_('Debe seleccionar un Art&iacute;culo ...'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]'.$com.']';
        break;
      case '8':
          $codart=$this->getRequestParameter('codart');
          $idcodubi=$this->getRequestParameter('idcodubi');
          $idnomubi=$this->getRequestParameter('idnomubi');
          $com=''; $numlot="";
          if ($codart!="")
          {
              $q= new Criteria();
              $q->add(CadefalmPeer::CODALM,$codigo);
              $reg= CadefalmPeer::doSelectOne($q);
              if ($reg)
              {
                 $dato=$reg->getNomalm();

                 $d = new Criteria();
                 $d->add(CaartalmubiPeer::CODALM,$codigo);
                 $d->add(CaartalmubiPeer::CODART,$codart);
                 $d->addAscendingOrderByColumn(CaartalmubiPeer::CODUBI);
                 $alm = CaartalmubiPeer::doSelectOne($d);
                 if ($alm)
                 {
                     $codubi=$alm->getCodubi();
                     $nomubi=CadefubiPeer::getDesubicacion($codubi);
                     if ($manartlot=='S')
                       $numlot=$alm->getNumlot();

                     $com=',["'.$idcodubi.'","'.$codubi.'",""],["'.$idnomubi.'","'.$nomubi.'",""]';
                 }else {
                     $js="alert_('El Art&iacute;culo : ".$codart.", no existe en el Almac&eacute;n seleccionado: ".$codigo." ');  $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                 }

              }else {
                 $js="alert_('El Almace&eacute;n no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }
          }else {
            $js="alert_('Debe seleccionar un Art&iacute;culo ...'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
          $this->numlot=$numlot;
          $this->lotes=$this->ObtenerNumlotxart($codart,$codigo,$codubi);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]'.$com.']';
        break;
      case '9':
          $codart=$this->getRequestParameter('codart');
          $codalm=$this->getRequestParameter('codalm');
          $com='';  $numlot="";
          if ($codart!="")
              {
              if ($codalm!="")
              {
                   $c = new Criteria();
                   $c->add(CaartalmubiPeer::CODALM,$codalm);
                   $c->add(CaartalmubiPeer::CODUBI,$codigo);
                   $c->add(CaartalmubiPeer::CODART,$codart);
                   $alm = CaartalmubiPeer::doSelectOne($c);
                   if ($alm)
                   {
                      $dato=CadefubiPeer::getDesubicacion($codigo);
                      if ($manartlot=='S')
                         $numlot=$alm->getNumlot();
                   }else {
                       $js="alert_('La Ubicaci&oacute;n : ".$codigo.", no existe para el Almac&eacute;n seleccionado: ".$codalm." y el Art&iacute;culo ".$codart." '); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                   }
              }else {
                  $js="alert_('Primero debe seleccionar un Almac&eacute;n...'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }
          }else {
              $js="alert_('Primero debe seleccionar un Art&iacute;culo...'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      case '10':
          $codart=$this->getRequestParameter('codart');
          $codalm=$this->getRequestParameter('codalm');
          $com='';  $numlot="";
          if ($codart!="")
          {
              if ($codalm!="")
              {
                   $c = new Criteria();
                   $c->add(CaartalmubiPeer::CODALM,$codalm);
                   $c->add(CaartalmubiPeer::CODUBI,$codigo);
                   $c->add(CaartalmubiPeer::CODART,$codart);
                   $alm = CaartalmubiPeer::doSelectOne($c);
                   if ($alm)
                   {
                      $dato=CadefubiPeer::getDesubicacion($codigo);
                      if ($manartlot=='S')
                         $numlot=$alm->getNumlot();
                   }else {
                       $js="alert_('La Ubicaci&oacute;n : ".$codigo.", no existe para el Almac&eacute;n seleccionado: ".$codalm." y el Art&iacute;culo ".$codart." '); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
                   }
              }else {
                  $js="alert_('Primero debe seleccionar un Almac&eacute;n...'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
              }
          }else {
              $js="alert_('Primero debe seleccionar un Art&iacute;culo...'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
          $this->numlot=$numlot;
  	  $this->lotes=$this->ObtenerNumlotxart($codart,$codalm,$codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }
    $this->ajaxs=$ajax;
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    if ($ajax!='4' && $ajax!='6' && $ajax!='8' && $ajax!='10')return sfView::HEADER_ONLY;

  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
        $this->casalalm = $this->getCasalalmOrCreate();
        try{
        $this->updateCasalalmFromRequest();
        }catch(Exception $ex){}

        $this->configGrid($this->casalalm->getCodsal());
        $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

        if (!$this->casalalm->getId())
        {
              $x=$grid[0];
              $manartlot=H::getConfApp2('manartlot', 'compras', 'almregart');
              $j=0;
              $msg="";
              $encontro=false;
              while ($j<count($x))
              {

                 if ($x[$j]->getCantot()>0)
                 {
                  $encontro=true;
                    if ($manartlot=='S')
                    {
                      if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="" or  $x[$j]->getNumlot()=="")
                         {
                                $this->coderr=578;
                                 break;
                         }
                    }else {
                       if ($x[$j]->getCodalm()=="" or  $x[$j]->getCodubi()=="" )
                         {
                                $this->coderr=579;
                             break;
                         }
                    }
                      if ($manartlot=='S')
                    {
                      if (!Despachos::verificaexisydisp($x[$j]->getCodart(),$x[$j]->getCodalm(),$x[$j]->getCodubi(),H::toFloat($x[$j]->getCantot()),&$msg,$x[$j]->getNumlot()))
                      {
                         $this->coderr=$msg;
                         break;
                      }
                    }else {
                      if (!Despachos::verificaexisydisp($x[$j]->getCodart(),$x[$j]->getCodalm(),$x[$j]->getCodubi(),H::toFloat($x[$j]->getCantot()),&$msg))
                      {
                         $this->coderr=$msg;
                         break;
                      }
                    }
                 }
                 else
                 {
                        $this->coderr=580;
                        break;
                 }
                 $j++;
              } 
               if (!$encontro)
               {
                   $this->coderr=160;
               }
           }
        
      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
  }

  public function saving($clasemodelo)
  {
     if ($clasemodelo->getId())
        $griddet=array();
   else
        $griddet=Herramientas::CargarDatosGridv2($this,$this->obj);

    $clasemodelo->setStasal('A');
    $coderr=Almacen::salvarAlmsalalm($clasemodelo,$griddet);

    return $coderr;
    
  }

  public function deleting($clasemodelo)
  {
    Almacen::eliminarAlmsalalm($clasemodelo);

    return -1;
  }

  public function ObtenerNumlotxart($codart="",$codalm="",$codubi="")
   {
    $c = new Criteria();
    $c->add(CaartalmubiPeer::CODALM,$codalm);
    $c->add(CaartalmubiPeer::CODUBI,$codubi);
    $c->add(CaartalmubiPeer::CODART,$codart);
    $c->add(CaartalmubiPeer::EXIACT,0,Criteria::GREATER_THAN);
    $c->addAscendingOrderByColumn(CaartalmubiPeer::FECVEN);

    $datos = CaartalmubiPeer::doSelect($c);

    $lotes = array();
    if ($datos)
    {
        foreach($datos as $obj_datos)
        {
         if ($obj_datos->getFecven()!="")
         {
            $fecven=date("d/m/Y",strtotime($obj_datos->getFecven()));
            $lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot()." - ".$fecven);
         }
          else
            $lotes += array($obj_datos->getNumlot() => $obj_datos->getNumlot());

        }
    }
    return $lotes;
  }


}
