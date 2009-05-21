<?php

/**
 * forcargos actions.
 *
 * @package    siga
 * @subpackage forcargos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class forcargosActions extends autoforcargosActions
{

   public $coderror1=-1;

  public function executeEdit()
  {
    $this->forcargos = $this->getForcargosOrCreate();
    $this->setVars();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateForcargosFromRequest();

      $this->saveForcargos($this->forcargos);

      $this->forcargos->setId(Herramientas::getX_vacio('codcar','forcargos','id',$this->forcargos->getCodcar()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('forcargos/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('forcargos/list');
      }
      else
      {
        return $this->redirect('forcargos/edit?id='.$this->forcargos->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  protected function updateForcargosFromRequest()
  {
    $forcargos = $this->getRequestParameter('forcargos');
    $this->setVars();

    if (isset($forcargos['codcar']))
    {
      $this->forcargos->setCodcar($forcargos['codcar']);
    }
    if (isset($forcargos['nomcar']))
    {
      $this->forcargos->setNomcar($forcargos['nomcar']);
    }
    if (isset($forcargos['codtip']))
    {
      $this->forcargos->setCodtip($forcargos['codtip']);
    }
    if (isset($forcargos['graocp']))
    {
      $this->forcargos->setGraocp($forcargos['graocp']);
    }
    if (isset($forcargos['suecar']))
    {
      $this->forcargos->setSuecar($forcargos['suecar']);
    }
    if (isset($forcargos['punmin']))
    {
      $this->forcargos->setPunmin($forcargos['punmin']);
    }
    if (isset($forcargos['stacar']))
    {
      $this->forcargos->setStacar($forcargos['stacar']);
    }
    if (isset($forcargos['profecargo']))
    {
      $this->forcargos->setProfecargo($forcargos['profecargo']);
    }
	if (isset($forcargos['comcar']))
    {
      $this->forcargos->setComcar($forcargos['comcar']);
    }
	if (isset($forcargos['pricar']))
    {
      $this->forcargos->setPricar($forcargos['pricar']);
    }
	if (isset($forcargos['canmuj']))
    {
      $this->forcargos->setCanmuj($forcargos['canmuj']);
    }
	if (isset($forcargos['canhom']))
    {
      $this->forcargos->setCanhom($forcargos['canhom']);
    }
  }


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

  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
	}

	public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODTIPCAR','Nptipcar','CODTIPCAR',$this->getRequestParameter('forcargos[codtip]'));
	    }
	    else if ($this->getRequestParameter('ajax')=='2')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('GRACAR','Npcomocp','GRACAR',$this->getRequestParameter('forcargos[graocp]'));
	    }
	}

protected function saveForcargos($forcargos)
  {
  	$grid=Herramientas::CargarDatosGrid($this,$this->obj);
	#H::printr($forcargos);
    Formulacion::salvarForcargos($forcargos,$this->getRequestParameter('associated_profecargo'),$grid);
  }

  protected function getForcargosOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $forcargos = new Forcargos();
      $this->configGrid();
    }
    else
    {
      $forcargos = ForcargosPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($forcargos->getCodcar());
      $this->forward404Unless($forcargos);
    }

    return $forcargos;
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->forcargos = $this->getForcargosOrCreate();
    $this->updateForcargosFromRequest();
    $this->setVars();

    Herramientas::CargarDatosGrid($this,$this->obj);
    $this->configGrid();

    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if($this->coderror1!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror1);
       $this->getRequest()->setError('forcargos{codcar}',$err);
      }
    }

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  public function validateEdit()
    {
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        $this->forcargos = $this->getForcargosOrCreate();
        $this->updateForcargosFromRequest();

        $this->coderror1=Nomina::validarNomdefespcar($this->forcargos);
        if ($this->coderror1<>-1){
          return false;
        }else return true;

      }else return true;
    }

  public function configGrid($codigo='')
  {
    $c = new Criteria();
    $c->add(NppercarPeer::CODCAR,$codigo);
    $per = NppercarPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Nppercar');
    $opciones->setAnchoGrid(700);
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

  public function executeDelete()
  {
    $this->forcargos = ForcargosPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->forcargos);

    $id=$this->getRequestParameter('id');
    if (!Nomina::Buscar_CodigoHijo2($this->forcargos->getCodcar()))
    {
      $c=new Criteria();
      $c->add(NpasicarnomPeer::CODCAR,$this->forcargos->getCodcar());
      $dato=NpasicarnomPeer::doSelect($c);
      if (!$dato)
      {
       $this->deleteForcargos($this->forcargos);
       $this->Bitacora('Elimino');
      }
      else
      {
       $this->setFlash('notice','El Cargo no puede ser eliminado, ya que se encuentra asociado a una Nómina');
       return $this->redirect('forcargos/edit?id='.$id);
      }
    }
    else
    {
     	$this->setFlash('notice','El Cargo no puede ser eliminado, ya que posee cargos que dependen de el');
        return $this->redirect('forcargos/edit?id='.$id);
    }

    return $this->redirect('forcargos/list');
  }

  protected function deleteForcargos($forcargos)
  {
    Herramientas::EliminarRegistro('Forprocar','Codcar',$forcargos->getCodcar());
    Herramientas::EliminarRegistro('Nppercar','Codcar',$forcargos->getCodcar());
    $forcargos->delete();
  }
  public static function validarForcagos($cargo) {
    $codcar = $cargo->getCodcar();
    $formato = Herramientas :: ObtenerFormato('npdefgen', 'forcar');
    $posrup1 = Herramientas :: instr($formato, '-', 0, 1);
    $posrup1 = $posrup1 -1;
    if (strlen(trim($codcar)) < $posrup1) {
      return 101;
    }

    Herramientas :: FormarCodigoPadre($codcar, & $nivelcodigo, & $ultimo, $formato);
    if (!(Herramientas :: buscarCodigoPadre('Codcar', 'Forcargos', $ultimo))) {
      if ($nivelcodigo == 0) {
        return 100;
      } else
        return -1;
    } else
      return -1;

  }

}
