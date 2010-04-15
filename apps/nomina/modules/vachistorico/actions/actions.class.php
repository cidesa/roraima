<?php

/**
 * vachistorico actions.
 *
 * @package    Roraima
 * @subpackage vachistorico
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 33315 2009-09-23 14:42:43Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class vachistoricoActions extends autovachistoricoActions
{
	// variable donde se debe colocar el código de error generado en el validateEdit
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/nphojint/filters');

    // pager
    $this->pager = new sfPropelPager('Nphojint', 10);
    $c = new Criteria();
    $c->addJoin(NpvacdisfrutePeer::CODEMP,NphojintPeer::CODEMP);
    $c->setDistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
    }

  protected function getNphojintOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $nphojint = new Nphojint();
      $this->configGrid($this->getRequestParameter('nphojint[codemp]'),$this->getRequestParameter('nphojint[fecing]'));
    }
    else
    {
      $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter($id));
	$this->configGrid($nphojint->getCodemp(),$nphojint->getFecing());
      $this->forward404Unless($nphojint);
    }

    return $nphojint;
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codemp='',$fecing='')
  {
  	$arreglo = array();
 	Nomina::ArregloVacaciones($codemp,$fecing,&$arreglo);

 	/**
 	 * Para calcular los dias pendientes
 	 * */
 	 foreach($arreglo as $reg)
 	 {
 	 	$this->diaspen+=$reg["diaspdisfrutar"];
 	 }
    /************************************/
    $per = $arreglo;
    $cero=0;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npvacdisfrute');
    $opciones->setAnchoGrid(500);
    $opciones->setAncho(500);
    $opciones->setName('a');
    $opciones->setFilas($cero);
    $opciones->setTitulo('');

    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Periodo Desde');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('perini');
    $col1->setHTML('type="text" size="4" readonly= true');

    $col2 = new Columna('Periodo Hasta');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('perfin');
    $col2->setHTML('type="text" size="4"  readonly= true');

    $col3 = new Columna('Dias a disfrutar');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('diasdisfutar');
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setJScript('onBlur="javascript:event.keyCode=13; enternumero(event,this.id); calcular_dias(this.id)"');
    $col3->setHTML('type="text" size="8" ' );

    $col4 = new Columna('Dias disfrutados');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('diasdisfrutados');
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setJScript('onBlur="javascript:event.keyCode=13; enternumero(event,this.id); calcular_dias2(this.id)"');
    $col4->setHTML('type="text" size="8"');

    $col5 = new Columna('Dias por disfrutar');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(false);
    $col5->setNombreCampo('diaspdisfrutar');
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setHTML('type="text" size="8" ');

	$col6 = new Columna('Dias de Bono Vacacional');
    $col6->setTipo(Columna::TEXTO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('diasbonovac');
	$col6->setJScript('onBlur="javascript:event.keyCode=13; enternumero(event,this.id);"');
    $col6->setAlineacionObjeto(Columna::DERECHA);
    $col6->setAlineacionContenido(Columna::DERECHA);
    $col6->setHTML('type="text" size="8" ');

	$col7 = new Columna('Dias de Bono Vacacional Pagados');
    $col7->setTipo(Columna::TEXTO);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('diasbonovacpag');
	$col7->setJScript('onBlur="javascript:event.keyCode=13; enternumero(event,this.id);"');
    $col7->setAlineacionObjeto(Columna::DERECHA);
    $col7->setAlineacionContenido(Columna::DERECHA);
    $col7->setHTML('type="text" size="8" ');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
	$opciones->addColumna($col6);
    $opciones->addColumna($col7);

    $this->obj = $opciones->getConfig($per);

  }

 /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
  	$cajtexcom=$this->getRequestParameter('cajtexcom');
    $cajtexnom=$this->getRequestParameter('cajtexnom');
    $cajtexfec=$this->getRequestParameter('cajtexfec');
    $cajadias=$this->getRequestParameter('cajadias');
    $codigoemp=$this->getRequestParameter('codigo');
    $js="";
    $nombre="";
    $fechaing="";

   if ($this->getRequestParameter('ajax')=='1')
   {
   	 if (trim($codigoemp)<>'')
	  {
	     $x=Herramientas::getX_vacio('codemp','Npvacdisfrute','codemp',$this->getRequestParameter('codigo'));
	     if (trim($x)!="")
	     {
	     	$js.="$('$cajtexcom').value='';";
		 	$js.="alert('Empleado con vacaciones ya registradas consulte la lista para modificaciones');";
		 	$js.="$('$cajtexcom').focus();";
		 	$this->configGrid();
	     	$output = '[["'.$cajtexnom.'","'.$nombre.'",""],["'.$cajtexfec.'","'.$fechaing.'",""],["'.$cajadias.'","",""],["javascript","'.$js.'",""]]';
	     	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	     }
		 else
		 {
		 	$nombre   = NphojintPeer::getNomemp($codigoemp);
	     	$fechaing = NphojintPeer::getFecing($codigoemp);
	     	$this->configGrid($codigoemp,$fechaing);
	     	$output = '[["'.$cajtexnom.'","'.$nombre.'",""],["'.$cajtexfec.'","'.$fechaing.'",""],["'.$cajadias.'","'.$this->diaspen.'",""],["javascript","'.$js.'",""]]';
	     	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		 }



	  }else
	  {
	  	$output = '[["'.$cajtexnom.'","'.$nombre.'",""],["'.$cajtexfec.'","'.$fechaing.'",""],["'.$cajadias.'","",""],["javascript","'.$js.'",""]]';
	  	$this->configGrid();
	  	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	  }


    }

   }

 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
  	$this->diaspen=0;
    $this->nphojint = $this->getNphojintOrCreate();


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {

      $this->updateNphojintFromRequest();

      $this->saveNphojint($this->nphojint);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('vachistorico/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('vachistorico/list');
      }
      else
      {
        return $this->redirect('vachistorico/edit?id='.$this->nphojint->getId());
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
  protected function updateNphojintFromRequest()
  {
    $nphojint = $this->getRequestParameter('nphojint');

    if (isset($nphojint['codemp']))
    {
      $this->nphojint->setCodemp($nphojint['codemp']);
    }
    if (isset($nphojint['nomemp']))
    {
      $this->nphojint->setNomemp($nphojint['nomemp']);
    }
    if (isset($nphojint['fecing']))
    {
      if ($nphojint['fecing'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecing']))
          {
            $value = $dateFormat->format($nphojint['fecing'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecing'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecing($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecing(null);
      }
    }
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
  protected function saveNphojint($nphojint)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);//0
    Nomina::salvarNphojint($nphojint,$grid);

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
      $this->nphojint = $this->getNphojintOrCreate();
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

        $this->updateNphojintFromRequest();
        $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
        if(count($grid[0])>0)
        	self::$coderror=EmpleadosBanco::Validar_Datos_Grid_Vacdis($grid);
        else
        	self::$coderror=437;

       if ((self::$coderror<>-1))
        {
                return false;

        }else return true;

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
    $this->nphojint = $this->getNphojintOrCreate();
    $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter('id'));
    if($nphojint)
		$this->configGrid($nphojint->getCodemp(),$nphojint->getFecing());
	else
		$this->configGrid();

   try{
     $this->updateNphojintFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror!=-1)
        {
        	$err = Herramientas::obtenerMensajeError(self::$coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }
  /**
   * Función principal para procesar la eliminación de registros
   * en el formulario.
   *
   */
  public function executeDelete()
  {
  	$obj = NphojintPeer::retrieveByPk($this->getRequestParameter('id'));
    $c = new Criteria();
	$c->add(NpvacdisfrutePeer::CODEMP,$obj->getCodemp());
	$rs = NpvacdisfrutePeer::doDelete($c);
	if($rs)
	{
		$this->SalvarBitacora($this->getRequestParameter('id') ,'Elimino');
		$this->setFlash('notice','Registro Eliminado exitosamente');
	}else
	{

	}
    return $this->redirect('vachistorico/edit');

  }


}
