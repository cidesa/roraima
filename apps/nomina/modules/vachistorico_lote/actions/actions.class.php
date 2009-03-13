<?php

/**
 * vachistorico_lote actions.
 *
 * @package    siga
 * @subpackage vachistorico_lote
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vachistorico_loteActions extends autovachistorico_loteActions
{

  public function executeList()
  {
  	return $this->redirect('vachistorico_lote/edit');

    /*$this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npvacdisfrute/filters');

    // pager
    $this->pager = new sfPropelPager('Npvacdisfrute', 10);
    $c = new Criteria();
    $c->addSelectColumn("'' as CODEMP");
    $c->addSelectColumn(NpvacdisfrutePeer::PERINI);
    $c->addSelectColumn(NpvacdisfrutePeer::PERFIN);
    $c->addSelectColumn("0 as DIASDISFUTAR");
    $c->addSelectColumn("0 as DIASDISFRUTADOS");
    $c->addSelectColumn("max(ID) as ID");
    $c->addGroupByColumn(NpvacdisfrutePeer::PERINI);
    $c->addGroupByColumn(NpvacdisfrutePeer::PERFIN);


    $c->addDescendingOrderByColumn(NpvacdisfrutePeer::PERINI);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();*/
  }

  public function executeEdit()
	{
		$this->npvacdisfrute = $this->getNpvacdisfruteOrCreate();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNpvacdisfruteFromRequest();

			$this->saveNpvacdisfrute($this->npvacdisfrute);

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('vachistorico_lote/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('vachistorico_lote/list');
			}
			else
			{
				$c = new Criteria();
				$c->add(NpvacdisfrutePeer::PERINI,$this->npvacdisfrute->getPerini());
				$rs = NpvacdisfrutePeer::doSelectOne($c);
				return $this->redirect('vachistorico_lote/edit?id='.$rs->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}

  protected function getNpvacdisfruteOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npvacdisfrute = new Npvacdisfrute();
	$this->arranos = $this->comboAnos();
	$this->arranom = $this->comboNominas();
      $this->configGrid( $npvacdisfrute->getPerini(),'0');
    }
    else
    {
      $npvacdisfrute = NpvacdisfrutePeer::retrieveByPk($this->getRequestParameter($id));
      $this->arranos = $this->comboAnos();
      $this->arranom = $this->comboNominas();
	$this->configGrid( $npvacdisfrute->getPerini(),'0');

      $this->forward404Unless($npvacdisfrute);
    }
    return $npvacdisfrute;
  }
  public function comboAnos()
  {

  $c = new Criteria();
  $c->add(NphojintPeer::FECING,NULL,Criteria::NOT_EQUAL);
  $c->addAscendingOrderByColumn(NphojintPeer::FECING);

  $objsNphojint = NphojintPeer::doSelect($c);

  $anodesde = 2500;

  foreach ($objsNphojint as $a)
  {
  	$fec = $a->getFecing();

      $anoemp = Herramientas::obtenerDiaMesOAno($fec,'Y-m-d','Y');

  	if ($anoemp < $anodesde)
  	{
	  $anodesde = $anoemp;
  	}

  }


    if ($anodesde)
    {

		$anohoy = Date('Y');
            $anoing = $anodesde;
		$anohasta = $anodesde + 1;
		$anofin   = (int)$anohoy - 1;

		$anoX = $anodesde;
		$arranos = array();
		$i = $anodesde;
		while (($anoX >= $anodesde) and ($anoX <= $anofin))
		{
		  $arranos[$anoX] = $anoX;
		  $anoX = $anoX + 1;
		  $i = $i + 1;
		}
     }

	return $arranos;
  }

    public function comboNominas()
  {

  $c = new Criteria();
  $obj = NpasinomcontPeer::doSelect($c);
  $nominas=array('0'=>'TODAS');
  foreach($obj as $reg)
  {
  	$nominas[$reg->getCodnom()]=$reg->getCodnom();
  }

	return $nominas;
  }

  public function configGrid($perini = null,$nomina)
    {

	   $arremp = Nomina::cargar_empleados_periodo($perini,$nomina);

		//$resp = Herramientas::BuscarDatos($SQL,&$per);
		$filas_arreglo=0;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(false);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Nphojint');
		$opciones->setName('a');
		$opciones->setAnchoGrid(600);
		$opciones->setTitulo('Conceptos');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Código del Trabajador');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codemp');
		$col1->setHTML('type="text" size="10" readonly=true');

		$col2 = new Columna('Nombres y Apellidos del Trabajador');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(true);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('nomemp');
		$col2->setHTML('type="text" size="50" readonly=true');

		$col3 = new Columna('Días a Disfrutar');
		$col3->setTipo(Columna::TEXTO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('diasdisfutar');
		$col3->setHTML('type="text" size="10"');
		$col3->setJScript('onBlur="javascript:event.keyCode=13; enternumero(event,this.id); calcular_dias(this.id);"');

		$col4 = new Columna('Días Disfrutados');
		$col4->setTipo(Columna::TEXTO);
		$col4->setEsGrabable(true);
		$col4->setAlineacionObjeto(Columna::CENTRO);
		$col4->setAlineacionContenido(Columna::CENTRO);
		$col4->setNombreCampo('diasdisfrutados');
		$col4->setHTML('type="text" size="10"');
		$col4->setJScript('onBlur="javascript:event.keyCode=13; enternumero(event,this.id); calcular_dias2(this.id);"');

		$col5 = new Columna('Días por Disfrutar');
		$col5->setTipo(Columna::TEXTO);
		$col5->setEsGrabable(true);
		$col5->setAlineacionObjeto(Columna::CENTRO);
		$col5->setAlineacionContenido(Columna::CENTRO);
		$col5->setNombreCampo('diaspdisfrutar');
		$col5->setHTML('type="text" size="10" readonly=true');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);
		$opciones->addColumna($col4);
		$opciones->addColumna($col5);

		// Se genera el arreglo de opciones necesario para generar el grid
		$this->obj = $opciones->getConfig($arremp);
    }



  protected function updateNpvacdisfruteFromRequest()
	{
		$npvacdisfrute = $this->getRequestParameter('npvacdisfrute');

		if (isset($npvacdisfrute['perini']))
		{
			$this->npvacdisfrute->setPerini($npvacdisfrute['perini']);
		}
		if (isset($npvacdisfrute['perfin']))
		{
			$this->npvacdisfrute->setPerfin($npvacdisfrute['perfin']);
		}
		if (isset($npvacdisfrute['codemp']))
		{
			$this->npvacdisfrute->setCodemp($npvacdisfrute['codemp']);
		}
		if (isset($npvacdisfrute['diasdisfutar']))
		{
			$this->npvacdisfrute->setDiasdisfutar($npvacdisfrute['diasdisfutar']);
    }
    if (isset($npvacdisfrute['diasdisfrutados']))
    {
      $this->npvacdisfrute->setDiasdisfrutados($npvacdisfrute['diasdisfrutados']);
    }
  }

  public function executeAjax()
	{
	 $perini = $this->getRequestParameter('perini');
	 $cajaperfin = $this->getRequestParameter('cajaperfin');
	 $nomina = $this->getRequestParameter('nomina');
	 //echo $perini; echo '-'.$cajaperfin; exit;

	 if ($this->getRequestParameter('ajax')=='1')
       {

         $anosiguiente = (int)$perini + 1;

	   $output = '[["'.$cajaperfin.'","'.$anosiguiente.'",""]]';

         $this->configGrid($perini,$nomina);

	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

       }

	}

  protected function saveNpvacdisfrute($npvacdisfrute)
     {
     	 $nomina = $this->getRequestParameter('npvacdisfrute_codnom');
     	 $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);

       Nomina::salvarNpvacdisfrute($npvacdisfrute,$grid,$nomina);
       //$npvacdisfrute->save();

     }


}
