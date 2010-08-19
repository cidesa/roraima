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

        $col3 = clone $col1;
        $col3->setTitulo('Num. Lote');
       	$col3->setNombreCampo('numlot');
        $col3->setHTML('type="text" size="10" onBlur="ajaxlote(event,this.id)"');

        $col4 = new Columna('Fecha Venc.');
        $col4->setTipo(Columna::FECHA);
        $col4->setEsGrabable(true);
        $col4->setVacia(true);
        $col4->setNombreCampo('fecven');

        $col5 = new Columna('Existencia');
        $col5->setEsNumerico(true);
        $col5->setTipo(Columna::MONTO);
        $col5->setEsGrabable(true);
        $col5->setAlineacionContenido(Columna::IZQUIERDA);
        $col5->setAlineacionObjeto(Columna::IZQUIERDA);
        $col5->setNombreCampo('exist');
        $col5->setHTML('type="text" size="10" readonly=true');

        if ($tipaju == 'P') $col6 = new Columna('Cant. Solicitada');
        else if ($tipaju == 'NE') $col6 = new Columna('Cant. Entregada');
        else if ($tipaju == 'F')$col6 = new Columna('Cant. Facturada');
        else $col6 = new Columna('Cant. Solicitada');
        $col6->setTipo(Columna::MONTO);
        $col6->setEsGrabable(true);
        $col6->setAlineacionContenido(Columna::IZQUIERDA);
        $col6->setAlineacionObjeto(Columna::IZQUIERDA);
        $col6->setEsNumerico(true);
        $col6->setNombreCampo('canord');
        $col6->setHTML('type="text" size="10" readonly=true');

        $col7 = new Columna('Cant. Ajustar');
        $col7->setTipo(Columna::MONTO);
        $col7->setEsGrabable(true);
        $col7->setAlineacionContenido(Columna::IZQUIERDA);
        $col7->setAlineacionObjeto(Columna::IZQUIERDA);
        $col7->setEsNumerico(true);
        $col7->setNombreCampo('canaju');
        $col7->setHTML('type="text" size="10"');
        $col7->setJScript('onKeypress="cantidadaju(event,this.id)"');

        $col8 = clone $col6;
        $col8->setTitulo('Precio');
        $col8->setNombreCampo('preaju');
        $col8->setHTML('type="text" size="10" ');
        $col8->setJScript('onKeypress="cantidadaju(event,this.id)"');

        $col9 = clone $col6;
        $col9->setTitulo('Monto Ajuste');
       	$col9->setNombreCampo('monaju');
        $col9->setHTML('type="text" size="10" readonly=true');

        $col10 = clone $col6;
        $col10->setTitulo('Canlotreal');
        $col10->setNombreCampo('canlotreal');
        $col10->setHTML('type="text" size="10" readonly=true');

        $col11 = clone $col6;
        $col11->setTitulo('Canpuedoaju');
        $col11->setNombreCampo('canpuedaju');
        $col11->setHTML('type="text" size="10" readonly=true');

        $col12 = clone $col6;
        $col12->setTitulo('CanRealPed');
        $col12->setNombreCampo('canrealdes');
        $col12->setHTML('type="text" size="10" readonly=true');

        $col13 = clone $col6;
        $col13->setTitulo('CanRealPed');
        $col13->setNombreCampo('canrealdes');
        $col13->setHTML('type="text" size="10" readonly=true');

        $col14 = clone $col3;
        $col14->setTitulo('CaDistrib');
        $col14->setNombreCampo('candistrib');
        $col14->setHTML('type="text" size="10" readonly=true');

        $col15 = clone $col6;
        $col15->setTitulo('Tipo Articulo');
        $col15->setNombreCampo('tipo');
        $col15->setHTML('type="text" size="10" readonly=true');
        $col15->setOculta(true);

        $col16 = clone $col6;
        $col16->setTitulo('Precio Original');
        $col16->setNombreCampo('preart');
        $col16->setHTML('type="text" size="10" readonly=true');

        $col17 = clone $col6;
        $col17->setTitulo('Ajuste Precio');
        $col17->setNombreCampo('ajupre');
        $col17->setHTML('type="text" size="10" readonly=true');

        $col18 = clone $col6;
        $col18->setTitulo('Ajuste Recargo');
        $col18->setNombreCampo('recaju');
        $col18->setHTML('type="text" size="10" readonly=true');

        $col19 = clone $col6;
        $col19->setTitulo('Total Ajuste');
        $col19->setNombreCampo('montot');
        $col19->setHTML('type="text" size="10" readonly=true');
        $col19->setEsTotal(true,'faajuste_monaju');

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
        $opciones->addColumna($col16);
        $opciones->addColumna($col17);
        $opciones->addColumna($col18);
        $opciones->addColumna($col19);

	    // En genera el arreglo de opciones necesario para generar el grid
        $this->obj = $opciones->getConfig($reg);

  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {

    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $javascript="";
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
        // id de cajitas a modificar
        $col5=$this->getRequestParameter('colexist');
        $col7=$this->getRequestParameter('colum7');
        $col8=$this->getRequestParameter('precio');
        $col9=$this->getRequestParameter('montaju');
        $col11=$this->getRequestParameter('colpaju');
        $col12=$this->getRequestParameter('colrped');
        $col13=$this->getRequestParameter('colrdes');
        $col17=$this->getRequestParameter('difpreaju');
        $col18=$this->getRequestParameter('colrecc');
        $col19=$this->getRequestParameter('mtotal');


        $cantival=false;
        $cantaju=0;
        $existen=0;
        $colum11=0;
        $canrealped=0;
        $canrealdes=0;
        $canpuedoaju=0;
        $monaju=0;
        $ajurec=0;

        $precioreal=H::toFloat($this->getRequestParameter('precioreal')); //16
        $precioaju=H::toFloat($this->getRequestParameter('precioart')); //8

        if ($precioaju!=$precioreal)
        {
            $difpreaju=$precioreal-$precioaju;  //17
            $cantaju=H::tofloat($this->getRequestParameter('solicit')); //7
            $precioaju=$this->getRequestParameter('precioreal');
        }else {
            $difpreaju=$precioaju;
            $precioaju=$this->getRequestParameter('precioreal');
        }

        if (($difpreaju<0 && $this->getRequestParameter('tipo')=='DEBITO') || ($difpreaju>0 && $this->getRequestParameter('tipo')=='CREDITO'))
        {
            $difpreaju=$this->getRequestParameter('precioreal');
            $precioaju=$this->getRequestParameter('precioreal');
        }

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
             $cantival=Facturacion::chequearCantPedido($this->getRequestParameter('referencia'),$this->getRequestParameter('articuloaju'),$codigo,$this->getRequestParameter('solicit'),$this->getRequestParameter('valorcol7'),$precioaju,&$cantidadaju,&$canent);
          }else if ($this->getRequestParameter('tipref')=='NE'){
             $cantival=Facturacion::chequearCantNota($this->getRequestParameter('referencia'),$this->getRequestParameter('articuloaju'),$codigo,$this->getRequestParameter('solicit'),$this->getRequestParameter('tipref'),$this->getRequestParameter('canentart'),$this->getRequestParameter('valorcol7'),&$cantidadaju,&$canent,&$canrealped,&$canrealdes,&$canpuedoaju);
             $cantidadaju=0;
          }else{
            $cantival=true;
            $cantidadaju=0;
          }
          $colum11=$cantidadaju;
          if ($cantival)
          {
           if (H::tofloat($this->getRequestParameter('valorcol7'))>H::tofloat($this->getRequestParameter('solicit'))) //Ajuste por arriba
           {
           	 if ((H::tofloat($this->getRequestParameter('valorcol7')) <= $numlot) || (H::getX('CODART','Caregart','Tipo',$this->getRequestParameter('articuloaju'))=='S'))
           	 {
                   $rerec=Facturacion::ajusteRecargo($this->getRequestParameter('articuloaju'),$this->getRequestParameter('referencia'));
                   $producto=H::tofloat($this->getRequestParameter('valorcol7')) * H::tofloat($this->getRequestParameter('precioart'));
                   $monaju=number_format($producto,2,',','.');
                   $ajurec=number_format($producto*$rerec,2,',','.');
                   $cal=$producto +($producto*$rerec);
                   $total=number_format($cal,2,',','.');
                   if (H::tofloat($this->getRequestParameter('solicit'))>H::tofloat($this->getRequestParameter('valorcol7')))
                   {
                       $calculo=$numlot+H::tofloat($this->getRequestParameter('solicit'))-H::tofloat($this->getRequestParameter('valorcol7'));
                       $existen=number_format($calculo,2,',','.');
                   }else {
                       $calculo=$numlot-H::tofloat($this->getRequestParameter('valorcol7'))-H::tofloat($this->getRequestParameter('solicit'));
                       $existen=number_format($calculo,2,',','.');
                   }
           	 }else{
           	 	$javascript="alert('La cantidad del Ajuste excede la existencia del Lote');";
           	 	$catajuste=$numlot + H::tofloat($this->getRequestParameter('solicit'));
                        $cantaju=number_format($catajuste,2,',','.');
           	 	$producto=$catajuste * H::tofloat($this->getRequestParameter('precioart'));
                        $monaju=number_format($producto,2,',','.');
                $total=number_format($producto,2,',','.');
                        $existen='0,00';
           	 }
           }
           else
           {
           	 if (H::tofloat($this->getRequestParameter('valorcol7'))==H::tofloat($this->getRequestParameter('solicit')))
           	 {
                   $producto=H::tofloat($this->getRequestParameter('valorcol7')) * H::tofloat($this->getRequestParameter('precioart'));
                   $rerec=Facturacion::ajusteRecargo($this->getRequestParameter('articuloaju'),$this->getRequestParameter('referencia'));
                   $ajurec=number_format($producto*$rerec,2,',','.');
                   $cal=$producto +($producto*$rerec);
                   $total=number_format($cal,2,',','.');
                   $monaju=number_format($producto,2,',','.');
                   if ($this->getRequestParameter('tipref')=='NE'){
                       $diferencia=$numlot;
                       $existen=$diferencia;
           	 }
           	 }
           	 else
           	 {
           	   $cantaju=$this->getRequestParameter('valorcol7');
                   $producto=H::tofloat($this->getRequestParameter('valorcol7')) * H::tofloat($this->getRequestParameter('precioart'));
                   $rerec=Facturacion::ajusteRecargo($this->getRequestParameter('articuloaju'),$this->getRequestParameter('referencia'));
                   $ajurec=number_format($producto*$rerec,2,',','.');
                   $cal=$producto +($producto*$rerec);
                   $total=number_format($cal,2,',','.');
                   $monaju=number_format($producto,2,',','.');

                   if ($this->getRequestParameter('tipref')=='NE'){
                       $diferencia=$numlot+H::tofloat($this->getRequestParameter('solicit'))-H::tofloat($this->getRequestParameter('valorcol7'));
                       $existen=number_format($diferencia,2,',','.');
                   }else if ($this->getRequestParameter('tipref')=='F'){
                       $diferencia=H::tofloat($this->getRequestParameter('solicit'))-H::tofloat($this->getRequestParameter('valorcol7'));
                       $existen=number_format($diferencia,2,',','.');
           	 }
           }
           }
          }else{
        if ($cantidadaju==-1)
            {
              $javascript="alert('La Cantidad Ajustada es inferior a la Suma de las Notas de Entregas Emitidas para ese Pedido. Debe Ajustar Primero Las Notas de Entregas y Luego Ajustar el Pedido');";
          $cantaju="0,00";
          $monaju="0,00";
           	 	$total="0,00";
            }else{
            if ($cantidadaju==-2)
            	{
            		$javascript="alert('La Cantidad Ajustada no puede ser Igual a la Cantidad Solicitada la misma debe ser menor');";
                    $cantaju="0,00";
                    $monaju="0,00";
           	 	    $total="0,00";
            	}else{
                    if (($cantidadaju!=H::tofloat($this->getRequestParameter('valorcol7'))) && ($canent!=H::tofloat($this->getRequestParameter('valorcol7'))))
            		{
                      if ($this->getRequestParameter('tipref')=='NE'){
                      	$javascript="alert('No puede Ajustar por esa Cantidad. La misma debe ser mayor a $canent y menor o igual a $cantaju');";
                        $cantaju="0,00";
                        $monaju="0,00";
           	 	        $total="0,00";
                      }else{
                      	$javascript="alert('No puede Ajustar por esa Cantidad. La misma debe ser mayor o igual $canent y menor a $cantaju');";
                        $cantaju="0,00";
           	 	        $total="0,00";
                      }
            		}else{
                       $cantaju=$this->getRequestParameter('valorcol7');
                       $producto=H::tofloat($this->getRequestParameter('valorcol7')) * H::tofloat($this->getRequestParameter('precioart'));
                       $monaju=number_format($producto,2,',','.');
                       $total=$monaju;
            		}

            		if ($this->getRequestParameter('tipref')=='P') $canevaluar=H::tofloat($this->getRequestParameter('solicit'));
            		else if ($this->getRequestParameter('tipref')=='F') $canevaluar=H::tofloat($this->getRequestParameter('solicit'));
            		else $canevaluar=$numlot;


                    if ($cantidadaju!=-1 && $cantaju!=-2)
            		{
                      if ($cantidadaju>H::tofloat($this->getRequestParameter('solicit')))
            		  {
                        if ($cantidadaju<=$canevaluar)
                        {
                          $cantaju=number_format($cantidadaju,2,',','.');
                          $producto=H::tofloat($cantidadaju) * H::tofloat($this->getRequestParameter('precioart'));
                          $monaju=number_format($producto,2,',','.');
                          $total=$monaju;
                          if ($this->getRequestParameter('tipref')=='NE'){
                               $diferencia=$canevaluar-$cantidadaju;
                               $existen=number_format($diferencia,2,',','.');
                        }
                        }
                        else
                        {
                            $cantaju="0,00";
                            $monaju="0,00";
                            $total=$monaju;
                            $existen=number_format($numlot ,2,',','.');
                        }
            		  }else{
                            if (($cantidadaju!=H::tofloat($cantaju)) && ($canent!=H::tofloat($cantaju)))
            		  	{
                              if ($cantidadaju==H::tofloat($this->getRequestParameter('solicit')))
            		  	  {
                                    $cantaju=number_format($canent,2,',','.');
            		  	  }else{
                                    $cantaju="0,00";
            		  	  }
                              $producto=H::tofloat($cantaju) * H::tofloat($this->getRequestParameter('precioart'));
                              $monaju=number_format($producto,2,',','.');
                              $total=$monaju;
            		  	}else{
                              $cantaju=$cantaju;
                              $producto=H::tofloat($cantaju) * H::tofloat($this->getRequestParameter('precioart'));
                              $monaju=number_format($producto,2,',','.');
                              $total=$monaju;
            		  	}
                            if ($this->getRequestParameter('tipref')=='NE'){
                               $diferencia=H::tofloat($this->getRequestParameter('solicit'))-$cantidadaju;
                               $existen=number_format($diferencia,2,',','.');
            		  }
            		}
                    }

            	}
            }
          }

          $javascript=$javascript."actualizarsaldos();";
          $output = '[["'.$col5.'","'.$existen.'",""],["'.$col7.'","'.$cantaju.'",""],["'.$col8.'","'.$precioaju.'",""],["'.$col9.'","'.$monaju.'",""],["'.$col11.'","'.$colum11.'",""],["'.$col12.'","'.$canrealped.'",""],["'.$col13.'","'.$canrealdes.'",""],["'.$col17.'","'.$difpreaju.'",""],["'.$col18.'","'.$ajurec.'",""],["'.$col19.'","'.$total.'",""],["javascript","'.$javascript.'",""]]';
        }
       break;
      case '4':
        $valor7=H::toFloat($this->getRequestParameter('valor7'));
        $javascript=""; $dato4=""; $dato10=""; $dato5="";
        $col4=$this->getRequestParameter('col4');
        $col5=$this->getRequestParameter('col5');
        $col7=$this->getRequestParameter('col7');
        $col10=$this->getRequestParameter('col10');

        $t= new Criteria();
        $t->add(FadeflotPeer::NUMLOT,$codigo);
        $t->add(FadeflotPeer::CODART,$this->getRequestParameter('articulo'));
        $t->add(FadeflotPeer::CODALM,$this->getRequestParameter('almacen'));
        $result=FadeflotPeer::doSelectOne($t);
        if ($result)
        {
          $dato4=date('d/m/Y',strtotime($result->getFecven()));
          $dato10=$result->getCanlot();
          if ($valor7<=$result->getCanlot())
          {
            $resto=$result->getCanlot() - $valor7;
            $dato7=$this->getRequestParameter('valor7');
          }else {
              $javascript="alert('La Existencia del Lote no Cubre la Cantidad Total a  Entregar. Puede agregar otro Lote');";
              $resto=0;
              $dato7=$result->getCanlot();
          }
          $dato5=$resto;
        }else {
            $dato7=$this->getRequestParameter('valor6');
            $t= new Criteria();
            $t->add(FadeflotPeer::CODART,$this->getRequestParameter('articulo'));
            $t->add(FadeflotPeer::CODALM,$this->getRequestParameter('almacen'));
            $result2=FadeflotPeer::doSelectOne($t);
            if (!$result2)
                $javascript="alert('No Hay Existencia para ese Artículo en este Almacén');";
        }

        $output = '[["'.$col4.'","'.$dato4.'",""],["'.$col5.'","'.$dato5.'",""],["'.$col7.'","'.$dato7.'",""],["'.$col10.'","'.$dato10.'",""],["javascritp","'.$javascript.'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      	return sfView::HEADER_ONLY;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;

  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->faajuste = $this->getFaajusteOrCreate();
      try{ $this->updateFaajusteFromRequest();}
      catch (Exception $ex){}
	  $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      $cuantosart = 0;
      $cuantosaju = 0;
      $cuantosnumlot = 0;

	  $x=$grid[0];
      $j=0;
      while ($j<count($x))
      {
        if ($x[$j]->getCodart() == ""){
          $cuantosart++;
		}
         if ($x[$j]->getCanaju()!="")
         {
             if ($x[$j]->getCanaju()==0)
             {
                 $cuantosaju++;
             }
         }

         if ($this->getRequestParameter('faajuste[tipaju]')=='NE')
         {
            if ($x[$j]->getNumlot()=="")
            {
                $cuantosnumlot++;
            }
         }
         $j++;
      }
        if ($cuantosart!=0 && $cuantosart==count($x))
         {
           $this->coderror=1156;
        return false;
      }
         if ($cuantosaju!=0 && $cuantosaju==count($x))
         {
           $this->coderror=1156;
           return false;
         }
        if ($this->getRequestParameter('faajuste[tipaju]')=='NE') {
         if ($cuantosnumlot!=0 && $cuantosnumlot==count($x))
         {
           $this->coderror=1158;
           return false;
         }
        }

   	  return true;

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

  /**
   * Función para colocar el codigo necesario para 
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo 
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($faajuste)
  {
    Facturacion::eliminarFaajuste($faajuste);
    return -1;
  }


}
