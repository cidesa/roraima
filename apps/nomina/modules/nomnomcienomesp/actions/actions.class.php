<?php

/**
 * nomnomcienomesp actions.
 *
 * @package    Roraima
 * @subpackage nomnomcienomesp
 * @author     $Author:jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 34727 2009-11-13 13:25:56Z jlobaton $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomnomcienomespActions extends autonomnomcienomespActions
{
  //public $visible="";

  public function executeIndex()
  {
    return $this->redirect('nomnomcienomesp/edit');
  }

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
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

    // Insertar el criterio de la busqueda de registros del Grid
    // Por ejemplo:

    // $c = new Criteria();
    // $c->add(CaartaocPeer::AJUOC ,$this->caajuoc->getAjuoc());
    // $reg = CaartaocPeer::doSelect($c);

    // De esta forma se carga la configuración del grid de un archivo yml
    // y se le pasa el parámetro de los registros encontrados ($reg)
    //                                                                            /nombreformulario/
    // $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/formulario/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartaoc',$reg);

    // Si no se quiere cargar la configuración del grid de un .yml, sedebe hacer a pie.
    // Por ejemplo:

    /*
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Caartalm');
    $opciones->setAnchoGrid(1150);
    $opciones->setTitulo('Existencia por Almacenes');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Cod. Almacen');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codalm');
    $col1->setCatalogo('cadefalm','sf_admin_edit_form','2');
    $col1->setAjax(2,2);

    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('codalm');
    $col2->setHTML('type="text" size="25" disabled=true');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
     */


  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
     $codnomesp = $this->getRequestParameter('codnomesp');
     $cajtexmos = $this->getRequestParameter('cajtexmos');
     $cajtexcom = $this->getRequestParameter('cajtexcom');
     $codigo    = $this->getRequestParameter('codigo');

	if ($this->getRequestParameter('ajax')=='1')
      {
		$dato      = Herramientas::getX('codnomesp','npnomesptipos','desnomesp',$codigo);
		$fecnomdes = Herramientas::getX('codnomesp','npnomesptipos','fecnomdes',$codigo);
		$fecnomhas = Herramientas::getX('codnomesp','npnomesptipos','fecnomhas',$codigo);

//		date('d/m/Y',strtotime($dato2));
        //$dato=CaproveePeer::getNompro($this->getRequestParameter('codigo'));
        $output = '[["'.$cajtexmos.'","'.$dato.'",""],["npnomesptipos_ultfec","'.date('d/m/Y',strtotime($fecnomdes)).'",""],["npnomesptipos_profec","'.date('d/m/Y',strtotime($fecnomhas)).'",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		return sfView::HEADER_ONLY;
      }
	elseif ($this->getRequestParameter('ajax')=='2')
	{ $dato="";
	  $dato2="";
	  $dato3="";
	  $dato4="";
	  $datos="";
	  $fre="";
	  $validafechacierre="";
	  $this->visible="";

	  $fecnomhas = Herramientas::getX('codnomesp','npnomesptipos','fecnomhas',$codnomesp);
	  $dato2=Herramientas::getX('codnomesp','npnomesptipos','fecnomdes',$codnomesp);
	  $dato3=Herramientas::getX('codnomesp','npnomesptipos','fecnomhas',$codnomesp);

	  $dato=Herramientas::getX('CODNOM','Npnomina','nomnom',$codigo);

	  if ($dato!='<!Registro no Encontrado o Vacio!>')
	  {
	  	//$dato2=Herramientas::getX('CODNOM','Npnomina','Ultfec',$codigo);
	  	$datos=date('d/m/Y',strtotime($dato2));
	  	//$dato3=Herramientas::getX('CODNOM','Npnomina','Profec',$codigo);
	  	$dato4=Herramientas::getX('CODNOM','Npnomina','Frecal',$codigo);
	  	$numsem=Herramientas::getX('CODNOM','Npnomina','numsem',$codigo);

        if ($dato4=='S')
        { $fre='Nomina Semanal';}
        else if ($dato4=='Q')
        { $fre='Nomina Quincenal';}
        else if ($dato4=='M')
        { $fre='Nomina Mensual';}

	    CierredeNominaEspecial::Consulta2($codigo,$dato2,$dato3,&$jesus,$codnomesp);
	    if (CierredeNominaEspecial::Validar_Fecha_Cierre($codigo, $codnomesp, $fecnomhas))
	    {
	      $validafechacierre='S';
	    }else {
	      $validafechacierre='N';
	    }
	      $this->visible=$jesus;
	  }

      $output = '[["'.$cajtexmos.'","'.$dato.'",""],["fecha","'.$datos.'",""],["frecuencia","'.$dato4.'",""],["npnomesptipos_pago","'.$fre.'",""],["valida","'.$validafechacierre.'",""],["npnomesptipos_numsem","'.$numsem.'",""]]';
      $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      $this->npnomesptipos = $this->getNpnomesptiposOrCreate();
     // return sfView::HEADER_ONLY;
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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

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
    return parent::saving($clasemodelo);
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

  public function executeRealizarcierre()
  {
    $codnomesp = $this->getRequestParameter('codnomesp');
    $codigo    = $this->getRequestParameter('codnom');
    $ultfec    = $this->getRequestParameter('ultfec');
    $profec    = $this->getRequestParameter('profec');
    $numsem    = $this->getRequestParameter('numsem');

   		  $intpre = 'N';     //Integracion con Presupuesto
		  $varemp = $this->getUser()->getAttribute('configemp');
		  if(is_array($varemp))
		    if(array_key_exists('aplicacion',$varemp))
		  	  if(array_key_exists('nomina',$varemp['aplicacion']))
			   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
			     if(array_key_exists('nomnomcienom',$varemp['aplicacion']['nomina']['modulos']))
			       if(array_key_exists('intpre',$varemp['aplicacion']['nomina']['modulos']['nomnomcienom']))
		  		       $intpre = $varemp['aplicacion']['nomina']['modulos']['nomnomcienom']['intpre'];


	CierredeNominaEspecial::procesoCierre($codigo,$ultfec,$profec,&$msj,$codnomesp,$numsem,$intpre);

	if ($msj=='1')
	{
		$this->setFlash('notice2', 'La Nómina Especial no puede ser cerrada');
	}elseif ($msj=='497')
	{
        $err = Herramientas::obtenerMensajeError($msj);
        $this->setFlash('error', $err);

	}else if ($msj==''){
		$this->setFlash('notice', 'La Nómina Especial fue Cerrada Satisfactoriamente');
	}
		return $this->redirect('nomnomcienomesp/index');

  }

}
