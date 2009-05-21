<?php

/**
 * oycdefdivciu actions.
 *
 * @package    siga
 * @subpackage oycdefdivciu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefdivciuActions extends autooycdefdivciuActions
{
	public $coderror= -1;

  public function executeEdit()
  {
    $this->occiudad = $this->getOcciudadOrCreate();
    $this->funciones_combos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcciudadFromRequest();

      if ($this->saveOcciudad($this->occiudad)==-1)
      {
      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdefdivciu/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdefdivciu/list');
      }
      else
      {
        return $this->redirect('oycdefdivciu/edit?id='.$this->occiudad->getId());
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

   protected function updateOcciudadFromRequest()
  {
    $occiudad = $this->getRequestParameter('occiudad');
    $this->funciones_combos();

    if (isset($occiudad['codpai']))
    {
      $this->occiudad->setCodpai($occiudad['codpai']);
    }
    if (isset($occiudad['nompai']))
    {
      $this->occiudad->setNompai($occiudad['nompai']);
    }
    if (isset($occiudad['codedo']))
    {
      $this->occiudad->setCodedo($occiudad['codedo']);
    }
    if (isset($occiudad['nomedo']))
    {
      $this->occiudad->setNomedo($occiudad['nomedo']);
    }
    if (isset($occiudad['codciu']))
    {
      $this->occiudad->setCodciu($occiudad['codciu']);
    }
    if (isset($occiudad['nomciu']))
    {
      $this->occiudad->setNomciu($occiudad['nomciu']);
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
		$this->estados = $this->Cargarestados($this->occiudad->getCodpai());//colocar lo q viene de bd

	}

  protected function saveOcciudad($occiudad)
  {
    $c= new Criteria();
    $c->add(OcciudadPeer::CODPAI,$occiudad->getCodpai());
    $c->add(OcciudadPeer::CODEDO,$occiudad->getCodedo());
    $c->add(OcciudadPeer::CODCIU,$occiudad->getCodciu());
    $data= OcciudadPeer::doSelectOne($c);
    if (!$data)
    {
      $occiudad->save();
      $this->coderror=-1;
      return $this->coderror;
    }
    else
    {
    	$this->coderror=1003;
    	return $this->coderror;
    }



  }

  public function executeDelete()
  {
    $this->occiudad = OcciudadPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->occiudad);

    $c= new Criteria();
    $c->add(OcdeforgPeer::CODPAI,$this->occiudad->getCodpai());
    $c->add(OcdeforgPeer::CODEDO,$this->occiudad->getCodedo());
    $c->add(OcdeforgPeer::CODCIU,$this->occiudad->getCodciu());
    $reg= OcdeforgPeer::doSelect($c);
    if (!$reg)
    {
      $this->deleteOcciudad($this->occiudad);
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->getRequest()->setError('delete', 'No se puede eliminar el registro, tiene datos asociados');
      return $this->forward('oycdefdivciu', 'list');
    }

    return $this->redirect('oycdefdivciu/list');
  }
}
