<?php

/**
 * faajuste actions.
 *
 * @package    siga
 * @subpackage faajuste
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class faajusteActions extends autofaajusteActions
{
  private $coderror =-1;

   public function executeEdit()
  {
    $this->faajuste = $this->getFaajusteOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFaajusteFromRequest();

      $this->saveFaajuste($this->faajuste);

      $this->faajuste->setId(Herramientas::getX_vacio('REFAJU','faajuste','id',$this->faajuste->getRefaju()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

 	  if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('faajuste/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('faajuste/list');
      }
      else
      {
        return $this->redirect('faajuste/edit?id='.$this->faajuste->getId());
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function getFaajusteOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $faajuste = new Faajuste();
      $this->configGridDetalle('', $this->getRequestParameter('faajuste[tipaju]'), $this->getRequestParameter('faajuste[codref]'));
    }
    else
    {
      $faajuste = FaajustePeer::retrieveByPk($this->getRequestParameter($id));
	  $this->configGridDetalle($faajuste->getRefaju(),'');
      $this->forward404Unless($faajuste);

    }

    return $faajuste;
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','Codalm',$this->getRequestParameter('fadevolu[codalm]'));
      }
  }

  public function executeGrid(){
  	$javascript = '';
	if ($this->getRequestParameter('codigo')!=""){
		if ($this->getRequestParameter('ajax')=='1'){
			$codpro = '';
			$rifpro = '';
			$nompro = '';
			$dirpro = '';
			$telpro = '';

            $codigo=str_pad($this->getRequestParameter('codigo'), 8 , '0','STR_PAD_LEFT');
            if ($this->getRequestParameter('tipaju') == 'P'){

	            $c = new Criteria();
	      		$c->add(FapedidoPeer::NROPED,$codigo);
	      		$datos = FapedidoPeer::doSelectOne($c);
	      		if ($datos)
	      		{
	      			if ($datos->getStatus() == 'A'){
						 $encontrado = false;

						 $sql = "select distinct(reffac) from faartfac where codref = '" . $codigo . "' and " .
						 		"reffac in (select reffac from fafactur where tipref = 'P' and status = 'A')";
						 if (Herramientas :: BuscarDatos($sql, & $resul)) {
							if ($resul){
								foreach ($resul as $r){
									$encontrado = true;
								}
				                $javascript = "alert('No puede hacer Ajustar un pedido facturado'); $('faajuste_codref').value='';";
						        $output = '[["javascript","'.$javascript.'",""]]';
						        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
							}
						 }
						if (!$encontrado){
			      			$codpro = $datos->getCodcli();
					  		if ($codpro != ''){
					  			$c2 = new Criteria();
					  			$c2->add(FaclientePeer::CODPRO, $codpro);
					  			$reg2 = FaclientePeer::doSelectOne($c);
					  			if ($reg2){
									$rifpro = $reg2->getRifpro();
									$nompro = $reg2->getNompro();
									$dirpro = $reg2->getDirpro();
									$telpro = $reg2->getTelpro();
					  			}
					  		}
					  		$this->configGridDetalle('', $this->getRequestParameter('tipaju'), $codigo);

				            $output = '[["faajuste_codpro","'.$codpro.'",""],["faajuste_rifpro","'.$rifpro.'",""],["faajuste_nompro","'.$nompro.'",""],["faajuste_dirpro","'.$dirpro.'",""],["faajuste_telpro","'.$telpro.'",""],["javascript","'.$javascript.'",""]]';
				         	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
				            //return sfView::HEADER_ONLY;
						}
	      			}
	      			else{
		                $javascript = "alert('No puede hacer Ajustes sobre un Pedido Anulado'); $('faajuste_codref').value='';";
				        $output = '[["javascript","'.$javascript.'",""]]';
				        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	      			}
	      		}
	      		else
	      		{//no existe el pedido
	                $javascript = "alert('El número de Pedido no existe'); $('faajuste_codref').value='';";
			        $output = '[["javascript","'.$javascript.'",""]]';
			        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			        $this->configGrid();

	      		}

            }
            else if ($this->getRequestParameter('tipaju') == 'NE'){
	            $c = new Criteria();
	      		$c->add(FanotentPeer::NRONOT,$codigo);
	      		$datos = FanotentPeer::doSelectOne($c);
	      		if ($datos)
	      		{
	      			if ($datos->getStatus() == 'A'){
		      			$codpro = $datos->getCodcli();
				  		if ($codpro != ''){
				  			$c2 = new Criteria();
				  			$c2->add(FaclientePeer::CODPRO, $codpro);
				  			$reg2 = FaclientePeer::doSelectOne($c);
				  			if ($reg2){
								$rifpro = $reg2->getRifpro();
								$nompro = $reg2->getNompro();
								$dirpro = $reg2->getDirpro();
								$telpro = $reg2->getTelpro();

				  			}

				  		}
				  		$this->configGridDetalle('', $this->getRequestParameter('tipaju'), $codigo);

        				$dato=CadefalmPeer::getDesalmacen($datos->getCodalm());

			            $output = '[["faajuste_codpro","'.$codpro.'",""],["faajuste_rifpro","'.$rifpro.'",""],["faajuste_nompro","'.$nompro.'",""],["faajuste_dirpro","'.$dirpro.'",""],["faajuste_telpro","'.$telpro.'",""],["javascript","'.$javascript.'",""],["faajuste_codalm","'.$datos->getCodalm().'",""],["faajuste_nomalm","'.$dato.'",""]]';
			         	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			            //return sfView::HEADER_ONLY;
	      			}
	      			else{
		                $javascript = "alert('No puede hacer Ajustes sobre una Nota de Entrega Anulada'); $('faajuste_codref').value='';";
				        $output = '[["javascript","'.$javascript.'",""]]';
				        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	      			}
	      		}
	      		else
	      		{//no existe la Nota de Entrga
	                $javascript = "alert('El número de Nota de Entrega no existe');";
			        $output = '[["javascript","'.$javascript.'",""]]';
			        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
			        $this->configGrid();
	      		}

            }else{

            }
		}

	}

  }

  public function configGrid(){
	$this->configGridDetalle($this->getRequestParameter('faajuste[refaju]'), $this->getRequestParameter('faajuste[tipaju]'), $this->getRequestParameter('faajuste[codref]'));
  }

  public function configGridDetalle($nrodev = '', $tipaju = '', $codigo='')
  {

	   $reg = array();

	   if ($codigo!="")
	   {
	   		if ($tipaju == 'P'){
		         $c= new Criteria();
		         $c->add(FaartpedPeer::NROPED,$codigo);
		         $reg= FaartpedPeer::doSelect($c);
	   		}
	   		else if ($tipaju == 'NE'){
		         $c= new Criteria();
		         $c->add(FaartnotPeer::NRONOT,$codigo);
		         $reg= FaartnotPeer::doSelect($c);
	   		}
	   		else if ($tipaju == 'F'){
		         $c= new Criteria();
		         $c->add(FaartfacPeer::NRONOT,$codigo);
		         $reg= FaartfacPeer::doSelect($c);
	   		}
	   }
	   else{
	   	 if ($nrodev != ''){
		     $c= new Criteria();
		     $c->add(FamovajuPeer::REFAJU,$nrodev);
		     $reg= FamovajuPeer::doSelect($c);
	   	 }
	   }

	    // Se crea el objeto principal de la clase OpcionesGrid
	    $opciones = new OpcionesGrid();
	    // Se configuran las opciones globales del Grid
        $opciones->setEliminar(false);
	    if ($codigo!=""){
	   		if ($tipaju == 'P'){
		         $opciones->setTabla('Faartped');
	   		}
	   		else if ($tipaju == 'NE'){
		         $opciones->setTabla('Faartnot');
	   		}
	   		else if ($tipaju == 'F'){
		         $opciones->setTabla('Faartfac');
	   		}
	    }
        else{
        	$opciones->setTabla('Famovaju');
        }
        $opciones->setAnchoGrid(900);
        $opciones->setAncho(900);
        $opciones->setTitulo('Detalle del Ajuste');
        $opciones->setFilas(30);
        $opciones->setHTMLTotalFilas(' ');

        // Se generan las columnas
        $col1 = new Columna('Cod. Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('codart');
        $col1->setHTML('type="text" size="10" readonly=true');

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTAREA);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('desart');
        $col2->setHTML('type="text" size="30x1" readonly=true');

        $col3 = new Columna('Cant. Solicitada');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setEsNumerico(true);
   		$col3->setNombreCampo('cansol');
        $col3->setHTML('type="text" size="10" readonly=true');

        $col4 = new Columna('Cant. Entregar');
        $col4->setTipo(Columna::MONTO);
        $col4->setEsGrabable(true);
        $col4->setAlineacionContenido(Columna::IZQUIERDA);
        $col4->setAlineacionObjeto(Columna::IZQUIERDA);
        $col4->setEsNumerico(true);
   		$col4->setNombreCampo('canentregar');
        $col4->setHTML('type="text" size="10" readonly=true');
        $col4->setHTML('onBlur=Cantidad(this.id);');
		if ($nrodev != ''){
			$col4->setOculta(true);
		}

        $col5 = clone $col3;
        $col5->setTitulo('Cant. Ajustada');
        $col5->setNombreCampo('canajustada');
        $col5->setHTML('type="text" size="10" readonly=true');

        $col6 = clone $col3;
        $col6->setTitulo('Total');
       	$col6->setNombreCampo('montot');
        $col6->setHTML('type="text" size="10" readonly=true');
        $col6->setEsTotal(true,'fadevolu_mondev');

        $col7 = clone $col3;
        $col7->setTitulo('Costo');
        $col7->setNombreCampo('preart');
        $col7->setHTML('type="text" size="10" readonly=true');
        $col7->setOculta(true);

        // Se guardan las columnas en el objetos de opciones
        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);
        $opciones->addColumna($col4);
        $opciones->addColumna($col5);
        $opciones->addColumna($col6);
        $opciones->addColumna($col7);
	    // Ee genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($reg);

  }

  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    switch ($ajax){
      case '1':
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      case '2':
        $dato=CadefalmPeer::getDesalmacen($codigo);
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","6","c"]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      	return sfView::HEADER_ONLY;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;

  }


  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->faajuste = $this->getFaajusteOrCreate();

      try{ $this->updateFaajusteFromRequest();}
      catch (Exception $ex){}
	  //$this->configGrid();

	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);
	  $cantconcero = 0;
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		if ($x[$j]->getCanentregar() == 0){
			$cantconcero = $cantconcero + 1;
		}
         $j++;
      } //while ($j<count($x))
      if (count($x) == $cantconcero){
        $this->coderror=1135;
        return false;
      }

   	  return true;

    }else return true;
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->faajuste = $this->getFaajusteOrCreate();
    try{
    $this->updateFaajusteFromRequest();
    }
    catch(Exception $ex){}
	//$grid2=Herramientas::CargarDatosGrid($this,$this->obj);
    $this->labels = $this->getLabels();
	$this->configGrid();
 	if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('',$err);
      }

    return sfView::SUCCESS;
  }

  protected function saveFaajuste($faajuste)
  {
    if ($faajuste->getId())
    {
      $faajuste->save();

    }
    else //nuevo
    {
  	  $grid2=Herramientas::CargarDatosGrid($this,$this->obj);
	  Facturacion::salvarFaajuste($faajuste,$grid2);
    }
    return -1;
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
