<?php


/**
 * tesmovtraban actions.
 *
 * @package    siga
 * @subpackage tesmovtraban
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class tesmovtrabanActions extends autotesmovtrabanActions {

	public function executeEdit() {
	   $this->tsmovtra = $this->getTsmovtraOrCreate();
	   $this->etiqueta="";
	   if ($this->tsmovtra->getId())
       {
        if ($this->tsmovtra->getStatus()=='N')
           if ($this->tsmovtra->getFecanu()!="")
           { $this->etiqueta="ANULADA EL ".date('d/m/Y',strtotime($this->tsmovtra->getFecanu()));}
           else { $this->etiqueta="ANULADA";}
       } else {
       	$c = new Criteria();
      $datos = CpdefnivPeer::doSelectOne($c);
      if ($datos){
   		$corcomcont = (int)$datos->getCorcomcont() + 1;
   		$cadcorcomcont = str_pad((string)$corcomcont, 8, "0", STR_PAD_LEFT);;
   		$valido = false;
   		while(!$valido){
   			$c2 = new Criteria();
	   		$c2->add(ContabcPeer::NUMCOM,$cadcorcomcont);
	   		$contabc = ContabcPeer::doSelectOne($c2);
	   		if($contabc){
	   			$corcomcont++;
	   			$cadcorcomcont = str_pad((string)$corcomcont, 8, "0", STR_PAD_LEFT);
	   		}
	   		else {
	   			$valido = true;
	   		}
   		}
   	  }
   	  else $cadcorcomcont = "00000000";
   	  $this->tsmovtra->setNumcom($cadcorcomcont);
       }

		if ($this->getRequest()->getMethod() == sfRequest :: POST) {
			$this->updateTsmovtraFromRequest();

			$this->saveTsmovtra($this->tsmovtra);

            $this->tsmovtra->setId(Herramientas::getX_vacio('reftra','tsmovtra','id',$this->tsmovtra->getReftra()));

			$this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');


			if ($this->getRequestParameter('save_and_add')) {
				return $this->redirect('tesmovtraban/create');
			} else
				if ($this->getRequestParameter('save_and_list')) {
					return $this->redirect('tesmovtraban/list');
				} else {
					return $this->redirect('tesmovtraban/edit?id=' . $this->tsmovtra->getId());
				}
		} else {
			$this->labels = $this->getLabels();
		}
	}

	protected function updateTsmovtraFromRequest() {
		$tsmovtra = $this->getRequestParameter('tsmovtra');

		if (isset ($tsmovtra['reftra'])) {
			$this->tsmovtra->setReftra($tsmovtra['reftra']);
		}
		if (isset ($tsmovtra['fectra'])) {
			if ($tsmovtra['fectra']) {
				try {
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($tsmovtra['fectra'])) {
						$value = $dateFormat->format($tsmovtra['fectra'], 'i', $dateFormat->getInputPattern('d'));
					} else {
						$value_array = $tsmovtra['fectra'];
						$value = $value_array['year'] . '-' . $value_array['month'] . '-' . $value_array['day'] . (isset ($value_array['hour']) ? ' ' . $value_array['hour'] . ':' . $value_array['minute'] . (isset ($value_array['second']) ? ':' . $value_array['second'] : '') : '');
					}
					$this->tsmovtra->setFectra($value);
				} catch (sfException $e) {
					// not a date
				}
			} else {
				$this->tsmovtra->setFectra(null);
			}
		}
		if (isset ($tsmovtra['destra'])) {
			$this->tsmovtra->setDestra($tsmovtra['destra']);
		}
		if (isset ($tsmovtra['ctaori'])) {
			$this->tsmovtra->setCtaori($tsmovtra['ctaori']);
		}
		if (isset ($tsmovtra['nombancodesde'])) {
			$this->tsmovtra->setNombancodesde($tsmovtra['nombancodesde']);
		}
		if (isset ($tsmovtra['ctades'])) {
			$this->tsmovtra->setCtades($tsmovtra['ctades']);
		}
		if (isset($tsmovtra['ctacon_ori']))
	    {
	      $this->tsmovtra->setCtaconOri($tsmovtra['ctacon_ori']);
	    }
	    if (isset($tsmovtra['ctacon_des']))
	    {
	      $this->tsmovtra->setCtaconDes($tsmovtra['ctacon_des']);
	    }
		if (isset ($tsmovtra['nombancohasta'])) {
			$this->tsmovtra->setNombancohasta($tsmovtra['nombancohasta']);
		}
		//print $tsmovtra['tipmovdesd'];
		/*if (isset($tsmovtra['tipmovdesd']))
		{
		  $this->tsmovtra->setTipmovdesd($tsmovtra['tipmovdesd']);
		}
		/*if (isset($tsmovtra['destipmovdeb']))
		{
		  $this->tsmovtra->setDestipmovdeb($tsmovtra['destipmovdeb']);
		}
		if (isset($tsmovtra['tipmovhast']))
		{
		  $this->tsmovtra->setTipmovhast($tsmovtra['tipmovhast']);
		}
		if (isset($tsmovtra['destipmovcre']))
		{
		  $this->tsmovtra->setDestipmovcre($tsmovtra['destipmovcre']);
		}*/
		if (isset ($tsmovtra['montra'])) {
			$this->tsmovtra->setMontra($tsmovtra['montra']);
		}
		if (isset ($tsmovtra['numcom'])) {
			$this->tsmovtra->setNumcom($tsmovtra['numcom']);
		}
		/*if (isset($tsmovtra['desnumcom']))
		{
		  $this->tsmovtra->setDesnumcom($tsmovtra['desnumcom']);
		}
		if (isset($tsmovtra['fectracon']))
		{
		  $this->tsmovtra->setFectracon($tsmovtra['fectracon']);
		}*/
		/*if (isset($tsmovtra['idrefer']))
		{
		  $this->tsmovtra->setIdrefer($tsmovtra['idrefer']);
		}*/
		if ($this->tsmovtra->getStatus()=="") $this->tsmovtra->setStatus('A');
	}

	protected function saveTsmovtra($tsmovtra) {
		$modifica="N";
		if ($tsmovtra->getId())
		   $modifica="S";
		else
		{
		  $numcom = $this->getUser()->getAttribute('contabc[numcom]', null, $this->getUser()->getAttribute('formulario'));
		  if ($numcom!="") $tsmovtra->setNumcom($numcom);
		}
		$tsmovtra->save();
		$tsmovtra2 = $this->getRequestParameter('tsmovtra');
       if ($modifica=="N")
       {
		if ($tsmovtra2['tipmovdesd'] and ($tsmovtra2['tipmovhast'])) {
			Tesoreria :: Salvartesmovtraban($tsmovtra, $tsmovtra2['tipmovdesd'], $tsmovtra2['tipmovhast']);
			if ($this->getUser()->getAttribute('grabar', null, $this->getUser()->getAttribute('formulario')) != 'S') {
				//obtengo las sessiones
				$grid = $this->getUser()->getAttribute('grid', null, $this->getUser()->getAttribute('formulario'));
				$numcom = $this->getUser()->getAttribute('contabc[numcom]', null, $this->getUser()->getAttribute('formulario'));
				$reftra = $this->getUser()->getAttribute('contabc[reftra]', null, $this->getUser()->getAttribute('formulario'));
				$feccom = $this->getUser()->getAttribute('contabc[feccom]', null, $this->getUser()->getAttribute('formulario'));
				$descom = $this->getUser()->getAttribute('contabc[descom]', null, $this->getUser()->getAttribute('formulario'));
				$debito = $this->getUser()->getAttribute('debito', null, $this->getUser()->getAttribute('formulario'));
				$credito = $this->getUser()->getAttribute('credito', null, $this->getUser()->getAttribute('formulario'));
				$guardar = $this->getUser()->getAttribute('grabar', null, $this->getUser()->getAttribute('formulario'));
				//elimino las sessiones
				$this->getUser()->getAttributeHolder()->remove('formulario');
				$this->getUser()->getAttributeHolder()->remove('grabar');
				$this->getUser()->getAttributeHolder()->remove('grid');
				$this->getUser()->getAttributeHolder()->remove('contabc_descom');
				$this->getUser()->getAttributeHolder()->remove('contabc_feccom');
				$this->getUser()->getAttributeHolder()->remove('contabc_numcom');
				$this->getUser()->getAttributeHolder()->remove('debito');
				$this->getUser()->getAttributeHolder()->remove('credito');
				// guardo el grid
				Tesoreria :: Salvarconfincomgen($numcom, $reftra, $feccom, $descom, $debito, $credito);
				Tesoreria :: Salvar_asientosconfincomgen($numcom, $reftra, $feccom, $grid, $guardar);
			}
		}
       }//if ($modifica=="N")
	}

	protected function deleteTsmovtra($tsmovtra) {
		Tesoreria :: Eliminar_confincomgen($tsmovtra);
	}

	protected function getTsmovtraOrCreate($id = 'id') {
		if (!$this->getRequestParameter($id)) {
			$this->new = false;
			$tsmovtra = new Tsmovtra();
		} else {
			$this->new = true;
			$tsmovtra = TsmovtraPeer :: retrieveByPk($this->getRequestParameter($id));

			$this->forward404Unless($tsmovtra);
		}

		return $tsmovtra;
	}

  public function executeAjax()
  {
	$cajtexmos = $this->getRequestParameter('cajtexmos');
	$cajtexcom = $this->getRequestParameter('cajtexcom');
	if ($this->getRequestParameter('ajax') == '1')
	{
	 $dato = TsdefbanPeer :: getNomcue($this->getRequestParameter('codigo'));
	 $dato2 = TsdefbanPeer :: getCta_cont($this->getRequestParameter('codigo'));
	 $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $cajtexcom . '","' . $dato2 . '"]]';
	}else if ($this->getRequestParameter('ajax') == '2')
	{
	 $dato = TstipmovPeer :: getMovimiento($this->getRequestParameter('codigo'));
	 $output = '[["' . $cajtexmos . '","' . $dato . '",""]]';
	}else if ($this->getRequestParameter('ajax') == '3')
	{
	 $this->getUser()->getAttributeHolder()->remove('formulario');
	 $this->getUser()->setAttribute('formulario', $this->getRequestParameter('formulario'));
	 $this->LlenarAttribute('grabar', $this->getUser()->getAttribute('formulario'));
	 $this->LlenarAttribute('reftra', $this->getUser()->getAttribute('formulario'));
	 $this->getUser()->getAttributeHolder()->remove('numcomp');
	 $this->getUser()->setAttribute('numcomp', $this->getRequestParameter('numcom'), $this->getUser()->getAttribute('formulario'));
	 $this->LlenarAttribute('fectra', $this->getUser()->getAttribute('formulario'));
	 $this->LlenarAttribute('destra', $this->getUser()->getAttribute('formulario'));
	 $this->LlenarAttribute('ctas', $this->getUser()->getAttribute('formulario'));
	 $this->LlenarAttribute('tipmov', $this->getUser()->getAttribute('formulario'));
	 $this->LlenarAttribute('mov', $this->getUser()->getAttribute('formulario'));
	 $montos=split("_",$this->getRequestParameter('montos'));
	 $monto1=str_replace(".","",$montos[0]);
	 $monto1=str_replace(",",".",$monto1);
	 $monto2=str_replace(".","",$montos[1]);
	 $monto2=str_replace(",",".",$monto2);
	 $monto=$monto1.'_'.$monto2;
	 $this->getUser()->getAttributeHolder()->remove('montos');
	 $this->getUser()->setAttribute('montos',$monto,$this->getUser()->getAttribute('formulario'));
     return sfView :: HEADER_ONLY;
	}
	  $this->getResponse()->setHttpHeader("X-JSON", '(' . $output . ')');
	  return sfView :: HEADER_ONLY;
   }

	public function LlenarAttribute($nombre, $nombreformulario) {
		$this->getUser()->getAttributeHolder()->remove($nombre);
		$this->getUser()->setAttribute($nombre, $this->getRequestParameter($nombre), $nombreformulario);
	}

	public function executeAutocomplete() {
		if ($this->getRequestParameter('ajax') == '1') {
			$this->tags = Herramientas :: autocompleteAjax('NUMCUE', 'Tsdefban', 'Numcue', $this->getRequestParameter('tsmovtra[ctaori]'));
		} else
			if ($this->getRequestParameter('ajax') == '2') {
				$this->tags = Herramientas :: autocompleteAjax('NUMCUE', 'Tsdefban', 'Numcue', $this->getRequestParameter('tsmovtra[ctades]'));
			}
			 else
			if ($this->getRequestParameter('ajax') == '3') {
				$this->tags = Herramientas :: autocompleteAjax('CODTIP', 'Tstipmov', 'Codtip', $this->getRequestParameter('tsmovtra[tipmovdesd]'));
			}
			 else
			if ($this->getRequestParameter('ajax') == '4') {
				$this->tags = Herramientas :: autocompleteAjax('CODTIP', 'Tstipmov', 'Codtip', $this->getRequestParameter('tsmovtra[tipmovhast]'));
			}

	}


  public function validateEdit()
  {
    $this->coderr =-1;



    if($this->getRequest()->getMethod() == sfRequest::POST){
      $this->tsmovtra = $this->getTsmovtraOrCreate();
      $this->etiqueta="";
      try{ $this->updateTsmovtraFromRequest();}catch(Exception $ex){}

      $numcom = $this->getUser()->getAttribute('contabc[numcom]', null, $this->getUser()->getAttribute('formulario'));
      if (!$this->tsmovtra->getId() and $numcom=="") { $this->coderr = 508; return false;}

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->tsmovtra = $this->getTsmovtraOrCreate();
    $this->etiqueta="";
    try{ $this->updateTsmovtraFromRequest();}catch(Exception $ex){}

    $this->labels = $this->getLabels();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderr!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr);
        $this->getRequest()->setError('',$err);

      }
    }
    return sfView::SUCCESS;
  }


  public function executeAnular()
  {
	$obj1=$this->getRequestParameter('obj1');
	$c = new Criteria();
	$c->add(TsmovtraPeer::REFTRA,$obj1);
	$this->tsmovtra = TsmovtraPeer::doSelectOne($c);
	sfView::SUCCESS;
  }

  public function executeSalvaranu()
  {
  	$reftra=$this->getRequestParameter('reftra');
  	$reftra2=$this->getRequestParameter('reftra2');
  	$monto=$this->getRequestParameter('monto');
  	$destra=$this->getRequestParameter('destra');
  	$ctaori=$this->getRequestParameter('ctaori');
  	$ctades=$this->getRequestParameter('ctades');
  	$fecanu=$this->getRequestParameter('fecanu');
  	$movdeb=$this->getRequestParameter('movdeb');
  	$movcre=$this->getRequestParameter('movcre');
  	$numcom=$this->getRequestParameter('numcom');
    $this->mensaje="";
    //verificar si el movimiento segun libro asociado a la transferencia no esta conciliado
     $c= new Criteria();
   	 $c->add(TsmovlibPeer::NUMCUE,$ctaori);
   	 $c->add(TsmovlibPeer::REFLIB,$reftra);
   	 $c->add(TsmovlibPeer::TIPMOV,$movcre);
   	 $resul=TsmovlibPeer::doSelectOne($c);

   	 if ($resul)
   	 {
       if ($resul->getStacon()=='C')
       {
            $this->mensaje="El Movimiento esta Conciliado, No puede ser anulado";
       }
     }//if ($resul)

     $c= new Criteria();
   	 $c->add(TsmovlibPeer::NUMCUE,$ctades);
   	 $c->add(TsmovlibPeer::REFLIB,$reftra);
   	 $c->add(TsmovlibPeer::TIPMOV,$movdeb);
   	 $resul=TsmovlibPeer::doSelectOne($c);
   	 if ($resul)
   	 {
       if ($resul->getStacon()=='C')
       {
            $this->mensaje="El Movimiento esta Conciliado, No puede ser anulado";
       }
     }//if ($resul)
    if ( $this->mensaje=="")
    {
	    $dateFormat = new sfDateFormat('es_VE');
	    $fec1 = $dateFormat->format($fecanu, 'i', $dateFormat->getInputPattern('d'));
	  	$c= new Criteria();
	  	$c->add(TsmovtraPeer::REFTRA,$reftra);
	  	$resul=TsmovtraPeer::doSelectOne($c);
	  	if ($resul)
	  	{
	  	  $comprobante=$resul->getNumcom();
	      $resul->setFecanu($fec1);
	      $resul->setStatus('N');
	      $resul->save();
	      Tesoreria::anularMovLibro($ctaori,$reftra,$movcre,$reftra2,$fecanu,$destra,$monto);
	      Tesoreria::anularMovLibro($ctades,$reftra,$movdeb,$reftra2,$fecanu,$destra,$monto);
	      Tesoreria::reversarComprobante($comprobante,$fecanu);
  	     }
    }// if ( $this->mensaje=="")
  }


}