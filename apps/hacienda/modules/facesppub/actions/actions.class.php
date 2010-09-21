<?php

/**
 * facesppub actions.
 *
 * @package    siga
 * @subpackage facesppub
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facesppubActions extends autofacesppubActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  		$this->setVars();
		$this->configGrid($this->fcesplic->getTipesp());
  }

  public function setVars()
  {
    $this->params[0] = Herramientas::getX('codemp','fcdefins','forveh','001');
    $this->fcesplic->setFunrec($this->fcesplic->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcesplic->getFunrec());
  }

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='') {

  	if ($this->fcesplic->getId()){
		$c = new Criteria();
		$c->add(FcesplicdetPeer :: NROCON, $this->fcesplic->getNrocon());
		$c->add(FcesplicdetPeer :: RIFCON, $this->fcesplic->getRifcon());
		$c->add(FcesplicdetPeer :: TIPESP, $this->fcesplic->getTipesp());
		$per = FcesplicdetPeer :: doSelect($c);
  	}else{
		$c = new Criteria();
		$c->add(FctipespdetPeer :: TIPESP, $codigo);
		$c->add(FctipespdetPeer :: TIPO, 'V');
		$per = FctipespdetPeer :: doSelect($c);
  	}

	    $this->grid = H::getConfigGrid($this->fcesplic->getId()=='' ? 'grid' : 'grid_consulta',$per);
		$this->fcesplic->setGrid($this->grid);

	}


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
	          	$javascript = $javascript . "$('fcesplic_nacconcon_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcesplic_nacconcon_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
	          	$javascript = $javascript . "$('fcesplic_tipconcon_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcesplic_tipconcon_J').checked=true; ";
	          }
	      }
	      else
	      {
   	      	$javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
	      	$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      	///$javascript = $javascript . "document.getElementById('fcesplic_nomcon').removeAttribute('readonly',1);";
	      }

          $output = '[["fcesplic_nomcon","'.$nomcon.'",""],["fcesplic_dircon","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';

		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;

        break;
      case '2':
	    $nomcon="";
	    $dircon="";
	    $correlativo="";

          $fecha = date("d/m/Y");
	      $c= new Criteria();
	      $c->add(FcconrepPeer::RIFCON,trim($codigo));
	      $fcconrep2 = FcconrepPeer::doSelectOne($c);
	      if (count($fcconrep2)>0)
	      {
  	      	  ///$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	          $nomcon=$fcconrep2->getNomcon();
	          $dircon=$fcconrep2->getDircon();
	          if ($fcconrep2->getNaccon()=='V')
	          {
	          	$javascript = $javascript . "$('fcesplic_nacconrep_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcesplic_nacconrep_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
				$javascript = $javascript . "$('fcesplic_tipconrep_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcesplic_tipconrep_J').checked=true; ";
	          }
	      }
	      else
	      {
  	      	$javascript = $javascript . "alert('El representante no Existe, incluya todos sus Datos Basicos');";
      	    //$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      ///	$javascript = $javascript . "document.getElementById('fcesplic_nomconrep').removeAttribute('readonly',1);";
	      }
          $output = '[["fcesplic_nomconrep","'.$nomcon.'",""],["fcesplic_dirconrep","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';


		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;
        break;

	case '3';
			$desuso = Herramientas :: getX_vacio('tipesp', 'fctipesp', 'destip', $codigo);
			$exoesp = Herramientas :: getX_vacio('tipesp', 'fctipesp', 'exoesp', $codigo);

	          if ($exoesp=='S')
	          {
	          	$javascript = "$('fcesplic_exoesp').checked=true; ";
	          }
	          else
	          {
	          	$javascript = "$('fcesplic_exoesp').checked=true; ";
	          }

			$this->fcesplic = $this->getFcesplicOrCreate();
			$this->fcesplic->setTipesp($codigo);
			$this->configGrid($codigo);


			$output = '[["'.$cajtexmos.'","'.$desuso.'",""],["javascript","'.$javascript.'",""],["","",""]]';

    		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    	break;


      default:
        $output = '[["","",""],["","",""],["","",""]]';
	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;

    }

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
    //$this->configGrid();
    Herramientas::CargarDatosGridv2($this,$this->grid);
  }

  public function saving($clasemodelo)
  {
 	///H::printR($clasemodelo->getGrid());exit();
  	//H::printR($clasemodelo);
  //  $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
   $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
   //H::printR($grid);exit();
	return Hacienda::salvarFacesppub($clasemodelo, $grid ,$this->getUser()->getAttribute('loguse'));
  }

  public function deleting($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	return Hacienda::EliminarFacesppub($clasemodelo, $grid);
  }


}