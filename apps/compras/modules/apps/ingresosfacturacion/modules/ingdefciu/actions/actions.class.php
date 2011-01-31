<?php

/**
 * ingdefciu actions.
 *
 * @package    Roraima
 * @subpackage ingdefciu
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingdefciuActions extends autoingdefciuActions
{

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->inciudad = $this->getInciudadOrCreate();
    $this->funciones_combos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateInciudadFromRequest();

      if ($this->saveInciudad($this->inciudad)==-1)
      {
      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('ingdefciu/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('ingdefciu/list');
      }
      else
      {
        return $this->redirect('ingdefciu/edit?id='.$this->inciudad->getId());
      }
      }
      else
      {
       $this->labels = $this->getLabels();
       $err = Herramientas::obtenerMensajeError($this->coderror);
   	   $this->getRequest()->setError('',$err);
       return sfView::SUCCESS;
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateInciudadFromRequest()
  {
    $inciudad = $this->getRequestParameter('inciudad');
    $this->funciones_combos();

    if (isset($inciudad['codpai']))
    {
      $this->inciudad->setCodpai($inciudad['codpai']);
    }
    if (isset($inciudad['nompai']))
    {
      $this->inciudad->setNompai($inciudad['nompai']);
    }
    if (isset($inciudad['codedo']))
    {
      $this->inciudad->setCodedo($inciudad['codedo']);
    }
    if (isset($inciudad['nomedo']))
    {
      $this->inciudad->setNomedo($inciudad['nomedo']);
    }
    if (isset($inciudad['codciu']))
    {
      $this->inciudad->setCodciu($inciudad['codciu']);
    }
    if (isset($inciudad['nomciu']))
    {
      $this->inciudad->setNomciu($inciudad['nomciu']);
    }
  }

	public function executeCombo()
	{
		if ($this->getRequestParameter('par')=='1')
		{
			$this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
			$this->tipo='P';
		}
	}

	public function Cargarpais()
	{
		$tablas=array('inpais');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpai','nompai');// arreglos donde me traigo el nombre y el codigo
		return $pais= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}

	public function Cargarestados($codpais)
	{
		$tablas=array('inestado');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codedo','nomedo');// arreglos donde me traigo el nombre y el codigo
		return $estado= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}

	public function funciones_combos()
	{
		$this->pais = $this->Cargarpais();
		$this->estados = $this->Cargarestados($this->inciudad->getCodpai());//colocar lo q viene de bd

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
  protected function saveInciudad($inciudad)
  {
    $c= new Criteria();
    $c->add(InciudadPeer::CODPAI,$inciudad->getCodpai());
    $c->add(InciudadPeer::CODEDO,$inciudad->getCodedo());
    $c->add(InciudadPeer::CODCIU,$inciudad->getCodciu());
    $data= InciudadPeer::doSelectOne($c);
    if (!$data)
    {
      $inciudad->save();
      $this->coderror=-1;
      return $this->coderror;
    }
    else
    {
    	$this->coderror=1003;
    	return $this->coderror;
    }



  }

  /*/**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->inciudad = InciudadPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->inciudad);

    $c= new Criteria();
    $c->add(OcdeforgPeer::CODPAI,$this->occiudad->getCodpai());
    $c->add(OcdeforgPeer::CODEDO,$this->occiudad->getCodedo());
    $c->add(OcdeforgPeer::CODCIU,$this->occiudad->getCodciu());
    $reg= OcdeforgPeer::doSelect($c);
    if (!$reg)
    {
      $this->deleteOcciudad($this->occiudad);
    }
    else
    {
      $this->getRequest()->setError('delete', 'No se puede eliminar el registro, tiene datos asociados');
      return $this->forward('oycdefdivciu', 'list');
    }

    return $this->redirect('oycdefdivciu/list');
  }*/

}
