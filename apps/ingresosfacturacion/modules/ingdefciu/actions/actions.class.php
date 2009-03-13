<?php

/**
 * ingdefciu actions.
 *
 * @package    siga
 * @subpackage ingdefciu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class ingdefciuActions extends autoingdefciuActions
{

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

  /*public function executeDelete()
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
