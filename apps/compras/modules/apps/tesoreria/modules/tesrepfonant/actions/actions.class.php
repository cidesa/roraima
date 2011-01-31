<?php

/**
 * tesrepfonant actions.
 *
 * @package    siga
 * @subpackage tesrepfonant
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesrepfonantActions extends autotesrepfonantActions
{
  protected $codigo = -1;

  /**
   * FunciÃ³n principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/opordpag/filters');

     // 15    // pager
    $this->pager = new sfPropelPager('Opordpag', 15);
    $c = new Criteria();
    $c->add(OpordpagPeer::CODFONANT,'',Criteria::NOT_EQUAL);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->setVars();
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridSalida();
    $this->configGridDetalle($this->opordpag->getNumord());
  }


  public function configGridSalida($fechades='', $fechahas='', $codfon='')
  {
    if ($fechades=='')  $fechades=date('Y-m-d');
    if ($fechahas=='') $fechahas=date('Y-m-d');

    $sql="tsfonant.fecfon>=to_date('".$fechades."','yyyy-mm-dd')  and tsfonant.fecfon<= to_date('".$fechahas."','yyyy-mm-dd')";

    $a= new Criteria();
    $a->add(TsfonantPeer::FECFON,$sql,Criteria::CUSTOM);
    $a->add(TsfonantPeer::STAFON,'P');
    $a->add(TsfonantPeer::CODFON,$codfon);
    $det= TsfonantPeer::doSelect($a);

    $this->filsal=count($det);
    $this->opordpag->setFilassal($this->filsal);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesrepfonant/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_tsfonant');
    $this->columnas[1][0]->setHTML('onClick="guardarseleccion()"');
    $this->objeto1 =$this->columnas[0]->getConfig($det);

    $this->opordpag->setObjeto1($this->objeto1);
  }

  /**
   * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
   * que contiene el formulario. Esta funciÃ³n debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetalle($numord='',$arreglo=array())
  {
    if ($numord=='')
    {
      $detalle=$arreglo;
    }
    else
    {
      $c = new Criteria();
      $c->add(OpdetordPeer::NUMORD,$numord);
      $detalle = OpdetordPeer::doSelect($c);
    }
    $this->filajax=count($detalle);
    $this->opordpag->setFilasord($this->filajax);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesrepfonant/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_opdetord');
    $this->columnas[1][1]->setEsTotal(true,'opordpag_monord');
    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
  }
  
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $ajax = $this->getRequestParameter('ajax','');
    $javascript="";
    switch ($ajax){
      case '1':
        $javascript="";
        $this->entrada='1';
        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opordpag = $this->getOpordpagOrCreate();
        $this->setVars();
        $arre=Tesoreria::FormarArreImpF($codigo);
        $this->configGridDetalle('',$arre);
        $filajax=$this->filajax;
        $javascript="totalfil('$filajax');";
        $output = '[["javascript","'.$javascript.'",""],["opordpag_filasord","'.$filajax.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '2':
        $c= new Criteria();
        $c->add(BnubicaPeer::CODUBI,$codigo);
        $resul= BnubicaPeer::doSelectOne($c);
        if ($resul)
        {
          $dato=$resul->getDesubi();
        }else {
          $dato=""; $javascript="alert_('El C&oacute;digo de la Unidad Origen no existe'); $('$cajtexcom').value='';";
        }
        $output = '[["javascript","'.$javascript.'",""],["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '3':
          $c= new Criteria();
          $c->add(FortipfinPeer::CODFIN,$codigo);
          $resul= FortipfinPeer::doSelectOne($c);
          if ($resul)
          {
            $dato=$resul->getNomext();
          }else {
            $dato=""; $javascript="alert_('El C&oacute;digo de Financiamiento no existe'); $('opordpag_tipfin').value='';";
          }
          $output = '[["javascript","'.$javascript.'",""],["opordpag_nomext2","'.$dato.'",""],["","",""]]';
          $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
          return sfView::HEADER_ONLY;
          break;
    case '4':
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        $c= new Criteria();
        $c->add(OpordpagPeer::NUMORD,$this->getRequestParameter('numord'));
        $data=OpordpagPeer::doSelectOne($c);
        if ($data)
        {
          if ($fecha<$data->getFecemi())
          {
            $msj="alert('La Fecha de Anulacion no puede ser menor a la fecha de la Orden de Pago'); $('opordpag_fecanu').value=''";
          }
          else
          {
	        if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('codigo'))==true)
	        {
	          $msj="alert('La Fecha no se encuentra de un Perido Contable Abierto.'); $('opordpag_fecanu').value='';";
	        }
	        else { $msj=""; }
          }
        }
        else
        {
          $msj="";
        }
        $output = '[["javascript","'.$msj.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '5':
        $this->entrada='2';
        $javascript="";
        $arredes=split('/',$this->getRequestParameter('fecdes'));
        $arrehas=split('/',$codigo);
        $fechades=$arredes[2]."-".$arredes[1]."-".$arredes[0];
        $fechahas=$arrehas[2]."-".$arrehas[1]."-".$arrehas[0];

        $this->params=array();
        $this->labels = $this->getLabels();
        $this->opordpag = $this->getOpordpagOrCreate();
        $this->setVars();
        $this->configGridSalida($fechades,$fechahas,$this->getRequestParameter('codfonant'));
        $filsal=$this->filsal;
        $output = '[["javascript","'.$javascript.'",""],["opordpag_filassal","'.$filsal.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
    }
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
    $this->codigo =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){

     $this->opordpag = $this->getOpordpagOrCreate();
      try{ $this->updateOpordpagFromRequest();}
      catch (Exception $ex){}
      $this->setVars();

      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('opordpag[fecemi]'))==true)
      	{
          $this->coderr=529;
          return false;
      	}
      $this->configGrid();
      $grid=Herramientas::CargarDatosGridv2($this,$this->objeto,true);
      $x=$grid[0];
      $i=0;
      if (count($x)==0)
      {
        $this->coderr=528;
        return false;
      }

      if (self::validarGeneraComprobante())
      {
        $this->coderr=508;
        return false;
      }

        if (!Tesoreria::validarDisponibilidadPresuFonAnt($grid,1,&$cod))
        {
          $this->codigo=$cod;
          $this->coderr=118;
          return false;
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
     $grid=Herramientas::CargarDatosGridv2($this,$this->objeto,true);
  }

 public function setVars()
  {
    $mascaraubi=Herramientas::ObtenerFormato('Opdefemp','Forubi');
    $this->opordpag->setMascaraubi($mascaraubi);
    $this->opordpag->setLonubi(strlen($mascaraubi));
  }

  protected function saving($opordpag)
  {
    if ($opordpag->getId())
    {
      $opordpag->save();
    }else {
      $form="sf_admin/tesrepfonant/confincomgen";
      $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
      $numerocomp=$this->getUser()->getAttribute('contabc[numcom]',null,$form.'0');
      if ($grabo=='S')
      {
        $i=0;
        $concom=$this->getRequestParameter('opordpag[totalcomprobantes]');
        while ($i<$concom)
        {
         $formulario[$i]=$form.$i;
         if ($this->getUser()->getAttribute('grabo',null,$formulario[$i])=='S')
         {
          $numcom=$this->getUser()->getAttribute('contabc[numcom]',null,$formulario[$i]);
          $reftra=$this->getUser()->getAttribute('contabc[reftra]',null,$formulario[$i]);
          $feccom=$this->getUser()->getAttribute('contabc[feccom]',null,$formulario[$i]);
          $descom=$this->getUser()->getAttribute('contabc[descom]',null,$formulario[$i]);
          $debito=$this->getUser()->getAttribute('debito',null,$formulario[$i]);
          $credito=$this->getUser()->getAttribute('credito',null,$formulario[$i]);
          $grid=$this->getUser()->getAttribute('grid',null,$formulario[$i]);

          $this->getUser()->getAttributeHolder()->remove('contabc[numcom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[reftra]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[feccom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('contabc[descom]',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('debito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('credito',$formulario[$i]);
          $this->getUser()->getAttributeHolder()->remove('grid',$formulario[$i]);

          $c = new Criteria();
    	  $c->add(OpdefempPeer::CODEMP,'001');
    	  $per = OpdefempPeer::doSelectOne($c);
           if ($this->getUser()->getAttribute('confcorcom')=='N')
           {  $numerocomp = H::iif($per->getOrdconpre()=='t',$reftra,$numcom); }
           else
           {  $numerocomp = H::iif($per->getOrdconpre()=='t','OP'.substr($numerocomp = Comprobante::Buscar_Correlativo(),2,strlen($numcom)),$numcom); }
          $numerocomp = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));
          $opordpag->setNumcom($numerocomp);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');

      $grid=Herramientas::CargarDatosGridv2($this,$this->objeto,true);
      $grid1=Herramientas::CargarDatosGridv2($this,$this->objeto1);
      Tesoreria::salvarReposicionFondosAnticipo($opordpag,$grid,$numerocomp,$grid1);
    }
    return -1;

  }

  protected function deleting($opordpag)
  {
    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$opordpag->getNumord());
    $opordpag= OpordpagPeer::doSelectOne($c);
    if ($opordpag)
    {
     if (OrdendePago::verificarStatusComprobante($opordpag->getNumcom()))
     {
      $c= new Criteria();
      $c->add(OpordpagPeer::NUMORD,$opordpag->getNumord());
      $data= OpordpagPeer::doSelectOne($c);
      if ($data)
      {
        if (($data->getNumche()=='') || (strlen($data->getNumche())==0))
        {
          $documento=Herramientas::getX('Tipcau','Cpdoccau','Refier',$opordpag->getTipcau());
          if ($data->getNumcom()!='')
          {
           $numcomprob=$data->getNumcom();
           OrdendePago::eliminarComprob($data->getFecemi(),$numcomprob);
          }         
         // Actualizar salidas de Fondo en Anticipo
           $t= new Criteria();
           $t->add(OpdetordPeer::NUMORD,$opordpag->getNumord());
           $datos=OpdetordPeer::doSelect($t);
           if ($datos)
           {
               foreach ($datos as $objdat)
               {
                   $cadenarefe=split(',',$objdat->getReffon());
                    $r=0;
                    while ($r<(count($cadenarefe)))
                    {
                        $aux=$cadenarefe[$r];
                        $a= new Criteria();
                        $a->add(TsfonantPeer::REFFON,$aux);
                        $data= TsfonantPeer::doSelectOne($a);
                        if ($data)
                        {
                           $data->setStafon('P');
                           $data->save();
                        }

                        $r++;
                    }
                    if ($r==0)
                    {
                       $a= new Criteria();
                       $a->add(TsfonantPeer::REFFON,$objdat->getReffon());
                       $data= TsfonantPeer::doSelectOne($a);
                       if ($data)
                       {
                           $data->setStafon('P');
                           $data->save();
                       }
                    }
               }
           }
          Herramientas::EliminarRegistro('Opdetord','Numord',$data->getNumord());
          OrdendePago::eliminarCausado($data->getNumord());
        }else { return 527;}
      }
    }else { return 526;}
   }//if ($opordpag)

    $opordpag->delete();
    return -1;
  }

    /**
   * FunciÃ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxcomprobante()
  {
     $this->opordpag = $this->getOpordpagOrCreate();
     $this->updateOpordpagFromRequest();
     $concom=0;
     $msjuno="";
     $msjtres="";
     $comprobante="";
     $this->msjuno="";
     $this->msjtres="";
     $this->i="";
     $this->formulario=array();
     $this->setVars();
     $this->configGrid();
     $detalle=Herramientas::CargarDatosGridv2($this,$this->objeto,true);
     $c = new Criteria();
     $c->add(TsdeffonantPeer::CODFON,$this->opordpag->getCodfonant());
     $reg= TsdeffonantPeer::doSelectOne($c);
     if ($reg)
     {
     	$this->opordpag->setCedrif($reg->getCedrif());
     	$this->opordpag->setCodcat($reg->getCodcat());
     }

     if ($this->opordpag->getCedrif()=="" || $this->opordpag->getCodcat()=="" || count($detalle[0])==0)
     {
       $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario y el CÃ³digo Categoria de Fondo en Anticipo en la ConstituciÃ³n de Fondo en Anticipo Ã³ las Imputaciones Presupuestarias, para luego generar el comprobante";
     }

     if ($msjtres=="")
     {
      $x=Tesoreria::grabarComprobanteF($this->opordpag,$detalle,&$msjuno,&$comprobante);
      $concom=$concom + 1;

      if ($msjuno=="")
      {
        $form="sf_admin/tesrepfonant/confincomgen";
        $i=0;
        while ($i<$concom)
        {
         $f[$i]=$form.$i;
         $this->getUser()->setAttribute('grabar',$comprobante[$i]->getGrabar(),$f[$i]);
         $this->getUser()->setAttribute('reftra',$comprobante[$i]->getReftra(),$f[$i]);
         $this->getUser()->setAttribute('numcomp',$comprobante[$i]->getNumcom(),$f[$i]);
         $this->getUser()->setAttribute('fectra',$comprobante[$i]->getFectra(),$f[$i]);
         $this->getUser()->setAttribute('destra',$comprobante[$i]->getDestra(),$f[$i]);
         $this->getUser()->setAttribute('ctas', $comprobante[$i]->getCtas(),$f[$i]);
         $this->getUser()->setAttribute('desctas', $comprobante[$i]->getDesc(),$f[$i]);
         $this->getUser()->setAttribute('tipmov', '');
         $this->getUser()->setAttribute('mov', $comprobante[$i]->getMov(),$f[$i]);
         $this->getUser()->setAttribute('montos', $comprobante[$i]->getMontos(),$f[$i]);
         $i++;
        }
        $this->i=$concom-1;
        $this->formulario=$f;
        }else
        {
          $this->msjuno=$msjuno;
        }
     }
     else
     {
        $this->msjtres=$msjtres;
     }
      $output = '[["opordpag_totalcomprobantes","'.$concom.'",""],["","",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }

  public function executeAnular()
  {
   $this->referencia=$this->getRequestParameter('referencia');
   $numord=$this->getRequestParameter('numord');
   $fecemi=$this->getRequestParameter('fecemi');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($fecemi, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(OpordpagPeer::NUMORD,$numord);
   $c->add(OpordpagPeer::FECEMI,$fec);
   $this->opordpag = OpordpagPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvaranu()
  {
    $numord=$this->getRequestParameter('numord');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $this->msg='';
    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $c->add(OpordpagPeer::NUMORD,$numord);
    $resul= OpordpagPeer::doSelectOne($c);
    if ($resul)
    {
      if (($resul->getNumche()=='') || (strlen($resul->getNumche())==0))
      {
        $documentorefiere=Herramientas::getX('Tipcau','Cpdoccau','Refier',$resul->getTipcau());

          OrdendePago::anularCausado($numord,$fecanu,$desanu);
          if ($resul->getNumcom()!="")
          {
            $compadic="";
            $numerocomp=$resul->getNumcom();
            $statuscodigo=Herramientas::getX('Codubi','Bnubica','Stacod',$resul->getCoduni());
            if ($statuscodigo=='C'){ $generaotro=true;}else{ $generaotro=false;}
            OrdendePago::anularComprob($numerocomp,$fecanu,$desanu,$compadic,$generaotro,&$msjs);
            if ($msjs!="")
            {
              $this->msg=$msjs;
              return sfView::SUCCESS;
            }
          }
          else
          {
            if ($resul->getTipcau()!="O/PE")
            {
             $this->msg="El Comprobante no serÃ¡ anulado, ya que se perdiÃ³ la asociaciÃ³n con Contabilidad";
             return sfView::SUCCESS;
            }
          }
         if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
         { $resul->setFecanu($fec);}
         $resul->setDesanu($desanu);
         $resul->setStatus('A');


         // Actualizar salidas de Fondo en Anticipo
           $t= new Criteria();
           $t->add(OpdetordPeer::NUMORD,$resul->getNumord());
           $datos=OpdetordPeer::doSelect($t);
           if ($datos)
           {
               foreach ($datos as $objdat)
               {
                   $cadenarefe=split(',',$objdat->getReffon());
                    $r=0;
                    while ($r<(count($cadenarefe)))
                    {
                        $aux=$cadenarefe[$r];
                        $a= new Criteria();
                        $a->add(TsfonantPeer::REFFON,$aux);
                        $data= TsfonantPeer::doSelectOne($a);
                        if ($data)
                        {
                           $data->setStafon('P');
                           $data->save();
                        }

                        $r++;
                    }
                    if ($r==0)
                    {
                       $a= new Criteria();
                       $a->add(TsfonantPeer::REFFON,$objdat->getReffon());
                       $data= TsfonantPeer::doSelectOne($a);
                       if ($data)
                       {
                           $data->setStafon('P');
                           $data->save();
                       }
                    }
               }
           }


         $resul->save();
      }
      else
      {
        $this->msg="La Orden ya fue Pagada en el MÃ³dulo de Bancos";
        return sfView::SUCCESS;
      }
    }
    return sfView::SUCCESS;
  }

  public function validarGeneraComprobante()
  {
    $concom=$this->getRequestParameter('opordpag[totalcomprobantes]');
    $form="sf_admin/tesrepfonant/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
    if ($grabo=='')
    { return true;}
    else { return false;}
  }

  /**
   * FunciÃ³n para manejar la captura de errores del negocio, tanto que se
   * produzcan por algÃºn validator y por un valor false retornado por el validateEdit
   *
   */
  public function handleErrorEdit()
  {
    $this->params=array();
    $this->preExecute();
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->updateOpordpagFromRequest();
	$this->updateError();
    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        if ($this->coderr==118)
        $this->getRequest()->setError('',$err.' '.$this->codigo);
        else $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;
  }

}
