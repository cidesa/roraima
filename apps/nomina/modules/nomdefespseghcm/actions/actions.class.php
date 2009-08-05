<?php

/**
 * nomdefespseghcm actions.
 *
 * @package    siga
 * @subpackage nomdefespseghcm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefespseghcmActions extends autonomdefespseghcmActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->configGridParientes($this->npseghcm->getCodnom(),$this->npseghcm->getCodcon());
	$this->params=array('obj_parientes' => $this->obj_parientes);

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
  
  public function cargar_tippar()
  {
  	  $c = new Criteria();
	  $obj = NptipparPeer::doSelect($c);
	  $r=array();

	  foreach($obj  as  $i)
	  {
	  	$r += array($i->getTippar()=>$i->getDespar());
	  }
	  return $r;
  }
  
  public function configGridParientes($codnom='',$codcon='')
  {
    
	$c = new Criteria();
	$c->add(NpseghcmPeer::CODNOM,$codnom);
	$c->add(NpseghcmPeer::CODCON,$codcon);
    $per = NpseghcmPeer::doSelect($c);

    
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Npseghcm');
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(600);
	$opciones->setFilas(1);	
	$opciones->setName('b');
    $opciones->setTitulo(' ');
    $opciones->setHTMLTotalFilas(' ');
	
    // Se generan las columnas
    $col1 = new Columna('Tipo Pariente');
    $col1->setTipo(Columna::COMBO);
	$col1->setCombo($this->cargar_tippar());
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('tippar');
	$col1->setHTML(' ');

    $col2 = new Columna('Edad Desde');
    $col2->setTipo(Columna::TEXTO);
	$col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('edaddes');
    $col2->setHTML('type="text" size="20" ');
	
	$col3 = new Columna('Edad Hasta');
    $col3->setTipo(Columna::TEXTO);
	$col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('edadhas');
    $col3->setHTML('type="text" size="20" ');
	
	$col4 = new Columna('Monto');
    $col4->setTipo(Columna::MONTO);
	$col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('monto');
    $col4->setHTML('type="text" size="40" ');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj_parientes = $opciones->getConfig($per);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
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


  public function validateEdit()
  {
    $this->coderr =-1;
    $this->npseghcm = $this->getNpseghcmOrCreate();
	$this->updateNpseghcmFromRequest();

    if($this->getRequest()->getMethod() == sfRequest::POST){

        $this->configGridParientes();
	    $grid=Herramientas::CargarDatosGridv2($this,$this->obj_parientes);//0
	    $x=$grid[0]; 
		$r=0;
		if(count($x)>0)
		{
			while ($r<count($x))
		    {
		      if($x[$r]->getTippar()=='')
			  {
			  	$this->coderr= 489;
			  	break;
			  }	  	
		      if($x[$r]->getEdaddes()=='' && strlen(trim($x[$r]->getEdaddes()))==0)
			  {
			  	$this->coderr= 489;
			  	break;
			  }
			  if($x[$r]->getEdadhas()=='')
			  {
			  	$this->coderr= 489;
			  	break;
			  }
			  if($x[$r]->getMonto()==0)
			  {
			  	$this->coderr= 489;
			  	break;
			  }
			  if($x[$r]->getEdaddes() > $x[$r]->getEdadhas())
			  {
			  	$this->coderr= 490;
			  	break;
			  }		  		  
			  $r++;
			}	
		}else
		{
			$this->coderr= 489;
		}
		$c=new Criteria();
		$c->add(NpseghcmPeer::CODNOM,$this->npseghcm->getCodnom());	
		$c->add(NpseghcmPeer::CODCON,$this->npseghcm->getCodcon());
		$per = NpseghcmPeer::doSelect($c);		
		if($per)
		{
			$this->coderr= 491;
		}
		$c=new Criteria();
		$c->add(NpasiconnomPeer::CODNOM,$this->npseghcm->getCodnom());	
		$c->add(NpasiconnomPeer::CODCON,$this->npseghcm->getCodcon());
		$per = NpasiconnomPeer::doSelect($c);		
		if(!$per)
		{
			$this->coderr= 492;
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
    $this->configGridParientes();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj_parientes);
	$this->params=array('obj_parientes' => $this->obj_parientes);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj_parientes);
	
	$codnom=$clasemodelo->getCodnom();
	$codcon=$clasemodelo->getCodcon();

	if(count($grid[0])>0)
	{
		foreach($grid[0] as $res)
		{ 
			$res->setCodnom($codnom);
			$res->setCodcon($codcon);
			$res->save();			
		}	
	}	
	if(count($grid[1])>0)
	{
		foreach($grid[1] as $res)
		{
			$res->delete();			
		}	
	}
    return -1;#parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
  	$c = new Criteria();
	$c->add(NpseghcmPeer::CODNOM,$clasemodelo->getCodnom());
	$c->add(NpseghcmPeer::CODCON,$clasemodelo->getCodcon());
	$per = NpseghcmPeer::doDelete($c);
	
    return -1;#parent::deleting($clasemodelo);
  }


}
