<?php

/**
 * oycdefdivsec actions.
 *
 * @package    siga
 * @subpackage oycdefdivsec
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdefdivsecActions extends autooycdefdivsecActions
{
  public function executeCombo()
	{
		if ($this->getRequestParameter('par')=='1')
		{
			$this->estados = $this->Cargarestados($this->getRequestParameter('pais'));
			$this->tipo='P';
		}
		elseif ($this->getRequestParameter('par')=='2')
		{
			$this->municipios = $this->CargarMunicipios($this->getRequestParameter('pais'),$this->getRequestParameter('estado'));
			$this->tipo='E';
		}
		elseif ($this->getRequestParameter('par')=='3')
		{
			$this->parroquias = $this->CargarParroquias($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'));
			$this->tipo='M';
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


	public function CargarMunicipios($codpais,$codestado)
	{
		$tablas=array('ocmunici');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codmun','nommun');// arreglos donde me traigo el nombre y el codigo
		return $ciudad= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	}

    public function CargarParroquias($codpais,$codestado,$codmunicipio)
	{
		$tablas=array('ocparroq');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo','codmun');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado,$codmunicipio);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpar','nompar');// arreglos donde me traigo el nombre y el codigo
		return $ciudad= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	}

	public function funciones_combos()
	{
		$this->pais = $this->Cargarpais();
		$this->estados = $this->Cargarestados($this->ocsector->getCodpai());//colocar lo q viene de bd
		$this->municipios = $this->CargarMunicipios($this->ocsector->getCodpai(),$this->ocsector->getCodedo());//colocar lo q viene de bd
		$this->parroquias = $this->CargarParroquias($this->ocsector->getCodpai(),$this->ocsector->getCodedo(),$this->ocsector->getCodmun());//colocar lo q viene de bd
	}

	public function executeEdit()
  {
    $this->ocsector = $this->getOcsectorOrCreate();
    $this->funciones_combos();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOcsectorFromRequest();

      $this->saveOcsector($this->ocsector);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('oycdefdivsec/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('oycdefdivsec/list');
      }
      else
      {
        return $this->redirect('oycdefdivsec/edit?id='.$this->ocsector->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateOcsectorFromRequest()
  {
    $ocsector = $this->getRequestParameter('ocsector');
    $this->funciones_combos();

    if (isset($ocsector['codpai']))
    {
      $this->ocsector->setCodpai($ocsector['codpai']);
    }
    if (isset($ocsector['codedo']))
    {
      $this->ocsector->setCodedo($ocsector['codedo']);
    }
    if (isset($ocsector['codmun']))
    {
      $this->ocsector->setCodmun($ocsector['codmun']);
    }
    if (isset($ocsector['codpar']))
    {
      $this->ocsector->setCodpar($ocsector['codpar']);
    }
    if (isset($ocsector['codsec']))
    {
      $this->ocsector->setCodsec($ocsector['codsec']);
    }
    if (isset($ocsector['nomsec']))
    {
      $this->ocsector->setNomsec($ocsector['nomsec']);
    }
  }

  public function executeDelete()
  {
    $this->ocsector = OcsectorPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocsector);

    $c= new Criteria();
    $c->add(OcdatstePeer::CODPAI,$this->ocsector->getCodpai());
    $c->add(OcdatstePeer::CODEDO,$this->ocsector->getCodedo());
    $c->add(OcdatstePeer::CODMUN,$this->ocsector->getCodmun());
    $c->add(OcdatstePeer::CODPAR,$this->ocsector->getCodpar());
    $c->add(OcdatstePeer::CODSEC,$this->ocsector->getCodsec());
    $registro= OcdatstePeer::doSelectOne($c);
    if (!$registro)
    {
      $c= new Criteria();
      $c->add(OcregobrPeer::CODPAI,$this->ocsector->getCodpai());
      $c->add(OcregobrPeer::CODEDO,$this->ocsector->getCodedo());
      $c->add(OcregobrPeer::CODMUN,$this->ocsector->getCodmun());
      $c->add(OcregobrPeer::CODPAR,$this->ocsector->getCodpar());
      $c->add(OcregobrPeer::CODSEC,$this->ocsector->getCodsec());
      $reg= OcregobrPeer::doSelectOne($c);
      if (!$reg)
      {
      	 $this->deleteOcsector($this->ocsector);
      	 $this->Bitacora('Elimino');
      }
      else
      {
      	 $this->getRequest()->setError('delete', 'No Puede Eliminar este Sector. Existen Registros Asociados.');
         return $this->forward('oycdefdivsec', 'list');
      }
    }
    else
    {
      $this->getRequest()->setError('delete', 'No Puede Eliminar este Sector. Existen Registros Asociados.');
      return $this->forward('oycdefdivsec', 'list');
    }
    return $this->redirect('oycdefdivsec/list');
  }

}
