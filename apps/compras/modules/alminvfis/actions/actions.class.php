<?php

/**
 * alminvfis2 actions.
 *
 * @package    siga
 * @subpackage alminvfis
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class alminvfisActions extends autoalminvfisActions
{

  private $coderr = -1;

	  public function executeAjax()
	  {
		 $cajtexmos=$this->getRequestParameter('cajtexmos');
		 $cajtexcom=$this->getRequestParameter('cajtexcom');
		 $codigo=$this->getRequestParameter('codigo');
		 $this->ajax=1;
		 if ($this->getRequestParameter('ajax')=='1')
		 {
			 	$dato=Herramientas::getX('codart','Caregart','desart',trim($codigo));
			 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
			 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			 	 return sfView::HEADER_ONLY;

		 }else if ($this->getRequestParameter('ajax')=='2')
		 {
			 	$dato=Herramientas::getX('codalm','cadefalm','nomalm',trim($codigo));
			 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
			 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			 	 return sfView::HEADER_ONLY;

		 }else if ($this->getRequestParameter('ajax')=='3'){
		 	if ($this->getRequestParameter('fecinv')!=''){
			 	$dato=CadefalmPeer::getDesalmacen($this->getRequestParameter('codigo'));
			 	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
			 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

				$dateFormat = new sfDateFormat('es_VE');

				$fecinv = $dateFormat->format($this->getRequestParameter('fecinv'), 'i', $dateFormat->getInputPattern('d'));

				$this->configGrid($this->getRequestParameter('id'),$this->getRequestParameter('codigo'),$this->getRequestParameter('artdesde'),$this->getRequestParameter('arthasta'),$fecinv);
				$this->ajax=1;
		 	}
		 	else
		 	{
		 		$dato='';
		 		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
		 		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		 		$this->configGrid();
		 		$this->ajax=1;
		 	}
		 }
		else  if ($this->getRequestParameter('ajax')=='4')
			   {
			     $articulo=$this->getRequestParameter('articulo');
			     $almacen=$this->getRequestParameter('almacen');
			     $fecinv=$this->getRequestParameter('fecinv');
		   	     $fila=$this->getRequestParameter('fil');
		         $totalfilas=0;
			     $this->configGridAlmUbi($articulo,$almacen,&$totalfilas,$fecinv);
				 $this->ajax=2;

			     $output = '[["fila","'.$fila.'",""],["totalfilas","'.$totalfilas.'",""]]';
			     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			     //si total filas es igual a cero quiere decir que el almacen no tiene ubicaciones asociadas
			     if ($totalfilas==0) return sfView::HEADER_ONLY;

			   }
	  }


	  public function executeList()
	  {
	    $this->processSort();

	    $this->processFilters();

	    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cainvfis/filters');

	    // pager
	    $this->pager = new sfPropelPager('Cainvfis', 10);
	    $c = new Criteria();

	    $c->addSelectColumn(CainvfisPeer::FECINV);
	    $c->addSelectColumn(CainvfisPeer::CODALM);
	    $c->addSelectColumn("0 AS CODART");
	    $c->addSelectColumn("0 AS EXIACT");
	    $c->addSelectColumn("0 AS EXIACT2");
	     $c->addSelectColumn("0 AS CODUBI");
	    $c->addSelectColumn("0 AS ID");

	    $c->addGroupByColumn(CainvfisPeer::FECINV);
	    $c->addGroupByColumn(CainvfisPeer::CODALM);
	    $this->addSortCriteria($c);
	    $this->addFiltersCriteria($c);
	    $this->pager->setCriteria($c);
	    $this->pager->setPage($this->getRequestParameter('page', 1));
	    $this->pager->init();

	  }

   public function configGridAlmUbi($codart='',$codalm='',&$filas ,$fecinv="")
   {

     if ($fecinv=="")
	  {
	  	$fecinv=date('Y-m-d');
	  }


      $sql="select a.codalm, b.nomubi,coalesce((select c.exiact from cainvfisubi c where to_char(FecInv,'dd/mm/yyyy')='".$fecinv."'  and c.codart='".$codart."' and c.codalm='".$codalm."'  and c.codubi=a.codubi),0) as exiact," .
      		"coalesce((select c.exiact2 from cainvfisubi c where to_char(FecInv,'dd/mm/yyyy')='".$fecinv."'  and c.codart='".$codart."' and c.codalm='".$codalm."' and c.codubi=a.codubi),0) as exiact2," .
   		    "a.codubi,a.id
			FROM  caalmubi a,cadefubi b
			where a.codubi=b.codubi
			AND a.Codalm='".$codalm."' order by a.codubi";
	  $resp = Herramientas::BuscarDatos($sql,&$per);
	  $filas=count($per);

      $opciones = new OpcionesGrid();
      $opciones->setEliminar(false);
      $opciones->setTabla('Cainvfisubi');
      $opciones->setAnchoGrid(600);
	  $opciones->setAncho(600);
      $opciones->setTitulo('Existencia por Almacen y Ubicación');
      $opciones->setName('c');
      $opciones->setFilas(0);
      $opciones->setHTMLTotalFilas(' ');

      $col1 = new Columna('Cod. Ubicacion');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codubi');
      $col1->setHTML('type="text" size="10" readonly=true');

      $col2 = new Columna('Ubicación');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('nomubi');
      $col2->setHTML('type="text" size="50" readonly=true');

      $col3 = new Columna('Exi. Actual (1)');
      $col3->setTipo(Columna::MONTO);
      $col3->setEsGrabable(true);
      $col3->setAlineacionContenido(Columna::IZQUIERDA);
      $col3->setAlineacionObjeto(Columna::IZQUIERDA);
      $col3->setNombreCampo('Exiact');
      $col3->setEsNumerico(true);
      $col3->setHTML('type="text" size="10"');
      $col3->setJScript('onKeypress="entermonto_c(event,this.id)"');
      $col3->setEsTotal(true,'totalubi');

      $col4 = new Columna('Exi. Actual (2)');
      $col4->setTipo(Columna::MONTO);
      $col4->setEsGrabable(true);
      $col4->setAlineacionContenido(Columna::IZQUIERDA);
      $col4->setAlineacionObjeto(Columna::IZQUIERDA);
      $col4->setNombreCampo('Exiact2');
      $col4->setEsNumerico(true);
      $col4->setHTML('type="text" size="10"');
      $col4->setJScript('onKeypress="entermonto_c(event,this.id)"');
      $col4->setEsTotal(true,'totalubi2');

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $opciones->addColumna($col4);

      $this->objAlmUbi = $opciones->getConfig($per);
  }

  public function configGrid($id=' ',$codalm=' ',$artdesde=' ',$arthasta=' ',$fecinv='')
	{
			   $this->setVars();
				$c = new Criteria();
			    if (empty($fecinv))
			    {
			     	$fecinv=date('Y-m-d');
			    }

				$c->add(CainvfisPeer::FECINV,$fecinv);
				$c->add(CainvfisPeer::CODART, CainvfisPeer::CODART." between '{$artdesde}' AND '{$arthasta}'", Criteria::CUSTOM);
				$c->add(CainvfisPeer::CODALM,$codalm);
				$c->addJoin(CainvfisPeer::CODALM,CadefalmPeer::CODALM);
				$c->addJoin(CainvfisPeer::CODART,CaregartPeer::CODART);
				$c->addAscendingOrderByColumn(CainvfisPeer::CODART);

				$per = CainvfisPeer::doSelect($c);
				$this->param="Cainvfis";

				if (count($per)==0)
				{
					//print "11";
					//exit();

					$ci = new Criteria();
					$ci->add(CaregartPeer::TIPO,'A');
					$ci->addJoin(CaregartPeer::CODART, CaartalmPeer::CODART);
					$ci->add(CaartalmPeer::CODALM,$codalm);
				    $ci->add(CaregartPeer::CODART, CaregartPeer::CODART." between '{$artdesde}' AND '{$arthasta}' AND length(caregart.codart) >= '".$this->longitudarticulo."'", Criteria::CUSTOM);
					$ci->addAscendingOrderByColumn(CaregartPeer::CODART);

					$per = CaregartPeer::doSelect($ci);
					$this->param="Caregart";
				}




			$filas_arreglo=0;

			    $opciones = new OpcionesGrid();
		        $opciones->setTabla($this->param);
		        $opciones->setAnchoGrid(650);
		        $opciones->setAncho(600);
		        $opciones->setTitulo('Artículo por Almacen');
		        $opciones->setName('a');
		        $opciones->setHTMLTotalFilas(' ');
		        $opciones->setFilas($filas_arreglo);
		        $opciones->setEliminar(false);

		        // Se generan las columnas
		        $col1 = new Columna('Codigo Artículo');
		        $col1->setTipo(Columna::TEXTO);
		        $col1->setEsGrabable(true);
		        $col1->setAlineacionObjeto(Columna::CENTRO);
		        $col1->setAlineacionContenido(Columna::CENTRO);
		        $col1->setNombreCampo('Codart');
		        $col1->setHTML('type="text" size="15" readonly=true');

		        $col2 = new Columna('Descripción');
		        $col2->setTipo(Columna::TEXTAREA);
		        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
		        $col2->setAlineacionContenido(Columna::IZQUIERDA);
		        $col2->setNombreCampo('Desart');
		        $col2->setHTML('type="text" size="30x2" readonly=true');

		        $col3 = new Columna('Exist. Actual(1)');
		        $col3->setNombreCampo('Exiact');
		        $col3->setTipo(Columna::MONTO);
		        $col3->setEsNumerico(true);
		        $col3->setEsGrabable(true);
		        $col3->setAlineacionObjeto(Columna::DERECHA);
		        $col3->setAlineacionContenido(Columna::DERECHA);
		        $col3->setHTML('type="text" size=12');
		        $col3->setJScript('onKeypress="entermonto(event,this.id)" readonly=true');

		        $col4 = new Columna('Exist. Actual(2)');
		        $col4->setNombreCampo('Exiact2');
		        $col4->setTipo(Columna::MONTO);
		        $col4->setEsGrabable(true);
		        $col4->setEsNumerico(true);
		        $col4->setAlineacionObjeto(Columna::DERECHA);
		        $col4->setAlineacionContenido(Columna::DERECHA);
		        $col4->setHTML('type="text" size=10 ');
		        $col4->setJScript('onKeypress="entermonto(event,this.id)" readonly=true');

				$col5 = new Columna('Unid. Medida');
		        $col5->setTipo(Columna::TEXTO);
		        $col5->setAlineacionObjeto(Columna::CENTRO);
		        $col5->setAlineacionContenido(Columna::CENTRO);
		        $col5->setHTML('type="text" size=12 readonly=true');
		        $col5->setNombreCampo('Unimed');

		        $col6 = new Columna('Unid. Alterna');
		        $col6->setTipo(Columna::TEXTO);
		        $col6->setAlineacionObjeto(Columna::CENTRO);
		        $col6->setAlineacionContenido(Columna::CENTRO);
		        $col6->setHTML('type="text" size=12 readonly=true');
		        $col6->setNombreCampo('Unialter');

		        $col7 = new Columna('Ubicación');
		 	    $col7->setTipo(Columna::TEXTO);
			    $col7->setEsGrabable(false);
			    $col7->setAlineacionObjeto(Columna::CENTRO);
			    $col7->setAlineacionContenido(Columna::CENTRO);
			    $col7->setNombreCampo('anadir');
			    $col7->setHTML('type="text" size="1" style="border:none" class="imagenalmacen"');
			    $col7->setJScript('onClick="mostrar(this.id)"');

		   	    $col8 = new Columna('cadena_datos_ubicacion');
		        $col8->setTipo(Columna::TEXTO);
		        $col8->setEsGrabable(true);
		        $col8->setAlineacionObjeto(Columna::IZQUIERDA);
		        $col8->setAlineacionContenido(Columna::IZQUIERDA);
		        $col8->setNombreCampo('ubicacion');
		        $col8->setOculta(true);

		        $opciones->addColumna($col1);
		        $opciones->addColumna($col2);
		        $opciones->addColumna($col3);
		        $opciones->addColumna($col4);
		        $opciones->addColumna($col5);
		        $opciones->addColumna($col6);
		        $opciones->addColumna($col7);
		        $opciones->addColumna($col8);
		        $this->obj = $opciones->getConfig($per);
		}


	 protected function getCainvfisOrCreate($id = 'id', $codalm = 'codalm')
	  {
	    if (!$this->getRequestParameter($id))
	    {
	        $cainvfis = new Cainvfis();
       		$cainvfis_valor = $this->getRequestParameter('cainvfis');
	        $cainvfis = new Cainvfis();
			$dateFormat = new sfDateFormat('es_VE');
			if (!empty($cainvfis_valor['fecinv']))
			{
				$fecinv = $dateFormat->format($cainvfis_valor['fecinv'], 'i', $dateFormat->getInputPattern('d'));
			}else{
				$fecinv ="";
			}

		    //$this->configGrid($this->getRequestParameter('id'),$this->getRequestParameter('fecinv'),$this->getRequestParameter('cainvfis_artdesde'),$this->getRequestParameter('cainvfis_arthasta'));
		    $this->configGrid('',$cainvfis_valor['codalm'],$cainvfis_valor['artdesde'],$cainvfis_valor['arthasta'],$fecinv);
	    }
	    else
	    {
	    	$cainvfis_valor = $this->getRequestParameter('cainvfis');
	    	$dateFormat = new sfDateFormat('es_VE');
			if (!empty($cainvfis_valor['fecinv']))
			{
				$id= $dateFormat->format($cainvfis_valor['fecinv'], 'i', $dateFormat->getInputPattern('d'));
	    	}else{
	    		$id=$this->getRequestParameter($id);
	    	}
	    	if ($this->getRequestParameter($codalm)=="")
	    	    $codalmacen=$cainvfis_valor['codalm'];
	    	else
	    	    $codalmacen=$this->getRequestParameter($codalm);

	      $c = new Criteria();
	  	  $c->add(CainvfisPeer::FECINV,$id);
	  	  $c->add(CainvfisPeer::CODALM,$codalmacen);
	  	  $cainvfis = CainvfisPeer::doSelectOne($c);

          if ($cainvfis)
	      		$this->configGrid('',$cainvfis->getCodalm(),$cainvfis->getArtdesde(),$cainvfis->getArthasta(),$cainvfis->getFecinv());
	      else
	      		$this->configGrid();
	      //$this->configGrid('',$cainvfis_valor['codalm'],$cainvfis_valor['artdesde'],$cainvfis_valor['arthasta'],$fecinv);
	      $this->forward404Unless($cainvfis);
	    }

	    return $cainvfis;
	  }


	  public function executeEdit()
	  {

	    $this->cainvfis = $this->getCainvfisOrCreate();
	    $this->setVars();

	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateCainvfisFromRequest();

	      $this->saveCainvfis($this->cainvfis);

	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	    if ($this->coderr!=-1){
	    	$this->labels = $this->getLabels();
	    }else{

		      if ($this->getRequestParameter('save_and_add'))
		      {
		        return $this->redirect('alminvfis/create');
		      }
		      else if ($this->getRequestParameter('save_and_list'))
		      {
		        return $this->redirect('alminvfis/list');
		      }
		      else
		      {
		        return $this->redirect('alminvfis/edit?id='.$this->cainvfis->getFecinv().'&codalm='.$this->cainvfis->getCodalm());
		      }
	    	}
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }

	  public function executeEditborrar()
	  {
	    $this->cainvfis = $this->getCainvfisOrCreate();
	    $this->setVars();

	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateCainvfisFromRequest();

	      $this->saveCainvfis($this->cainvfis);

	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('alminvfis/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('alminvfis/list');
	      }
	      else
	      {
	        return $this->redirect('alminvfis/edit?id='.$this->cainvfis->getId());
	      }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }
	  }

	public function setVars()
	{
		$this->mascaraarticulo = Herramientas::ObtenerFormato('Cadefart','forart');
		$this->longitudarticulo=strlen($this->mascaraarticulo);
	}


	public function saveCainvfis($cainvfis) {
		$coderr = -1;
		$grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
		try {

			 $coderr = Articulos::salvarAlminvfis($cainvfis,$grid,$this->param);

			if (is_array($coderr)) {
				foreach ($coderr as $ERR) {
					$err = Herramientas :: obtenerMensajeError($ERR);
					$this->getRequest()->setError('', $err);
				}
			}
			elseif ($coderr != -1) {
				$err = Herramientas :: obtenerMensajeError($coderr);
				$this->getRequest()->setError('', $err);
			}

		} catch (Exception $ex) {

			$coderr = 0;
			$err = Herramientas :: obtenerMensajeError($coderr);
			$this->getRequest()->setError('', $err);
		}
	}


  public function handleErrorEdit()
  {
    $this->labels = $this->getLabels();

    $this->cainvfis= $this->getCainvfisOrCreate();
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    $this->setVars();


    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);
      }
    }
      return sfView::SUCCESS;

  }


  public function executeDelete()
  {
    $c = new Criteria();
    $c->add(CainvfisPeer::FECINV,$this->getRequestParameter('id'));
	$c->add(CainvfisPeer::CODALM,$this->getRequestParameter('codalm'));
    $datos=CainvfisPeer::doSelect($c);
    $id=0;
    try
    {
	    foreach ($datos as $arreglo)
	    {
        $id=$arreglo->getId();
	    $cri=new Criteria();
	    $cri->add(CainvfisubiPeer::CODART,$arreglo->getCodart());
        $cri->add(CainvfisubiPeer::CODALM,$arreglo->getCodalm());
        $cri->add(CainvfisubiPeer::FECINV,$this->getRequestParameter('id'));
        CainvfisubiPeer::doDelete($cri);
	    $arreglo->delete();
	    }
	    $this->SalvarBitacora($id ,'Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Cainvfis. Make sure it does not have any associated items.');
      return $this->forward('alminvfis', 'list');
    }

    return $this->redirect('alminvfis/list');
  }


}
