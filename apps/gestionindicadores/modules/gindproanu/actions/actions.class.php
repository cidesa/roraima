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
	/*public function executeList()
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
  }*/

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
	  $r=array(''=>'Selecccione....');

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
	  	$r=array(''=>'Selecccione....');

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
	$per = GiproanuPeer::doSelect($c);
	if($per)
	{
		if($per[0]->getEsttrim()=='C')
			$this->readonly=true;		  
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
	
	$col4 = new Columna('Estatus Trimestre');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
	$col4->setOculta(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setHTML(' type="text" size="10" readonly="true"');
    $col4->setNombreCampo('esttrim');
	
	$col5 = new Columna('Fecha Cierre');
    $col5->setTipo(Columna::FECHA);
    $col5->setEsGrabable(true);
	$col5->setOculta(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
	$col5->setHTML(' type="text" size="10" readonly="true" ');
    $col5->setNombreCampo('feccierre');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);    

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
		$this->arrindg=array();
		foreach($per as $r)
		{
			$this->arrindg[$r->getNumindg()]=$r->getNumindg()." - ".$r->getNomindg();			
		}
		if(!$this->arrindg)
		  $this->arrindg=array(''=>'Seleccione...');
        $this->cond='1';
        $output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
	  case '2':	 
		$indicador = $this->getRequestParameter('indicador','');
		$ano = $this->getRequestParameter('ano','');
		$revision = $this->getRequestParameter('revision','');
		
		$c = new Criteria();
		$c->add(GiproanuPeer::NUMINDG,$indicador);
		$c->add(GiproanuPeer::ANOINDG,$ano);
		$c->add(GiproanuPeer::REVANOINDG,$revision);
		$per = GiproanuPeer::doSelect($c);
		if($per)
		{
			foreach($per as $r)
			{
				$r->setEsttrim('C');
				$r->setFeccierre(date('Y-m-d'));
				$r->save();
			}	
		}
		$output = '[["","",""],["","",""],["","",""]]';
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

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

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
		if($r['esttrim']=='')
			$giproanu->setEsttrim('A');
		else
			$giproanu->setEsttrim($r['esttrim']);	
		if($r['esttrim']=='' || $r['esttrim']=='A')	
			$giproanu->setFeccierre(null);
		else
			$giproanu->setFeccierre(date('Y-m-d'));	
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
	foreach($per as $reg)
	{
		$reg->delete();
	}
	return '-1';
  }


}
