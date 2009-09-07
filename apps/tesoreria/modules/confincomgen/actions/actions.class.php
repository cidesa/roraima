<?php

/**
 * confincomgen actions.
 *
 * @package    Roraima
 * @subpackage confincomgen
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class confincomgenActions extends autoconfincomgenActions
{
 public  $error=-1;
 public  $coderror1=-1;
 public  $coderror2=-1;
 public  $coderror3=-1;
 public  $coderror4=-1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->contabc = $this->getContabcOrCreate();
    $this->setVars();
    $this->configGrid();
    $this->getRequestParameter('formulario');
    $this->getUser()->setAttribute('formulario',$this->getRequestParameter('formulario'));
    $this->formulario=$this->getRequestParameter('formulario');
    $arreglo_ctas=split("_",$this->getUser()->getAttribute('ctas',null,$this->getUser()->getAttribute('formulario')));
    $this->ctas=$this->getUser()->getAttribute('ctas',null,$this->getUser()->getAttribute('formulario'));
    $arreglo_descctas=split("_",$this->getUser()->getAttribute('desctas',null,$this->getUser()->getAttribute('formulario')));
    $a=0;
    $desc_ctas='';
    while ($a < count($arreglo_ctas))
    {
     if ($a==0)
     {
       $desc_ctas=$desc_ctas.Herramientas::getX('codcta','contabb','descta',$arreglo_ctas[$a]);
     }
     else
     {
       $desc_ctas=$desc_ctas.'_'.Herramientas::getX('codcta','contabb','descta',$arreglo_ctas[$a]);
     }

      $a++;
    }
    $this->desc_ctas=$desc_ctas;
    $this->destra=$this->getUser()->getAttribute('destra',null,$this->getUser()->getAttribute('formulario'));
    $this->numcom = $this->getUser()->getAttribute('numcomp',null,$this->getUser()->getAttribute('formulario'));
    $this->reftra = $this->getUser()->getAttribute('reftra',null,$this->getUser()->getAttribute('formulario'));
    $this->arreglo_montos=str_replace('.',',',$this->getUser()->getAttribute('montos',null,$this->getUser()->getAttribute('formulario')));
    $this->arreglo_mov=$this->getUser()->getAttribute('mov',null,$this->getUser()->getAttribute('formulario'));
    $this->getUser()->getAttribute('fectra',null,$this->getUser()->getAttribute('formulario'));
    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
    $fec = $dateFormat->format($this->getUser()->getAttribute('fectra',null,$this->getUser()->getAttribute('formulario')), 'i', $dateFormat->getInputPattern('d'));

     if ($this->reftra<>'') $this->fectra = $fec;
     $this->destra = str_replace('*',' ',$this->getUser()->getAttribute('destra',null,$this->getUser()->getAttribute('formulario')));

     $ctas=split('_',$this->ctas);
     $descs=split('_',$this->desc_ctas);
     $movs=split('_',$this->arreglo_mov);
     $montos=split('_',$this->getUser()->getAttribute('montos',null,$this->getUser()->getAttribute('formulario')));
     $yapaso=array();
     $dondesta=array();

     foreach ($ctas as $cta)
     {
       $dondesta=array_keys($yapaso,$cta);

       if (count($dondesta)==0)
       {
	    $yapaso[]=$cta;
	    // buscamos todas las posiciones de esa cta.
	    $posiciones=array();
        $posiciones=array_keys($ctas,$cta); //arreglo con las posiciones

         $contd=0;
         $contc=0;
         $acumd=0;
         $acumc=0;

         foreach ($posiciones as $pos)
         {
           if ($movs[$pos]=='D')  //DEBITO
           {
             $acumd=$acumd+Herramientas::toFloat($montos[$pos]);
             $contd=$contd+1;
           }
           else  //CREDITO
           {
             $acumc=$acumc+Herramientas::toFloat($montos[$pos]);
             $contc=$contc+1;
           }

         } // foreach 2

	      if ($contd>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=$descs[$posiciones[0]];
           $new_movs[]='D';
           $new_montos[]=$acumd;
	      }
	      if ($contc>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=$descs[$posiciones[0]];
           $new_movs[]='C';
           $new_montos[]=$acumc;
	      }

	  } // if dondesta
    } // foreach 1


    array_multisort($new_movs,SORT_DESC,$new_ctas,$new_descs,$new_montos);
	  $this->ctas='';
    $this->desc_ctas='';
    $this->arreglo_mov='';
    $this->arreglo_montos='';

    for ($i=0;$i<count($new_ctas);$i++)
    {
      if ($i==0)
      {
        $this->ctas='_'.$new_ctas[$i];
        $this->desc_ctas='_'.$new_descs[$i];
        $this->arreglo_mov=$new_movs[$i];
        $this->arreglo_montos=str_replace('.',',',$new_montos[$i]);
      }
      else
      {
        $this->ctas=$this->ctas.'_'.$new_ctas[$i];
        $this->desc_ctas=$this->desc_ctas.'_'.$new_descs[$i];
        $this->arreglo_mov=$this->arreglo_mov.'_'.$new_movs[$i];
        $this->arreglo_montos=$this->arreglo_montos.'_'.str_replace('.',',',$new_montos[$i]);
      }
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateContabcFromRequest();

      $this->saveContabc($this->contabc);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('confincomgen/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('confincomgen/list');
      }
      else
      {
        return $this->redirect('confincomgen/edit?id='.$this->contabc->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateContabcFromRequest()
  {
    $contabc = $this->getRequestParameter('contabc');
    $this->setVars();
    $this->configGrid();
    $this->getRequestParameter('formulario');
    $this->getUser()->setAttribute('formulario',$this->getRequestParameter('formulario'));
    $this->formulario=$this->getRequestParameter('formulario');
    $arreglo_ctas=split("_",$this->getUser()->getAttribute('ctas',null,$this->getUser()->getAttribute('formulario')));
    $this->ctas=$this->getUser()->getAttribute('ctas',null,$this->getUser()->getAttribute('formulario'));
    $arreglo_descctas=split("_",$this->getUser()->getAttribute('desctas',null,$this->getUser()->getAttribute('formulario')));
    $a=0;
    $desc_ctas='';
    while ($a < count($arreglo_ctas))
    {
     if ($a==0)
     {
       $desc_ctas=$desc_ctas.Herramientas::getX('codcta','contabb','descta',$arreglo_ctas[$a]);
     }
     else
     {
       $desc_ctas=$desc_ctas.'_'.Herramientas::getX('codcta','contabb','descta',$arreglo_ctas[$a]);
     }

      $a++;
    }
    $this->desc_ctas=$desc_ctas;
    $this->destra=$this->getUser()->getAttribute('destra',null,$this->getUser()->getAttribute('formulario'));
    $this->numcom = $this->getUser()->getAttribute('numcomp',null,$this->getUser()->getAttribute('formulario'));
    $this->reftra = $this->getUser()->getAttribute('reftra',null,$this->getUser()->getAttribute('formulario'));
    $this->arreglo_montos=str_replace('.',',',$this->getUser()->getAttribute('montos',null,$this->getUser()->getAttribute('formulario')));
    $this->arreglo_mov=$this->getUser()->getAttribute('mov',null,$this->getUser()->getAttribute('formulario'));
    $this->getUser()->getAttribute('fectra',null,$this->getUser()->getAttribute('formulario'));
    $dateFormat = new sfDateFormat($this->getUser()->getCulture());
    $fec = $dateFormat->format($this->getUser()->getAttribute('fectra',null,$this->getUser()->getAttribute('formulario')), 'i', $dateFormat->getInputPattern('d'));

     if ($this->reftra<>'') $this->fectra = $fec;
     $this->destra = str_replace('*',' ',$this->getUser()->getAttribute('destra',null,$this->getUser()->getAttribute('formulario')));

     $ctas=split('_',$this->ctas);
     $descs=split('_',$this->desc_ctas);
     $movs=split('_',$this->arreglo_mov);
     $montos=split('_',$this->getUser()->getAttribute('montos',null,$this->getUser()->getAttribute('formulario')));
     $yapaso=array();
     $dondesta=array();

     foreach ($ctas as $cta)
     {
       $dondesta=array_keys($yapaso,$cta);

       if (count($dondesta)==0)
       {
	    $yapaso[]=$cta;
	    // buscamos todas las posiciones de esa cta.
	    $posiciones=array();
        $posiciones=array_keys($ctas,$cta); //arreglo con las posiciones

         $contd=0;
         $contc=0;
         $acumd=0;
         $acumc=0;

         foreach ($posiciones as $pos)
         {
           if ($movs[$pos]=='D')  //DEBITO
           {
             $acumd=$acumd+Herramientas::toFloat($montos[$pos]);
             $contd=$contd+1;
           }
           else  //CREDITO
           {
             $acumc=$acumc+Herramientas::toFloat($montos[$pos]);
             $contc=$contc+1;
           }

         } // foreach 2

	      if ($contd>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=$descs[$posiciones[0]];
           $new_movs[]='D';
           $new_montos[]=$acumd;
	      }
	      if ($contc>=1)
	      {
           $new_ctas[]=$cta;
           $new_descs[]=$descs[$posiciones[0]];
           $new_movs[]='C';
           $new_montos[]=$acumc;
	      }

	  } // if dondesta
    } // foreach 1


    array_multisort($new_movs,SORT_DESC,$new_ctas,$new_descs,$new_montos);
	  $this->ctas='';
    $this->desc_ctas='';
    $this->arreglo_mov='';
    $this->arreglo_montos='';

    for ($i=0;$i<count($new_ctas);$i++)
    {
      if ($i==0)
      {
        $this->ctas='_'.$new_ctas[$i];
        $this->desc_ctas='_'.$new_descs[$i];
        $this->arreglo_mov=$new_movs[$i];
        $this->arreglo_montos=str_replace('.',',',$new_montos[$i]);
      }
      else
      {
        $this->ctas=$this->ctas.'_'.$new_ctas[$i];
        $this->desc_ctas=$this->desc_ctas.'_'.$new_descs[$i];
        $this->arreglo_mov=$this->arreglo_mov.'_'.$new_movs[$i];
        $this->arreglo_montos=$this->arreglo_montos.'_'.str_replace('.',',',$new_montos[$i]);
      }
    }

    if (isset($contabc['numcom']))
    {
      $this->contabc->setNumcom($contabc['numcom']);
    }
    if (isset($contabc['reftra']))
    {
      $this->contabc->setReftra($contabc['reftra']);
    }
    if (isset($contabc['feccom']))
    {
      if ($contabc['feccom'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($contabc['feccom']))
          {
            $value = $dateFormat->format($contabc['feccom'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $contabc['feccom'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->contabc->setFeccom($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->contabc->setFeccom(null);
      }
    }
    if (isset($contabc['descom']))
    {
      $this->contabc->setDescom($contabc['descom']);
    }
    if (isset($contabc['moncom']))
    {
      $this->contabc->setMoncom($contabc['moncom']);
    }
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $c = new Criteria();
    $referencia=$this->contabc->getNumcom();
    $c->add(Contabc1Peer::NUMCOM,$this->contabc->getNumcom());
    $c->addDescendingOrderByColumn(Contabc1Peer::DEBCRE);
    $reg = Contabc1Peer::doSelect($c);

    $formatocontable=$this->formatocontable;
    $forcontlen = strlen($formatocontable);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Contabc1');
    $opciones->setAncho(870);
    $opciones->setAnchoGrid(900);
    $opciones->setTitulo('Asientos Contable');
	  $opciones->setFilas(50);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código de Cuenta');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::IZQUIERDA);
    $col1->setAlineacionContenido(Columna::IZQUIERDA);
    $col1->setNombreCampo('codcta');
    $col1->setHTML('type="text" size="15" maxlength="25"');
    $col1->setCatalogo('contabb','sf_admin_edit_form', array('codcta' => 1,'descta' => 2,),'Confincomgen_Contabb');
    $col1->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$formatocontable.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $col1->setAjax('confincomgen',1,2);

    $col2 = new Columna('Descripción de Asiento');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Descta');
    $col2->setHTML('type="text" size="40" disabled=true  maxlength="250" ');

    $col3 = new Columna('Referencia');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::DERECHA);
    $col3->setAlineacionContenido(Columna::DERECHA);
    $col3->setNombreCampo('Refasi');
    $col3->setHTML('type="text" size="10" maxlength="8" ');

  	$col4 = new Columna('Fecha');
  	$col4->setNombreCampo('Feccom');
  	$col4->setTipo(Columna::FECHA);
  	$col4->setHTML('size="8"');
  	$col4->setEsGrabable(true);

    $col5 = new Columna('Débito');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setNombreCampo('Mondebito');
    $col5->setEsNumerico(true);
    $col5->setHTML('type="text" size="12" readonly="false"');
    $col5->setJScript('onKeypress="javascript:entermonto(event,this.id);inhabilitar_campo(event,this.id);"');
    $col5->setEsTotal(true,'debito');

    $col6 = new Columna('Crédito');
    $col6->setTipo(Columna::MONTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionContenido(Columna::DERECHA);
    $col6->setAlineacionObjeto(Columna::DERECHA);
    $col6->setNombreCampo('Moncredito');
    $col6->setEsNumerico(true);
    $col6->setHTML('type="text" size="12" readonly="false"');
    $col6->setJScript('onKeypress="javascript:entermonto(event,this.id);inhabilitar_campo(event,this.id)"');
    $col6->setEsTotal(true,'credito');

    $col7 = new Columna('numcom');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionObjeto(Columna::DERECHA);
    $col7->setAlineacionContenido(Columna::DERECHA);
    $col7->setNombreCampo('numcom');
    $col7->setHTML('type="text" size="5"');
    $col7->setOculta(true);

    $col8 = new Columna('debcre');
    $col8->setTipo(Columna::TEXTO);
    $col8->setEsGrabable(true);
    $col8->setAlineacionObjeto(Columna::DERECHA);
    $col8->setAlineacionContenido(Columna::DERECHA);
    $col8->setNombreCampo('debcre');
    $col8->setHTML('type="text" size="5"');
    $col8->setOculta(true);

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    $this->obj = $opciones->getConfig($reg);
  }


  public function setVars()
  {
    $this->formatocontable = Herramientas::getX('codemp','contaba','forcta','001');
    $this->ctas='';
    $this->desc_ctas='';
    $this->numcom = '';
    $this->reftra = '';
    $this->arreglo_montos='';
    $this->arreglo_mov='';
    $this->fectra='';
    $this->destra = '';
    $this->monto = '';
    $this->formulario='';
    $this->gencorrel=$this->getUser()->getAttribute('confcorcom','S');
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
  protected function saveContabc($contabc)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    if ($this->getUser()->getAttribute('grabar',null,$this->getUser()->getAttribute('formulario'))=='S')
    {
      Tesoreria::Salvarconfincomgen($this->contabc->getNumcom(), $this->contabc->getReftra(),$this->contabc->getFeccom(),$this->contabc->getDescom(),$this->getRequestParameter('debito'),$this->getRequestParameter('credito'));
      Tesoreria::Salvar_asientosconfincomgen($this->contabc->getNumcom(), $this->contabc->getReftra(),$this->contabc->getFeccom(),$grid,$this->getUser()->getAttribute('grabar',null,'sf_admin/tesmovtraban/confincomgen'));

    }
    else
    {

      //elimino las sessiones
      $this->getUser()->getAttributeHolder()->remove('fectra');
      $this->getUser()->getAttributeHolder()->remove('destra');
      $this->getUser()->getAttributeHolder()->remove('reftra');
      $this->getUser()->getAttributeHolder()->remove('numcomp');
      $this->getUser()->getAttributeHolder()->remove('mov');
      $this->getUser()->getAttributeHolder()->remove('montos');
      $this->getUser()->getAttributeHolder()->remove('ctas');
      //obtengo las sessiones
      $this->LlenarAttribute('contabc[numcom]', $this->getRequestParameter('formulario'));
      $this->LlenarAttribute('contabc[reftra]', $this->getRequestParameter('formulario'));
      $this->LlenarAttribute('contabc[feccom]', $this->getRequestParameter('formulario'));
      $this->LlenarAttribute('contabc[descom]', $this->getRequestParameter('formulario'));
      $this->LlenarAttribute('debito', $this->getRequestParameter('formulario'));
      $this->LlenarAttribute('credito', $this->getRequestParameter('formulario'));
      $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
      $this->getUser()->getAttributeHolder()->remove('grid');
      $this->getUser()->setAttribute('grid',$grid,$this->getRequestParameter('formulario'));
      $this->getUser()->getAttribute('contabc[numcom]',$this->getUser()->getAttribute('formulario'));
      $this->getUser()->getAttribute('contabc[reftra]',$this->getUser()->getAttribute('formulario'));
    }
    $this->getUser()->getAttributeHolder()->remove('grabo');
    $this->getUser()->setAttribute('grabo', 'S', $this->getRequestParameter('formulario'));
    $this->redirect('confincomgen/salvaranu?id='.$this->contabc->getId());
  }

  public function executeSalvaranu()
  {
    $this->resp=$this->getUser()->getAttribute('grabar',null,$this->getUser()->getAttribute('formulario'));
    sfView::SUCCESS;
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
    $this->contabc = $this->getContabcOrCreate();
    $this->updateContabcFromRequest();
    $this->setVars();

    $this->labels = $this->getLabels();

    Herramientas::CargarDatosGrid($this,$this->obj);
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->error!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->error);
       $this->getRequest()->setError('',$err);
      }

      if($this->coderror1!=-1)
      {
       $err1 = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('',$err1);
      }

      if($this->coderror2!=-1)
      {
       $err2 = Herramientas::obtenerMensajeError($this->coderror2);
       $this->getRequest()->setError('',$err2);
      }
      if($this->coderror3!=-1)
      {
       $err2 = Herramientas::obtenerMensajeError($this->coderror3);
       $this->getRequest()->setError('',$err2);
      }
      if($this->coderror4!=-1)
      {
       $err4 = Herramientas::obtenerMensajeError($this->coderror4);
       $this->getRequest()->setError('contabc{numcom}',$err4);
      }
    }
    return sfView::SUCCESS;
  }

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->contabc = $this->getContabcOrCreate();
      $this->updateContabcFromRequest();

      //validar q el numcom no exista en CONTABC
      $c= new Criteria();
      $c->add(ContabcPeer::NUMCOM,$this->getRequestParameter('contabc[numcom]'));
      $datos = ContabcPeer::doSelectOne($c);
      if ($datos)
      {
 		$this->coderror4=196;
        return false;
      }

      if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('contabc[feccom]'))==true)
      {
        $this->coderror3=529;
        return false;
      }

      if ($this->getRequestParameter('debito')!=$this->getRequestParameter('credito'))
      {
      	$this->error=519;
      	return false;
      }

      if ($this->getRequestParameter('debito')=='0,00' && $this->getRequestParameter('credito')=='0,00')
      {
      	$this->error=536;
      	return false;
      }

      $this->configGrid();
      $grid = Herramientas::CargarDatosGrid($this,$this->obj);
      if (count($grid[0])==0)
      {
        $this->coderror1=520;
        return false;
      }
      else
      {
      	if (!Tesoreria::validarComprobanteDescuadrado($grid))
      	{
      	  $this->coderror2=519;
      	  return false;
      	}
      }

      return true;
    }else return true;
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
    if ($this->getRequestParameter('ajax')=='1')
    {
      $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }

  public function LlenarAttribute($nombre,$nombreformulario)
  {
    $this->getUser()->getAttributeHolder()->remove($nombre);
    $this->getUser()->setAttribute($nombre, $this->getRequestParameter($nombre),$nombreformulario);
  }
}
