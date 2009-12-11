<?php

/**
 * pagemiret actions.
 *
 * @package    Roraima
 * @subpackage pagemiret
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class pagemiretActions extends autopagemiretActions
{
	public  $coderror1=-1;

	
  
  
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
      $this->opordpag = $this->getOpordpagOrCreate();
      try{ $this->updateOpordpagFromRequest();}catch(Exception $ex){}
      if ($this->opordpag->getId()=="")
      {
      	if (Tesoreria::validaPeriodoCerrado($this->getRequestParameter('opordpag[fecemi]'))==true)
      	{
          $this->coderror1=529;
          return false;
      	}
      }
      return true;
    }else return true;
  }

  public function executeIndex()
  {
     return $this->redirect('pagemiret/edit');
  }

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->lonmas=strlen($this->mascara);
    $varemp = $this->getUser()->getAttribute('configemp');
    $this->numdesh="";
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiret',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numorddesh',$varemp['aplicacion']['tesoreria']['modulos']['pagemiret']))
	       {
	       	$this->numdesh=$varemp['aplicacion']['tesoreria']['modulos']['pagemiret']['numorddesh'];
	       }
	     }


    if ($this->getRequestParameter('formulario')!="")
    {
     $this->getUser()->setAttribute('formulario',$this->getRequestParameter('formulario'));
     $this->formulario=$this->getRequestParameter('formulario');
     $this->tipo=$this->getUser()->getAttribute('tipo',null,$this->getUser()->getAttribute('formulario'));
     $this->nomext   = Herramientas::getX('TIPCAU','Cpdoccau','Nomext',$this->tipo);
     $this->concepto = $this->getUser()->getAttribute('concepto',null,$this->getUser()->getAttribute('formulario'));
     $this->tiporet = $this->getUser()->getAttribute('tiporet',null,$this->getUser()->getAttribute('formulario'));
    }
    else
    {
     $this->formulario='';
     $this->tipo='';
     $this->concepto='';
     $this->tiporet='';
     $this->nomext   = '';
    }

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateOpordpagFromRequest();

      $this->saveOpordpag($this->opordpag);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pagemiret/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pagemiret/list');
      }
      else
      {
        return $this->redirect('pagemiret/edit');
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
  protected function saveOpordpag($opordpag)
  {
    $grid=Herramientas::CargarDatosGrid($this, $this->obj,true);
    OrdendePago::salvarPagemiret($opordpag, $grid);
    if ($this->getRequestParameter('formulario')!="")
    {
      $this->redirect('pagemiret/cerraropret?id='.$this->opordpag->getId());
    }
  }

  public function executeCerraropret()
  {
    sfView::SUCCESS;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOpordpagFromRequest()
  {
    $opordpag = $this->getRequestParameter('opordpag');
    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->lonmas=strlen($this->mascara);
    $varemp = $this->getUser()->getAttribute('configemp');
    $this->numdesh="";
	if ($varemp)
	if(array_key_exists('aplicacion',$varemp))
	 if(array_key_exists('tesoreria',$varemp['aplicacion']))
	   if(array_key_exists('modulos',$varemp['aplicacion']['tesoreria']))
	     if(array_key_exists('pagemiret',$varemp['aplicacion']['tesoreria']['modulos'])){
	       if(array_key_exists('numorddesh',$varemp['aplicacion']['tesoreria']['modulos']['pagemiret']))
	       {
	       	$this->numdesh=$varemp['aplicacion']['tesoreria']['modulos']['pagemiret']['numorddesh'];
	       }
	     }

    if ($this->getRequestParameter('formulario')!="")
    {
     $this->getUser()->setAttribute('formulario',$this->getRequestParameter('formulario'));
     $this->formulario=$this->getRequestParameter('formulario');
     $this->tipo=$this->getUser()->getAttribute('tipo',null,$this->getUser()->getAttribute('formulario'));
     $this->concepto = $this->getUser()->getAttribute('concepto',null,$this->getUser()->getAttribute('formulario'));
     $this->tiporet = $this->getUser()->getAttribute('tiporet',null,$this->getUser()->getAttribute('formulario'));
    }
    else
    {
     $this->formulario='';
     $this->tipo='';
     $this->concepto='';
     $this->tiporet='';
    }

    if (isset($opordpag['numord']))
    {
      $this->opordpag->setNumord($opordpag['numord']);
    }
    if (isset($opordpag['fecemi']))
    {
      if ($opordpag['fecemi'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecemi']))
          {
            $value = $dateFormat->format($opordpag['fecemi'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecemi'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecemi($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecemi(null);
      }
    }
    if (isset($opordpag['tipcau']))
    {
      $this->opordpag->setTipcau($opordpag['tipcau']);
    }
    if (isset($opordpag['nomext']))
    {
      $this->opordpag->setNomext($opordpag['nomext']);
    }
    if (isset($opordpag['desord']))
    {
      $this->opordpag->setDesord($opordpag['desord']);
    }
    if (isset($opordpag['cedrif']))
    {
      $this->opordpag->setCedrif($opordpag['cedrif']);
    }
    if (isset($opordpag['nomben']))
    {
      $this->opordpag->setNomben($opordpag['nomben']);
    }
    if (isset($opordpag['ctapag']))
    {
      $this->opordpag->setCtapag($opordpag['ctapag']);
    }
    if (isset($opordpag['descta']))
    {
      $this->opordpag->setDescta($opordpag['descta']);
    }
    if (isset($opordpag['tipfin']))
    {
      $this->opordpag->setTipfin($opordpag['tipfin']);
    }
    if (isset($opordpag['nomext2']))
    {
      $this->opordpag->setNomext2($opordpag['nomext2']);
    }
    if (isset($opordpag['codtip']))
    {
      $this->opordpag->setCodtip($opordpag['codtip']);
    }
    if (isset($opordpag['destip']))
    {
      $this->opordpag->setDestip($opordpag['destip']);
    }
    if (isset($opordpag['coduni']))
    {
      $this->opordpag->setCoduni($opordpag['coduni']);
    }
    if (isset($opordpag['monord']))
    {
      $this->opordpag->setMonord($opordpag['monord']);
    }
    if (isset($opordpag['status']))
    {
      $this->opordpag->setStatus($opordpag['status']);
    }
    if (isset($opordpag['aproba']))
    {
      $this->opordpag->setAproba($opordpag['aproba']);
    }
    if (isset($opordpag['fecven']))
    {
      if ($opordpag['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecven']))
          {
            $value = $dateFormat->format($opordpag['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecven(null);
      }
    }

    if (isset($opordpag['numsigecof']))
    {
      $this->opordpag->setNumsigecof($opordpag['numsigecof']);
    }
    if (isset($opordpag['fecsigecof']))
    {
      if ($opordpag['fecsigecof'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($opordpag['fecsigecof']))
          {
            $value = $dateFormat->format($opordpag['fecsigecof'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $opordpag['fecsigecof'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->opordpag->setFecsigecof($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->opordpag->setFecsigecof(null);
      }
    }
    if (isset($opordpag['expsigecof']))
    {
      $this->opordpag->setExpsigecof($opordpag['expsigecof']);
    }

  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo=' ',$codigo2=' ', $fecdes='', $fechas='')
  {
    /*$c = new Criteria();
    $c->addJoin(OpretordPeer::NUMORD, OpordpagPeer::NUMORD);
    $c->add(OpordpagPeer::TIPCAU, $codigo2);
    $c->add(OpretordPeer::CODTIP, $codigo);
    $c->add(OpretordPeer::NUMRET, 'NOASIGNA');
    $c->addAsColumn('NUMORD1',OpordpagPeer::NUMORD);
    $c->addAsColumn('FECEMI',OpordpagPeer::FECEMI);
    $c->addAsColumn('CODPRE',OpretordPeer::CODPRE);
    $c->addAsColumn('MONRET',OpretordPeer::MONRET);
    $all = OpretordPeer::doSelect($c);*/


    if(trim($fecdes)!=""){
    	$date = explode("/",$fecdes);
    	if(!isset($date[0])) $date[0] = 0;
    	if(!isset($date[1])) $date[1] = 0;
    	if(!isset($date[2])) $date[2] = 0;

    	$sqlfecdes = " AND A.FECEMI >= '$date[2]-$date[1]-$date[0]'";
    }else{
    	$sqlfecdes = "";
    }
    if(trim($fechas)!=""){
    	$date = explode("/",$fechas);
    	if(!isset($date[0])) $date[0] = 0;
    	if(!isset($date[1])) $date[1] = 0;
    	if(!isset($date[2])) $date[2] = 0;

    	$sqlfechas = " AND A.FECEMI <= '$date[2]-$date[1]-$date[0]' ";
    }else{
    	$sqlfechas = "";
    }

    $c =  new Criteria();
    $datos = OpdefempPeer::doSelectOne($c);
    if($datos){
    	$emichepag = $datos->getEmichepag();
    	if($emichepag == "S"){
    		$sqltabla = ", TSCHEEMI C";
    		$sqlche = " AND A.NUMCHE = C.NUMCHE AND A.CTABAN = C.NUMCUE AND C.STATUS = 'E'";
    	}else {
    		$sqlche = "";
    		$sqltabla = "";
    	}
    }else{
    	$emichepag = "";
    }

    $SQL="SELECT 0 as check, A.NUMORD as numord,A.FECEMI as fecemi,B.CODPRE as codpre,B.MONRET as monret, nomben as nomben, 9 as id FROM OPORDPAG A,OPRETORD B".$sqltabla." WHERE A.NUMORD = B.NUMORD AND B.CODTIP = '".$codigo."' AND B.NUMRET = 'NOASIGNA' ".$sqlche.$sqlfecdes.$sqlfechas ." order by a.fecemi, a.numord";

    $resp = Herramientas::BuscarDatos($SQL,&$all);
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Opretord');
    $opciones->setAnchoGrid(750);
    $opciones->setAncho(800);
    $opciones->setTitulo('');
    $opciones->setFilas(0);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setNombreCampo('check');
    $col1->setEsGrabable(true);
    $col1->setCheckbox(true);
    $col1->setHTML(' ');
    $col1->setJScript('onClick="totalmarcadas(this.id)"');

    $col2 = new Columna('Nro. Orden');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('numord');
    $col2->setHTML('type="text" size="10" readonly=true');

    $col3 = new Columna('Fecha');
  	$col3->setTipo(Columna::FECHA);
	$col3->setEsGrabable(true);
	$col3->setNombreCampo('fecemi');
	$col3->setAlineacionObjeto(Columna::CENTRO);
	$col3->setAlineacionContenido(Columna::CENTRO);
	$col3->setHTML('type="text" size="10" readonly=true');

    $col4 = new Columna('Beneficiario');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomben');
    $col4->setHTML('type="text" size="25" readonly=true');

    $col5 = new Columna('Código Presupuestario');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codpre');
    $col5->setHTML('type="text" size="25" readonly=true');

    $col6 = new Columna('Monto Retención');
    $col6->setTipo(Columna::MONTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setNombreCampo('monret');
    $col6->setEsNumerico(true);
    $col6->setHTML('type="text" size="10" readonly=true');
    //$col6->setEsTotal(true,'opordpag_monord');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);

    $this->obj = $opciones->getConfig($all);
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
    $cuenta=$this->getRequestParameter('cuenta');
    $descta=$this->getRequestParameter('descuenta');
  if ($this->getRequestParameter('ajax')=='1')
  {
    $dato=CpdoccauPeer::getNombre($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
  }
  else  if ($this->getRequestParameter('ajax')=='2')
  {
    $dato=OpbenefiPeer::getDato($this->getRequestParameter('codigo'),'Nomben');
    $dato1=OpbenefiPeer::getDato($this->getRequestParameter('codigo'),'Codcta');
    $dato2=OpbenefiPeer::getDato2($dato1,'Descta');
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cuenta.'","'.$dato1.'",""],["'.$descta.'","'.$dato2.'",""]]';
  }
  else  if ($this->getRequestParameter('ajax')=='3')
  {
    $dato=ContabbPeer::getDescta($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
  }
  else  if ($this->getRequestParameter('ajax')=='4')
  {
    $dato=FortipfinPeer::getDesfin($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
  }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  return sfView::HEADER_ONLY;
  }

  public function executeAutocomplete()
  {
  if ($this->getRequestParameter('ajax')=='2')
  {
    $this->tags=Herramientas::autocompleteAjax('CEDRIF','Opbenefi','Cedrif',$this->getRequestParameter('opordpag[cedrif]'));
  }
  else  if ($this->getRequestParameter('ajax')=='4')
  {
    $this->tags=Herramientas::autocompleteAjax('CODFIN','Fortipfin','Codfin',$this->getRequestParameter('opordpag[tipfin]'));
    }
    else  if ($this->getRequestParameter('ajax')=='5')
  {
    $this->tags=Herramientas::autocompleteAjax('CODTIP','Optipret','Codtip',$this->getRequestParameter('opordpag[codtip]'));
    }
  }

  public function executeGrid()
  {
  $cajtexmos=$this->getRequestParameter('cajtexmos');
  $cajtexcom=$this->getRequestParameter('cajtexcom');
  $cuenta=$this->getRequestParameter('cuenta');
  $descta=$this->getRequestParameter('descuenta');
  if ($this->getRequestParameter('ajax')=='5')
  {
    $dato=OptipretPeer::getRetencion($this->getRequestParameter('codigo'));
    $fecdes = $this->getRequestParameter('fecdes');
    $fechas = $this->getRequestParameter('fechas');

    $this->configGrid($this->getRequestParameter('codigo'),$this->getRequestParameter('codigo2'),$fecdes,$fechas);

    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["fila","'.$this->numfila.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  }
   else  if ($this->getRequestParameter('ajax')=='2')
   {
    $dato=OpbenefiPeer::getDato($this->getRequestParameter('codigo'),'Nomben');
    $dato1=OpbenefiPeer::getDato($this->getRequestParameter('codigo'),'Codcta');
    $dato2=OpbenefiPeer::getDato2($dato1,'Descta');
    $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cuenta.'","'.$dato1.'",""],["'.$descta.'","'.$dato2.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
   }
  }


 protected function getOpordpagOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $opordpag = new Opordpag();
      $this->configGrid($this->getRequestParameter('opordpag[codtip]'),$this->getRequestParameter('opordpag[tipcau]'));
    }
    else
    {
      $opordpag = OpordpagPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($opordpag);
    }

    return $opordpag;
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
    $this->opordpag = $this->getOpordpagOrCreate();
    $this->updateOpordpagFromRequest();

    $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
    $this->lonmas=strlen($this->mascara);
    if ($this->getRequestParameter('formulario')!="")
    {
     $this->getUser()->setAttribute('formulario',$this->getRequestParameter('formulario'));
     $this->formulario=$this->getRequestParameter('formulario');
     $this->tipo=$this->getUser()->getAttribute('tipo',null,$this->getUser()->getAttribute('formulario'));
     $this->concepto = $this->getUser()->getAttribute('concepto',null,$this->getUser()->getAttribute('formulario'));
     $this->tiporet = $this->getUser()->getAttribute('tiporet',null,$this->getUser()->getAttribute('formulario'));
    }
    else
    {
     $this->formulario='';
     $this->tipo='';
     $this->concepto='';
     $this->tiporet='';
    }
    $this->labels = $this->getLabels();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('opordpag{fecemi}',$err);
      }
    }

    return sfView::SUCCESS;
  }
}
