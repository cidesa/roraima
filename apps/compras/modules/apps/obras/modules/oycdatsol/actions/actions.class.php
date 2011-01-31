<?php

/**
 * oycdatsol actions.
 *
 * @package    Roraima
 * @subpackage oycdatsol
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycdatsolActions extends autooycdatsolActions
{

  private $coderr = -1;

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('cedste','ocdatste','cedste',$this->getRequestParameter('ocdatste[cedste]'));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('codste','octipste','desste',str_pad($this->getRequestParameter('ocdatste[codste]'),4,0,STR_PAD_LEFT));
      }
  }


/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');

    switch ($ajax){
      case '2':
        $dato=Herramientas::getX('codste','octipste','desste',str_pad($codigo,4,0,STR_PAD_LEFT));
		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';

        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


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

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->ocdatste = $this->getOcdatsteOrCreate();
		$this->funciones_combos();
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateOcdatsteFromRequest();

			$this->saveOcdatste($this->ocdatste);

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

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

 /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
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
 		$this->ocdatste->setCodste(str_pad($ocdatste['codste'],4,0,STR_PAD_LEFT));
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


  protected function deleteOcdatste($ocdatste)
  {
    $coderr = -1;

    // habilitar la siguiente línea si se usa grid
    //$grid=Herramientas::CargarDatosGrid($this,$this->obj);

    try {

      // Modificar la siguiente línea para llamar al método
      // correcto en la clase del negocio, ej:
       $coderr = Obras::EliminarOycdatsol($ocdatste);

      // OJO ----> Eliminar esta linea al modificar este método
     // parent::deleteOcdatste($ocregsol);
    //$ocregsol->delete();

      if(is_array($coderr)){
        foreach ($coderr as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);

        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);

      }


    } catch (Exception $ex) {

      $coderr = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }


}
