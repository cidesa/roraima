<?php

/**
 * nomnommovnomcon actions.
 *
 * @package    Roraima
 * @subpackage nomnommovnomcon
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomnommovnomconActions extends autonomnommovnomconActions
{

    /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
/*  public function executeList()
    {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasiconemp/filters');

    // pager
    $this->pager = new sfPropelPager('Npasiconnom', 10);
    $c = new Criteria();
    $c->addJoin(NpasiconnomPeer::CODCON,NpasiconempPeer::CODCON);
    $c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
    }



  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codcon_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasiconempPeer::CODCON, '');
      $criterion->addOr($c->getNewCriterion(NpasiconempPeer::CODCON, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcon']) && $this->filters['codcon'] !== '')
    {
      $c->add(NpasiconempPeer::CODCON, strtr($this->filters['codcon'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['codnom_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasiconempPeer::CODNOM, '');
      $criterion->addOr($c->getNewCriterion(NpasiconempPeer::CODNOM, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codnom']) && $this->filters['codnom'] !== '')
    {
      $c->add(NpasiconnomPeer::CODNOM, $this->filters['codnom']);
    }
    if (isset($this->filters['nomcon_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpasiconempPeer::NOMCON, '');
      $criterion->addOr($c->getNewCriterion(NpasiconempPeer::NOMCON, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomcon']) && $this->filters['nomcon'] !== '')
    {
      $c->add(NpasiconempPeer::NOMCON, '%'.strtr($this->filters['nomcon'], '*', '%').'%', Criteria::LIKE);
    $c->setIgnoreCase(true);
    }
  }*/

  public function executeIndex()
  {
    return $this->redirect('nomnommovnomcon/edit');
  }


	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpasiconempFromRequest()
	{
		$npasiconemp = $this->getRequestParameter('npasiconemp');

		if (isset($npasiconemp['codcon']))
    		{
      	$this->npasiconemp->setCodcon($npasiconemp['codcon']);
    		}
		if (isset($npasiconemp['codemp']))
		{
			$this->npasiconemp->setCodemp($npasiconemp['codemp']);
		}
		if (isset($npasiconemp['nomemp']))
		{
			$this->npasiconemp->setNomemp($npasiconemp['nomemp']);
		}
		if (isset($npasiconemp['codcar']))
		{
			$this->npasiconemp->setCodcar($npasiconemp['codcar']);
		}
		if (isset($npasiconemp['nomcar']))
		{
			$this->npasiconemp->setNomcar($npasiconemp['nomcar']);
		}
		if (isset($npasiconemp['monto']))
		{
			$this->npasiconemp->setMonto($npasiconemp['monto']);
		}
		if (isset($npasiconemp['cantidad']))
		{
			$this->npasiconemp->setCantidad($npasiconemp['cantidad']);
		}
	}

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */

  public function ConfigGrid($codigonomina='', $codigoconcepto='')
  {
    $this->params=array();
    //$this->npasiconemp = $this->getNpasiconempOrCreate();


                $c = new Criteria();
	 	$c->add(NpasicarempPeer::CODNOM,$codigonomina);
		$c->add(NpasiconempPeer::CODCON,$codigoconcepto);
		$c->add(NphojintPeer::STAEMP,'A');
		$c->add(NpasicarempPeer::STATUS,'V');
	 	$c->addJoin(NpasicarempPeer::CODEMP,NphojintPeer::CODEMP);
	 	$c->addJoin(NpasiconempPeer::CODEMP,NpasicarempPeer::CODEMP);
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
		$c->addAscendingOrderByColumn(NpasiconempPeer::NOMEMP);
		$per = NpasiconempPeer::doSelect($c);

        $this->nfilgrid="";
		$varemp = $this->getUser()->getAttribute('configemp');
		if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomnommovnomcon',$varemp['aplicacion']['nomina']['modulos'])){
		       if(array_key_exists('nfilgrid',$varemp['aplicacion']['nomina']['modulos']['nomnommovnomcon']))
		       {
		       	$this->nfilgrid=$varemp['aplicacion']['nomina']['modulos']['nomnommovnomcon']['nfilgrid'];
		       }
		     }


         if ($this->nfilgrid!="")
         {
           $filas_arreglo=$this->nfilgrid;
         }else{
		$filas_arreglo=150;
         }
		//print $codigo;


      $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/nomnommovnomcon/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_empleado');

       $this->obj = $this->columnas[0]->getConfig($per);

       $this->npasiconemp->setGrid($this->obj);

  }
  public function configGrid_backup($codigonomina='', $codigoconcepto='')
	  {

		$c = new Criteria();
	 	$c->add(NpasicarempPeer::CODNOM,$codigonomina);
		$c->add(NpasiconempPeer::CODCON,$codigoconcepto);
		$c->add(NphojintPeer::STAEMP,'A');
		$c->add(NpasicarempPeer::STATUS,'V');
	 	$c->addJoin(NpasicarempPeer::CODEMP,NphojintPeer::CODEMP);
	 	$c->addJoin(NpasiconempPeer::CODEMP,NpasicarempPeer::CODEMP);
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
		$c->addAscendingOrderByColumn(NpasiconempPeer::NOMEMP);
		$per = NpasiconempPeer::doSelect($c);

        $this->nfilgrid="";
		$varemp = $this->getUser()->getAttribute('configemp');
		if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomnommovnomcon',$varemp['aplicacion']['nomina']['modulos'])){
		       if(array_key_exists('nfilgrid',$varemp['aplicacion']['nomina']['modulos']['nomnommovnomcon']))
		       {
		       	$this->nfilgrid=$varemp['aplicacion']['nomina']['modulos']['nomnommovnomcon']['nfilgrid'];
		       }
		     }


         if ($this->nfilgrid!="")
         {
           $filas_arreglo=$this->nfilgrid;
         }else{
		$filas_arreglo=150;
         }
		//print $codigo;


		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(false);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npasiconemp');
		$opciones->setName('a');
		$opciones->setAnchoGrid(700);
		$opciones->setAncho(700);
		$opciones->setTitulo('Empleados');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Cód. Emp');
		$col1->setTipo(Columna::TEXTO);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codemp');
		$col1->setEsGrabable(true);
		$col1->setHTML('type="text" size="10" readonly=true');

		$col2 = new Columna('Nombre del Empleado');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(false);
		$col2->setAlineacionObjeto(Columna::IZQUIERDA);
		$col2->setAlineacionContenido(Columna::IZQUIERDA);
		$col2->setNombreCampo('nomemp');
		$col2->setHTML('type="text" size="40" readonly=true');

		$col3 = new Columna('Monto');
		$col3->setTipo(Columna::MONTO);
		$col3->setEsGrabable(true);
		$col3->setNombreCampo('monto');
		$col3->setHTML('type="text" size="12"');
	      $col3->setJScript('onBlur="javascript: event.keyCode=13; entermontootro(event,this.id)"');
		//$col3->setJScript('onBlur = "javascript: event.keyCode=13; return entermonto(event,this.id)"');

            $col4 = new Columna('Cantidad');
		$col4->setTipo(Columna::TEXTO);
		$col4->setEsGrabable(true);
		$col4->setNombreCampo('cantidad');
		$col4->setHTML('type="text" size="12"');
		$col4->setJScript('onBlur="javascript: event.keyCode=13; enternumero(event,this.id)"');
		//$col4->setJScript('onBlur="javascript: event.keyCode=13; entermonto(event,this.id)"');


		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($per);
  }



  protected function getNpasiconempOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $this->npasiconemp = new Npasiconemp();
      $this->configGrid();

    }
    else
    {
      $npasiconemp = NpasiconempPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($npasiconemp);
    }

    return $this->npasiconemp;
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

	 if ($this->getRequestParameter('ajax')=='1')
           {//print $this->getRequestParameter('codigo');exit;
            $dato= Herramientas::getX('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
           //print $dato=NpnominaPeer::getDesnom(trim($this->getRequestParameter('codigo')));exit;
               $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
               $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
               return sfView::HEADER_ONLY;
           }

	 else if ($this->getRequestParameter('ajax')=='2')
	 {
             $this->npasiconemp = $this->getNpasiconempOrCreate();
             $dato=NpdefcptPeer::getNomconnom(trim($this->getRequestParameter('codigoconcepto')),trim($this->getRequestParameter('codigonomina')));

             if ($dato!='Registro no encontrado')
             {
                $this->configGrid($this->getRequestParameter('codigonomina'),$this->getRequestParameter('codigoconcepto'));
             }
             
	     $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
	     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

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
  protected function saveNpasiconemp($npasiconemp)
  {
	$grid=Herramientas::CargarDatosGridv2($this,$this->obj);
	Nomina::salvarNomnommovnomcon($npasiconemp,$grid);
  }



}
