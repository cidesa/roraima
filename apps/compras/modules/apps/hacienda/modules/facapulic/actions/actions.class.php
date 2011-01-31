<?php

/**
 * facapulic actions.
 *
 * @package    Roraima
 * @subpackage facapulic
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class facapulicActions extends autofacapulicActions
{

  // Para incluir funcionalidades al executeEdit()
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
		$this->configGrid();
  }

  public function setVars()
  {
   // $this->params[0] = Herramientas::getX('codemp','fcdefins','forveh','001');
    $this->fcapulic->setFunrec($this->fcapulic->getFunrec()=='' ? $this->getUser()->getAttribute('loguse') : $this->fcapulic->getFunrec());
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
  	if ($this->fcapulic->getId()){
		$c = new Criteria();
		$c->add(FcapulicdetPeer :: NROCON, $this->fcapulic->getNrocon());
		$c->add(FcapulicdetPeer :: RIFCON, $this->fcapulic->getRifcon());
		$c->add(FcapulicdetPeer :: TIPAPU, $this->fcapulic->getTipapu());
		$per = FcapulicdetPeer :: doSelect($c);

  	}else{
		$c = new Criteria();
		$c->add(FctipapudetPeer :: TIPAPU, $this->fcapulic->getTipapu());
		$c->add(FctipapudetPeer :: TIPO, 'V');
		$per = FctipapudetPeer :: doSelect($c);
  	}
	    $this->grid = H::getConfigGrid($this->fcapulic->getId()=='' ? 'grid' : 'grid_consulta',$per);
		$this->fcapulic->setGrid($this->grid);
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
	          	$javascript = $javascript . "$('fcapulic_nacconcon_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcapulic_nacconcon_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
	          	$javascript = $javascript . "$('fcapulic_tipconcon_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcapulic_tipconcon_J').checked=true; ";
	          }
	      }
	      else
	      {
   	      	$javascript = $javascript . "alert('El Contribuyente no Existe, incluya todos sus Datos Basicos');";
	      	$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      	///$javascript = $javascript . "document.getElementById('fcapulic_nomcon').removeAttribute('readonly',1);";
	      }

          $output = '[["fcapulic_nomcon","'.$nomcon.'",""],["fcapulic_dircon","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';

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
	          	$javascript = $javascript . "$('fcapulic_nacconrep_V').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcapulic_nacconrep_E').checked=true; ";
	          }
	          if ($fcconrep2->getTipcon()=='N')
	          {
				$javascript = $javascript . "$('fcapulic_tipconrep_N').checked=true; ";
	          }
	          else
	          {
	          	$javascript = $javascript . "$('fcapulic_tipconrep_J').checked=true; ";
	          }
	      }
	      else
	      {
  	      	$javascript = $javascript . "alert('El representante no Existe, incluya todos sus Datos Basicos');";
      	    //$javascript = $javascript . "if ($('autorizacion'))  $('autorizacion').show();";
	      ///	$javascript = $javascript . "document.getElementById('fcapulic_nomconrep').removeAttribute('readonly',1);";
	      }
          $output = '[["fcapulic_nomconrep","'.$nomcon.'",""],["fcapulic_dirconrep","'.$dircon.'",""],["javascript","' . $javascript . '",""]]';


		    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		    return sfView::HEADER_ONLY;
        break;

	case '3';
			$desuso = Herramientas :: getX_vacio('tipapu', 'fctipapu', 'destip', $codigo);
			$exoesp = Herramientas :: getX_vacio('tipapu', 'fctipapu', 'exoesp', $codigo);

	          if ($exoesp=='S')
	          {
	          	$javascript = "$('fcapulic_exoapu').checked=true; ";
	          }
	          else
	          {
	          	$javascript = "$('fcapulic_exoapu').checked=true; ";
	          }

			$this->fcapulic = $this->getFcapulicOrCreate();
			$this->fcapulic->setTipapu($codigo);
			$this->configGrid();


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


  /**
   * Función para colocar el codigo necesario para
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	return Hacienda::salvarFacapulic($clasemodelo, $grid,$this->getUser()->getAttribute('loguse'));
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
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
	return Hacienda::EliminarFacapulic($clasemodelo, $grid);
  }


}
