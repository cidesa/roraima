<?php

/**
 * licprebas actions.
 *
 * @package    Roraima
 * @subpackage licprebas
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 42318 2011-02-03 13:54:25Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class licprebasActions extends autolicprebasActions
{
  public  $coderror1=-1;
  public  $coderror2=-1;
  public  $coderror3=-1;
  public  $codigo1=-1;
  public  $codigo2=-1;
  public  $codigo3=-1;
  public $codeerror=-1;
  public $razonvacia=-1;
  public $salvarrecar=-1;
  public $detallevacia=-1;
  public  $coderror=-1;
  public  $fecper=-1;
  public  $fecperfis=-1;






  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST && $this->getRequestParameter('modifi')=='S')
    {
      $this->liprebas = $this->getLiprebasOrCreate();
      try{ $this->updateLiprebasFromRequest();}
      catch (Exception $ex){}

		      $this->configGridDetalle();		      
		      $this->configGridRazon();
		      $grid = Herramientas::CargarDatosGrid($this,$this->obj);		      
		      $grid3 = Herramientas::CargarDatosGrid($this,$this->obj3);
		      if (!Herramientas::validarPeriodoPresuesto($this->liprebas->getFecreq()))
		      {
		       $this->fecper=142;
		       return false;
		      }

		      if (!Herramientas::validarPeriodoFiscal($this->liprebas->getFecreq()))
		      {
		        $this->fecperfis=143;
		        return false;
		      }
		      if (count($grid[0])==0)
		      {
		      	$this->detallevacia=128;
		      	return false;
		      }

			  //Validad Unidad Responsable
			  $this->catbnubica="";
			    $varemp = $this->getUser()->getAttribute('configemp');
			    if ($varemp)
				if(array_key_exists('aplicacion',$varemp))
				 if(array_key_exists('licitaciones',$varemp['aplicacion']))
				   if(array_key_exists('modulos',$varemp['aplicacion']['licitaciones']))
				     if(array_key_exists('licprebas',$varemp['aplicacion']['licitaciones']['modulos'])){
				       if(array_key_exists('catbnubica',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
				       {
				       	$this->catbnubica=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['catbnubica'];
				       }
			         }
		      if ($this->catbnubica=='S')
		      {
		      	$p= new Criteria();
		      	$p->add(BnubicaPeer::CODUBI,$this->getRequestParameter('liprebas[unires]'));
		      	$reg= BnubicaPeer::doSelectOne($p);
		      	if (!$reg) {
		      	$this->razonvacia=127;
		      	return false;
		      	}
		      }else {
		      	$p= new Criteria();
		      	$p->add(NpcatprePeer::CODCAT,$this->getRequestParameter('liprebas[unires]'));
		      	$reg= NpcatprePeer::doSelectOne($p);
		      	if (!$reg) {
		      	$this->razonvacia=127;
		      	return false;
		      	}
		      }

                      $x=$grid[0];
                        $j=0;

                        while ($j<count($x))
                        {
                          if ($x[$j]->getCodart()!='' && $x[$j]->getCanreq()==0)
                          {
                            $this->codeerror=826;
                           return false;
                          }
                          $j++;
                        }
                       

		   $t= new Criteria();
		   $result= CadefartPeer::doSelectOne($t);
		   if ($result) {

		     if($result->getPrcasopre()=='S' && $result->getPrcreqapr()!='S') {
		      if (count($grid[0])!=0 || count($grid2[0])!=0)
		      {
		      PrespuestoBase::validarAlmsolegr($this->liprebas,$grid,$grid2,$this->getRequestParameter('id'),$this->getRequestParameter('tiporecarg'),&$msj1,&$cod1,&$msj2,&$cod2,&$msj3,&$cod3);
		      $this->coderror1=$msj1;
		      $this->coderror2=$msj2;
		      $this->coderror3=$msj3;
		      $this->codigo1=$cod1;
		      $this->codigo2=$cod2;
		      $this->codigo3=$cod3;
		      if ($this->coderror1<>-1 || $this->coderror2<>-1 || $this->coderror3<>-1)
		      {
		       return false;
		      }

		      PrespuestoBase::ultimoChequeo2($this->liprebas,$grid,$grid2,$this->getRequestParameter('id'),$this->getRequestParameter('tiporecarg'),&$msj1,&$cod1,&$msj2,&$cod2);
		      $this->coderror1=$msj1;
		      $this->coderror2=$msj2;
		      $this->codigo1=$cod1;
		      $this->codigo2=$cod2;
		      if ($this->coderror1<>-1 || $this->coderror2<>-1)
		      {
		       return false;
		      }else return true;
		      }
		     }else return true;
		   }else return true;
    }else return true;
   }

  public function executeCreate()
  {
    $c= new Criteria();
    $monedas=TsdesmonPeer::doSelectOne($c);
    if (!$monedas)
    {
      $this->getRequest()->setError('valida', 'Debe definir al menos un Tipo de Moneda.');
      return $this->forward('licprebas', 'list');
    }
    $d= new Criteria();
    $tipfin=FortipfinPeer::doSelectOne($d);
    if (!$tipfin)
    {
      $this->getRequest()->setError('valida', 'Debe definir al menos un Tipo de Finaciamiento.');
      return $this->forward('licprebas', 'list');
    }
    $e= new Criteria();
    $defart=CadefartPeer::doSelectOne($e);
    if ($defart)
    {
    	if ($defart->getPrcasopre()=='S')
    	{
    	  if ($defart->getTipdocpre()=="")
    	  {
    	  	$this->getRequest()->setError('valida', 'Debe definir el Tipo de Documento de Precompromiso al Presupuesto Base.');
            return $this->forward('licprebas', 'list');
    	  }
    	}
    }

    return $this->forward('licprebas', 'edit');
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
    {
      $this->liprebas = $this->getLiprebasOrCreate();
      $this->moneda= Herramientas::cargarMoneda();
      $this->listatipo = Constantes::ListaTipoCompra();
      $this->setVars();

      $this->configGridDetalle();  $this->configGridRazon();


      if ($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->updateLiprebasFromRequest();
		$save = $this->saveLiprebas($this->liprebas);
        if ($save==-1)
        {
	        $this->liprebas->setId(Herramientas::getX_vacio('reqart','liprebas','id',$this->liprebas->getReqart()));

	        $this->setFlash('notice', 'Your modifications have been saved');

	        $this->Bitacora('Guardo');

	         
	        if ($this->getRequestParameter('save_and_add'))
	        {
	          return $this->redirect('licprebas/create');
	        }
	        else if ($this->getRequestParameter('save_and_list'))
	        {
	          return $this->redirect('licprebas/list');
	        }
	        else
	        {
	          return $this->redirect('licprebas/edit?id='.$this->liprebas->getId());
	        }
       } else if ($save==-11){

	        $this->setFlash('notice', 'Se ha guardado solamente la Descripcion ya que la solicitud tiene asociada una Orden de Compra.');
	        $this->Bitacora('Guardo');

	        if ($this->getRequestParameter('save_and_add'))
	        {
	          return $this->redirect('licprebas/create');
	        }
	        else if ($this->getRequestParameter('save_and_list'))
	        {
	          return $this->redirect('licprebas/list');
	        }
	        else
	        {
	          return $this->redirect('licprebas/edit?id='.$this->liprebas->getId());
	        }

       }else{

          $this->labels = $this->getLabels();
          $err = Herramientas::obtenerMensajeError($this->coderror);
       	  $this->getRequest()->setError('',$err);
          return sfView::SUCCESS;
       }
      }
      else
      {
        $this->labels = $this->getLabels();
    //    $this->getUser()->getAttributeHolder()->remove('presiono','licprebas');
      }
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
      $this->liprebas = $this->getLiprebasOrCreate();

      try{
      	$this->updateLiprebasFromRequest();
      	}
      catch (Exception $ex){}

      $this->setVars();
      $this->configGridDetalle();      
      $this->configGridRazon();
      Herramientas::CargarDatosGrid($this,$this->obj);
      Herramientas::CargarDatosGrid($this,$this->obj2);
      Herramientas::CargarDatosGrid($this,$this->obj3);


      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        if($this->coderror1!=-1)
        {
         $err = Herramientas::obtenerMensajeError($this->coderror1);
         $this->getRequest()->setError('',$err.'  ->  '.$this->codigo1);
        }

        if($this->coderror2!=-1)
        {
         $err1 = Herramientas::obtenerMensajeError($this->coderror2);
         $this->getRequest()->setError('',$err1.'  del Articulo  '.$this->codigo2);
        }

        if($this->coderror3!=-1)
        {
         $err2 = Herramientas::obtenerMensajeError($this->coderror3);
         $this->getRequest()->setError('',$err2.'  ->  '.$this->codigo3);
        }

        if($this->codeerror!=-1)
        {
         $err3 = Herramientas::obtenerMensajeError($this->codeerror);
         $this->getRequest()->setError('',$err3);
        }

        if($this->razonvacia!=-1)
        {
         $err4 = Herramientas::obtenerMensajeError($this->razonvacia);
         $this->getRequest()->setError('liprebas{unires}',$err4);
        }

        if($this->detallevacia!=-1)
        {
         $err5 = Herramientas::obtenerMensajeError($this->detallevacia);
         $this->getRequest()->setError('',$err5);
        }
        if($this->salvarrecar!=-1)
        {
         $err5 = Herramientas::obtenerMensajeError($this->salvarrecar);
         $this->getRequest()->setError('',$err5);
        }
        if($this->fecper!=-1)
        {
         $err6 = Herramientas::obtenerMensajeError($this->fecper);
         $this->getRequest()->setError('liprebas{fecreq}',$err6);
        }
        if($this->fecperfis!=-1)
        {
         $err7 = Herramientas::obtenerMensajeError($this->fecperfis);
         $this->getRequest()->setError('liprebas{fecreq}',$err7);
        }
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
  protected function saveLiprebas($liprebas)
    {
      
	      $grid=Herramientas::CargarDatosGrid($this,$this->obj);
	      $grid2=Herramientas::CargarDatosGrid($this,$this->obj2);
	      $grid3=Herramientas::CargarDatosGrid($this,$this->obj3);

	  	// Si en el parametro reqreqapr  de Cadefart, no requiere que la requisicion esta aprobada para despacharla
	  	// entonces de una vez grabo la requisicion como aprobada
	  	 if ($this->autoriza_solicutud_egreso=="") $liprebas->setAprreq('S');

	      if (PresupuestoBase::salvarAlmsolegr($liprebas,$grid,$grid2,$grid3,$this->getRequestParameter('generapre'),&$error))
	       {
	       	$this->coderror=$error;
	       	return $this->coderror;
	       }
	       else
	       {
	       	$this->coderror=$error;
	       	return $this->coderror;
	       }
     

   }

    protected function deleteLiprebas($liprebas)
    {
       PrespuestoBase::eliminarAlmsolegr($liprebas);
    }

    /**
   * Función principal para procesar la eliminación de registros
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->liprebas = LiprebasPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->liprebas);

    try
    {
      $this->deleteLiprebas($this->liprebas);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Liprebas. Make sure it does not have any associated items.');
      return $this->forward('licprebas', 'list');
    }

    return $this->redirect('licprebas/list');
  }

  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateLiprebasFromRequest()
    {
      $liprebas = $this->getRequestParameter('liprebas');
      $this->moneda = Herramientas::cargarMoneda();
      $this->listatipo = Constantes::ListaTipoCompra();
      $this->configGridDetalle(); $this->configGridRazon();

      if (isset($liprebas['reqart']))
      {
        $this->liprebas->setReqart($liprebas['reqart']);
      }
      if (isset($liprebas['fecreq']))
      {
        if ($liprebas['fecreq'])
        {
          try
          {
            $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                                if (!is_array($liprebas['fecreq']))
            {
              $value = $dateFormat->format($liprebas['fecreq'], 'i', $dateFormat->getInputPattern('d'));
            }
            else
            {
              $value_array = $liprebas['fecreq'];
              $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
            }
            $this->liprebas->setFecreq($value);
          }
          catch (sfException $e)
          {
            // not a date
          }
        }
        else
        {
          $this->liprebas->setFecreq(null);
        }
      }
      if (isset($liprebas['tipmon']))
      {
        $this->liprebas->setTipmon($liprebas['tipmon']);
      }
      if (isset($liprebas['desreq']))
      {
        $this->liprebas->setDesreq($liprebas['desreq']);
      }
      if (isset($liprebas['monreq']))
      {
        $this->liprebas->setMonreq($liprebas['monreq']);
      }
      if (isset($liprebas['unires']))
      {
        $this->liprebas->setUnires($liprebas['unires']);
      }
      if (isset($liprebas['nomcat']))
      {
        $this->liprebas->setNomcat($liprebas['nomcat']);
      }
      if (isset($liprebas['tipo']))
        {
          $this->liprebas->setTipo($liprebas['tipo']);
        }
      if (isset($liprebas['tipfin']))
      {
        $this->liprebas->setTipfin($liprebas['tipfin']);
      }
      if (isset($liprebas['nomext']))
      {
        $this->liprebas->setNomext($liprebas['nomext']);
      }
      if (isset($liprebas['motreq']))
      {
        $this->liprebas->setMotreq($liprebas['motreq']);
      }
      if (isset($liprebas['benreq']))
      {
        $this->liprebas->setBenreq($liprebas['benreq']);
      }
      if (isset($liprebas['obsreq']))
      {
        $this->liprebas->setObsreq($liprebas['obsreq']);
      }
      if (isset($liprebas['mondes']))
      {
        $this->liprebas->setMondes($liprebas['mondes']);
      }
      if (isset($liprebas['tipreq']))
      {
        $this->liprebas->setTipreq($liprebas['tipreq']);
      }
      if (isset($liprebas['valmon']))
      {
        $this->liprebas->setValmon($liprebas['valmon']);
      }
      if (isset($liprebas['codcen']))
      {
        $this->liprebas->setCodcen($liprebas['codcen']);
      }

      $this->liprebas->setStareq('A');

    }

    /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
   {
     $cajtexmos=$this->getRequestParameter('cajtexmos');
     $cajtexcom=$this->getRequestParameter('cajtexcom');
     $output=array();
     $javascript=""; $dato="";
     if ($this->getRequestParameter('ajax')=='1')
      {
      	$catbnubica="";
      	$fornumuni="";
      	$varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('licitaciones',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['licitaciones']))
		     if(array_key_exists('licprebas',$varemp['aplicacion']['licitaciones']['modulos'])){
		       if(array_key_exists('catbnubica',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
		       {
		       	$catbnubica=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['catbnubica'];
		       }
		       if(array_key_exists('fornumuni',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
		       {
		       	$fornumuni=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['fornumuni'];
		       }
		     }
      	if ($catbnubica=='S') {
      	$dato=BnubicaPeer::getDesubi($this->getRequestParameter('codigo')); }
        else {
         $t= new Criteria();
         if ($fornumuni!="S") {$t->add(NpcatprePeer::CODCAT,$this->getRequestParameter('codigo')); }
         else {
         	$loguse= $this->getUser()->getAttribute('loguse');
         	$sql="npcatpre.codcat='".$this->getRequestParameter('codigo')."' and npcatpre.codcat in (select codcat from causuuni where loguse='".$loguse."')";
         	$t->add(NpcatprePeer::CODCAT,$sql,Criteria::CUSTOM);
         }
         $reg= NpcatprePeer::doSelectOne($t);
         if ($reg)
         {
         	$dato=$reg->getNomcat();
         }else $javascript="alert('La Categoria no existe')";

        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $dato=FortipfinPeer::getDesfin($this->getRequestParameter('codigo'));
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
      else  if ($this->getRequestParameter('ajax')=='3')
      {
	 	$catbnubica="";
      	$varemp = $this->getUser()->getAttribute('configemp');
	    if ($varemp)
		if(array_key_exists('aplicacion',$varemp))
		 if(array_key_exists('licitaciones',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['licitaciones']))
		     if(array_key_exists('licprebas',$varemp['aplicacion']['licitaciones']['modulos'])){
		       if(array_key_exists('catbnubica',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
		       {
		       	$catbnubica=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['catbnubica'];
		       }
		     }

            $longitudart=strlen(Herramientas::getMascaraArticulo());


	 	$c= new Criteria();
		$c->add(CaregartPeer::CODART,$this->getRequestParameter('codigo'));
      	        $reg=CaregartPeer::doSelectOne($c);
  		if ($reg)
  		{
                  if ($longitudart==strlen($this->getRequestParameter('codigo')))
                  {
                    $dato=htmlspecialchars($reg->getDesart());
                    $dato1=$reg->getUnimed();
                    $dato2=number_format($reg->getCosult(),2,',','.');
                    $dato3=$reg->getCodpar();
                    if ($catbnubica=='S')
                    $valuni="";
                    else $valuni=$this->getRequestParameter('valuni');

                    $unires=$this->getRequestParameter('unires');
                    $catunires=$this->getRequestParameter('catunires');
                    $costo=$this->getRequestParameter('costo');
                    $manunicuni=H::getConfApp2('manunicuni', 'licitaciones', 'licprebas');
                    if ($manunicuni=='S')
                    {
                       $javascript="$('$catunires').hide(); $('$unires').readOnly=true; $('$unires').focus(); $('$costo').focus();";
                    }
                    else
                        $javascript="$('$unires').focus(); $('$costo').focus();";
                    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('unidad').'","'.$dato1.'",""],["'.$this->getRequestParameter('costo').'","'.$dato2.'",""],["'.$this->getRequestParameter('partida').'","'.$dato3.'",""],["'.$this->getRequestParameter('unires').'","'.$valuni.'",""],["javascript","'.$javascript.'",""]]';
                  }else {
                    $valuni="";
  	            $javascript="alert('Articulo no es de Ultimo Nivel');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('costo') ."').value='0.00';$('". $this->getRequestParameter('partida') ."').value=''";
        	    $output = '[["javascript","'.$javascript.'",""]]';
                  }
  		}
  		else
  		{    $valuni="";
  			 $javascript="alert('Articulo no existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';$('". $this->getRequestParameter('unidad') ."').value='';$('". $this->getRequestParameter('costo') ."').value='0.00';$('". $this->getRequestParameter('partida') ."').value=''";
        	 $output = '[["javascript","'.$javascript.'",""]]';
  		}
      }
      else  if ($this->getRequestParameter('ajax')=='4')
      {
        /*$dato=CarecargPeer::getRecargo($this->getRequestParameter('codigo'));
        $dato1=number_format(CarecargPeer::getDato($this->getRequestParameter('codigo'),'monrgo'),2,',','.');
        $dato2=CarecargPeer::getDato($this->getRequestParameter('codigo'),'tiprgo');
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"],["'.$this->getRequestParameter('monto').'","'.$dato1.'",""],["'.$this->getRequestParameter('tipo').'","'.$dato2.'",""]]';*/
          $output = '[["","",""],["","",""],["","",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='5')
      {
        $dato=CarazcomPeer::getDesrazon($this->getRequestParameter('codigo'));
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
      else  if ($this->getRequestParameter('ajax')=='6')
      {
        $this->getUser()->setAttribute('presiono', 'S','licprebas');
        $output = '[["","",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='7')
      {
      	if (Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo')))
      	{
         $valido='N';
      	}else { $valido='S';}

      	if (Herramientas::validarPeriodoFiscal($this->getRequestParameter('codigo')))
      	{ $valido2='N';}
      	else { $valido2='S';}
        $output = '[["valfec","'.$valido.'",""],["valfec2","'.$valido2.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='8')
      {
      	$fec1 = $this->getRequestParameter('fecemi');
        $javascript="";
        $dateFormat = new sfDateFormat('es_VE');
        $fec2 = $dateFormat->format($this->getRequestParameter('codigo'), 'i', $dateFormat->getInputPattern('d'));

        if ($fec2<$fec1)
        {
          $javascript="alert('La Fecha de Anulación no puede ser menor a la Fecha de la Solicitud'); $('liprebas_fecanu').value=''; ";
        }else {
            if (!Herramientas::validarPeriodoPresuesto($this->getRequestParameter('codigo')))
	      	{
	         $javascript="alert('La Fecha no se encuentra del Período Fiscal');	$('liprebas_fecanu').value=''; ";
	      	}else {
	      		if (!Herramientas::validarPeriodoFiscal($this->getRequestParameter('codigo')))
		      	{
		      	  $javascript="alert('La Fecha se encuentra dentro un Período Cerrado'); $('liprebas_fecanu').value='';	";
		      	}

		    }
        }
        $output = '[["javascript","'.$javascript.'",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='9')//Calcular Recargos
      {
        $output = '[["","",""],["","",""],["","",""]]';
      }
      else  if ($this->getRequestParameter('ajax')=='10')
      {
        $q= new Criteria();
        $q->add(CadefcenPeer::CODCEN,$this->getRequestParameter('codigo'));
        $reg= CadefcenPeer::doSelectOne($q);
        if ($reg)
        {
           $dato=$reg->getDescen(); $javascript=""; 
        }else {
            $dato="";
            $javascript="alert('El Centro de Costo no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
        }

        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
      }
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
    }


    public function executeAutocomplete()
    {
     if ($this->getRequestParameter('ajax')=='1')
      {
      $this->tags=Herramientas::autocompleteAjax('CODCAT','Npcatpre','codcat',$this->getRequestParameter('liprebas[unires]'));
      }
      else  if ($this->getRequestParameter('ajax')=='2')
      {
        $this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','codfin',$this->getRequestParameter('liprebas[tipfin]'));
      }
    }

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridDetalle()
    {
       $c = new Criteria();
       $c->add(LiprebasdetPeer::REQART,$this->liprebas->getReqart());
       $c->addAscendingOrderByColumn(LiprebasdetPeer::CODART);
       $reg = LiprebasdetPeer::doSelect($c);

       $mascaraarticulo=$this->mascaraarticulo;
       $lonart=strlen($this->mascaraarticulo);
       $mascaracategoria= Herramientas::getObtener_FormatoCategoria();
       $loncat=strlen($mascaracategoria);
       $mascarapresupuesto=$this->mascarapresupuesto;
       $lonpre=strlen($this->mascarapresupuesto);
       $precom=$this->precompromete;

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Liprebasdet');
       $opciones->setAncho(2050);
       $opciones->setAnchoGrid(1800);
       $opciones->setFilas(150);
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $naplrecdes=H::getConfApp2('naplrecdes', 'licitaciones', 'licprebas');

       $col1 = new Columna('Marque');
       $col1->setTipo(Columna::CHECK);
       $col1->setNombreCampo('check');
       $col1->setEsGrabable(true);
       $col1->setHTML(' ');
       if ($precom=='' && $this->oculrecnoprc=='S') $col1->setOculta(true);
       $col1->setJScript('onClick="totalmarcadas(this.id)"');
       if ($naplrecdes=='S') $col1->setOculta(true);

       $obj= array('codart' => 2, 'desart' => 3, 'unimed' => 4, 'cosult' => 9, 'codpar' => 13);
       $params= array('param1' => $lonart, 'param2' => "'+$('liprebas_tipreq').value+'", 'val2');

       $col2 = new Columna('Cód. Artículo');
       $col2->setTipo(Columna::TEXTO);
       $col2->setEsGrabable(true);
       $col2->setAlineacionObjeto(Columna::CENTRO);
       $col2->setAlineacionContenido(Columna::CENTRO);
       $col2->setNombreCampo('codart');
       $col2->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;} perderfocus(event,this.id,15);" onBlur="javascript:event.keyCode=13; ajaxdetalle(event,this.id);"');
       $col2->setCatalogo('caregart','sf_admin_edit_form',$obj,'Caregart_Almsolegr',$params);
       $col2->setHTML('type="text" size="17" maxlength="'.chr(39).$lonart.chr(39).'"');

       $col3 = new Columna('Descripción');
       $col3->setTipo(Columna::TEXTAREA);
       $col3->setAlineacionObjeto(Columna::IZQUIERDA);
       $col3->setAlineacionContenido(Columna::IZQUIERDA);
       $col3->setNombreCampo('desartsol');
       $col3->setEsGrabable(true);
       $col3->setHTML('type="text" size="25x1"');

       $col4 = new Columna('Unidad de Medida');
       $col4->setTipo(Columna::TEXTO);
       $col4->setAlineacionObjeto(Columna::IZQUIERDA);
       $col4->setAlineacionContenido(Columna::IZQUIERDA);
       $col4->setNombreCampo('unimed');
       $col4->setEsGrabable(true);
       $col4->setHTML('type="text" size="25" maxlength="50"');

       $obj2= array('codcat' => 5);
       $params2= array('param1' => $loncat, 'param2' => 'licprebas');

       $col5 = new Columna('Cód. Unidad');
       $col5->setTipo(Columna::TEXTO);
       $col5->setEsGrabable(true);
       $col5->setAlineacionObjeto(Columna::CENTRO);
       $col5->setAlineacionContenido(Columna::CENTRO);
       $col5->setNombreCampo('codcat');
       $col5->setHTML('type="text" size="17" maxlength="'.chr(39).$loncat.chr(39).'"');
       $col5->setCatalogo('npcatpre','sf_admin_edit_form',$obj2,'Npcatpre_Almsolegr',$params2);
       $col5->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaracategoria.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena; perderfocus(event,this.id,15);}" onBlur="javascript:event.keyCode=13; actualizo_cod_presupuestario(event,this.id);"');

       $col6 = new Columna('Cód. Presupuestario');
       $col6->setTipo(Columna::TEXTO);
       $col6->setEsGrabable(true);
       $col6->setNombreCampo('codigopre');
       $col6->setAlineacionObjeto(Columna::CENTRO);
       $col6->setAlineacionContenido(Columna::CENTRO);
       $col6->setHTML('type="text" size="55" maxlength="'.chr(39).$lonpre.chr(39).'"');
       $col6->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapresupuesto.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');

       $col7 = new Columna('Cant. Requerida');
       $col7->setEsGrabable(true);
       $col7->setTipo(Columna::MONTO);
       $col7->setAlineacionContenido(Columna::DERECHA);
       $col7->setAlineacionObjeto(Columna::DERECHA);
       $col7->setNombreCampo('canreq');
       $col7->setEsNumerico(true);
       $col7->setHTML('type="text" size="10"');
       $col7->setJScript('onKeypress="Cantidad(event,this.id);"');

       $col8 = clone $col7;
       $col8->setTitulo('Cant. Recibida');
       $col8->setNombreCampo('canrec');
       $col8->setOculta(true);
       $col8->setHTML('type="text" size="10" readonly=true');

       $col9 = clone $col7;
       $col9->setTitulo('Costo');
       $col9->setNombreCampo('costo');
       $col9->setHTML('type="text" size="10"');
       $col9->setJScript('onKeypress="Total(event,this.id); "');
       if ($precom=='' && $this->oculrecnoprc=='S') $col9->setOculta(true);

       $col10 = clone $col7;
       $col10->setTitulo('Descuento');
       $col10->setNombreCampo('mondes');
       $col10->setHTML('type="text" size="10"');
       $col10->setJScript('onKeypress="Totalmenosdescuento(event,this.id);"');
       $col10->setOculta(true);

       $col11 = clone $col7;
       $col11->setTitulo('Recargo');
       $col11->setNombreCampo('monrgo');
       $col11->setHTML('type="text" size="10" readonly=true');
       $col11->setOculta(true);

       $col12 = clone $col7;
       $col12->setTitulo('Total');
       $col12->setNombreCampo('montot');
       $col12->setHTML('type="text" size="10" readonly=true');
       $col12->setEsTotal(true,'liprebas_monreq');

       $paramsq = array('param1' => "'+$(this.id).up().previous(10).descendants()[0].value+'");
       $mascarapartida = Herramientas::getMascaraPartida();
       $longpar=strlen($mascarapartida);

       $col13 = new Columna('Codigo Partida');
       $col13->setTipo(Columna::TEXTO);
       $col13->setEsGrabable(true);
       //$col13->setOculta(true);
       $col13->setAlineacionObjeto(Columna::CENTRO);
       $col13->setAlineacionContenido(Columna::CENTRO);
       $col13->setNombreCampo('codpre');
       $col13->setHTML('type="text" size="20" maxlength="'.chr(39).$longpar.chr(39).'" readOnly="true"');
       $col13->setCatalogo('caartpar','sf_admin_edit_form',array('codpar' => 13),'Nppartidas_Caregart',$paramsq);
       $col13->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascarapartida.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena; perderfocus(event,this.id,15);}" onBlur="javascript:event.keyCode=13; actualizo_cod_presupuestario(event,this.id);"');

       $col14 = clone $col11;
       $col14->setTitulo('Total');
       $col14->setNombreCampo('montot2');
       $col14->setOculta(true);

       $col15 = clone $col7;
       $col15->setTitulo('Recargo');
       $col15->setNombreCampo('monrgo2');
       $col15->setHTML('type="text" size="10" readonly=true');
       $col15->setOculta(true);

	   $col16 = new Columna('Recargos');
	   $col16->setTipo(Columna::TEXTO);
	   $col16->setEsGrabable(false);
	   $col16->setAlineacionObjeto(Columna::CENTRO);
	   $col16->setAlineacionContenido(Columna::CENTRO);
	   $col16->setNombreCampo('anadir');
	   $col16->setHTML('type="text" size="1" style="border:none" class="imagenalmacen"');
	   $col16->setJScript('onClick="mostrargridrecargos(this.id)"');
	   $col16->setOculta(true);
	  
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

       $this->obj = $opciones->getConfig($reg);

  }

    /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRazon()
   {
       $c = new Criteria();
       $c->add(LiprebasrazPeer::NUMSOL,$this->liprebas->getReqart());
       $c->addAscendingOrderByColumn(LiprebasrazPeer::CODRAZCOM);
       $reg = LiprebasrazPeer::doSelect($c);


       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Liprebasraz');
       $opciones->setAncho(400);
       $opciones->setAnchoGrid(400);
       $opciones->setTitulo('');
       $opciones->setName('c');
       $opciones->setFilas(10);
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Código');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codrazcom');
       $col1->setHTML('type="text" size="10" maxlength="4"');
       $col1->setJScript('onkeyPress="perderfocus(event,this.id,15);" onBlur="javascript:event.keyCode=13; ajax(event,this.id)"');
       $col1->setCatalogo('carazcom','sf_admin_edit_form',array('codrazcom' => 1, 'desrazcom' => 2));


       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('desrazcom');
       $col2->setHTML('type="text" size="25" readonly=true');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);

       $this->obj3 = $opciones->getConfig($reg);

  }

  public function setVars()
  {
  	$this->autoriza_solicutud_egreso = Herramientas::ObtenerFormato('Cadefart','solreqapr');
    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
    $this->mascarapresupuesto = Herramientas::formatoPresupuesto();
    $c= new Criteria();
    $regis= CadefartPeer::doSelectOne($c);
    if ($regis)
    {
      $this->precompromete=$regis->getPrcasopre();
      $this->autorizaprecom=$regis->getPrcreqapr();
      $this->tiporec= $regis->getAsiparrec();
    }
    else
    {
      $this->precompromete="";
      $this->autorizaprecom="";
      $this->tiporec="";
    }

    $this->cambiareti="";
    $this->numsoldesh="";
    $this->mansolocor="";
    $this->bloqfec="";
    $this->oculeli="";
    $this->nometifor="";
    $this->oculrecnoprc="";
    $this->catbnubica="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('licitaciones',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['licitaciones']))
	     if(array_key_exists('licprebas',$varemp['aplicacion']['licitaciones']['modulos'])){
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->cambiareti=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['cambiareti'];
	       }
           if(array_key_exists('numsoldesh',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->numsoldesh=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['numsoldesh'];
	       }
	       if(array_key_exists('mansolocor',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->mansolocor=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['mansolocor'];
	       }
	       if(array_key_exists('bloqfec',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->bloqfec=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['bloqfec'];
	       }
	       if(array_key_exists('oculeli',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->oculeli=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['oculeli'];
	       }
	       if(array_key_exists('nometifor',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->nometifor=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['nometifor'];
	       }
		    if(array_key_exists('oculrecnoprc',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->oculrecnoprc=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['oculrecnoprc'];
	       }
	       if(array_key_exists('catbnubica',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->catbnubica=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['catbnubica'];
	       }
         }
    if ($this->catbnubica=='S'){
    	$this->mascaracategoria=Herramientas::ObtenerFormato('Opdefemp','Forubi');
    }else {
    $this->mascaracategoria = Herramientas::getObtener_FormatoCategoria();
    }
    $this->loncat=strlen($this->mascaracategoria);
  }

   public function executeAnular()
   {
   $reqart=$this->getRequestParameter('reqart');
   $fecreq=$this->getRequestParameter('fecreq');

   $dateFormat = new sfDateFormat($this->getUser()->getCulture());
   $fec = $dateFormat->format($fecreq, 'i', $dateFormat->getInputPattern('d'));

   $c = new Criteria();
   $c->add(LiprebasPeer::REQART,$reqart);
   $c->add(LiprebasPeer::FECREQ,$fec);
   $this->liprebas = LiprebasPeer::doSelectOne($c);
   sfView::SUCCESS;
   }

  public function executeSalvaranu()
  {
    $reqart=$this->getRequestParameter('reqart');
    $fecanu=$this->getRequestParameter('fecanu');
    $desanu=$this->getRequestParameter('desanu');
    $this->msg='';

        $c= new Criteria();
        $c->add(LiprebasPeer::REQART,$reqart);
        $registro= LiprebasPeer::doSelectOne($c);
        if ($registro)
        {
          $registro->setFecanu($fecanu);
          $registro->setStareq('N');
          $registro->save();
        }
      
    return sfView::SUCCESS;
  }

  protected function getLabels()
    {
      return array(
        'liprebas{reqart}' => 'Número',
        'liprebas{fecreq}' => 'Fecha',
        'liprebas{tipmon}' => 'Moneda',
        'liprebas{desreq}' => 'Descripción',
        'liprebas{monreq}' => 'Monto Total',
        'liprebas{unires}' => 'Unidad Responsable',
        'liprebas{nomcat}' => 'Descripción',
        'liprebas{tipreq}' => 'Tipo',
        'liprebas{tipfin}' => 'Financiamiento',
        'liprebas{nomext}' => 'Nomext',
        'liprebas{motreq}' => 'Motivo',
        'liprebas{benreq}' => 'Beneficio',
        'liprebas{obsreq}' => 'Observaciones',
        'liprebas{mondes}' => 'Descripción',
        'liprebas{valmon}' => 'Valor',
        'liprebas{stareq}' => 'estatus',
        'liprebas{codcen}' => 'Centro de Costo',
      );
    }

  protected function getLiprebasOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $liprebas = new Liprebas();

    }
    else
    {
      $liprebas = LiprebasPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($liprebas);
    }

    return $liprebas;
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/liprebas/filters');

    $this->cambiareti="";
    $this->fornumuni="";
    $varemp = $this->getUser()->getAttribute('configemp');
    if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('licitaciones',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['licitaciones']))
	     if(array_key_exists('licprebas',$varemp['aplicacion']['licitaciones']['modulos'])){
	       if(array_key_exists('cambiareti',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->cambiareti=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['cambiareti'];
	       }
	       if(array_key_exists('nometifor',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->nometifor=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['nometifor'];
	       }
	       if(array_key_exists('fornumuni',$varemp['aplicacion']['licitaciones']['modulos']['licprebas']))
	       {
	       	$this->fornumuni=$varemp['aplicacion']['licitaciones']['modulos']['licprebas']['fornumuni'];
	       }
	     }
   $loguse= $this->getUser()->getAttribute('loguse');

     // 15    // pager
    $this->pager = new sfPropelPager('Liprebas', 15);
    $c = new Criteria();
    if ($this->fornumuni=='S')
    {
      $this->sql="liprebas.unires in (select codcat from causuuni where loguse='".$loguse."')";
      $c->add(LiprebasPeer::UNIRES,$this->sql,Criteria::CUSTOM);
    }

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

}
