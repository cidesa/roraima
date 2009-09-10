<?php

/**
 * gindproanu actions.
 *
 * @package    siga
 * @subpackage gindproanu
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class gindproanuActions extends autogindproanuActions
{
  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/gindproanu/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/gindproanu/filters');
    }
  }	
  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/gindproanu/sort'))
    {
      $sort_column = GiproanuPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/gindproanu/sort') == 'asc')
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
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/gindproanu/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/gindproanu/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/gindproanu/sort'))
    {
      $this->getUser()->setAttribute('sort', 'numindg', 'sf_admin/gindproanu/sort');
      $this->getUser()->setAttribute('type', 'asc', 'sf_admin/gindproanu/sort');
    }
  }
  	
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/gindproanu/filters');

    // pager
    $this->pager = new sfPropelPager('Giproanu', 20);
    $c = new Criteria();

    $c->addSelectColumn(GiproanuPeer::NUMINDG);
    $c->addSelectColumn(GiproanuPeer::ANOINDG);
	$c->addSelectColumn(GiproanuPeer::REVANOINDG);
    $c->addSelectColumn("'' AS NUMTRIM");
    $c->addSelectColumn("0 AS PROGTRIM");
    $c->addSelectColumn("0 AS EJECTRIM");
    $c->addSelectColumn("'' AS ESTTRIM");
    $c->addSelectColumn("'dd/mm/yyyy' AS FECCIETRI");
	$c->addSelectColumn("'' AS ESTPROG");
    $c->addSelectColumn("'dd/mm/yyyy' AS FECCIERRE");
    $c->addSelectColumn("max(ID) AS ID");
   // $c->addSelectColumn(NpconfonPeer::CODNOM." AS ID");

    $c->addGroupByColumn(GiproanuPeer::NUMINDG);
    $c->addGroupByColumn(GiproanuPeer::ANOINDG);
	$c->addGroupByColumn(GiproanuPeer::REVANOINDG);

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
  	  $this->configGrid($this->giproanu->getNumindg(),$this->giproanu->getAnoindg(),$this->giproanu->getRevanoindg());
	  $this->unidades = $this->cargar_numuni();
	  $this->indi = $this->cargar_indi();
      $this->params = array('unidades'=>$this->unidades,'indi'=>$this->indi);
  }
  
  public function cargar_numuni()
  {
  	  $c = new Criteria();
	  $obj = AcunidadPeer::doSelect($c);
	  $r=array(''=>'Seleccione....');

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getNumuni()=>$i->getNomuni());
	  }
	  return $r;
  }
  public function cargar_indi()
  {
  	  $c = new Criteria();
	  $c->add(GiregindPeer::NUMUNI,$this->giproanu->getNumuni());
	  $obj = GiregindPeer::doSelect($c);
	  $r=array();
	  if(!$obj)
	  	$r=array(''=>'Seleccione....');

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getNumindg()=>$i->getNomindg());
	  }
	  return $r;
  }  

public function configGrid($nind='',$ano='',$rev='')
  {	
    $this->readonly=false;
	$tfil=1;
	
	$c = new Criteria();
	$c->add(GiproanuPeer::NUMINDG,$nind);
	$c->add(GiproanuPeer::ANOINDG,$ano);
	$c->add(GiproanuPeer::REVANOINDG,$rev);
	$c->addAscendingOrderByColumn(GiproanuPeer::NUMTRIM);
	$per = GiproanuPeer::doSelect($c);
	if($per)
	{
		if($per[0]->getEstprog()=='C')
		{
			$this->readonly=true;		  
			$tfil=0;	
		}
		if(count($per)==4)
			$tfil=0;
	}

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Giregind');
    $opciones->setAnchoGrid(800);
    $opciones->setAncho(600);
    $opciones->setFilas($tfil);
    $opciones->setName('c');
    $opciones->setTitulo('Programación por Trimestre');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Trimestre');
    $col1->setTipo(Columna::COMBO);
	$col1->setCombo(array('I'=>'I','II'=>'II','III'=>'III','IV'=>'IV'));
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setHTML(' ');	
    $col1->setNombreCampo('numtrim');

    $col2 = new Columna('Programado');
    $col2->setTipo(Columna::MONTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    if($this->readonly)
    	$col2->setHTML(' type="text" " readonly="true"');
    $col2->setNombreCampo('progtrim');
	
	$col3 = new Columna('Ejecutado');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
	$col3->setOculta(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);    
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

    $codigo = $this->getRequestParameter('codigo','');    
    $ajax = $this->getRequestParameter('ajax','');
    
    switch ($ajax){
      case '1':
        $this->giproanu = $this->getGiproanuOrCreate();
        $this->labels = $this->getLabels();
        $c = new Criteria();
		$c->add(GiregindPeer::NUMUNI,$codigo);
		$c->add(GiregindPeer::ESTINDG,'A');
		$per = GiregindPeer::doSelect($c);
		$arrindg=array();
		foreach($per as $r)
		{
			$key = $r->getNumindg();
			$arrindg[$key]=$r->getNumindg()." - ".$r->getNomindg();			
		}
		$this->arrindg=$arrindg;
		if(!$this->arrindg)
		  $this->arrindg=array(''=>'Seleccione...');
        $this->cond='1';
        $output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
	  case '2':	 
        $ano = $this->getRequestParameter('ano',''); 
		$rev = $this->getRequestParameter('rev',''); 		
		$js='';
		
		$c = new Criteria();
		$c->add(GiproanuPeer::ANOINDG,$ano);
		$c->add(GiproanuPeer::REVANOINDG,$rev);
		$per = GiproanuPeer::doSelectOne($c);
		if($per)
		{			
			$est = $per->getEstprog();
			if($est=='C')
			{
				$js=" $('giproanu_revanoindg').value='';
					  alert('La Programacion esta cerrada para la Revision $rev  Año $ano  ');";
			}else
			{
				$js=" $('giproanu_revanoindg').value='';					  
					  alert('La Programacion ya fue registrada para la Revision $rev y el Año $ano, consulte desde la lista ');";
			}
		} 

		$output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		return sfView::HEADER_ONLY;
		
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		return sfView::HEADER_ONLY;
    }    
    

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  public function validateEdit()
  {
    $this->coderr =-1;

    

    if($this->getRequest()->getMethod() == sfRequest::POST){
       $this->giproanu = $this->getGiproanuOrCreate();
	   $this->updateGiproanuFromRequest();	
       $c = new Criteria();
		$c->add(GiproanuPeer::ANOINDG,$this->giproanu->getAnoindg());
		$c->add(GiproanuPeer::REVANOINDG,$this->giproanu->getRevanoindg());
		$per = GiproanuPeer::doSelectOne($c);
		if($per)
		{
			$est = $per->getEstprog();
			if($est=='C')
				$this->coderr=11101;			
		}      

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
  	  $this->giproanu = $this->getGiproanuOrCreate();
  	  $this->unidades = $this->cargar_numuni();
	  $this->indi = $this->cargar_indi();
      $this->params = array('unidades'=>$this->unidades,'indi'=>$this->indi);
      $this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
	$c = new Criteria();
	$c->add(GiproanuPeer::NUMINDG,$clasemodelo->getNumindg());
	$c->add(GiproanuPeer::ANOINDG,$clasemodelo->getAnoindg());
	$c->add(GiproanuPeer::REVANOINDG,$clasemodelo->getRevanoindg());
	$per = GiproanuPeer::doSelect($c);
	foreach($per as $reg)
	{
		$reg->delete();
	}
	
	foreach($grid[0] as $r)
	{
		$giproanu = new Giproanu();
		$giproanu->setNumindg($clasemodelo->getNumindg());
		$giproanu->setAnoindg($clasemodelo->getAnoindg());
		$giproanu->setRevanoindg($clasemodelo->getRevanoindg());
		$giproanu->setNumtrim($r['numtrim']);
		$giproanu->setProgtrim($r['progtrim']);
		$giproanu->setEjectrim($r['ejectrim']);
		if($r['estprog']=='')
			$giproanu->setEstprog('A');
		else
			$giproanu->setEstprog($r['estprog']);	
		if($r['estprog']=='' || $r['estprog']=='A')	
			$giproanu->setFeccierre(null);
		else
			$giproanu->setFeccierre(date('Y-m-d'));
			
		if($r['esttrim']=='')
			$giproanu->setEsttrim('A');
		else
			$giproanu->setEsttrim($r['esttrim']);	
		if($r['esttrim']=='' || $r['esttrim']=='A')	
			$giproanu->setFeccietri(null);
		else
			$giproanu->setFeccietri($r['feccietri']);	
						
		$giproanu->save();	
	}
    return $this->redirect('gindproanu/list');
	
  }

  public function deleting($clasemodelo)
  {
    $c = new Criteria();
	$c->add(GiproanuPeer::NUMINDG,$clasemodelo->getNumindg());
	$c->add(GiproanuPeer::ANOINDG,$clasemodelo->getAnoindg());
	$c->add(GiproanuPeer::REVANOINDG,$clasemodelo->getRevanoindg());
	$per = GiproanuPeer::doSelect($c);
	if($per)
	{
		if($per[0]->getEstprog()=='C')
		{
			return '11104';
		}else
		{
			foreach($per as $reg)
			{
				$reg->delete();
			}
		}		
	}	
	return '-1';
  }


}
