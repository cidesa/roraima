<?php

/**
 * presnomasitrabcont actions.
 *
 * @package    Roraima
 * @subpackage presnomasitrabcont
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class presnomasitrabcontActions extends autopresnomasitrabcontActions
{

  // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasiempcont/filters');

    // pager
    $this->pager = new sfPropelPager('Npasiempcont', 5);
    $c = new Criteria();
	$c->addSelectColumn(NpasiempcontPeer::CODTIPCON);
    $c->addSelectColumn("'' AS CODNOM");
    $c->addSelectColumn("'' AS CODEMP");
    $c->addSelectColumn("'' AS NOMEMP");
    $c->addSelectColumn("'yyyy/mm/dd' AS FECCAL");
	$c->addSelectColumn("'yyyy/mm/dd' AS FECDES");
	$c->addSelectColumn("'yyyy/mm/dd' AS FECDES");
	$c->addSelectColumn("'' AS STATUS");
    $c->addSelectColumn("max(ID) AS ID");
    $c->addGroupByColumn(NpasiempcontPeer::CODTIPCON);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }


  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpasiempcontFromRequest()
  {
    $npasiempcont = $this->getRequestParameter('npasiempcont');

    if (isset($npasiempcont['codtipcon']))
    {
      $this->npasiempcont->setCodtipcon($npasiempcont['codtipcon']);
    }
    if (isset($npasiempcont['destipcon']))
    {
      $this->npasiempcont->setDestipcon($npasiempcont['destipcon']);
    }
  }

  protected function getNpasiempcontOrCreate($id = 'id')
  {

    if (!$this->getRequestParameter($id))
    {
      $this->configGrid($this->getRequestParameter('npasiempcont[codtipcon]'));

      $npasiempcont = new Npasiempcont();
    }
    else
    {
      $npasiempcont = NpasiempcontPeer::retrieveByPk($this->getRequestParameter($id));

      /*$sql ="Select CODEMP From NPASIEMPCONT  Where CODTIPCON = '".$npasiempcont->getCodtipcon()."' order by codemp";*/

      /*$resp = Herramientas::BuscarDatos($sql,&$per1);*/

      /*$sql="SELECT a.CodEmp FROM NpNomina c,Nphojint a, Npasicaremp  b
	  		where c.codnom=b.codnom and a.codEmp=b.codEmp and b.status='V' and c.codnom in (select codnom from npasinomcont where codtipcon='".$npasiempcont->getCodtipcon()."') order by b.codNom,a.CodEmp";*/
	  //$resp2 = Herramientas::BuscarDatos($sql,&$per);

		/* $sql="select z.* from
				(select  codemp,c.codtipcon,a.codnom from npasicaremp a, npasinomcont c
				where  c.codnom=a.codnom ) z
				left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
				where x.codemp is null
				and z.codtipcon='".$npasiempcont->getCodtipcon()."'";
		$resp = Herramientas::BuscarDatos($sql,&$per1);

	 if (!$per1)
     {
     	$this->configGrid($npasiempcont->getCodtipcon());
     }
	 else
	 {
	 	$this->mensaje="Hay Trabajadores nuevos asignados a este contrato, guarde para actualizar";
	    $this->configGrid($npasiempcont->getCodtipcon());
	 }*/
	  $this->configGrid($npasiempcont->getCodtipcon());
      $this->forward404Unless($npasiempcont);
    }

    return $npasiempcont;
  }

/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2($codigo='')
  {
	$sql="select z.CodEmp,z.Nomemp,z.fecing as feccal,z.codnom,z.nomnom, 9 as id from
						(select  a.codemp,c.codtipcon,a.codnom,d.nomemp,d.fecing,b.nomnom from npasicaremp a, npasinomcont c, npnomina b, nphojint d
						where  c.codnom=a.codnom and a.codnom=b.codnom and a.codemp=d.codemp and a.status='V') z
						left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
						where z.codtipcon='".$codigo."'";

    $resp = Herramientas::BuscarDatos($sql,&$per);

    $filas_arreglo=100;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npasiempcont');
    $opciones->setName('a');
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $params = array("'+$('npasiempcont_codtipcon').value+'",'val2');
    $obj2=array('codnom'=> 1, 'nomnom' => 2);
    $col1 = new Columna('Codigo De Nomina');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::IZQUIERDA);
    $col1->setAlineacionContenido(Columna::IZQUIERDA);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('codnom');
    $col1->setCatalogo('Npnomina','sf_admin_edit_form',$obj2,'Presnomasitrabcont_Npnomina',$params);
    $col1->setHTML('type="text" size="10" readonly=false');
    $col1->setAjax('presnomasitrabcont',4,2);

    $col2 = new Columna('Tipo De Nomina');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomnom');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="30"');

    $params1 = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val3');
    $obj3=array('codemp'=> 3, 'nomemp' => 4 , 'fecing' => 5);
    $col3 = new Columna('Codigo Del Empleado');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codemp');
    $col3->setCatalogo('Nphojint','sf_admin_edit_form',$obj3,'Presnomasitrabcont_Npasiempcont',$params1);
    $col3->setHTML('type="text" size="10" readonly=false');

    $col4 = new Columna('Nombre Del Empleado');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
   // $col4->setJScript('onBlur=validarEntero(this.id)');
    $col4->setNombreCampo('nomemp');
    $col4->setHTML('type="text" size="30" readonly=false');

    $col5 = new Columna('Fecha de Ingreso');
    $col5->setTipo(Columna::FECHA);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('feccal');
    $col5->setHTML('type="text" size="10" readonly=false');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $this->obj = $opciones->getConfig($per);
//    print "<pre>";
//    print_r ($per);exit;


  }

/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
  {
    //print $codigo;
    //$sql ="Select a.CODTIPCON,a.CODNOM,a.CODEMP,a.NOMEMP,a.FECCAL,b.NOMNOM, 9 as id  From NPNOMINA b,NPASIEMPCONT a Where a.CODNOM=b.Codnom and  CODTIPCON = '".$codigo."' order by codemp";
	$sql="select DISTINCT '1' as check,'1' as check1,z.CODTIPCON,z.CodEmp,z.Nomemp,z.fecing as feccal,
						coalesce(x.fecdes,z.fecasi) as fecdes,
						--coalesce(x.fechas,(select max(anovighas) from npbonocont where codtipcon=z.codtipcon)) as fechas,
						coalesce(x.fechas,to_date('31/12/3000','dd/mm/yyyy')) as fechas,
						'' as codtipcon2,
						x.status,
						z.codnom,z.nomnom, 9 as id from
						(select  a.codemp,c.codtipcon,a.codnom,d.nomemp,d.fecing,a.fecasi,b.nomnom from npasicaremp a, npasinomcont c, npnomina b, nphojint d
						where  c.codnom=a.codnom and a.codnom=b.codnom and a.codemp=d.codemp and a.status='V') z
						left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
						where x.codtipcon is not null and z.codtipcon='".$codigo."'
		  union all
		  select DISTINCT '0' as check,'0' as check1,z.CODTIPCON,z.CodEmp,z.Nomemp,z.fecing as feccal,
		  				coalesce(x.fecdes,z.fecasi) as fecdes,
						--coalesce(x.fechas,(select max(anovighas) from npbonocont where codtipcon=z.codtipcon)) as fechas,
						coalesce(x.fechas,to_date('31/12/3000','dd/mm/yyyy')) as fechas,
						(select codtipcon from npasiempcont where codtipcon<>z.codtipcon and codemp=z.codemp and status='A') as codtipcon2,
						x.status,
						z.codnom,z.nomnom, 9 as id from
						(select  a.codemp,c.codtipcon,a.codnom,d.nomemp,d.fecing,a.fecasi,b.nomnom from npasicaremp a, npasinomcont c, npnomina b, nphojint d
						where  c.codnom=a.codnom and a.codnom=b.codnom and a.codemp=d.codemp and a.status='V') z
						left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
						where x.codtipcon is null and z.codtipcon='".$codigo."' order by check1 desc, codemp";

    $resp = Herramientas::BuscarDatos($sql,&$per);
	$this->totfil=count($per);
    $filas_arreglo=100;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setFilas(0);
    $opciones->setTabla('Npasiempcont');
    $opciones->setName('a');
	$opciones->setAncho(1190);
    $opciones->setAnchoGrid(1190);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col0 = new Columna('Marque');
    $col0->setTipo(Columna::CHECK);
    $col0->setEsGrabable(true);
    $col0->setNombreCampo('check');
    $col0->setHTML(' ');


    $col1 = new Columna('Codigo De Nomina');
    $col1->setTipo(Columna::TEXTO);
    $col1->setAlineacionObjeto(Columna::IZQUIERDA);
    $col1->setAlineacionContenido(Columna::IZQUIERDA);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('codnom');
    $col1->setHTML('type="text" size="5" readonly=true');

    $col2 = new Columna('Tipo De Nomina');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomnom');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="30" readonly=true ');

    $col3 = new Columna('Codigo Del Empleado');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codemp');
    $col3->setHTML('type="text" size="10" readonly=true');

    $col4 = new Columna('Nombre Del Empleado');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setNombreCampo('nomemp');
    $col4->setHTML('type="text" size="30" readonly=true');

    $col5 = new Columna('Fecha de Ingreso');
    $col5->setTipo(Columna::FECHA);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('feccal');
    $col5->setHTML('type="text" size="10" readonly=true');
	
	$col6 = new Columna('Fecha Desde');
    $col6->setTipo(Columna::FECHA);
    $col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('fecdes');
    $col6->setHTML('type="text" size="20"');
	
	$col7 = new Columna('Fecha Hasta');
    $col7->setTipo(Columna::FECHA);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setNombreCampo('fechas');
    $col7->setHTML('type="text" size="20" ');

	$col8 = new Columna(' ');
    $col8->setTipo(Columna::TEXTO);
	$col8->setOculta(true);
	$col8->setEsGrabable(true);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setNombreCampo('codtipcon2');
    $col8->setHTML('type="text" size="20"');	
	
	$col9 = new Columna(' ');
    $col9->setTipo(Columna::TEXTO);
	$col9->setOculta(true);
	$col9->setEsGrabable(true);
    $col9->setAlineacionObjeto(Columna::CENTRO);
    $col9->setAlineacionContenido(Columna::CENTRO);
    $col9->setNombreCampo('status');
    $col9->setHTML('type="text" size="20"');	
	
	$opciones->addColumna($col0);
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
	$opciones->addColumna($col6);
    $opciones->addColumna($col7);
	$opciones->addColumna($col8);
	$opciones->addColumna($col9);

    $this->obj = $opciones->getConfig($per);
	//print "<pre>";
    //print_r ($this->obj);


  }

/**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()

	{
		  $js='';
		  $output='';
		  $dato="";
	      $this->mensaje="";
	      $cajtexmos=$this->getRequestParameter('cajtexmos');
   		  $cajtexcom=$this->getRequestParameter('cajtexcom');
	  if ($this->getRequestParameter('ajax')=='1')
	    {
		    	if (trim($this->getRequestParameter('codigo'))<>'')
		    	{
		    		 $c = new Criteria();
		    		 $c->Add(NpasiempcontPeer::CODTIPCON,$this->getRequestParameter('codigo'));
		    		 $obj = NpasiempcontPeer::doSelect($c);
		    		 if(!$obj)
		    		 {
		    		 	$dato=Herramientas::getX('codtipcon','nptipcon','destipcon',$this->getRequestParameter('codigo'));
			    		 /*$sql ="Select CODEMP From NPASIEMPCONT  Where CODTIPCON = '".$npasiempcont->getCodtipcon()."' order by codemp";*/

					      /*$resp = Herramientas::BuscarDatos($sql,&$per1);*/

					      /*$sql="SELECT a.CodEmp FROM NpNomina c,Nphojint a, Npasicaremp  b
						  		where c.codnom=b.codnom and a.codEmp=b.codEmp and b.status='V' and c.codnom in (select codnom from npasinomcont where codtipcon='".$npasiempcont->getCodtipcon()."') order by b.codNom,a.CodEmp";*/
						  //$resp2 = Herramientas::BuscarDatos($sql,&$per);

						 /*$sql="select z.* from
								(select  codemp,c.codtipcon,a.codnom from npasicaremp a, npasinomcont c
								where  c.codnom=a.codnom ) z
								left outer join npasiempcont x on (z.codemp=x.codemp and z.codtipcon=x.codtipcon)
								where x.codemp is null
								and z.codtipcon='".$this->getRequestParameter('codigo')."'";
						$resp = Herramientas::BuscarDatos($sql,&$per1);
			    		if (!$per1)
		     			{
		                    $this->configGrid($this->getRequestParameter('codigo'));
		                }
			    		else
			    		{
			    			//$this->mensaje="Hay Trabajadores nuevos asignados a este contrato, guarde para actualizar";
			    			$this->configGrid($this->getRequestParameter('codigo'));
			    		}*/
			    		$this->configGrid($this->getRequestParameter('codigo'));
			    		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
		    		 }else
		    		 {
		    		 	$js.="$('$cajtexcom').value='';";
		    		 	$js.="alert('Codigo de Contrato ya Registrado');";
		    		 	$js.="$('$cajtexcom').focus();";
		    		 	$this->configGrid();
		    		 	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$js.'",""]]';
		    		 }

		       	}
		       	else
		       	{
		       		$this->configGrid();
		       		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

		       	}
			$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			//return sfView::HEADER_ONLY;
	        }

	}

 
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
    {
      $this->mensaje="";	
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->npasiempcont = $this->getNpasiempcontOrCreate();
        $this->updateNpasiempcontFromRequest();
        $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
        if(count($grid[0])>0)
        	self::$coderror=EmpleadosBanco::Validar_Datos_Npasiempcont($grid);
        else
        	self::$coderror=437;

       if ((self::$coderror<>-1))
        {
                return false;

        }else return true;

      }else return true;
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
    $this->npasiempcont = $this->getNpasiempcontOrCreate();
$this->configGrid($this->getRequestParameter('codigo'));

   try{
     $this->updateNpasiempcontFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror!=-1)
        {
        	$err = Herramientas::obtenerMensajeError(self::$coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }


 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
  	$this->mensaje="";
    $this->npasiempcont = $this->getNpasiempcontOrCreate();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasiempcontFromRequest();

      $this->saveNpasiempcont($this->npasiempcont);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('presnomasitrabcont/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('presnomasitrabcont/list');
      }
      else
      {
        return $this->redirect('presnomasitrabcont/edit');
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
  protected function saveNpasiempcont($npasiempcont)
  {

    $coderr = -1;

  	$grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
    $coderr = EmpleadosBanco::Grabar_grid_Npasiempcont($grid,$npasiempcont);

    $this->coderror=$coderr;

    return $this->coderror;

  }
  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
        return $this->redirect('presnomasitrabcont/list');
  }

}
