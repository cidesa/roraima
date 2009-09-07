<?php

/**
 * almdefubi actions.
 *
 * @package    Roraima
 * @subpackage almdefubi
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almdefubiActions extends autoalmdefubiActions
{

  private $coderror = -1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->cadefubi = $this->getCadefubiOrCreate();
    $this->mascaraubicacion = Herramientas::ObtenerFormato('Cadefart','Forubi');
    $this->longubi=strlen($this->mascaraubicacion);
    $this->configGrid($this->cadefubi->getCodubi());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateCadefubiFromRequest();

      $this->saveCadefubi($this->cadefubi);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('almdefubi/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('almdefubi/list');
      }
      else
      {
        return $this->redirect('almdefubi/edit?id='.$this->cadefubi->getId());
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
  public function saveCadefubi($cadefubi)
  {
     $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
      Almacen::salvarCadefubi($cadefubi,$grid);
  }




  /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();

    $this->cadefubi= $this->getCadefubiOrCreate();
    $this->updateCadefubiFromRequest();
    $this->configGrid($this->cadefubi->getCodubi());
    $this->mascaraubicacion = Herramientas::ObtenerFormato('Cadefart','Forubi');
    $this->longubi=strlen($this->mascaraubicacion);
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('',$err);
      }
    }
    return sfView::SUCCESS;

  }

  	public function updateCaregartFromRequest()
	{
	  parent::updateCadefubiFromRequest();

	  $this->mascaraubicacion = Herramientas::ObtenerFormato('Cadefart','Forubi');

	}


   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codubi='')
  {
     $sql="Select coalesce((select 1 as check1
				 from  caalmubi where codubi='".$codubi."' and a.codalm = codalm),0) as check, a.codalm as codalm ,a.nomalm as nomalm, a.id as id
				 from Cadefalm a order by a.codalm";

    /*if ($codubi=="")
{*/ $resp = Herramientas::BuscarDatos($sql,&$reg);

      $opciones = new OpcionesGrid();
      $opciones->setEliminar(false);
      $opciones->setTabla('Cadefalm');
      $opciones->setAnchoGrid(500);
      $opciones->setAncho(500);
      $opciones->setName('a');
      $opciones->setTitulo('Almacenes Existentes');
      $opciones->setHTMLTotalFilas(' ');
      $opciones->setFilas(0);

      $col1 = new Columna('Seleccione');
	  $col1->setTipo(Columna::CHECK);
	  $col1->setEsGrabable(true);
	  $col1->setNombreCampo('check');
	  $col1->setHTML(' ');
	  //$col1->setJScript('onClick="validar(this.id)"');

      $col2 = new Columna('Código');
      $col2->setTipo(Columna::TEXTO);
      $col2->setEsGrabable(true);
      $col2->setAlineacionObjeto(Columna::CENTRO);
      $col2->setAlineacionContenido(Columna::CENTRO);
      $col2->setNombreCampo('codalm');
      $col2->setHTML('type="text" size="10" readonly=true');

	  $col3 = new Columna('Nombre');
      $col3->setTipo(Columna::TEXTO);
      $col3->setAlineacionObjeto(Columna::IZQUIERDA);
      $col3->setAlineacionContenido(Columna::IZQUIERDA);
      $col3->setNombreCampo('nomalm');
      $col3->setHTML('type="text" size="60" readonly=true');

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $this->obj = $opciones->getConfig($reg);
  }


  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->cadefubi = CadefubiPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->cadefubi);
    $id=$this->getRequestParameter('id');

   //verificar si no tiene articulos registrados para esa ubicacion
    if (Almacen::Hay_articulos($this->cadefubi->getCodubi())) //no se puede eliminar, tiene hijos
     {
     	$this->setFlash('notice','La ubicación no puede ser eliminada ya que tiene datos asociados');
        return $this->redirect('almdefubi/edit?id='.$id);
     }
     else
     {
	    try
	    {
	      Herramientas::EliminarRegistro('Caalmubi','Codubi',$this->cadefubi->getCodubi());
	      $this->deleteCadefubi($this->cadefubi);
	      $this->Bitacora('Elimino');
	    }
	    catch (PropelException $e)
	    {
	      $this->getRequest()->setError('delete', 'Could not delete the selected Cadefubi. Make sure it does not have any associated items.');
	      return $this->forward('almdefubi', 'list');
	    }

	    return $this->redirect('almdefubi/list');
     }//else
  }
}
