<?php

/**
 * nomdefespcar actions.
 *
 * @package    Roraima
 * @subpackage nomdefespcar
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefespcarActions extends autonomdefespcarActions
{
  public $coderror1=-1;

  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npcargos = $this->getNpcargosOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpcargosFromRequest();

      $this->saveNpcargos($this->npcargos);

      $this->npcargos->setId(Herramientas::getX_vacio('codcar','npcargos','id',$this->npcargos->getCodcar()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespcar/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespcar/list');
      }
      else
      {
        return $this->redirect('nomdefespcar/edit?id='.$this->npcargos->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
	  $varemp = $this->getUser()->getAttribute('configemp');
	  if(is_array($varemp))
	    if(array_key_exists('aplicacion',$varemp))
	  	  if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomdefespcar',$varemp['aplicacion']['nomina']['modulos']))
		       if(array_key_exists('graocp',$varemp['aplicacion']['nomina']['modulos']['nomdefespcar']))
	  		     $this->labels['npcargos{graocp}'] = $varemp['aplicacion']['nomina']['modulos']['nomdefespcar']['graocp'];

    }
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpcargosFromRequest()
  {
    $npcargos = $this->getRequestParameter('npcargos');
    $this->setVars();

    if (isset($npcargos['codcar']))
    {
      $this->npcargos->setCodcar($npcargos['codcar']);
    }
    if (isset($npcargos['nomcar']))
    {
      $this->npcargos->setNomcar($npcargos['nomcar']);
    }
    if (isset($npcargos['codtip']))
    {
      $this->npcargos->setCodtip($npcargos['codtip']);
    }
    if (isset($npcargos['graocp']))
    {
      $this->npcargos->setGraocp($npcargos['graocp']);
    }
    if (isset($npcargos['suecar']))
    {
      $this->npcargos->setSuecar($npcargos['suecar']);
    }
    if (isset($npcargos['punmin']))
    {
      $this->npcargos->setPunmin($npcargos['punmin']);
    }
    if (isset($npcargos['stacar']))
    {
      $this->npcargos->setStacar($npcargos['stacar']);
    }
    if (isset($npcargos['profecargo']))
    {
      $this->npcargos->setProfecargo($npcargos['profecargo']);
    }
	if (isset($npcargos['comcar']))
    {
      $this->npcargos->setComcar($npcargos['comcar']);
    }
	if (isset($npcargos['pricar']))
    {
      $this->npcargos->setPricar($npcargos['pricar']);
    }
	if (isset($npcargos['canmuj']))
    {
      $this->npcargos->setCanmuj($npcargos['canmuj']);
    }
	if (isset($npcargos['canhom']))
    {
      $this->npcargos->setCanhom($npcargos['canhom']);
    }
	if (isset($npcargos['carvan']))
    {
      $this->npcargos->setCarvan($npcargos['carvan']);
    }

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
	  		$dato=NpcomocpPeer::getSuecar($this->getRequestParameter('codtipcar'),$this->getRequestParameter('codgra'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","3","c"]]';
	    }
	  if ($this->getRequestParameter('ajax')=='2')
	    {

	  		$dato=Herramientas::getX('codtipcar','Nptipcar','destipcar',$this->getRequestParameter('codtip'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	     else  if ($this->getRequestParameter('ajax')=='3')
      {
        $dato=NpperfilPeer::getDesperfil($this->getRequestParameter('codigo'));
          $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$cajtexcom.'","4","c"]]';
      }
      else  if ($this->getRequestParameter('ajax')=='4')
      {
        $javascript="";
        $porcent=H::tofloat($this->getRequestParameter('npcargos[porcen]'));
        if ($porcent>0)
        {
         if ($porcent<=100)
         {
	        $p= new Criteria();
	        $reg= NpcargosPeer::doSelect($p);
	        if ($reg)
	        {
	         foreach ($reg as $obj)
	         {
	           $adi=(($obj->getSuecar()*$porcent)/100);
	           $obj->setSuecar($obj->getSuecar()+$adi);
	           $obj->save();
	         }
	        }
         }else{
         	$javascript="alert('El Porcentaje a Aumentar no puede sobrepasar el 100 %');";
         }
        }else{
        	$javascript="alert('El Porcentaje a Aumentar debe ser Mayor a cero');";
        }

        $output = '[["javascript","'.$javascript.'",""]]';
      }

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODTIPCAR','Nptipcar','CODTIPCAR',$this->getRequestParameter('npcargos[codtip]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('GRACAR','Npcomocp','GRACAR',$this->getRequestParameter('npcargos[graocp]'));
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
  protected function saveNpcargos($npcargos)
  {
  	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
    Nomina::salvarNomdefespcar($npcargos,$this->getRequestParameter('associated_profecargo'),$grid);
  }

  protected function getNpcargosOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npcargos = new Npcargos();
      $this->configGrid();
    }
    else
    {
      $npcargos = NpcargosPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($npcargos->getCodcar());
      $this->forward404Unless($npcargos);
    }

    return $npcargos;
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
    $this->npcargos = $this->getNpcargosOrCreate();
    $this->updateNpcargosFromRequest();
    $this->setVars();

    Herramientas::CargarDatosGrid($this,$this->obj);
    $this->configGrid();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('npcargos{codcar}',$err);
      }
    }

    $this->labels = $this->getLabels();

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
        $this->npcargos = $this->getNpcargosOrCreate();
        $this->updateNpcargosFromRequest();

        $this->coderror1=Nomina::validarNomdefespcar($this->npcargos);
        if ($this->coderror1<>-1){
          return false;
        }else return true;

      }else return true;
    }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
  {
    $c = new Criteria();
    $c->add(NppercarPeer::CODCAR,$codigo);
    $per = NppercarPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Nppercar');
    $opciones->setAnchoGrid(600);
    $opciones->setAncho(600);
    $opciones->setTitulo('');
    $opciones->setFilas(10);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codperfil');
    $col1->setCatalogo('npperfil','sf_admin_edit_form',array('codperfil' => 1,'desperfil' => 2),'Npperfil_Nomdefespcar');
    $col1->setJScript('onBlur="javascript:event.keyCode=13; ajax(event,this.id)"');


    $col2 = new Columna('Descripción del Perfil');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('desperfil');
    $col2->setHTML('type="text" size="25" readonly="true"');

    $col3 = new Columna('Puntuación');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setNombreCampo('puntos');
    $col3->setEsNumerico(true);
    $col3->setHTML('type="text" size="10"');
    $col3->setJScript('onKeypress="entermonto(event,this.id)"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj = $opciones->getConfig($per);
  }

  public function setVars()
  {
	$this->mascaracargo = Herramientas::ObtenerFormato('Npdefgen','Forcar');
	$this->lonmascar = strlen($this->mascaracargo);
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->npcargos = NpcargosPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->npcargos);

    $id=$this->getRequestParameter('id');
    if (!Nomina::Buscar_CodigoHijo2($this->npcargos->getCodcar()))
    {
      $c=new Criteria();
      $c->add(NpasicarnomPeer::CODCAR,$this->npcargos->getCodcar());
      $dato=NpasicarnomPeer::doSelect($c);
      if (!$dato)
      {
       $this->deleteNpcargos($this->npcargos);
       $this->Bitacora('Elimino');
      }
      else
      {
       $this->setFlash('notice','El Cargo no puede ser eliminado, ya que se encuentra asociado a una Nómina');
       return $this->redirect('nomdefespcar/edit?id='.$id);
      }
    }
    else
    {
     	$this->setFlash('notice','El Cargo no puede ser eliminado, ya que posee cargos que dependen de el');
        return $this->redirect('nomdefespcar/edit?id='.$id);
    }

    return $this->redirect('nomdefespcar/list');
  }

  protected function deleteNpcargos($npcargos)
  {
    Herramientas::EliminarRegistro('Npprocar','Codcar',$npcargos->getCodcar());
    Herramientas::EliminarRegistro('Nppercar','Codcar',$npcargos->getCodcar());
    $npcargos->delete();
  }

}
