<?php

/**
 * nomnommovnomcon actions.
 *
 * @package    siga
 * @subpackage nomnommovnomcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnommovnomconActions extends autonomnommovnomconActions
{

    public function executeList()
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
  }

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

    public function configGrid($codigonomina='', $codigoconcepto='')
	  {

		$c = new Criteria();
	 	$c->add(NpasicarempPeer::CODNOM,$codigonomina);
		$c->add(NpasiconempPeer::CODCON,$codigoconcepto);
		$c->add(NphojintPeer::STAEMP,'A');
		$c->add(NpasicarempPeer::STATUS,'V');
	 	$c->addJoin(NpasicarempPeer::CODEMP,NphojintPeer::CODEMP);
	 	$c->addJoin(NpasiconempPeer::CODEMP,NpasicarempPeer::CODEMP);
		$c->addJoin(NpasiconempPeer::CODCAR,NpasicarempPeer::CODCAR);
		$per = NpasiconempPeer::doSelect($c);

		$filas_arreglo=150;
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



  protected function getNpasiconempOrCreate($id = 'id', $codcon = 'codcon', $codnom= 'codnom')
  {
    if (!$this->getRequestParameter($id))
    {
      $npasiconemp = new Npasiconemp();
      $this->configGrid();

    }
    else
    {

      $c = new Criteria();
 	  $c->add(NpasiconempPeer::CODCON,$this->getRequestParameter($codcon));
  	  $npasiconemp = NpasiconempPeer::doSelectOne($c);
  	  if (!$npasiconemp) $npasiconemp = new Npasiconemp();
  	  $nomina=$this->getRequestParameter($codnom);
      if ($nomina=="") $nomina=Herramientas::getX('CODCON','Npasiconnom','Codnom',$npasiconemp->getCodcon());
      $npasiconemp->setCodnom($nomina);
      $this->configGrid($npasiconemp->getCodnom(),$npasiconemp->getCodcon());


      $this->forward404Unless($npasiconemp);
    }

    return $npasiconemp;
  }


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
         $this->configGrid($this->getRequestParameter('codigonomina'),$this->getRequestParameter('codigoconcepto'));

         $dato=NpdefcptPeer::getNomconnom(trim($this->getRequestParameter('codigoconcepto')),trim($this->getRequestParameter('codigonomina')));
	   $output = '[["'.$cajtexcom.'","'.$dato.'",""]]';
	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	 }

	}

  protected function saveNpasiconemp($npasiconemp)
  {
	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
	Nomina::salvarNomnommovnomcon($npasiconemp,$grid);
  }



}
