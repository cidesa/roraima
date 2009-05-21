<?php

/**
 * oycdefdivest actions.
 *
 * @package    siga
 * @subpackage oycdefdivest
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
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

	public function executeEdit()
	{
		$this->funciones_combos();
		$this->ocestado = $this->getOcestadoOrCreate();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateOcestadoFromRequest();

			$this->saveOcestado($this->ocestado);

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
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}

	public function handleErrorEdit()
	{
			$this->preExecute();
			$this->funciones_combos();
			$this->ocestado = $this->getOcestadoOrCreate();
			$this->updateOcestadoFromRequest();
			$this->labels = $this->getLabels();
			return sfView::SUCCESS;
	}

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


}
