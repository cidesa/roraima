<?php

/**
 * nomconceptossalariointegral actions.
 *
 * @package    siga
 * @subpackage nomconceptossalariointegral
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomconceptossalariointegralActions extends autonomconceptossalariointegralActions
{
  public $coderror=-1;


   public function executeEdit()
  {

    //$this->npconsalint = $this->getNpconsalintOrCreate();
    $this->npnomina = $this->getNpnominaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnominaFromRequest();

      $this->saveNpnomina($this->npnomina);

      //$this->Npnomina->setId(self::obtenerId($this->Npnomina->getCodnom(),$this->npconsalint->getCodcon()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomconceptossalariointegral/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomconceptossalariointegral/list');
      }
      else
      {
        return $this->redirect('nomconceptossalariointegral/edit?id='.$this->npnomina->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }

  /*  $this->configGridsi($this->npconsalint->getCodnom());
    $this->configGridno($this->npconsalint->getCodnom());
*/
  }


  protected function getNpnominaOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npnomina = new Npnomina();
      $this->configGridsi($this->getRequestParameter('Npnomina[codnom]'));
      $this->configGridno($this->getRequestParameter('Npnomina[codnom]'));
      $g = Herramientas::CargarDatosGrid($this,$this->obj,true);

    //print_r($g[0]); exit;
    }
    else
    {
      $npnomina = NpnominaPeer::retrieveByPk($this->getRequestParameter($id));
	  $this->configGridsi($npnomina->getCodnom());
	  $this->configGridno($npnomina->getCodnom());
      $this->forward404Unless($npnomina);
    }

    return $npnomina;
  }

    public function configGridsi($nomina='')
  {
			$sql = "select 1 as check, a.codcon as codcon, b.nomcon as nomcon, a.id as id
					from npconsalint a, npdefcpt b, npasiconnom c, npnomina d
					where a.codcon = b.codcon
							and b.codcon=c.codcon
							and c.codnom=d.codnom
					and a.codnom='".$nomina."' and c.codnom='".$nomina."' order by a.codcon";

            $resp = Herramientas::BuscarDatos($sql,&$per);
			$filas_arreglo=0;

			    $opciones = new OpcionesGrid();
		        $opciones->setTabla('Npconsalint');
		        $opciones->setAnchoGrid(450);
		        $opciones->setTitulo('Conceptos Asignados por Nómina');
		        $opciones->setName('a');
		        $opciones->setHTMLTotalFilas(' ');
		        $opciones->setFilas($filas_arreglo);
		        $opciones->setEliminar(false);

		        // Se generan las columnas
		        $col1 = new Columna('');
		        $col1->setTipo(Columna::CHECK);
		        $col1->setEsGrabable(true);
		        $col1->setNombreCampo('check');
		        $col1->setHTML(' ');
		        $col1->setJScript('');

		        $col2 = new Columna('Codigo Concepto');
		        $col2->setTipo(Columna::TEXTO);
		        $col2->setEsGrabable(true);
		        $col2->setAlineacionObjeto(Columna::CENTRO);
		        $col2->setAlineacionContenido(Columna::CENTRO);
		        $col2->setNombreCampo('Codcon');
		        $col2->setHTML('type="text" size="3" readonly=true' );

		        $col3 = new Columna('Nombre del Concepto');
		        $col3->setTipo(Columna::TEXTO);
		        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
		        $col3->setAlineacionContenido(Columna::IZQUIERDA);
		        $col3->setNombreCampo('Nomcon');
		        $col3->setHTML('type="text" size="30" readonly=true');

		        $opciones->addColumna($col1);
		        $opciones->addColumna($col2);
		        $opciones->addColumna($col3);
		        $this->obj = $opciones->getConfig($per);
		       // print_r($this->obj['datos']); exit;
		              $g = Herramientas::CargarDatosGrid($this,$this->obj,true);

    //print_r($g[0]); exit;
  }



  public function configGridno($nomina='')
  {
     $sqlbus="select codnom from npconsalint where codnom='".$nomina."'";

     if (Herramientas::BuscarDatos($sqlbus,&$arr))
     {
        $sql= "select 0 as check, a.codcon as codcon, a.nomcon as nomcon, a.id as id
				from npdefcpt a left outer join npconsalint b ON
				(a.codcon=b.codcon and b.codnom='".$nomina."'),npasiconnom c
				where b.codnom is null and opecon = 'A'
				and a.codcon=c.codcon and c.codnom='".$nomina."'  order by a.codcon";

     }
     else
     {
     	$sql= "select 0 as check, a.codcon as codcon, a.nomcon as nomcon, a.id as id
				from npdefcpt a ,npasiconnom c
				where opecon = 'A'
				and a.codcon=c.codcon and c.codnom='".$nomina."'  order by a.codcon";
     }


            $resp = Herramientas::BuscarDatos($sql,&$per);
			$filas_arreglo=0;

			    $opciones = new OpcionesGrid();
		        $opciones->setTabla('Npasiconnom');
		        $opciones->setAnchoGrid(450);
		        $opciones->setTitulo('Conceptos por Asignar');
		        $opciones->setName('b');
		        $opciones->setHTMLTotalFilas(' ');
		        $opciones->setFilas($filas_arreglo);
		        $opciones->setEliminar(false);

		        // Se generan las columnas
		        $col1 = new Columna('');
		        $col1->setTipo(Columna::CHECK);
		        $col1->setEsGrabable(true);
		        $col1->setNombreCampo('check');
		        $col1->setHTML(' ');
		        $col1->setJScript('');

		        $col2 = new Columna('Codigo Concepto');
		        $col2->setTipo(Columna::TEXTO);
		        $col2->setEsGrabable(true);
		        $col2->setAlineacionObjeto(Columna::CENTRO);
		        $col2->setAlineacionContenido(Columna::CENTRO);
		        $col2->setNombreCampo('Codcon');
		        $col2->setHTML('type="text" size="3" readonly=true' );

		        $col3 = new Columna('Nombre del Concepto');
		        $col3->setTipo(Columna::TEXTO);
		        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
		        $col3->setAlineacionContenido(Columna::IZQUIERDA);
		        $col3->setNombreCampo('Nomcon');
		        $col3->setHTML('type="text" size="30" readonly=true');

		        $opciones->addColumna($col1);
		        $opciones->addColumna($col2);
		        $opciones->addColumna($col3);
		        $this->obj2 = $opciones->getConfig($per);
  }


  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npnomina = $this->getNpnominaOrCreate();
    $this->updateNpnominaFromRequest();

    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('Npnomina{codcon}',$err);
      }
    }

    return sfView::SUCCESS;
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/Npnomina/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 20);
    $c = new Criteria();
    //$c->addJoin(NpconsalintPeer::CODNOM,NpnominaPeer::CODNOM);
    //$c->addJoin(NpconsalintPeer::CODCON,NpdefcptPeer::CODCON);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     $codigo=$this->getRequestParameter('codigo');

	  if ($this->getRequestParameter('ajax')=='1')
	  {
	  	$this->configGridsi($codigo);
	  	$this->configGridno($codigo);
	 	$dato=NpnominaPeer::getDesnom($codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	  }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    //return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npconsalint[codnom]'));
	    }
	}

  public function obtenerId($dato1,$dato2)
  {
  	$c= new Criteria();
  	$c->add(NpconsalintPeer::CODNOM,$dato1);
  	$c->add(NpconsalintPeer::CODCON,$dato2);
  	$resul= NpconsalintPeer::doSelectOne($c);
  	if ($resul)
  	{
  	  return $resul->getId();
  	}
  	else
  	{
  		return '';
  	}
  }


  protected function saveNpnomina($npnomina)
  { //print_r($this->obj); exit;
    $gridsi=Herramientas::CargarDatosGrid($this,$this->obj,true);//1
    $gridno=Herramientas::CargarDatosGrid($this,$this->obj2,true);//2
  	Nomina::salvarNpconsalint($npnomina->getCodnom(),$gridsi,$gridno);


  }

}
