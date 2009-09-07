<?php

/**
 * faajuste actions.
 *
 * @package    Roraima
 * @subpackage faajuste
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class faajusteActions extends autofaajusteActions
{
  private $coderror =-1;

   /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
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
				        $this->configGrid();
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
				        $this->configGrid();
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
	            $c = new Criteria();
	      		$c->add(FafacturPeer::REFFAC,$codigo);
	      		$datos = FafacturPeer::doSelectOne($c);
				if ($datos){
					if ($datos->getStatus() == 'N'){
		               $javascript = "alert('No puede hacer Ajustes sobre una Factura Anulado'); $('faajuste_codref').value='';";
				        $output = '[["javascript","'.$javascript.'",""]]';
				        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
				        $this->configGrid();
					}else{
						$codpro = $datos->getCodcli();
			  			$c2 = new Criteria();
			  			$c2->add(FaclientePeer::CODPRO, $codpro);
			  			$reg2 = FaclientePeer::doSelectOne($c2);
			  			if ($reg2){
							$rifpro = $reg2->getRifpro();
							$nompro = $reg2->getNompro();
							$dirpro = $reg2->getDirpro();
							$telpro = $reg2->getTelpro();

			  			}
                        $this->configGridDetalle('', $this->getRequestParameter('tipaju'), $codigo);

				  		$output = '[["faajuste_codpro","'.$codpro.'",""],["faajuste_rifpro","'.$rifpro.'",""],["faajuste_nompro","'.$nompro.'",""],["faajuste_dirpro","'.$dirpro.'",""],["faajuste_telpro","'.$telpro.'",""],["javascript","'.$javascript.'",""]]';
			         	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
						}

					}
					else{
		               $javascript = "alert('El número de Factura no existe'); $('faajuste_codref').value='';";
				        $output = '[["javascript","'.$javascript.'",""]]';
				        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
				        $this->configGrid();
					}
            }
		}

	}

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid(){
	$this->configGridDetalle($this->getRequestParameter('faajuste[refaju]'), $this->getRequestParameter('faajuste[tipaju]'), $this->getRequestParameter('faajuste[codref]'));
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetalle($nrodev = '', $tipaju = '', $codigo='')
  {

	   $reg = array();

	   if ($codigo!="")
	   {
	   		if ($tipaju == 'P'){ // Refiere a Pedido
		         $c= new Criteria();
		         $c->add(FaartpedPeer::NROPED,$codigo);
		         $reg= FaartpedPeer::doSelect($c);
	   		}
	   		else if ($tipaju == 'NE'){ // Refiere a Nota de Entrega
		         $c= new Criteria();
		         $c->add(FaartnotPeer::NRONOT,$codigo);
		         $reg= FaartnotPeer::doSelect($c);
	   		}
	   		else {  // Refiere a Factura
		         $c= new Criteria();
		         $c->add(FaartfacPeer::REFFAC,$codigo);
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
        $col2->setHTML('type="text" size="30x2" readonly=true');

        $col3 = new Columna('Cant. Solicitada');
        $col3->setTipo(Columna::MONTO);
        $col3->setEsGrabable(true);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setEsNumerico(true);
   		$col3->setNombreCampo('canord');
        $col3->setHTML('type="text" size="10" readonly=true');

        $col4 = new Columna('Cant. Ajustar');
        $col4->setTipo(Columna::MONTO);
        $col4->setEsGrabable(true);
        $col4->setAlineacionContenido(Columna::IZQUIERDA);
        $col4->setAlineacionObjeto(Columna::IZQUIERDA);
        $col4->setEsNumerico(true);
   		$col4->setNombreCampo('canaju');
        $col4->setHTML('type="text" size="10"');
        $col4->setJScript('onKeypress="cantidadaju(event,this.id)"');

        $col5 = clone $col3;
        $col5->setTitulo('Precio');
        $col5->setNombreCampo('preart');
        $col5->setHTML('type="text" size="10" readonly=true');

        $col6 = clone $col3;
        $col6->setTitulo('Monto Ajuste');
       	$col6->setNombreCampo('montot');
        $col6->setHTML('type="text" size="10" readonly=true');
        $col6->setEsTotal(true,'faajuste_monaju');

        $col7 = clone $col1;
        $col7->setTitulo('Num. Lote');
       	$col7->setNombreCampo('numlot');
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

	    // En genera el arreglo de opciones necesario para generar el grid
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
      case '3':
        if (H::tofloat($codigo)>0)
        {
          $canent=0;
          $c = new Criteria();
		  $c->add(EmpresaPeer::CODEMP,'001');
		  $reg = EmpresaPeer::doSelectone($c);
		  if ($reg)
		  	$numlot = $reg->getNumlot();

          if ($this->getRequestParameter('tipref')=='P')
          {
             $cantival=Facturacion::chequearCantPedido($this->getRequestParameter('referencia'),$this->getRequestParameter('articuloaju'),$codigo,$this->getRequestParameter('solicit'),&$cantaju);
          }else if ($this->getRequestParameter('tipref')=='NE'){
             $cantival=Facturacion::chequearCantNota($this->getRequestParameter('referencia'),$this->getRequestParameter('articuloaju'),$codigo,$this->getRequestParameter('solicit'),$this->getRequestParameter('tipref'),$this->getRequestParameter('canentart'),&$cantaju,&$canent);
          }else{

          }
          $canpuedoaju=$cantaju;
          if ($cantival)
          {
           if (H::tofloat($codigo)>H::tofloat($this->getRequestParameter('solicit')))
           {
           	 if (H::tofloat($codigo) <= $numlot || H::getX('CODART','Caregart','Tipo',$this->getRequestParameter('articuloaju'))=='S')
           	 {
           	   $catajuste=$codigo;
               $producto=H::tofloat($codigo) * H::tofloat($this->getRequestParameter('precioart'));
               $total=number_format($producto,2,',','.');
           	 }else{
           	 	$javascript="alert('La cantidad del Ajuste excede la existncia del Lote');";
           	 	$catajuste=$numlot + H::tofloat($this->getRequestParameter('solicit'));
           	 	$producto=$catajuste * H::tofloat($this->getRequestParameter('precioart'));
                $total=number_format($producto,2,',','.');
           	 }
           }
           else
           {
           	 if (H::tofloat($codigo)==H::tofloat($this->getRequestParameter('solicit')))
           	 {
           	 	$javascript="alert('La Cantidad del Ajuste no puede ser igual a la Cantidad Solicitada');";
           	 	$catajuste="0,00";
           	 	$total="0,00";

           	 }
           	 else
           	 {
           	 	$catajuste=$codigo;
               $producto=H::tofloat($codigo) * H::tofloat($this->getRequestParameter('precioart'));
               $total=number_format($producto,2,',','.');
           	 }
           }
          }else{
            if ($cantaju==-1)
            {
              $javascript="alert('La Cantidad Ajustada es inferior a la Suma de las Notas de Entregas Emitidas para ese Pedido. Debe Ajustar Primero Las Notas de Entregas y Luego Ajustar el Pedido');";
              $catajuste="0,00";
           	 	$total="0,00";
            }else{
            	if ($cantaju==-2)
            	{
            		$javascript="alert('La Cantidad Ajustada no puede ser Igual a la Cantidad Solicitada la misma debe ser menor');";
            		$catajuste="0,00";
           	 	    $total="0,00";
            	}else{
            		if (($cantaju!=H::tofloat($codigo)) && ($canent!=H::tofloat($codigo)))
            		{
                      if ($this->getRequestParameter('tipref')=='NE'){
                      	$javascript="alert('No puede Ajustar por esa Cantidad. La misma debe ser mayor a $canent y menor o igual a $cantaju');";
                      	$catajuste="0,00";
           	 	        $total="0,00";
                      }else{
                      	$javascript="alert('No puede Ajustar por esa Cantidad. La misma debe ser mayor o igual $canent y menor a $cantaju');";
                      	$catajuste="0,00";
           	 	        $total="0,00";
                      }
            		}else{
            	       $catajuste=$codigo;
                       $producto=H::tofloat($codigo) * H::tofloat($this->getRequestParameter('precioart'));
                       $total=number_format($producto,2,',','.');
            		}
            	}
            }
          }

          $javascript=$javascript."actualizarsaldos();";
          $output = '[["javascript","'.$javascript.'",""],["'.$this->getRequestParameter('cantaju').'","'.$catajuste.'",""],["'.$this->getRequestParameter('mtotal').'","'.$total.'",""]]';
        }
       break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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
	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);
	  $cantconcero = 0;
	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
		if ($x[$j]->getCanaju() == 0){
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
