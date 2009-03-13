<?php

/**
 * nomasicaremplot actions.
 *
 * @package    siga
 * @subpackage nomasicaremplot
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomasicaremplotActions extends autonomasicaremplotActions
{



   public function executeEdit()
  {
    $this->npnomina = $this->getNpnominaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomasicaremplot/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomasicaremplot/list');
      }
      else
      {
        return $this->redirect('nomasicaremplot/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
      if (!$this->npnomina->getId())  $this->nuevo='S';
    }
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npnomina/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 8);
    $c = new Criteria();
    $c->addJoin(NpasicarempPeer::CODNOM,NpnominaPeer::CODNOM);
    $c->Setdistinct();
    $c->add(NpasicarempPeer::STATUS,'V');
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  public function configGrid($codigo='')
  {
    $c = new Criteria();
    $c->addJoin(NpasiconnomPeer::CODCON,NpdefcptPeer::CODCON);
    $c->add(NpasiconnomPeer::CODNOM,$codigo);
    $c->addAsColumn('NOMCON',NpdefcptPeer::NOMCON);
    $c->addAsColumn('CODCON',NpasiconnomPeer::CODCON);
    $c->addAscendingOrderByColumn(NpasiconnomPeer::CODCON);
    $reg = NpasiconnomPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npasiconnom');
    $opciones->setAnchoGrid(500);
    $opciones->setTitulo('Conceptos para el Cálculo');
    $opciones->setFilas(50);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    $col1->setEsGrabable(true);
    $col1->setHTML(' ');

    $col2 = new Columna('Código');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codcon');
    $col2->setHTML('type="text" size="10" readonly=true');

    $col3 = new Columna('Nombre del Concepto');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('nomcon');
    $col3->setHTML('type="text" size="25" readonly=true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $this->obj = $opciones->getConfig($reg);
  }

  public function executeAjax()
  {
  $cajtexmos=$this->getRequestParameter('cajtexmos');
  $cajtexcom=$this->getRequestParameter('cajtexcom');

  if ($this->getRequestParameter('ajax')=='1')
  {
    $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));

    $this->configGrid($this->getRequestParameter('codigo'));

    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
  }
}
