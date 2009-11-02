<?php

/**
 * nomhojint actions.
 *
 * @package    Roraima
 * @subpackage nomhojint
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomhojintActions extends autonomhojintActions
{
  protected $coderr = -1;

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    if($this->getRequest()->getMethod() == sfRequest::POST){
     $this->nphojint = $this->getNphojintOrCreate();
      $this->configGrid2();
      $this->configGrid3();
      $grid3=Herramientas::CargarDatosGrid($this,$this->obj2);
      $grid4=Herramientas::CargarDatosGrid($this,$this->obj3);

     $nphojint = $this->getRequestParameter('nphojint');
     $nomemp='';
     if (isset($nphojint['prinom']) && isset($nphojint['prinom']))
	 {
		$segnom='';
		$segape='';
		$nombres='';
		$apellidos='';
		if (isset($nphojint['segnom']))
	    {
	      $segnom=$nphojint['segnom'];
	    }
		if (isset($nphojint['segape']))
	    {
	      $segape=$nphojint['segape'];
	    }
		$nombres=implode(' ',array(trim($nphojint['prinom']),trim($segnom)));
		$apellidos=implode(' ',array(trim($nphojint['priape']),trim($segape)));
		$nomemp=(implode(', ',array($apellidos,$nombres)));
	 }
      if($nomemp=='' or $nomemp==',')
	  {
	 	$this->coderr=473;
	 	return false;
	  }

      if  ($nphojint['codtippag']=="01")
      {
      	if ($nphojint['codban']=="" or $nphojint['numcue']=="" or $nphojint['tipcue']=="")
      	{
      	 $this->coderr=449;
      	 return false;
      	}

      }
	  if ($nphojint['seghcm']=="S")
	  {
	  	  if(($nphojint['porseghcm']=="" || $nphojint['porseghcm']==0))
		  {
		 	$this->coderr=493;
      	 	return false;
		  }elseif($nphojint['porseghcm']<0 || $nphojint['porseghcm']>100)
		  {
		  	$this->coderr=494;
      	 	return false;
		  }

	  }

      if (count($grid3[0])>0)
      {
        $i=0;
        $x=$grid3[0];
        while ($i<count($x))
        {
          if ($x[$i]->getCodcar()=="" || $x[$i]->getDescar()=="")
          {
          	$this->coderr=475;
          	return false;
          	break;
          }
        $i++;
        }
      }

      if (count($grid4[0])>0)
      {
        $l=0;
        $y=$grid4[0];
        while ($l<count($y))
        {
          if ($y[$l]->getNomemp()=="" || $y[$l]->getDescar()=="")
          {
          	$this->coderr=475;
          	return false;
          	break;
          }
        $l++;
        }
      }

           if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;
  }



  public function executeCombo()
  {
    if ($this->getRequestParameter('par')=='1')
    {
      $this->municipios = $this->Cargarmunicipio($this->getRequestParameter('estado'));
      $this->tipo='E';
    }
    elseif ($this->getRequestParameter('par')=='2')
    {
      $this->parroquias = $this->Cargarparroquia($this->getRequestParameter('estado'),$this->getRequestParameter('municipio'));
      $this->tipo='M';
    }

     if ($this->getRequestParameter('par')=='4')
     {
       $this->municipios2 = $this->Cargarmunicipio($this->getRequestParameter('estado2'));
       $this->tipo='E2';
     }
     elseif ($this->getRequestParameter('par')=='5')
     {
       $this->parroquias2 = $this->Cargarparroquia($this->getRequestParameter('estado2'),$this->getRequestParameter('municipio2'));
       $this->tipo='M2';
     }

     if ($this->getRequestParameter('par')=='7')
     {
       $this->municipios3 = $this->Cargarmunicipio($this->getRequestParameter('estado3'));
       $this->tipo='E3';
     }
     elseif ($this->getRequestParameter('par')=='8')
     {
       $this->parroquias3 = $this->Cargarparroquia($this->getRequestParameter('estado3'),$this->getRequestParameter('municipio3'));
       $this->tipo='M3';
     }
  }

  public function CargarEstado()
  {
    $tablas=array('nppais');//areglo de los joins de las tablas
    $filtros_tablas=array('');//arreglo donde mando los filtros de las clases
    $filtros_variales=array('');//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codpai','nompai');// arreglos donde me traigo el nombre y el codigo
    return $pais= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
  }

  public function CargarMunicipio($codpais)
  {
    $tablas=array('npestado');//areglo de los joins de las tablas
    $filtros_tablas=array('codpai');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codedo','nomedo');// arreglos donde me traigo el nombre y el codigo
    return $estado= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);
  }


  public function CargarParroquia($codpais,$codestado)
  {
  	//echo $codpais." - ".$codestado;
    $tablas=array('npciudad');//areglo de los joins de las tablas
    $filtros_tablas=array('codpai','codedo');//arreglo donde mando los filtros de las clases
    $filtros_variales=array($codpais,$codestado);//arreglo donde mando los parametros de la funcion
    $campos_retornados=array('codciu','nomciu');// arreglos donde me traigo el nombre y el codigo
    return $municipio= Herramientas::Cargarcombo($tablas,$filtros_tablas,$filtros_variales,$campos_retornados);

  }
  public function CargarBancos()
  {
    $c = new Criteria();
    $lista_ban = NpbancosPeer::doSelect($c);

    $bancos = array();

    foreach($lista_ban as $obj_ban)
    {
      $bancos += array($obj_ban->getCodban() => $obj_ban->getNomban());
    }
    return $bancos;
  }

   public function CargarTipEmp()
  {
    $c = new Criteria();
    $lista_tipemp = NptipempPeer::doSelect($c);

    $tipemp = array();

    foreach($lista_tipemp as $obj_tipemp)
    {
      $tipemp += array($obj_tipemp->getCodtipemp() => $obj_tipemp->getDestipemp());
    }
    return $tipemp;
  }

  public function CargarGrupoL()
  {
    $c = new Criteria();
    $lista_grup = NpgrulabPeer::doSelect($c);

    $grupol = array();

    foreach($lista_grup as $obj_grup)
    {
      $grupol += array($obj_grup->getCodgrulab() => $obj_grup->getDesgrulab());
    }
    return $grupol;
  }

  public function CargarSituacion()
  {
    $c = new Criteria();
    $lista_situa = NpsitempPeer::doSelect($c);

    $sitemp = array();

    foreach($lista_situa as $obj_sitemp)
    {
      $sitemp += array($obj_sitemp->getCodsitemp() => $obj_sitemp->getDessitemp());
    }
    return $sitemp;
  }

  public function cargarParentesco()
  {
    $c = new Criteria();
    $lista_parent = NptipparPeer::doSelect($c);

    $parentesco = array();

    foreach($lista_parent as $obj_parent)
    {
      $parentesco += array($obj_parent->getTippar() => $obj_parent->getDespar());
    }
    return $parentesco;
  }

  public function cargarGuarderia()
  {
    $c = new Criteria();
    $lista_guarde = NpguardePeer::doSelect($c);
    $guarderia = array();

    foreach($lista_guarde as $obj_guarde)
    {
      $guarderia += array($obj_guarde->getId() => $obj_guarde->getNomgua());
    }
    return $guarderia;
  }

  public function CargarNivel()
  {
    $c = new Criteria();
    $lista_niv = NpniveduPeer::doSelect($c);

    $nivl = array();

    foreach($lista_niv as $obj_niv)
    {
      $nivl += array($obj_niv->getCodniv() => $obj_niv->getDesniv());
    }
    return $nivl;
  }


  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->nphojint = $this->getNphojintOrCreate();
    $this->setVars();
    $this->listaestadocivil= Constantes::ListaEstadoCivil();
    $this->funciones_combos();
    $this->funciones_combos2();
    $this->listaestatus= $this->cargarSituacion();
	$this->listanivelestudio= $this->cargarNivel();
    $this->listaformapago= Constantes::ListaFormaPago();
    $this->bancos = $this->CargarBancos();
    $this->listatipocuenta= Constantes::ListaTipoCuenta();
    $this->listtipemp=$this->CargarTipEmp();
    $this->configGrid();
    $this->configGrid2();
    $this->configGrid3();
    $this->configGrid4();
    $this->configGrid5();
    $this->listatalla= Constantes::ListaTalla();
    $this->listagruposanguineo= Constantes::ListaGrupoSanguineo();
    $this->funciones_combos3();
    $this->grupol = $this->CargarGrupoL();
    $this->listaformatraslado= Constantes::ListaFormaTraslado();
    $this->listatipovivienda= Constantes::ListaTipoVivienda();
    $this->listaformatenencia= Constantes::ListaFormaTenencia();
    $this->listaservicios= Constantes::ListaServicios();
    $this->listasituacion= Constantes::ListaSituacionEmpleados();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNphojintFromRequest();

      $this->saveNphojint($this->nphojint);

      $this->nphojint->setId(Herramientas::getX_vacio('codemp','nphojint','id',$this->nphojint->getCodemp()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomhojint/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomhojint/list');
      }
      else
      {
        return $this->redirect('nomhojint/edit?id='.$this->nphojint->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
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
    $this->nphojint = $this->getNphojintOrCreate();
    $this->updateNphojintFromRequest();
    $grid5  = Herramientas::CargarDatosGrid($this,$this->obj);
    $grid2 = Herramientas::CargarDatosGrid($this,$this->obj2);
    $grid3 = Herramientas::CargarDatosGrid($this,$this->obj3);
    $grid4 = Herramientas::CargarDatosGrid($this,$this->obj4);
    $grid = Herramientas::CargarDatosGrid($this,$this->obj5);

    $this->setVars();

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
     if ($nphojint->getId())
    {
      $grid=Herramientas::CargarDatosGrid($this,$this->obj5);
      $grid2=Herramientas::CargarDatosGrid($this,$this->obj4);
      $grid3=Herramientas::CargarDatosGrid($this,$this->obj2);
      $grid4=Herramientas::CargarDatosGrid($this,$this->obj3);
      $grid5=Herramientas::CargarDatosGrid($this,$this->obj);

     /* try
      {*/
        Nomina::actualizarNomhojint($nphojint,$grid,$grid2,$grid3,$grid4,$grid5,$this->getRequestParameter('arreglo'),$this->getRequestParameter('fecha'));

     /* }
      catch (Exception $ex)
      {
        $coderr = 0;
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        return $coderr;
      }*/
    }
    else
    {
      $grid=Herramientas::CargarDatosGrid($this,$this->obj5);
      $grid2=Herramientas::CargarDatosGrid($this,$this->obj4);
      $grid3=Herramientas::CargarDatosGrid($this,$this->obj2);
      $grid4=Herramientas::CargarDatosGrid($this,$this->obj3);
      $grid5=Herramientas::CargarDatosGrid($this,$this->obj);

      /*try
      {*/
       Nomina::salvarNomhojint($nphojint,$grid,$grid2,$grid3,$grid4,$grid5,$this->getRequestParameter('arreglo'));

      /*}
      catch (Exception $ex)
      {
        $coderr = 0;
        $err = Herramientas::obtenerMensajeError($coderr);
        $this->getRequest()->setError('',$err);
        return $coderr;
      }*/
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
    $this->setVars();
    $this->listaestadocivil= Constantes::ListaEstadoCivil();
    $this->funciones_combos();
    $this->funciones_combos2();
    $this->listaestatus= $this->cargarSituacion();
	$this->listanivelestudio= $this->cargarNivel();
    $this->listaformapago= Constantes::ListaFormaPago();
    $this->bancos = $this->CargarBancos();
    $this->listatipocuenta= Constantes::ListaTipoCuenta();
    $this->listtipemp=$this->CargarTipEmp();
    $this->configGrid();
    $this->configGrid2();
    $this->configGrid3();
    $this->configGrid4();
    $this->configGrid5();
    $this->listatalla= Constantes::ListaTalla();
    $this->listagruposanguineo= Constantes::ListaGrupoSanguineo();
    $this->funciones_combos3();
    $this->grupol = $this->CargarGrupoL();
    $this->listaformatraslado= Constantes::ListaFormaTraslado();
    $this->listatipovivienda= Constantes::ListaTipoVivienda();
    $this->listaformatenencia= Constantes::ListaFormaTenencia();
    $this->listaservicios= Constantes::ListaServicios();
    $this->listasituacion= Constantes::ListaSituacionEmpleados();


     if (isset($nphojint['codemp']))
    {
      $this->nphojint->setCodemp($nphojint['codemp']);
    }
	if (isset($nphojint['prinom']) && isset($nphojint['priape']))
	{
		$segnom='';
		$segape='';
		$nombres='';
		$apellidos='';
		if (isset($nphojint['segnom']))
	    {
	      $segnom=$nphojint['segnom'];
	    }
		if (isset($nphojint['segape']))
	    {
	      $segape=$nphojint['segape'];
	    }
		$nombres=implode(' ',array(trim($nphojint['prinom']),trim($segnom)));
		$apellidos=implode(' ',array(trim($nphojint['priape']),trim($segape)));
		$this->nphojint->setNomemp(implode(', ',array($apellidos,$nombres)));
	}
    if (isset($nphojint['cedemp']))
    {
      $this->nphojint->setCedemp($nphojint['cedemp']);
    }
    if (isset($nphojint['rifemp']))
    {
      $this->nphojint->setRifemp($nphojint['rifemp']);
    }
    if (isset($nphojint['edociv']))
    {
      $this->nphojint->setEdociv($nphojint['edociv']);
    }
    if (isset($nphojint['numcon']))
    {
      $this->nphojint->setNumcon($nphojint['numcon']);
    }
    if (isset($nphojint['nacemp']))
    {
      $this->nphojint->setNacemp($nphojint['nacemp']);
    }
    if (isset($nphojint['sexemp']))
    {
      $this->nphojint->setSexemp($nphojint['sexemp']);
    }
    if (isset($nphojint['codniv']))
    {
      $this->nphojint->setCodniv($nphojint['codniv']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."/fotos/".$this->nphojint->getFotemp();
    if (!$this->getRequest()->hasErrors() && isset($nphojint['fotemp_remove']))
    {
      $this->nphojint->setFotemp('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('nphojint[fotemp]'))
    {
      $fileName = md5($this->getRequest()->getFileName('nphojint[fotemp]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('nphojint[fotemp]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('nphojint[fotemp]', sfConfig::get('sf_upload_dir')."/fotos/".$fileName.$ext);

      $this->nphojint->setFotemp($fileName.$ext);

    }
    if (isset($nphojint['lugnac']))
    {
      $this->nphojint->setLugnac($nphojint['lugnac']);
    }
    if (isset($nphojint['fecnac']))
    {
      if ($nphojint['fecnac'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecnac']))
          {
            $value = $dateFormat->format($nphojint['fecnac'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecnac'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecnac($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecnac(null);
      }
    }
    if (isset($nphojint['edaemp']))
    {
      $this->nphojint->setEdaemp($nphojint['edaemp']);
    }
    if (isset($nphojint['obsgen']))
    {
      $this->nphojint->setObsgen($nphojint['obsgen']);
    }
    if (isset($nphojint['dirhab']))
    {
      $this->nphojint->setDirhab($nphojint['dirhab']);
    }
    if (isset($nphojint['codpai']))
    {
      $this->nphojint->setCodpai($nphojint['codpai']);
    }
    if (isset($nphojint['codest']))
    {
      $this->nphojint->setCodest($nphojint['codest']);
    }
    if (isset($nphojint['codciu']))
    {
      $this->nphojint->setCodciu($nphojint['codciu']);
    }
    if (isset($nphojint['telhab']))
    {
      $this->nphojint->setTelhab($nphojint['telhab']);
    }
    if (isset($nphojint['telotr']))
    {
      $this->nphojint->setTelotr($nphojint['telotr']);
    }
    if (isset($nphojint['celemp']))
    {
      $this->nphojint->setCelemp($nphojint['celemp']);
    }
    if (isset($nphojint['dirotr']))
    {
      $this->nphojint->setDirotr($nphojint['dirotr']);
    }
    if (isset($nphojint['codpa2']))
    {
      $this->nphojint->setCodpa2($nphojint['codpa2']);
    }
    if (isset($nphojint['codes2']))
    {
      $this->nphojint->setCodes2($nphojint['codes2']);
    }
    if (isset($nphojint['codci2']))
    {
      $this->nphojint->setCodci2($nphojint['codci2']);
    }
    if (isset($nphojint['telha2']))
    {
      $this->nphojint->setTelha2($nphojint['telha2']);
    }
    if (isset($nphojint['telot2']))
    {
      $this->nphojint->setTelot2($nphojint['telot2']);
    }
    if (isset($nphojint['emaemp']))
    {
      $this->nphojint->setEmaemp($nphojint['emaemp']);
    }
    if (isset($nphojint['codpos']))
    {
      $this->nphojint->setCodpos($nphojint['codpos']);
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
    if (isset($nphojint['fecret']))
    {
      if ($nphojint['fecret'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecret']))
          {
            $value = $dateFormat->format($nphojint['fecret'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecret'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecret($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecret(null);
      }
    }
    if (isset($nphojint['fecrei']))
    {
      if ($nphojint['fecrei'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecrei']))
          {
            $value = $dateFormat->format($nphojint['fecrei'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecrei'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecrei($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecrei(null);
      }
    }
    if (isset($nphojint['obsemp']))
    {
      $this->nphojint->setObsemp($nphojint['obsemp']);
    }
    if (isset($nphojint['staemp']))
    {
      $this->nphojint->setStaemp($nphojint['staemp']);
    }
    if (isset($nphojint['codtippag']))
    {
      $this->nphojint->setCodtippag($nphojint['codtippag']);
    }
    if (isset($nphojint['codban']))
    {
      $this->nphojint->setCodban($nphojint['codban']);
    }
    if (isset($nphojint['numcue']))
    {
      $this->nphojint->setNumcue($nphojint['numcue']);
    }
    if (isset($nphojint['tipcue']))
    {
      $this->nphojint->setTipcue($nphojint['tipcue']);
    }
     if (isset($nphojint['numcueaho']))
    {
      $this->nphojint->setNumcueaho($nphojint['numcueaho']);
    }
    if (isset($nphojint['tipcueaho']))
    {
      $this->nphojint->setTipcueaho($nphojint['tipcueaho']);
    }
    if (isset($nphojint['fecadmpub']))
    {
      if ($nphojint['fecadmpub'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecadmpub']))
          {
            $value = $dateFormat->format($nphojint['fecadmpub'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecadmpub'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecadmpub($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecadmpub(null);
      }
    }
    if (isset($nphojint['numsso']))
    {
      $this->nphojint->setNumsso($nphojint['numsso']);
    }
    if (isset($nphojint['numpolseg']))
    {
      $this->nphojint->setNumpolseg($nphojint['numpolseg']);
    }
    if (isset($nphojint['feccotsso']))
    {
      if ($nphojint['feccotsso'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['feccotsso']))
          {
            $value = $dateFormat->format($nphojint['feccotsso'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['feccotsso'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFeccotsso($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFeccotsso(null);
      }
    }
    if (isset($nphojint['anoadmpub']))
    {
      $this->nphojint->setAnoadmpub($nphojint['anoadmpub']);
    }
    if (isset($nphojint['tiefid']))
    {
      $this->nphojint->setTiefid($nphojint['tiefid']);
    }
    if (isset($nphojint['talcam']))
    {
      $this->nphojint->setTalcam($nphojint['talcam']);
    }
    if (isset($nphojint['talpan']))
    {
      $this->nphojint->setTalpan($nphojint['talpan']);
    }
    if (isset($nphojint['talcal']))
    {
      $this->nphojint->setTalcal($nphojint['talcal']);
    }
    if (isset($nphojint['grusan']))
    {
      $this->nphojint->setGrusan($nphojint['grusan']);
    }
    if (isset($nphojint['codregpai']))
    {
      $this->nphojint->setCodregpai($nphojint['codregpai']);
    }
    if (isset($nphojint['codregest']))
    {
      $this->nphojint->setCodregest($nphojint['codregest']);
    }
    if (isset($nphojint['codregciu']))
    {
      $this->nphojint->setCodregciu($nphojint['codregciu']);
    }
    if (isset($nphojint['grulab']))
    {
      $this->nphojint->setGrulab($nphojint['grulab']);
    }
    if (isset($nphojint['gruotr']))
    {
      $this->nphojint->setGruotr($nphojint['gruotr']);
    }
    if (isset($nphojint['traslado']))
    {
      $this->nphojint->setTraslado($nphojint['traslado']);
    }
    if (isset($nphojint['traotr']))
    {
      $this->nphojint->setTraotr($nphojint['traotr']);
    }
    if (isset($nphojint['numexp']))
    {
      $this->nphojint->setNumexp($nphojint['numexp']);
    }
    if (isset($nphojint['detexp']))
    {
      $this->nphojint->setDetexp($nphojint['detexp']);
    }
    if (isset($nphojint['derzur']))
    {
      $this->nphojint->setDerzur($nphojint['derzur']);
    }
    if (isset($nphojint['tipviv']))
    {
      $this->nphojint->setTipviv($nphojint['tipviv']);
    }
    if (isset($nphojint['vivotr']))
    {
      $this->nphojint->setVivotr($nphojint['vivotr']);
    }
    if (isset($nphojint['forten']))
    {
      $this->nphojint->setForten($nphojint['forten']);
    }
    if (isset($nphojint['tenotr']))
    {
      $this->nphojint->setTenotr($nphojint['tenotr']);
    }
    if (isset($nphojint['sercon']))
    {
      $this->nphojint->setSercon($nphojint['sercon']);
    }
    if (isset($nphojint['temporal']))
    {
      $this->nphojint->setTemporal($nphojint['temporal']);
    }
    if (isset($nphojint['situac']))
    {
      $this->nphojint->setSituac($nphojint['situac']);
    }

    if (isset($nphojint['profes']))
    {
      $this->nphojint->setProfes($nphojint['profes']);
    }
	if (isset($nphojint['seghcm']))
    {
      $this->nphojint->setSeghcm($nphojint['seghcm']);
    }
	if (isset($nphojint['porseghcm']))
    {
      $this->nphojint->setPorseghcm($nphojint['porseghcm']);
    }
	if (isset($nphojint['codnivedu']))
    {
      $this->nphojint->setCodnivedu($nphojint['codnivedu']);
    }
    $this->nphojint->setIncapacidades($this->getRequestParameter('associated_incapacidades'));

	if (isset($nphojint['ubifis']))
    {
      $this->nphojint->setUbifis($nphojint['ubifis']);

    }	if (isset($nphojint['codempant']))
    {
      $this->nphojint->setCodempant($nphojint['codempant']);
    }
	if (isset($nphojint['feccoracu']))
    {
      if ($nphojint['feccoracu'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['feccoracu']))
          {
            $value = $dateFormat->format($nphojint['feccoracu'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['feccoracu'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFeccoracu($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFeccoracu(null);
      }
    }
    if (isset($nphojint['capactacu']))
    {
      $this->nphojint->setCapactacu($nphojint['capactacu']);
    }
    if (isset($nphojint['intacu']))
    {
      $this->nphojint->setIntacu($nphojint['intacu']);
    }
    if (isset($nphojint['antacu']))
    {
      $this->nphojint->setAntacu($nphojint['antacu']);
    }
    if (isset($nphojint['diaacu']))
    {
      $this->nphojint->setDiaacu($nphojint['diaacu']);
    }
    if (isset($nphojint['diaadiacu']))
    {
      $this->nphojint->setDiaadiacu($nphojint['diaadiacu']);
    }
    if (isset($nphojint['codtipemp']))
    {
      $this->nphojint->setCodtipemp($nphojint['codtipemp']);
    }
    if (isset($nphojint['desniv']))
    {
      $this->nphojint->setDesniv($nphojint['desniv']);
    }
    if (isset($nphojint['desniv2']))
    {
      $this->nphojint->setDesniv2($nphojint['desniv2']);
    }
  }

  protected function getNphojintOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $nphojint = new Nphojint();
    }
    else
    {
      $nphojint = NphojintPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($nphojint);
    }

    return $nphojint;
  }

  public function funciones_combos()
  {
    $this->estados = $this->CargarEstado();
    $this->municipios = $this->CargarMunicipio($this->nphojint->getCodpai());//colocar lo q viene de bd
    $this->parroquias = $this->CargarParroquia($this->nphojint->getCodpai(),$this->nphojint->getCodest());//colocar lo q viene de bd
  }

  public function funciones_combos2()
  {
    $this->estados2 = $this->CargarEstado();
    $this->municipios2 = $this->CargarMunicipio($this->nphojint->getCodpa2());//colocar lo q viene de bd
    $this->parroquias2 = $this->CargarParroquia($this->nphojint->getCodpa2(),$this->nphojint->getCodes2());//colocar lo q viene de bd
  }

  public function funciones_combos3()
  {
    $this->estados3 = $this->CargarEstado();
    $this->municipios3 = $this->CargarMunicipio($this->nphojint->getcodregpai());//colocar lo q viene de bd
    $this->parroquias3 = $this->CargarParroquia($this->nphojint->getcodregpai(),$this->nphojint->getcodregest());//colocar lo q viene de bd
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
    $c->add(NphiinegPeer::CODEMP,$this->nphojint->getCodemp());
    $per = NphiinegPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Nphiineg');
    $opciones->setAnchoGrid(500);
    $opciones->setAncho(500);
    $opciones->setFilas(15);
    $opciones->setTitulo('Historial de Ingresos y Egresos');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Ingreso');
    $col1->setTipo(Columna::FECHA);
    $col1->setEsGrabable(true);
    $col1->setHTML('readonly="true"');
    $col1->setVacia(true);
    $col1->setNombreCampo('fecing');

    $col2 = new Columna('Egreso');
    $col2->setTipo(Columna::FECHA);
    $col2->setEsGrabable(true);
    $col2->setHTML('readonly="true"');
    $col2->setVacia(true);
    $col2->setNombreCampo('fecegr');

    $col3 = new Columna('Observaciones');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('observ');
    $col3->setHTML('type="text" size="30" readonly="true"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid2()
  {
    $c = new Criteria();
    $c->add(NpexplabPeer::STACAR,'D');
    $c->add(NpexplabPeer::CODEMP,$this->nphojint->getCodemp());
    $per = NpexplabPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npexplab');
    $opciones->setAnchoGrid(1000);
    $opciones->setName('b');
    $opciones->setTitulo('Dentro de la Institución');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Nómina');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codnom');
    $col1->setCatalogo('npnomina','sf_admin_edit_form',array('codnom' => 1,'nomnom' => 2),'Npnomina_Vacdefgen');
    $col1->setAjax('nomhojint',5,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('nomnom');
    $col2->setHTML('type="text" size="25" readonly=true');

    $col3 = new Columna('Cargo');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codcar');
    $col3->setCatalogo('npcargos','sf_admin_edit_form',array('codcar' => 3,'nomcar' => 4, 'suecar' => 7, 'comcar' => 8),'Npcargos_Nomhojint');
    $col3->setJScript('onBlur="javascript:event.keyCode=13; ajaxexplab(event,this.id);"');

    $col4 = new Columna('Descripción');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('descar');
    $col4->setHTML('type="text" size="25"');


    $col5 = new Columna('Fecha de Inicio');
    $col5->setTipo(Columna::FECHA);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setEsGrabable(true);
    $col5->setHTML(' ');
    $col5->setVacia(true);
    $col5->setNombreCampo('fecini');

    $col6 = clone $col5;
    $col6->setTitulo('Fecha Fin');
    $col6->setNombreCampo('fecter');

    $col7 = new Columna('Sueldo');
    $col7->setTipo(Columna::MONTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionContenido(Columna::IZQUIERDA);
    $col7->setAlineacionObjeto(Columna::IZQUIERDA);
    $col7->setNombreCampo('sueobt');
    $col7->setEsNumerico(true);
    $col7->setHTML('type="text" size="10"');
    $col7->setJScript('onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');

    $col8 = clone $col7;
    $col8->setTitulo('Compensación');
    $col8->setNombreCampo('compobt');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    $this->obj2 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid3()
  {
    $c = new Criteria();
    $c->add(NpexplabPeer::STACAR,'F');
    $c->add(NpexplabPeer::CODEMP,$this->nphojint->getCodemp());
    $per = NpexplabPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npexplab');
    $opciones->setAnchoGrid(1000);
	$opciones->setAncho(1200);
    $opciones->setName('c');
    $opciones->setTitulo('Fuera de la Institución');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Institución');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('nomemp');
	$col1->setHTML('type="text" size="30"');

    $col2 = new Columna('Descripción del Cargo');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('descar');
    $col2->setHTML('type="text" size="30"');


    $col3 = new Columna('Fecha de Inicio');
    $col3->setTipo(Columna::FECHA);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setEsGrabable(true);
    $col3->setHTML(' ');
    $col3->setVacia(true);
    $col3->setNombreCampo('fecini');

    $col4 = clone $col3;
    $col4->setTitulo('Fecha Fin');
    $col4->setNombreCampo('fecter');

    $col5 = new Columna('Sueldo Obtenido');
    $col5->setTipo(Columna::MONTO);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setNombreCampo('sueobt');
    $col5->setEsNumerico(true);
    $col5->setHTML('type="text" size="10"');
    $col5->setJScript('onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');

    $col6 = new Columna('Tipo de Organismo');
    $col6->setTipo(Columna::COMBO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('tiporg');
    $col6->setCombo(Constantes::listaTiporg());
    $col6->setHTML(' ');

	$col7 = new Columna('Monto Prestaciones');
    $col7->setTipo(Columna::MONTO);
    $col7->setEsGrabable(true);
    $col7->setAlineacionContenido(Columna::IZQUIERDA);
    $col7->setAlineacionObjeto(Columna::IZQUIERDA);
    $col7->setNombreCampo('montopres');
    $col7->setEsNumerico(true);
    $col7->setHTML('type="text" size="10"');
    $col7->setJScript('onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
	$opciones->addColumna($col7);

    $this->obj3 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid4()
  {
    $c = new Criteria();
    $c->add(NpinfcurPeer::CODEMP,$this->nphojint->getCodemp());
    $per = NpinfcurPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npinfcur');
    $opciones->setAnchoGrid(1000);
    $opciones->setFilas(6);
    $opciones->setName('d');
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código de profesión');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codprofes');
    $col1->setCatalogo('Npprofesion','sf_admin_edit_form',array('codprofes' => 1, 'desprofes' => 2),'Npprofesion_nonhojint');
    $col1->setHTML('type="text" size="25"');

    $col2 = new Columna('Profesión');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomtit');
    $col2->setHTML('type="text" size="25"');

    $col3 = new Columna('Descripción');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('descur');
    $col3->setHTML('type="text" size="25"');

    $col4 = clone $col2;
    $col4->setTitulo('Nombre del Instituto');
    $col4->setNombreCampo('instit');

    $col5 = new Columna('Duración');
    $col5->setTipo(Columna::TEXTO);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('durcur');
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setHTML('type="text" size="10"');

    $col6 = clone $col5;
    $col6->setTitulo('Año Culminación');
    $col6->setNombreCampo('anocul');

    $col7 = new Columna('Activo');
    $col7->setTipo(Columna::CHECK);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('activo');
    $col7->setHTML(' ');
    $col7->setJScript('onClick= "activar_check(this.id)"');

    $col8 = new Columna('Fecha de Entrega Titulo');
    $col8->setTipo(Columna::FECHA);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setEsGrabable(true);
    $col8->setHTML(' ');
    $col8->setVacia(true);
    $col8->setNombreCampo('fecenttit');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col8);

    $this->obj4 = $opciones->getConfig($per);
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid5()
  {
    $c = new Criteria();
    $c->add(NpinffamPeer::CODEMP,$this->nphojint->getCodemp());
    $per = NpinffamPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npinffam');
    $opciones->setAnchoGrid(1850);
    $opciones->setAncho(1850);
    $opciones->setName('e');
    $opciones->setTitulo('');
    $opciones->setFilas(15);
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('C.I');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('cedfam');

    $col2 = new Columna('Nombre del Familiar');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('nomfam');
    $col2->setHTML('type="text" size="25"');

    $col3 = new Columna('Sexo');
    $col3->setTipo(Columna::COMBO);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('sexfam');
    $col3->setCombo(Constantes::ListaSexo());
    $col3->setHTML(' ');

    $col4 = new Columna('Fecha Nacimiento');
    $col4->setTipo(Columna::FECHA);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('fecnac');
    $col4->setVacia(true);
    $col4->setJScript('event.keyCode=13; ajax(event,this.id);');

    $col5 = clone $col1;
    $col5->setTitulo('Edad');
    $col5->setNombreCampo('edafamact');
    $col5->setHTML('type="text" size="10" readonly="true"');

    $col6 = new Columna('Parentesco');
    $col6->setTipo(Columna::COMBO);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('parfam');
    $col6->setCombo(self::cargarParentesco());
    $col6->setHTML(' ');

    $col7 = new Columna('Estado Civil');
    $col7->setTipo(Columna::COMBO);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('edociv');
    $col7->setCombo(Constantes::ListaEstadoCivil());
    $col7->setHTML(' ');

    $col14 = new Columna('Ocupacion');
    $col14->setTipo(Columna::COMBO);
    $col14->setEsGrabable(true);
    $col14->setNombreCampo('ocupac');
    $col14->setCombo(Constantes::ListaOcupacion());
    $col14->setHTML(' ');

    $col8 = new Columna('Grado de Instrucción');
    $col8->setTipo(Columna::TEXTO);
    $col8->setAlineacionObjeto(Columna::IZQUIERDA);
    $col8->setAlineacionContenido(Columna::IZQUIERDA);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('nivins');
    $col8->setHTML('type="text" size="25"');

    $col9 = new Columna('Trabajo u/o Oficio/Lugar de Trabajo');
    $col9->setTipo(Columna::TEXTO);
    $col9->setAlineacionObjeto(Columna::IZQUIERDA);
    $col9->setAlineacionContenido(Columna::IZQUIERDA);
    $col9->setEsGrabable(true);
    $col9->setNombreCampo('traofi');
    $col9->setHTML('type="text" size="25"');

    $col10 = new Columna('Guarderia');
    $col10->setTipo(Columna::TEXTO);
    $col10->setEsGrabable(true);
    $col10->setAlineacionObjeto(Columna::CENTRO);
    $col10->setAlineacionContenido(Columna::CENTRO);
    $col10->setNombreCampo('codgua');
    $col10->setCatalogo('Npguarde','sf_admin_edit_form',array('codcon' => 10, 'nomgua' => 11),'Npguarde_nphojint');
    $col10->setHTML('type="text" size="6"');

    $col13 = new Columna('Descripcion');
    $col13->setTipo(Columna::TEXTO);
    $col13->setEsGrabable(false);
    $col13->setNombreCampo('nomgua');
    $col13->setHTML('type="text" size="25"');

    $col12 = new Columna('Valor Guarderia');
    $col12->setTipo(Columna::MONTO);
    $col12->setEsGrabable(true);
    $col12->setNombreCampo('valgua');
    $col12->setHTML(' onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)" ');

    $col11 = new Columna('Seguro HCM');
    $col11->setTipo(Columna::CHECK);
    $col11->setEsGrabable(true);
    $col11->setNombreCampo('seghcm');
    $col11->setHTML(' ');

	$col15 = new Columna('Porcentaje Seguro HCM');
    $col15->setTipo(Columna::MONTO);
    $col15->setEsGrabable(true);
    $col15->setNombreCampo('porseghcm');
    $col15->setHTML('type="text" size="10" onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);
    $opciones->addColumna($col14);
    $opciones->addColumna($col8);
    $opciones->addColumna($col9);
    $opciones->addColumna($col10);
    $opciones->addColumna($col13);
    $opciones->addColumna($col12);
    $opciones->addColumna($col11);
	$opciones->addColumna($col15);



    $this->obj5 = $opciones->getConfig($per);
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
    $javascript="";
  if ($this->getRequestParameter('ajax')=='1')
  {
    $edad=Nomina::obtenerEdad($this->getRequestParameter('codigo'));
      $output = '[["'.$cajtexmos.'","'.$edad.'",""]]';
  }else if ($this->getRequestParameter('ajax')=='2')
  {
  	$r= new Criteria();
  	$r->add(NpcargosPeer::CODCAR,$this->getRequestParameter('codigo'));
  	$datos= NpcargosPeer::doSelectOne($r);
  	if ($datos)
  	{
      $dato=$datos->getNomcar();
      $dato2=number_format($datos->getSuecar(),2,',','.');
      $dato3=$datos->getComcar();
  	}else
  	{  $dato=""; $dato2="0,00"; $dato3="0,00";
  		$javascript="alert('El cargo no existe'); $('$cajtexcom').value=''; ";
  	}
  	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('suecar').'","'.$dato2.'",""],["'.$this->getRequestParameter('comcar').'","'.$dato3.'",""],["javascript","'.$javascript.'",""]]';
  }
  else if ($this->getRequestParameter('ajax')=='3')
  {
    $annopub=Nomina::obtenerEdad($this->getRequestParameter('codigo'));
  	$output = '[["'.$cajtexmos.'","'.$annopub.'",""]]';
  }
  else if ($this->getRequestParameter('ajax')=='4')
  {
  	$r= new Criteria();
  	$r->add(NpestorgPeer::CODNIV,$this->getRequestParameter('codigo'));
  	$datos= NpestorgPeer::doSelectOne($r);
  	if ($datos)
  	{
      $dato=$datos->getDesniv();
    }else
  	{  $dato="";
  		$javascript="alert('El Nivel Organizacional no existe'); $('$cajtexcom').value=''; ";
  	}
  	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  }
   else if ($this->getRequestParameter('ajax')=='5')
  {
  	$r= new Criteria();
  	$r->add(NpnominaPeer::CODNOM,$this->getRequestParameter('codigo'));
  	$datos= NpnominaPeer::doSelectOne($r);
  	if ($datos)
  	{
      $dato=$datos->getNomnom();
    }else
  	{  $dato="";
  		$javascript="alert_('El C&oacute;digo no existe'); $('$cajtexcom').value=''; ";
  	}
  	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  }

  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
  return sfView::HEADER_ONLY;
  }

  public function setVars()
  {
  $this->mascaranivel = Herramientas::ObtenerFormato('Npdefgen','Fororg');
  $this->lonnivel=strlen($this->mascaranivel);
  $this->mascaraemp = Herramientas::ObtenerFormato('Npdefgen','Foremp');
  $this->lonemp=strlen($this->mascaraemp);
  $this->c=null;
  }


  protected function getLabels()
  {
    return array(
      'nphojint{codemp}' => 'No. Empleado:',
      'nphojint{nomemp}' => 'Apellido(s) y Nombre(s):',
      'nphojint{cedemp}' => 'C.I.:',
      'nphojint{rifemp}' => 'RIF:',
      'nphojint{edociv}' => 'Estado Civil:',
      'nphojint{numcon}' => 'No. Contrato:',
      'nphojint{nacemp}' => 'Nacionalidad:',
      'nphojint{sexemp}' => 'Sexo:',
      'nphojint{codniv}' => 'Nivel Organizacional:',
      'nphojint{codnivedu}' => 'Nivel Estudio:',
      'nphojint{fotemp}' => 'Foto:',
      'nphojint{lugnac}' => 'Lugar de Nacimiento:',
      'nphojint{fecnac}' => 'Fecha de Nacimiento:',
      'nphojint{edaemp}' => 'Edad:',
      'nphojint{obsgen}' => 'Observaciones:',
      'nphojint{dirhab}' => 'Dirección:',
      'nphojint{codpai}' => 'Estado:',
      'nphojint{codest}' => 'Municipio:',
      'nphojint{codciu}' => 'Parroquia:',
      'nphojint{telhab}' => 'Tlf. Hab:',
      'nphojint{telotr}' => 'Otro Tlf.:',
      'nphojint{celemp}' => 'Celular:',
      'nphojint{dirotr}' => 'Dirección:',
      'nphojint{codpa2}' => 'Estado:',
      'nphojint{codes2}' => 'Municipio:',
      'nphojint{codci2}' => 'Parroquia:',
      'nphojint{telha2}' => 'Teléfono:',
      'nphojint{telot2}' => 'Otro Tlf.:',
      'nphojint{emaemp}' => 'Email:',
      'nphojint{codpos}' => 'Código Postal:',
      'nphojint{fecing}' => 'Ingreso:',
      'nphojint{fecret}' => 'Egreso:',
      'nphojint{fecrei}' => 'Reingreso:',
      'nphojint{obsemp}' => 'Motivo de Egreso:',
      'nphojint{staemp}' => 'Estatus del Empleado:',
      'nphojint{codtippag}' => 'Forma de Pago:',
      'nphojint{codban}' => 'Banco:',
      'nphojint{numcue}' => 'Número de Cuenta Nómina:',
      'nphojint{tipcue}' => 'Tipo de Cuenta:',
      'nphojint{numcueaho}' => 'Número de Cuenta Caja de Ahorro:',
      'nphojint{tipcueaho}' => 'Tipo de Cuenta:',
      'nphojint{fecadmpub}' => 'Fecha en la Administración Pública:',
      'nphojint{numsso}' => 'Número de S.S.O:',
      'nphojint{numpolseg}' => 'Número dde Póliza de Seguro:',
      'nphojint{feccotsso}' => 'Fecha de Cotización de S.S.O:',
      'nphojint{anoadmpub}' => 'Años de Continuidad en la Administración Pública:',
      'nphojint{tiefid}' => 'Fideicomiso:',
      'nphojint{talcam}' => 'Talla Camisa:',
      'nphojint{talpan}' => 'Talla Pantalón:',
      'nphojint{talcal}' => 'No. de Calzado:',
      'nphojint{grusan}' => 'Grupo Sanguineo:',
      'nphojint{codregpai}' => 'Estado:',
      'nphojint{codregest}' => 'Municipio:',
      'nphojint{codregciu}' => 'Parroquia:',
      'nphojint{grulab}' => 'Grupo Laboral:',
      'nphojint{gruotr}' => 'Descripción:',
      'nphojint{traslado}' => 'Forma de Translado:',
      'nphojint{traotr}' => 'Descripción:',
      'nphojint{numexp}' => 'Número:',
      'nphojint{detexp}' => 'Contenido:',
      'nphojint{derzur}' => 'DerechoZurdo:',
      'nphojint{tipviv}' => 'Tipo de Vivienda:',
      'nphojint{vivotr}' => 'Descripción:',
      'nphojint{forten}' => 'Forma de Tenencia:',
      'nphojint{tenotr}' => 'Descripción:',
      'nphojint{sercon}' => 'Servicios:',
      'nphojint{temporal}' => 'Temporal:',
      'nphojint{situac}' => 'Situacion:',
      'nphojint{profes}' => 'Profesional:',
	  'nphojint{prinom}' => 'Primer Nombre:',
      'nphojint{segnom}' => 'Segundo Nombre:',
      'nphojint{priape}' => 'Primer Apellido:',
      'nphojint{segape}' => 'Segundo Apellido:',
      'nphojint{ubifis}' => 'Ubicacion Fisica:',
      'nphojint{codempant}' => 'No. Empleado Anterior:',
	  'nphojint{feccoracu}' => 'Fecha de Corte Acumulado:',
      'nphojint{capactacu}' => 'Capital Actual Acumulado:',
      'nphojint{intacu}' => 'Interes Acumulado:',
      'nphojint{antacu}' => 'Anticipos Acumulados:',
      'nphojint{diaacu}' => 'Dias Acumulados:',
      'nphojint{diaadiacu}' => 'Dias Adicionales Acumulados:',
      'nphojint{codtipemp}' => 'Tipo de Empleado:',


    );
  }
}
