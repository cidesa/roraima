<?php

/**
 * fordefaccesp actions.
 *
 * @package    Roraima
 * @subpackage fordefaccesp
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class fordefaccespActions extends autofordefaccespActions
{
	private $coderror1 =-1;
	private $coderror =-1;

	/**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFordefaccespFromRequest()
	{
	  	$this->setVars();
	    $this->configGrid();
		$fordefaccesp = $this->getRequestParameter('fordefaccesp');

		if (isset($fordefaccesp['codpro']))
		{
			$this->fordefaccesp->setCodpro($fordefaccesp['codpro']);
		}
		if (isset($fordefaccesp['nompro']))
		{
			$this->fordefaccesp->setNompro($fordefaccesp['nompro']);
    }
    if (isset($fordefaccesp['proacc']))
    {
      $this->fordefaccesp->setProacc($fordefaccesp['proacc']);
    }
  }

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
		$this->fordefaccesp = $this->getFordefaccespOrCreate();
	  	$this->setVars();
	    $this->configGrid();


		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateFordefaccespFromRequest();
		   if($this->saveFordefaccesp($this->fordefaccesp)==-1){

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('fordefaccesp/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('fordefaccesp/list');
			}
			else
			{
				return $this->redirect('fordefaccesp/edit?id='.$this->fordefaccesp->getId());
			}
	    }
	    else
	    {
          $this->labels = $this->getLabels();
       	  if($this->coderror!=-1)
	      {
	       $err = Herramientas::obtenerMensajeError($this->coderror);
	       $this->getRequest()->setError('',$err);
	      }
          return sfView::SUCCESS;
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
  protected function saveFordefaccesp($fordefaccesp)
	{
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
		Formulacion::Grabar_AccionesEspecificas($fordefaccesp,$grid);
	    return -1;
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/fordefaccesp/filters');
    // pager
    $this->pager = new sfPropelPager('Fordefpry', 10);
    $c = new Criteria();
    $c->addJoin(FordefaccespPeer::CODPRO,FordefPryPeer::CODPRO);
    $c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getFordefaccespOrCreate($id = 'id',$codpro = 'codpro')
  {
    if (!$this->getRequestParameter($codpro))
    {
      $fordefaccesp = new Fordefaccesp();
    }
    else
    {
    //  $fordefaccesp = FordefaccespPeer::retrieveByPk($this->getRequestParameter($id));
      $c = new Criteria();
  	  $c->add(FordefaccespPeer::CODPRO,$this->getRequestParameter($codpro));
  	  $fordefaccesp = FordefaccespPeer::doSelectOne($c);
      $this->forward404Unless($fordefaccesp);
    }
    return $fordefaccesp;
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
   $this->mensaje="";
   if ($this->getRequestParameter('ajax')=='1')
   {
      $c = new Criteria();
      $c->add(FordefaccespPeer::CODPRO,strtoupper($this->getRequestParameter('codigo')));
      $pryaccesp = FordefaccespPeer::doSelectOne($c);
      if (!$pryaccesp)
          {
            $tipo=FordefpryPeer::getTipo($this->getRequestParameter('codigo'));
            $descripcion=FordefpryPeer::getNombre($this->getRequestParameter('codigo'));
            $output = '[["fordefaccesp_nompro","'.$descripcion.'",""],["fordefaccesp_proacc","'.$tipo.'",""]]';
            $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
            return sfView::HEADER_ONLY;
          }
          else
          {
            $this->mensaje="Este proyecto ya tiene acciones especificas definidas. Seleccione otro proyecto...";
          }
   }
   else if ($this->getRequestParameter('ajax')=='2')
   {
     $dato=NphojintPeer::getNomemp($this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     return sfView::HEADER_ONLY;
   }

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
		$c->add(FordefaccespPeer::CODPRO,$this->fordefaccesp->getCodpro());
		$c->addAscendingOrderByColumn(FordefaccespPeer::CODACCESP);
		$per = FordefaccespPeer::doSelect($c);


		$formatoaccesp=$this->formatoaccesp;
		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setTabla('Fordefaccesp');
		$opciones->setAnchoGrid(2500);
		$opciones->setAncho(2400);
		$opciones->setFilas(50);
		$opciones->setTitulo('Detalle de la Acciones Especificas');
		$opciones->setHTMLTotalFilas(' ');


		$col1 = new Columna('Código');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('Codaccesp');
		$col1->setHTML('type="text" size="10"');
		$col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$formatoaccesp.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

		$col2 = new Columna('Descripción');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('Desaccesp');
		$col2->setHTML('type="text" size="60"');

		$col3 = new Columna('Organismo Ente Ejecutor');
	    $col3->setTipo(Columna::COMBO);
	    $col3->setEsGrabable(true);
	    $col3->setNombreCampo('orgeje');
	    $col3->setCombo(self::CargarListaOrgEje());
	    $col3->setHTML(' ');

        $col4 = new Columna('Fecha de Inicio');
        $col4->setTipo(Columna::FECHA);
    	$col4->setAlineacionObjeto(Columna::CENTRO);
    	$col4->setAlineacionContenido(Columna::CENTRO);
    	$col4->setEsGrabable(true);
    	$col4->setHTML(' ');
    	$col4->setVacia(true);
    	$col4->setNombreCampo('fecini');

    	$col5 = clone $col4;
    	$col5->setTitulo('Fecha de Culminación');
    	$col5->setNombreCampo('feccul');

		// Se generan las columnas del catalogo
        $miobj=array('CODEMP' => 6, 'NOMEMP' => 7);
        $col6 = new Columna('C.I. Funcionario Responsable');
		$col6->setTipo(Columna::TEXTO);
		$col6->setEsGrabable(true);
		$col6->setAlineacionObjeto(Columna::IZQUIERDA);
		$col6->setAlineacionContenido(Columna::IZQUIERDA);
		$col6->setNombreCampo('Codempres');
		$col6->setHTML('type="text" size="10"');
    	$col6->setCatalogo('Nphojint','sf_admin_edit_form',$miobj);
    	//$col6->setCatalogo('Nphojint','sf_admin_edit_form',$miobj,'Nphojint_Fordefaccesp');
		$col6->setAjax('fordefaccesp',2,7);

		$col7 = new Columna('Nombre Funcionario Responsable');
		$col7->setTipo(Columna::TEXTO);
		$col7->setEsGrabable(false);
		$col7->setAlineacionObjeto(Columna::IZQUIERDA);
		$col7->setAlineacionContenido(Columna::IZQUIERDA);
		$col7->setNombreCampo('Nomemp');
		$col7->setHTML('type="text" size="40" readonly=true');

		$col8 = new Columna('Especificación Adicional');
		$col8->setTipo(Columna::TEXTO);
		$col8->setEsGrabable(true);
		$col8->setAlineacionObjeto(Columna::IZQUIERDA);
		$col8->setAlineacionContenido(Columna::IZQUIERDA);
		$col8->setNombreCampo('espadiubigeo');
		$col8->setHTML('type="text" size="60"');

	 	$col9 = new Columna('Codigo Estado');
	    $col9->setTipo(Columna::TEXTO);
	    $col9->setEsGrabable(true);
	    $col9->setAlineacionObjeto(Columna::CENTRO);
	    $col9->setAlineacionContenido(Columna::CENTRO);
	    $col9->setNombreCampo('codest');
	    $col9->setOculta(true);

		$col10 = new Columna('Estado');
	    $col10->setTipo(Columna::TEXTO);
	    $col10->setAlineacionObjeto(Columna::CENTRO);
	    $col10->setAlineacionContenido(Columna::CENTRO);
	    $col10->setNombreCampo('nomest');
	    $col10->setHTML('type="text" size="25" readonly=true');

		$col11 = new Columna('Codigo Municipio');
	    $col11->setTipo(Columna::TEXTO);
	    $col11->setEsGrabable(true);
	    $col11->setAlineacionObjeto(Columna::CENTRO);
	    $col11->setAlineacionContenido(Columna::CENTRO);
	    $col11->setNombreCampo('codmun');
	    $col11->setOculta(true);

		$col12 = new Columna('Municipio');
	    $col12->setTipo(Columna::TEXTO);
	    $col12->setAlineacionObjeto(Columna::CENTRO);
	    $col12->setAlineacionContenido(Columna::CENTRO);
	    $col12->setNombreCampo('nommun');
	    $col12->setHTML('type="text" size="25" readonly=true');

	    $col13 = new Columna('Codigo Parroquia');
	    $col13->setTipo(Columna::TEXTO);
	    $col13->setEsGrabable(true);
	    $col13->setAlineacionObjeto(Columna::CENTRO);
	    $col13->setAlineacionContenido(Columna::CENTRO);
	    $col13->setNombreCampo('codpar');
	    $col13->setOculta(true);


		$col14 = new Columna('Parroquia');
	    $col14->setTipo(Columna::TEXTO);
	    $col14->setAlineacionObjeto(Columna::CENTRO);
	    $col14->setAlineacionContenido(Columna::CENTRO);
	    $col14->setNombreCampo('nompar');
	    $col14->setHTML('type="text" size="25" readonly=true ' );

	    $col15 = new Columna('');
		$col15->setTipo(Columna::TEXTO);
		$col15->setEsGrabable(false);
		$col15->setAlineacionObjeto(Columna::IZQUIERDA);
		$col15->setAlineacionContenido(Columna::IZQUIERDA);
		$col15->setNombreCampo('anadir');
		$col15->setHTML('type="text" size="1" style="border:none" class="imagenannadir"');
		$col15->setJScript('onClick="agregargrid(this.id)"');



		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);
		$opciones->addColumna($col5);
		$opciones->addColumna($col6);
		$opciones->addColumna($col7);
        $opciones->addColumna($col8);
        $opciones->addColumna($col9);
		$opciones->addColumna($col10);
		$opciones->addColumna($col11);
		$opciones->addColumna($col12);
		$opciones->addColumna($col13);
		$opciones->addColumna($col14);
		$opciones->addColumna($col15);

		// Ee genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);

	}

	public function setVars()
	{
		$this->formatoaccesp = Herramientas::getX('codemp','ForDefEgrGen','ForAccEsp','001');
		$this->longitudaccesp = Herramientas::getX('codemp','ForDefEgrGen','LonAccEsp','001');
		$this->formatoproyecto = Herramientas::getX('codemp','ForDefEgrGen','ForProAcc','001');
        $this->longitudproyecto = Herramientas::getX('codemp','ForDefEgrGen','LonProAcc','001');
        $this->CargarEstado();
        $this->municipios=array();
       $this->parroquias=array();
	}

    public function CargarListaOrgEje()
	{
		$c = new Criteria();
		$lista = FordeforgpubPeer::doSelect($c);

		$tipos = array();

		foreach($lista as $obj_tip)
		{
		  $tipos += array($obj_tip->getCodorg() => $obj_tip->getNomorg());
		}
		return $tipos;
	}

  public function CargarEstado()
  {
    $tablas=array('fordefest');//areglo de los joins de las tablas
    $filtros_tablas=array('');//arreglo donde mando los filtros de las clases
    $filtros_variales=array('');//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codest','desest');// arreglos donde me traigo el nombre y el codigo
    $esta= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

	foreach ($esta as $est => $estv)
	{
		$esta[$est] = ucfirst($estv);
	}
	$this->estados=$esta;
    return $this->estados;

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
  }

   /**
   * Función para manejar la captura de errores del negocio, tanto que se
   * produzcan por algún validator y por un valor false retornado por el validateEdit
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function handleErrorEdit()
   {
   	if($this->getRequest()->getMethod() == sfRequest::POST)
    {
	    $this->preExecute();
	    $this->fordefaccesp = $this->getFordefaccespOrCreate();
	    $this->updateFordefaccespFromRequest();
		$this->setVars();
		$this->configGrid();
	    $this->labels = $this->getLabels();

	    if(!$this->validateEdit())
	    {
	      if($this->coderror!=-1)
	      {
	       $err = Herramientas::obtenerMensajeError($this->coderror);
	       $this->getRequest()->setError('',$err);
	      }
	    }
	    return sfView::SUCCESS;
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
 	$this->fordefaccesp = $this->getFordefaccespOrCreate();
    $this->updateFordefaccespFromRequest();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
        $grid=Herramientas::CargarDatosGrid($this,$this->obj);
         if (!$this->ValidarDatosenGrid($grid,&$micoderr))
         {
           $this->coderror=$micoderr;
           return false;
         }

      return true;
    }else return true;
  }

  public function ValidarDatosenGrid($grid,&$micoderr)
  {
      $x=$grid[0];
      $j=0;
      $tienedatos=false;
      while ($j<count($x) && !$tienedatos)
      {
        if ($x[$j]->getCodaccesp()!="")
        {
          $tienedatos=true;
          if ($x[$j]->getDesaccesp()=="")
          {
          	$micoderr=303;
          	return false;
          }
        }
        $j++;
      } //while ($j<count($x))

      if ($tienedatos)
      {
        return true;
      }
      else
      {
      	$micoderr=302;
        return false;
      }
  }

 }
