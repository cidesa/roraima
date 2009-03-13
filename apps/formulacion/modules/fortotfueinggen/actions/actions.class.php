<?php

/**
 * fortotfueinggen actions.
 *
 * @package    siga
 * @subpackage fortotfueinggen
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fortotfueinggenActions extends autofortotfueinggenActions
{

 public function executeIndex()
  {
    return $this->redirect('fortotfueinggen/edit');
  }

  public function executeActualizardis()
  {
      Formulacion::actdisfueing();
      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');
      return $this->redirect('fortotfueinggen/create');
  }

   public function configGrid()
   {
  //////////////////////
  //GRID
  $c = new Criteria();
  $c->addAscendingOrderByColumn(FortipfinPeer::CODFIN);
  $per = FortipfinPeer::doSelect($c);

  $opciones = new OpcionesGrid();
  // Se configuran las opciones globales del Grid


    $opciones->setEliminar(false);

    $opciones->setTabla('Fortipfin');
  $opciones->setAnchoGrid(750);
  $opciones->setAncho(850);
  $opciones->setTitulo(' ');
  $opciones->setHTMLTotalFilas(' ');
  $opciones->setFilas(0);
  // Se generan las columnas
  $col1 = new Columna('Fuente de Financiamiento');
  $col1->setTipo(Columna::TEXTO);
  $col1->setNombreCampo('nomext');
  $col1->setAlineacionObjeto(Columna::IZQUIERDA);
  $col1->setAlineacionContenido(Columna::IZQUIERDA);
  $col1->setHTML('type="text" size="50" readonly=true');

  $col2 = new Columna('Tipo');
  $col2->setTipo(Columna::TEXTO);
  $col2->setNombreCampo('destipfin');
  $col2->setAlineacionObjeto(Columna::CENTRO);
  $col2->setAlineacionContenido(Columna::CENTRO);
  $col2->setHTML('type="text" size="17" readonly=true');

  $col3 = new Columna('Monto Ingreso Estimado');
  $col3->setTipo(Columna::MONTO);
  $col3->setNombreCampo('montoing');
  $col3->setAlineacionContenido(Columna::DERECHA);
  $col3->setAlineacionObjeto(Columna::DERECHA);
  $col3->setEsNumerico(true);
  $col3->setHTML('type="text" size="12" readonly=true');
  $col3->setEsTotal(true,'tot_ing_est');

    $col4 = new Columna('Monto Formulado');
    $col4->setTipo(Columna::MONTO);
    $col4->setNombreCampo('montofor');
    $col4->setAlineacionContenido(Columna::DERECHA);
    $col4->setAlineacionObjeto(Columna::DERECHA);
    $col4->setEsNumerico(true);
    $col4->setHTML('type="text" size="12" readonly=true');
 	$col4->setEsTotal(true,'tot_ing_dis');


    $col5 = new Columna('Monto Ingreso Disponible');
    $col5->setTipo(Columna::MONTO);
    $col5->setNombreCampo('montodis');
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setEsNumerico(true);
    $col5->setHTML('type="text" size="12" readonly=true');
 	$col5->setEsTotal(true,'tot_ing_dis');

     // Se guardan las columnas en el objetos de opciones
  $opciones->addColumna($col1);
  $opciones->addColumna($col2);
  $opciones->addColumna($col3);
  $opciones->addColumna($col4);
  $opciones->addColumna($col5);

  // Ee genera el arreglo de opciones necesario para generar el grid
  $this->grid = $opciones->getConfig($per);
  }

   public function executeEdit()
   {
    if (Formulacion::verificarexistenmovimientos())
    {
       $this->setFlash('notice1','Existen movimientos de formulación por metas registrados, no se puede recalcular ingresos');
       $this->eximov='S';
  }
  else
     $this->eximov='N';

  $this->fortipfin = $this->getFortipfinOrCreate();
    $this->configGrid();
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFortipfinFromRequest();

      $this->saveFortipfin($this->fortipfin);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fortotfueinggen/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fortotfueinggen/list');
      }
      else
      {
        return $this->redirect('fortotfueinggen/edit?id='.$this->fortipfin->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }
}
