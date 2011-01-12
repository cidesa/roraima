<?php

/**
 * fordefpar actions.
 *
 * @package    Roraima
 * @subpackage fordefpar
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32379 2009-09-01 16:59:06Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefparActions extends autofordefparActions
{

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefpar = $this->getFordefparOrCreate();
    $this->funciones_combos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefparFromRequest();

      $this->saveFordefpar($this->fordefpar);

      $this->fordefpar->setId(self::obtenerId($this->fordefpar->getCodest(),$this->fordefpar->getCodmun(),$this->fordefpar->getCodpar()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefpar/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefpar/list');
      }
      else
      {
        return $this->redirect('fordefpar/edit?id='.$this->fordefpar->getId());
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
  protected function saveFordefpar($fordefpar)
  {
    Formulacion::salvarFordefpar($fordefpar);

  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefparFromRequest()
  {
    $fordefpar = $this->getRequestParameter('fordefpar');
    $this->funciones_combos();

    if (isset($fordefpar['codest']))
    {
      $this->fordefpar->setCodest($fordefpar['codest']);
    }
    if (isset($fordefpar['codmun']))
    {
      $this->fordefpar->setCodmun($fordefpar['codmun']);
    }
    if (isset($fordefpar['codpar']))
    {
      $this->fordefpar->setCodpar($fordefpar['codpar']);
    }
    if (isset($fordefpar['despar']))
    {
      $this->fordefpar->setDespar($fordefpar['despar']);
    }
  }

  public function obtenerId($dato1,$dato2,$dato3)
  {
  	$c= new Criteria();
  	$c->add(FordefparPeer::CODEST,$dato1);
  	$c->add(FordefparPeer::CODMUN,$dato2);
  	$c->add(FordefparPeer::CODPAR,$dato3);
  	$resul= FordefparPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $resul->getId();
  	}
  	else
  	{
  		return '';
  	}
  }

    public function executeEliminar()
  {
    $estado=$this->getRequestParameter('estado');
    $municipio=$this->getRequestParameter('municipio');
    $parroquia=$this->getRequestParameter('parroquia');
    $id=$this->getRequestParameter('id');

  	$c= new Criteria();
  	$c->add(ForpryubigeoPeer::CODEST,$estado);
  	$c->add(ForpryubigeoPeer::CODMUN,$municipio);
  	$c->add(ForpryubigeoPeer::CODPAR,$parroquia);
  	$resultados= ForpryubigeoPeer::doSelect($c);
  	if ($resultados)
  	{
  	  $this->setFlash('notice','No se puede eliminar la parroquia, Tiene proyectos asociados');
      return $this->redirect('fordefpar/edit?id='.$id);
  	}
  	else
  	{
  	  $c= new Criteria();
  	  $c->add(FordefparPeer::CODEST,$estado);
  	  $c->add(FordefparPeer::CODMUN,$municipio);
  	  $c->add(FordefparPeer::CODPAR,$parroquia);
  	  $r=FordefparPeer::doDelete($c);

  	  $this->setFlash('notice','Registro Eliminado exitosamente');
      return $this->redirect('fordefpar/edit');
  	}
  }

  public function executeCombo()
  {
    if ($this->getRequestParameter('par')=='1')
    {
      $this->municipios = $this->Cargarmunicipio($this->getRequestParameter('estado'));
    }

  }

  public function executeCombofilter()
  {
    if ($this->getRequestParameter('par')=='1')
    {
      $this->municipios = $this->Cargarmunicipio($this->getRequestParameter('estado'));
    }

  }
  public function CargarEstado()
  {
    $tablas=array('fordefest');
    $filtros_tablas=array('');
    $filtros_variales=array('');
    $campos_retornados=array('codest','desest');
    return $estado= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
  }

  public function CargarMunicipio($codest)
  {
    $tablas=array('fordefmun');
    $filtros_tablas=array('codest');
    $filtros_variales=array($codest);
    $campos_retornados=array('codmun','desmun');
    return $municipio= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
  }

  public function funciones_combos()
  {
    $this->estados = $this->CargarEstado();
    $this->municipios = $this->CargarMunicipio($this->fordefpar->getCodest());
  }

}