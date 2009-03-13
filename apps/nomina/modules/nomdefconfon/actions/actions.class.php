<?php

/**
 * nomdefconfon actions.
 *
 * @package    siga
 * @subpackage nomdefconfon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefconfonActions extends autonomdefconfonActions
{

 protected function saveNpconfon($npconfon)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
	Nomina::salvarNomdefconfon($npconfon,$grid,$this->getRequestParameter('txtdeduccion'),$this->getRequestParameter('txtaportes'),$this->getRequestParameter('txtajudeduccion'),$this->getRequestParameter('txtajuaportes'));

  }

public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	    $dato="";
	    $existe="N";
		$c= new Criteria();
		$c->add(NpconfonPeer::CODNOM,$this->getRequestParameter('codigo'));
		$data= NpconfonPeer::doSelect($c);
		if (empty($data))
		{
		 $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
		 $this->configGrid($this->getRequestParameter('codigo'));
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""],["duplicado","'.$existe.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		}
		else
		{
		  $existe="S";
		  $this->configGrid();
		  $output = '[["duplicado","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
		  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		  return sfView::HEADER_ONLY;
		}

	  }
	  else if ($this->getRequestParameter('ajax')=='2')
	  {
	    $d= new Criteria();
		$d->add(NpdefcptPeer::CODCON,$this->getRequestParameter('codigo'));
		$resul=NpdefcptPeer::doSelectOne($d);
		if ($resul)
		{
		   $c = new Criteria();
           $c->addJoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
           $c->add(NpasiconnomPeer::CODNOM,$this->getRequestParameter('nomina'));
           $c->add(NpasiconnomPeer::CODCON,$this->getRequestParameter('codigo'));
		   if ($this->getRequestParameter('cat')=='0')
		   { $c->add(NpdefcptPeer::OPECON,'D');}
		   else if ($this->getRequestParameter('cat')=='2')
		   { $c->add(NpdefcptPeer::OPECON,'P',Criteria::NOT_EQUAL);}
		   else if ($this->getRequestParameter('cat')=='1' || $this->getRequestParameter('cat')=='3')
		   { $c->add(NpdefcptPeer::OPECON,'P');}
		   $data=NpdefcptPeer::doSelectOne($c);
			if ($data)
			{
			 $dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));
			 $existe='N';
			}
			else
			{
			 $dato="";
			 $existe='S';
			}
		}
		else
		{ $existe='SS'; $dato="";}

		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["existe","'.$existe.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	   return sfView::HEADER_ONLY;
	  }


	}

public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npconfon[codnom]'));
	    }
	}


public function executeEdit()
  {
  	$this->npconfon = $this->getNpconfonOrCreate();
  	$this->configGrid($this->npconfon->getCodnom());

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$this->npconfon->getCodnom());
	$c->add(NpconfonPeer::TIPCON,'D');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->deduccion=$resul->getCodcon();}else { $this->deduccion='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$this->npconfon->getCodnom());
	$c->add(NpconfonPeer::TIPCON,'A');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->aporte=$resul->getCodcon();}else { $this->aporte='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$this->npconfon->getCodnom());
	$c->add(NpconfonPeer::TIPCON,'J');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->ajudeduccion=$resul->getCodcon();}else { $this->ajudeduccion='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$this->npconfon->getCodnom());
	$c->add(NpconfonPeer::TIPCON,'U');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->ajuaporte=$resul->getCodcon();}else { $this->ajuaporte='';}


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpconfonFromRequest();

      $this->saveNpconfon($this->npconfon);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefconfon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefconfon/list');
      }
      else
      {
        return $this->redirect('nomdefconfon/edit?id='.$this->npconfon->getCodnom());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }




   public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npconfon/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 8);
    $c = new Criteria();
    $c->addJoin(NpconfonPeer::CODNOM,NpnominaPeer::CODNOM);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getNpconfonOrCreate($id = 'id', $nomina = 'nomina')
  {
    if (!$this->getRequestParameter($nomina))
    {
      $npconfon = new Npconfon();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpconfonPeer::CODNOM,$this->getRequestParameter($nomina));
  	  $npconfon = NpconfonPeer::doSelectOne($c);
      $this->forward404Unless($npconfon);
    }

    return $npconfon;
  }

  public function configGrid($codnom='')
	{

      $sql="Select coalesce((select (case when (tipcon='S') then 1 else 0 end) as check1
				 from  npconfon where codnom='".$codnom."' and a.codnom = codnom and codcon = a.codcon  ),0) as check, a.codcon as codcon ,b.nomcon as nomcon, 9 as id
				 from Npasiconnom a, npdefcpt b
				 where a.codnom='".$codnom."' and a.codcon=b.codcon order by a.codcon";

		$resp = Herramientas::BuscarDatos($sql,&$reg);

	    $opciones = new OpcionesGrid();
	    $opciones->setTabla('Npconfon');
        $opciones->setAnchoGrid(500);
        $opciones->setTitulo('Conceptos para el Calculo');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas(0);

        $col1 = new Columna('Marque');
	    $col1->setTipo(Columna::CHECK);
	    $col1->setEsGrabable(true);
	    $col1->setNombreCampo('check');
	    $col1->setHTML(' ');
	    $col1->setJScript('onClick="validar(this.id)"');

        $col2 = new Columna('Código');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('Codcon');
        $col2->setEsGrabable(true);
        $col2->setHTML('type="text" size="6" readonly=true');

	    $col3 = new Columna('Nombre del Concepto');
        $col3->setTipo(Columna::TEXTO);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setNombreCampo('Nomcon');
        $col3->setHTML('type="text" size="50" readonly=true');

        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);

        $this->obj = $opciones->getConfig($reg);

	}

public function executeDelete()
  {
    $c = new Criteria();
  	$c->add(NpconfonPeer::CODNOM,$this->getRequestParameter('nomina'));
    $this->npconfon = NpconfonPeer::doSelectOne($c);

    $this->forward404Unless($this->npconfon);

    try
    {
      $this->deleteNpconfon($this->npconfon);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npconfon. Make sure it does not have any associated items.');
      return $this->forward('nomdefconfon', 'list');
    }

    return $this->redirect('nomdefconfon/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->npconfon = $this->getNpconfonOrCreate();
    $this->updateNpconfonFromRequest();

    $this->labels = $this->getLabels();

    Herramientas::CargarDatosGrid($this,$this->obj);

    return sfView::SUCCESS;
  }

  protected function deleteNpconfon($npconfon)
  {
    $c = new Criteria();
  	$c->add(NpconfonPeer::CODNOM,$npconfon->getCodnom());
  	NpconfonPeer::doDelete($c);
  }

  protected function updateNpconfonFromRequest()
  {
    $npconfon = $this->getRequestParameter('npconfon');
    $this->configGrid($npconfon['codnom']);
	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$npconfon['codnom']);
	$c->add(NpconfonPeer::TIPCON,'D');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->deduccion=$resul->getCodcon();}else { $this->deduccion='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$npconfon['codnom']);
	$c->add(NpconfonPeer::TIPCON,'A');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->aporte=$resul->getCodcon();}else { $this->aporte='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$npconfon['codnom']);
	$c->add(NpconfonPeer::TIPCON,'J');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->ajudeduccion=$resul->getCodcon();}else { $this->ajudeduccion='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$npconfon['codnom']);
	$c->add(NpconfonPeer::TIPCON,'U');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->ajuaporte=$resul->getCodcon();}else { $this->ajuaporte='';}

    if (isset($npconfon['codnom']))
    {
      $this->npconfon->setCodnom($npconfon['codnom']);
    }
    if (isset($npconfon['codcon']))
    {
      $this->npconfon->setCodcon($npconfon['codcon']);
    }
    if (isset($npconfon['tipcon']))
    {
      $this->npconfon->setTipcon($npconfon['tipcon']);
    }
  }



}
