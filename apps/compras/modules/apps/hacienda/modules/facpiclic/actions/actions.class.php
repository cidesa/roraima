<?php

/**
 * Facpiclic actions.
 *
 * @package    Roraima
 * @subpackage Facpiclic
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FacpiclicActions extends autoFacpiclicActions
{
  /**
   * Función para colocar el codigo necesario en
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
        $this->setVars();
		$this->fcsollic->setMascara($this->mascara);
		$this->configGrid();
  }

  public function setVars()
  {
    $this->mascara = Hacienda::Cargar_mascara();
  }


  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcactpicPeer::NUMDOC,$this->fcsollic->getNumsol());
    $per = FcactpicPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facpiclic/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    //$this->columnas[1][0]->setCatalogo('Fcactcom','sf_admin_edit_form', array('codact'=>'1','desact'=>'2'), 'Facpicsollic_Fcactcom');
	//$this->columnas[1][2]->setCombo(Constantes::ListaFcsollic());
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcsollic->setGrid($this->grid);
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
	$javascript = "";
    $ajax   = $this->getRequestParameter('ajax','');
    switch ($ajax){
      case '1':
	    $nomcon="";
	    $dircon="";
	    $correlativo="";
          $numero = $this->getRequestParameter('numero','');

	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcmodlicPeer::REFMOD);
	      //$c->add(FcmodlicPeer::NUMSOL,trim($numero));
	      $countreg = FcmodlicPeer::doSelectOne($c);

	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getRefmod()+1),12,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,12,'0',STR_PAD_LEFT);
            $fecha = date("d/m/Y");
 	        $c= new Criteria();
 	        $c->add(FcconrepPeer::RIFCON,trim($codigo));
 	        $fcconrep2 = FcconrepPeer::doSelectOne($c);

		      if (count($fcconrep2)>0)
		      {
	  	      	  $javascript = $javascript . "$('autorizacion').show();";
		          $nomcon=$fcconrep2->getNomcon();
		          $dircon=$fcconrep2->getDircon();
		          if ($fcconrep2->getNaccon()=='V')
		          {
		          	$javascript = $javascript . "$('fcsollic_nacconcon_V').checked=true; ";
		          }
		          else
		          {
		          	$javascript = $javascript . "$('fcsollic_nacconcon_E').checked=true; ";
		          }
		          if ($fcconrep2->getTipcon()=='N')
		          {
		          	$javascript = $javascript . "$('fcsollic_tipconcon_N').checked=true; ";
		          }
		          else
		          {
		          	$javascript = $javascript . "$('fcsollic_tipconcon_J').checked=true; ";
		          }
		      }
		      else
		      {
	   	      	$javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
		      	$javascript = $javascript . "$('autorizacion').show();";
		      	$javascript = $javascript . "document.getElementById('fcsollic_nomcon').removeAttribute('readonly',1);";
		      }

          $output = '[["fcsollic_licmodificada","I",""],["fcsollic_nomcon","'.$nomcon.'",""],["fcsollic_dircon","'.$dircon.'",""],["fcsollic_idlic","'.$correlativo.'",""],["fcsollic_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';
        break;
      case '2':
	    $nomcon="";
	    $dircon="";
	    $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcmodlicPeer::REFMOD);
	      //$c->add(FcmodlicPeer::NUMSOL,trim($numero));
	      $countreg = FcmodlicPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getRefmod()+1),12,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,12,'0',STR_PAD_LEFT);
          $fecha = date("d/m/Y");
	      $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);
	      if (count($fcconrep2)>0)
	      {
  	      	  $javascript = $javascript . "$('autorizacion').show();";
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcsollic_nacconrep_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcsollic_nacconrep_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
				$javascript = $javascript . "$('fcsollic_tipconrep_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcsollic_tipconrep_J').checked=true; ";
	          }
	      }
	      else
	      {
  	      	$javascript = $javascript . "alert('El representante no Existe, incluya todos sus Datos Basicos');";
      	    $javascript = $javascript . "$('autorizacion').show();";
	      	$javascript = $javascript . "document.getElementById('fcsollic_nomconrep').removeAttribute('readonly',1);";
	      }
          $output = '[["fcsollic_licmodificada","I",""],["fcsollic_nomconrep","'.$nomcon.'",""],["fcsollic_dirconrep","'.$dircon.'",""],["fcsollic_idlic","'.$correlativo.'",""],["fcsollic_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';
        break;

      case '3':
        $codcatinm = $this->getRequestParameter('codcatinm','');
        $catcon = "";
        $descatcon = "";
        $fecha = date("d/m/Y");
	    $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcmodlicPeer::REFMOD);
	      //$c->add(FcmodlicPeer::NUMSOL,trim($numero));
	      $countreg = FcmodlicPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getRefmod()+1),12,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,12,'0',STR_PAD_LEFT);
	      $c= new Criteria();
	      $c->add(FcreginmPeer::CODCATINM,trim($codcatinm));
	      $countreg = FcreginmPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
	      	  $catcon=$countreg->getCodcatinm();
	      	  $descatcon=$countreg->getNomcon();
	      }
	      else
	      {
               $javascript = $javascript . "alert('Categoria de Catastro no Existe.');";
	      }
      	  $javascript = $javascript . "$('autorizacion').show();";
          $output = '[["fcsollic_licmodificada","I",""],["fcsollic_catcon","'.$catcon.'",""],["fcsollic_desubicat","'.$descatcon.'",""],["fcsollic_idlic","'.$correlativo.'",""],["fcsollic_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';
      break;

      case '4':
          $fecha = date("d/m/Y");
	      $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcmodlicPeer::REFMOD);
	      //$c->add(FcmodlicPeer::NUMSOL,trim($numero));
	      $countreg = FcmodlicPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getRefmod()+1),12,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,12,'0',STR_PAD_LEFT);
      	  $javascript = $javascript . "$('autorizacion').show();";
          $output = '[["fcsollic_licmodificada","I",""],["fcsollic_idlic","'.$correlativo.'",""],["fcsollic_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';
      break;


      case '5':
	    $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcsolnegPeer::NUMNEG);
	      $countreg = FcsolnegPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getNumneg()+1),10,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,10,'0',STR_PAD_LEFT);
      	  $javascript = $javascript . "$('autorizacion').show();";
          $output = '[["fcsollic_licnegada","I",""],["fcsollic_numneg","'.$correlativo.'",""],["javascript","' . $javascript . '",""]]';
      break;

      case '6':
        $estilo='';
        $javascript = $javascript . "alert('Se Reactivara la Licencia.');";
      	$javascript = $javascript . "$('suspencion').hide();$('reactivar').show();$('renovar').hide();$('suspender').hide();$('cancelar').hide();";
        $output = '[["fcsollic_operacion","A",""],["javascript","' . $javascript . '",""]]';
      break;

      case '7':
        $estilo='';
        $javascript = $javascript . "alert('Se Renovara la Licencia.');";
      	$javascript = $javascript . "$('suspencion').hide();$('reactivar').hide();$('renovar').show();$('suspender').hide();$('cancelar').hide();";
        $output = '[["fcsollic_operacion","R",""],["javascript","' . $javascript . '",""]]';
      break;

      case '8':
	    $correlativo="";
        $fecha = date("d/m/Y");
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcsuscanPeer::NUMSUS);
	      $countreg = FcsuscanPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getNumsus()+1),10,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,10,'0',STR_PAD_LEFT);
        $javascript = $javascript . "alert('Se Suspendera la Licencia.');";
      	$javascript = $javascript . "$('suspencion').show();$('reactivar').hide();$('renovar').hide();$('suspender').show();$('cancelar').hide();";
        $output = '[["fcsollic_operacion","S",""],["fcsollic_fecsus","'.$fecha.'",""],["fcsollic_numsus","'.$correlativo.'",""],["javascript","' . $javascript . '",""]]';
      break;

      case '9':
        $fecha = date("d/m/Y");
	    $correlativo="";
          $numero = $this->getRequestParameter('numero','');
	      $c= new Criteria();
          $c->addDescendingOrderByColumn(FcsuscanPeer::NUMSUS);
	      $countreg = FcsuscanPeer::doSelectOne($c);
	      if (count($countreg)>0)
	      {
			$correlativo=str_pad(trim($countreg->getNumsus()+1),10,'0',STR_PAD_LEFT);
	      }
	      else
	      	$correlativo=str_pad(1,10,'0',STR_PAD_LEFT);
        $javascript = $javascript . "alert('Se Cancelara la Licencia.');";
      	$javascript = $javascript . "$('suspencion').show();$('reactivar').hide();$('renovar').hide();$('suspender').hide();$('cancelar').show();";
        $output = '[["fcsollic_operacion","C",""],["fcsollic_fecsus","'.$fecha.'",""],["fcsollic_numsus","'.$correlativo.'",""],["javascript","' . $javascript . '",""]]';
      break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
    }
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    return sfView::HEADER_ONLY;
  }




  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $this->coderr =-1;

    $this->fcsollic = $this->getFcsollicOrCreate();
    $this->updateFcsollicFromRequest();
    if($this->getRequest()->getMethod() == sfRequest::POST)
    {
      if ($this->getRequestParameter('fcsollic[funsus]')=="" and $this->getRequestParameter('fcsollic[operacion]')=="S")
      {
          $this->coderr=705;
          return false;
      }
      if ($this->getRequestParameter('fcsollic[funsus]')=="" and $this->getRequestParameter('fcsollic[operacion]')=="C")
      {
          $this->coderr=706;
          return false;
      }
     }
     return true;
  }


  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
   // $this->configGrid($grid[0],$grid[1]);
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($fcsollic)
  {
  	$error=-1;

	if ($fcsollic->getOperacion()!='')
	{
		if ($fcsollic->getOperacion()=='A') $error = Hacienda::Grabar_Reactivar($fcsollic);
		elseif ($fcsollic->getOperacion()=='R') $error = Hacienda::Grabar_Renovar($fcsollic);
		elseif ($fcsollic->getOperacion()=='S') $error = Hacienda::Grabar_Facpiclic_Suspencion_Cancelacion($fcsollic);
		elseif ($fcsollic->getOperacion()=='C') $error = Hacienda::Grabar_Facpiclic_Suspencion_Cancelacion($fcsollic);
	}

	if ($error==-1)
	{
	    $fcsollic->save();
	    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	    $error = Hacienda::salvar_grid_Fcsollic($fcsollic, $grid);
	    $error = Hacienda::Grabar_Facpiclic($fcsollic);
	}
    return $error;
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }



  /**
   * Actualiza la informacion que viene de la vista
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFcsollicFromRequest()
  {
    $fcsollic = $this->getRequestParameter('fcsollic');

    if (isset($fcsollic['numsol']))
    {
      $this->fcsollic->setNumsol($fcsollic['numsol']);
    }
    if (isset($fcsollic['numlic']))
    {
      $this->fcsollic->setNumlic($fcsollic['numlic']);
    }
    if (isset($fcsollic['fecsol']))
    {
      if ($fcsollic['fecsol'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecsol']))
          {
            $value = $dateFormat->format($fcsollic['fecsol'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecsol'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecsol($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecsol(null);
      }
    }
    if (isset($fcsollic['estado']))
    {
      $this->fcsollic->setEstado($fcsollic['estado']);
    }
    if (isset($fcsollic['operaciones']))
    {
      $this->fcsollic->setOperaciones($fcsollic['operaciones']);
    }
    if (isset($fcsollic['rifcon']))
    {
      $this->fcsollic->setRifcon($fcsollic['rifcon']);
    }
    if (isset($fcsollic['dircon']))
    {
      $this->fcsollic->setDircon($fcsollic['dircon']);
    }
    if (isset($fcsollic['nacconcon']))
    {
      $this->fcsollic->setNacconcon($fcsollic['nacconcon']);
    }
    if (isset($fcsollic['tipconcon']))
    {
      $this->fcsollic->setTipconcon($fcsollic['tipconcon']);
    }
    if (isset($fcsollic['rifrep']))
    {
      $this->fcsollic->setRifrep($fcsollic['rifrep']);
    }
    if (isset($fcsollic['dirconrep']))
    {
      $this->fcsollic->setDirconrep($fcsollic['dirconrep']);
    }
    if (isset($fcsollic['nacconrep']))
    {
      $this->fcsollic->setNacconrep($fcsollic['nacconrep']);
    }
    if (isset($fcsollic['tipconrep']))
    {
      $this->fcsollic->setTipconrep($fcsollic['tipconrep']);
    }
    if (isset($fcsollic['codtiplic']))
    {
      $this->fcsollic->setCodtiplic($fcsollic['codtiplic']);
    }

    if (isset($fcsollic['tomo']))
    {
      $this->fcsollic->setTomo($fcsollic['tomo']);
    }
    if (isset($fcsollic['numero']))
    {
      $this->fcsollic->setNumero($fcsollic['numero']);
    }
    if (isset($fcsollic['folio']))
    {
      $this->fcsollic->setFolio($fcsollic['folio']);
    }
    if (isset($fcsollic['implic']))
    {
      $this->fcsollic->setImplic($fcsollic['implic']);
    }
    if (isset($fcsollic['fecapr']))
    {
      if ($fcsollic['fecapr'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecapr']))
          {
            $value = $dateFormat->format($fcsollic['fecapr'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecapr'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecapr($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecapr(null);
      }
    }
    if (isset($fcsollic['fecven']))
    {
      if ($fcsollic['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecven']))
          {
            $value = $dateFormat->format($fcsollic['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecven(null);
      }
    }
    if (isset($fcsollic['fecinilic']))
    {
      if ($fcsollic['fecinilic'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecinilic']))
          {
            $value = $dateFormat->format($fcsollic['fecinilic'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecinilic'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecinilic($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecinilic(null);
      }
    }
    if (isset($fcsollic['grid']))
    {
      $this->fcsollic->setGrid($fcsollic['grid']);
    }

    if (isset($fcsollic['numsol']))
    {
      $this->fcsollic->setNumsol($fcsollic['numsol']);
    }
    if (isset($fcsollic['numlic']))
    {
      $this->fcsollic->setNumlic($fcsollic['numlic']);
    }
    if (isset($fcsollic['fecsol']))
    {
      if ($fcsollic['fecsol'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecsol']))
          {
            $value = $dateFormat->format($fcsollic['fecsol'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecsol'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecsol($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecsol(null);
      }
    }
    if (isset($fcsollic['feclic']))
    {
      if ($fcsollic['feclic'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['feclic']))
          {
            $value = $dateFormat->format($fcsollic['feclic'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['feclic'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFeclic($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFeclic(null);
      }
    }
    if (isset($fcsollic['rifcon']))
    {
      $this->fcsollic->setRifcon($fcsollic['rifcon']);
    }
    if (isset($fcsollic['catcon']))
    {
      $this->fcsollic->setCatcon($fcsollic['catcon']);
    }
    if (isset($fcsollic['rifrep']))
    {
      $this->fcsollic->setRifrep($fcsollic['rifrep']);
    }
    if (isset($fcsollic['nomneg']))
    {
      $this->fcsollic->setNomneg($fcsollic['nomneg']);
    }
    if (isset($fcsollic['tipinm']))
    {
      $this->fcsollic->setTipinm($fcsollic['tipinm']);
    }
    if (isset($fcsollic['tipest']))
    {
      $this->fcsollic->setTipest($fcsollic['tipest']);
    }
    if (isset($fcsollic['dirpri']))
    {
      $this->fcsollic->setDirpri($fcsollic['dirpri']);
    }
    if (isset($fcsollic['codrut']))
    {
      $this->fcsollic->setCodrut($fcsollic['codrut']);
    }
    if (isset($fcsollic['capsoc']))
    {
      $this->fcsollic->setCapsoc($fcsollic['capsoc']);
    }
    if (isset($fcsollic['horini']))
    {
      if ($fcsollic['horini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horini']))
          {
            $value = $dateFormat->format($fcsollic['horini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHorini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHorini(null);
      }
    }
    if (isset($fcsollic['horcie']))
    {
      if ($fcsollic['horcie'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horcie']))
          {
            $value = $dateFormat->format($fcsollic['horcie'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horcie'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHorcie($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHorcie(null);
      }
    }
    if (isset($fcsollic['fecini']))
    {
      if ($fcsollic['fecini'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecini']))
          {
            $value = $dateFormat->format($fcsollic['fecini'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecini'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecini($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecini(null);
      }
    }
    if (isset($fcsollic['fecfin']))
    {
      if ($fcsollic['fecfin'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecfin']))
          {
            $value = $dateFormat->format($fcsollic['fecfin'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecfin'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecfin($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecfin(null);
      }
    }
    if (isset($fcsollic['discli']))
    {
      $this->fcsollic->setDiscli($fcsollic['discli']);
    }
    if (isset($fcsollic['disbar']))
    {
      $this->fcsollic->setDisbar($fcsollic['disbar']);
    }
    if (isset($fcsollic['disdis']))
    {
      $this->fcsollic->setDisdis($fcsollic['disdis']);
    }
    if (isset($fcsollic['disins']))
    {
      $this->fcsollic->setDisins($fcsollic['disins']);
    }
    if (isset($fcsollic['disfun']))
    {
      $this->fcsollic->setDisfun($fcsollic['disfun']);
    }
    if (isset($fcsollic['disest']))
    {
      $this->fcsollic->setDisest($fcsollic['disest']);
    }
    if (isset($fcsollic['funres']))
    {
      $this->fcsollic->setFunres($fcsollic['funres']);
    }
    if (isset($fcsollic['funrel']))
    {
      $this->fcsollic->setFunrel($fcsollic['funrel']);
    }
    if (isset($fcsollic['fecres']))
    {
      if ($fcsollic['fecres'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecres']))
          {
            $value = $dateFormat->format($fcsollic['fecres'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecres'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecres($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecres(null);
      }
    }
    if (isset($fcsollic['fecapr']))
    {
      if ($fcsollic['fecapr'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecapr']))
          {
            $value = $dateFormat->format($fcsollic['fecapr'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecapr'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecapr($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecapr(null);
      }
    }
    if (isset($fcsollic['fecven']))
    {
      if ($fcsollic['fecven'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecven']))
          {
            $value = $dateFormat->format($fcsollic['fecven'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecven'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecven($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecven(null);
      }
    }
    if (isset($fcsollic['tomo']))
    {
      $this->fcsollic->setTomo($fcsollic['tomo']);
    }
    if (isset($fcsollic['folio']))
    {
      $this->fcsollic->setFolio($fcsollic['folio']);
    }
    if (isset($fcsollic['numero']))
    {
      $this->fcsollic->setNumero($fcsollic['numero']);
    }
    if (isset($fcsollic['taslic']))
    {
      $this->fcsollic->setTaslic($fcsollic['taslic']);
    }
    if (isset($fcsollic['deuanl']))
    {
      $this->fcsollic->setDeuanl($fcsollic['deuanl']);
    }
    if (isset($fcsollic['deuacl']))
    {
      $this->fcsollic->setDeuacl($fcsollic['deuacl']);
    }
    if (isset($fcsollic['implic']))
    {
      $this->fcsollic->setImplic($fcsollic['implic']);
    }
    if (isset($fcsollic['deuanp']))
    {
      $this->fcsollic->setDeuanp($fcsollic['deuanp']);
    }
    if (isset($fcsollic['deuacp']))
    {
      $this->fcsollic->setDeuacp($fcsollic['deuacp']);
    }
    if (isset($fcsollic['stasol']))
    {
      $this->fcsollic->setStasol($fcsollic['stasol']);
    }
    if (isset($fcsollic['stalic']))
    {
      $this->fcsollic->setStalic($fcsollic['stalic']);
    }
    if (isset($fcsollic['stadec']))
    {
      $this->fcsollic->setStadec($fcsollic['stadec']);
    }
    if (isset($fcsollic['staliq']))
    {
      $this->fcsollic->setStaliq($fcsollic['staliq']);
    }
    if (isset($fcsollic['nomcon']))
    {
      $this->fcsollic->setNomcon($fcsollic['nomcon']);
    }
    if (isset($fcsollic['dircon']))
    {
      $this->fcsollic->setDircon($fcsollic['dircon']);
    }
    if (isset($fcsollic['tipo']))
    {
      $this->fcsollic->setTipo($fcsollic['tipo']);
    }
    if (isset($fcsollic['estser']))
    {
      $this->fcsollic->setEstser($fcsollic['estser']);
    }
    if (isset($fcsollic['telneg']))
    {
      $this->fcsollic->setTelneg($fcsollic['telneg']);
    }
    if (isset($fcsollic['clacon']))
    {
      $this->fcsollic->setClacon($fcsollic['clacon']);
    }
    if (isset($fcsollic['capact']))
    {
      $this->fcsollic->setCapact($fcsollic['capact']);
    }
    if (isset($fcsollic['numsol1']))
    {
      $this->fcsollic->setNumsol1($fcsollic['numsol1']);
    }
    if (isset($fcsollic['numlic1']))
    {
      $this->fcsollic->setNumlic1($fcsollic['numlic1']);
    }
    if (isset($fcsollic['horainie']))
    {
      if ($fcsollic['horainie'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horainie']))
          {
            $value = $dateFormat->format($fcsollic['horainie'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horainie'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHorainie($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHorainie(null);
      }
    }
    if (isset($fcsollic['horaciee']))
    {
      if ($fcsollic['horaciee'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['horaciee']))
          {
            $value = $dateFormat->format($fcsollic['horaciee'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['horaciee'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setHoraciee($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setHoraciee(null);
      }
    }
    if (isset($fcsollic['unitri']))
    {
      $this->fcsollic->setUnitri($fcsollic['unitri']);
    }
    if (isset($fcsollic['tipsol']))
    {
      $this->fcsollic->setTipsol($fcsollic['tipsol']);
    }
    if (isset($fcsollic['unitrialc']))
    {
      $this->fcsollic->setUnitrialc($fcsollic['unitrialc']);
    }
    if (isset($fcsollic['unitriotr']))
    {
      $this->fcsollic->setUnitriotr($fcsollic['unitriotr']);
    }
    if (isset($fcsollic['licant']))
    {
      $this->fcsollic->setLicant($fcsollic['licant']);
    }
    if (isset($fcsollic['dueant']))
    {
      $this->fcsollic->setDueant($fcsollic['dueant']);
    }
    if (isset($fcsollic['dirant']))
    {
      $this->fcsollic->setDirant($fcsollic['dirant']);
    }
    if (isset($fcsollic['impext']))
    {
      $this->fcsollic->setImpext($fcsollic['impext']);
    }
    if (isset($fcsollic['imptotal']))
    {
      $this->fcsollic->setImptotal($fcsollic['imptotal']);
    }
    if (isset($fcsollic['codact']))
    {
      $this->fcsollic->setCodact($fcsollic['codact']);
    }
    if (isset($fcsollic['codtiplic']))
    {
      $this->fcsollic->setCodtiplic($fcsollic['codtiplic']);
    }
    if (isset($fcsollic['fecinilic']))
    {
      if ($fcsollic['fecinilic'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecinilic']))
          {
            $value = $dateFormat->format($fcsollic['fecinilic'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecinilic'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecinilic($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecinilic(null);
      }
    }

    if (isset($fcsollic['operacion']))
    {
      $this->fcsollic->setOperacion($fcsollic['operacion']);
    }

    if (isset($fcsollic['numsus']))
    {
      $this->fcsollic->setNumsus($fcsollic['numsus']);
    }

    if (isset($fcsollic['fecsus']))
    {
      if ($fcsollic['fecsus'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($fcsollic['fecsus']))
          {
            $value = $dateFormat->format($fcsollic['fecsus'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $fcsollic['fecsus'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->fcsollic->setFecsus($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->fcsollic->setFecsus(null);
      }
    }

    if (isset($fcsollic['motsus']))
    {
      $this->fcsollic->setMotsus($fcsollic['motsus']);
    }

    if (isset($fcsollic['solsus']))
    {
      $this->fcsollic->setSolsus($fcsollic['solsus']);
    }

    if (isset($fcsollic['folsus']))
    {
      $this->fcsollic->setFolsus($fcsollic['folsus']);
    }

    if (isset($fcsollic['actsus']))
    {
      $this->fcsollic->setActsus($fcsollic['actsus']);
    }

    if (isset($fcsollic['resolsus']))
    {
      $this->fcsollic->setResolsus($fcsollic['resolsus']);
    }

    if (isset($fcsollic['funsus']))
    {
      $this->fcsollic->setFunsus($fcsollic['funsus']);
    }
  }

}
