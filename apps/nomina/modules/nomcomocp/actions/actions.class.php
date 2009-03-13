<?php

/**
 * nomcomocp actions.
 *
 * @package    siga
 * @subpackage nomcomocp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomcomocpActions extends autonomcomocpActions
{

  private $coderror = -1;


  public function executeEdit()
  {
    $this->npcomocp = $this->getNpcomocpOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpcomocpFromRequest();

      $this->saveNpcomocp($this->npcomocp);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomcomocp/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomcomocp/list');
      }
      else
      {
        return $this->redirect('nomcomocp/edit?id='.$this->npcomocp->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
    $this->maxpas = '';
    if ($this->npcomocp->getId()<>''){
    $c = new Criteria();
    $c->add(NpcomocpPeer::CODTIPCAR,$this->npcomocp->getCodtipcar());
    $c->add(NpcomocpPeer::FECDES,$this->npcomocp->getFecdes());
    $c->addDescendingOrderByColumn(NpcomocpPeer::PASCAR);
    $rs = NpcomocpPeer::doSelectOne($c);
    $this->maxpas = $rs->getPascar();
    }


    //$sql = 'select max(pascar) from npcomocp where codtipcar = '.$this->npcomocp->getPascar().' and fecdes = '.$this->npcomocp->getFecdes();

    //$this->maxpas = '2';


  }

  protected function updateNpcomocpFromRequest()
  {
    $npcomocp = $this->getRequestParameter('npcomocp');

    if (isset($npcomocp['codtipcar']))
    {
      $this->npcomocp->setCodtipcar($npcomocp['codtipcar']);
    }
    if (isset($npcomocp['pascar']))
    {
      $this->npcomocp->setPascar($npcomocp['pascar']);
    }
    if (isset($npcomocp['fecdes']))
    {
      if ($npcomocp['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npcomocp['fecdes']))
          {
            $value = $dateFormat->format($npcomocp['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npcomocp['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npcomocp->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npcomocp->setFecdes(null);
      }
    }
    if (isset($npcomocp['']))
    {
      $this->npcomocp->set($npcomocp['']);
    }
  }


  public function configGrid($codtipcar='',$fecdes='',$pascar='')
  {
    $result=array();
    if ($fecdes=='') $fecdes=date('Y-m-d');
    if ($codtipcar=='') $codtipcar='0';
  $sql = "Select Distinct(gracar) as gracar from NPComOcp where CodTipCar='".$codtipcar."' and Fecdes='".$fecdes."'";
    if (Herramientas::BuscarDatos($sql,&$result))
    {
          $gracar=$result[0]['gracar'];
    }

    $c = new Criteria();
    $c->add(NpcomocpPeer::FECDES,$fecdes);
    $c->add(NpcomocpPeer::CODTIPCAR,$codtipcar);
    //$c->add(NpcomocpPeer::GRACAR,$gracar);
    $c->addAscendingOrderByColumn(NpcomocpPeer::GRACAR);
    $per = NpcomocpPeer::doSelect($c);
    $filas_arreglo=100;
    //print $codigo;


    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(false);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npcomocp');
    $opciones->setName('a');
    $opciones->setAncho(800);
    $opciones->setAnchoGrid(800);
    $opciones->setTitulo('Cargos');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Grado');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('gracar');
    $col1->setHTML('type="text" size="5" maxlength="3"');

    $col2 = new Columna('Paso');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('pascar');
        $col2->setEsNumerico(true);
    $col2->setHTML('type="text" size="5" readonly="readonly"');

    $col3 = new Columna('Sueldo');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('suecar');
        $col3->setEsNumerico(true);
            $col3->setJScript('onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id);actualizar_grid_sueldos(this.id)"');
    $col3->setHTML('type="text" size="10"');


    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
  }


  public function executeGrid()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
   if ($this->getRequestParameter('ajax')=='1')
   {
     $dato=NpasicarnomPeer::getNomnom(trim($this->getRequestParameter('codigo')));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    $this->configGrid($this->getRequestParameter('codigo'),$this->getRequestParameter('codigo'));
   }
    }

  protected function getNpcomocpOrCreate($id = 'id', $codtipcar = 'codtipcar', $fecdes = 'fecdes')
  {
    if (!$this->getRequestParameter($codtipcar))
    {
      $npcomocp = new Npcomocp();
     $this->configGrid($npcomocp->getCodtipcar(),$npcomocp->getFecdes(),$npcomocp->getPascar());

    }
    else
    {

      //$npconfon = NpconfonPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
      $c->add(NpcomocpPeer::CODTIPCAR,$this->getRequestParameter($codtipcar));
      $c->add(NpcomocpPeer::FECDES,$this->getRequestParameter($fecdes));
      $npcomocp = NpcomocpPeer::doSelectOne($c);
     $this->configGrid($this->getRequestParameter($codtipcar),$this->getRequestParameter($fecdes),$npcomocp->getPascar());
      $this->forward404Unless($npcomocp);
    }

    return $npcomocp;
  }


  protected function getNpconfonOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npconfon = new Npconfon();
    }
    else
    {
      //$npconfon = NpconfonPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
      $c->add(NpconfonPeer::CODNOM,$this->getRequestParameter($id));
      $npconfon = NpconfonPeer::doSelectOne($c);
      $this->forward404Unless($npconfon);
    }

    return $npconfon;
  }



  public function executeAjax()
  {
   $cajtexmos=$this->getRequestParameter('cajtexmos');
   $cajtexcom=$this->getRequestParameter('cajtexcom');
   if ($this->getRequestParameter('ajax')=='1')
   {
     $dato=NptipcarPeer::getNomtip(trim($this->getRequestParameter('codigo')));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }
  }

  protected function saveNpcomocp($npcomocp)
  {
  $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
  Nomina::Grabar_grid_nocomocp($npcomocp,$grid);
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npcomocp/filters');

    // pager
    $this->pager = new sfPropelPager('Npcomocp', 8);
    $c = new Criteria();


    $c->addSelectColumn("0 AS PASCAR");
    $c->addSelectColumn("0 AS GRACAR");
    $c->addSelectColumn("0 AS SUECAR");
    $c->addSelectColumn(NpcomocpPeer::CODTIPCAR);
    $c->addSelectColumn(NpcomocpPeer::FECDES);
    $c->addSelectColumn("0 AS ID");

    $c->addGroupByColumn(NpcomocpPeer::CODTIPCAR);
    $c->addGroupByColumn(NpcomocpPeer::FECDES);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
}
