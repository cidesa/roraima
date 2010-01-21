<?php

/**
 * tesrencajchi actions.
 *
 * @package    Roraima
 * @subpackage tesrencajchi
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesrencajchiActions extends autotesrencajchiActions
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/opordpag/filters');

    $b= new Criteria();
    $dat=OpdefempPeer::doSelectOne($b);
    if ($dat)
    {
      $tiprencajchi=$dat->getTiprencajchi();
    }else $tiprencajchi="";

     // 15    // pager
    $this->pager = new sfPropelPager('Opordpag', 15);
    $c = new Criteria();
    $c->add(OpordpagPeer::TIPCAU,$tiprencajchi);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

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
   $this->setVars();
   $this->configGrid();
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
    $this->configGridSalida($this->getRequestParameter('opordpag[fecdes]'),$this->getRequestParameter('opordpag[fechas]'));
    $this->configGridDetalle($this->opordpag->getNumord());
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridSalida($fechades='', $fechahas='')
  {
    if ($fechades=='') $fechades=date('Y-m-d');
    if ($fechahas=='') $fechahas=date('Y-m-d');
    $sql="tssalcaj.fecsal>='".$fechades."'  and tssalcaj.fecsal<='".$fechahas."'";

    $a= new Criteria();
    $a->add(TssalcajPeer::FECSAL,$sql,Criteria::CUSTOM);
    $a->add(TssalcajPeer::STASAL,'P');
    $det= TssalcajPeer::doSelect($a);

    $this->filsal=count($det);
    $this->opordpag->setFilassal($this->filsal);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesrencajchi/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_tssalcaj');
    $this->columnas[1][0]->setHTML('onClick="guardarseleccion()"');
    $this->objeto1 =$this->columnas[0]->getConfig($det);

    $this->opordpag->setObjeto1($this->objeto1);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
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

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesrencajchi/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_opdetord');
    $this->columnas[1][1]->setEsTotal(true,'opordpag_monord');
    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->opordpag->setObjeto($this->objeto);
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
        $arre=Tesoreria::FormarArreImp($codigo);
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
        $this->configGridSalida($fechades,$fechahas);
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
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

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

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }

  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto,true);

  }

    public function setVars()
  {
    $b= new Criteria();
    $dat=OpdefempPeer::doSelectOne($b);
    if ($dat)
    {
      $this->opordpag->setTipcau($dat->getTiprencajchi());
      $this->opordpag->setCedrif($dat->getCedrifcajchi());
      $this->opordpag->setCodcat($dat->getCodcatcajchi());
    }
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
      $form="sf_admin/tesrencajchi/confincomgen";
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

          $numerocomp = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$this->getUser()->getAttribute('grabar',null,$formulario[$i]));
          $opordpag->setNumcom($numerocomp);
         }
         $i++;
        }
      }
      $this->getUser()->getAttributeHolder()->remove('grabo',$form.'0');

      $grid=Herramientas::CargarDatosGridv2($this,$this->objeto,true);
      Tesoreria::salvarRendicionCajaChica($opordpag,$grid,$numerocomp);
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
         /* else
          {
              if ($data->getTipcau()!='O/PE')
              {
                return $this->msj="El Comprobante no puede ser Eliminado, ya que se perdio la asociacion con Contabilidad";
              }
          }*/

          Herramientas::EliminarRegistro('Opdetord','Numord',$data->getNumord());
          OrdendePago::eliminarCausado($data->getNumord());
        }else { return 527;}
      }
    }else { return 526;}
   }//if ($opordpag)

   $a= new Criteria();
   $a->add(TssalcajPeer::FECSAL,$opordpag->getFecemi(),Criteria::LESS_EQUAL);
   $data= TssalcajPeer::doSelect($a);
   if ($data)
   {
     foreach ($data as $obj)
     {
       $obj->setStasal('P');
       $obj->save();
     }
    }
    $opordpag->delete();
    return -1;
  }

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
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
     if ($this->opordpag->getCedrif()=="" || $this->opordpag->getCodcat()=="" || count($detalle[0])==0)
     {
       $msjtres="No se puede Generar el Comprobante, Verique si introdujo los Datos del Beneficiario y el Código Categoria de Caja Chica en la definicion de Empresa ó las Imputaciones Presupuestarias, para luego generar el comprobante";
     }

     if ($msjtres=="")
     {
      $x=Tesoreria::grabarComprobante($this->opordpag,$detalle,&$msjuno,&$comprobante);
      $concom=$concom + 1;

      if ($msjuno=="")
      {
        $form="sf_admin/tesrencajchi/confincomgen";
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
             $this->msg="El Comprobante no será anulado, ya que se perdió la asociación con Contabilidad";
             return sfView::SUCCESS;
            }
          }
         if (checkdate(intval($fecha_aux[1]),intval($fecha_aux[0]),intval($fecha_aux[2])))
         { $resul->setFecanu($fec);}
         $resul->setDesanu($desanu);
         $resul->setStatus('A');
         $resul->save();
      }
      else
      {
        $this->msg="La Orden ya fue Pagada en el Módulo de Bancos";
        return sfView::SUCCESS;
      }
    }
    return sfView::SUCCESS;
  }

  public function validarGeneraComprobante()
  {
    $concom=$this->getRequestParameter('opordpag[totalcomprobantes]');
    $form="sf_admin/tesrencajchi/confincomgen";
    $grabo=$this->getUser()->getAttribute('grabo',null,$form.'0');
    if ($grabo=='')
    { return true;}
    else { return false;}
  }


}
