<?php


/**
 * tesmovtraban actions.
 *
 * @package    Roraima
 * @subpackage tesmovtraban
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class tesmovtrabanActions extends autotesmovtrabanActions {

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit() {
	   $this->tsmovtra = $this->getTsmovtraOrCreate();
	   $this->etiqueta="";
	   $this->comprobaut="";
	   $varemp = $this->getUser()->getAttribute('configemp');
	   if ($varemp)
		if(array_key_exists('generales',$varemp))
  	   	  if(array_key_exists('comprobaut',$varemp['generales']))
		  {
		  	$this->comprobaut=$varemp['generales']['comprobaut'];
		  }
	   if ($this->tsmovtra->getId())
       {
        if ($this->tsmovtra->getStatus()=='N')
           if ($this->tsmovtra->getFecanu()!="")
           { $this->etiqueta="ANULADA EL ".date('d/m/Y',strtotime($this->tsmovtra->getFecanu()));}
           else { $this->etiqueta="ANULADA";}
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

	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateTsmovtraFromRequest() {
		$tsmovtra = $this->getRequestParameter('tsmovtra');
	    $this->comprobaut="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		 if(array_key_exists('generales',$varemp))
  	   	   if(array_key_exists('comprobaut',$varemp['generales']))
		   {
		  	$this->comprobaut=$varemp['generales']['comprobaut'];
		   }

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
       	$this->comprobaut="";
	    $varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('generales',$varemp))
  	   	  if(array_key_exists('comprobaut',$varemp['generales']))
		  {
		  	$this->comprobaut=$varemp['generales']['comprobaut'];
		  }
		   if ($this->comprobaut!='S') {
		   if ($tsmovtra2['tipmovdesd'] and ($tsmovtra2['tipmovhast'])) {

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
        $numcom = Comprobante::SalvarComprobante($numcom,$reftra,$feccom,$descom,$debito,$credito,$grid,$guardar);
			}
      $tsmovtra->setNumcom($numcom);
      $tsmovtra->save();
		   }
		   }
 	   Tesoreria :: Salvartesmovtraban($tsmovtra, $tsmovtra2['tipmovdesd'], $tsmovtra2['tipmovhast'],$this->comprobaut);

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

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
	$cajtexmos = $this->getRequestParameter('cajtexmos');
	$cajtexcom = $this->getRequestParameter('cajtexcom');
	if ($this->getRequestParameter('ajax') == '1')
	{
	 $dato = TsdefbanPeer :: getNomcue($this->getRequestParameter('codigo'));
	 $dato2 = TsdefbanPeer :: getCta_cont($this->getRequestParameter('codigo'));
   $montra = $this->getRequestParameter('montra');
   $fectra = $this->getRequestParameter('fectra');
   $error='';

   $contaba = ContabaPeer::doSelectOne(new Criteria());
   $saldo=0;
   $dateFormat = new sfDateFormat('es_VE');
   $fectra = $dateFormat->format($fectra, 'i', $dateFormat->getInputPattern('d'));
   if(!Tesoreria::chequear_disponibilidad_financiera($this->getRequestParameter('codigo'),$montra,$contaba->getFecini(),$fectra,$saldo)) $error= ',["javascript","alert(\'No Existe Disponibilidad Financiera para esta cuenta.\')",""]';

	 $output = '[["' . $cajtexmos . '","' . $dato . '",""],["' . $cajtexcom . '","' . $dato2 . '"]'.$error.']';


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
   $numcom = $this->getRequestParameter('numcom');
   if($numcom=='********') $numcom = '########';
	 $this->getUser()->setAttribute('numcomp', $numcom, $this->getUser()->getAttribute('formulario'));
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


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;
    $this->coderr1 =-1;



    if($this->getRequest()->getMethod() == sfRequest::POST){
      $this->tsmovtra = $this->getTsmovtraOrCreate();
      $this->etiqueta="";
      try{ $this->updateTsmovtraFromRequest();}catch(Exception $ex){}

      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('tsmovtra[fectra]'))==true)
  	  {
        $this->coderr1=529;
        return false;
  	  }
	   $this->comprobaut="";
	   $varemp = $this->getUser()->getAttribute('configemp');
	   if ($varemp)
		if(array_key_exists('generales',$varemp))
  	   	  if(array_key_exists('comprobaut',$varemp['generales']))
		  {
		  	$this->comprobaut=$varemp['generales']['comprobaut'];
		  }


      if($this->tsmovtra->getCtaori()==$this->tsmovtra->getCtades()) $this->coderr = 194;
      else{
        $contaba = ContabaPeer::doSelectOne(new Criteria());
        $saldo=0;
        if(!Tesoreria::chequear_disponibilidad_financiera($this->tsmovtra->getCtaori(),$this->tsmovtra->getMontra(),$contaba->getFecini(),$this->tsmovtra->getFectra(),$saldo)) $this->coderr = 195;
        else{
        	if ($this->comprobaut!='S') {
          $numcom = $this->getUser()->getAttribute('contabc[numcom]', null, $this->getUser()->getAttribute('formulario'));
          if (!$this->tsmovtra->getId() and $numcom=="") { $this->coderr = 508; return false;}
        	}
        }
      }

      if($this->coderr!=-1){
        return false;
      } else return true;

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
      if($this->coderr1!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderr1);
        $this->getRequest()->setError('tsmovtra{fectra}',$err);
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
  if(!$this->tsmovtra) $this->tsmovtra = new Tsmovtra();
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
    if($numcom=='********') $numcom='########';
    $this->mensaje="";
    $this->mensaje2="";
    if (Tesoreria::validaPeriodoCerrado($fecanu)==true)
   {
     $coderror=529;
     $this->mensaje2 = Herramientas::obtenerMensajeError($coderror);
   }
   else  {
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

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->tsmovtra = TsmovtraPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->tsmovtra);

    $id=$this->getRequestParameter('id');
   try
   {
   //Eliminan movimientos según libros
    $c= new Criteria();
    $c->add(TsmovlibPeer::NUMCUE,$this->tsmovtra->getCtaori());
    $c->add(TsmovlibPeer::REFLIB,$this->tsmovtra->getReftra());
    $c->add(TsmovlibPeer::TIPMOV,$this->tsmovtra->getTipmovhast());
    $resul1= TsmovlibPeer::doSelectOne($c);
    if ($resul1)
    {
      if ($resul1->getStacon()!="C")
      {
      	$resul1->delete();
      }
    }
    else
    {
    	$this->setFlash('notice','Movimiento Origen según Libro no pudo ser Eliminado');
    }

    $c= new Criteria();
    $c->add(TsmovlibPeer::NUMCUE,$this->tsmovtra->getCtades());
    $c->add(TsmovlibPeer::REFLIB,$this->tsmovtra->getReftra());
    $c->add(TsmovlibPeer::TIPMOV,$this->tsmovtra->getTipmovdesd());
    $resul2= TsmovlibPeer::doSelectOne($c);
    if ($resul2)
    {
      if ($resul2->getStacon()!="C")
      {
      	$resul2->delete();
      }
    }
    else
    {
    	$this->setFlash('notice','Movimiento Destino según Libro no pudo ser Eliminado');
    }
    //Se eliminan el comprobante
    $a= new Criteria();
    $a->add(ContabcPeer::NUMCOM,$this->tsmovtra->getNumcom());
    $a->add(ContabcPeer::FECCOM,$this->tsmovtra->getFectra());
    $reg1= ContabcPeer::doSelectOne($a);
    if ($reg1)
    {
      if ($reg1->getStacom()=='A')
      {
      	$this->setFlash('notice','El Comprobante ya esta Actualizado');
      }

      if ($reg1->getStacom()=='N')
      {
        $this->setFlash('notice','El Comprobante ya esta Anulado');
      }

      if ($reg1->getStacom()=='D')
      {
        $a= new Criteria();
	    $a->add(Contabc1Peer::NUMCOM,$this->tsmovtra->getNumcom());
	    $a->add(Contabc1Peer::FECCOM,$this->tsmovtra->getFectra());
	    Contabc1Peer::doDelete($a);

	    $reg1->delete();
      }
      $this->Bitacora('Elimino');
    }
    else
    {
      $this->setFlash('notice','El Comprobante no pudo ser Eliminado');
    }

    //Se eliminan los pagos
    $a= new Criteria();
    $a->add(CppagosPeer::REFPAG,$this->tsmovtra->getReftra());
    $reg2= CppagosPeer::doSelectOne($a);
    if ($reg2)
    {
      $a= new Criteria();
      $a->add(CpimppagPeer::REFPAG,$this->tsmovtra->getReftra());
      CpimppagPeer::doDelete($a);
      $reg2->delete();
    }

    Tesoreria::Actualiza_bancostra('A', 'D', $this->tsmovtra->getCtaori(), $this->tsmovtra->getMontra());
    Tesoreria::Actualiza_bancostra('A', 'C', $this->tsmovtra->getCtades(), $this->tsmovtra->getMontra());
    $this->tsmovtra->delete();
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Tsmovtra. Make sure it does not have any associated items.');
      return $this->forward('tesmovtraban', 'list');
    }

    return $this->redirect('tesmovtraban/list');
  }

}