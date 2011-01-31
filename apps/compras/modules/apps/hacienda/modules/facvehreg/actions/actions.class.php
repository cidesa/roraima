<?php

/**
 * facvehreg actions.
 *
 * @package    siga
 * @subpackage facvehreg
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facvehregActions extends autofacvehregActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
		$this->setVars();
		$this->configGrid();
  }

  public function setVars()
  {
    $this->params[0] = Herramientas::getX('codemp','fcdefins','forveh','001');
    $this->fcregveh->setFunrec($this->fcregveh->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFunrec());
    $this->fcregveh->setFundes($this->fcregveh->getFundes()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFundes());
    $this->fcregveh->setFunrectra($this->fcregveh->getFunrectra()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcregveh->getFunrectra());
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
    $c->add(FcusovehPeer::CODUSO,$this->fcregveh->getCoduso());
    $per = FcusovehPeer::doSelect($c);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facvehreg/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);

    $this->fcregveh->setGrid($this->grid);
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
    $cajtexmos   = $this->getRequestParameter('cajtexmos','');

    switch ($ajax){
      case '1':
	    $nomcon="";
	    $dircon="";
	    $correlativo="";

		  $nomcon='';
		  $dircon='';
          $fecha = date("d/m/Y");
	      $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);

	      if (count($fcconrep2)>0)
	      {
  	      	  $javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcregveh_nacconcon_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcregveh_nacconcon_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
	          	$javascript = $javascript . "$('fcregveh_tipconcon_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcregveh_tipconcon_J').checked=true; ";
	          }
	      }
	      else
	      {
   	      	$javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
	      	$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      }

          $output = '[["fcregveh_licmodificada","I",""],["fcregveh_nomcon","'.$nomcon.'",""],["fcregveh_dircon","'.$dircon.'",""],["fcregveh_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';

		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;

        break;
      case '2':
	    $nomcon="";
	    $dircon="";
	    $correlativo="";
        $numero = $this->getRequestParameter('numero','');

          $fecha = date("d/m/Y");
	      $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);
	      if (count($fcconrep2)>0)
	      {
  	      	  $javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcregveh_nacconrep_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcregveh_nacconrep_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
				$javascript = $javascript . "$('fcregveh_tipconrep_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcregveh_tipconrep_J').checked=true; ";
	          }
	      }
	      else
	      {
  	      	$javascript = $javascript . "alert('El representante no Existe, incluya todos sus Datos Basicos');";
      	    $javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      }
          $output = '[["fcregveh_licmodificada","I",""],["fcregveh_nomconrep","'.$nomcon.'",""],["fcregveh_dirconrep","'.$dircon.'",""],["fcregveh_fechlic","'.$fecha.'",""],["javascript","' . $javascript . '",""]]';


		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;
        break;

	case '3';

			$desuso = Herramientas :: getX_vacio('coduso', 'fcusoveh', 'desuso', $codigo);
			$this->fcregveh = $this->getFcregvehOrCreate();
			$this->fcregveh->setCoduso($codigo);
			$this->configGrid();

			$output = '[["'.$cajtexmos.'","'.$desuso.'",""],["","",""],["","",""]]';

    		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    	break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
        break;
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
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

      // $this->configGrid();
      // $grid = Herramientas::CargarDatosGrid($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

      // $resp = Compras::validarAlmajuoc($this->caajuoc,$grid);

       //$resp=Herramientas::ValidarCodigo($valor,$this->tstipmov,$campo);

      // al final $resp es analizada en base al código que retorna
      // Todas las funciones de validación y procesos del negocio
      // deben retornar códigos >= -1. Estos código serám buscados en
      // el archivo errors.yml en la función handleErrorEdit()

      if($this->coderr!=-1){
        return false;
      } else return true;

    }else return true;



  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
  	$this->setVars();
    $this->configGrid();
  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	return Hacienda::salvarFacvehreg($clasemodelo, $grid, $this->getUser()->getAttribute('loguse'));
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
