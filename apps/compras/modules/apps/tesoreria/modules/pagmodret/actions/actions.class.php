<?php

/**
 * pagmodret actions.
 *
 * @package    Roraima
 * @subpackage pagmodret
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagmodretActions extends autopagmodretActions
{
  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
	{
	  $this->opordpag = $this->getOpordpagOrCreate();
	 $this->updateOpordpagFromRequest();
	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);

	  self::$coderror=Tesoreria::validarPagmodret($this->opordpag,$grid);
	  if (self::$coderror<>-1)
	  {
	  	return false;
	  }else return true;
     }else return true;
  }

  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->updateOpordpagFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
	{
	  $err = Herramientas::obtenerMensajeError(self::$coderror);
	  $this->getRequest()->setError('',$err);
	}

    return sfView::SUCCESS;
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->opordpag = $this->getOpordpagOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpordpagFromRequest();

      $this->saveOpordpag($this->opordpag);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagmodret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagmodret/list');
      }
      else
      {
        return $this->redirect('pagmodret/edit?id='.$this->opordpag->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Función para manejar el salvado del formulario.
   * cabe destacar que en las versiones nuevas del formulario (cidesaPropel)
   * llama internamente a la función $this->saving
   * Esta función saving siempre debe retornar un valor >=-1.
   * En esta funcción se debe realizar el proceso de guardado de informacion
   * del negocio en la base de datos. Este proceso debe ser realizado llamado
   * a funciones de las clases del negocio que se encuentran en lib/bussines
   * todos los procesos de guardado deben estar en la clases del negocio (lib/bussines/"modulo")
   *
   */
  protected function saveOpordpag($opordpag)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    OrdendePago::salvarPagmodret($opordpag,$grid,$this->getRequestParameter('total'));

  }

  protected function getOpordpagOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $opordpag = new Opordpag();
    }
    else
    {
      $opordpag = OpordpagPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($opordpag->getNumord());
      $this->forward404Unless($opordpag);
    }

    return $opordpag;
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
    $c->add(OpretordPeer::NUMORD,$codigo);
    $c->add(OpretordPeer::NUMRET,'NOASIGNA');
    $per = OpretordPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('opretord');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo('Imputaciones Presupuestarias');
    $opciones->setFilas(0);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Codigo Presupuestario');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('codpre');
    $col1->setHTML('type="text" size="20" readonly="true"');

    $col2 = new Columna('Título');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nompre');
    $col2->setHTML('type="text" size="30" readonly=true');

    $col3 = new Columna('Tipo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('codtip');
    $col3->setHTML('type="text" size="10" readonly="true"');

    $col4 = new Columna('Retención');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('destip');
    $col4->setHTML('type="text" size="30" readonly=true');

    $col5 = new Columna('Monto');
    $col5->setTipo(Columna::MONTO);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('monret');
    $col5->setEsNumerico(true);
    $col5->setJScript('onKeyPress="entermonto(event,this.id);"');
    $col5->setEsTotal(true,'total');

    $col6 = clone $col1;
    $col6->setTitulo('Referencia');
    $col6->setNombreCampo('refere');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj = $opciones->getConfig($per);
  }
}
