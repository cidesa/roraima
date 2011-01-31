<?php

/**
 * nomdefespseghcm actions.
 *
 * @package    Roraima
 * @subpackage nomdefespseghcm
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespseghcmActions extends autonomdefespseghcmActions
{

  // Para incluir funcionalidades al executeEdit()
  /**
   * Función para colocar el codigo necesario en  
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
	$this->configGridParientes($this->npseghcm->getCodnom(),$this->npseghcm->getCodcon());
	$this->params=array('obj_parientes' => $this->obj_parientes);

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
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
  
  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
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
    $col2->setHTML('type="text" size="10" ');
	
	$col3 = new Columna('Edad Hasta');
    $col3->setTipo(Columna::TEXTO);
	$col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('edadhas');
    $col3->setHTML('type="text" size="10" ');
	
	$col4 = new Columna('Monto');
    $col4->setTipo(Columna::MONTO);
	$col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('montototal');
    $col4->setHTML('type="text" size="20" ');
	
	$col5 = new Columna('Cuota');
    $col5->setTipo(Columna::TEXTO);
	$col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setNombreCampo('cuota');
    $col5->setHTML('type="text" size="10" onBlur="actualizarmontocuota(this);"');
	
	$col6 = new Columna('Monto Cuota');
    $col6->setTipo(Columna::MONTO);
	$col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('monto');
    $col6->setHTML('type="text" size="20" ');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
	$opciones->addColumna($col6);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj_parientes = $opciones->getConfig($per);

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


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
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
		if($this->npseghcm->getId()=='')
		{
			$c=new Criteria();
			$c->add(NpseghcmPeer::CODNOM,$this->npseghcm->getCodnom());	
			$c->add(NpseghcmPeer::CODCON,$this->npseghcm->getCodcon());
			$per = NpseghcmPeer::doSelect($c);		
			if($per)
			{
				$this->coderr= 491;
			}
			$c=new Criteria();
			$c->add(NpseghcmPeer::CODNOM,$this->npseghcm->getCodnom());	
			$c->add(NpseghcmPeer::CODCONAPO,$this->npseghcm->getCodconapo());
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
			$c=new Criteria();
			$c->add(NpasiconnomPeer::CODNOM,$this->npseghcm->getCodnom());	
			$c->add(NpasiconnomPeer::CODCON,$this->npseghcm->getCodconapo());
			$per = NpasiconnomPeer::doSelect($c);		
			if(!$per)
			{
				$this->coderr= 492;
			}	
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

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj_parientes);
	
	$codnom=$clasemodelo->getCodnom();
	$codcon=$clasemodelo->getCodcon();
	$codconapo=$clasemodelo->getCodconapo();

	if(count($grid[0])>0)
	{
		foreach($grid[0] as $res)
		{ 
			$res->setCodnom($codnom);
			$res->setCodcon($codcon);
			$res->setCodconapo($codconapo);
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

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
  	$c = new Criteria();
	$c->add(NpseghcmPeer::CODNOM,$clasemodelo->getCodnom());
	$c->add(NpseghcmPeer::CODCON,$clasemodelo->getCodcon());
	$c->add(NpseghcmPeer::CODCONAPO,$clasemodelo->getCodconapo());
	$per = NpseghcmPeer::doDelete($c);
	
    return -1;#parent::deleting($clasemodelo);
  }
  public function executeCatalogo()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $clase = $this->getRequestParameter('clase','');
    $nombre = $this->getRequestParameter('name','');
    $campobase = $this->getRequestParameter('campobase','');
    $campoprincipal = $this->getRequestParameter('campoprincipal','');
    $camposecundario = $this->getRequestParameter('camposecundario','');
	$camposecundario2 = $this->getRequestParameter('camposecundario2','');

    $c = new Criteria();
    eval('$c->add('.ucfirst(strtolower($clase)).'Peer::'.strtoupper($campoprincipal).','.chr(39).$codigo.chr(39).');');
    eval('$peer = '.ucfirst(strtolower($clase)).'Peer::doSelectOne($c);');

  if($camposecundario2!='')
  	eval('$cajasec = "'.strtolower($nombre).'_'.strtolower($camposecundario2).'";');
  else
  	eval('$cajasec = "'.strtolower($nombre).'_'.strtolower($camposecundario).'";');
	
  eval('$cajaid = "'.strtolower($nombre).'_'.strtolower($campobase).'";');
  if ($peer){
  eval('$valsec = $peer->get'.H::ObtenerNombreCampo($camposecundario).'();');
  eval('$valid = $peer->getId();');}
  else{
    $valsec='';
    $valid='';
  }
  $output = '[["'.$cajasec.'","'.$valsec.'",""],["'.$cajaid.'","'.$valid.'",""],["","",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }


}
