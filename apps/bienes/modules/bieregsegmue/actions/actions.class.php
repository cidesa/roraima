<?php

/**
 * bieregsegmue actions.
 *
 * @package    Roraima
 * @subpackage bieregsegmue
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class bieregsegmueActions extends autobieregsegmueActions
{

  private $coderror = -1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->bnsegmue = $this->getBnsegmueOrCreate();
    $this->setVars();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateBnsegmueFromRequest();

      $this->saveBnsegmue($this->bnsegmue);

      $this->setFlash('notice', 'Your modifications have been saved');
     $this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('bieregsegmue/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('bieregsegmue/list');
      }
      else
      {
        return $this->redirect('bieregsegmue/edit?id='.$this->bnsegmue->getId());
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
  protected function updateBnsegmueFromRequest()
  {
    $bnsegmue = $this->getRequestParameter('bnsegmue');

    if (isset($bnsegmue['codact']))
    {
      $this->bnsegmue->setCodact($bnsegmue['codact']);
    }
    if (isset($bnsegmue['codmue']))
    {
      $this->bnsegmue->setCodmue($bnsegmue['codmue']);
    }
    if (isset($bnsegmue['nrosegmue']))
    {
      $this->bnsegmue->setNrosegmue($bnsegmue['nrosegmue']);
    }
    if (isset($bnsegmue['fecsegmue']))
    {
      if ($bnsegmue['fecsegmue'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnsegmue['fecsegmue']))
          {
            $value = $dateFormat->format($bnsegmue['fecsegmue'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnsegmue['fecsegmue'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnsegmue->setFecsegmue($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnsegmue->setFecsegmue(null);
      }
    }
    if (isset($bnsegmue['nomsegmue']))
    {
      $this->bnsegmue->setNomsegmue($bnsegmue['nomsegmue']);
    }
/*    if (isset($bnsegmue['cobsegmue']))
    {
      $this->bnsegmue->setCobsegmue($bnsegmue['cobsegmue']);
    }
   if (isset($bnsegmue['monsegmue']))
    {
      $this->bnsegmue->setMonsegmue($bnsegmue['monsegmue']);
    }*/
    if (isset($bnsegmue['fecsegven']))
    {
      if ($bnsegmue['fecsegven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($bnsegmue['fecsegven']))
          {
            $value = $dateFormat->format($bnsegmue['fecsegven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $bnsegmue['fecsegven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->bnsegmue->setFecsegven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->bnsegmue->setFecsegven(null);
      }
    }
    if (isset($bnsegmue['prosegmue']))
    {
      $this->bnsegmue->setProsegmue($bnsegmue['prosegmue']);
    }
    if (isset($bnsegmue['obssegmue']))
    {
      $this->bnsegmue->setObssegmue($bnsegmue['obssegmue']);
    }
    if (isset($bnsegmue['stasegmue']))
    {
      $this->bnsegmue->setStasegmue($bnsegmue['stasegmue']);
    }
  }


  public function setVars()
  {
      $this->mascaracatalogo = Herramientas::getX_vacio('codins','bndefins','ForAct','001');
      $this->mascaraformatoubi = Herramientas::getX_vacio('codins','bndefins','ForUbi','001');
      $this->mascaralonformato = Herramientas::getX_vacio('codins','bndefins','LonAct','001');
      $this->mascaralonubicacion = Herramientas::getX_vacio('codins','bndefins','LonUbi','001');
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
    $cajtexmos=$this->getRequestParameter('cajtexmos','');
    $cajtexcom=$this->getRequestParameter('cajtexcom','');
    $javascript="";


    switch ($ajax){
	 case '0':

      $descob=BncobsegPeer::getDesubi($codigo);
      $output = '[["'.$cajtexmos.'","'.$descob.'",""],["'.$cajtexcom.'","4","c"]]';

     break;
      case '1':
        $desmue="";
      	$c= new Criteria();
        $c->add(BnregmuePeer::CODACT,$this->getRequestParameter('codactivo'));
        $c->add(BnregmuePeer::CODMUE,$codigo);
        $reg=BnregmuePeer::doSelectOne($c);
        if ($reg)
        {
            if ($reg->getStamue()=='D')
            {
             $javascript="alert('El Mueble esta desincorporado'); $('$cajtexcom').value='';";
            }else{
              $desmue=$reg->getDesmue();
            }
        }else{
            $javascript="alert('El Mueble no existe'); $('$cajtexcom').value='';";
        }
      	$output = '[["'.$cajtexmos.'","'.$desmue.'",""],["javascript","'.$javascript.'",""]]';

      break;

      case '2':

        $output = '[["'.$cajtexcom.'","'.$codigo.'",""],["'.$cajtexcom.'","6","c"]]';

        break;

      case '3':

      $dato=BncobsegPeer::getDesubi($codigo);

        $output = '[["'.$cajtexcom.'","'.$dato.'",""],["'.$cajtexmos.'","4","c"]]';

        break;

        default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    return sfView::HEADER_ONLY;

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
  public function saveBnsegmue($Bnsegmue)
  {
    $coderr = -1;

    try {
      $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      $coderr = Muebles::salvarbieregsegmue($Bnsegmue,$grid);

      if(is_array($coderr)){
        foreach ($coderror as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }

    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderr);
      $this->getRequest()->setError('',$err);

    }


  }


  public function deleteBnsegmue($Bnsegmue)
  {

    $coderr = -1;

    try {

      $c= new Criteria();
      $c->add(BncobsegmuePeer::CODMUE,$this->bnsegmue->getCodmue());
      $c->add(BncobsegmuePeer::CODACT,$this->bnsegmue->getCodact());
      $c->add(BncobsegmuePeer::NROSEGMUE,$this->bnsegmue->getNrosegmue());
      BncobsegmuePeer::doDelete($c);
      parent::deleteBnsegmue($Bnsegmue);

      if(is_array($coderr)){
        foreach ($coderror as $ERR){
          $err = Herramientas::obtenerMensajeError($ERR);
          $this->getRequest()->setError('',$err);
          $this->ActualizarGrid();
        }
      }elseif($coderr!=-1){
        $err = Herramientas::obtenerMensajeError($coderror);
        $this->getRequest()->setError('',$err);
        $this->ActualizarGrid();
      }


    } catch (Exception $ex) {

      $coderror = 0;
      $err = Herramientas::obtenerMensajeError($coderror);
      $this->getRequest()->setError('',$err);

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
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
       $this->bnsegmue = $this->getBnsegmueOrCreate();
       $this->updateBnsegmueFromRequest();
	   $this->configGrid();
	   $grid=Herramientas::CargarDatosGrid($this,$this->obj);

    if (!$this->bnsegmue->getId())
     { Muebles::validarBieregsegmue($this->bnsegmue,&$msj);
      $this->coderror=$msj;
     }
      if ($this->coderror<>-1)
      {
        return false;
      }else return true;
    }else return true;
  }


  public function executeAutocomplete()
  {
  	if ($this->getRequestParameter('ajax')=='0')
      {
       $this->tags=Herramientas::autocompleteAjax('CODMUE','Bnregmue','codmue',trim($this->getRequestParameter('bnsegmue[codmue]')));
       //$this->tags=$this->tags+Herramientas::autocompleteAjax('CODACT','Bnregmue','desmue',trim($this->getRequestParameter('bnsegmue[codact]')));
       //dato1=BnregmuePeer::getDesmue($codigo,$dato);
      }else
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('CODACT','Bnregmue','codact',trim($this->getRequestParameter('bnsegmue[codact]')));
       //$this->tags=$this->tags+Herramientas::autocompleteAjax('CODACT','Bnregmue','desmue',trim($this->getRequestParameter('bnsegmue[codact]')));
       //dato1=BnregmuePeer::getDesmue($codigo,$dato);
      }else
    if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',trim($this->getRequestParameter('bnsegmue[cobsegmue]')));
      }else
    if ($this->getRequestParameter('ajax')=='3')
      {
       //$this->tags=Herramientas::autocompleteAjax('CODCOB','Bncobseg','codcob',trim($this->getRequestParameter('bnsegmue[cobsegmue]')));
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
    $this->bnsegmue = $this->getBnsegmueOrCreate();
    $this->updateBnsegmueFromRequest();
	$this->setVars();
	$this->configGrid();
	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    $this->labels = $this->getLabels();

	 if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror!=-1){
        $err = Herramientas::obtenerMensajeError($this->coderror);
        $this->getRequest()->setError('bnsegmue{nrosegmue}',$err);
      }
    }
    return sfView::SUCCESS;
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
      $c= new Criteria();
      $c->add(BncobsegmuePeer::CODMUE,$this->bnsegmue->getCodmue());
      $c->add(BncobsegmuePeer::CODACT,$this->bnsegmue->getCodact());
      $c->add(BncobsegmuePeer::NROSEGMUE,$this->bnsegmue->getNrosegmue());

      $per=BncobsegmuePeer::doSelect($c);

      $opciones = new OpcionesGrid();
      $opciones->setEliminar(true);
      $opciones->setTabla('Bncobsegmue');
      $opciones->setAnchoGrid(650);
      $opciones->setAncho(650);
      $opciones->setName('a');
      $opciones->setTitulo('Coberturas');
      $opciones->setHTMLTotalFilas(' ');
      $opciones->setFilas(10);


      $obj= array ('codcob' => '1','descob' =>'2');
      $col1 = new Columna('Código Cobertura');
      $col1->setTipo(Columna::TEXTO);
      $col1->setEsGrabable(true);
      $col1->setAlineacionObjeto(Columna::CENTRO);
      $col1->setAlineacionContenido(Columna::CENTRO);
      $col1->setNombreCampo('codcob');
      $col1->setHTML('type="text" size="10"');
      $col1->setCatalogo('Bncobseg','sf_admin_edit_form',$obj,'Bncobseg_Bieregsegmue');
	  $col1->setAjax('bieregsegmue',0,2);



	  $col2 = new Columna('Nombre');
      $col2->setTipo(Columna::TEXTO);
      $col2->setAlineacionObjeto(Columna::IZQUIERDA);
      $col2->setAlineacionContenido(Columna::IZQUIERDA);
      $col2->setNombreCampo('descob');
      $col2->setHTML('type="text" size="50" readonly=true');

       $col3 = new Columna('Monto');
       $col3->setEsGrabable(true);
       $col3->setTipo(Columna::MONTO);
       $col3->setAlineacionContenido(Columna::DERECHA);
       $col3->setAlineacionObjeto(Columna::DERECHA);
       $col3->setNombreCampo('monto');
       $col3->setEsNumerico(true);
       $col3->setHTML('type="text" size="10"');
       $col3->setJScript('onKeypress="entermonto(event,this.id)"');

      $opciones->addColumna($col1);
      $opciones->addColumna($col2);
      $opciones->addColumna($col3);
      $this->obj = $opciones->getConfig($per);
  }
}
