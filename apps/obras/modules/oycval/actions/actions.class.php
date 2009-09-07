<?php

/**
 * oycval actions.
 *
 * @package    Roraima
 * @subpackage oycval
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class oycvalActions extends autooycvalActions
{
  public  $coderror=-1;
  public  $coderror1=-1;
  public  $coderror2=-1;
  public  $coderror3=-1;
  public  $coderror4=-1;

  
  
  
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
      $this->ocregval = $this->getOcregvalOrCreate();
      try{ $this->updateOcregvalFromRequest();}
      catch (Exception $ex){}
      $this->setVars();
      $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
      $grid2=Herramientas::CargarDatosGrid($this,$this->obj2,true);
	  $grid3=Herramientas::CargarDatosGrid($this,$this->obj3);
	  $grid4=Herramientas::CargarDatosGrid($this,$this->obj4,true);


      $c= new Criteria();
      $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('ocregval[codcon]'));
      $c->add(OcregvalPeer::CODTIPVAL,$this->getRequestParameter('ocregval[codtipval]'));
      $c->add(OcregvalPeer::NUMVAL,$this->getRequestParameter('ocregval[numval]'));
      $reg= OcregvalPeer::doSelectOne($c);
      if ($reg)
      {
       $this->coderror1=1008;
        return false;
      }

      $c= new Criteria();
      $c->add(OcregconPeer::CODCON,$this->getRequestParameter('ocregval[codcon]'));
      $data= OcregconPeer::doSelectOne($c);
      if ($data)
      {
         switch($data->getTipcon())
         {
           case ($this->con_ins || $this->con_sup || $this->con_pro):
             $x=$grid4[0];
             if (count($x)>0)
             {
               if ($x[0]['codtippro']=="")
               {
               	$this->coderror=1009;
               }
               else
               {
               	 if ($this->val_ant!=$this->getRequestParameter('ocregval[codtipval]') && $this->val_ret!=$this->getRequestParameter('ocregval[codtipval]') && $this->val_fin!=$this->getRequestParameter('ocregval[codtipval]'))
               	 {
                   $j=0;
                   while ($j<count($x))
                   {
                     if ($x[$j]['canfin']!="")
                     {
                       $canfin=H::convnume($x[$j]['canfin']);
                       if ($canfin>0)
                       {
                       	 $montotoferacu=H::convnume($this->getRequestParameter('ocregval[montotoferacum]'));
                         if (H::convnume($this->getRequestParameter('ocregval[moncon]'))<=$montotoferacu)
                         {
                           $this->coderror=1010;
                           break;
                         }
                       }
                       else
                       {
                       	 $this->coderror=1011;
                       	 break;
                       }
                     }
                     else
                     {
                     	 $this->coderror=1012;
                     	 break;
                     }
                   	$j++;
                   }
               	 }
               }
             }
            break;
           default:
             $x=$grid[0];
             if (count($x)>0)
             {
               if ($x[0]['codpar']=="")
               {
               	$this->coderror=1013;
               }
               else
               {
                 if ($this->val_ant!=$this->getRequestParameter('ocregval[codtipval]'))
                 {
                   $j=0;
                   while ($j<count($x))
                   {
                     if ($x[$j]['cantidad']!="")
                     {
                       $canfin=H::convnume($x[$j]['cantidad']);
                       if ($canfin>0)
                       {
                       	 $montotparacu=H::convnume($this->getRequestParameter('ocregval[montotparacum]'));
                         if (H::convnume($this->getRequestParameter('ocregval[moncon]'))<=$montotparacu && $this->val_fin!=$this->getRequestParameter('ocregval[codtipval]'))
                         {
                           $this->coderror=1014;
                           break;
                         }
                       }
                       else
                       {
                       	 $this->coderror=1011;
                       	 break;
                       }
                     }
                     else
                     {
                     	 $this->coderror=1012;
                     	 break;
                     }
                   	$j++;
                   }

                   if ($this->getRequestParameter('ocregval[fecini]')=="")
                   {
                     $this->coderror2=1015;
                   }
                   if ($this->getRequestParameter('ocregval[fecfin]')=="")
                   {
                     $this->coderror3=1016;
                   }
                 }
               }
             }
            break;
         }
      }

      $x=$grid2[0];
      if (count($x)>0)
      {
      	if ($x[0]["codtip"]=="")
      	{
      		$this->coderror4=1017;
      	}
      	else
      	{
           $j=0;
           while ($j<count($x))
           {
             $porret=H::convnume($x[$j]['porret']);
             if ($porret<=0)
             {
               $this->coderror4=1018;
               break;
             }
           	$j++;
           }
      	}
      }

       if ($this->coderror<>-1 || $this->coderror2<>-1 || $this->coderror3<>-1 || $this->coderror4<>-1)
       {
        return false;
       }else return true;

    }else return true;
  }

	public function cargarTipo()
		{
		$c = new Criteria();
		$lista_tip = OctipvalPeer::doSelect($c);

		$tipos = array();

		foreach($lista_tip as $obj_tip)
		{
			$tipos += array($obj_tip->getCodtipval() => $obj_tip->getDestipval());
		}
		return $tipos;
	    }

	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	  {
	    $this->ocregval = $this->getOcregvalOrCreate();
	    $this->tipos = $this->cargarTipo();
	    $this->setVars();
	    if (!$this->ocregval->getId())
		{
		  $this->configGridInspect($this->getRequestParameter('ocregval[codcon]'),$this->getRequestParameter('ocregval[numval]'),$this->getRequestParameter('ocregval[codtipval]'));
	      $this->configGridPartidas($this->getRequestParameter('ocregval[codcon]'),$this->getRequestParameter('ocregval[codtipval]'),$this->getRequestParameter('ocregval[numval]'),'',array(),'',$this->getRequestParameter('ocregval[filaspar]'));
	      $this->configGridRetenciones($this->getRequestParameter('ocregval[codcon]'),$this->getRequestParameter('ocregval[numval]'),$this->getRequestParameter('ocregval[codtipval]'),'',array(),'',$this->getRequestParameter('ocregval[filasret]'));
	      $this->configGridOfertas($this->getRequestParameter('ocregval[codcon]'),$this->getRequestParameter('ocregval[numval]'),$this->getRequestParameter('ocregval[codtipval]'),'',array(),$this->getRequestParameter('ocregval[filasofer]'));
		}else {
		  $this->configGridInspect($this->ocregval->getCodcon(),$this->ocregval->getNumval(),$this->ocregval->getCodtipval());
	    $this->configGridPartidas($this->ocregval->getCodcon(),$this->ocregval->getCodtipval(),$this->ocregval->getNumval(),$this->ocregval->getId());
	    $this->configGridRetenciones($this->ocregval->getCodcon(),$this->ocregval->getNumval(),$this->ocregval->getCodtipval(),$this->ocregval->getId());
	    $this->configGridOfertas($this->ocregval->getCodcon(),$this->ocregval->getNumval(),$this->ocregval->getCodtipval(),$this->ocregval->getId());
		}



	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateOcregvalFromRequest();

	      $this->saveOcregval($this->ocregval);

	      $this->setFlash('notice', 'Your modifications have been saved');

          $this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('oycval/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('oycval/list');
	      }
	      else
	      {
	        return $this->redirect('oycval/edit?id='.$this->ocregval->getId());
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
	    $this->ocregval = $this->getOcregvalOrCreate();
	    try{ $this->updateOcregvalFromRequest();}
        catch (Exception $ex){}

	    $this->labels = $this->getLabels();

	    if($this->getRequest()->getMethod() == sfRequest::POST)
        {
	        if($this->coderror!=-1)
	        {
	         $err1 = Herramientas::obtenerMensajeError($this->coderror);
	         $this->getRequest()->setError('',$err1);
	        }
	        if($this->coderror1!=-1)
	        {
	         $err = Herramientas::obtenerMensajeError($this->coderror1);
	         $this->getRequest()->setError(' ',$err);
	        }
	        if($this->coderror2!=-1)
	        {
	         $err2 = Herramientas::obtenerMensajeError($this->coderror2);
	         $this->getRequest()->setError('ocregval{fecini}',$err2);
	        }
	        if($this->coderror3!=-1)
	        {
	         $err3 = Herramientas::obtenerMensajeError($this->coderror3);
	         $this->getRequest()->setError('ocregval{fecfin}',$err3);

	        }
	        if($this->coderror4!=-1)
	        {
	         $err4 = Herramientas::obtenerMensajeError($this->coderror4);
	         $this->getRequest()->setError('',$err4);
	        }
        }
	    return sfView::SUCCESS;
	  }

	/**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateOcregvalFromRequest()
	{
	    $ocregval = $this->getRequestParameter('ocregval');
	    $this->tipos = $this->cargarTipo();
	    $this->configGridInspect($ocregval['codcon'],$ocregval['numval'],$ocregval['codtipval']);
	    $this->configGridPartidas($ocregval['codcon'],$ocregval['codtipval'],$ocregval['numval'],'',array(),'',$ocregval['filaspar']);
	    $this->configGridRetenciones($ocregval['codcon'],$ocregval['numval'],$ocregval['codtipval'],'',array(),$ocregval['filasret']);
	    $this->configGridOfertas($ocregval['codcon'],$ocregval['numval'],$ocregval['codtipval']);

		if (isset($ocregval['codcon']))
	    {
	      $this->ocregval->setCodcon($ocregval['codcon']);
	    }
	    if (isset($ocregval['codtipval']))
	    {
	      $this->ocregval->setCodtipval($ocregval['codtipval']);
	    }
	    if (isset($ocregval['numval']))
	    {
	      $this->ocregval->setNumval($ocregval['numval']);
	    }
	    if (isset($ocregval['codobr']))
	    {
	      $this->ocregval->setCodobr($ocregval['codobr']);
	    }
	    if (isset($ocregval['desobr']))
	    {
	      $this->ocregval->setDesobr($ocregval['desobr']);
	    }
	    if (isset($ocregval['codpro']))
	    {
	      $this->ocregval->setCodpro($ocregval['codpro']);
	    }
	    if (isset($ocregval['nompro']))
	    {
	      $this->ocregval->setNompro($ocregval['nompro']);
	    }
	    if (isset($ocregval['fecini']))
	    {
	      if ($ocregval['fecini'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($ocregval['fecini']))
	          {
	            $value = $dateFormat->format($ocregval['fecini'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $ocregval['fecini'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->ocregval->setFecini($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->ocregval->setFecini(null);
	      }
	    }
	    if (isset($ocregval['fecfin']))
	    {
	      if ($ocregval['fecfin'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($ocregval['fecfin']))
	          {
	            $value = $dateFormat->format($ocregval['fecfin'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $ocregval['fecfin'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->ocregval->setFecfin($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->ocregval->setFecfin(null);
	      }
	    }
	    if (isset($ocregval['fecreg']))
	    {
	      if ($ocregval['fecreg'])
	      {
	        try
	        {
	          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
	                              if (!is_array($ocregval['fecreg']))
	          {
	            $value = $dateFormat->format($ocregval['fecreg'], 'i', $dateFormat->getInputPattern('d'));
	          }
	          else
	          {
	            $value_array = $ocregval['fecreg'];
	            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
	          }
	          $this->ocregval->setFecreg($value);
	        }
	        catch (sfException $e)
	        {
	          // not a date
	        }
	      }
	      else
	      {
	        $this->ocregval->setFecreg(null);
	      }
	    }
	    if (isset($ocregval['poriva']))
	    {
	      $this->ocregval->setPoriva($ocregval['poriva']);
	    }
	    if (isset($ocregval['porant']))
	    {
	      $this->ocregval->setPorant($ocregval['porant']);
	    }
	    if (isset($ocregval['moncon']))
	    {
	      $this->ocregval->setMoncon($ocregval['moncon']);
	    }
	    if (isset($ocregval['aumobr']))
	    {
	      $this->ocregval->setAumobr($ocregval['aumobr']);
	    }
	    if (isset($ocregval['disobr']))
	    {
	      $this->ocregval->setDisobr($ocregval['disobr']);
	    }
	    if (isset($ocregval['obrext']))
	    {
	      $this->ocregval->setObrext($ocregval['obrext']);
	    }
	    if (isset($ocregval['monful']))
	    {
	      $this->ocregval->setMonful($ocregval['monful']);
	    }
	    if (isset($ocregval['gasree']))
	    {
	      $this->ocregval->setGasree($ocregval['gasree']);
	    }
	    if (isset($ocregval['subtot']))
	    {
	      $this->ocregval->setSubtot($ocregval['subtot']);
	    }
	    if (isset($ocregval['moniva']))
	    {
	      $this->ocregval->setMoniva($ocregval['moniva']);
	    }
	    if (isset($ocregval['totiva']))
	    {
	      $this->ocregval->setTotiva($ocregval['totiva']);
	    }
	    if (isset($ocregval['totsiniva']))
	    {
	      $this->ocregval->setTotsiniva($ocregval['totsiniva']);
	    }
	    if (isset($ocregval['amortant']))
	    {
	      $this->ocregval->setAmortant($ocregval['amortant']);
	    }
	    if (isset($ocregval['monfia']))
	    {
	      $this->ocregval->setMonfia($ocregval['monfia']);
	    }
	    if (isset($ocregval['monper']))
	    {
	      $this->ocregval->setMonper($ocregval['monper']);
	    }
	    if (isset($ocregval['monperiva']))
	    {
	      $this->ocregval->setMonperiva($ocregval['monperiva']);
	    }
	    if (isset($ocregval['totded']))
	    {
	      $this->ocregval->setTotded($ocregval['totded']);
	    }
	    if (isset($ocregval['valpag']))
	    {
	      $this->ocregval->setValpag($ocregval['valpag']);
	    }
	    if (isset($ocregval['monpag']))
	    {
	      $this->ocregval->setMonpag($ocregval['monpag']);
	    }
	    if (isset($ocregval['montotcon']))
	    {
	      $this->ocregval->setMontotcon($ocregval['montotcon']);
	    }
	    if (isset($ocregval['monval']))
	    {
	      $this->ocregval->setMonval($ocregval['monval']);
	    }
	    if (isset($ocregval['salliq']))
	    {
	      $this->ocregval->setSalliq($ocregval['salliq']);
	    }
	    if (isset($ocregval['retacu']))
	    {
	      $this->ocregval->setRetacu($ocregval['retacu']);
	    }
	    if (isset($ocregval['monantic']))
	    {
	      $this->ocregval->setMonantic($ocregval['monantic']);
	    }
	    if (isset($ocregval['monant']))
	    {
	      $this->ocregval->setMonant($ocregval['monant']);
	    }
	    if (isset($ocregval['salantic']))
	    {
	      $this->ocregval->setSalantic($ocregval['salantic']);
	    }
	    if (isset($ocregval['staval']))
	    {
	      $this->ocregval->setStaval($ocregval['staval']);
	    }
	    if (isset($ocregval['tieneant']))
	    {
	      $this->ocregval->setTieneant($ocregval['tieneant']);
	    }
	    if (isset($ocregval['codtipcon']))
	    {
	      $this->ocregval->setCodtipcon($ocregval['codtipcon']);
	    }
	    if (isset($ocregval['filaspar']))
	    {
	      $this->ocregval->setFilaspar($ocregval['filaspar']);
	    }
	    if (isset($ocregval['filasofer']))
	    {
	      $this->ocregval->setFilasofer($ocregval['filasofer']);
	    }
	    if (isset($ocregval['filasret']))
	    {
	      $this->ocregval->setFilasret($ocregval['filasret']);
	    }
	    if (isset($ocregval['monaumtot']))
	    {
	      $this->ocregval->setMonaumtot($ocregval['monaumtot']);
	    }
	    if (isset($ocregval['mondistot']))
	    {
	      $this->ocregval->setMondistot($ocregval['mondistot']);
	    }
	    if (isset($ocregval['monexttotal']))
	    {
	      $this->ocregval->setMonexttotal($ocregval['monexttotal']);
	    }
	  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridInspect($codcon='',$numval='', $codtipval='')
  {
    $c = new Criteria();
    $c->add(OcinsvalPeer::CODCON,$codcon);
    $c->add(OcinsvalPeer::NUMVAL,$numval);
    $c->add(OcinsvalPeer::CODTIPVAL,$codtipval);
    $per = OcinsvalPeer::doSelect($c);

    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setTabla('Ocinsval');
    $opciones->setAnchoGrid(600);
    $opciones->setAncho(600);
    $opciones->setTitulo('');
    $opciones->setName('c');
    $opciones->setHTMLTotalFilas(' ');

    $obj= array('cedper' => 1, 'nomper' => 2);
    $params = array("'+$('ocregval_codpro').value+'","'+$('ocregval_codtipcon').value+'",'val2');

    $col1 = new Columna('Cédula');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('cedins');
    $col1->setCatalogo('Ocdefper','sf_admin_edit_form',$obj,'Ocdefper_Oycdescon',$params);
    $col1->setHTML('type="text" size="10" maxlength="10"');
    $col1->setAjax('oycdescon',7,2);

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomins');
    $col2->setHTML('type="text" size="10" maxlength="100" readonly="true"');

    $col3 = clone $col2;
    $col3->setTitulo('Nro.C.I.V');
    $col3->setTipo(Columna::TEXTO);
    $col3->setNombreCampo('numciv');
    $col3->setHTML('type="text" size="10" maxlength="15"');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj3 = $opciones->getConfig($per);

	}

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridPartidas($codcon='', $codtipval='', $numval='', $nuevo='',$arreglo=array(), $nombre='', $filaspari=0)
   {
       if ($nuevo=='')
       {
        $reg = $arreglo;
       }
       else
       {
       	$c = new Criteria();
        $c->add(OcparvalPeer::CODCON,$codcon);
        $c->add(OcparvalPeer::CODTIPVAL,$codtipval);
        $c->add(OcparvalPeer::NUMVAL,$numval);
        $reg = OcparvalPeer::doSelect($c);
       }

       $this->filaspar=count($reg);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(false);
       $opciones->setTabla('Ocparval');
       $opciones->setAnchoGrid(1000);
       $opciones->setAncho(1000);
       $opciones->setFilas($filaspari);
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $col1 = new Columna('Cód. Partida');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codpar');
       $col1->setHTML('type="text" size="17" maxlength="32" readonly=true');

       $col2 = new Columna('Descripción');
       $col2->setEsGrabable(true);
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('despar');
       $col2->setHTML('type="text" size="30" readonly=true');

       $col3 = clone $col2;
       $col3->setTitulo('Unidad de Medida');
       $col3->setNombreCampo('coduni');
       $col3->setEsGrabable(true);
       $col3->setHTML('type="text" size="5" readonly=true');

       $col4 = new Columna('Cantidad contratada');
       $col4->setEsGrabable(true);
       $col4->setTipo(Columna::MONTO);
       $col4->setAlineacionContenido(Columna::DERECHA);
       $col4->setAlineacionObjeto(Columna::DERECHA);
       $col4->setNombreCampo('cancon');
       $col4->setEsNumerico(true);
       $col4->setHTML('type="text" size="10" readonly=true');

       $col5 = clone $col4;
       $col5->setTitulo('Cant. Valuada');
       $col5->setNombreCampo('canval');

       $col6 = clone $col4;
       if ($nombre!="")
       $col6->setTitulo($nombre);
       else $col6->setTitulo('Cant. Final');
       $col6->setNombreCampo('cantidad');
       if ($codtipval==$this->val_par || $codtipval==$this->val_fin || $codtipval==$this->val_rec)
       $col6->setHTML('type="text" size="10"');
       else $col6->setHTML('type="text" size="10" readonly=true');
       $col6->setJScript('onKeypress="cantidadFinal(event,this.id);"');

       $col7 = clone $col4;
       if ($nombre=="P")
       $col7->setTitulo('Precio Final');
       else $col7->setTitulo('Costo Unitario');
       $col7->setNombreCampo('cosuni');
       if ($codtipval==$this->val_par || $codtipval==$this->val_fin || $codtipval==$this->val_rec)
       $col7->setHTML('type="text" size="10"');
       else $col7->setHTML('type="text" size="10" readonly=true');
       $col7->setJScript('onKeypress="calcularprecio(event,this.id);"');

       $col8 = clone $col4;
       $col8->setTitulo('Total');
       $col8->setNombreCampo('montot');

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

     /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridRetenciones($codcon='',$numval='', $codtipval='', $nuevo='', $arreglo2=array(),$filasreti=0)
   {
       if ($nuevo=='')
       {
       	$reg=$arreglo2;
       }
       else
       {
		   $c = new Criteria();
		   $c->add(OcretvalPeer::CODCON,$codcon);
		   $c->add(OcretvalPeer::NUMVAL,$numval);
		   $c->add(OcretvalPeer::CODTIPVAL,$codtipval);
		   $reg = OcretvalPeer::doSelect($c);
       }

       $this->filasret=count($reg);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(false);
       $opciones->setTabla('Ocretval');
       $opciones->setAnchoGrid(800);
       $opciones->setAncho(800);
       $opciones->setFilas($filasreti);
       $opciones->setTitulo('Retenciones');
       $opciones->setName('b');
       $opciones->setHTMLTotalFilas(' ');

       $obj= array('codtip' => 1, 'destip' => 2, 'porret' => 3, 'basimp' => 4, 'unitri' => 5, 'factor' => 6, 'porsus' => 7, 'stamon' => 8);

       $col1 = new Columna('Código');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codtip');
       //$col1->setJScript('onBlur="javascript:event.keyCode=13; ajaxretencion2(event,this.id);"');
       //$col1->setCatalogo('octipret','sf_admin_edit_form',$obj,'Octipret_Oycdescon');
       $col1->setHTML('type="text" size="17" maxlength="3" readonly=true');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setEsGrabable(true);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('destip');
       $col2->setHTML('type="text" size="30" readonly=true');

       $col3 = new Columna('%');
       $col3->setEsGrabable(true);
       $col3->setTipo(Columna::MONTO);
       $col3->setAlineacionContenido(Columna::DERECHA);
       $col3->setAlineacionObjeto(Columna::DERECHA);
       $col3->setNombreCampo('porret');
       $col3->setEsNumerico(true);
       $col3->setHTML('type="text" size="10"');

       $col4 = clone $col3;
       $col4->setTitulo('Base Imponible');
       $col4->setNombreCampo('basimp');
       $col4->setEsGrabable(false);
       $col4->setHTML('type="text" size="10"');
       $col4->setOculta(true);

       $col5 = clone $col3;
       $col5->setTitulo('Unidad Tributaria');
       $col5->setNombreCampo('unitri');
       $col5->setEsGrabable(false);
       $col5->setHTML('type="text" size="10"');
       $col5->setOculta(true);

       $col6 = clone $col3;
       $col6->setTitulo('Factor');
       $col6->setNombreCampo('factor');
       $col6->setEsGrabable(false);
       $col6->setHTML('type="text" size="10"');
       $col6->setOculta(true);

       $col7 = clone $col3;
       $col7->setTitulo('Sustraendo');
       $col7->setNombreCampo('porsus');
       $col7->setEsGrabable(false);
       $col7->setHTML('type="text" size="10"');
       $col7->setOculta(true);

       $col8 = clone $col1;
       $col8->setTitulo('Estatus');
       $col8->setNombreCampo('stamon');
       $col8->setEsGrabable(false);
       $col8->setHTML('type="text" size="10"');
       $col8->setOculta(true);

       $col9 = clone $col3;
       $col9->setTitulo('Monto');
       $col9->setNombreCampo('monret');
       $col9->setHTML('type="text" size="10" readonly="true"');

       $opciones->addColumna($col1);
       $opciones->addColumna($col2);
       $opciones->addColumna($col3);
       $opciones->addColumna($col4);
       $opciones->addColumna($col5);
       $opciones->addColumna($col6);
       $opciones->addColumna($col7);
       $opciones->addColumna($col8);
       $opciones->addColumna($col9);

       $this->obj2 = $opciones->getConfig($reg);

  }

     /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridOfertas($codcon='',$numval='', $codtipval='', $nuevo='', $arreglo3=array(),$filasofer=0)
   {
   	  if ($nuevo=='')
   	  {
        $reg=$arreglo3;
   	  }
   	  else
   	  {
       $c = new Criteria();
       $c->add(OcofeservalPeer::CODCON,$codcon);
       $c->add(OcofeservalPeer::NUMVAL,$numval);
       $c->add(OcofeservalPeer::CODTIPVAL,$codtipval);
       $reg = OcofeservalPeer::doSelect($c);
   	  }

   	  $this->filasofer=count($reg);

       $opciones = new OpcionesGrid();
       $opciones->setEliminar(true);
       $opciones->setTabla('Ocofeserval');
       $opciones->setAnchoGrid(600);
       $opciones->setAncho(600);
       $opciones->setFilas($filasofer);
       $opciones->setName('d');
       $opciones->setTitulo('');
       $opciones->setHTMLTotalFilas(' ');

       $obj= array('codtippro' => 1, 'destippro' => 2, 'nivpro' => 3, 'exppro' => 4, 'valhor' => 8);

       $col1 = new Columna('Tipo de Profesional');
       $col1->setTipo(Columna::TEXTO);
       $col1->setEsGrabable(true);
       $col1->setAlineacionObjeto(Columna::CENTRO);
       $col1->setAlineacionContenido(Columna::CENTRO);
       $col1->setNombreCampo('codtippro');
       $col1->setJScript('onBlur="javascript:event.keyCode=13; ajaxoferta(event,this.id);"');
       $col1->setCatalogo('Octipprl','sf_admin_edit_form',$obj,'Octipprl_Oycdescon');
       $col1->setHTML('type="text" size="17" maxlength="32"');

       $col2 = new Columna('Descripción');
       $col2->setTipo(Columna::TEXTO);
       $col2->setAlineacionObjeto(Columna::IZQUIERDA);
       $col2->setAlineacionContenido(Columna::IZQUIERDA);
       $col2->setNombreCampo('destippro');
       $col2->setHTML('type="text" size="30" readonly=true');

       $col3 = clone $col2;
       $col3->setTitulo('Nivel Profesional');
       $col3->setNombreCampo('nivpro');
       $col3->setEsGrabable(true);
       $col3->setHTML('type="text" size="10" readonly=true');

       $col4 = clone $col2;
       $col4->setTitulo('Experiencia');
       $col4->setNombreCampo('exppro');
       $col4->setEsGrabable(true);
       $col4->setHTML('type="text" size="10" readonly=true');

       $col5 = new Columna('Número de Personas');
       $col5->setEsGrabable(true);
       $col5->setTipo(Columna::MONTO);
       $col5->setAlineacionContenido(Columna::DERECHA);
       $col5->setAlineacionObjeto(Columna::DERECHA);
       $col5->setNombreCampo('numper');
       $col5->setEsNumerico(true);
       $col5->setHTML('type="text" size="10"');
       //$col5->setJScript('onKeypress="Cantidad(event,this.id);');

       $col6 = clone $col5;
       $col6->setTitulo('Cant. Horas Contratas');
       $col6->setNombreCampo('canhor');
       $col6->setHTML('type="text" size="10"');

       $col7 = clone $col5;
       $col7->setTitulo('Cant. Valuada');
       $col7->setNombreCampo('canval');
       $col7->setHTML('type="text" size="10"');
       //$col7->setJScript('onKeypress="Total(event,this.id);');

       $col8 = clone $col5;
       $col8->setTitulo('Cant. Final');
       $col8->setNombreCampo('cantidad');
       $col8->setHTML('type="text" size="10"');

       $col9 = clone $col5;
       $col9->setTitulo('Valor Unitario');
       $col9->setNombreCampo('valhor');
       $col9->setEsGrabable(false);
       $col9->setHTML('type="text" size="10" readonly=true');

       $col10 = clone $col5;
       $col10->setTitulo('Total');
       $col10->setNombreCampo('montot');
       $col10->setHTML('type="text" size="10" readonly=true');
       $col10->setEsGrabable(false);

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

       $this->obj4 = $opciones->getConfig($reg);
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
     $dato=""; $dato1=""; $dato2=""; $dato3=""; $javascript="";
     $this->setVars();
     if ($this->getRequestParameter('ajax')=='1')
     {
       $this->div='1';
       $javascript=""; $codobr=""; $desobr=""; $codpro=""; $despro=""; $monoricon="0,00"; $gasretot="0,00"; $montotparacum="0,00"; $montotoferacum="0,00";
       if ($this->getRequestParameter('numval')!='')
       {
         $c= new Criteria();
	     $c->add(OcregconPeer::CODCON,$this->getRequestParameter('codcon'));
	     $c->add(OcregvalPeer::CODTIPVAL,$this->getRequestParameter('tipval'));
	     $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('numval'));
	     $c->addJoin(OcregconPeer::CODCON,OcregvalPeer::CODCON);
         $reg=OcregvalPeer::doSelectOne($c);
         if (!$reg)
         {
           $c= new Criteria();
           $c->add(OcregconPeer::CODCON,$this->getRequestParameter('codcon'));
           $data= OcregconPeer::doSelectOne($c);
           if ($data)
           {
           	 switch($data->getStacon())
             {
	           case 'A':
	             $javascript="alert('Este Contrato esta por Iniciarse'); $('ocregval_codcon').value=''; $('ocregval_codtipval').value=''; $('ocregval_numval').value=''; $('porcentaje').hide(); $('ocregval_codcon').focus()";
	            break;
	           case 'N':
	             $javascript="alert('Este Contrato esta Anulado'); $('ocregval_codcon').value=''; $('ocregval_codtipval').value=''; $('ocregval_numval').value=''; $('porcentaje').hide(); $('ocregval_codcon').focus()";
	            break;
	           case 'P':
	             $javascript="alert('Este Contrato esta Paralizado'); $('ocregval_codcon').value=''; $('ocregval_codtipval').value=''; $('ocregval_numval').value=''; $('porcentaje').hide(); $('ocregval_codcon').focus()";
	            break;
	           case 'T':
                 $d= new Criteria();
                 $d->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
                 $d->add(OcregvalPeer::CODTIPVAL,$this->val_fin);
                 $d->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
                 $d->add(OctipretPeer::STAMON,'T');
                 $d->addJoin(OcregvalPeer::CODTIPVAL,OcretvalPeer::CODTIPVAL);
                 $d->addJoin(OcregvalPeer::CODCON,OcretvalPeer::CODCON);
                 $d->addJoin(OcretvalPeer::CODTIP,OctipretPeer::CODTIP);
                 $reg= OcregvalPeer::doSelectOne($d);
                 if ($reg)
                 {
                   $javascript="alert('Este Contrato esta Terminado'); $('ocregval_codcon').value=''; $('ocregval_codtipval').value=''; $('ocregval_numval').value=''; $('porcentaje').hide(); $('ocregval_codcon').focus()";
                 }else $javascript="";
	            break;
	           case 'E':
                 switch($this->getRequestParameter('tipval'))
                 {
	               case $this->val_ant:
	                 $javascript="$('porcentaje').hide(); $('tab0').hide(); $('label41').innerHTML = '% Anticipo'; ";
	                 //Datos Parciales
	                 $codcon=$data->getCodcon();
	                 $codobr=$data->getCodobr();
	                 $desobr=Herramientas::getX('CODOBR','Ocregobr','desobr',$codobr);
	                 $codpro=Herramientas::getX('CODOBR','Ocadjobr','codprogan',$codobr);
                     $despro=Herramientas::getX('CODPRO','Caprovee','nompro',$codpro);
	                 $codtipcon=$data->getTipcon();
	                 $gasree= $data->getGasree();
	                 $gasree_tra=$gasree;
                     //$fecha=date;
                     $monoricon=number_format($data->getMoncon(),2,',','.');
                     $porant=H::convnume($this->getRequestParameter('porant'));
                     $gasretot=number_format((($gasree*$porant)/100),2,',','.');
                     $tipval=$this->getRequestParameter('tipval');
                     $poriva=H::convnume($this->getRequestParameter('poriva'));
                     $aumobr=H::convnume($this->getRequestParameter('aumobr'));
                     $disobr=H::convnume($this->getRequestParameter('disobr'));
                     $obrext=H::convnume($this->getRequestParameter('obrext'));
                     $monper=H::convnume($this->getRequestParameter('monper'));
                     $valpag=H::convnume($this->getRequestParameter('valpag'));
                     $idval=$this->getRequestParameter('idval');
                     switch($tipval)
                     {
	                   case $this->val_ant:
	                     switch($codtipcon)
                         {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                         }
                         $gasretot=number_format((($gasree*$porant)/100),2,',','.');
                         $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                         $this->ret_ant=$this->retant;
                         $this->codcont=$codcon;
                         $this->tipvalu=$tipval;
                         $this->arreglorete=Obras::tiraR($arregloret);
                         $this->arreglomonto=Obras::tiraM($arreglomontos);
                         if ($this->retant=='S')
                         {
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                           if ($msj1=="")
                           { //ajax 7
                           }else {
                           	 $javascript=$javascript."alert('$msj1'); ";
                           }
                         }
                         else
                         {
                         	$arreglomontos[0]["monfia"]=0;
                         	$arreglomontos[0]["totded"]=0;
                         	$arreglomontos[0]["retacu"]=0;
                         }
	                    break;
	                   case $this->val_par:
	                   case $this->val_fin:
	                      switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          Obras::calcularGasRee($codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,$gasree_tra,&$gasretot);
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;

                       case $this->val_ret:
                         switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosRetencionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                       case $this->val_rec:
                         switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                            $this->otro='S';
                            $arregloret=array();
                            $arreglomontos=array();
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosDatosRec($codcon,$this->par_rec,$this->val_ant,$this->val_par,$this->val_fin,$this->val_rec,$this->val_ret,$data->getMoncon(),$tipval,$codobr,$poriva,$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                     }
//sigue
                     Obras::calcularMontoPagar($arreglomontos[0]["totsiniva"],$arreglomontos[0]["amortant"],$arreglomontos[0]["monfia"],&$arreglomontos[0]["monper"],$arreglomontos[0]["totded"],$arreglomontos[0]["valpag"],$tipval,$this->val_fin,&$arreglomontos[0]["monpag"]);
	                 Obras::totalValPresentadas($arreglomontos[0]["monper"],$poriva,$codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,&$arreglomontos[0]["montototcon"],$data->getMoncon(),&$arreglomontos[0]["monval"],&$arreglomontos[0]["salliq"],&$arreglomontos[0]["valpag"],&$monconiva);
                      $javascript=$javascript."$('ocregval_moncon').readOnly=true; $('ocregval_aumobr').readOnly=true; $('ocregval_disobr').readOnly=true; $('ocregval_obrext').readOnly=true; $('ocregval_monful').readOnly=true; $('ocregval_totsiniva').readOnly=true; $('ocregval_amortant').readOnly=true; $('ocregval_monfia').readOnly=true; $('ocregval_monper').readOnly=true; $('ocregval_totded').readOnly=true; $('ocregval_valpag').readOnly=true; $('ocregval_monpag').readOnly=true; $('ocregval_subtot').readOnly=true; $('ocregval_montotcon').readOnly=true; $('ocregval_monval').readOnly=true; $('ocregval_salliq').readOnly=true; $('ocregval_retacu').readOnly=true; $('ocregval_monant').readOnly=true; $('ocregval_salantic').readOnly=true; $('ocregval_monantic').readOnly=true; ";
                     //Activar Pestaña
                      switch($tipval)
                      {
	                     case $this->val_ant:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Anticipo ( ".$this->getRequestParameter('porant')." % )'; ";
	                      break;
	                     case $this->val_ret:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Retención ( ".$this->getRequestParameter('porant')." % )'; ";
	                      break;
	                     case $this->val_par:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
	                      break;
	                     case $this->val_fin:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
	                      break;
                      }
                     //Fin de Activar Pestaña
                     //Fin de Datos Parciales
                     $javascript=$javascript."$('ocregval_codcon').readOnly=true; $('ocregval_numval').readOnly=true; ";
                     if ($this->ivaant=='S')
                     {
                       if ($idval!='' && $porant!='0,00' && $poriva!='0,00')
                       {
                       	 Obras::calcularAmortizacion($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$arreglomontos[0]["totiva"],$porant,&$msj,&$arreglomontos[0]["monantic"],&$arreglomontos[0]["monant"],&$arreglomontos[0]["salantic"],&$arreglomontos[0]["amortant"]);
                       }
                     }
                     else
                     {
                     	if ($idval!='' && $porant!='0,00')
                       {
                         Obras::calcularAmortizacion($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$arreglomontos[0]["totiva"],$porant,&$msj,&$arreglomontos[0]["monantic"],&$arreglomontos[0]["monant"],&$arreglomontos[0]["salantic"],&$arreglomontos[0]["amortant"]);
                       }
                     }
	                break;
//hasta aqui Valuacion de Anticipo
	              case $this->val_par:  //Valuacion Parcial
                    switch($data->getTipcon())
	                {
	                   case $this->con_ins:
	                   case $this->con_sup:
	                   case $this->con_pro:
	                     $javascript="$('porcentaje').hide();";
		                 //Datos Parciales
		                 $codcon=$data->getCodcon();
		                 $codobr=$data->getCodobr();
		                 $desobr=Herramientas::getX('CODOBR','Ocregobr','desobr',$codobr);
		                 $codpro=Herramientas::getX('CODOBR','Ocadjobr','codprogan',$codobr);
	                     $despro=Herramientas::getX('CODPRO','Caprovee','nompro',$codpro);
		                 $codtipcon=$data->getTipcon();
		                 $gasree= $data->getGasree();
		                 $gasree_tra=$gasree;
	                     //$fecha=date;
	                     $monoricon=number_format($data->getMoncon(),2,',','.');
	                     $porant=H::convnume($this->getRequestParameter('porant'));
	                     $gasretot=number_format((($gasree*$porant)/100),2,',','.');
	                     $tipval=$this->getRequestParameter('tipval');
	                     $poriva=H::convnume($this->getRequestParameter('poriva'));
	                     $aumobr=H::convnume($this->getRequestParameter('aumobr'));
	                     $disobr=H::convnume($this->getRequestParameter('disobr'));
	                     $obrext=H::convnume($this->getRequestParameter('obrext'));
	                     $monper=H::convnume($this->getRequestParameter('monper'));
	                     $valpag=H::convnume($this->getRequestParameter('valpag'));
	                     $idval=$this->getRequestParameter('idval');
	                     switch($tipval)
	                     {
		                   case $this->val_ant:
		                     switch($codtipcon)
	                         {
	                           case $this->con_ins:
	                           case $this->con_sup:
	                           case $this->con_pro:
	                             $this->otro='S';
	                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
	                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
	                             if ($msj=="")
	                             {
	                             	$this->configGridOfertas('','','','',$arreglooferta);
	                             }
	                             else
	                             {
	                             	$javascript=$javascript."alert('$msj'); ";
	                             	$this->configGridOfertas();
	                             }
	                            break;
	                           default:
	                            $this->otro='N';
	                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
	                            if ($msj=="")
	                            {
	                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
	                            }
	                            else
	                            {
	                              $javascript=$javascript."alert('$msj'); ";
	                              $this->configGridPartidas();
	                            }
	                            break;
	                         }
	                         $gasretot=number_format((($gasree*$porant)/100),2,',','.');
	                         $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
	                         $this->ret_ant=$this->retant;
	                         $this->codcont=$codcon;
	                         $this->tipvalu=$tipval;
	                         $this->arreglorete=Obras::tiraR($arregloret);
	                         $this->arreglomonto=Obras::tiraM($arreglomontos);

	                         if ($this->retant=='S')
	                         {
	                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
	                           if ($msj1=="")
	                           { //ajax 7
	                           }else {
	                           	 $javascript=$javascript."alert('$msj1'); ";
	                           }
	                         }
	                         else
	                         {
	                         	$arreglomontos[0]["monfia"]=0;
	                         	$arreglomontos[0]["totded"]=0;
	                         	$arreglomontos[0]["retacu"]=0;
	                         }
		                    break;
		                   case $this->val_par:
		                   case $this->val_fin:
		                      switch($codtipcon)
	                          {
	                           case $this->con_ins:
	                           case $this->con_sup:
	                           case $this->con_pro:
	                             $this->otro='S';
	                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
	                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
	                             if ($msj=="")
	                             {
	                             	$this->configGridOfertas('','','','',$arreglooferta);
	                             }
	                             else
	                             {
	                             	$javascript=$javascript."alert('$msj'); ";
	                             	$this->configGridOfertas();
	                             }
	                            break;
	                           default:
	                            $this->otro='N';
	                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
	                            if ($msj=="")
	                            {
	                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
	                            }
	                            else
	                            {
	                              $javascript=$javascript."alert('$msj'); ";
	                              $this->configGridPartidas();
	                            }
	                            break;
	                          }
	                          Obras::calcularGasRee($codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,$gasree_tra,&$gasretot);
	                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
	                          $this->ret_ant=$this->retant;
	                          $this->codcont=$codcon;
	                          $this->tipvalu=$tipval;
	                          $this->arreglorete=Obras::tiraR($arregloret);
	                          $this->arreglomonto=Obras::tiraM($arreglomontos);
	                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
	                          if ($msj1=="")
	                          { //ajax 7
	                          }else {
	                           $javascript=$javascript."alert('$msj1'); ";
	                          }
	                        break;
	                       case $this->val_ret:
	                         switch($codtipcon)
	                          {
	                           case $this->con_ins:
	                           case $this->con_sup:
	                           case $this->con_pro:
	                             $this->otro='S';
	                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
	                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
	                             if ($msj=="")
	                             {
	                             	$this->configGridOfertas('','','','',$arreglooferta);
	                             }
	                             else
	                             {
	                             	$javascript=$javascript."alert('$msj'); ";
	                             	$this->configGridOfertas();
	                             }
	                            break;
	                           default:
	                            $this->otro='N';
	                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
	                            if ($msj=="")
	                            {
	                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
	                            }
	                            else
	                            {
	                              $javascript=$javascript."alert('$msj'); ";
	                              $this->configGridPartidas();
	                            }
	                            break;
	                          }
	                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
	                          $this->ret_ant=$this->retant;
	                          $this->codcont=$codcon;
	                          $this->tipvalu=$tipval;
	                          $this->arreglorete=Obras::tiraR($arregloret);
	                          $this->arreglomonto=Obras::tiraM($arreglomontos);
	                          Obras::datosRetencionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
	                          if ($msj1=="")
	                          { //ajax 7
	                          }else {
	                           $javascript=$javascript."alert('$msj1'); ";
	                          }
	                        break;
	                       case $this->val_rec:
	                         switch($codtipcon)
	                          {
	                           case $this->con_ins:
	                           case $this->con_sup:
	                           case $this->con_pro:
	                            $this->otro='S';
	                            $arregloret=array();
	                            $arreglomontos=array();
	                            break;
	                           default:
	                            $this->otro='N';
	                            Obras::datosDatosRec($codcon,$this->par_rec,$this->val_ant,$this->val_par,$this->val_fin,$this->val_rec,$this->val_ret,$data->getMoncon(),$tipval,$codobr,$poriva,$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
	                            if ($msj=="")
	                            {
	                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
	                            }
	                            else
	                            {
	                              $javascript=$javascript."alert('$msj'); ";
	                              $this->configGridPartidas();
	                            }
	                            break;
	                          }
	                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
	                          $this->ret_ant=$this->retant;
	                          $this->codcont=$codcon;
	                          $this->tipvalu=$tipval;
	                          $this->arreglorete=Obras::tiraR($arregloret);
	                          $this->arreglomonto=Obras::tiraM($arreglomontos);
	                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
	                          if ($msj1=="")
	                          { //ajax 7
	                          }else {
	                           $javascript=$javascript."alert('$msj1'); ";
	                          }
	                        break;
	                     }

	                     Obras::calcularMontoPagar($arreglomontos[0]["totsiniva"],$arreglomontos[0]["amortant"],$arreglomontos[0]["monfia"],&$arreglomontos[0]["monper"],$arreglomontos[0]["totded"],$arreglomontos[0]["valpag"],$tipval,$this->val_fin,&$arreglomontos[0]["monpag"]);
		                 Obras::totalValPresentadas($arreglomontos[0]["monper"],$poriva,$codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,&$arreglomontos[0]["montototcon"],$data->getMoncon(),&$arreglomontos[0]["monval"],&$arreglomontos[0]["salliq"],&$arreglomontos[0]["valpag"],&$monconiva);
	                      $javascript=$javascript."$('ocregval_moncon').readOnly=true; $('ocregval_aumobr').readOnly=true; $('ocregval_disobr').readOnly=true; $('ocregval_obrext').readOnly=true; $('ocregval_monful').readOnly=true; $('ocregval_totsiniva').readOnly=true; $('ocregval_amortant').readOnly=true; $('ocregval_monfia').readOnly=true; $('ocregval_monper').readOnly=true; $('ocregval_totded').readOnly=true; $('ocregval_valpag').readOnly=true; $('ocregval_monpag').readOnly=true; $('ocregval_subtot').readOnly=true; $('ocregval_montotcon').readOnly=true; $('ocregval_monval').readOnly=true; $('ocregval_salliq').readOnly=true; $('ocregval_retacu').readOnly=true; $('ocregval_monant').readOnly=true; $('ocregval_salantic').readOnly=true; $('ocregval_monantic').readOnly=true; ";
	                     //Activar Pestaña
	                      switch($tipval)
	                      {
		                     case $this->val_ant:
		                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Anticipo ( ".$this->getRequestParameter('porant')." % )'; ";
		                      break;
		                     case $this->val_ret:
		                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Retención ( ".$this->getRequestParameter('porant')." % )'; ";
		                      break;
		                     case $this->val_par:
		                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
		                      break;
		                     case $this->val_fin:
		                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
		                      break;
	                      }
	                     //Fin de Activar Pestaña
	                     //Fin de Datos Parciales
	                     $javascript=$javascript."$('ocregval_codcon').readOnly=true; $('ocregval_numval').readOnly=true; ";
	                     if ($idval!='' && $porant!='0,00' && $poriva!='0,00')
	                     {
	                       	 Obras::calcularAmortizacion($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$arreglomontos[0]["totiva"],$porant,&$msj,&$arreglomontos[0]["monantic"],&$arreglomontos[0]["monant"],&$arreglomontos[0]["salantic"],&$arreglomontos[0]["amortant"]);
                         }
	                    break;
	                   default:
                         if (Obras::verificarPartida($data->getCodcon()))
                         {
                             $javascript="$('porcentaje').hide(); ";
			                 //Datos Parciales
			                 $codcon=$data->getCodcon();
			                 $codobr=$data->getCodobr();
			                 $desobr=Herramientas::getX('CODOBR','Ocregobr','desobr',$codobr);
			                 $codpro=Herramientas::getX('CODOBR','Ocadjobr','codprogan',$codobr);
		                     $despro=Herramientas::getX('CODPRO','Caprovee','nompro',$codpro);
			                 $codtipcon=$data->getTipcon();
			                 $gasree= $data->getGasree();
			                 $gasree_tra=$gasree;
		                     //$fecha=date;
		                     $monoricon=number_format($data->getMoncon(),2,',','.');
		                     $porant=H::convnume($this->getRequestParameter('porant'));
		                     $gasretot=number_format((($gasree*$porant)/100),2,',','.');
		                     $tipval=$this->getRequestParameter('tipval');
		                     $poriva=H::convnume($this->getRequestParameter('poriva'));
		                     $aumobr=H::convnume($this->getRequestParameter('aumobr'));
		                     $disobr=H::convnume($this->getRequestParameter('disobr'));
		                     $obrext=H::convnume($this->getRequestParameter('obrext'));
		                     $monper=H::convnume($this->getRequestParameter('monper'));
		                     $valpag=H::convnume($this->getRequestParameter('valpag'));
		                     $idval=$this->getRequestParameter('idval');
		                     switch($tipval)
		                     {
			                   case $this->val_ant:
			                     switch($codtipcon)
		                         {
		                           case $this->con_ins:
		                           case $this->con_sup:
		                           case $this->con_pro:
		                             $this->otro='S';
		                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
		                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
		                             if ($msj=="")
		                             {
		                             	$this->configGridOfertas('','','','',$arreglooferta);
		                             }
		                             else
		                             {
		                             	$javascript=$javascript."alert('$msj'); ";
		                             	$this->configGridOfertas();
		                             }
		                            break;
		                           default:
		                            $this->otro='N';
		                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
		                            if ($msj=="")
		                            {
		                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
		                            }
		                            else
		                            {
		                              $javascript=$javascript."alert('$msj'); ";
		                              $this->configGridPartidas();
		                            }
		                            break;
		                         }
		                         $gasretot=number_format((($gasree*$porant)/100),2,',','.');
		                         $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
		                         $this->ret_ant=$this->retant;
		                         $this->codcont=$codcon;
		                         $this->tipvalu=$tipval;
		                         $this->arreglorete=Obras::tiraR($arregloret);
		                         $this->arreglomonto=Obras::tiraM($arreglomontos);

		                         if ($this->retant=='S')
		                         {
		                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
		                           if ($msj1=="")
		                           { //ajax 7
		                           }else {
		                           	 $javascript=$javascript."alert('$msj1'); ";
		                           }
		                         }
		                         else
		                         {
		                         	$$arreglomontos[0]["monfia"]=0;
		                         	$$arreglomontos[0]["totded"]=0;
		                         	$$arreglomontos[0]["retacu"]=0;
		                         }
			                    break;
			                   case $this->val_par:
			                   case $this->val_fin:
			                      switch($codtipcon)
		                          {
		                           case $this->con_ins:
		                           case $this->con_sup:
		                           case $this->con_pro:
		                             $this->otro='S';
		                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
		                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
		                             if ($msj=="")
		                             {
		                             	$this->configGridOfertas('','','','',$arreglooferta);
		                             }
		                             else
		                             {
		                             	$javascript=$javascript."alert('$msj'); ";
		                             	$this->configGridOfertas();
		                             }
		                            break;
		                           default:
		                            $this->otro='N';
		                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
		                            if ($msj=="")
		                            {
		                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
		                            }
		                            else
		                            {
		                              $javascript=$javascript."alert('$msj'); ";
		                              $this->configGridPartidas();
		                            }
		                            break;
		                          }
		                          Obras::calcularGasRee($codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,$gasree_tra,&$gasretot);
		                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
		                          $this->ret_ant=$this->retant;
		                          $this->codcont=$codcon;
		                          $this->tipvalu=$tipval;
		                          $this->arreglorete=Obras::tiraR($arregloret);
		                          $this->arreglomonto=Obras::tiraM($arreglomontos);
		                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
		                          if ($msj1=="")
		                          { //ajax 7
		                          }else {
		                           $javascript=$javascript."alert('$msj1'); ";
		                          }
		                        break;
		                       case $this->val_ret:
		                         switch($codtipcon)
		                          {
		                           case $this->con_ins:
		                           case $this->con_sup:
		                           case $this->con_pro:
		                             $this->otro='S';
		                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
		                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
		                             if ($msj=="")
		                             {
		                             	$this->configGridOfertas('','','','',$arreglooferta);
		                             }
		                             else
		                             {
		                             	$javascript=$javascript."alert('$msj'); ";
		                             	$this->configGridOfertas();
		                             }
		                            break;
		                           default:
		                            $this->otro='N';
		                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
		                            if ($msj=="")
		                            {
		                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
		                            }
		                            else
		                            {
		                              $javascript=$javascript."alert('$msj'); ";
		                              $this->configGridPartidas();
		                            }
		                            break;
		                          }
		                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
		                          $this->ret_ant=$this->retant;
		                          $this->codcont=$codcon;
		                          $this->tipvalu=$tipval;
		                          $this->arreglorete=Obras::tiraR($arregloret);
		                          $this->arreglomonto=Obras::tiraM($arreglomontos);
		                          Obras::datosRetencionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
		                          if ($msj1=="")
		                          { //ajax 7
		                          }else {
		                           $javascript=$javascript."alert('$msj1'); ";
		                          }
		                        break;
		                       case $this->val_rec:
		                         switch($codtipcon)
		                          {
		                           case $this->con_ins:
		                           case $this->con_sup:
		                           case $this->con_pro:
		                            $this->otro='S';
		                            $arregloret=array();
		                            $arreglomontos=array();
		                            break;
		                           default:
		                            $this->otro='N';
		                            Obras::datosDatosRec($codcon,$this->par_rec,$this->val_ant,$this->val_par,$this->val_fin,$this->val_rec,$this->val_ret,$data->getMoncon(),$tipval,$codobr,$poriva,$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
		                            if ($msj=="")
		                            {
		                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
		                            }
		                            else
		                            {
		                              $javascript=$javascript."alert('$msj'); ";
		                              $this->configGridPartidas();
		                            }
		                            break;
		                          }
		                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
		                          $this->ret_ant=$this->retant;
		                          $this->codcont=$codcon;
		                          $this->tipvalu=$tipval;
		                          $this->arreglorete=Obras::tiraR($arregloret);
		                          $this->arreglomonto=Obras::tiraM($arreglomontos);
		                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
		                          if ($msj1=="")
		                          { //ajax 7
		                          }else {
		                           $javascript=$javascript."alert('$msj1'); ";
		                          }
		                        break;
		                     }

		                     Obras::calcularMontoPagar($arreglomontos[0]["totsiniva"],$arreglomontos[0]["amortant"],$arreglomontos[0]["monfia"],&$arreglomontos[0]["monper"],$arreglomontos[0]["totded"],$arreglomontos[0]["valpag"],$tipval,$this->val_fin,&$arreglomontos[0]["monpag"]);
			                 Obras::totalValPresentadas($arreglomontos[0]["monper"],$poriva,$codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,&$arreglomontos[0]["montototcon"],$data->getMoncon(),&$arreglomontos[0]["monval"],&$arreglomontos[0]["salliq"],&$arreglomontos[0]["valpag"],&$monconiva);
		                      $javascript=$javascript."$('ocregval_moncon').readOnly=true; $('ocregval_aumobr').readOnly=true; $('ocregval_disobr').readOnly=true; $('ocregval_obrext').readOnly=true; $('ocregval_monful').readOnly=true; $('ocregval_totsiniva').readOnly=true; $('ocregval_amortant').readOnly=true; $('ocregval_monfia').readOnly=true; $('ocregval_monper').readOnly=true; $('ocregval_totded').readOnly=true; $('ocregval_valpag').readOnly=true; $('ocregval_monpag').readOnly=true; $('ocregval_subtot').readOnly=true; $('ocregval_montotcon').readOnly=true; $('ocregval_monval').readOnly=true; $('ocregval_salliq').readOnly=true; $('ocregval_retacu').readOnly=true; $('ocregval_monant').readOnly=true; $('ocregval_salantic').readOnly=true; $('ocregval_monantic').readOnly=true; ";
		                     //Activar Pestaña
		                      switch($tipval)
		                      {
			                     case $this->val_ant:
			                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Anticipo ( ".$this->getRequestParameter('porant')." % )'; ";
			                      break;
			                     case $this->val_ret:
			                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Retención ( ".$this->getRequestParameter('porant')." % )'; ";
			                      break;
			                     case $this->val_par:
			                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
			                      break;
			                     case $this->val_fin:
			                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
			                      break;
		                      }
		                     //Fin de Activar Pestaña
		                     //Fin de Datos Parciales
		                     $javascript=$javascript."$('ocregval_codcon').readOnly=true; $('ocregval_numval').readOnly=true; ";
		                     if ($idval!='' && $porant!='0,00' && $poriva!='0,00')
		                     {
		                       	Obras::calcularAmortizacion($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$arreglomontos[0]["totiva"],$porant,&$msj,&$arreglomontos[0]["monantic"],&$arreglomontos[0]["monant"],&$arreglomontos[0]["salantic"],&$arreglomontos[0]["amortant"]);
	                         }
                         }
                         else
                         {
		                   $javascript="alert('No se puede realizar la valuación Parcial, todas las partidas ya se encuentran valuadas'); $('ocregval_codcon').value=''; $('ocregval_numval').value=''; $('ocregval_codtipval').value=''; $('porcentaje').hide(); $('ocregval_codcon').focus(); ";
                         }
	                    break;
	                   }
	               break;
	              case $this->val_fin:
                     $javascript="$('porcentaje').hide(); ";
	                 //Datos Parciales
	                 $codcon=$data->getCodcon();
	                 $codobr=$data->getCodobr();
	                 $desobr=Herramientas::getX('CODOBR','Ocregobr','desobr',$codobr);
	                 $codpro=Herramientas::getX('CODOBR','Ocadjobr','codprogan',$codobr);
                     $despro=Herramientas::getX('CODPRO','Caprovee','nompro',$codpro);
	                 $codtipcon=$data->getTipcon();
	                 $gasree= $data->getGasree();
	                 $gasree_tra=$gasree;
                     //$fecha=date;
                     $monoricon=number_format($data->getMoncon(),2,',','.');
                     $porant=H::convnume($this->getRequestParameter('porant'));
                     $gasretot=number_format((($gasree*$porant)/100),2,',','.');
                     $tipval=$this->getRequestParameter('tipval');
                     $poriva=H::convnume($this->getRequestParameter('poriva'));
                     $aumobr=H::convnume($this->getRequestParameter('aumobr'));
                     $disobr=H::convnume($this->getRequestParameter('disobr'));
                     $obrext=H::convnume($this->getRequestParameter('obrext'));
                     $monper=H::convnume($this->getRequestParameter('monper'));
                     $valpag=H::convnume($this->getRequestParameter('valpag'));
                     $idval=$this->getRequestParameter('idval');
                     switch($tipval)
                     {
	                   case $this->val_ant:
	                     switch($codtipcon)
                         {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                         }
                         $gasretot=number_format((($gasree*$porant)/100),2,',','.');
                         $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                         $this->ret_ant=$this->retant;
                         $this->codcont=$codcon;
                         $this->tipvalu=$tipval;
                         $this->arreglorete=Obras::tiraR($arregloret);
                         $this->arreglomonto=Obras::tiraM($arreglomontos);

                         if ($this->retant=='S')
                         {
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                           if ($msj1=="")
                           { //ajax 7
                           }else {
                           	 $javascript=$javascript."alert('$msj1'); ";
                           }
                         }
                         else
                         {
                         	$arreglomontos[0]["monfia"]=0;
                         	$arreglomontos[0]["totded"]=0;
                         	$arreglomontos[0]["retacu"]=0;
                         }
	                    break;
	                   case $this->val_par:
	                   case $this->val_fin:
	                      switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          Obras::calcularGasRee($codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,$gasree_tra,&$gasretot);
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                       case $this->val_ret:
                         switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosRetencionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                       case $this->val_rec:
                         switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                            $this->otro='S';
                            $arregloret=array();
                            $arreglomontos=array();
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosDatosRec($codcon,$this->par_rec,$this->val_ant,$this->val_par,$this->val_fin,$this->val_rec,$this->val_ret,$data->getMoncon(),$tipval,$codobr,$poriva,$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          {
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                     }

                     Obras::calcularMontoPagar($arreglomontos[0]["totsiniva"],$arreglomontos[0]["amortant"],$arreglomontos[0]["monfia"],&$arreglomontos[0]["monper"],$arreglomontos[0]["totded"],$arreglomontos[0]["valpag"],$tipval,$this->val_fin,&$arreglomontos[0]["monpag"]);
	                 Obras::totalValPresentadas($arreglomontos[0]["monper"],$poriva,$codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,&$arreglomontos[0]["montototcon"],$data->getMoncon(),&$arreglomontos[0]["monval"],&$arreglomontos[0]["salliq"],&$arreglomontos[0]["valpag"],&$monconiva);
                      $javascript=$javascript."$('ocregval_moncon').readOnly=true; $('ocregval_aumobr').readOnly=true; $('ocregval_disobr').readOnly=true; $('ocregval_obrext').readOnly=true; $('ocregval_monful').readOnly=true; $('ocregval_totsiniva').readOnly=true; $('ocregval_amortant').readOnly=true; $('ocregval_monfia').readOnly=true; $('ocregval_monper').readOnly=true; $('ocregval_totded').readOnly=true; $('ocregval_valpag').readOnly=true; $('ocregval_monpag').readOnly=true; $('ocregval_subtot').readOnly=true; $('ocregval_montotcon').readOnly=true; $('ocregval_monval').readOnly=true; $('ocregval_salliq').readOnly=true; $('ocregval_retacu').readOnly=true; $('ocregval_monant').readOnly=true; $('ocregval_salantic').readOnly=true; $('ocregval_monantic').readOnly=true; ";
                     //Activar Pestaña
                      switch($tipval)
                      {
	                     case $this->val_ant:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Anticipo ( ".$this->getRequestParameter('porant')." % )'; ";
	                      break;
	                     case $this->val_ret:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Retención ( ".$this->getRequestParameter('porant')." % )'; ";
	                      break;
	                     case $this->val_par:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
	                      break;
	                     case $this->val_fin:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
	                      break;
                      }
                     //Fin de Activar Pestaña
                     //Fin de Datos Parciales
                     $javascript=$javascript."$('ocregval_codcon').readOnly=true; $('ocregval_numval').readOnly=true;  ";
                     if ($idval!='' && $porant!='0,00' && $poriva!='0,00')
                     {
                       	Obras::calcularAmortizacion($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$arreglomontos[0]["totiva"],$porant,&$msj,&$arreglomontos[0]["monantic"],&$arreglomontos[0]["monant"],&$arreglomontos[0]["salantic"],&$arreglomontos[0]["amortant"]);
                     }
	               break;
	              case $this->val_ret:
                     $javascript="$('porcentaje').hide(); ";
	                 //Datos Parciales
	                 $codcon=$data->getCodcon();
	                 $codobr=$data->getCodobr();
	                 $desobr=Herramientas::getX('CODOBR','Ocregobr','desobr',$codobr);
	                 $codpro=Herramientas::getX('CODOBR','Ocadjobr','codprogan',$codobr);
                     $despro=Herramientas::getX('CODPRO','Caprovee','nompro',$codpro);
	                 $codtipcon=$data->getTipcon();
	                 $gasree= $data->getGasree();
	                 $gasree_tra=$gasree;
                     //$fecha=date;
                     $monoricon=number_format($data->getMoncon(),2,',','.');
                     $porant=H::convnume($this->getRequestParameter('porant'));
                     $gasretot=number_format((($gasree*$porant)/100),2,',','.');
                     $tipval=$this->getRequestParameter('tipval');
                     $poriva=H::convnume($this->getRequestParameter('poriva'));
                     $aumobr=H::convnume($this->getRequestParameter('aumobr'));
                     $disobr=H::convnume($this->getRequestParameter('disobr'));
                     $obrext=H::convnume($this->getRequestParameter('obrext'));
                     $monper=H::convnume($this->getRequestParameter('monper'));
                     $valpag=H::convnume($this->getRequestParameter('valpag'));
                     $idval=$this->getRequestParameter('idval');
                     switch($tipval)
                     {
	                   case $this->val_ant:
	                     switch($codtipcon)
                         {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                         }
                         $gasretot=number_format((($gasree*$porant)/100),2,',','.');
                         $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                         $this->ret_ant=$this->retant;
                         $this->codcont=$codcon;
                         $this->tipvalu=$tipval;
                         $this->arreglorete=Obras::tiraR($arregloret);
                         $this->arreglomonto=Obras::tiraM($arreglomontos);

                         if ($this->retant=='S')
                         {
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                           if ($msj1=="")
                           { //ajax 7
                           }else {
                           	 $javascript=$javascript."alert('$msj1'); ";
                           }
                         }
                         else
                         {
                         	$arreglomontos[0]["monfia"]=0;
                         	$arreglomontos[0]["totded"]=0;
                         	$arreglomontos[0]["retacu"]=0;
                         }
	                    break;
	                   case $this->val_par:
	                   case $this->val_fin:
	                      switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          Obras::calcularGasRee($codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,$gasree_tra,&$gasretot);
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                       case $this->val_ret:
                         switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosRetencionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                       case $this->val_rec:
                         switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                            $this->otro='S';
                            $arregloret=array();
                            $arreglomontos=array();
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosDatosRec($codcon,$this->par_rec,$this->val_ant,$this->val_par,$this->val_fin,$this->val_rec,$this->val_ret,$data->getMoncon(),$tipval,$codobr,$poriva,$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                     }

                     Obras::calcularMontoPagar($arreglomontos[0]["totsiniva"],$arreglomontos[0]["amortant"],$arreglomontos[0]["monfia"],&$arreglomontos[0]["monper"],$arreglomontos[0]["totded"],$arreglomontos[0]["valpag"],$tipval,$this->val_fin,&$arreglomontos[0]["monpag"]);
	                 Obras::totalValPresentadas($arreglomontos[0]["monper"],$poriva,$codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,&$arreglomontos[0]["montototcon"],$data->getMoncon(),&$arreglomontos[0]["monval"],&$arreglomontos[0]["salliq"],&$arreglomontos[0]["valpag"],&$monconiva);
                      $javascript=$javascript."$('ocregval_moncon').readOnly=true; $('ocregval_aumobr').readOnly=true; $('ocregval_disobr').readOnly=true; $('ocregval_obrext').readOnly=true; $('ocregval_monful').readOnly=true; $('ocregval_totsiniva').readOnly=true; $('ocregval_amortant').readOnly=true; $('ocregval_monfia').readOnly=true; $('ocregval_monper').readOnly=true; $('ocregval_totded').readOnly=true; $('ocregval_valpag').readOnly=true; $('ocregval_monpag').readOnly=true; $('ocregval_subtot').readOnly=true; $('ocregval_montotcon').readOnly=true; $('ocregval_monval').readOnly=true; $('ocregval_salliq').readOnly=true; $('ocregval_retacu').readOnly=true; $('ocregval_monant').readOnly=true; $('ocregval_salantic').readOnly=true; $('ocregval_monantic').readOnly=true; ";
                     //Activar Pestaña
                      switch($tipval)
                      {
	                     case $this->val_ant:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Anticipo ( ".$this->getRequestParameter('porant')." % )'; ";
	                      break;
	                     case $this->val_ret:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Retención ( ".$this->getRequestParameter('porant')." % )'; ";
	                      break;
	                     case $this->val_par:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
	                      break;
	                     case $this->val_fin:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
	                      break;
                      }
                     //Fin de Activar Pestaña
                     //Fin de Datos Parciales
                     $javascript=$javascript."$('ocregval_codcon').readOnly=true; $('ocregval_numval').readOnly=true; ";
	               break;
	              case $this->val_rec:
                     $javascript="$('porcentaje').hide(); ";
	                 //Datos Parciales
	                 $codcon=$data->getCodcon();
	                 $codobr=$data->getCodobr();
	                 $desobr=Herramientas::getX('CODOBR','Ocregobr','desobr',$codobr);
	                 $codpro=Herramientas::getX('CODOBR','Ocadjobr','codprogan',$codobr);
                     $despro=Herramientas::getX('CODPRO','Caprovee','nompro',$codpro);
	                 $codtipcon=$data->getTipcon();
	                 $gasree= $data->getGasree();
	                 $gasree_tra=$gasree;
                     //$fecha=date;
                     $monoricon=number_format($data->getMoncon(),2,',','.');
                     $porant=H::convnume($this->getRequestParameter('porant'));
                     $gasretot=number_format((($gasree*$porant)/100),2,',','.');
                     $tipval=$this->getRequestParameter('tipval');
                     $poriva=H::convnume($this->getRequestParameter('poriva'));
                     $aumobr=H::convnume($this->getRequestParameter('aumobr'));
                     $disobr=H::convnume($this->getRequestParameter('disobr'));
                     $obrext=H::convnume($this->getRequestParameter('obrext'));
                     $monper=H::convnume($this->getRequestParameter('monper'));
                     $valpag=H::convnume($this->getRequestParameter('valpag'));
                     $idval=$this->getRequestParameter('idval');
                     switch($tipval)
                     {
	                   case $this->val_ant:
	                     switch($codtipcon)
                         {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                         }
                         $gasretot=number_format((($gasree*$porant)/100),2,',','.');
                         $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                         $this->ret_ant=$this->retant;
                         $this->codcont=$codcon;
                         $this->tipvalu=$tipval;
                         $this->arreglorete=Obras::tiraR($arregloret);
                         $this->arreglomonto=Obras::tiraM($arreglomontos);

                         if ($this->retant=='S')
                         {
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                           if ($msj1=="")
                           { //ajax 7
                           }else {
                           	 $javascript=$javascript."alert('$msj1'); ";
                           }
                         }
                         else
                         {
                         	$arreglomontos[0]["monfia"]=0;
                         	$arreglomontos[0]["totded"]=0;
                         	$arreglomontos[0]["retacu"]=0;
                         }
	                    break;
	                   case $this->val_par:
	                   case $this->val_fin:
	                      switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          Obras::calcularGasRee($codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,$gasree_tra,&$gasretot);
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                       case $this->val_ret:
                         switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                             $this->otro='S';
                             $javascript=$javascript."$('gastosree').show(); $('tab1').innerHTML='<a id=tab1 href=#>Oferta de Servicio</a>'; $('oferta').show(); $('partida').hide(); ";
                             Obras::datosOfertaContrato($codcon,$tipval,$this->val_ant,$this->val_par,$this->val_ret,$this->val_fin,$this->val_rec,$poriva,$porant,$idval,$gasretot,$data->getMoncon(),$aumobr,$disobr,$obrext,$monper,$valpag,&$arreglooferta,&$arregloret,&$arreglomontos,&$msj,&$montotoferacum);
                             if ($msj=="")
                             {
                             	$this->configGridOfertas('','','','',$arreglooferta);
                             }
                             else
                             {
                             	$javascript=$javascript."alert('$msj'); ";
                             	$this->configGridOfertas();
                             }
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosPartidaContrato($codcon,$tipval,$codobr,$poriva,$data->getMoncon(),$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosRetencionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                       case $this->val_rec:
                         switch($codtipcon)
                          {
                           case $this->con_ins:
                           case $this->con_sup:
                           case $this->con_pro:
                            $this->otro='S';
                            $arregloret=array();
                            $arreglomontos=array();
                            break;
                           default:
                            $this->otro='N';
                            Obras::datosDatosRec($codcon,$this->par_rec,$this->val_ant,$this->val_par,$this->val_fin,$this->val_rec,$this->val_ret,$data->getMoncon(),$tipval,$codobr,$poriva,$porant,$aumobr,$disobr,$obrext,$monper,$valpag,$gasretot,&$arreglopar,&$arregloret,&$nomcolum,&$msj,&$arreglomontos,&$montotparacum);
                            if ($msj=="")
                            {
                              $this->configGridPartidas('',$tipval,'','',$arreglopar,$nomcolum);
                            }
                            else
                            {
                              $javascript=$javascript."alert('$msj'); ";
                              $this->configGridPartidas();
                            }
                            break;
                          }
                          $javascript=$javascript."$('ocregval_monant').readOnly=true; ";
                          $this->ret_ant=$this->retant;
                          $this->codcont=$codcon;
                          $this->tipvalu=$tipval;
                          $this->arreglorete=Obras::tiraR($arregloret);
                          $this->arreglomonto=Obras::tiraM($arreglomontos);
                          Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
                          if ($msj1=="")
                          { //ajax 7
                          }else {
                           $javascript=$javascript."alert('$msj1'); ";
                          }
                        break;
                     }

                     Obras::calcularMontoPagar($arreglomontos[0]["totsiniva"],$arreglomontos[0]["amortant"],$arreglomontos[0]["monfia"],&$arreglomontos[0]["monper"],$arreglomontos[0]["totded"],$arreglomontos[0]["valpag"],$tipval,$this->val_fin,&$arreglomontos[0]["monpag"]);
	                 Obras::totalValPresentadas($arreglomontos[0]["monper"],$poriva,$codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,&$arreglomontos[0]["montototcon"],$data->getMoncon(),&$arreglomontos[0]["monval"],&$arreglomontos[0]["salliq"],&$arreglomontos[0]["valpag"],&$monconiva);
                      $javascript=$javascript."$('ocregval_moncon').readOnly=true; $('ocregval_aumobr').readOnly=true; $('ocregval_disobr').readOnly=true; $('ocregval_obrext').readOnly=true; $('ocregval_monful').readOnly=true; $('ocregval_totsiniva').readOnly=true; $('ocregval_amortant').readOnly=true; $('ocregval_monfia').readOnly=true; $('ocregval_monper').readOnly=true; $('ocregval_totded').readOnly=true; $('ocregval_valpag').readOnly=true; $('ocregval_monpag').readOnly=true; $('ocregval_subtot').readOnly=true; $('ocregval_montotcon').readOnly=true; $('ocregval_monval').readOnly=true; $('ocregval_salliq').readOnly=true; $('ocregval_retacu').readOnly=true; $('ocregval_monant').readOnly=true; $('ocregval_salantic').readOnly=true; $('ocregval_monantic').readOnly=true; ";
                     //Activar Pestaña
                      switch($tipval)
                      {
	                     case $this->val_ant:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Anticipo ( ".$this->getRequestParameter('porant')." % )'; ";
	                      break;
	                     case $this->val_ret:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Retención ( ".$this->getRequestParameter('porant')." % )'; ";
	                      break;
	                     case $this->val_par:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
	                      break;
	                     case $this->val_fin:
	                       $javascript=$javascript."$('label16').innerHTML = 'IVA ( ".$this->getRequestParameter('poriva')." % )'; $('label41').innerHTML = 'Total con Iva'; ";
	                      break;
                      }
                     //Fin de Activar Pestaña
                     //Fin de Datos Parciales
                     $javascript=$javascript."$('ocregval_codcon').readOnly=true; $('ocregval_numval').readOnly=true; ";
	               break;
                 }
	            break;
             }
           }
         }
       }
       if (count($arreglomontos)>0)
       {
	       $arrmontotcon=number_format($arreglomontos[0]["montototcon"],2,',','.');
	       $arrsubtot=number_format($arreglomontos[0]["subtot"],2,',','.');
	       $arrmoniva=number_format($arreglomontos[0]["moniva"],2,',','.');
	       $arrtotiva=number_format($arreglomontos[0]["totiva"],2,',','.');
	       $arrtotsiniva=number_format($arreglomontos[0]["totsiniva"],2,',','.');
	       $arrmonantic=number_format($arreglomontos[0]["monantic"],2,',','.');
	       $arrmonant=number_format($arreglomontos[0]["monant"],2,',','.');
	       $arrsalantic=number_format($arreglomontos[0]["salantic"],2,',','.');
	       $arramortant=number_format($arreglomontos[0]["amortant"],2,',','.');
	       $arrmonful=number_format($arreglomontos[0]["monful"],2,',','.');
	       $arrmonfia=number_format($arreglomontos[0]["monfia"],2,',','.');
	       $arrtotded=number_format($arreglomontos[0]["totded"],2,',','.');
	       $arrretacu=number_format($arreglomontos[0]["retacu"],2,',','.');
	       $arrmonper=number_format($arreglomontos[0]["monper"],2,',','.');
	       $arrmonpag=number_format($arreglomontos[0]["monpag"],2,',','.');
	       $arrmonval=number_format($arreglomontos[0]["monval"],2,',','.');
	       $arrsalliq=number_format($arreglomontos[0]["salliq"],2,',','.');
	       $arrvalpag=number_format($arreglomontos[0]["valpag"],2,',','.');
       }
       else
       {
       	 $arrmontotcon="0,00"; $arrsubtot="0,00"; $arrmoniva="0,00"; $arrtotiva="0,00"; $arrtotsiniva="0,00"; $arrmonantic="0,00"; $arrmonant="0,00"; $arrsalantic="0,00";
	     $arramortant="0,00";  $arrmonful="0,00"; $arrmonfia="0,00"; $arrtotded="0,00"; $arrretacu="0,00"; $arrmonper="0,00"; $arrmonpag="0,00";$arrmonval="0,00";
	     $arrsalliq="0,00"; $arrvalpag="0,00";
       }
       $filpar=$this->filaspar; $filofer=$this->filasofer;
       $output = '[["ocregval_codobr","'.$codobr.'",""],["ocregval_desobr","'.$desobr.'",""],["ocregval_codpro","'.$codpro.'",""],["ocregval_nompro","'.$despro.'",""],["ocregval_codtipcon","'.$codtipcon.'",""],["ocregval_moncon","'.$monoricon.'",""],["ocregval_gasree","'.$gasretot.'",""],["ocregval_montotcon","'.$arrmontotcon.'",""],["ocregval_subtot","'.$arrsubtot.'",""],["ocregval_moniva","'.$arrmoniva.'",""],["ocregval_totiva","'.$arrtotiva.'",""],["ocregval_totsiniva","'.$arrtotsiniva.'",""],["ocregval_monantic","'.$arrmonantic.'",""],["ocregval_monant","'.$arrmonant.'",""],["ocregval_salantic","'.$arrsalantic.'",""],["ocregval_amortant","'.$arramortant.'",""],["ocregval_monful","'.$arrmonful.'",""],["ocregval_monfia","'.$arrmonfia.'",""],["ocregvaltotded","'.$arrtotded.'",""],["ocregval_retacu","'.$arrretacu.'",""],["ocregval_monper","'.$arrmonper.'",""],["ocregval_monpag","'.$arrmonpag.'",""],["ocregval_monval","'.$arrmonval.'",""],["ocregval_salliq","'.$arrsalliq.'",""],["ocregval_valpag","'.$arrvalpag.'",""],["ocregval_montotparacum","'.$montotparacum.'",""],["ocregval_montotoferacum","'.$montotoferacum.'",""],["ocregval_monperiva","'.$monconiva.'",""],["ocregval_filaspar","'.$filpar.'",""],["ocregval_filasofer","'.$filofer.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     }
     else if ($this->getRequestParameter('ajax')=='2')
     {
      if ($this->getRequestParameter('tipoval')!='')
      {
       $correl="";
       if ($this->getRequestParameter('idval')=='')
       {
       	$tieneant=Obras::verificarAnticipo($this->getRequestParameter('codcon'),$this->getRequestParameter('tipoval'));
       switch($this->getRequestParameter('tipoval'))
       {
	     case $this->val_ant:
		   $c= new Criteria();
		   $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
		   $c->add(OcregvalPeer::CODTIPVAL,$this->val_ant);
		   $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
		   $resul= OcregvalPeer::doSelectOne($c);
		   if ($resul)
		   {
             $correl=$resul->getNumval();
             $c = new Criteria();
             $c->add(OcregconPeer::CODCON,$this->getRequestParameter('codcon'));
             $c->add(OcregvalPeer::NUMVAL,$correl);
             $c->add(OcregvalPeer::CODTIPVAL,$this->getRequestParameter('tipoval'));
             $c->addjoin(OcregconPeer::CODCON,OcregvalPeer::CODCON);
             $data= OcregconPeer::doSelectOne($c);
             if (!$data)
             {
               $c= new Criteria();
               $c->add(OcregconPeer::CODCON,$this->getRequestParameter('codcon'));
               $resul= OcregconPeer::doSelectOne($c);
               if ($resul)
               {
               	 switch($resul->getStacon())
                 {
	               case 'A':
	                 $javascript="alert_('Este Contrato est&aacute por Iniciarse');";
	                 break;
	               case 'N':
	                 $javascript="alert_('Este Contrato est&aacute Anulado');";
	                 break;
	               case 'P':
	                 $javascript="alert_('Este Contrato est&aacute Paralizado');";
	                 break;
	               case 'T':
	                   $c= new Criteria();
					   $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
					   $c->add(OcregvalPeer::CODTIPVAL,$this->val_fin);
					   $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
					   $c->add(OctipretPeer::STAMON,'T');
					   $c->addjoin(OcregvalPeer::CODTIPVAL,OcretvalPeer::CODTIPVAL);
					   $c->addjoin(OcregvalPeer::CODCON,OcretvalPeer::CODCON);
					   $c->addjoin(OcretvalPeer::CODTIP,OctipretPeer::CODTIP);
					   $resul2= OcregvalPeer::doSelectOne($c);
					   if ($resul2)
					   {
					   	$javascript="alert_('Este Contrato est&aacute Terminado');";
					   }
	                 break;
	               case 'E':
	                   switch($this->getRequestParameter('tipoval'))
				       {
					     case $this->val_ant:
					       $javascript="$('label41').innerHTML = '% Anticipo';";
					      break;
				       }
	                 break;
                 }
               }
             }
		   }
		   else
		   {
		   	$c= new Criteria();
		    $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
		    $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
		    $sub = $c->getNewCriterion(OcregvalPeer::CODTIPVAL,$this->val_par,Criteria::EQUAL);
            $sub->addOr($c->getNewCriterion(OcregvalPeer::CODTIPVAL,$this->val_fin,Criteria::EQUAL));
            $c->add($sub);
		    $resul= OcregvalPeer::doSelect($c);
		    if ($resul)
            {
              $javascript="alert_('No Puede realizar Valuaci&oacute;n de Anticipo, este Contrato ya tiene una Valuaci&oacute;n Parcial o Final');";
            }
            else
            {
              $correl=Obras::Correlativo($this->getRequestParameter('codcon'),$this->getRequestParameter('tipoval'));
              $javascript="$('periodo').hide(); $('porcentaje').show(); $('tab0').hide(); $('label41').innerHTML = '% Anticipo';";
            }
		   }
      	  break;
	     case $this->val_par:
	   	   $c= new Criteria();
		   $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
		   $c->add(OcregvalPeer::CODTIPVAL,$this->val_par);
		   $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
		   $resul= OcregvalPeer::doSelect($c);
		   if ($resul)
		   {

		   }
		   else
		   {
		   	$c= new Criteria();
		    $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
		    $c->add(OcregvalPeer::CODTIPVAL,$this->val_fin);
		    $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
		    $result= OcregvalPeer::doSelect($c);
		    if ($result)
		    {
		       $javascript="alert_('No Puede realizar Valuaci&oacute;n Parcial, este Contrato ya tiene una Valuaci&oacute;n Final');";
		    }
		    else
		    {
		    	$correl=Obras::Correlativo($this->getRequestParameter('codcon'),$this->getRequestParameter('tipoval'));
		    	$javascript="$('porcentaje').show(); $('label19').innerHTML = 'Amortizacion de Anticipo'; $('label41').innerHTML = 'Total con Iva';";
		    }
		   }
          break;
         case $this->val_fin:
           $c= new Criteria();
		   $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
		   $c->add(OcregvalPeer::CODTIPVAL,$this->val_fin);
		   $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
		   $resul= OcregvalPeer::doSelect($c);
		   if ($resul)
		   {
		   	$correl=$resul->getNumval();
		   }
		   else
		   {
		   	 $javascript="$('porcentaje').show(); $('label19').innerHTML = 'Amortización Anticipo';";
		   	 $correl=Obras::Correlativo($this->getRequestParameter('codcon'),$this->getRequestParameter('tipoval'));
		   }
          break;
         case $this->val_ret:
           $c= new Criteria();
		   $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
		   $c->add(OcregvalPeer::CODTIPVAL,$this->val_ret);
		   $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
		   $c->add(OctipretPeer::STAMON,'T');
		   $c->addjoin(OcregvalPeer::CODTIPVAL,OcretvalPeer::CODTIPVAL);
		   $c->addjoin(OcregvalPeer::CODCON,OcretvalPeer::CODCON);
		   $c->addjoin(OcretvalPeer::CODTIP,OctipretPeer::CODTIP);
		   $resul= OcregvalPeer::doSelect($c);
		   if ($resul)
		   {
             $javascript="$('porcentaje').show(); $('label19').innerHTML = '% Retención'; $('label41').innerHTML = '% Retención';";
             $correl=Obras::Correlativo($this->getRequestParameter('codcon'),$this->getRequestParameter('tipoval'));
		   }
		   else
		   {
		   	$javascript="alert_('No Puede realizar Valuaci&oacute;n de Retenci&oacute;n, este Contrato no posee  Valuaci&oacute;n Final o una Fianza');";
		   }
          break;
         case $this->val_rec:
          $c= new Criteria();
          $c->add(OcregconPeer::CODCON,$this->getRequestParameter('codcon'));
          $regis= OcregconPeer::doSelectOne($c);
          if ($regis)
          {
          	if ($regis->getTipcon()!=$this->con_ins && $regis->getTipcon()!=$this->con_sup && $regis->getTipcon()!=$this->con_pro)
          	{
              $c= new Criteria();
		      $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
		      $c->add(OcregvalPeer::CODTIPVAL,$this->val_fin);
		      $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
		      $resul= OcregvalPeer::doSelect($c);
		      if (!$resul)
		      {
		      	   $c= new Criteria();
				   $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
				   $c->add(OcregvalPeer::CODTIPVAL,$this->val_par);
				   $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
				   $c->addjoin(OcregvalPeer::CODTIPVAL,OcparvalPeer::CODTIPVAL);
				   $c->addjoin(OcregvalPeer::CODCON,OcparvalPeer::CODCON);
				   $resul1= OcregvalPeer::doSelect($c);
				   if ($resul1)
				   {
                     $javascript="$('porcentaje').show();";
                     $correl=Obras::Correlativo($this->getRequestParameter('codcon'),$this->getRequestParameter('tipoval'));
				   }
				   else
				   {
				   	$javascript="alert_('No Puede realizar Valuaci&oacute;n de Reconsideración de Precios, este Contrato no posee  Valuaci&oacute;n Parcial o Partida de Reconsideraci&oacute;n de Precios');";
				   }
		      }
		      else
		      {
		      	$javascript="alert_('No Puede realizar Valuaci&oacute;n de Reconsideraci&oacute;n de Precios, este Contrato no posee  una Valuaci&oacute;n Final');";
		      }
          	}
          	else
          	{
          		$javascript="alert_('No Puede realizar Valuación de Reconsideración de Precios, este Contrato no corresponde a una Obra');";
          	}
          }
          break;
       }
      }
      }
  		$output = '[["'.$cajtexmos.'","'.$correl.'",""],["ocregval_tieneant","'.$tieneant.'",""],["javascript","'.$javascript.'",""]]';
  		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
      }
     else  if ($this->getRequestParameter('ajax')=='3')
     {
       $c= new Criteria();
       $c->add(OcadjobrPeer::CODOBR,$this->getRequestParameter('obra'));
       $c->add(OcadjobrPeer::STATUS,1);
       $regist=OcadjobrPeer::doSelectOne($c);
       if ($regist)
       {
        $c= new Criteria();
	    $c->add(CaproveePeer::CODPRO,$regist->getCodprogan());
        $reg=CaproveePeer::doSelectOne($c);
        if ($reg)
        {
       	 $c = new Criteria();
       	 $c->add(OcoferprePeer::CODPRO,$reg->getCodpro());
       	 $c->add(OcoferprePeer::CODOBR,$this->getRequestParameter('obra'));
       	 $regist= OcoferprePeer::doSelect($c);
       	 if ($regist)
       	 {
       	   $dato=$reg->getCodpro();
       	   $dato1=$reg->getNompro();

       	   $c= new Criteria();
       	   $c->add(OcreglicPeer::CODOBR,$this->getRequestParameter('obra'));
       	   $resul= OcreglicPeer::doSelectOne($c);
       	   if ($resul)
       	   {
       	   	$feclici=date('d/m/Y',strtotime($resul->getFecreg()));
       	   }else $feclici='';
       	   $this->configGridPartidas($this->getRequestParameter('obra'),'');
       	   $javascript="$('$cajtexcom').readOnly=true;    $$('.botoncat')[2].disabled=true;";
       	 }
       	 else
       	 { $javascript="alert('La Empresa Contratista no a ofertado para esta obra');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";}

        }else {
         $javascript="alert('La Empresa Contratista no esta registrada');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";
        }
       }
       else
       {
       	$javascript="alert('La Empresa Contratista no ganó la adjudicación de esta obra');";
       }
       $output = '[["'.$cajtexcom.'","'.$dato.'",""],["'.$cajtexmos.'","'.$dato1.'",""],["ocregcon_feclic","'.$feclici.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

     }
     else  if ($this->getRequestParameter('ajax')=='4')
     {
       if ($this->getRequestParameter('tipcon')!=$this->con_ins && $this->getRequestParameter('tipcon')!=$this->con_sup && $this->getRequestParameter('tipcon')!=$this->con_pro)
       {
       	$c = new Criteria;
        $c->add(OcproperPeer::CODPRO,$this->getRequestParameter('codpro'));
        $c->addJoin(OcdefperPeer::CEDPER, OcproperPeer::CEDPER);
        $c->addJoin(OcdefperPeer::CODTIPCAR, OcdefempPeer::CODINGRES);
        $c->addJoin(OcdefperPeer::CODTIPCAR, OctipcarPeer::CODTIPCAR);
        $c->addJoin(OcdefempPeer::CODINGRES, OctipcarPeer::CODTIPCAR);
        $resultado= OcdefperPeer::doSelectOne($c);
        if ($resultado)
        {
          $dato=$resultado->getNomper();
        }
        else { $javascript="alert('El Ingeniero no esta registrado');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";}
       }
       else
       {
       	 if ($this->getRequestParameter('tipcon')==$this->con_ins || $this->getRequestParameter('tipcon')==$this->con_sup || $this->getRequestParameter('tipcon')==$this->con_pro)
         {
           $c = new Criteria;
           $c->add(OcproperPeer::CODPRO,$this->getRequestParameter('codpro'));
           $c->addJoin(OcdefperPeer::CEDPER, OcproperPeer::CEDPER);
           $c->addJoin(OcdefperPeer::CODTIPCAR, OctipcarPeer::CODTIPCAR);
           $resultado= OcdefperPeer::doSelectOne($c);
           if ($resultado)
           {
             $dato=$resultado->getNomper();
           }
           else { $javascript="alert('El Ingeniero no esta registrado');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";}
         }
       }
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='5')
     {
       $c= new Criteria();
       $c->add(OctipretPeer::CODTIP,$this->getRequestParameter('codigo'));
       $registro= OctipretPeer::doSelectOne($c);
       if ($registro)
       {
       	$dato=$registro->getDestip();
       	$dato1=number_format($registro->getPorret(),2,',','.');
       	$dato2=number_format($registro->getBasimp(),2,',','.');
       	$dato3=number_format($registro->getUnitri(),2,',','.');
       	$dato4=number_format($registro->getFactor(),4,',','.');
       	$dato5=number_format($registro->getPorsus(),2,',','.');
       	$dato6=$registro->getStamon();
       }
       else { $dato4=""; $dato5=""; $dato6=""; $javascript="alert('El Tipo de Retención no Existe');$('". $cajtexmos ."').value='';$('". $cajtexcom ."').value='';";}
       $output = '[["'.$cajtexmos.'","'.$dato.'",""],["'.$this->getRequestParameter('porret').'","'.$dato1.'",""],["'.$this->getRequestParameter('baseimp').'","'.$dato2.'",""],["'.$this->getRequestParameter('unidadtri').'","'.$dato3.'",""],["'.$this->getRequestParameter('factor').'","'.$dato4.'",""],["'.$this->getRequestParameter('porsus').'","'.$dato5.'",""],["'.$this->getRequestParameter('estatus').'","'.$dato6.'",""],["javascript","'.$javascript.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='6')
     {
       $c = new Criteria();
       $c->add(OcregconPeer::CODCON,$this->getRequestParameter('contrato'));
       $result= OcregconPeer::doSelectOne($c);
       if ($result)
       {
       	$alicuota=0;
       	$c = new Criteria();
        $reg=OcdefempPeer::doSelectOne($c);
        if ($reg)
        {
          if ($reg->getPormul()=='')
          {
           $alicuota=0;
          }else { $dato='0,00'; $alicuota=$reg->getPormul();}
        }
        else
        {
         $dato='0,00';
         $javascript="alert('La Alícuota no esta definida en elmodulo de Definición de Institución');";
        }
        if ($javascript=="")
        {
         $fecha=$result->getFecpro();
         $fecha2=$result->getFecfin();
         $fecact=date("Y-m-d");
       	if ($fecha!="" && (!null($fecha)))
       	{
         if ($fecact>$fecha)
         {
           $mont=Herramientas::convnume($this->getRequestParameter('montotal'));
           $total=$mont * ($alicuota/1000) * Herramientas::datediff("d",$fecha,$fecact);
           $dato=number_format($total,2,',','.');
         }else { $dato='0,00';}
       	}
       	else
       	{
          if ($fecact>$fecha2)
          {
           $mont=Herramientas::convnume($this->getRequestParameter('montotal'));
           $total=$mont * ($alicuota/1000) * Herramientas::datediff("d",$fecha2,$fecact);
           $dato=number_format($total,2,',','.');
          }else { $dato='0,00';}
       	}
       }
       }else { $dato='0,00';}
       $output = '[["ocregcon_monmul","'.$dato.'",""],["javascript","'.$javascript.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='7')
     {
       $this->div='2';
       $codcon=$this->getRequestParameter('codcon');
       $tipval=$this->getRequestParameter('tipval');
       $val_ret=$this->getRequestParameter('val_ret');
       $cadarrer=$this->getRequestParameter('arregloret');
       $cadarrm=$this->getRequestParameter('arreglomontos');
       $retant=$this->getRequestParameter('retant');
       $arregloret=Obras::conArrR($cadarrer);
       $arreglomontos=Obras::conArrM($cadarrm);
       if ($tipval==$this->val_ant)
       {
	       if ($retant=='S')
	      {
	       Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
	       if ($msj1=="")
	       {
	         $this->configGridRetenciones('','','','',$arregloret);
	       }else {
	       	 $javascript=$javascript."alert('$msj1')";
	       	 $this->configGridRetenciones();
	       }
	      }
	      else
	      {
	     	$this->configGridRetenciones();
	      }
       }else
       {
       	 Obras::datosDeduccionesPar($codcon,&$arregloret,&$arreglomontos,$this->val_ret,$tipval,&$msj1);
	       if ($msj1=="")
	       {
	         $this->configGridRetenciones('','','','',$arregloret);
	       }else {
	       	 $javascript=$javascript."alert('$msj1')";
	       	 $this->configGridRetenciones();
	       }
       }
      $filasret=$this->filasret;
       $output = '[["ocregval_filasret","'.$filasret.'",""],["javascript","'.$javascript.'",""]]';
       $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
     }
     else  if ($this->getRequestParameter('ajax')=='8')
     {
       $codcon=$this->getRequestParameter('codcon');
       $tipval=$this->getRequestParameter('tipval');
       $gasree=H::convnume($this->getRequestParameter('gastos'));
       $gasree_tra=H::getX('codcon','Ocregcon','gasree',$codcon);
       if(Obras::verificarGasree($codcon,$tipval,$gasree))
       {
          //$grid = Herramientas::CargarDatosGrid($this,$this->obj4,true);
          //Obras::totalOferta2();
       }
       else
       {
       	Obras::calcularGasRee($codcon,$this->val_ant,$this->val_par,$this->val_fin,$tipval,$gasree_tra,&$gasretot);
        $saldo_gen_gasree=number_format($gasretot,2,',','.');
       	$javascript="alert('El monto a amortizar debe ser menor a $saldo_gen_gasree'); $('ocregval_gasree').value='0,00';";
       }
       $output = '[["javascript","'.$javascript.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='9')
     {
	     $c = new Criteria();
	     $c->add(OcregconPeer::CODCON,$this->getRequestParameter('codcon'));
	     $c->addjoin(OcregconPeer::CODCON,OcregvalPeer::CODCON);
	     $data= OcregconPeer::doSelectOne($c);
	     if ($data)
	     {
             switch($data->getStacon())
             {
               case 'A':
                 $javascript="alert_('Este Contrato esta por Iniciarse'); $('ocregval_codcon').value='';";
                 break;
               case 'N':
                 $javascript="alert_('Este Contrato esta Anulado'); $('ocregval_codcon').value='';";
                 break;
               case 'P':
                 $javascript="alert_('Este Contrato esta Paralizado'); $('ocregval_codcon').value='';";
                 break;
               case 'T':
                   $c= new Criteria();
				   $c->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
				   $c->add(OcregvalPeer::CODTIPVAL,$this->val_fin);
				   $c->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
				   $c->add(OctipretPeer::STAMON,'T');
				   $c->addjoin(OcregvalPeer::CODTIPVAL,OcretvalPeer::CODTIPVAL);
				   $c->addjoin(OcregvalPeer::CODCON,OcretvalPeer::CODCON);
				   $c->addjoin(OcretvalPeer::CODTIP,OctipretPeer::CODTIP);
				   $resul2= OcregvalPeer::doSelectOne($c);
				   if ($resul2)
				   {
				   	$javascript="alert_('Este Contrato está Terminado');  $('ocregval_codcon').value='';";
				   }
                 break;
               case 'E':
                 $javascript=" $('ocregval_codcon').readOnly=true;";
                 break;
             }
	     }
	     else
	     {
	       $c= new Criteria();
	       $c->add(OcregconPeer::CODCON,$this->getRequestParameter('codcon'));
	       $reg= OcregconPeer::doSelectOne($c);
	       if ($reg)
	       {
	       	 switch($reg->getStacon())
             {
               case 'A':
                 $javascript="alert_('Este Contrato esta por Iniciarse'); $('ocregval_codcon').value=''; $('ocregval_codcon').focus();";
                 break;
               case 'N':
                 $javascript="alert_('Este Contrato esta Anulado'); $('ocregval_codcon').value=''; $('ocregval_codcon').focus();";
                 break;
               case 'P':
                 $javascript="alert_('Este Contrato esta Paralizado'); $('ocregval_codcon').value=''; $('ocregval_codcon').focus();";
                 break;
               case 'T':
				   	$javascript="alert_('Este Contrato está Terminado');  $('ocregval_codcon').value=''; $('ocregval_codcon').focus();";
                 break;
               case 'E':
                 $javascript=" $('ocregval_codcon').readOnly=true;";
                 break;
             }
	       }
	       else
	       {
             $javascript="alert_('El Contrato no Existe');  $('ocregval_codcon').value=''; $('ocregval_codcon').focus();";
	       }
	     }
       $output = '[["javascript","'.$javascript.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='10')
     {
     	$canfinal=H::convnume($this->getRequestParameter('canfinal'));
        $poriva=H::convnume($this->getRequestParameter('poriva'));
        $total=H::convnume($this->getRequestParameter('total'));
        $costo=H::convnume($this->getRequestParameter('costo'));
        $monaumtot=$this->getRequestParameter('monaumtot');
        $mondistot=$this->getRequestParameter('mondistot');
        $monexttotal=$this->getRequestParameter('monexttotal');

        $mondism=0;
        $monaum=0;
        $monext=0;
        $mondisprec=0;
        $monaumprec=0;

        $c= new Criteria();
        $c->add(OcpreobrPeer::CODPAR,$this->getRequestParameter('partida'));
        $c->add(OcpreobrPeer::CODOBR,$this->getRequestParameter('obra'));
        $data=OcpreobrPeer::doSelectOne($c);
        if ($data)
        {
          $cancon=$data->getCancon();
          $cosuni=$data->getCosuni();

          if ($this->getRequestParameter('canfinal')!="0,00" && $this->getRequestParameter('canfinal')!="")
          {
          	if ($cancon >= $canfinal)
          	{
          	  if ($cancon > $canfinal)
          	  {
          	  	$montoiva=(($mondism + (abs($cancon-$canfinal)*$cosuni))*($poriva/100));
          	  	$mondism= $montoiva + $mondism + (abs($cancon-$canfinal)*$cosuni);
          	  }
          	}
          	else
          	{
          		if ($cancon!=0)
          		{
          		  $montoiva=(($monaum + (abs($cancon-$canfinal)*$cosuni))*($poriva/100));
          		  $monaum= $montoiva + $monaum +  (abs($cancon-$canfinal)*$cosuni);
          		}
          		else
          		{
          		  $montoiva=(($monext + $total)*($poriva/100));
          		  $monext= $montoiva + $monext +$total;
          		}
          	}
          }
          if ($this->getRequestParameter('costo')!="0,00" && $this->getRequestParameter('costo')!="")
          {
            if ($cosuni >= $costo)
            {
            	if ($cosuni > $costo)
            	{
            	  $montoiva= (($mondisprec +(abs($cosuni-$costo)*$canfinal))*($poriva/100));
            	  $mondisprec= $montoiva + $mondisprec + (abs($cosuni-$costo)*$canfinal);
            	}
            }
            else
            {
            	if ($cosuni!=0)
            	{
            	  $montoiva= (($monaumprec + (abs($cosuni-$costo)*$canfinal))*($poriva/100));
            	  $monaumprec= $montoiva +$monaumprec + (abs($cosuni-$costo)*$canfinal);
            	}
            }
          }
        }else
        {
         $montoiva=(($monext + $total)*($poriva/100));
         $monext= $montoiva + $monext + $total;
        }

        $monaumtota= $monaumtot + $monaum + $monaumprec;
        $mondistota= $mondistot + $mondism + $mondisprec;
        $monexttotala= $monexttotal + $monext;

        $monaumtotaf=number_format($monaumtota,2,',','.');
        $mondistotaf=number_format($mondistota,2,',','.');
        $monexttotalaf=number_format($monexttotala,2,',','.');


    	$output = '[["ocregval_monaumtot","'.$monaumtota.'",""],["ocregval_mondistot","'.$mondistota.'",""],["ocregval_monexttotal","'.$monexttotala.'",""],["ocregval_aumobr","'.$monaumtotaf.'",""],["ocregval_disobr","'.$mondistotaf.'",""],["ocregval_obrext","'.$monexttotalaf.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='11')
     {
     	$javascript="";
     	$q= new Criteria();
     	$q->add(OcregvalPeer::CODCON,$this->getRequestParameter('codcon'));
     	$q->add(OcregvalPeer::CODTIPVAL,$this->getRequestParameter('valant'));
     	$q->add(OcregvalPeer::STAVAL,'N',Criteria::NOT_EQUAL);
     	$q->add(OcregvalPeer::STAVAL,'T',Criteria::NOT_EQUAL);
     	$reg= OcregvalPeer::doSelectOne($q);
     	if ($reg)
     	{
          $monantacum=0;
          $todoamortizado=0;
          $sql="select coalesce(sum(AmoAnt),0) as sumatotal from OCREGVAL where codcon='".$this->getRequestParameter('codcon')."' and staval<>'N' and staval<>'T'";
          if (Herramientas::BuscarDatos($sql,&$regi))
          {
            $monantacum= $regi[0]['sumatotal'];
          }
          $todoamortizado= $reg->getMonper() - $monantacum;
          if ($this->getRequestParameter('idval')=="")
          {
            $monantic=number_format($todoamortizado,2,',','.');
            switch ($this->getRequestParameter('tipval'))
            {
              case ($this->val_fin):
                $monant=number_format($todoamortizado,2,',','.');
                $amorant=number_format($todoamortizado,2,',','.');
               break;
              case ($this->val_par):
               $calmonant=((H::convnume($this->getRequestParameter('totiva')) * H::convnume($this->getRequestParameter('poant'))) /100);
               $monant=number_format($calmonant,2,',','.');
               if ($calmonant<=$todoamortizado)
               {
               	$calmonant=((H::convnume($this->getRequestParameter('totiva')) * H::convnume($this->getRequestParameter('poant'))) /100);
               	$monant=number_format($calmonant,2,',','.');
               	$amorant=number_format($calmonant,2,',','.');
               }else
               {
               	$javascript="alert('El porcentaje de Amortizacion excede el Saldo del anticipo');";
               	$monant="0,00";
               	$amorant="0,00";
               }
               break;
            }
          }
     	}
     	else
          {
          	$monant="0,00";
            $amorant="0,00";
            $monantic="0,00";
          }
          $calculosalantic=H::convnume($monantic) - H::convnume($monant);
         $salantic= number_format($calculosalantic,2,',','.');

       $output = '[["ocregval_monantic","'.$monantic.'",""],["ocregval_monant","'.$monant.'",""],["ocregval_amorant","'.$amorant.'",""],["ocregval_salantic","'.$salantic.'",""],["javascript","'.$javascript.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
     else  if ($this->getRequestParameter('ajax')=='12')
     {
       $montototalvalpres=0;
       $iva_valuacion=0;
       $monto_con_iva=0;
       $montotcont=$this->getRequestParameter('montotcon');
       $valpag=$this->getRequestParameter('valpag');
       $iva_valuacion=(H::convnume($this->getRequestParameter('monper')) * (H::convnume($this->getRequestParameter('poriva'))/100));
       $monto_con_iva= H::convnume($this->getRequestParameter('monper')) + $iva_valuacion;
       if ($this->getRequestParameter('idval')=="")
       {
       	 $sql="select coalesce(sum(MONPAG),0) as suma from OCREGVAL where codcon='".$this->getRequestParameter('codcon')."' and staval<>'N' and Codtipval<>'".$this->val_ant."' and Codtipval<>'".$this->val_fin."'";
          if (Herramientas::BuscarDatos($sql,&$regi))
          {
            switch ($this->getRequestParameter('tipval'))
            {
              case ($this->val_par):
              case ($this->val_ant):
                if ($monto_con_iva>0)
                {
                  $monval=number_format($regi[0]['suma'],2,',','.');
                  $calsalliq=H::convnume($this->getRequestParameter('montotcon')) - $regi[0]['suma'];
                  $salliq=number_format($calsalliq,2,',','.');
                }else {
                  $monval=number_format($regi[0]['suma'],2,',','.');
                  $calsalliq=H::convnume($this->getRequestParameter('montotcon')) - $regi[0]['suma'];
                  $salliq=number_format($calsalliq,2,',','.');
                }
               break;
              case ($this->val_fin):
               if ($monto_con_iva>0)
                {
                  $montotcont=$this->getRequestParameter('monful');
                  $monval=number_format($regi[0]['suma'],2,',','.');
                  $valpag=number_format($regi[0]['suma'],2,',','.');
                  $calsalliq=H::convnume($montotcont) - $regi[0]['suma'];
                  $salliq=number_format($calsalliq,2,',','.');
                }
                else {
                  $monval=number_format($regi[0]['suma'],2,',','.');
                  $calsalliq=H::convnume($this->getRequestParameter('montotcon')) - $regi[0]['suma'];
                  $salliq=number_format($calsalliq,2,',','.');
                }
               break;
            }
          }
          else
          {
          	$monval="0,00";
          	$salliq=$this->getRequestParameter('montotcon');
          }
       }
       $output = '[["ocregval_monval","'.$monval.'",""],["ocregval_salliq","'.$salliq.'",""],["ocregval_montotcon","'.$montotcont.'",""],["ocregval_valpag","'.$valpag.'",""]]';
  	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
       return sfView::HEADER_ONLY;
     }
    }

  public function setVars()
  {
  	$this->ocregval = $this->getOcregvalOrCreate();
    $c= new Criteria();
    $reg=OcdefempPeer::doSelectOne($c);
    if ($reg)
    {
      $this->val_ant=$reg->getCodvalant();
      $this->val_par=$reg->getCodvalpar();
      $this->val_fin=$reg->getCodvalfin();
      $this->val_ret=$reg->getCodvalret();
      $this->val_rec=$reg->getCodvalrec();
      $this->con_obra=$reg->getCodconobr();
      $this->con_ins=$reg->getCodconins();
      $this->con_sup=$reg->getCodconsup();
      $this->con_pro=$reg->getCodconpro();
      $this->par_rec=$reg->getCodparrec();
      if ($reg->getIvaant()==null)
      {
      	$this->ivaant="N";
      }else { $this->ivaant=$reg->getIvaant();}

      if ($reg->getRetant()==null)
      {
      	$this->retant="N";
      }else { $this->retant=$reg->getRetant();}
    }
    else
    {
      $this->val_ant="";
      $this->val_par="";
      $this->val_fin="";
      $this->val_ret="";
      $this->val_rec="";
      $this->con_obra="";
      $this->con_ins="";
      $this->con_sup="";
      $this->con_pro="";
      $this->ivaant="";
      $this->retant="";
    }

    $this->verifica_anular=Obras::verificarRelaciones($this->ocregval->getCodcon(),$this->ocregval->getCodtipval());



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
  protected function saveOcregval($ocregval)
  {
  	$new=$ocregval->getId();
  	if ($new)
  	{
  	   $ocregval->save();
  	}
  	else
  	{
	    $grid1=Herramientas::CargarDatosGrid($this,$this->obj2,true);
	    $grid2=Herramientas::CargarDatosGrid($this,$this->obj3);
	    $grid3=Herramientas::CargarDatosGrid($this,$this->obj4,true);
	    $grid4=Herramientas::CargarDatosGrid($this,$this->obj,true);

	    Obras::salvarOycval($ocregval,$grid1,$grid2,$grid3,$grid4,$new);
  	}

  }

  public function executeAnular()
  {
    $this->ocregval = OcregvalPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocregval);

    $tipcon=H::getX('Codcon','Ocregcon','Tipcon',$this->ocregval->getCodcon());
    $this->setVars();
    switch($tipcon)
    {
      case ($this->con_ins || $this->con_sup || $this->con_pro):
        $a= new Criteria();
        $a->add(OcofeservalPeer::CODCON,$this->ocregval->getCodcon());
        $a->add(OcofeservalPeer::NUMVAL,$this->ocregval->getNumval());
        $a->add(OcofeservalPeer::CODTIPVAL,$this->ocregval->getCodtipval());
        $data= OcofeservalPeer::doSelect($a);
        if ($data)
        {
          foreach ($data as $obj)
          {
            $d= new Criteria();
            $d->add(OcofeserPeer::CODCON,$this->ocregval->getCodcon());
            $d->add(OcofeserPeer::CODTIPPRO,$obj->getCodtippro());
            $d->add(OcofeserPeer::NIVPRO,$obj->getNivpro());
            $d->add(OcofeserPeer::EXPPRO,$obj->getExppro());
            $registro= OcofeserPeer::doSelectOne($d);
            if ($registro)
            {
              if ($this->val_fin!=$this->ocregval->getCodtipval())
              {
                $registro->setCanval($registro->getCanval() - $obj->getCantidad());
                $registro->save();
              }
              else
              {
              	$registro->setCanhorfin($registro->getCanhorfin() - $obj->getCantidad());
                $registro->save();
              }
            }
            $obj->delete();
          }
        }
       break;
      default:
        $a= new Criteria();
        $a->add(OcparvalPeer::CODCON,$this->ocregval->getCodcon());
        $a->add(OcparvalPeer::NUMVAL,$this->ocregval->getNumval());
        $a->add(OcparvalPeer::CODTIPVAL,$this->ocregval->getCodtipval());
        $data= OcparvalPeer::doSelect($a);
        if ($data)
        {
          foreach ($data as $obj)
          {
             $d= new Criteria();
             $d->add(OcparconPeer::CODCON,$this->ocregval->getCodcon());
             $d->add(OcparconPeer::CODPAR,$obj->getCodpar());
             $reg= OcparconPeer::doSelectOne($d);
             if ($reg)
             {
              $reg->setCanval($reg->getCanval() - $obj->getCantidad());
              $reg->save();
             }

             if ($this->val_fin==$this->ocregval->getCodtipval())
             {
             	$c= new Criteria();
             	$c->add(OcpreobrPeer::CODOBR,$this->ocregval->getCodobr());
             	$c->add(OcpreobrPeer::CODPAR,$obj->getCodpar());
             	$regi= OcpreobrPeer::doSelectOne($c);
             	if ($regi)
             	{
                  $regi->setCanconfin($regi->getCanconfin() - $obj->getCantidad());
                  $regi->save();
             	}
             }
          }
        }
       break;
    }

    $a= new Criteria();
    $a->add(OcregvalPeer::CODCON,$this->ocregval->getCodcon());
    $a->add(OcregvalPeer::NUMVAL,$this->ocregval->getNumval());
    $a->add(OcregvalPeer::CODTIPVAL,$this->ocregval->getCodtipval());
    $data= OcregvalPeer::doSelectOne($a);
    if ($data)
    {
      $data->setStaval('N');
      $data->save();
    }

     $this->setFlash('notice', 'La Valuación ha sido Anulada');
     return $this->redirect('oycval/edit?id='.$this->ocregval->getId());
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->ocregval = OcregvalPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->ocregval);

    $tipcon=H::getX('Codcon','Ocregcon','Tipcon',$this->ocregval->getCodcon());
    $this->setVars();
    switch($tipcon)
    {
      case ($this->con_ins || $this->con_sup || $this->con_pro):
        $a= new Criteria();
        $a->add(OcofeservalPeer::CODCON,$this->ocregval->getCodcon());
        $a->add(OcofeservalPeer::NUMVAL,$this->ocregval->getNumval());
        $a->add(OcofeservalPeer::CODTIPVAL,$this->ocregval->getCodtipval());
        $data= OcofeservalPeer::doSelect($a);
        if ($data)
        {
          foreach ($data as $obj)
          {
            $d= new Criteria();
            $d->add(OcofeserPeer::CODCON,$this->ocregval->getCodcon());
            $d->add(OcofeserPeer::CODTIPPRO,$obj->getCodtippro());
            $d->add(OcofeserPeer::NIVPRO,$obj->getNivpro());
            $d->add(OcofeserPeer::EXPPRO,$obj->getExppro());
            $registro= OcofeserPeer::doSelectOne($d);
            if ($registro)
            {
              if ($this->val_fin!=$this->ocregval->getCodtipval())
              {
                $registro->setCanval($registro->getCanval() - $obj->getCantidad());
                $registro->save();
              }
              else
              {
              	$registro->setCanhorfin($registro->getCanhorfin() - $obj->getCantidad());
                $registro->save();
              }
            }
            $obj->delete();
          }
        }
       break;
      default:
        $a= new Criteria();
        $a->add(OcparvalPeer::CODCON,$this->ocregval->getCodcon());
        $a->add(OcparvalPeer::NUMVAL,$this->ocregval->getNumval());
        $a->add(OcparvalPeer::CODTIPVAL,$this->ocregval->getCodtipval());
        $data= OcparvalPeer::doSelect($a);
        if ($data)
        {
          foreach ($data as $obj)
          {
            switch($tipcon)
            {
              case $this->val_par:
                 $d= new Criteria();
	             $d->add(OcparconPeer::CODCON,$this->ocregval->getCodcon());
	             $d->add(OcparconPeer::CODPAR,$obj->getCodpar());
	             $reg= OcparconPeer::doSelectOne($d);
	             if ($reg)
	             {
	              $reg->setCanval($reg->getCanval() - $obj->getCantidad());
	              $reg->save();
	             }
               break;
              case $this->val_fin:
                 $d= new Criteria();
	             $d->add(OcparconPeer::CODCON,$this->ocregval->getCodcon());
	             $d->add(OcparconPeer::CODPAR,$obj->getCodpar());
	             $reg= OcparconPeer::doSelectOne($d);
	             if ($reg)
	             {
	              $reg->setCanval($reg->getCanval() - $obj->getCantidad());
	              $reg->save();
	             }

	            $c= new Criteria();
             	$c->add(OcpreobrPeer::CODOBR,$this->ocregval->getCodobr());
             	$c->add(OcpreobrPeer::CODPAR,$obj->getCodpar());
             	$regi= OcpreobrPeer::doSelectOne($c);
             	if ($regi)
             	{
                  $regi->setCanconfin($regi->getCanconfin() - $obj->getCantidad());
                  $regi->setCosunifin(0);
                  $regi->save();
             	}
               break;
              case $this->val_rec:
                $c= new Criteria();
             	$c->add(OcpreobrPeer::CODOBR,$this->ocregval->getCodobr());
             	$c->add(OcpreobrPeer::CODPAR,$obj->getCodpar());
             	$regi= OcpreobrPeer::doSelectOne($c);
             	if ($regi)
             	{
                  $regi->setCanconfin(0);
                  $regi->setCosunifin(0);
                  $regi->save();
             	}
               break;
            }
            $obj->delete();
          }
        }
       break;
    }

    $a= new Criteria();
    $a->add(OcinsvalPeer::CODCON,$this->ocregval->getCodcon());
    $a->add(OcinsvalPeer::NUMVAL,$this->ocregval->getNumval());
    $a->add(OcinsvalPeer::CODTIPVAL,$this->ocregval->getCodtipval());
    OcinsvalPeer::doDelete($a);


    $a->add(OcretvalPeer::CODCON,$this->ocregval->getCodcon());
    $a->add(OcretvalPeer::NUMVAL,$this->ocregval->getNumval());
    $a->add(OcretvalPeer::CODTIPVAL,$this->ocregval->getCodtipval());
    OcretvalPeer::doDelete($a);

    $this->deleteOcregval($this->ocregval);
    $this->Bitacora('Elimino');

    return $this->redirect('oycval/list');
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
    {
      $this->tags=Herramientas::autocompleteAjax('CODCON','Ocregcon','codcon',$this->getRequestParameter('ocregval[codcon]'));
    }
  }

}
