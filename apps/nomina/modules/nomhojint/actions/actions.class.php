<?php

/**
 * nomhojint actions.
 *
 * @package    Roraima
 * @subpackage nomhojint
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 38281 2010-05-19 21:05:34Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomhojintActions extends autonomhojintActions
{
  protected $coderr = -1;




  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
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
      $this->configGrid4();
      $this->configGrid5();
      $grid2=Herramientas::CargarDatosGrid($this,$this->obj2);
      $grid3=Herramientas::CargarDatosGrid($this,$this->obj3);
      $grid4=Herramientas::CargarDatosGrid($this,$this->obj4);
      $grid5=Herramientas::CargarDatosGrid($this,$this->obj5);

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

      if (count($grid2[0])>0)
      {
        $i=0;
        $x=$grid3[0];
        while ($i<count($x))
        {
          if ($x[$i]->getDescar()=="" || $x[$i]->getStacar()=="")
          {
          	$this->coderr=475;
          	return false;
          	break;
          }
        $i++;
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
          if ($y[$l]->getCodprofes()=="" || $y[$l]->getDescur()=="" || $y[$l]->getInstit()=="" || $y[$l]->getDurcur()=="")
          {
          	$this->coderr=475;
          	return false;
          	break;
          }
        $l++;
        }
      }

      if (count($grid5[0])>0)
      {
        $l=0;
        $y=$grid5[0];
        while ($l<count($y))
        {
          if ($y[$l]->getNomfam()=="" || $y[$l]->getSexfam()=="" || $y[$l]->getFecnac()=="" || $y[$l]->getParfam()=="")
          {
          	$this->coderr=2400;
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

  public function CargarEstatus()
  {
    $c = new Criteria();
    $lista_estemp = NpestempPeer::doSelect($c);

    $estemp = array();

    foreach($lista_estemp as $obj_estemp)
    {
      $estemp += array($obj_estemp->getCodestemp() => $obj_estemp->getDesestemp());
    }
    return $estemp;
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
    $this->configGrid6();
    $this->listatalla= Constantes::ListaTalla();
    $this->listagruposanguineo= Constantes::ListaGrupoSanguineo();
    $this->funciones_combos3();
    $this->grupol = $this->CargarGrupoL();
    $this->listaformatraslado= Constantes::ListaFormaTraslado();
    $this->listatipovivienda= Constantes::ListaTipoVivienda();
    $this->listaformatenencia= Constantes::ListaFormaTenencia();
    $this->listaservicios= Constantes::ListaServicios();
    $this->listasituacion= $this->cargarEstatus();

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
    $grid6  = Herramientas::CargarDatosGrid($this,$this->obj6);

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
      $grid6=Herramientas::CargarDatosGrid($this,$this->obj6);

     /* try
      {*/
        Nomina::actualizarNomhojint($nphojint,$grid,$grid2,$grid3,$grid4,$grid5,$this->getRequestParameter('arreglo'),$this->getRequestParameter('fecha'),$grid6);

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
      $grid6=Herramientas::CargarDatosGrid($this,$this->obj6);

      /*try
      {*/
       Nomina::salvarNomhojint($nphojint,$grid,$grid2,$grid3,$grid4,$grid5,$this->getRequestParameter('arreglo'),$grid6);

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
    $this->configGrid6();
    $this->listatalla= Constantes::ListaTalla();
    $this->listagruposanguineo= Constantes::ListaGrupoSanguineo();
    $this->funciones_combos3();
    $this->grupol = $this->CargarGrupoL();
    $this->listaformatraslado= Constantes::ListaFormaTraslado();
    $this->listatipovivienda= Constantes::ListaTipoVivienda();
    $this->listaformatenencia= Constantes::ListaFormaTenencia();
    $this->listaservicios= Constantes::ListaServicios();
    $this->listasituacion= $this->cargarEstatus();


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
	if (isset($nphojint['numpuncue']))
    {
      $this->nphojint->setNumpuncue($nphojint['numpuncue']);
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
    if (isset($nphojint['codmot']))
    {
      $this->nphojint->setCodmot($nphojint['codmot']);
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
    if (isset($nphojint['fecinicon']))
    {
      if ($nphojint['fecinicon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecinicon']))
          {
            $value = $dateFormat->format($nphojint['fecinicon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecinicon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecinicon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecinicon(null);
      }
    }
    if (isset($nphojint['fecfincon']))
    {
      if ($nphojint['fecfincon'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($nphojint['fecfincon']))
          {
            $value = $dateFormat->format($nphojint['fecfincon'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $nphojint['fecfincon'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->nphojint->setFecfincon($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->nphojint->setFecfincon(null);
      }
    }
    if (isset($nphojint['obsembret']))
    {
      $this->nphojint->setObsembret($nphojint['obsembret']);
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
    $col3->setHTML('type="text" size="30" ');

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

    $params2= array('param1' => $this->lonnivel);
    $col9 = new Columna('Ubicación Administrativa');
    $col9->setTipo(Columna::TEXTO);
    $col9->setEsGrabable(true);
    $col9->setAlineacionObjeto(Columna::CENTRO);
    $col9->setAlineacionContenido(Columna::CENTRO);
    $col9->setNombreCampo('codniv');
    $col9->setCatalogo('npestorg','sf_admin_edit_form',array('codniv' => 9,'desniv' => 10),'Npestorg_Nomhojint',$params2);
    $col9->setHTML('type="text" size="17" maxlength="'.chr(39).$this->lonnivel.chr(39).'"');
    $col9->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$this->mascaranivel.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}" onBlur="javascript:event.keyCode=13; ajaxubiad(event,this.id);;"');

    $col10 = new Columna('Descripción');
    $col10->setTipo(Columna::TEXTO);
    $col10->setAlineacionObjeto(Columna::IZQUIERDA);
    $col10->setAlineacionContenido(Columna::IZQUIERDA);
    $col10->setEsGrabable(true);
    $col10->setNombreCampo('desniv');
    $col10->setHTML('type="text" size="25"');

    $col11 = new Columna('Dedicación');
    $col11->setTipo(Columna::TEXTO);
    $col11->setAlineacionObjeto(Columna::IZQUIERDA);
    $col11->setAlineacionContenido(Columna::IZQUIERDA);
    $col11->setEsGrabable(true);
    $col11->setNombreCampo('dedica');
    $col11->setHTML('type="text" size="40"');

    $col12 = new Columna('Condición');
    $col12->setTipo(Columna::TEXTO);
    $col12->setAlineacionObjeto(Columna::IZQUIERDA);
    $col12->setAlineacionContenido(Columna::IZQUIERDA);
    $col12->setEsGrabable(false);
    $col12->setNombreCampo('condic');
    $col12->setHTML('type="text" size="25"');

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

    $col6 = new Columna('Fecha de Inicio');
    $col6->setTipo(Columna::FECHA);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setEsGrabable(true);
    $col6->setHTML(' ');
    $col6->setVacia(true);
    $col6->setNombreCampo('fecini');

    $col7 = new Columna('Fecha Fin');
    $col7->setTipo(Columna::FECHA);
    $col7->setAlineacionObjeto(Columna::CENTRO);
    $col7->setAlineacionContenido(Columna::CENTRO);
    $col7->setEsGrabable(true);
    $col7->setHTML(' ');
    $col7->setVacia(true);
    $col7->setNombreCampo('fecfin');

    $col8 = clone $col5;
    $col8->setTitulo('Año Culminación');
    $col8->setNombreCampo('anocul');

    $col9 = new Columna('Activo');
    $col9->setTipo(Columna::CHECK);
    $col9->setEsGrabable(true);
    $col9->setNombreCampo('activo');
    $col9->setHTML(' ');
    $col9->setJScript('onClick= "activar_check(this.id)"');

    $col10 = new Columna('Fecha de Entrega Titulo');
    $col10->setTipo(Columna::FECHA);
    $col10->setAlineacionObjeto(Columna::CENTRO);
    $col10->setAlineacionContenido(Columna::CENTRO);
    $col10->setEsGrabable(true);
    $col10->setHTML(' ');
    $col10->setVacia(true);
    $col10->setNombreCampo('fecenttit');

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

    $inffamnomdes=H::getConfApp('inffamnomdes', 'nomhojint', 'nomina');
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
    if ($inffamnomdes=='S') $col2->setOculta(true);

    $col3 = new Columna('Primer Nombre Fam.');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setEsGrabable(true);
    $col3->setNombreCampo('prinom');
    $col3->setHTML('type="text" size="25" maxlength="25"');
    if ($inffamnomdes!='S') $col3->setOculta(true);

    $col4 = new Columna('Segundo Nombre Fam.');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('segnom');
    $col4->setHTML('type="text" size="25" maxlength="25"');
    if ($inffamnomdes!='S') $col4->setOculta(true);

    $col5 = new Columna('Primer Apellido Fam.');
    $col5->setTipo(Columna::TEXTO);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setEsGrabable(true);
    $col5->setNombreCampo('priape');
    $col5->setHTML('type="text" size="25" maxlength="25"');
    if ($inffamnomdes!='S') $col5->setOculta(true);

    $col6 = new Columna('Segundo Apellido Fam.');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setEsGrabable(true);
    $col6->setNombreCampo('segape');
    $col6->setHTML('type="text" size="25" maxlength="25"');
    if ($inffamnomdes!='S') $col6->setOculta(true);

    $col7 = new Columna('Sexo');
    $col7->setTipo(Columna::COMBO);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('sexfam');
    $col7->setCombo(Constantes::ListaSexo());
    $col7->setHTML(' ');

    $col8 = new Columna('Fecha Nacimiento');
    $col8->setTipo(Columna::FECHA);
    $col8->setAlineacionObjeto(Columna::CENTRO);
    $col8->setAlineacionContenido(Columna::CENTRO);
    $col8->setEsGrabable(true);
    $col8->setNombreCampo('fecnac');
    $col8->setVacia(true);
    $col8->setJScript('event.keyCode=13; ajax(event,this.id);');

    $col9 = clone $col1;
    $col9->setTitulo('Edad');
    $col9->setNombreCampo('edafamact');
    $col9->setHTML('type="text" size="10" readonly="true"');

    $col10 = new Columna('Parentesco');
    $col10->setTipo(Columna::COMBO);
    $col10->setEsGrabable(true);
    $col10->setNombreCampo('parfam');
    $col10->setCombo(self::cargarParentesco());
    $col10->setHTML(' ');

    $col11 = new Columna('Estado Civil');
    $col11->setTipo(Columna::COMBO);
    $col11->setEsGrabable(true);
    $col11->setNombreCampo('edociv');
    $col11->setCombo(Constantes::ListaEstadoCivil());
    $col11->setHTML(' ');

    $col12 = new Columna('Ocupacion');
    $col12->setTipo(Columna::COMBO);
    $col12->setEsGrabable(true);
    $col12->setNombreCampo('ocupac');
    $col12->setCombo(Constantes::ListaOcupacion());
    $col12->setHTML(' ');

    $col13 = new Columna('Grado de Instrucción');
    $col13->setTipo(Columna::TEXTO);
    $col13->setAlineacionObjeto(Columna::IZQUIERDA);
    $col13->setAlineacionContenido(Columna::IZQUIERDA);
    $col13->setEsGrabable(true);
    $col13->setNombreCampo('nivins');
    $col13->setHTML('type="text" size="25"');

    $col14 = new Columna('Trabajo u/o Oficio/Lugar de Trabajo');
    $col14->setTipo(Columna::TEXTO);
    $col14->setAlineacionObjeto(Columna::IZQUIERDA);
    $col14->setAlineacionContenido(Columna::IZQUIERDA);
    $col14->setEsGrabable(true);
    $col14->setNombreCampo('traofi');
    $col14->setHTML('type="text" size="25"');

    $col15 = new Columna('Guarderia');
    $col15->setTipo(Columna::TEXTO);
    $col15->setEsGrabable(true);
    $col15->setAlineacionObjeto(Columna::CENTRO);
    $col15->setAlineacionContenido(Columna::CENTRO);
    $col15->setNombreCampo('codgua');
    $col15->setCatalogo('Npguarde','sf_admin_edit_form',array('codcon' => 14, 'nomgua' => 15),'Npguarde_nphojint');
    $col15->setHTML('type="text" size="6"');

    $col16 = new Columna('Descripcion');
    $col16->setTipo(Columna::TEXTO);
    $col16->setEsGrabable(false);
    $col16->setNombreCampo('nomgua');
    $col16->setHTML('type="text" size="25"');

    $col17 = new Columna('Valor Guarderia');
    $col17->setTipo(Columna::MONTO);
    $col17->setEsGrabable(true);
    $col17->setNombreCampo('valgua');
    $col17->setHTML(' onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)" ');

    $col18 = new Columna('Seguro HCM');
    $col18->setTipo(Columna::CHECK);
    $col18->setEsGrabable(true);
    $col18->setNombreCampo('seghcm');
    $col18->setHTML(' ');

    $col19 = new Columna('Porcentaje Seguro HCM');
    $col19->setTipo(Columna::MONTO);
    $col19->setEsGrabable(true);
    $col19->setNombreCampo('porseghcm');
    $col19->setHTML('type="text" size="10" onBlur = "javascript:event.keyCode=13;return entermontootro(event,this.id)"');

    $col20 = new Columna('Tipo de Carga HCM');
    $col20->setTipo(Columna::COMBO);
    $col20->setEsGrabable(true);
    $col20->setNombreCampo('carben');
    $col20->setCombo(array(''=>'Seleccione...','B'=>'Básica','A'=>'Adicional','S'=>'Segundo Adicional'));
    $col20->setHTML(' ');

    $col21 = new Columna('Discapacitado - Suspendido');
    $col21->setTipo(Columna::COMBO);
    $col21->setEsGrabable(true);
    $col21->setNombreCampo('dissus');
    $col21->setCombo(array(''=>'Seleccione...','S'=>'SI','N'=>'NO'));
    $col21->setHTML(' ');

    $col22 = new Columna('Fecha de Registro');
    $col22->setTipo(Columna::FECHA);
    $col22->setAlineacionObjeto(Columna::CENTRO);
    $col22->setAlineacionContenido(Columna::CENTRO);
    $col22->setEsGrabable(true);
    $col22->setHTML(' ');
    $col22->setNombreCampo('fecing');
    $col22->setVacia(true);
    $col22->setOculta(true);

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
    $opciones->addColumna($col11);
    $opciones->addColumna($col12);
    $opciones->addColumna($col13);
    $opciones->addColumna($col15);
    $opciones->addColumna($col16);
    $opciones->addColumna($col17);
    $opciones->addColumna($col18);
    $opciones->addColumna($col19);
    $opciones->addColumna($col20);
    $opciones->addColumna($col21);
    $opciones->addColumna($col22);


    $this->obj5 = $opciones->getConfig($per);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid6()
  {
    $c = new Criteria();
    $c->add(NpinfdocPeer::CODEMP,$this->nphojint->getCodemp());
    $per = NpinfdocPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Npinfdoc');
    $opciones->setAnchoGrid(600);
    $opciones->setAncho(600);
    $opciones->setFilas(20);
    $opciones->setName('g');
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Código de Documento');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('coddoc');
    $col1->setCatalogo('Npdocemp','sf_admin_edit_form',array('coddoc' => 1, 'desdoc' => 2),'Npdocemp_nonhojint');
    $col1->setHTML('type="text" size="25" maxlength=4');
    $col1->setAjax('nomhojint',7,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('desdoc');
    $col2->setHTML('type="text" size="25" readonly=true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    $this->obj6 = $opciones->getConfig($per);
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
  else if ($this->getRequestParameter('ajax')=='6')
  {
  	$r= new Criteria();
  	$r->add(NpdefubiPeer::CODUBI,$this->getRequestParameter('codigo'));
  	$datos= NpdefubiPeer::doSelectOne($r);
  	if ($datos)
  	{
      $dato=$datos->getDesubi();
    }else
  	{  $dato="";
  		$javascript="alert('La Ubicaci&oacute;n F&iacute;sica no existe'); $('$cajtexcom').value=''; ";
  	}
  	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  }
   else if ($this->getRequestParameter('ajax')=='7')
  {
  	$r= new Criteria();
  	$r->add(NpdocempPeer::CODDOC,$this->getRequestParameter('codigo'));
  	$datos= NpdocempPeer::doSelectOne($r);
  	if ($datos)
  	{
      $dato=$datos->getDesdoc();
    }else
  	{  $dato="";
  		$javascript="alert_('El C&oacute;digo del Documento no existe'); $('$cajtexcom').value=''; ";
  	}
  	$output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  }
   else if ($this->getRequestParameter('ajax')=='8')
  {
  	$r= new Criteria();
  	$r->add(NphojintPeer::CODEMP,$this->getRequestParameter('codigo'));
  	$datos= NphojintPeer::doSelectOne($r);
  	if ($datos)
  	{
  	   $javascript="alert_('El Empleado ya se encuentra registrado'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";
  	}
  	$output = '[["javascript","'.$javascript.'",""]]';
  }
   else if ($this->getRequestParameter('ajax')=='9')
  {
  	$r= new Criteria();
  	$r->add(NpmotegrPeer::CODMOT,$this->getRequestParameter('codigo'));
  	$datos= NpmotegrPeer::doSelectOne($r);
  	if ($datos)
  	{
  	   $dato=$datos->getDesmot();
  	}else {
         $dato="";
         $javascript="alert_('El Motivo de Egreso no existe'); $('$cajtexcom').value=''; $('$cajtexcom').focus();";}

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
  $this->mascaraubi=Herramientas::ObtenerFormato('Opdefemp','Forubi');
  $this->lonnivel2=strlen($this->mascaraubi);
  $this->lonemp=strlen($this->mascaraemp);
  $this->c=null;
  }


  protected function getLabels()
  {
    $cambiareti=H::getConfApp('cambiareti', 'nomina', 'nomdefespnivorg');
    if ($cambiareti!="") {
    return array(
      'nphojint{codemp}' => 'No. Empleado:',
      'nphojint{nomemp}' => 'Apellido(s) y Nombre(s):',
      'nphojint{cedemp}' => 'C.I.:',
      'nphojint{rifemp}' => 'RIF:',
      'nphojint{edociv}' => 'Estado Civil:',
      'nphojint{numcon}' => 'No. Contrato:',
      'nphojint{nacemp}' => 'Nacionalidad:',
      'nphojint{sexemp}' => 'Sexo:',
          'nphojint{codniv}' => $cambiareti.':',
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
          'nphojint{codmot}' => 'Motivo de Egreso:',
          'nphojint{staemp}' => 'Situación del Empleado:',
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
          'nphojint{situac}' => 'Estatus del Empleado:',
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
              'nphojint{numpuncue}' => 'Punto de Cuenta:',
            'nphojint{fecinicon}' => 'Fecha Inicio del Contrato:',
            'nphojint{fecfincon}' => 'Fecha Fin del Contrato:',
            'nphojint{obsembret}' => 'Datos:',


        );

  }else {
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
          'nphojint{codmot}' => 'Motivo de Egreso:',
      'nphojint{staemp}' => 'Situación del Empleado:',
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
      'nphojint{situac}' => 'Estatus del Empleado:',
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
	  'nphojint{numpuncue}' => 'Punto de Cuenta:',
        'nphojint{fecinicon}' => 'Fecha Inicio del Contrato:',
        'nphojint{fecfincon}' => 'Fecha Fin del Contrato:',
        'nphojint{obsembret}' => 'Datos:',


    );
  }
}
}
