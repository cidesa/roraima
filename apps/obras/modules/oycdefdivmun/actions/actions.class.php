<?php

/**
 * oycdefdivmun actions.
 *
 * @package    siga
 * @subpackage oycdefdivmun
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefdivmunActions extends autooycdefdivmunActions
{
  public $coderror= -1;

  public function executeEdit()
  {
    $this->ocmunici = $this->getOcmuniciOrCreate();
    $this->funciones_combos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcmuniciFromRequest();

      $this->saveOcmunici($this->ocmunici);


      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdefdivmun/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdefdivmun/list');
      }
      else
      {
        return $this->redirect('oycdefdivmun/edit?id='.$this->ocmunici->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

   protected function updateOcmuniciFromRequest()
  {
    $ocmunici = $this->getRequestParameter('ocmunici');
    $this->funciones_combos();

    if (isset($ocmunici['codpai']))
    {
      $this->ocmunici->setCodpai($ocmunici['codpai']);
    }
    if (isset($ocmunici['codedo']))
    {
      $this->ocmunici->setCodedo($ocmunici['codedo']);
    }
    if (isset($ocmunici['codmun']))
    {
      $this->ocmunici->setCodmun($ocmunici['codmun']);
    }
    if (isset($ocmunici['nommun']))
    {
      $this->ocmunici->setNommun($ocmunici['nommun']);
    }
  }

   protected function saveOcmunici($ocmunici)
  {
     $ocmunici->save();
  }

  public function executeDelete()
  {
    $this->ocmunici = OcmuniciPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocmunici);

    $c= new Criteria();
    $c->add(OcparroqPeer::CODPAI,$this->ocmunici->getCodpai());
    $c->add(OcparroqPeer::CODEDO,$this->ocmunici->getCodedo());
    $c->add(OcparroqPeer::CODMUN,$this->ocmunici->getCodmun());
    $reg= OcparroqPeer::doSelect($c);
    if (!$reg)
    {
      $this->deleteOcmunici($this->ocmunici);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->getRequest()->setError('delete', 'No se puede eliminar el registro, tiene datos asociados.');
      return $this->forward('oycdefdivmun', 'list');
    }

    return $this->redirect('oycdefdivmun/list');
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
		$tablas=array('ocpais');//areglo de los joins de las tablas
		$filtros_tablas=array('');//arreglo donde mando los filtros de las clases
		$filtros_variales=array('');//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpai','nompai');// arreglos donde me traigo el nombre y el codigo
		return $pais= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}

	public function Cargarestados($codpais)
	{
		$tablas=array('ocestado');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codedo','nomedo');// arreglos donde me traigo el nombre y el codigo
		return $estado= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
	}

	public function funciones_combos()
	{
		$this->pais = $this->Cargarpais();
		$this->estados = $this->Cargarestados($this->ocmunici->getCodpai());//colocar lo q viene de bd

	}

}
