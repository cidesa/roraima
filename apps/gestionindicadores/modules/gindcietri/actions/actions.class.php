<?php

/**
 * gindcietri actions.
 *
 * @package    siga
 * @subpackage gindcietri
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class gindcietriActions extends autogindcietriActions
{
  public function executeList()
  {
  	return $this->redirect('gindcietri/create');
  }	

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
 	  $this->giproanu = $this->getGiproanuOrCreate();	    	  
	  $this->revision = $this->cargar_revision();
	  $this->trimestre = $this->cargar_trimestre();
      $this->params = array('revision'=>$this->revision,'trimestre'=>$this->trimestre);
  } 
  public function cargar_trimestre()
  {
  	  $c = new Criteria();
	  $c->add(GiproanuPeer::ANOINDG,$this->giproanu->getAnoindg());
	  $obj = GiproanuPeer::doSelect($c);
	  $r=array();
	  if(!$obj)
	  	$r=array(''=>'Selecccione....');

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getNumtrim()=>$i->getNumtrim());
	  }
	  return $r;
  } 
 
  public function cargar_revision()
  {
  	  $c = new Criteria();
	  $c->add(GiproanuPeer::ANOINDG,$this->giproanu->getAnoindg());
	  $obj = GiproanuPeer::doSelect($c);
	  $r=array();
	  if(!$obj)
	  	$r=array(''=>'Selecccione....');

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getRevanoindg()=>$i->getRevanoindg());
	  }
	  return $r;
  } 

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


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
		$c->add(GiproanuPeer::ANOINDG,$codigo);
		$c->add(GiproanuPeer::ESTTRIM,'A');
		$per = GiproanuPeer::doSelect($c);
		$arrrev=array(''=>'Seleccione...');
		foreach($per as $r)
		{
			$arrrev[$r->getRevanoindg()]=$r->getRevanoindg();			
		}
		$this->arrrev=$arrrev;	    
        $this->cond='1';
        $output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
	  case '2':	
        $trimestre = $this->getRequestParameter('trimestre','');
		$ano = $this->getRequestParameter('ano','');
		$revision = $this->getRequestParameter('revision','');
		
		$c = new Criteria();
		$c->add(GiproanuPeer::NUMTRIM,$trimestre);
		$c->add(GiproanuPeer::ANOINDG,$ano);
		$c->add(GiproanuPeer::REVANOINDG,$revision);
		$per = GiproanuPeer::doSelect($c);
		if($per)
		{
			foreach($per as $r)
			{
				$r->setEsttrim('C');
				$r->setFeccietri(date('Y-m-d'));
				$r->save();
			}	
		}
        $output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
        break;
	  case '3':
        $ano = $this->getRequestParameter('anoindg','');
        $this->giproanu = $this->getGiproanuOrCreate();
        $this->labels = $this->getLabels();
        $c = new Criteria();
		$c->add(GiproanuPeer::ANOINDG,$ano);
		$c->add(GiproanuPeer::REVANOINDG,$codigo);
		$c->add(GiproanuPeer::ESTTRIM,'A');
		$per = GiproanuPeer::doSelect($c);
		foreach($per as $r)
		{
			$arrtri[$r->getNumtrim()]=$r->getNumtrim();			
		}
		$this->arrtri=$arrtri;		
        $this->cond='2';
        $output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;	
      default:
        $output = '[["","",""],["","",""],["","",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    

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
    $this->revision = $this->cargar_revision();
      $this->params = array('revision'=>$this->revision);

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
	$c = new Criteria();
	$c->add(GiproanuPeer::NUMTRIM,$clasemodelo->getNumtrim());
	$c->add(GiproanuPeer::ANOINDG,$clasemodelo->getAnoindg());
	$c->add(GiproanuPeer::REVANOINDG,$clasemodelo->getRevanoindg());
	$per = GiproanuPeer::doSelect($c);
	if($per)
	{
		foreach($per as $r)
		{
			$r->setEsttrim('C');
			$r->setFeccietri(date('Y-m-d'));
			$r->save();
		}	
	}
    return '-1';
  }

  public function deleting($clasemodelo)
  {
    return $this->redirect('gindcietri/create');
  }


}
