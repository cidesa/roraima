<?php
/**
 * almordcom actions.
 *
 * @package    siga
 * @subpackage almordcom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */

class almordcomActions extends autoalmordcomActions
{

  public  $coderror1=-1;
  public  $coderror2=-1;

  public function validateEdit()
  {
  $this->caordcom = $this->getCaordcomOrCreate();
    $this->updateCaordcomFromRequest();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if ($this->getRequestParameter('id')=="")
      {
        if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('caordcom[fecord]')))
        {
          $this->coderror1=151;
          return false;
        }

        if (!Herramientas::validarPeriodoFiscal($this->getRequestParameter('caordcom[fecord]')))
        {
            $this->coderror1=150;
            return false;
        }
        $grid_detalle=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
        $grid_entregas=Herramientas::CargarDatosGrid($this,$this->obj_entregas,true);//0
        //$grid_recargos=Herramientas::CargarDatosGrid($this,$this->obj_recargos,true);//0
        //$grid_recargos_detalle=$grid_recargos[0];
        $grid_detalle_detallado=$grid_detalle[0];

        $grid_resumen=Herramientas::CargarDatosGrid($this,$this->obj_resumen,true);//0
        Orden_compra::armarArregloTotalesRecargo($this->caordcom, $grid_detalle_detallado,&$grid_recargos_detalle);
        $i=0;
        $hay_disponibilidad=false;
        $verificardisponibilidad = $this->caordcom->AfectaDisponibilidad();

        if($verificardisponibilidad){

          while ($i<count($grid_detalle[0]))
          {
            $hay_disponibilidad=true;
            if($this->getRequestParameter('caordcom[refsol]')!="")
              $refe='1';
            else
              $refe='0';

            Orden_compra::chequear_disponibilidad_presupuesto($this->caordcom,$grid_detalle[0],$i,$refe,&$sobregiro,&$codigo_presupuestario_sin_disponibilidad);
            if ($sobregiro)
            { $hay_disponibilidad=false; }

          if(!$hay_disponibilidad)
            {
              $this->codigo_presupuestario=$codigo_presupuestario_sin_disponibilidad;
              $this->coderror1=118;
              return false;
            }
            $i++;
          }

          if ($hay_disponibilidad)
          {
            if ($this->getRequestParameter('caordcom[refsol]')!="")
              $refe='1';
            else
              $refe='0';
            $i=0;
            $grid_total_unidad=array();
            if (count($grid_recargos_detalle)>0)
            {
              while ($i<count($grid_recargos_detalle))
              {
                if ($grid_recargos_detalle[$i]['monrgo'] >0)
                {
                $hay_disponiblididad_recargos=Orden_compra::chequear_disponibilidad_recargo($grid_recargos_detalle[$i]['codrgo'],$grid_recargos_detalle[$i]['monrgo'],$grid_detalle[0],$grid_recargos_detalle,$refe,&$sobregiro_recargo,$grid_total_unidad);
                if (!$hay_disponiblididad_recargos)
                {
                    $this->coderror1=119;
                    return false;
                }
              }
              $i++;
              }
            }
          }
        }

        return true;
      }
      else
      {
        if (Herramientas::getX_vacio('ordcom','caordcom','staord',$this->caordcom->getOrdcom())=='N')
        {
          $this->coderror1=159;
          return false;
        }
        else
        {
          return true;
        }
      }
    }else return false;
  }

  public function handleErrorEdit()
    {
      $this->preExecute();
      $this->caordcom = $this->getCaordcomOrCreate();
      $this->listatipocompra = Constantes::ListaTipoCompra();
      $this->imp=$this->getRequestParameter('impche');
    $this->readonly='';

      try
      {
        $this->updateCaordcomFromRequest();
      }
      catch (Exception $ex){}
    $this->setVars();
      $this->labels = $this->getLabels();
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        if($this->coderror1!=-1)
        {
            $err = Herramientas::obtenerMensajeError($this->coderror1);
            if ($this->coderror1==118)
              $this->getRequest()->setError('',$err.'  ->  '.$this->codigo_presupuestario);
            else
               $this->getRequest()->setError('',$err);

        }
      }
      return sfView::SUCCESS;
    }

  public function ValidarGeneroComprobantes()
  {
  $var=false;
    if ($this->getUser()->getAttribute('contabc[numcom]',null,$this->getUser()->getAttribute('formulario')))
       $var=true;
    return $var;
  }



  protected function getCaordcomOrCreate($id = 'id')
  {
      if (!$this->getRequestParameter($id))
      {
        $caordcom = new Caordcom();
        $caordcom->setCodemp(Herramientas::getCodempFromCedemp());
        $this->aprobacion='N';
        $c= new Criteria();
        $cadefart_search = CadefartPeer::doSelectOne($c);
        if ($cadefart_search)
        {
        if (($cadefart_search->getComasopre()=='S') and ($cadefart_search->getComreqapr()=='S'))
          $this->aprobacion='S';
        else
          $this->aprobacion='N';
        }
        $this->setVars();
        $this->funciones_combos($this->getRequestParameter('caordcom[codpai]'),$this->getRequestParameter('caordcom[codedo]'),$this->getRequestParameter('caordcom[codmun]'));
        //si viene de una referencia y no se carga parcialmente
        if (($this->getRequestParameter('caordcom[refsol]')!="") and ($this->getRequestParameter('parcial')=="N"))
          $this->configGrid($this->getRequestParameter('caordcom[refsol]'),'1');
        //si viene de una referencia y se carga parcialmente
        else if (($this->getRequestParameter('caordcom[refsol]')!="") and ($this->getRequestParameter('parcial')=="S"))
        {
          if ($this->getRequestParameter('caordcom[rifpro]')!='')
          {
            if (Orden_compra::Verificar_proveedor(trim($this->getRequestParameter('caordcom[refsol]')),trim($this->getRequestParameter('caordcom[rifpro]')),&$rifpro,&$msg,&$cancotpril,&$strrifpro,&$srtrefcot))
              $this->configGrid_Parcial($this->getRequestParameter('caordcom[refsol]'),trim($this->getRequestParameter('caordcom[rifpro]')));
          }
        }
        //si no viene de una referencia y no se carga parcialmente
        else
          $this->configGrid($this->getRequestParameter('caordcom[ordcom]'),'0');

        /*  if (($this->getRequestParameter('caordcom[refsol]')!="") and ($this->getRequestParameter('parcial')=="S"))
          $this->configGrid_Recargos($this->getRequestParameter('caordcom[refsol]'),$this->getRequestParameter('caordcom[rifpro]'));
        else
          $this->configGrid_Recargos($this->getRequestParameter('caordcom[ordcom]'),'0');*/

        $this->configGridRecargo();
        $this->configGrid_Resumen($this->getRequestParameter('caordcom[ordcom]'));
        $this->configGrid_ResumenPartidas($this->getRequestParameter('caordcom[ordcom]'));
        $this->configGrid_Entregas($this->getRequestParameter('caordcom[ordcom]'));
      }
      else
      {
        $this->aprobacion='N';
        $c= new Criteria();
        $cadefart_search = CadefartPeer::doSelectOne($c);
        if ($cadefart_search)
        {
          if (($cadefart_search->getComasopre()=='S') and ($cadefart_search->getComreqapr()=='S'))
          $this->aprobacion='S';
        else
          $this->aprobacion='N';
        }
        $caordcom = CaordcomPeer::retrieveByPk($this->getRequestParameter($id));
        $sql = "Select fecanu from caordcom Where ordcom='".$caordcom->getOrdcom()."' and staord='N'";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
            $fec=adodb_date('d/m/Y',adodb_strtotime($result[0]['fecanu']));
            $this->setFlash('notice','Orden de Compra fue Anulada el dia '.$fec);
        }
        $this->setVars();
        $this->funciones_combos($caordcom->getCodpai(),$caordcom->getCodedo(),$caordcom->getCodmun());
        $this->configGrid($caordcom->getOrdcom(),'0');
        $this->configGridRecargo();
        $this->configGrid_Resumen($caordcom->getOrdcom());
        $this->configGrid_ResumenPartidas($caordcom->getOrdcom());
        $this->configGrid_Entregas($caordcom->getOrdcom());
        $this->forward404Unless($caordcom);
      }

      return $caordcom;
  }

  public function executeEdit()
  {
    $this->caordcom = $this->getCaordcomOrCreate();
    $this->imp=$this->getRequestParameter('impche');
    $this->listatipocompra = Constantes::ListaTipoCompra();
    $this->readonly='';
            //$err = Herramientas::obtenerMensajeError($coderror);

    if ($this->caordcom->getOrdcom()!='')
      $this->readonly='readonly';

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCaordcomFromRequest();
      if ($this->saveCaordcom($this->caordcom)==-1)
      {
        $this->caordcom->setId(Herramientas::getX_vacio('ordcom','caordcom','id',$this->caordcom->getOrdcom()));
        $this->setFlash('notice', 'Your modifications have been saved');
        if ($this->getRequestParameter('save_and_add'))
          return $this->redirect('almordcom/create');
        else if ($this->getRequestParameter('save_and_list'))
          return $this->redirect('almordcom/list');
        else
          return $this->redirect('almordcom/edit?imp=S&id='.$this->caordcom->getId());

      }//if ($this->saveCaordcom($this->caordcom)==-1)
      else
      {
           $this->labels = $this->getLabels();
           return sfView::SUCCESS;
      }
    }
    else
      $this->labels = $this->getLabels();
  }


  public function executeAjaxcompromiso()
  {
        $this->getUser()->getAttributeHolder()->remove('genero_compromiso');
    $this->getUser()->setAttribute('genero_compromiso', 'S');
    //print $this->getUser()->getAttribute('genero_compromiso');
    return sfView::HEADER_ONLY;
  }



  public function executeAjaxcomprobante()
  {
      //elimino las sessiones
      $this->getUser()->getAttributeHolder()->remove('reftra');
      $this->getUser()->getAttributeHolder()->remove('grabar');
      $this->getUser()->getAttributeHolder()->remove('fectra');
      $this->getUser()->getAttributeHolder()->remove('destra');
      $this->getUser()->getAttributeHolder()->remove('ctas');
      $this->getUser()->getAttributeHolder()->remove('tipmov');
      $this->getUser()->getAttributeHolder()->remove('mov');
      $this->getUser()->getAttributeHolder()->remove('montos');

    if (Herramientas::getVerCorrelativo('ordcom','cadefart',&$r))
    {
      if (trim($this->getRequestParameter('reftra'))=='--------')
      {
        $ordcom=str_pad($r, 8, '0', STR_PAD_LEFT);
        $ordcom=Herramientas::getBuscar_correlativo($ordcom,'cadefart','ordcom','caordcom','ordcom');
      }
      else
      {
        $ordcom=str_replace('#','0',$caordcom->getOrdcom());
        $ordcom=str_pad($caordcom->getOrdcom(), 8, '0', STR_PAD_LEFT);
        $ordcom=Herramientas::getBuscar_correlativo($ordcom,'cadefart','ordcom','caordcom','ordcom');
      }
    }
    $tiporec = Herramientas::getX_vacio('rifpro','caprovee','tipo',trim($this->getRequestParameter('rifpro')));

    if (trim($this->getRequestParameter('tipord'))=='C')
      $numerocomprob='OC'.substr(trim($ordcom), 2, 6);
    elseif(trim($this->getRequestParameter('tipord'))=='S')
      $numerocomprob='OS'.substr(trim($ordcom), 2, 6);
    else
      $numerocomprob='OC'.substr(trim($ordcom), 2, 6);


    //asigno sesssiones
      $this->getUser()->setAttribute('reftra', $numerocomprob,trim($this->getRequestParameter('formulario')));
        $this->getUser()->setAttribute('grabar', 'N',trim($this->getRequestParameter('formulario')));
        $this->getUser()->setAttribute('fectra', trim($this->getRequestParameter('fectra')),trim($this->getRequestParameter('formulario')));
        $this->getUser()->setAttribute('destra', trim($this->getRequestParameter('destra')),trim($this->getRequestParameter('formulario')));
    $this->getUser()->setAttribute('tipmov', trim($this->getRequestParameter('tipmov')),trim($this->getRequestParameter('formulario')));
      $afectaproyecto=false;

        if (trim($this->getRequestParameter('tippro'))!='')
        {
          $result=array();
          $sql = "Select ctaord,ctaper from catippro where Codpro='".trim($this->getRequestParameter('tippro'))."'";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
              if (($result[0]['ctaord']!='')and($result[0]['ctaper']!=''))
              {
                $ctaproyord = $result[0]['ctaord'];
            $ctaproyper = $result[0]['ctaper'];
              $afectaproyecto=true;
              }
              else
                $msg='Proyecto de codigo:'.$this->getRequestParameter('tippro').' no tiene cuentas asociadas';
        }
        }

        if ($afectaproyecto)
        {
          $result1=array();
          $sql1 = "SELECT codcta,descta FROM contabb WHERE codcta ='".trim($ctaproyord)."'";
        if (Herramientas::BuscarDatos($sql1,&$result1))
        {
              $codcta = $result1[0]['codcta'];
          $desc_ctas = $result1[0]['descta'];
        }
        else
          $msg='El Proyecto '.$this->getRequestParameter('tippro').' no tiene una Cuenta de Orden válida asociada';

        $result2=array();
          $sql2 = "SELECT codcta,descta FROM contabb WHERE codcta ='".trim($ctaproyper)."'";
        if (Herramientas::BuscarDatos($sql2,&$result2))
        {
              $codcta = $codcta.'_'.$result2[0]['codcta'];
          $desc_ctas = $desc_ctas.'_'.$result2[0]['descta'];
        }
        else
          $msg='El Proyecto '.$this->getRequestParameter('tippro').' no tiene una Cuenta de Percontra válida asociada';

        $this->getUser()->setAttribute('ctas', $codcta, trim($this->getRequestParameter('formulario')));
        $this->getUser()->setAttribute('desctas', $desc_ctas, trim($this->getRequestParameter('formulario')));
        $this->getUser()->setAttribute('mov', 'C_D', trim($this->getRequestParameter('formulario')));
        $this->getUser()->setAttribute('montos', trim($this->getRequestParameter('monto')).'_'.trim($this->getRequestParameter('monto')), trim($this->getRequestParameter('formulario')));
        }
      else
      {
        $result3=array();
          $sql3 = "select codord,codordadi,codordadi,codperconadi,codpercon from OPBenefi where CedRif='".trim($this->getRequestParameter('rifpro'))."'";
        if (Herramientas::BuscarDatos($sql3,&$result3))
        {
            if (trim($this->getRequestParameter('tipord'))!='S')
            {
              if ($tiporec!='C') // si es proveedor
              {
                if (trim($result3[0]['codord'])!='')
                  $codigocuenta=$result3[0]['codord'];
                else
                  $codigocuenta='';
              }
              else // si es contratoista
              {
                if (trim($result3[0]['codordadi'])!='')
                  $codigocuenta=$result3[0]['codordadi'];
                else
                  $codigocuenta='';
              }
            }
            else
            {
                if ($tiporec!='C') // si es proveedor
                {
                  if (trim($result3[0]['codordadi'])!='')
                    $codigocuenta=$result3[0]['codordadi'];
                  else
                    $codigocuenta='';
                }
                else // si es contratoista
                {
                  if (trim($result3[0]['codord'])!='')
                    $codigocuenta=$result3[0]['codord'];
                  else
                    $codigocuenta='';
                }
            }

              $result4=array();
              $sql4 = "SELECT codcta,descta FROM CONTABB WHERE codcta ='".trim($codigocuenta)."'";
            if (Herramientas::BuscarDatos($sql4,&$result4))
            {
                  $codcta = $result4[0]['codcta'];
              $desc_ctas = $result4[0]['descta'];
            }
            else
              $msg='El Beneficiario " + DatosOrd(2).Text + " no tiene una Cuenta de Orden válida asociada';


            if (trim($this->getRequestParameter('tipord'))!='S')
            {
              if ($tiporec!='C') // si es proveedor
              {
                if (trim($result3[0]['codpercon'])!='')
                  $codigocuenta=$result3[0]['codpercon'];
                else
                  $codigocuenta='';
              }
              else // si es contratoista
              {
                if (trim($result3[0]['codperconadi'])!='')
                  $codigocuenta=$result3[0]['codperconadi'];
                else
                  $codigocuenta='';
              }
            }
            else
            {
              if ($tiporec!='C') // si es proveedor
              {
                if (trim($result3[0]['codperconadi'])!='')
                  $codigocuenta=$result3[0]['codperconadi'];
                else
                  $codigocuenta='';
              }
              else // si es contratoista
              {
                if (trim($result3[0]['codpercon'])!='')
                  $codigocuenta=$result3[0]['codpercon'];
                else
                  $codigocuenta='';
              }
            }
              $result5=array();
              $sql5 = "SELECT codcta,descta FROM CONTABB WHERE codcta ='".trim($codigocuenta)."'";
            if (Herramientas::BuscarDatos($sql5,&$result5))
            {
                  $codcta = $codcta.'_'.$result5[0]['codcta'];
              $desc_ctas = $desc_ctas.'_'.$result5[0]['descta'];
            }
            else
              $msg='El Beneficiario " + DatosOrd(2).Text + " no tiene una Cuenta de Percontra válida asociada';

          $this->getUser()->setAttribute('ctas', $codcta, trim($this->getRequestParameter('formulario')));
          $this->getUser()->setAttribute('desctas', $desc_ctas, trim($this->getRequestParameter('formulario')));
          $this->getUser()->setAttribute('mov', 'C_D', trim($this->getRequestParameter('formulario')));
          $this->getUser()->setAttribute('montos', trim($this->getRequestParameter('monto')).'_'.trim($this->getRequestParameter('monto')), trim($this->getRequestParameter('formulario')));
        }
      }
    return sfView::HEADER_ONLY;
  }


  public function executeAjax()
  {
  $cajtexmos=$this->getRequestParameter('cajtexmos');
  $cajtexcom=$this->getRequestParameter('cajtexcom');
  $cajtexmos2=$this->getRequestParameter('cajtexmos2');
  $javascript="";
  if ($this->getRequestParameter('ajax')=='2')
  {
    $codigo=trim(strtoupper($this->getRequestParameter('codigo')));
    $dato=CpdoccomPeer::getNomext($codigo);
    $this->mostrar=false;
    if ($codigo!='')
    {
      if (Herramientas::getX_vacio('TipCom','CpDocCom','RefPrc',$codigo)!='N')
      {
        $this->mostrar=true;
        $val = true;
        $opcion='1';
        $javascript="$('div_solicitud').show();$('caordcom_refprc_s').checked=true";
        $output = '[["'.$cajtexcom.'","'.$codigo.'",""],["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else
        {
        $javascript="$('div_solicitud').hide();;$('caordcom_refprc_n').checked=true";
        $output = '[["'.$cajtexcom.'","'.$codigo.'",""],["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
    }//if (trim($this->getRequestParameter('codigo'))!='')
  }
  else  if ($this->getRequestParameter('ajax')=='3')
  {
  	$tipord = $this->getRequestParameter('tipord');
  	//print $tipord;
    $c= new Criteria();
    $c->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
    if($tipord=='S' || $tipord=='A') $c->add(CaregartPeer::TIPO,$this->getRequestParameter('tipord'));
    $reg=CaregartPeer::doSelectOne($c);
    if ($reg)
    {
      $dato=htmlspecialchars($reg->getDesart());
      $dato1=$reg->getUnimed();
      $dato2=number_format($reg->getCosult(),2,',','.');
      $dato3=$reg->getCodpar();
//    $dato4=NppartidasPeer::getNompar($dato3);
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato1.'",""],["'.$this->getRequestParameter('costo').'","'.$dato2.'",""],["'.$this->getRequestParameter('partida').'","'.$dato3.'",""]]';
    }
    else
    {
      $javascript="alert('Articulo no existe, o no es un Articulo/Servicio');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('costo') ."').value='0.00';$('". $this->getRequestParameter('partida') ."').value=''";
      $output = '[["javascript","'.$javascript.'",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='4')
  {
    $dato=CarecargPeer::getRecargo(trim($this->getRequestParameter('codigo')));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='5')
  {
    $dato=CpasiiniPeer::getExiste_pre(trim($this->getRequestParameter('codigo')));
    if ($dato=='') $dato='Codigo Presupuestario no Existe';
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='6')
  {
    $dato=CaconpagPeer::getDesconpag(trim($this->getRequestParameter('codigo')));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexmos2.'","'.$this->getRequestParameter('codigo').'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='7')
  {
    $dato=CaforentPeer::getDesforent(trim($this->getRequestParameter('codigo')));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexmos2.'","'.$this->getRequestParameter('codigo').'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='8')
  {
    $dato=CatipproPeer::getDespro(trim($this->getRequestParameter('codigo')));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='9')
  {
    $dato=FortipfinPeer::getDesfin(trim($this->getRequestParameter('codigo')));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='10')
  {
    $dato=BnubicaPeer::getDesubi(trim($this->getRequestParameter('codigo')));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='11')
  {
    $dato=NphojintPeer::getNomemp(trim($this->getRequestParameter('codigo')));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='12')
  {
    $dato=CpasiiniPeer::getExiste_pre(trim($this->getRequestParameter('codigo')));
    if ($dato=='') $dato='';
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='13')
  {
    $bandera=trim($this->getRequestParameter('bandera'));
    $codigo=trim($this->getRequestParameter('codigo'));
    $ano=substr(trim($this->getRequestParameter('fecha')), 6, 4);
    $monto=trim($this->getRequestParameter('monto'));
    $vacio='';
    $result=array();
    $monto=Herramientas::convnume($monto);
    $sql = "Select mondis from CPAsiIni WHERE CodPre = '".$codigo."' AND PERPRE = '00' and AnoPre='".$ano."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
      if ($monto > $result[0]['mondis'])
      {
        $javascript="alert_('El C&oacute;digo ".$codigo. " no tiene disponibilidad');";
      }
    }
    else
    {
      $javascript="alert_('El C&oacute;digo Presupuestario no existe');";
    }
    $output = '[["javascript","'.$javascript.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='14')
  {
      $var='';
      $fecha=$this->getRequestParameter('codigo');
        if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo')))
        {
          $var='P';
          $fecha='';
        }
        if ((!Herramientas::validarPeriodoFiscal($this->getRequestParameter('codigo')) and ($var=='')))
        {
          $var='F';
      $fecha='';
        }
        $cajtexmos='periodo';
        $cajtexmos_fecha='caordcom_fecord';
    $output = '[["'.$cajtexmos.'","'.$var.'",""],["'.$cajtexmos_fecha.'","'.$fecha.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }
  else  if ($this->getRequestParameter('ajax')=='15')//Calcular Recargos
      {
        $desrgo=CarecargPeer::getRecargo($this->getRequestParameter('codigo'));
        $montorgotab=CarecargPeer::getDato($this->getRequestParameter('codigo'),'monrgo');
        $monrgo=number_format(CarecargPeer::getDato($this->getRequestParameter('codigo'),'monrgo'),2,',','.');
        $tiprgo=CarecargPeer::getDato($this->getRequestParameter('codigo'),'tiprgo');
        $reccal=SolicituddeEgresos::CalcularRecargos($tiprgo,$monrgo,$this->getRequestParameter('monart'));
        $reccalformat=number_format($reccal,2,',','.');
        $codpar=CarecargPeer::getDato($this->getRequestParameter('codigo'),'codpre');
        if ($tiprgo=='M')//Tipo recargo puntual (monto)
            $javascript="$('".$this->getRequestParameter('moncal')."').readOnly=false;actualizarsaldos_r();";
        else //Tipo de recargo por porcentaje
          $javascript="actualizarsaldos_r();";
        $output = '[["'.$cajtexmos.'","'.$desrgo.'",""],["'.$cajtexcom.'","4","c"],["'.$this->getRequestParameter('monto').'","'.$monrgo.'",""],["'.$this->getRequestParameter('tipo').'","'.$tiprgo.'",""],["'.$this->getRequestParameter('moncal').'","'.$reccalformat.'",""],["'.$this->getRequestParameter('codpar').'","'.$codpar.'",""],["javascript","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
      }
 else if ($this->getRequestParameter('ajax')=='16')//Trae la partida de cada recargo
      {
        print $this->getRequestParameter('codigo');
       $partida=H::getX('CODRGO','Carecarg','Codpre',$this->getRequestParameter('codigo'));
        $output = '[["caordcom_partrec","'.$partida.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
  }


  public function configGrid($ordcom='',$referencia='')
  {
    $this->getUser()->getAttributeHolder()->remove('referencia');
    $c = new Criteria();
    if ($referencia==0)
    {
      $c->add(CaartordPeer::ORDCOM,$ordcom);
      $c->addAscendingOrderByColumn(CaartordPeer::CODART);
      $per = CaartordPeer::doSelect($c);
      $campo_col5='Canord';//tabla Caartord
      $campo_col6='Canaju';//tabla Caartord
      $campo_col8='Cantot';//tabla Caartord
      $campo_col9='Preart';//tabla Caartord
      $campo_col10='Dtoart';//tabla Caartord
      $campo_col11='Rgoart';//tabla Caartord
      $campo_col12='Totart';//tabla Caartord
      $campo_col13='Unimed';//tabla Caartord
      $campo_col14='Codpre';//tabla Caartord
      $this->getUser()->setAttribute('referencia', '0');
      if (Herramientas::getX_vacio('ordcom','Caartord','ordcom',$ordcom)!='')
        $filas_arreglo=0;
      else
        $filas_arreglo=150;
    }
    elseif ($referencia==1)
    {
    $c = new Criteria();
    $c->add(CaartsolPeer::REQART,$ordcom);
      $per = CaartsolPeer::doSelect($c);
      $campo_col5='Canreq';//tabla Caartsol
      $campo_col6='Canaju';//tabla Caartsol
      $campo_col8='Canreq';//tabla Caartsol
      $campo_col9='Costo';//tabla Caartsol
      $campo_col10='Mondes';//tabla Caartsol
      $campo_col11='Monrgo';//tabla Caartsol
      $campo_col12='Montot';//tabla Caartsol
      $campo_col13='Unimed';//tabla Caartsol
      $campo_col14='Codpre';//tabla Caartsol
      $this->getUser()->setAttribute('referencia', '1');
      $filas_arreglo=0;
    }
    $mascaraarticulo=$this->mascaraarticulo;
    $lonart=strlen($mascaraarticulo);
    $formatocategoria=$this->formatocategoria;
        $loncat=strlen($formatocategoria);
    $params2= array('param1' => $loncat);


    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    if ($filas_arreglo>0) $opciones->setEliminar(true);
    else $opciones->setEliminar(false);
    $opciones->setFilas($filas_arreglo);
    if ($referencia==0)
      $opciones->setTabla('Caartord');
    else
        $opciones->setTabla('Caartsol');
    $opciones->setName('a');
    $opciones->setAncho(2100);
    $opciones->setAnchoGrid(2100);
    $opciones->setTitulo('Detalle de la Orden de Requisición');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    $col1->setEsGrabable(true);
    $col1->setHTML(' ');
    $col1->setJScript('onClick="desmarcarfila(this.id)"');

    $lonart=strlen($this->mascaraarticulo);
    //$params= array('param1' => $lonart);

    $params= array('param1' => $lonart, 'param2' => "'+$('caordcom_tipord').value+'", 'val2');
    // Se generan las columnas
    $col2 = new Columna('Código  Artículo');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('Codart');
    if ($referencia==0 and $filas_arreglo>0) $col2->setHTML('type="text" size="15"  maxlength="'.chr(39).$lonart.chr(39).'"');
    if ($referencia==1 or $filas_arreglo==0) $col2->setHTML('type="text" size="15"  readonly=true');
    if ($referencia==0 and $filas_arreglo>0) $col2->setCatalogo('caregart','sf_admin_edit_form',array('codart' => 2,'desart' => 3, 'cospro' => 9, $campo_col13 => 13, 'codpar' => 15), 'Caregart_Almsolegr',$params);
    if ($referencia==0 ) $col2->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="javascript:event.keyCode=13; actualizo_cod_presupuestario(this.id);ajax_detalle_codigo_pre(event,this.id);ajaxdetalle(event,this.id);"');

    $col3 = new Columna('Descripción');
    $col3->setTipo(Columna::TEXTAREA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('Desart');
    $col3->setEsGrabable(true);
    $col3->setHTML('type="text" size="30x1" readonly=true');

    $col4 = new Columna('Cod. Unidad');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setNombreCampo('Codcat');
    if ($referencia==0 and $filas_arreglo>0) $col4->setHTML('type="text" size="15"  maxlength="'.chr(39).$loncat.chr(39).'"');
    if ($referencia==1 or $filas_arreglo==0) $col4->setHTML('type="text" size="15" readonly=true');
        if ($referencia==0 and $filas_arreglo>0) $col4->setCatalogo('Npcatpre','sf_admin_edit_form',array('codcat' => 4), 'Npcatpre_Almsolegr',$params2);
    if ($referencia==0 and $filas_arreglo>0) $col4->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$formatocategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="javascript:event.keyCode=13; actualizo_cod_presupuestario(this.id);ajax_detalle_codigo_pre(event,this.id);"');


    $col5 = new Columna('Cant. Ordenada');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo($campo_col5);
    $col5->setEsNumerico(true);
    if ($referencia==0 and $filas_arreglo>0) $col5->setHTML('type="text" size="10"');
    if ($referencia==1 or $filas_arreglo==0) $col5->setHTML('type="text" size="10" readonly=true');
    //if ($referencia==0) $col5->setJScript('onKeypress="entermonto(event,this.id); if (verificar_datos(this.id)){actualizo_cod_presupuestario(this.id);actualizar_total_grid_detalle_datos(event,this.id);actualizar_grid_dependientes();actualizar_check_para_recargo();actualizar_sumatoria_detallada_orden();actualizar_sumatoria_recargo_mas_orden();verifica_presupuesto(event,this.id);}"');
    if ($referencia==0 and $filas_arreglo>0) $col5->setJScript('onKeypress="entermonto(event,this.id); if (verificar_datos(this.id)){actualizar_total_grid_detalle_datos(event,this.id,"N");recalcularecargos(event,this.id);actualizar_grid_dependientes();verifica_presupuesto(event,this.id);}"');
    //if ($referencia==1) $col5->setJScript('onKeypress="entermonto(event,this.id);actualizar_sumatoria_total_cuando_esta_referida();actualizar_grid_dependientes()"');

    $col6 = clone $col5;
    $col6->setTitulo('Cant. Ajustada');
    $col6->setNombreCampo($campo_col6);
    if ($referencia==0) $col6->setHTML('type="text" size="10" readonly=true');


    $col7 = clone $col6;
    $col7->setTitulo('Cant.  Recibida');
    if ($referencia==0) $col7->setHTML('type="text" size="10" readonly=true');
    $col7->setNombreCampo('Canrec');

    $col8 = clone $col6;
    $col8->setTitulo('Cant. Total');
    if ($referencia==0) $col8->setHTML('type="text" size="10" readonly=true');
    $col8->setNombreCampo($campo_col8);

    $col9 = clone $col6;
    $col9->setTitulo('Costo');
    $col9->setHTML('type="text" size="10"');
    $col9->setNombreCampo($campo_col9);
      $col9->setJScript('onKeypress="entermonto(event,this.id); actualizar_total_grid_detalle_datos(event,this.id,"N");recalcularecargos(event,this.id);actualizar_grid_dependientes();verifica_presupuesto(event,this.id);"');

    $col10 = clone $col6;
    $col10->setTitulo('Descuento');
    $col10->setNombreCampo($campo_col10);
    $col10->setHTML('type="text" size="10"');
    //if ($referencia==0) $col10->setJScript('onKeypress="entermonto(event,this.id);actualizar_total_grid_detalle_datos(this.id);actualizar_grid_dependientes();actualizar_check_para_recargo();actualizar_sumatoria_detallada_orden();actualizar_sumatoria_recargo_mas_orden()"');
    //if ($referencia==0) $col10->setJScript('onKeypress="entermonto(event,this.id);actualizar_grid_dependientes();actualizar_check_para_recargo();actualizar_sumatoria_detallada_orden();actualizar_sumatoria_recargo_mas_orden()"');
    if ($referencia==0 and $filas_arreglo>0) $col10->setJScript('onKeypress="entermonto(event,this.id); actualizar_total_grid_detalle_datos(event,this.id,"S");actualizar_grid_dependientes();verifica_presupuesto(event,this.id);"');
    if ($referencia==1) $col10->setJScript('onKeypress="entermonto(event,this.id);actualizar_sumatoria_total_cuando_esta_referida();actualizar_grid_dependientes()"');
    $col10->setEsTotal(true,'sumatoria_descuentos');

    $col11 = clone $col6;
    $col11->setTitulo('Monto Recargo');
    $col11->setNombreCampo($campo_col11);
    if ($referencia==0) $col11->setHTML('type="text" size="10" readonly=true');

    $col12 = clone $col6;
    $col12->setTitulo('Total');
    $col12->setNombreCampo($campo_col12);
    $col12->setHTML('type="text" size="10" readonly=true');
    $col12->setEsTotal(true,'caordcom_monord');

    $col13 = new Columna('Unidad Medida');
    $col13->setTipo(Columna::TEXTO);
    $col13->setEsGrabable(true);
    $col13->setAlineacionObjeto(Columna::CENTRO);
    $col13->setAlineacionContenido(Columna::CENTRO);
    $col13->setNombreCampo($campo_col13);
    $col13->setHTML('type="text" size="10"');

    $col14 = new Columna('Codigo Presupuestario');
    $col14->setEsGrabable(true);
    $col14->setTipo(Columna::TEXTO);
    $col14->setAlineacionObjeto(Columna::CENTRO);
    $col14->setAlineacionContenido(Columna::CENTRO);
    $col14->setNombreCampo($campo_col14);
    if ($referencia==0) $col14->setHTML('type="text" size="32"');
    if ($referencia==1) $col14->setHTML('type="text" size="32" readonly=true');
    if ($referencia==0) $col14->setAjax('almordcom',5,14);

    $col15 = new Columna('Codigo Partida');
    $col15->setTipo(Columna::TEXTO);
    $col15->setEsGrabable(true);
    $col15->setOculta(true);
    $col15->setAlineacionObjeto(Columna::CENTRO);
    $col15->setAlineacionContenido(Columna::CENTRO);
    $col15->setNombreCampo('Codpar');
    $col15->setHTML('type="text" size="20"');

      $col16 = new Columna('Recargos');
      $col16->setTipo(Columna::TEXTO);
      $col16->setEsGrabable(false);
      $col16->setAlineacionObjeto(Columna::CENTRO);
      $col16->setAlineacionContenido(Columna::CENTRO);
      $col16->setNombreCampo('anadir');
      $col16->setHTML('type="text" size="1" style="border:none" class="imagenalmacen"');
      $col16->setJScript('onClick="mostrargridrecargos(this.id)"');


      $col17 = new Columna('cadena_datos_recargo');
        $col17->setTipo(Columna::TEXTO);
        $col17->setEsGrabable(true);
        $col17->setAlineacionObjeto(Columna::IZQUIERDA);
        $col17->setAlineacionContenido(Columna::IZQUIERDA);
        $col17->setNombreCampo('datosrecargo');
        $col17->setOculta(true);

    $col18 = new Columna('Nombre Partida');
    $col18->setTipo(Columna::TEXTO);
    $col18->setOculta(true);
    $col18->setAlineacionObjeto(Columna::CENTRO);
    $col18->setAlineacionContenido(Columna::CENTRO);
    $col18->setNombreCampo('nompar');
    $col18->setHTML('type="text" size="20"');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);


    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);

  }

  public function configGrid_Parcial($refsol='',$rifpro='')
  {
  Orden_compra::Obtener_Grid_Parcial($refsol,$rifpro,&$output);
  $per = $output;
  $filas_arreglo=0;
  $this->getUser()->setAttribute('referencia', '1');

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Caartord');
    $opciones->setName('a');
    $opciones->setAncho(2000);
    $opciones->setAnchoGrid(2000);
    $opciones->setTitulo('Detalle de la Orden de Requisición');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    $col1->setEsGrabable(true);
    $col1->setHTML(' ');

    // Se generan las columnas
    $col2 = new Columna('Código  Artículo');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('Codart');
    $col2->setHTML('type="text" size="15" readonly=true');

    $col3 = new Columna('Descripción');
    $col3->setTipo(Columna::TEXTAREA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('Desart');
    $col3->setEsGrabable(true);
    $col3->setHTML('type="text" size="30x1" readonly=true');

    $col4 = new Columna('Cod. Unidad');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setNombreCampo('Codcat');
    $col4->setHTML('type="text" size="15" readonly=true');

    $col5 = new Columna('Cant. Ordenada');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo('Canreq');
    $col5->setEsNumerico(true);
    $col5->setHTML('type="text" size="10" readonly=true');


    $col6 = clone $col5;
    $col6->setTitulo('Cant. Ajustada');
    $col6->setNombreCampo('Canaju');


    $col7 = clone $col6;
    $col7->setTitulo('Cant.  Recibida');
    $col7->setNombreCampo('Canrec');

    $col8 = clone $col6;
    $col8->setTitulo('Cant. Total');
    $col8->setNombreCampo('Canreq');

    $col9 = clone $col6;
    $col9->setTitulo('Costo');
    $col9->setHTML('type="text" size="10"');
    $col9->setNombreCampo('Costo');

    $col10 = clone $col6;
    $col10->setTitulo('Descuento');
    $col10->setNombreCampo('Mondes');
    $col10->setJScript('onKeypress="entermonto(event,this.id);actualizar_sumatoria_total_cuando_esta_referida();actualizar_grid_dependientes()"');
    $col10->setEsTotal(true,'sumatoria_descuentos');

    $col11 = clone $col6;
    $col11->setTitulo('Monto Recargo');
    $col11->setNombreCampo('Monrgo');

    $col12 = clone $col6;
    $col12->setTitulo('Total');
    $col12->setNombreCampo('Montot');
    $col12->setJScript('onKeypress="entermonto(event,this.id);actualizar_sumatoria_total_cuando_esta_referida();actualizar_grid_dependientes()"');
    $col12->setEsTotal(true,'caordcom_monord');

    $col13 = new Columna('Unidad Medida');
    $col13->setTipo(Columna::TEXTO);
    $col13->setEsGrabable(true);
    $col13->setAlineacionObjeto(Columna::CENTRO);
    $col13->setAlineacionContenido(Columna::CENTRO);
    $col13->setNombreCampo('Unimed');
    $col13->setHTML('type="text" size="10"');

    $col14 = new Columna('Codigo Presupuestario');
    $col14->setEsGrabable(true);
    $col14->setTipo(Columna::TEXTO);
    $col14->setAlineacionObjeto(Columna::CENTRO);
    $col14->setAlineacionContenido(Columna::CENTRO);
    $col14->setNombreCampo('Codpre');
    $col14->setHTML('type="text" size="32" readonly=true');

    $col15 = new Columna('Codigo Partida');
    $col15->setTipo(Columna::TEXTO);
    $col15->setEsGrabable(true);
    $col15->setOculta(true);
    $col15->setAlineacionObjeto(Columna::CENTRO);
    $col15->setAlineacionContenido(Columna::CENTRO);
    $col15->setNombreCampo('Codpar');
    $col15->setHTML('type="text" size="20"');

      $col16 = new Columna('Recargos');
      $col16->setTipo(Columna::TEXTO);
      $col16->setEsGrabable(false);
      $col16->setAlineacionObjeto(Columna::CENTRO);
      $col16->setAlineacionContenido(Columna::CENTRO);
      $col16->setNombreCampo('anadir');
      $col16->setHTML('type="text" size="1" style="border:none" class="imagenalmacen"');
      $col16->setJScript('onClick="mostrargridrecargos(this.id)"');


      $col17 = new Columna('cadena_datos_recargo');
        $col17->setTipo(Columna::TEXTO);
        $col17->setEsGrabable(true);
        $col17->setAlineacionObjeto(Columna::IZQUIERDA);
        $col17->setAlineacionContenido(Columna::IZQUIERDA);
        $col17->setNombreCampo('datosrecargo');
        $col17->setOculta(true);

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col14);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);


    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
  }



  public function configGrid_Recargos($ordcom='',$referencia_recargo='')
  {
    $c = new Criteria();
        if (trim($referencia_recargo)=='0')
        {
        $c->add(CadisrgoPeer::REQART,$ordcom);
      $per3 = CadisrgoPeer::doSelect($c);

      $filas_arreglo=10;

      // Se crea el objeto principal de la clase OpcionesGrid
      $opciones = new OpcionesGrid();
      // Se configuran las opciones globales del Grid
      $opciones->setEliminar(true);
      $opciones->setFilas($filas_arreglo);

      $opciones->setTabla('Cadisrgo');
      $opciones->setName('r');

            $opciones->setAncho(500);
      $opciones->setAnchoGrid(500);
      $opciones->setTitulo('Detalle de Recargos');
      $opciones->setHTMLTotalFilas(' ');

      // Se generan las columnas
      $col1 = new Columna('Código  Recargo');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codrgo');
      $col1->setHTML('type="text" size="4" maxlength="4"');
      $col1->setCatalogo('Carecarg','sf_admin_edit_form', array('codrgo' => 1,'nomrgo' => 2,'monrgo' => 4,'tiprgo' => 5));
      $col1->setJScript('onKeypress="entermonto_r(event,this.id);actualizar_calculo_grid_recargo_por_fila()"');
      $col1->setAjax('almordcom',4,2,4);

      $col2 = new Columna('Descripción');
      $col2->setTipo(Columna::TEXTO);
      $col2->setEsGrabable(true);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nomrgo');
      $col2->setHTML('type="text" size="25" readonly="true"');

      $col3 = new Columna('Monto Recargo');
      $col3->setTipo(Columna::MONTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionContenido(Columna::DERECHA);
      $col3->setAlineacionObjeto(Columna::DERECHA);
      $col3->setNombreCampo('recargototal');
      $col3->setEsNumerico(true);
      $col3->setHTML('type="text" size="10"');
      $col3->setJScript('onKeypress="entermonto_r(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');
      $col3->setEsTotal(true,'sumatoria_recargos');

      $col4 = new Columna('Cant. Total');
      $col4->setTipo(Columna::MONTO);
      $col4->setEsGrabable(true);
      $col4->setOculta(true);
      $col4->setAlineacionContenido(Columna::DERECHA);
      $col4->setAlineacionObjeto(Columna::DERECHA);
      $col4->setNombreCampo('por_monrgo');
      $col4->setEsNumerico(true);
      $col4->setHTML('type="text" size="10"');
      $col4->setJScript('onKeypress="entermonto(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');

      $col5 = new Columna('Tipo Recargo');
      $col5->setTipo(Columna::TEXTO);
      $col5->setEsGrabable(true);
      $col5->setOculta(true);
      $col5->setAlineacionContenido(Columna::DERECHA);
      $col5->setAlineacionObjeto(Columna::DERECHA);
      $col5->setNombreCampo('tiprgodos');
      $col5->setHTML('type="text" size="1"');

      // Se guardan las columnas en el objetos de opciones
      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $opciones->addColumna($col4);
      $opciones->addColumna($col5);
        }
        else
        {
      $c->add(CargosolPeer::REQART,$ordcom);
      $per3 = CargosolPeer::doSelect($c);

      $filas_arreglo=0;

      // Se crea el objeto principal de la clase OpcionesGrid
      $opciones = new OpcionesGrid();
      // Se configuran las opciones globales del Grid
      $opciones->setEliminar(true);
      $opciones->setFilas($filas_arreglo);
      $opciones->setTabla('Cargosol');
      $opciones->setName('r');
            $opciones->setAncho(500);
      $opciones->setAnchoGrid(500);
      $opciones->setTitulo('Detalle de Recargos');
      $opciones->setHTMLTotalFilas(' ');

      // Se generan las columnas
      $col1 = new Columna('Código  Recargo');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codrgo');
      $col1->setHTML('type="text" size="4" maxlength="4"');


      $col2 = new Columna('Descripción');
      $col2->setTipo(Columna::TEXTO);
      $col2->setEsGrabable(false);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nomrgo');
      $col2->setHTML('type="text" size="25" readonly=true');

      $col3 = new Columna('Monto Recargo');
      $col3->setTipo(Columna::MONTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionContenido(Columna::DERECHA);
      $col3->setAlineacionObjeto(Columna::DERECHA);
      $col3->setNombreCampo('recargototal');
      $col3->setEsNumerico(true);
      $col3->setHTML('type="text" size="10"');
      //$col3->setJScript('onKeypress="entermonto_r(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');
      $col3->setEsTotal(true,'sumatoria_recargos');

      $col4 = new Columna('Cant. Total');
      $col4->setTipo(Columna::MONTO);
      $col4->setEsGrabable(true);
      $col4->setOculta(true);
      $col4->setAlineacionContenido(Columna::DERECHA);
      $col4->setAlineacionObjeto(Columna::DERECHA);
      $col4->setNombreCampo('por_monrgo');
      $col4->setEsNumerico(true);
      $col4->setHTML('type="text" size="10"');
      $col4->setJScript('onKeypress="entermonto(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');

      $col5 = new Columna('Tipo Recargo');
      $col5->setTipo(Columna::TEXTO);
      $col5->setEsGrabable(true);
      $col5->setOculta(true);
      $col5->setAlineacionContenido(Columna::DERECHA);
      $col5->setAlineacionObjeto(Columna::DERECHA);
      $col5->setNombreCampo('tiprgodos');
      $col5->setHTML('type="text" size="1"');

      // Se guardan las columnas en el objetos de opciones
      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $opciones->addColumna($col4);
      $opciones->addColumna($col5);
         }
    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_recargos = $opciones->getConfig($per3);
  }

  public function configGrid_Parcial_Recargo($refsol='',$rifpro='')
  {
    Orden_compra::Obtener_Grid_Parcial_Recargos($refsol,$rifpro,&$output);
    $per = $output;
    $filas_arreglo=0;

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Cargosol');
    $opciones->setName('r');
    $opciones->setAncho(500);
    $opciones->setAnchoGrid(500);
    $opciones->setTitulo('Detalle de Recargos');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código  Recargo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codrgo');
    $col1->setHTML('type="text" size="4" maxlength="4"');


    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(false);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomrgo');
    $col2->setHTML('type="text" size="25" readonly=true');

    $col3 = new Columna('Monto Recargo');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('recargototal');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10" readonly=true');
    //$col3->setJScript('onKeypress="entermonto_r(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');
    $col3->setEsTotal(true,'sumatoria_recargos');

    $col4 = new Columna('Cant. Total');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setOculta(true);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setNombreCampo('por_monrgo');
    $col4->setEsNumerico(true);
    $col4->setHTML('type="text" size="10"');
    $col4->setJScript('onKeypress="entermonto(event,this.id);actualizar_calculo_grid_recargo_por_fila();"');

    $col5 = new Columna('Tipo Recargo');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setOculta(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo('tiprgodos');
    $col5->setHTML('type="text" size="1"');



    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_recargos = $opciones->getConfig($per);

  }


  public function configGrid_Resumen($ordcom='')
  {
    $c = new Criteria();
    $c->add(CaresordcomPeer::ORDCOM,$ordcom);
    $per4 = CaresordcomPeer::doSelect($c);
    $filas_arreglo=50;

    $mascaraarticulo=$this->mascaraarticulo;
    $formatocategoria=$this->formatocategoria;
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(false);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Caresordcom');
    $opciones->setName('b');
    $opciones->setAncho(1200);
    $opciones->setAnchoGrid(1200);
    $opciones->setTitulo('Detalle de la Orden de Requisición');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código  Artículo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('Codart');
    $col1->setHTML('type="text" size="15" readonly="true"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Desres');
    $col2->setHTML('type="text" size="30x1" ');

    $col3 = new Columna('Cod. Art.Contratistas de Bienes o Servicio y Cooperativas');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setNombreCampo('Codartpro');
    $col3->setHTML('type="text" size="15"');

    $col4 = new Columna('Cant. Ordenada');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setNombreCampo('Canord');
    $col4->setEsNumerico(true);
    $col4->setHTML('type="text" size="10"');
    $col4->setJScript('onKeypress="entermonto(event,this.id)"');

    $col5 = clone $col4;
    $col5->setTitulo('Cant. Ajustada');
    $col5->setNombreCampo('Canaju');

    $col6 = clone $col5;
    $col6->setTitulo('Cant.  Recibida');
    $col6->setNombreCampo('Canrec');

    $col7 = clone $col5;
    $col7->setTitulo('Cant. Total');
    $col7->setNombreCampo('Cantot');

    $col8 = clone $col5;
    $col8->setTitulo('Costo');
    $col8->setNombreCampo('Costo');

    $col9 = clone $col5;
    $col9->setTitulo('Monto Recargo');
    $col9->setNombreCampo('Rgoart');

    $col10 = clone $col5;
    $col10->setTitulo('Total');
    $col10->setNombreCampo('Totart');


    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_resumen = $opciones->getConfig($per4);

  }

  public function configGrid_ResumenPartidas($ordcom='')
  {
    $sql="select 9 as id, '' as nompar,  a.codpar, sum((a.totart-a.rgoart)) as totart from caartord a
          where a.ordcom='".$ordcom."'  group by  a.codpar,a.totart,a.rgoart
          union
          select 9 as id, '' as nompar, c.codpre,sum(b.monrgo) as totart from cargosol b, carecarg c
          where reqart='".$ordcom."' and b.codrgo=c.codrgo group by c.codpre";
    $resp = Herramientas::BuscarDatos($sql,&$reg);

    $i=0;
    while ($i<count($reg))
    {
      $reg[$i]["nompar"]=NppartidasPeer::getNompar($reg[$i]["codpar"]);
      $i++;
    }

    $c = new Criteria();
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(false);
    $opciones->setFilas(50);
    $opciones->setTabla('Caartord');
    $opciones->setName('z');
    $opciones->setAncho(600);
    $opciones->setAnchoGrid(800);
    $opciones->setTitulo('Resumen por Partida Presupuestaria');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código  Partida');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('Codpar');
    $col1->setHTML('type="text" size="25" readonly="true"');

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setEsGrabable(true);
    if ($ordcom=="")$col2->setOculta(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nompar');
    $col2->setHTML('type="text" size="30x1" readonly="true');

    $col3 = new Columna('Monto');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('totart');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10" readonly="true');



    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_respartidas = $opciones->getConfig($reg);

  }

  public function configGrid_Entregas($ordcom='')
  {
    /*************************************************************************
    **         Grid de Entregas de la Orden de Compra Formulario Amlordcom  **
    **                                                                      **
    **************************************************************************/


    $c = new Criteria();
    $c->add(CaartfecPeer::ORDCOM,$ordcom);
    $per5 = CaartfecPeer::doSelect($c);
    $filas_arreglo=50;

    $mascaraarticulo=$this->mascaraarticulo;
    $formatocategoria=$this->formatocategoria;
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones2 = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones2->setEliminar(false);
    $opciones2->setFilas($filas_arreglo);
    $opciones2->setTabla('Caartfec');
    $opciones2->setAncho(650);
    $opciones2->setAnchoGrid(600);
    $opciones2->setName('c');
    $opciones2->setTitulo('Detalle de la Orden de Requisición');
    $opciones2->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código  Artículo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::DERECHA);
    $col1->setAlineacionContenido(Columna::DERECHA);
    $col1->setNombreCampo('Codart');
    $col1->setHTML('type="text" size="15" readonly="readonly"');
    $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTAREA);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Desart');
    $col2->setHTML('type="text" size="30x1"');

    $col3 = new Columna('Cantidad');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setNombreCampo('Canart');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10" readonly="readonly"');


    $col4 = new Columna('Fecha de Entrega');
    $col4->setNombreCampo('Fecent');
    $col4->setTipo(Columna::FECHA);
    $col4->setHTML('');
    $col4->setEsGrabable(true);


    // Se guardan las columnas en el objetos de opciones
    $opciones2->addColumna($col1);
    $opciones2->addColumna($col2);
    $opciones2->addColumna($col3);
    $opciones2->addColumna($col4);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj_entregas = $opciones2->getConfig($per5);

  }

  public function setVars()
  {
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->formatocategoria = Herramientas::getObtener_FormatoCategoria();
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      $this->tags=Herramientas::autocompleteAjax('CODUBI','Bnubibie','Codubi',trim($this->getRequestParameter('codcatreq')));
  }

  protected function deleteCaordcom($caordcom)
  {
      $id=$this->getRequestParameter('id');
    if (!Orden_compra::Eliminar($caordcom,&$coderror))
      {
          if($coderror!=-1)
        {
            $err = Herramientas::obtenerMensajeError($coderror);
          $this->getRequest()->setError('delete', $err);
          return $this->forward('almordcom', 'list');
        }
      }
  }

//<--------------------------------------------------------------------------------------------------------------------------------------------------->
  protected function saveCaordcom($caordcom)
  {
  //<!-----------------------------Grid Arreglos---------------------->
  $grid_detalle_orden_arreglos=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
  $grid_detalle_resumen_arreglos=Herramientas::CargarDatosGrid($this,$this->obj_resumen,true);//1
  $grid_detalle_entrega_arreglos=Herramientas::CargarDatosGrid($this,$this->obj_entregas,true);//2
  $grid_detalle_recargo_arreglos=Herramientas::CargarDatosGrid($this,$this->obj_recargos,true);//3
  $arreglo_arreglo = array($grid_detalle_orden_arreglos,$grid_detalle_resumen_arreglos,$grid_detalle_entrega_arreglos,$grid_detalle_recargo_arreglos);

  //<!-----------------------------Grid Objetos---------------------->
  $grid_detalle_resumen_objetos=Herramientas::CargarDatosGrid($this,$this->obj_resumen);//0
  $grid_detalle_entrega_objetos=Herramientas::CargarDatosGrid($this,$this->obj_entregas);//1
  $arreglo_objetos = array($grid_detalle_resumen_objetos,$grid_detalle_entrega_objetos);

  //<!-----------------------------campos ocultos---------------------->
  $total=$this->getRequestParameter('sumatoria_detalle_orden');//0
  $total_descuento=$this->getRequestParameter('sumatoria_descuentoss');//1
  $total_recargo=$this->getRequestParameter('sumatoria_recargo');//2
  $codigo_proveedor=$this->getRequestParameter('caordcom[codigoproveedor]');//3
  $tasacambio=$this->getRequestParameter('tasacambio');//4
  $referencia=$this->getUser()->getAttribute('referencia');//5
  $genero_compromiso=$this->getUser()->getAttribute('genero_compromiso');//6
  $codconpag_dos=$this->getRequestParameter('codconpag_dos');//7
  $codforent_dos=$this->getRequestParameter('codforent_dos');//8
  $this->getUser()->getAttributeHolder()->remove('referencia');//9
  $this->getUser()->getAttributeHolder()->remove('genero_compromiso');//10
  $arreglo_campos = array($total,$total_descuento,$total_recargo,$codigo_proveedor,$tasacambio,$referencia,$codconpag_dos,$codforent_dos,$genero_compromiso);



  //<!-----------------------------funciones clase Orden de Compra---------------------->
  if (Orden_compra::Salvar($caordcom,$arreglo_arreglo,$arreglo_objetos,$arreglo_campos,&$coderror))
  {
  //<!-----------------------------guardo comprobante---------------------->
      if ($this->getUser()->getAttribute('grabo',null,$this->getUser()->getAttribute('formulario'))=='S')
      {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$this->getUser()->getAttribute('formulario'));
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$this->getUser()->getAttribute('formulario'));
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$this->getUser()->getAttribute('formulario'));
          $debito=$this->getUser()->getAttribute('debito',null,$this->getUser()->getAttribute('formulario'));
          $credito=$this->getUser()->getAttribute('credito',null,$this->getUser()->getAttribute('formulario'));
          $grid=$this->getUser()->getAttribute('grid',null,$this->getUser()->getAttribute('formulario'));

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]');
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]');
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]');
          $this->getUser()->getAttributeHolder()->remove('debito');
          $this->getUser()->getAttributeHolder()->remove('credito');
          $this->getUser()->getAttributeHolder()->remove('grid');

        Tesoreria::Salvarconfincomgen($numcom,$feccom,$descom,$debito,$credito);
        Tesoreria::Salvar_asientosconfincomgen($numcom,$feccom,$grid,$this->getUser()->getAttribute('grabar',null,$this->getUser()->getAttribute('formulario')));
      }
      return $coderror;
  }//  if (Orden_compra::Salvar($caordcom,$arreglo_arreglo,$arreglo_objetos,$arreglo_campos))
  else
    return $coderror;
}
//<--------------------------------------------------------------------------------------------------------------------------------------------------->


  protected function updateCaordcomFromRequest()
  {
    $caordcom = $this->getRequestParameter('caordcom');
      if (isset($caordcom['ordcom']))  $this->caordcom->setOrdcom(trim($caordcom['ordcom']));
      $this->caordcom->setRefcom('');
      if (isset($caordcom['staord'])) $this->caordcom->setStaord('A');
      $this->caordcom->setAfepre('N');

      if (isset($caordcom['fecord']))
      {
              if ($caordcom['fecord'])
      {
        try
        {
        $dateFormat = new sfDateFormat($this->getUser()->getCulture());
        if (!is_array($caordcom['fecord']))
        {
        $value = $dateFormat->format($caordcom['fecord'], 'i', $dateFormat->getInputPattern('d'));
              }
                else
                {
                $value_array = $caordcom['fecord'];
                $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
              }
              $this->caordcom->setFecord($value);
              }
              catch (sfException $e)
                {
                // not a date
      }
      }
        else
        {
          $this->caordcom->setFecord(null);
      }
      }
      if (isset($caordcom['tipmon']))
      {
        $this->caordcom->setTipmon(trim($caordcom['tipmon']));
      }
      if (isset($caordcom['codpro']))
      {
        $this->caordcom->setCodpro(trim($caordcom['codpro']));
        }
        /*if (isset($caordcom['nompro']))
        {
        $this->caordcom->setNompro($caordcom['nompro']);
      }*/
        if (isset($caordcom['rifpro']))
        {
          $this->caordcom->setRifpro(trim($caordcom['rifpro']));
          $this->caordcom->setCodpro(Herramientas::getX_vacio('rifpro','caprovee','codpro',$caordcom['rifpro']));
        }
      if (isset($caordcom['desord']))
      {
        $this->caordcom->setDesord($caordcom['desord']);
      }
      if (isset($caordcom['desord']))
      {
        $this->caordcom->setDesord($caordcom['desord']);
      }
      if (isset($caordcom['crecon']))
      {
        $this->caordcom->setCrecon($caordcom['crecon']);
      }
      if (isset($caordcom['monord']))
      {
      setlocale(LC_MONETARY, 'it_IT');
      //money_format('%.2n', $caordcom['monord'])
      //$this->caordcom->setMonord(money_format('%.2n', $caordcom['monord']));
      $this->caordcom->setMonord($caordcom['monord']);
      }
      if (isset($caordcom['doccom']))
      {
        $this->caordcom->setDoccom(trim($caordcom['doccom']));
        }
        /*if (isset($caordcom['nomext']))
        {
        $this->caordcom->setNomext($caordcom['nomext']);
      }*/
      if (isset($caordcom['refsol']))
      {
        $this->caordcom->setRefsol(trim($caordcom['refsol']));
      }
      if (isset($caordcom['tipord']))
      {
        $this->caordcom->setTipord(trim($caordcom['tipord']));
      }
      if (isset($caordcom['tippro']))
      {
        $this->caordcom->setTippro(trim($caordcom['tippro']));
      }
      if (isset($caordcom['tipfin']))
      {
        $this->caordcom->setTipfin(trim($caordcom['tipfin']));
      }
      if (isset($caordcom['tipo']))
      {
        $this->caordcom->setTipo(trim($caordcom['tipo']));
        }
      if (isset($caordcom['codconpag']))
      {
        $this->caordcom->setCodconpag(trim($caordcom['codconpag']));
      }
      /*if (isset($caordcom['desconpag']))
      {
        $this->caordcom->setDesconpag($caordcom['desconpag']);
      }*/
      if (isset($caordcom['plaent']))
      {
        $this->caordcom->setPlaent(trim($caordcom['plaent']));
      }
      if (isset($caordcom['tiecan']))
      {
        $this->caordcom->setTiecan(trim($caordcom['tiecan']));
      }
      if (isset($caordcom['dtoord']))
      {
        $this->caordcom->setDtoord(trim($caordcom['dtoord']));
      }
      if (isset($caordcom['conpag']))
      {
        $this->caordcom->setConpag(trim($caordcom['conpag']));
      }
      if (isset($caordcom['forent']))
      {
        $this->caordcom->setForent(trim($caordcom['forent']));
      }
      if (isset($caordcom['fecanu']))
      {
                  if ($caordcom['fecanu'])
      {
        try
        {
        $dateFormat = new sfDateFormat($this->getUser()->getCulture());
        if (!is_array($caordcom['fecanu']))
        {
        $value = $dateFormat->format($caordcom['fecanu'], 'i', $dateFormat->getInputPattern('d'));
                  }
                  else
                    {
                    $value_array = $caordcom['fecanu'];
                    $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
                  }
                  $this->caordcom->setFecanu($value);
                  }
                  catch (sfException $e)
                    {
                    // not a date
                  }
      }
      else
        {
        $this->caordcom->setFecanu(null);
      }
      }
      if (isset($caordcom['valmon']))
      {
        $this->caordcom->setValmon(trim($caordcom['valmon']));
      }
      if (isset($caordcom['tipcom']))
      {
        $this->caordcom->setTipcom(trim($caordcom['tipcom']));
      }
      if (isset($caordcom['coduni']))
      {
        $this->caordcom->setCoduni(trim($caordcom['coduni']));
      }
      if (isset($caordcom['codemp']))
      {
        $this->caordcom->setCodemp(trim($caordcom['codemp']));
      }
      if (isset($caordcom['notord']))
      {
        $this->caordcom->setNotord($caordcom['notord']);
      }
      if (isset($caordcom['tipdoc']))
      {
        $this->caordcom->setTipdoc(trim($caordcom['tipdoc']));
      }
      if (isset($caordcom['justif']))
      {
        $this->caordcom->setJustif($caordcom['justif']);
      }
      if (isset($caordcom['refprc']))
      {
        $this->caordcom->setRefprc(trim($caordcom['refprc']));
      }
      if (isset($caordcom['despro']))
      {
        $this->caordcom->setDespro($caordcom['despro']);
      }
      if (isset($caordcom['codforent']))
      {
        $this->caordcom->setCodforent(trim($caordcom['codforent']));
      }
      /*
      if (isset($caordcom['desforent']))
      {
        $this->caordcom->setDesforent($caordcom['desforent']);
      }*/
      if (isset($caordcom['nomfin']))
      {
        $this->caordcom->setNomfin($caordcom['nomfin']);
      }
        /*if (isset($caordcom['desubi']))
        {
        $this->caordcom->setDesubi($caordcom['desubi']);
      }*/
      if (isset($caordcom['nomemp']))
      {
        $this->caordcom->setNomemp($caordcom['nomemp']);
      }
        if (isset($caordcom['codigoproveedor']))
            {
                $this->caordcom->setCodigoproveedor($caordcom['codigoproveedor']);
            }

      if ($this->AfectaProyecto())
      {
        $this->caordcom->setAfePro('S');
      }
        else
        {
          $this->caordcom->setAfePro('N');
      }

      if (isset($caordcom['numsigecof']))
      {
        $this->caordcom->setNumsigecof(trim($caordcom['numsigecof']));
      }

      if (isset($caordcom['fecsigecof']))
      {
        if ($caordcom['fecsigecof'])
      {
        try
        {
        $dateFormat = new sfDateFormat($this->getUser()->getCulture());
        if (!is_array($caordcom['fecsigecof']))
        {
        $value = $dateFormat->format($caordcom['fecsigecof'], 'i', $dateFormat->getInputPattern('d'));
                  }
                  else
                    {
                    $value_array = $caordcom['fecsigecof'];
                    $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
                  }
                  $this->caordcom->setFecsigecof($value);
                  }
                  catch (sfException $e)
                    {
                    // not a date
                  }
      }
      else
        {
        $this->caordcom->setFecsigecof(null);
      }
      }


      if (isset($caordcom['expsigecof']))
      {
        $this->caordcom->setExpsigecof(trim($caordcom['expsigecof']));
      }
  }

  public function AfectaProyecto()
  {
    if ($this->caordcom->getTippro())
    {
      $result=array();
      $sql = "Select ctaord,ctaper from catippro where Codpro ='".$this->caordcom->getTippro()."'";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        if (($result[0]['ctaord']<>'') && ($result[0]['ctaper']<>''))
          return true;
        else
          return false;
      }
      else
        return '';
      }
  }

  public function executeGrid_parcial()
  {
  if ($this->getRequestParameter('ajax')=='1')
  {
    if (($this->getRequestParameter('refsol')!='') and ($this->getRequestParameter('rifpro')!=''))
    {
      if (Orden_compra::Verificar_proveedor(trim($this->getRequestParameter('refsol')),trim($this->getRequestParameter('rifpro')),&$rifpro,&$msg,&$cancotpril,&$strrifpro,&$srtrefcot))
      {
                $result=array();
                $num_filas=0;
          $sql = "Select reqart,codart,codcat,canreq,canrec,montot,costo,monrgo,canord,mondes,relart,unimed,codpar From CaArtSol Where ReqArt='".$this->getRequestParameter('refsol')."' order By CodArt";
        if (Herramientas::BuscarDatos($sql,&$result))
        {
          $i=0;
          $j=0;
          while ($i<count($result))
          {
                $id = $i;
            if ($result[$i]['canord']<$result[$i]['canreq'])
            {
                      if ($cancotpril>0)
                      {
                  //ARTICULO DE LA COTIZACION CON PRIORIDAD #1 PARA EL NUMERO DE FILAS DEL GRID
                            $result1=array();
                  $sql1 = "select refcot,codart,canord,costo,totdet,fecent,priori,justifica,mondes from cadetcot where refcot='".$srtrefcot."' and codart='".$result[$i]['codart']."' and priori='1'";
                if (Herramientas::BuscarDatos($sql1,&$result1))
                  $num_filas++;
              }
            }
            $i++;
          }
        }
        $filas='numero_filas_orden';
        $var='S';
        $output = '[["'.$filas.'","'.$num_filas.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        if (($this->getRequestParameter('refsol')!='') and ($this->getRequestParameter('rifpro')!='') and ($this->getRequestParameter('parcial')=='S'))
        {
          //print '1';
          $this->configGrid_Parcial($this->getRequestParameter('refsol'),$this->getRequestParameter('rifpro'));
        }
        else
        {
          //print '2';
          $this->configGrid($this->getRequestParameter('refsol'),'1');
        }
      }
      else
      {
        //print 'hola';
        $this->configGrid('0','0');
      }
    }
  }
    }


  public function executeGrid()
  {
  $cajtexmos=$this->getRequestParameter('cajtexmos');
  $filas_orden=$this->getRequestParameter('filas_orden');
  $cajita='fecha_egresos';
  $validacion_fec_egresos='0';
  if ($this->getRequestParameter('ajax')=='1')
  {
    $c = new Criteria();
    $c->add(CasolartPeer :: REQART,$this->getRequestParameter('ordcom'));
    $c->add(CasolartPeer :: STAREQ, "A");
    $c->add(CasolartPeer :: APRREQ, "S");    //Verifica si la solicitud de egreso esta aprobada
    $c->addJoin(CasolartPeer::REQART,CaartsolPeer::REQART);
    $filas = CasolartPeer::doSelect($c);

    $numero_filas=count($filas);
    $fecord="";

    //darle formato a la fecha
    if ($numero_filas > 0)
    {
        if (trim($this->getRequestParameter('fecord'))!="")
        {
            $dateFormat = new sfDateFormat($this->getUser()->getCulture());
            $fecord = $dateFormat->format($this->getRequestParameter('fecord'), 'i', $dateFormat->getInputPattern('d'));
        }

      if (!Orden_compra::Validar_fecha_egreso($fecord,$this->getRequestParameter('refsol')))
      {
        $validacion_fec_egresos='1';
        $output = '[["'.$cajita.'","'.$validacion_fec_egresos.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
      else
      {
        // Verifico si el ganador es un sólo proveedor
        $sql = "select a.refsol, a.codpro, b.priori from cacotiza a inner join cadetcot b on a.refcot=b.refcot where b.priori=1 and a.refsol='".$this->getRequestParameter('ordcom')."'
                group by a.refsol, a.codpro, b.priori";
        if (Herramientas::BuscarDatos($sql,&$result)){
          if(count($result)==1){
            $despro   = Herramientas::getX('codpro','Caprovee','nompro',$result[0]["codpro"]);
            $provee=',["caordcom_rifpro","'.$result[0]["codpro"].'",""],["caordcom_nompro","'.$despro.'",""]';
          }else $provee='';
        }else $provee='';

          $dato   = Herramientas::getX('reqart','Casolart','monreq',trim($this->getRequestParameter('ordcom')));
          $desreq = Herramientas::getX('reqart','Casolart','desreq',trim($this->getRequestParameter('ordcom')));
          $desfin = Herramientas::getX('codfin','Fortipfin','nomext',$filas[0]->getTipfin());

          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$filas_orden.'","'.$numero_filas.'",""],["'.$cajita.'","'.$validacion_fec_egresos.'",""],["caordcom_desord","'.$desreq.'",""],["caordcom_tipfin","'.$filas[0]->getTipfin().'",""],["caordcom_nomfin","'.$desfin.'",""]'.$provee.']';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          $this->configGrid($this->getRequestParameter('ordcom'),$this->getRequestParameter('referencia'));
      }
    }else{

    $javascript="alert('La Referencia : ".$this->getRequestParameter('refsol').", no existe o no esta aprobado...');";

        $output = '[["javascript","'.$javascript.'"]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;

    }
  }
    }

  public function executeGrid_recargos()
  {
  if ($this->getRequestParameter('ajax')=='1')
  {
    $cajtexmos=$this->getRequestParameter('cajtexmos');
    $numfilas=$this->getRequestParameter('numfilas');
    $parcial=$this->getRequestParameter('parcial');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $cajtexmos2=$this->getRequestParameter('cajtexmos2');
    $codigo_provee=$this->getRequestParameter('codigo_provee');
    $refsol=$this->getRequestParameter('refsol');
    $mostrar_msg=$this->getRequestParameter('msg');
    $codconpag=$this->getRequestParameter('codconpag');
    $codforent=$this->getRequestParameter('codforent');
    $codconpag_des=$this->getRequestParameter('codconpag_des');
    $codforent_des=$this->getRequestParameter('codforent_des');
    $codconpag_result='';
    $codforent_result='';
    $codconpag_codigo=$this->getRequestParameter('codconpag_codigo');
    $codforent_codigo=$this->getRequestParameter('codforent_codigo');
    $cancotpril_caja=$this->getRequestParameter('cancotpril');
    $seguir=true;
    if (($refsol!='') and (trim($this->getRequestParameter('codigo'))!=''))
    {
      if (!Orden_compra::Verificar_proveedor($refsol,trim($this->getRequestParameter('codigo')),&$rifpro,&$msg,&$cancotpril,&$strrifpro,&$srtrefcot))
      {
        $mensaje=$msg;
        $rif_encontrado=$rifpro;
        $seguir=false;
      }
      else
      {
        $mensaje='';
        $rif_encontrado=trim($this->getRequestParameter('codigo'));
      }
      if ($rif_encontrado!='')
      {
          $dato=CaproveePeer::getNompro(trim($rif_encontrado));
          $dato1=CaproveePeer::getCod_provee(trim($rif_encontrado));
      }
      else
      {
          $dato='';//CaproveePeer::getNompro_vacio(trim($this->getRequestParameter('codigo')));
          $dato1='';//CaproveePeer::getCod_provee(trim($this->getRequestParameter('codigo')));
      }
      $c = new Criteria();
              $c->add(CadisrgoPeer::REQART,$refsol);
          $filas = CadisrgoPeer::doSelect($c);
          $numero_filas=count($filas);

        $result=array();
      $sql = "select a.refcot as refcot,a.conpag as conpag,a.forent as forent from cacotiza a,caprovee b where refsol='".$refsol."' and b.rifpro='".$rif_encontrado."' and a.codpro=b.codpro";
      if (Herramientas::BuscarDatos($sql,&$result))
      {
        $codconpag_result=$result[0]['conpag'];
        $codforent_result=$result[0]['forent'];
      }
      $codconpag_des_result=CaconpagPeer::getDesconpag(trim($codconpag_result));
      $codforent_des_result=CaforentPeer::getDesforent(trim($codforent_result));
      $output = '[["'.$cajtexcom.'","'.$rif_encontrado.'",""],["'.$cajtexmos.'","'.$dato.'",""],["'.$codigo_provee.'","'.$dato1.'",""],["'.$mostrar_msg.'","'.$mensaje.'",""],["'.$codconpag.'","'.$codconpag_result.'",""],["'.$codforent.'","'.$codforent_result.'",""],["'.$codconpag_des.'","'.$codconpag_des_result.'",""],["'.$codforent_des.'","'.$codforent_des_result.'",""],["'.$numfilas.'","'.$numero_filas.'",""],["'.$codconpag_codigo.'","'.$codconpag_result.'",""],["'.$codforent_codigo.'","'.$codforent_result.'",""],["'.$cancotpril_caja.'","'.$cancotpril.'",""]]';
    }
    else
    {
      $dato=CaproveePeer::getNompro(trim($this->getRequestParameter('codigo')));
      $dato1=CaproveePeer::getCod_provee(trim($this->getRequestParameter('codigo')));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$codigo_provee.'","'.$dato1.'",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
/*     if (($refsol!='') and ($this->getRequestParameter('codigo')!='') and ($parcial=='S') and ($seguir))
      $this->configGrid_Parcial_Recargo($this->getRequestParameter('refsol'),$this->getRequestParameter('codigo'));
    else if (($refsol!='') and ($this->getRequestParameter('codigo')!='') and ($parcial=='N') and ($seguir))
      $this->configGrid_Recargos($this->getRequestParameter('refsol'),'1');
    else if (($refsol=='') and ($seguir))
      $this->configGrid_Recargos($this->getRequestParameter('refsol'),'0');
    else
      $this->configGrid_Recargos('0','0');*/

  }
  return sfView::HEADER_ONLY;
    }

  public function executeAnular()
  {
    $obj1=$this->getRequestParameter('obj1');
    $c = new Criteria();
    $c->add(CaordcomPeer::ORDCOM,$obj1);
    $this->caordcom = CaordcomPeer::doSelectOne($c);
    sfView::SUCCESS;

  }

  public function executeSalvaranu()
  {
    $ordcom=$this->getRequestParameter('ordcom');//0
    $fecord=$this->getRequestParameter('fecord');//1
    $descripcion=$this->getRequestParameter('valor');//2
    $fecanu=$this->getRequestParameter('fecha');//3

        $dateFormat = new sfDateFormat('es_VE');
        $fecord = $dateFormat->format($fecord, 'i', $dateFormat->getInputPattern('d'));
        $fecanu = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
        $this->msgerr="";
        $this->btn="";

        if (strtotime($fecanu) < strtotime($fecord))
        {
          $this->msgerr=Herramientas::obtenerMensajeError('144');
          $this->btn="S";
        }
        else//fecha correcta
        {
      $c = new Criteria();
      $c->add(CaordcomPeer::ORDCOM,$ordcom);
      $c->add(CaordcomPeer::FECORD,$fecord);
      $caordcom = CaordcomPeer::doSelectOne($c);
      if (count($caordcom)>0)
        if ($caordcom->getStaord()!='N')
        {
          Orden_compra::Salvar_anular($caordcom,$descripcion,$fecanu,&$coderror);
              if ($coderror!=-1)
                $this->msgerr=Herramientas::obtenerMensajeError($coderror);
                    else
                $this->msgerr=Herramientas::obtenerMensajeError('158');
        }
        else
          $this->msgerr=Herramientas::obtenerMensajeError('169');
        }//else Fecha Correcta
  }

  public function executeCombosnc()
  {
    if ($this->getRequestParameter('par')=='1')
    {
      $this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
      $this->tipo='P';
    }
    elseif ($this->getRequestParameter('par')=='2')
    {
      $this->municipio = $this->Cargarmunicipio($this->getRequestParameter('pais'),$this->getRequestParameter('estado'));
      $this->tipo='E';
    }
    elseif ($this->getRequestParameter('par')=='3')
    {
      $this->parroquia = $this->Cargarparroquia($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'));
      $this->tipo='M';
    }
  }

  public function Cargarpais()
  {
    $tablas=array('ocpais');//areglo de los joins de las tablas
    $filtros_tablas=array('');//arreglo donde mando los filtros de las clases
    $filtros_variales=array('');//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codpai','nompai');// arreglos donde me traigo el nombre y el codigo
    return $pais= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
  }

  public function Cargarestados($codpais)
  {
    $tablas=array('ocestado');//areglo de los joins de las tablas
    $filtros_tablas=array('codpai');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codedo','nomedo');// arreglos donde me traigo el nombre y el codigo
    return $estado= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
  }


  public function Cargarmunicipio($codpais,$codestado)
  {
    $tablas=array('ocmunici');//areglo de los joins de las tablas
    $filtros_tablas=array('codpai','codedo');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codmun','nommun');// arreglos donde me traigo el nombre y el codigo
    return $municipio= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

  }

  public function Cargarparroquia($codpais,$codestado,$codmunicipio)
  {
    $tablas=array('ocparroq');//areglo de los joins de las tablas
    $filtros_tablas=array('codpai','codedo','codmun');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais,$codestado,$codmunicipio);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codpar','nompar');// arreglos donde me traigo el nombre y el codigo
    return $parroquia= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
  }

  public function funciones_combos($pais,$estado,$municipio)
  {
    $this->desste ='';
    $this->pais = $this->Cargarpais();
    $this->estados = $this->Cargarestados($pais);//colocar lo q viene de bd
    $this->municipio = $this->Cargarmunicipio($pais,$estado);//colocar lo q viene de bd
    $this->parroquia = $this->Cargarparroquia($pais,$estado,$municipio);//colocar lo q viene de bd
  }

  public function configGridRecargo($refere="",$codart="",$coduni="")
   {

       $c = new Criteria();
       $c->add(CadisrgoPeer::REQART,$refere);
       $c->add(CadisrgoPeer::CODART,$codart);
       $c->add(CadisrgoPeer::CODCAT,$coduni);
       $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
       $reg = CadisrgoPeer::doSelect($c);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Cadisrgo');
       $opciones->setAncho(700);
       $opciones->setAnchoGrid(700);
       $opciones->setTitulo('Recargos');
       $opciones->setName('r');
       $opciones->setFilas(20);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código Recargo');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrgo');
       $col1->setHTML('type="text" size="15" maxlength="4"');
       $col1->setCatalogo('carecarg','sf_admin_edit_form',array('codrgo' => 1, 'nomrgo' => 2,'monrgo' => 3,'tiprgo' => 4));
       $col1->setJScript('onKeypress="javascript: perderfocus(event,this.id,6);" onBlur="javascript:event.keyCode=13; ajaxrecargo(event,this.id);"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('nomrgo');
       $col2->setHTML('type="text" size="35" readonly=true');

       $col3 = new Columna('Monto  Por Recargo');
       $col3->setTipo(Columna::TEXTO);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setNombreCampo('monrgoc');
       $col3->setEsNumerico(true);
       $col3->setOculta(true);

       $col4 = new Columna('Tipo Recargo');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionContenido(Columna::CENTRO);
       $col4->setAlineacionObjeto(Columna::CENTRO);
       $col4->setNombreCampo('tiprgo');
       $col4->setOculta(true);

       $col5 = new Columna('Monto Recargo');
       $col5->setTipo(Columna::MONTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionContenido(Columna::DERECHA);
       $col5->setAlineacionObjeto(Columna::DERECHA);
       $col5->setNombreCampo('monrgo');
       $col5->setEsNumerico(true);
       $col5->setHTML('type="text" size="25"');
       $col5->setJScript('readOnly=true; onKeyPress="javascript:if (event.keyCode==13 || event.keyCode==9) {actualizarsaldos_r();} "');
       $col5->setEsTotal(true,'totrecar');

       $col6 = new Columna('Partida');
       $col6->setTipo(Columna::TEXTO);
       $col6->setAlineacionObjeto(Columna::IZQUIERDA);
       $col6->setAlineacionContenido(Columna::IZQUIERDA);
       $col6->setNombreCampo('codpar');
       $col6->setOculta(true);
       $col6->setHTML('type="text" size="35" readonly=true');


       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);
       $opciones->addColumna($col6);

       $this->obj_recargos = $opciones->getConfig($reg);

  }

   public function configGridRecargoConsulta($refere="",$codart="",$coduni="",$ordcom="")
   {
       $c = new Criteria();
       $c->add(CadisrgoPeer::REQART,$refere);
       $c->add(CadisrgoPeer::CODART,$codart);
       $c->add(CadisrgoPeer::CODCAT,$coduni);
       $c->addAscendingOrderByColumn(CadisrgoPeer::CODRGO);
       $reg = CadisrgoPeer::doSelect($c);


        $opciones = new OpcionesGrid();
        $opciones->setEliminar(false);
        $opciones->setTabla('Cargosol');
        $opciones->setAncho(700);
        $opciones->setAnchoGrid(700);
        $opciones->setTitulo('Recargos');
        $opciones->setName('r');
        $opciones->setFilas(0);
        $opciones->setHTMLTotalFilas(' ');

        $col1 = new Columna('Código Recargo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codrgo');
        $col1->setHTML('type="text" size="15" maxlength="4" readonly="true"');

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('nomrgo');
        $col2->setHTML('type="text" size="35" readonly=true');

        $col3 = new Columna('Monto  Por Recargo');
        $col3->setTipo(Columna::TEXTO);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setNombreCampo('monrgoc');
        $col3->setEsNumerico(true);
        $col3->setOculta(true);

        $col4 = new Columna('Tipo Recargo');
        $col4->setTipo(Columna::TEXTO);
        $col4->setAlineacionContenido(Columna::CENTRO);
        $col4->setAlineacionObjeto(Columna::CENTRO);
        $col4->setNombreCampo('tiprgo');
        $col4->setOculta(true);

        $col5 = new Columna('Monto Recargo');
        $col5->setTipo(Columna::MONTO);
        $col5->setEsGrabable(true);
        $col5->setAlineacionContenido(Columna::DERECHA);
        $col5->setAlineacionObjeto(Columna::DERECHA);
        $col5->setNombreCampo('monrgo');
        $col5->setEsNumerico(true);
        $col5->setHTML('type="text" size="25" readonly="true"');
        $col5->setJScript('onKeypress="entermonto_b(event,this.id);"');
        $col5->setEsTotal(true,'totrecar');

       $col6 = new Columna('Partida');
       $col6->setTipo(Columna::TEXTO);
       $col6->setAlineacionObjeto(Columna::IZQUIERDA);
       $col6->setAlineacionContenido(Columna::IZQUIERDA);
       $col6->setNombreCampo('codpar');
       $col6->setOculta(true);
       $col6->setHTML('type="text" size="35" readonly=true');


        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);

        $this->obj_recargos = $opciones->getConfig($reg);
  }

    public function executeRecargos()
    {
      $articulo=$this->getRequestParameter('articulo');
      $codunidad=$this->getRequestParameter('codunidad');
      $nuevo=$this->getRequestParameter('nuevo');
      $refsol=$this->getRequestParameter('refsol');
      $ordcom=$this->getRequestParameter('ordcom');


      if ($nuevo=='S')
      {
        if ($refsol!="")
              $this->configGridRecargoConsulta($refsol,$articulo,$codunidad);
        else
            $this->configGridRecargo($ordcom,$articulo,$codunidad);
      }
      else
      {
            $this->configGridRecargoConsulta($ordcom,$articulo,$codunidad);
      }
      $output = '[["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    }

}