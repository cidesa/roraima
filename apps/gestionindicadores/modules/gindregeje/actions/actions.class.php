<?php

/**
 * gindregeje actions.
 *
 * @package    siga
 * @subpackage gindregeje
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class gindregejeActions extends autogindregejeActions
{
  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/gindregeje/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/gindregeje/filters');
    }
  }
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/gindregeje/sort'))
    {
      $sort_column = GiproanuPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/gindregeje/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }
  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/gindregeje/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/gindregeje/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/gindregeje/sort'))
    {
      $this->getUser()->setAttribute('sort', 'numtrim', 'sf_admin/gindregeje/sort');
      $this->getUser()->setAttribute('type', 'asc', 'sf_admin/gindregeje/sort');
    }
  }	
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/gindregeje/filters');

    // pager
    $this->pager = new sfPropelPager('Giproanu', 20);
    $c = new Criteria();
    
	$c->addSelectColumn("'' AS NUMINDG");
    $c->addSelectColumn(GiproanuPeer::ANOINDG);
	$c->addSelectColumn(GiproanuPeer::REVANOINDG);
	$c->addSelectColumn(GiproanuPeer::NUMTRIM);    
    $c->addSelectColumn("0 AS PROGTRIM");
    $c->addSelectColumn("0 AS EJECTRIM");
    $c->addSelectColumn("'' AS ESTTRIM");
    $c->addSelectColumn("'dd/mm/yyyy' AS FECCIETRI");
	$c->addSelectColumn("'' AS ESTPROG");
    $c->addSelectColumn("'dd/mm/yyyy' AS FECCIERRE");
    $c->addSelectColumn("max(ID) AS ID");
   // $c->addSelectColumn(NpconfonPeer::CODNOM." AS ID");
    
    $c->addGroupByColumn(GiproanuPeer::ANOINDG);
	$c->addGroupByColumn(GiproanuPeer::REVANOINDG);
	$c->addGroupByColumn(GiproanuPeer::NUMTRIM);
    $c->addAscendingOrderByColumn(GiproanuPeer::ANOINDG);
	$c->addAscendingOrderByColumn(GiproanuPeer::REVANOINDG);
	$c->addAscendingOrderByColumn(GiproanuPeer::NUMTRIM);
	
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

    // Para incluir funcionalidades al executeEdit()
    public function editing()
    {
        $this->giproanu = $this->getGiproanuOrCreate();
        $this->configGrid($this->giproanu->getNumtrim(), $this->giproanu->getAnoindg(), $this->giproanu->getRevanoindg());
		$this->unidades = $this->cargar_unidades();
        $this->params = array('unidades'=>$this->unidades);
    }
	public function cargar_unidades()
  {
  	  $c = new Criteria();
	  $obj = AcunidadPeer::doSelect($c);
	  $r=array(''=>'Todas las Unidades');

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getNumuni()=>$i->getNomuni());
	  }
	  return $r;
  }

    public function configGrid($ntri = '', $ano = '', $rev = '', $unidad = '')
    {
    	if($unidad == '')
		{
			$c = new Criteria();
	        $c->add(GiproanuPeer::NUMTRIM, $ntri);
	        $c->add(GiproanuPeer::ANOINDG, $ano);
	        $c->add(GiproanuPeer::REVANOINDG, $rev);
	        $per = GiproanuPeer::doSelect($c);
	        if ($per)
	        {
	            if ($per[0]->getEsttrim() == 'C')
	            $this->readonly = true;
	            $tfil = 0;
	        }	
		}else
		{
			$c = new Criteria();
			$c->add(GiproanuPeer::ANOINDG,$ano);
			$c->add(GiproanuPeer::REVANOINDG,$rev);
			$c->add(GiproanuPeer::NUMTRIM,$ntri);
			$c->addJoin(GiproanuPeer::NUMINDG,GiregindPeer::NUMINDG);
			$c->add(GiregindPeer::NUMUNI,$unidad);
			$per = GiproanuPeer::doSelect($c);
			if ($per)
	        {
	            if ($per[0]->getEsttrim() == 'C')
	            $this->readonly = true;
	            $tfil = 0;
	        }
		}        

        $opciones = new OpcionesGrid();
        $opciones->setEliminar(false);
        $opciones->setTabla('Giregind');
        $opciones->setAnchoGrid(800);
        $opciones->setAncho(600);
        $opciones->setFilas(0);
        $opciones->setName('c');
        $opciones->setTitulo('Programación Indicadores');
        $opciones->setHTMLTotalFilas(' ');

        $col1 = new Columna('Indicador');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setHTML(' type="text" readonly="true"');
        $col1->setNombreCampo('numindg');
		
		$col1a = new Columna('Nombre Indicador');
        $col1a->setTipo(Columna::TEXTO);
        $col1a->setAlineacionObjeto(Columna::CENTRO);
        $col1a->setAlineacionContenido(Columna::CENTRO);
        $col1a->setHTML(' type="text" readonly="true"');
        $col1a->setNombreCampo('nomindg');

        $col2 = new Columna('Programado');
        $col2->setTipo(Columna::MONTO);
        $col2->setEsGrabable(true);
        $col2->setAlineacionObjeto(Columna::CENTRO);
        $col2->setAlineacionContenido(Columna::CENTRO);
        $col2->setHTML('type="text" size="10" readonly="true" ');
        $col2->setNombreCampo('progtrim');

        $col3 = new Columna('Ejecutado');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionObjeto(Columna::CENTRO);
        $col3->setAlineacionContenido(Columna::CENTRO);
        if ($this->readonly)
            $col3->setHTML('type="text" size="10" readonly="true"');
        $col3->setNombreCampo('ejectrim');

    	$col4 = new Columna('Estatus Programacion');
		$col4->setTipo(Columna::TEXTO);
		$col4->setEsGrabable(true);
		$col4->setOculta(true);
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
		$col4->setHTML(' type="text" size="10" readonly="true"');
		$col4->setNombreCampo('estprog');
		
		$col5 = new Columna('Fecha Cierre Programacion');
		$col5->setTipo(Columna::FECHA);
		$col5->setEsGrabable(true);
		$col5->setOculta(true);
		$col5->setAlineacionObjeto(Columna::CENTRO);
		$col5->setAlineacionContenido(Columna::CENTRO);
		$col5->setHTML(' type="text" size="10" readonly="true" ');
		$col5->setNombreCampo('feccierre');
		
		$col6 = new Columna('Estatus Trimestre');
		$col6->setTipo(Columna::TEXTO);
		$col6->setEsGrabable(true);
		$col6->setOculta(true);
		$col6->setAlineacionObjeto(Columna::CENTRO);
		$col6->setAlineacionContenido(Columna::CENTRO);
		$col6->setHTML(' type="text" size="10" readonly="true"');
		$col6->setNombreCampo('esttrim');
		
		$col7 = new Columna('Fecha Cierre');
		$col7->setTipo(Columna::FECHA);
		$col7->setEsGrabable(true);
		$col7->setOculta(true);
		$col7->setAlineacionObjeto(Columna::CENTRO);
		$col7->setAlineacionContenido(Columna::CENTRO);
		$col7->setHTML(' type="text" size="10" readonly="true" ');
		$col7->setNombreCampo('feccietri');
		
		$opciones->addColumna($col1);
		$opciones->addColumna($col1a);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);
		$opciones->addColumna($col5);
		$opciones->addColumna($col6);
		$opciones->addColumna($col7);
		
		$this->obj = $opciones->getConfig($per);
		$this->giproanu->setObjtri($this->obj);
		
		}
		
		public function executeAjax()
		{
		
		    $codigo = $this->getRequestParameter('codigo', '');
		// Esta variable ajax debe ser usada en cada llamado para identificar
		// que objeto hace el llamado y por consiguiente ejecutar el código necesario
		$ajax = $this->getRequestParameter('ajax', '');
		
		// Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
		// para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
		// los datos de los objetos de la vista como pasa en un submit normal.
		
		switch($ajax)
		{
		    case '1':
		        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
		        // objetos en la vista. mas informacion en
		        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
			    $this->giproanu = $this->getGiproanuOrCreate();
				$ano = $this->getRequestParameter('anoindg', '');
				$rev = $this->getRequestParameter('revanoindg', '');
				$tri = $this->getRequestParameter('numtrim', '');
				
				$this->configGrid($tri, $ano, $rev, $codigo);			
		        $output = '[["","",""],["","",""],["","",""]]';
				$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    break;
		default:
		    $output = '[["","",""],["","",""],["","",""]]';
			$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			return sfView::HEADER_ONLY;
		}
		
		// Instruccion para escribir en la cabecera los datos a enviar a la vista
		//$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		
		// Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
		// mantener habilitar esta instrucción
		//return sfView::HEADER_ONLY;
		
		// Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
		// por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.
		
		}
		
		
		public function validateEdit()
		{
		    $this->coderr = -1;
		
		
		
		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
		
		    /*$this->giproanu = $this->getGiproanuOrCreate();
			$this->updateGiproanuFromRequest();
		    $this->configgrid();
			$grid = Herramientas::CargarDatosGridv2($this, $this->obj, true);
		
		foreach ($grid[0] as $g)
		{
		    if ($g['progtrim']<$g['ejectrim'])
		    {
		        $this->coderr = 11102;
				break;
		    }
		}*/
		
		
		if ($this->coderr != -1)
		{
		    return false;
		} else return true;
		
		} else return true;
		
		
		
		}
		
		/**
		 * Función para actualziar el grid en el post si ocurre un error
		 * Se pueden colocar aqui los grids adicionales
		 *
		 */
		public function updateError()
		{
		    $this->configGrid();
		
		    $grid = Herramientas::CargarDatosGridv2($this, $this->obj, true);
		
		//$this->configGrid($grid[0],$grid[1]);
		
		}
		
		public function saving($clasemodelo)
		{
		    $grid = Herramientas::CargarDatosGridv2($this, $this->obj, true);
		$c = new Criteria();
		$c->add(GiproanuPeer::NUMTRIM, $clasemodelo->getNumtrim());
		$c->add(GiproanuPeer::ANOINDG, $clasemodelo->getAnoindg());
		$c->add(GiproanuPeer::REVANOINDG, $clasemodelo->getRevanoindg());
		$per = GiproanuPeer::doSelect($c);
		foreach ($per as $reg)
		{
		    $reg->delete();
		}
		
		foreach ($grid[0] as $r)
		{
		    $giproanu = new Giproanu();
		$giproanu->setNumtrim($clasemodelo->getNumtrim());
		$giproanu->setAnoindg($clasemodelo->getAnoindg());
		$giproanu->setRevanoindg($clasemodelo->getRevanoindg());
		$giproanu->setNumindg($r['numindg']);
		$giproanu->setProgtrim($r['progtrim']);
		$giproanu->setEjectrim($r['ejectrim']);
		if ($r['estprog'] == '')
		    $giproanu->setEstprog('A');
		else
		    $giproanu->setEstprog($r['estprog']);
		if ($r['estprog'] == '' || $r['estprog'] == 'A')
		    $giproanu->setFeccierre(null);
		else
		    $giproanu->setFeccierre(date('Y-m-d'));
		
		if ($r['esttrim'] == '')
		    $giproanu->setEsttrim('A');
		else
		    $giproanu->setEsttrim($r['esttrim']);
		if ($r['esttrim'] == '' || $r['esttrim'] == 'A')
		    $giproanu->setFeccietri(null);
		else
		    $giproanu->setFeccietri($r['feccietri']);
		$giproanu->save();
		}
		return $this->redirect('gindregeje/list');
		}
		
		public function deleting($clasemodelo)
		{
		    return $this->redirect('gindregeje/list');
		}
		
		
		}
