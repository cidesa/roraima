<?php

/**
 * oycsitobr actions.
 *
 * @package    Roraima
 * @subpackage oycsitobr
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycsitobrActions extends autooycsitobrActions
{
   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->ocregobr = $this->getOcregobrOrCreate();
    Obras::arregloFinDet($this->ocregobr->getCodobr(),&$arreglodet);
    Obras::arregloFinFis($this->ocregobr->getCodobr(),&$arreglofis);
    $this->fil1=count($arreglodet);
    $this->fil2=count($arreglofis);
    $this->configGridDet($arreglodet);
    $this->configGridFis($arreglofis);
    if ($this->ocregobr->getId()!='')
    {
       switch ($this->ocregobr->getStaobr()) {
         case 'A':
           $this->color='#CC0000';
           $this->eti="A INICIARSE";
           break;
         case 'E':
           $this->color='#CC0000';
           $this->eti="EN EJECUCCION";
           break;
         case 'P':
           $this->color='#CC0000';
           $this->eti="PARALIZADO";
           break;
         case 'T':
           $this->color='#CC0000';
           $this->eti="TERMINADO";
           break;
         case 'N':
           $this->color='#CC0000';
           $this->eti="ANULADO";
           break;
       }
    }
    else
    {
      $this->color='';
      $this->eti='';
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcregobrFromRequest();

      $this->saveOcregobr($this->ocregobr);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycsitobr/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycsitobr/list');
      }
      else
      {
        return $this->redirect('oycsitobr/edit?id='.$this->ocregobr->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDet($arreglo=array())
  {
   $reg = $arreglo;

   $opciones = new OpcionesGrid();
   $opciones->setTabla('Ocpreobr');
   $opciones->setAncho(1000);
   $opciones->setAnchoGrid(1000);
   $opciones->setFilas(0);
   $opciones->setEliminar(false);
   $opciones->setTitulo('');
   $opciones->setHTMLTotalFilas(' ');

   $col1 = new Columna('Cód. Partida');
   $col1->setTipo(Columna::TEXTO);
   $col1->setAlineacionObjeto(Columna::CENTRO);
   $col1->setAlineacionContenido(Columna::CENTRO);
   $col1->setNombreCampo('codpar');
   $col1->setHTML('type="text" size="17" readonly="true"');

   $col2 = new Columna('Descripción');
   $col2->setTipo(Columna::TEXTO);
   $col2->setAlineacionObjeto(Columna::IZQUIERDA);
   $col2->setAlineacionContenido(Columna::IZQUIERDA);
   $col2->setNombreCampo('despar');
   $col2->setHTML('type="text" size="30" readonly=true');

   $col3 = new Columna('Programada');
   $col3->setTipo(Columna::MONTO);
   $col3->setAlineacionContenido(Columna::DERECHA);
   $col3->setAlineacionObjeto(Columna::DERECHA);
   $col3->setNombreCampo('canobr');
   $col3->setEsNumerico(true);
   $col3->setHTML('type="text" size="10" readonly="true"');

   $col4 = clone $col3;
   $col4->setTitulo('Ejecutada');
   $col4->setNombreCampo('caneje');

   $col5 = clone $col3;
   $col5->setTitulo('Diferencia');
   $col5->setNombreCampo('candif');

   $col6 = clone $col3;
   $col6->setTitulo('% Eje');
   $col6->setNombreCampo('poreje');

   $col7 = clone $col3;
   $col7->setTitulo('Sub-Total');
   $col7->setNombreCampo('subtot');

   $col8 = clone $col3;
   $col8->setTitulo('Adicional');
   $col8->setNombreCampo('canadi');

   $opciones->addColumna($col1);
   $opciones->addColumna($col2);
   $opciones->addColumna($col3);
   $opciones->addColumna($col4);
   $opciones->addColumna($col5);
   $opciones->addColumna($col6);
   $opciones->addColumna($col7);
   $opciones->addColumna($col8);

   $this->obj = $opciones->getConfig($reg);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridFis($arreglo=array())
  {
   $reg = $arreglo;

   $opciones = new OpcionesGrid();
   $opciones->setTabla('Ocpreobr');
   $opciones->setAncho(1000);
   $opciones->setAnchoGrid(1000);
   $opciones->setFilas(0);
   $opciones->setEliminar(false);
   $opciones->setTitulo('');
   $opciones->setName('b');
   $opciones->setHTMLTotalFilas(' ');

   $col1 = new Columna('Código');
   $col1->setTipo(Columna::TEXTO);
   $col1->setAlineacionObjeto(Columna::CENTRO);
   $col1->setAlineacionContenido(Columna::CENTRO);
   $col1->setNombreCampo('codpar');
   $col1->setHTML('type="text" size="17" readonly="true"');

   $col2 = new Columna('Descripción');
   $col2->setTipo(Columna::TEXTO);
   $col2->setAlineacionObjeto(Columna::IZQUIERDA);
   $col2->setAlineacionContenido(Columna::IZQUIERDA);
   $col2->setNombreCampo('despar');
   $col2->setHTML('type="text" size="30" readonly=true');

   $col3 = new Columna('Programada');
   $col3->setTipo(Columna::MONTO);
   $col3->setAlineacionContenido(Columna::DERECHA);
   $col3->setAlineacionObjeto(Columna::DERECHA);
   $col3->setNombreCampo('canobr');
   $col3->setEsNumerico(true);
   $col3->setHTML('type="text" size="10" readonly="true"');

   $col4 = clone $col3;
   $col4->setTitulo('Ejecutada');
   $col4->setNombreCampo('caneje');

   $col5 = clone $col3;
   $col5->setTitulo('% Rep.');
   $col5->setNombreCampo('porrep');

   $col6 = clone $col3;
   $col6->setTitulo('% Eje.');
   $col6->setNombreCampo('poreje');

   $col7 = clone $col3;
   $col7->setTitulo('Adicional');
   $col7->setNombreCampo('canadi');

   $opciones->addColumna($col1);
   $opciones->addColumna($col2);
   $opciones->addColumna($col3);
   $opciones->addColumna($col4);
   $opciones->addColumna($col5);
   $opciones->addColumna($col6);
   $opciones->addColumna($col7);

   $this->obj2 = $opciones->getConfig($reg);
  }
}
