<?php

/**
 * oycdefdivest actions.
 *
 * @package    Roraima
 * @subpackage oycdefdivest
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdefdivestActions extends autooycdefdivestActions
{
	public function Cargarpais()
	{
		$tablas=array('ocpais');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpai','nompai');// arreglos donde me traigo el nombre y el codigo
		return $pais= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}

	public function executeCombo()
	{
		if ($this->getRequestParameter('par')=='1')
		{
			$this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
			$this->tipo='P';
		}
	}
	public function funciones_combos()
	{
		$this->pais = $this->Cargarpais();
	}

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->funciones_combos();
		$this->ocestado = $this->getOcestadoOrCreate();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateOcestadoFromRequest();

			if ($this->saveOcestado($this->ocestado)==-1) {

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('oycdefdivest/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('oycdefdivest/list');
			}
			else
			{
				return $this->redirect('oycdefdivest/edit?id='.$this->ocestado->getId());
			}
                        }else
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
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
	{
			$this->preExecute();
			$this->funciones_combos();
			$this->ocestado = $this->getOcestadoOrCreate();
			$this->updateOcestadoFromRequest();
			$this->labels = $this->getLabels();
			return sfView::SUCCESS;
	}

	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOcestadoFromRequest()
	{
		$ocestado = $this->getRequestParameter('ocestado');

		if (isset($ocestado['codpai']))
		{
			$this->ocestado->setCodpai($ocestado['codpai']);
		}
		if (isset($ocestado['nompai']))
		{
			$this->ocestado->setNompai($ocestado['nompai']);
		}
		if (isset($ocestado['codedo']))
    {
      $this->ocestado->setCodedo($ocestado['codedo']);
    }
    if (isset($ocestado['nomedo']))
    {
      $this->ocestado->setNomedo(ucfirst(strtolower($ocestado['nomedo'])));
    }
  }

    /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->ocestado = OcestadoPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocestado);

    $c= new Criteria();
    $c->add(OcciudadPeer::CODPAI,$this->ocestado->getCodpai());
    $c->add(OcciudadPeer::CODEDO,$this->ocestado->getCodedo());
    $reg= OcciudadPeer::doSelect($c);
    if (!$reg)
    {
      $this->deleteOcestado($this->ocestado);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->getRequest()->setError('delete', 'No Puede Eliminar el Estado. Existen Registros Asociados.');
      return $this->forward('oycdefdivest', 'list');
    }

    return $this->redirect('oycdefdivest/list');
  }

    protected function saveOcestado($ocestado)
  {

    $c= new Criteria();
    $c->add(OcestadoPeer::CODPAI,$ocestado->getCodpai());
    $c->add(OcestadoPeer::CODEDO,$ocestado->getCodedo());
    $data= OcestadoPeer::doSelectOne($c);
    if (!$data)
    {
      $ocestado->save();
      $this->coderror=-1;
      return $this->coderror;
}
    else
    {
    	$this->coderror=1029;
    	return $this->coderror;
    }

  }


}
