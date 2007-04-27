<?php

/**
 * oycdatsol actions.
 *
 * @package    siga
 * @subpackage oycdatsol
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdatsolActions extends autooycdatsolActions
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
			$this->municipio = $this->Cargarmunicipio($this->getRequestParameter('pais'),$this->getRequestParameter('estado'));
			$this->tipo='E';
		}
		elseif ($this->getRequestParameter('par')=='3')
		{
			$this->parroquia = $this->Cargarparroquia($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'));
			$this->tipo='M';
		}
		elseif ($this->getRequestParameter('par')=='4')
		{
			$this->sector = $this->Cargarsector($this->getRequestParameter('pais'),$this->getRequestParameter('estado'),$this->getRequestParameter('municipio'),$this->getRequestParameter('parroquia'));
			$this->tipo='S';
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


	public function Cargarmunicipio($codpais,$codestado)
	{
		$tablas=array('ocmunici');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codmun','nommun');// arreglos donde me traigo el nombre y el codigo
		return $municipio= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		
	}

	public function Cargarparroquia($codpais,$codestado,$codmunicipio)
	{
		$tablas=array('ocparroq');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo','codmun');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado,$codmunicipio);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codpar','nompar');// arreglos donde me traigo el nombre y el codigo
		return $parroquia= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		
	}
	public function Cargarsector($codpais,$codestado,$codmunicipio,$codparroquia)
	{
		$tablas=array('ocsector');//areglo de los joins de las tablas
		$filtros_tablas=array('codpai','codedo','codmun','codpar');//arreglo donde mando los filtros de las clases
		$filtros_variales=array($codpais,$codestado,$codmunicipio,$codparroquia);//arreglo donde mando los parametros de la funcion
		$campos_retornados=array('codsec','nomsec');// arreglos donde me traigo el nombre y el codigo
		return $sector= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
		
	}		
	
	public function executeEdit()
	{
		$this->ocdatste = $this->getOcdatsteOrCreate();
		$this->funciones_combos(); 
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateOcdatsteFromRequest();

			$this->saveOcdatste($this->ocdatste);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('oycdatsol/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('oycdatsol/list');
			}
			else
			{
				return $this->redirect('oycdatsol/edit?id='.$this->ocdatste->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}
	public function funciones_combos()
	{
		$this->desste ='';
		$this->pais = $this->Cargarpais();
		$this->estados = $this->Cargarestados($this->ocdatste->getCodpai());//colocar lo q viene de bd
		$this->municipio = $this->Cargarmunicipio($this->ocdatste->getCodpai(),$this->ocdatste->getCodedo());//colocar lo q viene de bd
		$this->parroquia = $this->Cargarparroquia($this->ocdatste->getCodpai(),$this->ocdatste->getCodedo(),$this->ocdatste->getCodmun());//colocar lo q viene de bd
		$this->sector = $this->Cargarsector($this->ocdatste->getCodpai(),$this->ocdatste->getCodedo(),$this->ocdatste->getCodmun(),$this->ocdatste->getCodpar());
	}

 protected function updateOcdatsteFromRequest()
 {
 	$ocdatste = $this->getRequestParameter('ocdatste');
	$this->funciones_combos(); 

 	if (isset($ocdatste['cedste']))
 	{
 		$this->ocdatste->setCedste($ocdatste['cedste']);
 	}
 	if (isset($ocdatste['nomste']))
 	{
 		$this->ocdatste->setNomste($ocdatste['nomste']);
 	}
 	if (isset($ocdatste['codste']))
 	{
 		$this->ocdatste->setCodste($ocdatste['codste']);
 	}
 	if (isset($ocdatste['desste']))
 	{
 		$this->ocdatste->setDesste($ocdatste['desste']);
 	}
 	if (isset($ocdatste['dirste']))
 	{
 		$this->ocdatste->setDirste($ocdatste['dirste']);
 	}
 	if (isset($ocdatste['telste']))
 	{
 		$this->ocdatste->setTelste($ocdatste['telste']);
 	}
 	if (isset($ocdatste['faxste']))
 	{
 		$this->ocdatste->setFaxste($ocdatste['faxste']);
 	}
 	if (isset($ocdatste['emaste']))
 	{
 		$this->ocdatste->setEmaste($ocdatste['emaste']);
 	}
 	if (isset($ocdatste['cedrep']))
 	{
 		$this->ocdatste->setCedrep($ocdatste['cedrep']);
 	}
 	if (isset($ocdatste['nomrep']))
 	{
 		$this->ocdatste->setNomrep($ocdatste['nomrep']);
 	}
 	if (isset($ocdatste['dirrep']))
 	{
 		$this->ocdatste->setDirrep($ocdatste['dirrep']);
 	}
 	if (isset($ocdatste['telrep']))
 	{
 		$this->ocdatste->setTelrep($ocdatste['telrep']);
 	}
 	if (isset($ocdatste['faxrep']))
 	{
 		$this->ocdatste->setFaxrep($ocdatste['faxrep']);
 	}
 	if (isset($ocdatste['emarep']))
 	{
 		$this->ocdatste->setEmarep($ocdatste['emarep']);
 	}
 	if (isset($ocdatste['codpai']))
 	{
 		$this->ocdatste->setCodpai($ocdatste['codpai']);
 	}
 	if (isset($ocdatste['codedo']))
 	{
 		$this->ocdatste->setCodedo($ocdatste['codedo']);
 	}
 	if (isset($ocdatste['codmun']))
 	{
 		$this->ocdatste->setCodmun($ocdatste['codmun']);
 	}
 	if (isset($ocdatste['codpar']))
 	{
 		$this->ocdatste->setCodpar($ocdatste['codpar']);
 	}
 	if (isset($ocdatste['codsec']))
 	{
 		$this->ocdatste->setCodsec($ocdatste['codsec']);
 	}
 }

 protected function getOcdatsteOrCreate($id = 'id')
 {
 	if (!$this->getRequestParameter($id))
 	{
 		$ocdatste = new Ocdatste();
 	}
 	else
 	{
 		$ocdatste = OcdatstePeer::retrieveByPk($this->getRequestParameter($id));

 		$this->forward404Unless($ocdatste);
 	}

 	return $ocdatste;
 }

 protected function processFilters()
 {
 	if ($this->getRequest()->hasParameter('filter'))
 	{
 		$filters = $this->getRequestParameter('filters');

 		$this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/ocdatste/filters');
 		$this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/ocdatste/filters');
 	}
 }

 protected function processSort()
 {
 	if ($this->getRequestParameter('sort'))
 	{
 		$this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/ocdatste/sort');
 		$this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/ocdatste/sort');
 	}

 	if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/ocdatste/sort'))
 	{
 	}
 }

 protected function addFiltersCriteria($c)
 {
 	if (isset($this->filters['cedste_is_empty']))
 	{
 		$criterion = $c->getNewCriterion(OcdatstePeer::CEDSTE, '');
 		$criterion->addOr($c->getNewCriterion(OcdatstePeer::CEDSTE, null, Criteria::ISNULL));
 		$c->add($criterion);
 	}
 	else if (isset($this->filters['cedste']) && $this->filters['cedste'] !== '')
 	{
 		$c->add(OcdatstePeer::CEDSTE, strtr($this->filters['cedste'], '*', '%'), Criteria::LIKE);
 	}
 }

 protected function addSortCriteria($c)
 {
 	if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/ocdatste/sort'))
 	{
 		$sort_column = OcdatstePeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
 		if ($this->getUser()->getAttribute('type', null, 'sf_admin/ocdatste/sort') == 'asc')
 		{
 			$c->addAscendingOrderByColumn($sort_column);
 		}
 		else
 		{
 			$c->addDescendingOrderByColumn($sort_column);
 		}
 	}
 }

 protected function getLabels()
 {
 	return array(
 	'ocdatste{cedste}' => 'C.I./RIF:',
 	'ocdatste{nomste}' => 'Nombre:',
 	'ocdatste{codste}' => 'Tipo:',
 	'ocdatste{desste}' => 'Descripci�n Tipo:',
 	'ocdatste{dirste}' => 'Dirección:',
 	'ocdatste{telste}' => 'Teléfono(s):',
 	'ocdatste{faxste}' => 'Fax:',
 	'ocdatste{emaste}' => 'E-Mail:',
 	'ocdatste{cedrep}' => 'C. I./RIFp:',
 	'ocdatste{nomrep}' => 'Nombre:',
 	'ocdatste{dirrep}' => 'Dirección:',
      'ocdatste{telrep}' => 'Teléfono(s):',
      'ocdatste{faxrep}' => 'Fax:',
      'ocdatste{emarep}' => 'E-Mail:',
      'ocdatste{codpai}' => 'País:',
      'ocdatste{codedo}' => 'Estado:',
      'ocdatste{codmun}' => 'Municipio:',
      'ocdatste{codpar}' => 'Parroquia:',
      'ocdatste{codsec}' => 'Sector:',
    );
  }	
}
