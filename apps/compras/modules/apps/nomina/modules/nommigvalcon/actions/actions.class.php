<?php

/**
 * nommigvalcon actions.
 *
 * @package    siga
 * @subpackage nommigvalcon
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nommigvalconActions extends autonommigvalconActions
{
  public function executeList()
  {
  	$this->redirect('nommigvalcon/create');
  }	

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {  	  	  	
  	$currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
  	$arc='N';
	if (is_file($currentFile))
 		$arc='S';	
	$this->params=array('archivo'=>$arc);
  }
  
  protected function updateNpasiconempFromRequest()
  {    
        if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('npasiconemp[archixls]'))
	    {
	        $fileName = "archivo_excel.xls";     
	        $this->getRequest()->moveFile('npasiconemp[archixls]', sfConfig::get('sf_upload_dir')."/assets/".$fileName);	      	      	      
	    }
  } 

  public function configGridDatos($per=array())
  {    		    	
    

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setFilas(0);
    $opciones->setTabla('Npasiconemp');
    $opciones->setName('a');
	$opciones->setAnchoGrid(900);
    $opciones->setAncho(900);
    $opciones->setTitulo('Conceptos - Monto');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('CÃ³digo Empleado');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codemp');
    $col1->setHTML('type="text" size="10" readonly="true"');

    $col2 = new Columna('Nombre Empleado');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(false);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomemp');
    $col2->setHTML('type="text" size="30" readonly="true"');
	
	$col3 = new Columna('CÃ³digo Cargo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codcar');
    $col3->setHTML('type="text" size="10" readonly="true"');

    $col4 = new Columna('Nombre Cargo');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(false);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomcar');
    $col4->setHTML('type="text" size="40" readonly="true"');
    
    $col5 = new Columna('CÃ³digo Concepto');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codcon');
    $col5->setHTML('type="text" size="10" readonly="true"');

    $col6 = new Columna('Nombre Concepto');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(false);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('nomcon');
    $col6->setHTML('type="text" size="40" readonly="true"');
    
    $col7 = new Columna('Cantidad');
    $col7->setTipo(Columna::MONTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('cantidad');
    $col7->setHTML('type="text" size="10" readonly="true"');

    $col8 = new Columna('Monto');
    $col8->setTipo(Columna::MONTO);
    $col8->setEsGrabable(true);
    $col8->setAlineacionObjeto(Columna::IZQUIERDA);
    $col8->setAlineacionContenido(Columna::IZQUIERDA);
    $col8->setNombreCampo('monto');
    $col8->setHTML('type="text" size="10" readonly="true"');
    
    /*$col9 = new Columna('Fecha Inicio');
    $col9->setTipo(Columna::FECHA);
    $col9->setEsGrabable(true);
    $col9->setAlineacionObjeto(Columna::CENTRO);
    $col9->setAlineacionContenido(Columna::CENTRO);
    $col9->setNombreCampo('fecini');
    $col9->setHTML('type="text" size="10" readonly="true"');

    $col10 = new Columna('Fecha ExpediciÃ³n');
    $col10->setTipo(Columna::FECHA);
    $col10->setEsGrabable(true);
    $col10->setAlineacionObjeto(Columna::IZQUIERDA);
    $col10->setAlineacionContenido(Columna::IZQUIERDA);
    $col10->setNombreCampo('fecexp');
    $col10->setHTML('type="text" size="10" readonly="true"');
    
    $col11 = new Columna('');
    $col11->setTipo(Columna::TEXTO);
    $col11->setEsGrabable(true);    
    $col11->setOculta(true);
    $col11->setNombreCampo('frecon');

    $col12 = new Columna('');
    $col12->setTipo(Columna::TEXTO);
    $col12->setEsGrabable(true);
    $col12->setOculta(true);    
    $col12->setNombreCampo('asided');
    
    
    $col13 = new Columna('');
    $col13->setTipo(Columna::TEXTO);
    $col13->setEsGrabable(true);
    $col13->setOculta(true);    
    $col13->setNombreCampo('acucon');
    
    $col14 = new Columna('');
    $col14->setTipo(Columna::TEXTO);
    $col14->setEsGrabable(true);
    $col14->setOculta(true);    
    $col14->setNombreCampo('calcon');
    
    $col15 = new Columna('');
    $col15->setTipo(Columna::TEXTO);
    $col15->setEsGrabable(true);
    $col15->setOculta(true);    
    $col15->setNombreCampo('activo');
    
    $col16 = new Columna('');
    $col16->setTipo(Columna::TEXTO);
    $col16->setEsGrabable(true);
    $col16->setOculta(true);    
    $col16->setNombreCampo('acumulado');*/


    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
    $opciones->addColumna($col5);
	$opciones->addColumna($col6);
	$opciones->addColumna($col7);
    $opciones->addColumna($col8);
	/*$opciones->addColumna($col9);
	$opciones->addColumna($col10);
    $opciones->addColumna($col11);
	$opciones->addColumna($col12);
	$opciones->addColumna($col13);
	$opciones->addColumna($col14);
    $opciones->addColumna($col15);
	$opciones->addColumna($col16);*/

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
    $this->npasiconemp->setObjcon($this->obj);
	
  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el cÃ³digo necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la peticiÃ³n ajax desde el cliente los datos que necesitemos
    // para generar el cÃ³digo de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $per=array();
        $js="";
      	$this->npasiconemp = $this->getNpasiconempOrCreate();
        $this->updateNpasiconempFromRequest();        
        
        $data = new Spreadsheet_Excel_Reader();
	  	$data->setOutputEncoding('CP1251'); 
	  	$currentFile = sfConfig::get('sf_upload_dir')."/assets/archivo_excel.xls";
	  	if (is_file($currentFile))
	  	{
		  	$data->read($currentFile);	  	
		  
		  	$r=0;
		  	$col1="";
		  	$col2="";
		  	$col3="";  	  	
		  	foreach($data->sheets[0]['cells'] as $dat){  		  	 
	  	   	  if(empty($col1) || empty($col2) || empty($col3))
	  	   	  {	  	   	  	
	  	   	  	$col1=$dat[1];
	  	   	  	$col2=$dat[2];
	  	   	  	$col3=$dat[3];
	  	   	  	
	  	   	    $sql1 = "select * from information_schema.columns  
				where 
				--table_catalog='CONTRALORIA' and table_schema='SIMA004' and --esto esta en comentario
				table_name='npasiconemp' and column_name='".$col1."'";
            	
            	$sql2 = "select * from information_schema.columns  
				where 
				--table_catalog='CONTRALORIA' and table_schema='SIMA004' and --esto esta en comentario
				table_name='npasiconemp' and column_name='".$col2."'";            	
            	
            	$sql3 = "select * from information_schema.columns  
				where 
				--table_catalog='CONTRALORIA' and table_schema='SIMA004' and --esto esta en comentario
				table_name='npasiconemp' and column_name='".$col3."'";
            	
            	if(!H::BuscarDatos($sql1,$rs))
            	{
            		$js="alert('La Columna $col1 no existe en la tabla NPASICONEMP ');";
            		break;	
            	}
	  	   	    if(!H::BuscarDatos($sql2,$rs))
            	{
            		$js="alert('La Columna $col2 no existe en la tabla NPASICONEMP ');";
            		break;	
            	}
	  	   	    if(!H::BuscarDatos($sql3,$rs))
            	{
            		$js="alert('La Columna $col3 no existe en la tabla NPASICONEMP ');";
            		break;	
            	}
            	
	  	   	  }  	   	  	
	  	   	  else
	  	   	  {
	  	   	  	$c = new Criteria();
	  	   	  	$c->add(NphojintPeer::CODEMP,$dat[1]);	  	   	  	
	  	   	  	$objemp = NphojintPeer::doSelectOne($c);
	  	   	  	if($objemp)
	  	   	  	{
	  	   	  		$c = new Criteria();
		  	   	  	$c->add(NpdefcptPeer::CODCON,$dat[2]);	  	   	  	
		  	   	  	$objcon = NpdefcptPeer::doSelectOne($c);
		  	   	  	if($objcon)
		  	   	  	{
		  	   	  		if(is_numeric($dat[3]))
		  	   	  		{
		  	   	  			$c = new Criteria();
		  	   	  			$c->add(NpasicarempPeer::CODEMP,$dat[1]);
		  	   	  			$c->add(NpasicarempPeer::STATUS,'V');
		  	   	  			$c->add(NpasiconnomPeer::CODCON,$dat[2]);
		  	   	  			$c->addJoin(NpasiconnomPeer::CODNOM,NpasicarempPeer::CODNOM);
		  	   	  			$objjoin = NpasicarempPeer::doSelectOne($c);
		  	   	  			if($objjoin){
					  	   	  	
					  	   	  	$c = new Criteria();
					  	   	  	$c->add(NpdefmovPeer::CODNOM,$objjoin->getCodnom());
					  	   	  	$c->add(NpdefmovPeer::CODCON,$dat[2]);
					  	   	  	$objmov = NpdefmovPeer::doSelectOne($c);					  	   	  	
					  	   	  	
					  	   	  	if($objmov)
					  	   	  	{
					  	   	  		$per[$r][$col1]=$dat[1];
			  	   	  				$per[$r]['nomemp']=$objemp->getNomemp();
			  	   	  				$per[$r]['codcar']=$objjoin->getCodcar();
			  	   	  				$per[$r]['nomcar']=$objjoin->getNomcar();
						  	   	  	$per[$r][$col2]=$dat[2];
						  	   	  	$per[$r]['nomcon']=$objcon->getNomcon();
						  	   	  	$objmov->getStatus()=='M' ? $per[$r][$col3]=H::FormatoMonto($dat[3]) : $per[$r]['cantidad']=H::FormatoMonto($dat[3]);						  	   	  	
						  	   	  	$per[$r]['id']=9;
						  	   	  	$r++;
					  	   	  		
					  	   	  	}else
					  	   	  		$js="alert('Hay Conceptos no definidos como Conceptos de Movimientos');";
		  	   	  			}else
		  	   	  				$js="alert('Algunos Conceptos no estan asociados a la nomina que pertence el empleado o el Empleado no ha sido asignado a ninguna nomina');";
		  	   	  		}else
		  	   	  			$js="alert('Existen Montos que no cumplen con Formato NumÃ©rico');";
		  	   	  	}else
		  	   	  		$js="alert('Existen Codigos de Conceptos Incorrectos');";
	  	   	  	}else
		  	   	  	$js="alert('Existen Codigos de Empleados Incorrectos');";		  	   	  		  	   	  	
	  	   	  }  	   	  
			}
			unlink($currentFile);			
			 
	  	}else
	  	{
	  		$js="alert('Debe existir un archivo cargado previamente');";
	  		
	  	}
	  	     	
        $this->configGridDatos($per);
        $output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
        
        break;
      default:   	
      	
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->datos=$per;
    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');    
    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucciÃ³n
    #return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }


  /**
   *
   * FunciÃ³n que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones especÃ­ficas del negocio del formulario
   * Para mayor informaciÃ³n vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serÃ¡n usados en las funciones de validaciÃ³n.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los mÃ©todos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al cÃ³digo que retorna
      // Todas las funciones de validaciÃ³n y procesos del negocio
      // deben retornar cÃ³digos >= -1. Estos cÃ³digo serÃ¡m buscados en
      // el archivo errors.yml en la funciÃ³n handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * FunciÃ³n para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGridDatos();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
        $this->configGridDatos();
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj,true);
  	
  	if(count($grid[0])>=1)
  	{
  		foreach($grid[0] as $reg)
  		{
  			$c = new Criteria();
	  		$c->add(NpasiconempPeer::CODEMP,$reg['codemp']);
	  		$c->add(NpasiconempPeer::CODCON,$reg['codcon']);
	  		$c->add(NpasiconempPeer::CODCAR,$reg['codcar']);
	  		$obj = NpasiconempPeer::doSelectOne($c);	
	  		if($obj)
	  		{
	  			$obj->setCantidad($reg['cantidad']);
	  			$obj->setMonto($reg['monto']);
	  			$obj->save();
	  		}
  		}  		
  		return '-1';
  	}else
    	return '-1';#parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return $this->forward('nommigvalcon', 'create');
  }


}
