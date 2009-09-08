<?php

/**
 * fordefproyecto actions.
 *
 * @package    Roraima
 * @subpackage fordefproyecto
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefproyectoActions extends autofordefproyectoActions
{

  public function funciones_combos()
  {
	//$this->equilibrio = $this->cargarEquilibrio();
	//$this->subobjetivo = $this->cargarSubObjetivo($this->fordefpry->getCodequ());
    //$this->subsubobjetivo = $this->cargarSubSubObjetivo($this->fordefpry->getCodequ(),$this->fordefpry->getCodsubobj());
  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->setVars();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordefpry/filters');

    // pager
    $this->pager = new sfPropelPager('Fordefpry', 5);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->fordefpry = $this->getFordefpryOrCreate();
    $this->setVars();
    $this->pacc= Constantes::ListaProyecto();
    $this->funciones_combos();
    $this->CargarEstado();
    $this->municipios=array();
    $this->parroquias=array();
    $this->CargarDirectriz();
    $this->subobjetivo=array();
    $this->subsubobjetivo=array();
    $this->CargarSector();
    $this->subsector=array();

    $this->configGrid();
    $this->configGrid2();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFordefpryFromRequest();

      $this->saveFordefpry($this->fordefpry);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('fordefproyecto/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('fordefproyecto/list');
      }
      else
      {
        return $this->redirect('fordefproyecto/edit?id='.$this->fordefpry->getId());
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
  protected function saveFordefpry($fordefpry)
  {
  	$grid=Herramientas::CargarDatosGrid($this, $this->obj);
  	$grid2=Herramientas::CargarDatosGrid($this, $this->obj2);

    Formulacion::salvarFordefproyecto($fordefpry,$grid,$grid2);
  }

  protected function deleteFordefpry($fordefpry)
  {
  	Formulacion::eliminarProyecto($fordefpry);
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefpryFromRequest()
  {
    $fordefpry = $this->getRequestParameter('fordefpry');
    $this->setVars();
    $this->pacc= Constantes::ListaProyecto();
    $this->funciones_combos();
    $this->CargarEstado();
    $this->municipios=array();
    $this->parroquias=array();
    $this->CargarDirectriz();
    $this->subobjetivo=array();
    $this->subsubobjetivo=array();
    $this->CargarSector();
    $this->subsector=array();

    $this->configGrid();
    $this->configGrid2();


    if (isset($fordefpry['codpro']))
    {
      $this->fordefpry->setCodpro($fordefpry['codpro']);
    }
    if (isset($fordefpry['proacc']))
    {
      $this->fordefpry->setProacc($fordefpry['proacc']);
    }
    if (isset($fordefpry['nompro']))
    {
      $this->fordefpry->setNompro($fordefpry['nompro']);
    }
   //   if (isset($fordefpry['codprg']))
   //  {
   //   $this->fordefpry->setCodprg($fordefpry['codprg']);
   // }
   // if (isset($fordefpry['desprg']))
   // {
   //  $this->fordefpry->setDesprg($fordefpry['desprg']);
   // }
    if (isset($fordefpry['fecini']))
    {
      if ($fordefpry['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fordefpry['fecini']))
          {
            $value = $dateFormat->format($fordefpry['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fordefpry['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fordefpry->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fordefpry->setFecini(null);
      }
    }
    if (isset($fordefpry['feccul']))
    {
      if ($fordefpry['feccul'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fordefpry['feccul']))
          {
            $value = $dateFormat->format($fordefpry['feccul'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fordefpry['feccul'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fordefpry->setFeccul($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fordefpry->setFeccul(null);
      }
    }
    if (isset($fordefpry['montotpry']))
    {
      $this->fordefpry->setMontotpry($fordefpry['montotpry']);
    }
    if (isset($fordefpry['ubigeo']))
    {
      $this->fordefpry->setUbigeo($fordefpry['ubigeo']);
    }
    if (isset($fordefpry['codemp']))
    {
      $this->fordefpry->setCodemp($fordefpry['codemp']);
    }
    if (isset($fordefpry['nomemp2']))
    {
      $this->fordefpry->setNomemp2($fordefpry['nomemp2']);
    }
    if (isset($fordefpry['uniejepri']))
    {
      $this->fordefpry->setUniejepri($fordefpry['uniejepri']);
    }
    if (isset($fordefpry['descat']))
    {
      $this->fordefpry->setDescat($fordefpry['descat']);
    }
    if (isset($fordefpry['enupro']))
    {
      $this->fordefpry->setEnupro($fordefpry['enupro']);
    }
    if (isset($fordefpry['desobjnva']))
    {
      $this->fordefpry->setDesobjnva($fordefpry['desobjnva']);
    }
    if (isset($fordefpry['objestins']))
    {
      $this->fordefpry->setObjestins($fordefpry['objestins']);
    }
    if (isset($fordefpry['objeesppro']))
    {
      $this->fordefpry->setObjeesppro($fordefpry['objeesppro']);
    }
    if (isset($fordefpry['objpndes']))
    {
      $this->fordefpry->setObjpndes($fordefpry['objpndes']);
    }
    if (isset($fordefpry['codequ']))
    {
      $this->fordefpry->setCodequ($fordefpry['codequ']);
    }
    if (isset($fordefpry['desobj']))
    {
      $this->fordefpry->setDesobj($fordefpry['desobj']);
    }
    if (isset($fordefpry['codsubobj']))
    {
      $this->fordefpry->setCodsubobj($fordefpry['codsubobj']);
    }
    if (isset($fordefpry['codsubsubobj']))
    {
      $this->fordefpry->setCodsubsubobj($fordefpry['codsubsubobj']);
    }
    if (isset($fordefpry['respro']))
    {
      $this->fordefpry->setRespro($fordefpry['respro']);
    }
    if (isset($fordefpry['unimedres']))
    {
      $this->fordefpry->setUnimedres($fordefpry['unimedres']);
    }
    if (isset($fordefpry['desunimed']))
    {
      $this->fordefpry->setDesunimed($fordefpry['desunimed']);
    }
    if (isset($fordefpry['benpro']))
    {
      $this->fordefpry->setBenpro($fordefpry['benpro']);
    }
    if (isset($fordefpry['nroempdir']))
    {
      $this->fordefpry->setNroempdir($fordefpry['nroempdir']);
    }
    if (isset($fordefpry['nroempind']))
    {
      $this->fordefpry->setNroempind($fordefpry['nroempind']);
    }
    if (isset($fordefpry['codsta']))
    {
      $this->fordefpry->setCodsta($fordefpry['codsta']);
    }
    if (isset($fordefpry['dessta']))
    {
      $this->fordefpry->setDessta($fordefpry['dessta']);
    }
    if (isset($fordefpry['codpryonapre']))
    {
      $this->fordefpry->setCodpryonapre($fordefpry['codpryonapre']);
    }
    if (isset($fordefpry['tieejeanopry']))
    {
      $this->fordefpry->setTieejeanopry($fordefpry['tieejeanopry']);
    }
    if (isset($fordefpry['tieejemespry']))
    {
      $this->fordefpry->setTieejemespry($fordefpry['tieejemespry']);
    }
    if (isset($fordefpry['codobjnvaeta']))
    {
      $this->fordefpry->setCodobjnvaeta($fordefpry['codobjnvaeta']);
    }
    if (isset($fordefpry['sitobjdes']))
    {
      $this->fordefpry->setSitobjdes($fordefpry['sitobjdes']);
    }
    if (isset($fordefpry['tieimpmes']))
    {
      $this->fordefpry->setTieimpmes($fordefpry['tieimpmes']);
    }
    if (isset($fordefpry['tieimpano']))
    {
      $this->fordefpry->setTieimpano($fordefpry['tieimpano']);
    }
    if (isset($fordefpry['accinm']))
    {
      $this->fordefpry->setAccinm($fordefpry['accinm']);
    }
    if (isset($fordefpry['accdif']))
    {
      $this->fordefpry->setAccdif($fordefpry['accdif']);
    }
    if (isset($fordefpry['codsitpre']))
    {
      $this->fordefpry->setCodsitpre($fordefpry['codsitpre']);
    }
    if (isset($fordefpry['tieejeanopry']))
    {
      $this->fordefpry->setTieejeanopry($fordefpry['tieejeanopry']);
    }
    if (isset($fordefpry['tieejemespry']))
    {
      $this->fordefpry->setTieejemespry($fordefpry['tieejemespry']);
    }
    if (isset($fordefpry['coddir']))
    {
      $this->fordefpry->setCoddir($fordefpry['coddir']);
    }
    if (isset($fordefpry['codobjnvaeta']))
    {
      $this->fordefpry->setCodobjnvaeta($fordefpry['codobjnvaeta']);
    }
    if (isset($fordefpry['codsec']))
    {
      $this->fordefpry->setCodsec($fordefpry['codsec']);
    }
    if (isset($fordefpry['codsubsec']))
    {
      $this->fordefpry->setCodsubsec($fordefpry['codsubsec']);
    }
    if (isset($fordefpry['indsitact']))
    {
      $this->fordefpry->setIndsitact($fordefpry['indsitact']);
    }
    if (isset($fordefpry['fecultdat']))
    {
      if ($fordefpry['fecultdat'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fordefpry['fecultdat']))
          {
            $value = $dateFormat->format($fordefpry['fecultdat'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fordefpry['fecultdat'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fordefpry->setFecultdat($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fordefpry->setFecultdat(null);
      }
    }
    if (isset($fordefpry['forind']))
    {
      $this->fordefpry->setForind($fordefpry['forind']);
    }
    if (isset($fordefpry['fueind']))
    {
      $this->fordefpry->setFueind($fordefpry['fueind']);
    }
    if (isset($fordefpry['indsitobj']))
    {
      $this->fordefpry->setIndsitobj($fordefpry['indsitobj']);
    }
    if (isset($fordefpry['cantmet']))
    {
      $this->fordefpry->setCantmet($fordefpry['cantmet']);
    }
    if (isset($fordefpry['nucdesend']))
    {
      $this->fordefpry->setNucdesend($fordefpry['nucdesend']);
    }
    if (isset($fordefpry['zonecodes']))
    {
      $this->fordefpry->setZonecodes($fordefpry['zonecodes']);
    }
    if (isset($fordefpry['comindust']))
    {
      $this->fordefpry->setComindust($fordefpry['comindust']);
    }
    if (isset($fordefpry['uniadsemp']))
    {
      $this->fordefpry->setUniadsemp($fordefpry['uniadsemp']);
    }
    if (isset($fordefpry['caremp']))
    {
      $this->fordefpry->setCaremp($fordefpry['caremp']);
    }
    if (isset($fordefpry['telemp']))
    {
      $this->fordefpry->setTelemp($fordefpry['telemp']);
    }
    if (isset($fordefpry['faxemp']))
    {
      $this->fordefpry->setFaxemp($fordefpry['faxemp']);
    }
    if (isset($fordefpry['emaemp']))
    {
      $this->fordefpry->setEmaemp($fordefpry['emaemp']);
    }
    if (isset($fordefpry['placontin']))
    {
      $this->fordefpry->setPlacontin($fordefpry['placontin']);
    }
    if (isset($fordefpry['desbrepry']))
    {
      $this->fordefpry->setDesbrepry($fordefpry['desbrepry']);
    }
    if (isset($fordefpry['poravafis']))
    {
      $this->fordefpry->setPoravafis($fordefpry['poravafis']);
    }
    if (isset($fordefpry['poravafin']))
    {
      $this->fordefpry->setPoravafin($fordefpry['poravafin']);
    }
  }
  public function executeCombo()
  {
    if ($this->getRequestParameter('par')=='1')
    {
      $this->municipios = $this->Cargarmunicipio($this->getRequestParameter('estado'));
      $this->tipo='E';
    }
    elseif ($this->getRequestParameter('par')=='2')
    {
      $this->parroquias = $this->Cargarparroquia($this->getRequestParameter('estado'),$this->getRequestParameter('municipio'));
      $this->tipo='M';
    }
    elseif ($this->getRequestParameter('par')=='3')
    {
       $var=$this->getRequestParameter('desobj');
	   $dato=eregi_replace("[\n|\r|\n\r]", "", FordefequPeer::getObjetivo($this->getRequestParameter('directriz')));
       $output = '[["'.$var.'","'.$dato.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	   $this->subobjetivo = $this->CargarSubObjetivo($this->getRequestParameter('directriz'));
       $this->tipo='P';
    }
    elseif ($this->getRequestParameter('par')=='4')
    {
	   $this->subsubobjetivo = $this->CargarSubSubObjetivo($this->getRequestParameter('directriz'),$this->getRequestParameter('subobjetivo'));
       $this->tipo='R';
    }
    elseif ($this->getRequestParameter('par')=='5')
    {
	   $this->subsector = $this->CargarSubsector($this->getRequestParameter('sector'));
       $this->tipo='T';
    }
  }

  public function CargarDirectriz()
  {
    $tablas=array('fordefequ');//areglo de los joins de las tablas
    $filtros_tablas=array('');//arreglo donde mando los filtros de las clases
    $filtros_variales=array('');//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codequ','desequ');// arreglos donde me traigo el nombre y el codigo
    $directriz = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	foreach ($directriz as $est => $estv)
	{
		$directriz[$est] = strtoupper($estv);
	}
	$this->directriz = $directriz;
    return $directriz;

  }

  public function CargarSubsector($codequi)
  {
    $tablas=array('fordefsubsec');
    $filtros_tablas=array('codsec');
    $filtros_variales=array($codequi);
    $campos_retornados=array('codsubsec','nomsubsec');
    $subsector = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
    return $subsector;
  }


  public function CargarSector()
  {
    $tablas=array('fordefsec');//areglo de los joins de las tablas
    $filtros_tablas=array('');//arreglo donde mando los filtros de las clases
    $filtros_variales=array('');//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codsec','nomsec');// arreglos donde me traigo el nombre y el codigo
    $sector = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	foreach ($sector as $est => $estv)
	{
		$sector[$est] = strtoupper($estv);
	}
	$this->sector = $sector;
    return $sector;

  }

  public function CargarSubObjetivo($codequi)
  {
    $tablas=array('fordefsubobj');
    $filtros_tablas=array('codequ');
    $filtros_variales=array($codequi);
    $campos_retornados=array('codsubobj','dessubobj');
    $subobjeti = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
    return $subobjeti;
  }

  public function CargarSubSubObjetivo($codequi,$codsubobj)
  {
	$tablas=array('fordefsubsubobj');
	$filtros_tablas=array('codequ','codsubobj');
	$filtros_variales=array($codequi,$codsubobj);
	$campos_retornados=array('codsubsubobj','dessubsubobj');
	return $subsubobjeti= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
  }

  public function CargarEstado()
  {
    $tablas=array('fordefest');//areglo de los joins de las tablas
    $filtros_tablas=array('');//arreglo donde mando los filtros de las clases
    $filtros_variales=array('');//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codest','desest');// arreglos donde me traigo el nombre y el codigo
    $estados = Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	foreach ($estados as $contador => $datos)
	{
		$estados[$contador] = ucfirst($datos);
	}
	$this->estados = $estados;
    return $estados;

  }

  public function CargarMunicipio($codpais)
  {
    $tablas=array('fordefmun');//areglo de los joins de las tablas
    $filtros_tablas=array('codest');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codmun','desmun');// arreglos donde me traigo el nombre y el codigo
    $municipio= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

    foreach ($municipio as $est => $estv)
	{
		$municipio[$est] = ucfirst($estv);
	}
    return $municipio;
  }


  public function CargarParroquia($codpais,$codestado)
  {
    $tablas=array('fordefpar');//areglo de los joins de las tablas
    $filtros_tablas=array('codest','codmun');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codpar','despar');// arreglos donde me traigo el nombre y el codigo
    $parroquia= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

    foreach ($parroquia as $est => $estv)
	{
		$parroquia[$est] = ucfirst($estv);
	}
    return $parroquia;
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $c = new Criteria();
    $c->add(ForpryubigeoPeer::CODPRO,$this->fordefpry->getCodpro());
    $per = ForpryubigeoPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(true);
    $opciones->setTabla('Forpryubigeo');
    $opciones->setAnchoGrid(500);
    $opciones->setFilas(50);
    $opciones->setTitulo('Localizacion de Proyectos');
    $opciones->setHTMLTotalFilas(' ');

	$col1 = new Columna('Estado');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('nomest');
    $col1->setHTML('type="text" size="25" readonly=true');

    $col2 = new Columna('Codigo Estado');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('codest');
    $col2->setOculta(true);


	$col3 = new Columna('Codigo Municipio');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codmun');
    $col3->setOculta(true);


	$col4 = new Columna('Municipio');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('nommun');
    $col4->setHTML('type="text" size="25" readonly=true');

    $col5 = new Columna('Codigo Parroquia');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codpar');
    $col5->setOculta(true);


	$col6 = new Columna('Parroquia');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('nompar');
    $col6->setHTML('type="text" size="25" readonly=true ' );

    $col7 = new Columna('Especificacion Adicional');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('espadiubigeo');
    $col7->setHTML('type="text" size="25"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);

    $this->obj = $opciones->getConfig($per);

  }

  public function cargarTipoCont()
  {
    $c = new Criteria();
    $lista_unidad = FordeftipcnxPeer::doSelect($c);

    $unidades = array();

    foreach($lista_unidad as $obj_unidad)
    {
      $unidades += array($obj_unidad->getCodtipcnx() => $obj_unidad->getDestipcnx());
    }
    return $unidades;
  }



  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2()
  {
    $c = new Criteria();
    $c->add(ForpryorgpubPeer::CODPRO,$this->fordefpry->getCodpro());
    $per = ForpryorgpubPeer::doSelect($c);

	$opciones = new OpcionesGrid();
	$opciones->setEliminar(true);
    $opciones->setTabla('Forpryorgpub');
    $opciones->setAnchoGrid(800);
    $opciones->setFilas(50);
    $opciones->setName('b');
    $opciones->setTitulo('Conexiones Inter-Institucionales');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Codigo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codorg');
    //$col1->setAjax('almcotiza',3,2);
    $col1->setJScript('onBlur="ajax(this.id)"');
    //$col1->setCatalogo('Caregart','sf_admin_edit_form',$obj,'Caregart_Almcotiza',$params);
    $col1->setCatalogo('fordeforgpub','sf_admin_edit_form',array('codorg' => 1,'nomorg' => 2));
    $col1->setHTML('type="text" size="5" maxlength="4" ');


	$col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomorg');
    $col2->setHTML('type="text" size="25" readonly=true');

	$col3 = new Columna('Tipo de Contribución');
    $col3->setTipo(Columna::COMBO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('tipcnx');
    $col3->setCombo(self::cargarTipoCont());
    $col3->setHTML(' ');


	$col4 = new Columna('Detalles/Observaciones');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('detobs');
    $col4->setHTML('type="text" size="25" maxlength="250" ');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);

    $this->obj2 = $opciones->getConfig($per);

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
	$cajtexmos=$this->getRequestParameter('cajtexmos');
    $cajtexcom=$this->getRequestParameter('cajtexcom');
    $cajtexmos11=$this->getRequestParameter('cajtexmos11');
    $cajtexmos22=$this->getRequestParameter('cajtexmos22');
    $fechaini=$this->getRequestParameter('fechaini');
    $fechacul=$this->getRequestParameter('fechacul');
	if ($this->getRequestParameter('ajax')=='1')
	 {
	   $dato=FordeforgpubPeer::getOrganismo($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","5","c"]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='2')
	 {
	   $dato=FordefsitprePeer::getSituacion($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='3')
	 {
	   $dato=FordefprgPeer::getPrograma($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
	 }
     else  if ($this->getRequestParameter('ajax')=='4')
	 {
	   $dato=FordefobjestnvaetaPeer::getObjnvaeta($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='5')
	 {
	   $dato=FordefunimedPeer::getUnidades($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='6')
	 {
	   $dato=FordefstaPeer::getEstatus($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","2","c"]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='7')
	 {
	   $dato=FordeforgpubPeer::getOrganismo($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
	 }
	 else  if ($this->getRequestParameter('ajax')=='8')
	 {
	   $dato=NphojintPeer::getNomemp($this->getRequestParameter('codigo'));
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["","",""]]';
	 }
	  else  if ($this->getRequestParameter('ajax')=='9')
	 {
//	    $calculo= $fechacul-$fechaini;

          $dia1 = substr($fechaini, 0, 2);
		  $mes1=  substr($fechaini, 3, 2);
		  $ano1 = substr($fechaini, 6, 4);

          $dia2 = substr($fechacul, 0, 2);
		  $mes2 = substr($fechacul, 3, 2);
		  $ano2 = substr($fechacul, 6, 4);
		  $fechaini=$ano1.'-'.$mes1.'-'.$dia1 ;
		  $fechacul=$ano2.'-'.$mes2.'-'.$dia2 ;
		  $mes= $mes2-$mes1;
		  if ($mes<0){
		  	$mes= $mes*-1;
		  }
     $meses= H::dateDiff('m',$fechaini,$fechacul);
     $an=$meses/12;
     $anos= intval($an);
     $a=12;
     $meses= $meses% $a;



       $output = '[["'.$cajtexmos11.'","'.$anos.'",""],["'.$cajtexmos22.'","'.$meses.'",""]]';
	 }
  	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='2')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODSITPRE','Fordefsitpre','Codsitpre',$this->getRequestParameter('fordefpry[codsitpre]'));
    }
	else  if ($this->getRequestParameter('ajax')=='3')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODPRG','Fordefprg','Codprg',$this->getRequestParameter('fordefpry[codprg]'));
    }
    else  if ($this->getRequestParameter('ajax')=='4')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODOBJNVAETA','Fordefobjestnvaeta','Codobjnvaeta',$this->getRequestParameter('fordefpry[codobjnvaeta]'));
    }
    else  if ($this->getRequestParameter('ajax')=='5')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODUNIMED','Fordefunimed','Codunimed',$this->getRequestParameter('fordefpry[unimedres]'));
    }
    else  if ($this->getRequestParameter('ajax')=='6')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODSTA','Fordefsta','Codsta',$this->getRequestParameter('fordefpry[codsta]'));
    }
     else  if ($this->getRequestParameter('ajax')=='7')
	{
	  $this->tags=Herramientas::autocompleteAjax('CODEMP','Nphojint','Codemp',$this->getRequestParameter('fordefpry[codemp]'));
    }
  }

  public function setVars()
  {
    $this->mascaraproyecto = Herramientas::ObtenerFormato('Fordefegrgen','Forproacc');
	$this->unidad = Herramientas::ObtenerFormato('Fordefegrgen','Foruae');
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
    $this->fordefpry = $this->getFordefpryOrCreate();
    try{
    $this->updateFordefpryFromRequest();
    }catch(Exception $ex){}


    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

}
