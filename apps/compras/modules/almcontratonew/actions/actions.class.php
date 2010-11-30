<?php

/**
 * almcontratonew actions.
 *
 * @package    siga
 * @subpackage almcontratonew
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almcontratonewActions extends autoalmcontratonewActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid()
  {
    $this->configGridDetalle($this->caordcon->getOrdcon());
    $this->configGridFianzas($this->caordcon->getOrdcon());
    $this->configGridClausulas($this->caordcon->getOrdcon());
    $this->configGridCronograma($this->caordcon->getOrdcon());
  }

    /**
    * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
    * que contiene el formulario. Esta funciÃ³n debe ser llamada
    * en las acciones, create, edit y handleError para recargar en todo momento
    * los datos del grid.
    *
    */
    public function configGridDetalle($ordcon = '') {
        $c = new Criteria();
        $c->add(CadetordcPeer :: ORDCON, $ordcon);
        $det = CadetordcPeer :: doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almcontratonew/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_detalle');

        $this->obj = $this->columnas[0]->getConfig($det);

        $this->caordcon->setObj($this->obj);
    }

    /**
    * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
    * que contiene el formulario. Esta funciÃ³n debe ser llamada
    * en las acciones, create, edit y handleError para recargar en todo momento
    * los datos del grid.
    *
    */
    public function configGridFianzas($ordcon = '') {
        $c = new Criteria();
        $c->add(CafiaconPeer :: ORDCON, $ordcon);
        $fia = CafiaconPeer :: doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almcontratonew/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_fianzas');
        $this->columnas[1][3]->setCombo(Constantes::ListatipoFianza());
        $this->obj2 = $this->columnas[0]->getConfig($fia);

        $this->caordcon->setObj2($this->obj2);
    }

	/**
   * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
   * que contiene el formulario. Esta funciÃ³n debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridClausulas($ordcon= '', $grupo='') {
        if ($ordcon!= '') {
            $c = new Criteria();
            $c->add(CaconclaPeer::ORDCON , $ordcon);
            $cla = CaconclaPeer :: doSelect($c);
        } else {
            $c = new Criteria();
            if ($grupo!='')
            {
                $c->add(CaclagruPeer::CODGRU, $grupo);
                $dreg = CaclagruPeer :: doSelect($c);
                foreach ($dreg as $obj)
                {
                  $caconcla2= new Caconcla();
                  $caconcla2->setDescla(H::getX('Codcla', 'Cadefcla', 'Descla', $obj->getCodcla()));
                  $cla[]=$caconcla2;
                }
            }else {
                $c->add(CaconclaPeer::ORDCON , $ordcon);
                $cla = CaconclaPeer :: doSelect($c);
            }
        }

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almcontratonew/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_clausulas');

        $this->obj3 = $this->columnas[0]->getConfig($cla);

        $this->caordcon->setObj3($this->obj3);
    }

    /**
    * Esta funciÃ³n permite definir la configuraciÃ³n del grid de datos
    * que contiene el formulario. Esta funciÃ³n debe ser llamada
    * en las acciones, create, edit y handleError para recargar en todo momento
    * los datos del grid.
    *
    */
    public function configGridCronograma($ordcon = '') {
        $c = new Criteria();
        $c->add(CacroconPeer :: ORDCON, $ordcon);
        $cro = CacroconPeer :: doSelect($c);

        $this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/almcontratonew/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid_cronograma');

        $this->obj4 = $this->columnas[0]->getConfig($cro);

        $this->caordcon->setObj4($this->obj4);
    }
    
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexcom = $this->getRequestParameter('cajtexcom');
    $cajtexmos = $this->getRequestParameter('cajtexmos');
    $js=""; $dato=""; $dato2="";

    switch ($ajax){
      case '1':
        $t= new Criteria();
        $t->add(CpdocprcPeer::TIPPRC,$codigo);
        $reg= CpdocprcPeer::doSelectOne($t);
        if ($reg)
        {
           $dato=$reg->getNomext();
           $dato2=$reg->getTipprc();
        }else {
           $js="alert('El Tipo de Precompromiso no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["caordcon_tipcon","'.$dato2.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '2':        
        $t= new Criteria();
        $t->add(CaproveePeer::RIFPRO,$codigo);
        $reg= CaproveePeer::doSelectOne($t);
        if ($reg)
        {
           $dato=$reg->getNompro();
           $dato2=$reg->getCodpro();
        }else {
           $js="alert('El Proveedor no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["caordcon_codpro","'.$dato2.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '3':
        $this->params=array();
        $this->caordcon = $this->getCaordconOrCreate();
        $this->labels = $this->getLabels();
        $t= new Criteria();
        $t->add(CagruclaPeer::CODGRU,$codigo);
        $reg= CagruclaPeer::doSelectOne($t);
        if ($reg)
        {
           $dato=$reg->getDesgru();
           $this->configGridClausulas('',$codigo);
        }else {
            $this->configGridClausulas();
           $js="alert('El Grupo no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      case '4':
        $t= new Criteria();
        $t->add(CpdeftitPeer::CODPRE,$codigo);
        $reg= CpdeftitPeer::doSelectOne($t);
        if ($reg)
        {
          if (strlen($codigo)==strlen(H::getX_vacio('Codemp', 'Cpdefniv', 'Forpre', '001')))
          {
              $js="validarcodpresupuestariorepetido('".$cajtexcom."')";
          }else {
            $js="alert_('El C&oacute;digo Presupuestario no es de Ultimo Nivel'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
          }
        }else {
           $js="alert_('El C&oacute;digo Presupuestario no Existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      case '5':          
          $anno=substr($this->getRequestParameter('fecha'),6,10);
          $idtot=$this->getRequestParameter('idtot');
          if (Herramientas::Monto_disponible_ejecucion($anno,$this->getRequestParameter('codpre'),&$mondis))
          {
            if (H::toFloat($this->getRequestParameter('montotal')) > $mondis)
            {
              $js="alert('No Existe disponibilidad de dinero para efectuar la operaciÃ³n se le recomienda disminuir la cantidad solicitada');  $('$codigo').value='0,00'; $('$codigo').focus(); $('$idtot').value='0,00';";
            }            
          }
          
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      case '6':
        $dateFormat = new sfDateFormat('es_VE');
        $fecha = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        $c= new Criteria();
        $c->add(CaordconPeer::NUMCON,$this->getRequestParameter('numcon'));
        $data=CaordconPeer::doSelectOne($c);
        if ($data)
        {
          if ($fecha<$data->getFeccon())
          {
            $js="alert('La Fecha de Anulacion no puede ser menor a la fecha del Contrato'); $('caordcon_fecanu').value=''";
          }          
        }        
        $output = '[["javascript","'.$js.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
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

    if($this->getRequest()->getMethod() == sfRequest::POST){

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
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGridv2($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGridv2($this,$this->obj4);

    Compras::grabarContrato($clasemodelo,$grid,$grid2,$grid3,$grid4);

    return parent::saving($clasemodelo);
  }

  /*public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }*/

  public function executeAnular()
  {
   $this->referencia=$this->getRequestParameter('referencia');
   $numcon=$this->getRequestParameter('numcon');
   $feccon=$this->getRequestParameter('feccon');

   $dateFormat = new sfDateFormat('es_VE');
   $fec = $dateFormat->format($feccon, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(CaordconPeer::NUMCON,$numcon);
   $c->add(CaordconPeer::FECCON,$fec);
   $this->caordcon = CaordconPeer::doSelectOne($c);
   sfView::SUCCESS;
  }

  public function executeSalvaranu()
  {
    $numcon=$this->getRequestParameter('numcon');
    $fecanu=$this->getRequestParameter('fecanu');
    $this->msg='';
    $this->mensaje2="";
   
    $fecha_aux=split("/",$fecanu);
    $dateFormat = new sfDateFormat('es_VE');
    $fec = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));

    $c= new Criteria();
    $c->add(CaordconPeer::NUMCON,$numcon);
    $resul= CaordconPeer::doSelectOne($c);
    if ($resul)
    {
      if ($fec>=$resul->getFeccon())
      {
          $resul->setFecanu($fec);
          $resul->setStacon('N');
          $resul->save();
      }
      else
      {
        $this->msg="El Contrato no se puede Anular con una Fecha Menor a la de Emision";
        return sfView::SUCCESS;
      }
    }
    return sfView::SUCCESS;
  }


}
