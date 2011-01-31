<?php

/**
 * facprocom actions.
 *
 * @package    siga
 * @subpackage facprocom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class facprocomActions extends autofacprocomActions
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
    $this->fcprolic->setFunrec($this->fcprolic->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcprolic->getFunrec());
    ///$this->fcprolic->setFundes($this->fcprolic->getFundes()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcprolic->getFundes());
    //$this->fcprolic->setFunrectra($this->fcprolic->getFunrectra()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcprolic->getFunrectra());
  }

	/**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array (), $regelim = array ()) {

  	if ($this->fcprolic->getId()){
		$c = new Criteria();
		$c->add(FcprolicdetPeer :: NROCON, $this->fcprolic->getNrocon());
		$c->add(FcprolicdetPeer :: RIFCON, $this->fcprolic->getRifcon());
		$c->add(FcprolicdetPeer :: TIPPRO, $this->fcprolic->getTippro());
		$per = FcprolicdetPeer :: doSelect($c);
  	}else{

		$c = new Criteria();
		$c->add(FctipprodetPeer :: TIPPRO, $this->fcprolic->getTippro());
		$c->add(FctipprodetPeer :: TIPO, 'V');
		$per = FctipprodetPeer :: doSelect($c);


  	}

	//	$this->columnas = Herramientas :: getConfigGrid(sfConfig :: get('sf_app_module_dir') . '/facprocom/' . sfConfig :: get('sf_app_module_config_dir_name') . '/grid');

    $this->grid = H::getConfigGrid($this->fcprolic->getId()=='' ? 'grid' : 'grid_consulta',$per);
   // $this->params['grid'] = $this->grid;


		//$this->columnas[1][0]->setCatalogo('fcvalinm','sf_admin_edit_form', array('codtip'=>'1','destip'=>'2','Anual'=>'5','Valmtr'=>'4'), 'Facinmreg_Fcvalinm', array('param1' => "'+$('fcreginm_anoava').value+'", 'param2' => "'+$('fcreginm_codzon').value+'"));
		//$this->columnas[1][2]->setCombo(Constantes :: ListaFcsollic());

		//$this->grid = $this->columnas[0]->getConfig($per);
		$this->fcprolic->setGrid($this->grid);
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
	          	$javascript = $javascript . "$('fcprolic_nacconcon_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcprolic_nacconcon_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
	          	$javascript = $javascript . "$('fcprolic_tipconcon_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcprolic_tipconcon_J').checked=true; ";
	          }
	      }
	      else
	      {
   	      	$javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
	      	$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      	///$javascript = $javascript . "document.getElementById('fcprolic_nomcon').removeAttribute('readonly',1);";
	      }

          $output = '[["fcprolic_nomcon","'.$nomcon.'",""],["fcprolic_dircon","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';

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
	          	$javascript = $javascript . "$('fcprolic_nacconrep_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcprolic_nacconrep_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
				$javascript = $javascript . "$('fcprolic_tipconrep_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcprolic_tipconrep_J').checked=true; ";
	          }
	      }
	      else
	      {
  	      	$javascript = $javascript . "alert('El representante no Existe, incluya todos sus Datos Basicos');";
      	    $javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      ///	$javascript = $javascript . "document.getElementById('fcprolic_nomconrep').removeAttribute('readonly',1);";
	      }
          $output = '[["fcprolic_nomconrep","'.$nomcon.'",""],["fcprolic_dirconrep","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';


		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;
        break;

	case '3';
			$desuso = Herramientas :: getX_vacio('tippro', 'fctippro', 'destip', $codigo);
			$this->fcprolic = $this->getFcprolicOrCreate();
			$this->fcprolic->setTippro($codigo);
			$this->configGrid();


			$output = '[["'.$cajtexmos.'","'.$desuso.'",""],["","",""],["","",""]]';

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
	return Hacienda::salvarFacprocom($clasemodelo, $grid,$this->getUser()->getAttribute('loguse'));
  }

  public function deleting($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	return Hacienda::EliminarFacprocom($clasemodelo, $grid);
  }


}
