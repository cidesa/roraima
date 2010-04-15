<?php

/**
 * nomasicaremplot actions.
 *
 * @package    Roraima
 * @subpackage nomasicaremplot
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomasicaremplotActions extends autonomasicaremplotActions
{



   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
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

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
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

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
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
