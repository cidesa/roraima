<?php

/**
 * generales actions.
 *
 * @package    Roraima
 * @subpackage generales
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * @version    SVN: $Id$
 */
class generalesActions extends sfActions
{

  public function executeLogin()
  {


  }

  public function executeCatalogo()
  {

    $clase = $this->getRequestParameter('clase');
    if($clase)
    {
      $c = new Criteria();
      $this->registros = array();
      $this->campos = array();
      $this->columnas = array();
      $this->tabla = '';
      $str = '$this->registros = '.ucfirst(strtolower($clase)).'Peer::doSelect($c);';
      eval($str);
      $str = '$this->campos = '.ucfirst(strtolower($clase)).'Peer::getArrayFieldsNames();';
      eval($str);
      $str = '$this->tabla = ucfirst(strtolower('.$clase.'Peer::TABLE_NAME));';
      eval($str);
      $str = '$this->columnas = '.ucfirst(strtolower($clase)).'Peer::getColumsNames();';
      eval($str);

      /*

      $this->processSort();
      $this->processFilters();
    $this->setVars();
      $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/caregart/filters');

      // pager
      $this->pager = new sfPropelPager('Caregart', 100);
      $c = new Criteria();
      $this->addSortCriteria($c);
      $this->addFiltersCriteria($c);
      $this->pager->setCriteria($c);
      $this->pager->setPage($this->getRequestParameter('page', 1));
      $this->pager->init();

    */

    }
    else return sfView::SUCCESS;


  }

  public function executeAutocomplete()
  {
  $fieldwhere = $this->getRequestParameter('fieldwhere','');
  $table = $this->getRequestParameter('table','');
  $fieldget = $this->getRequestParameter('fieldget','');
  $val = $this->getRequestParameter('val','');
  $val = $this->getRequestParameter($val,'');

  $this->tags=Herramientas::autocompleteAjax($fieldwhere,$table,$fieldget,$val);
  }


   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codpro=' ',$codaccesp=' ',$codmet=' ', $codpre=' ')
  {
    /**************************************************************************
     **         Grid Formulación del Plan Operativo Formulario               **
     **                  Jesus Lobaton Graba en Clase                        **
     **************************************************************************/

    $c = new Criteria();

    $c->addJoin(FortipfinPeer::CODFIN,FordisfuefinpryaccmetPeer::CODPARING.' AND '.FordisfuefinpryaccmetPeer::CODPRO.'= '.chr(39).$codpro.chr(39).' AND '.FordisfuefinpryaccmetPeer::CODACCESP.'='.chr(39).$codaccesp.chr(39).' AND '.FordisfuefinpryaccmetPeer::CODMET.'='.chr(39).$codmet.chr(39).' AND '.FordisfuefinpryaccmetPeer::CODPRE.'='.chr(39).$codpre.chr(39), Criteria::LEFT_JOIN);
        $c->addAsColumn('MONFIN', 'COUNT('.FordisfuefinpryaccmetPeer::MONFIN.')');
        $c->addGroupByColumn(FortipfinPeer::NOMABR);
        $c->addGroupByColumn(FortipfinPeer::APOFIS);
        $c->addGroupByColumn(FortipfinPeer::TIPFIN);
        $c->addGroupByColumn(FortipfinPeer::MONTOING);
        $c->addGroupByColumn(FortipfinPeer::MONTODIS);
        $c->addGroupByColumn(FortipfinPeer::MONTODISAUX);
        $c->addGroupByColumn(FortipfinPeer::ID);
    $c->addGroupByColumn(FortipfinPeer::CODFIN);
    $c->addGroupByColumn(FortipfinPeer::NOMEXT);
    $c->addGroupByColumn(FortipfinPeer::MONTODISAUX);
    $c->addAscendingOrderByColumn(FortipfinPeer::CODFIN);
    $per = FortipfinPeer::doSelect($c);


    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
         $opciones->setEliminar(false);
    $opciones->setTabla('Fordisfuefinpryaccmet');
    $opciones->setFilas(0);
    $opciones->setAnchoGrid(850);
    $opciones->setTitulo('Fuente de Financiamiento');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Cod.Fte.Financ');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(false);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('Codfin');
    $col1->setHTML('type="text" size="8" disabled=true');
    //$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

    $col2 = new Columna('Descripción Fuente de Financiamiento');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(false);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Nomext');
    $col2->setHTML('type="text" size="25" disabled=true');

    $col3 = new Columna('Monto Disponible de la Fuente');
    $col3->setTipo(Columna::MONTO);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setEsGrabable(false);
    $col3->setEsNumerico(true);
    $col3->setNombreCampo('Montodisaux');
    //$col3->setJScript('onKeypress="entermonto(event,this.id), costoenter(event,this.id)"');
    $col3->setHTML('type="text" size="18" disabled=true');

    $col4 = clone $col3;
    $col4->setTipo(Columna::MONTO);
    $col4->setTitulo('Monto a Formular');
    $col4->setNombreCampo('Monfin');
    $col4->setEsGrabable(true);
    $col4->setHTML('type="text" size="15"');
    $col4->setJScript('onKeypress="validarmonto(event,this.id),entermonto(event,this.id)"');
    $col4->setEsTotal(true,'sumatoria');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);

  }

  public function executeFinan()
  {
    $obj1=$this->getRequestParameter('obj1');
    $obj2=$this->getRequestParameter('obj2');
    $obj3=$this->getRequestParameter('obj3');
    $obj4=$this->getRequestParameter('obj4');
    $this->asig=$this->getRequestParameter('obj5');
    $this->configGrid($obj1,$obj2,$obj3,$obj4);
    sfView::SUCCESS;
    }



// Acciones de errores de autenticación

  public function executeRouting()
  {

  }

  public function executeError404()
  {

  }

  public function executeNologin()
  {
    $this->getUser()->setAttribute('urlreferente',$this->getRequest()->getUri());
  }

  public function executeNocredentials()
  {

  }

  public function executeDisabled()
  {

  }

}
