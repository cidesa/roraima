<?php

/**
 * faactpre actions.
 *
 * @package    Roraima
 * @subpackage faactpre
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class faactpreActions extends autofaactpreActions
{
  public function executeIndex()
  {
  	$this->setVars();
    return $this->forward('faactpre', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
	/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
	{
	    $this->faartpvp = $this->getFaartpvpOrCreate();
	    $this->setVars();
	    $this->configGrid($this->getRequestParameter('id'),$this->getRequestParameter('faartpvp[artdesde]'),$this->getRequestParameter('faartpvp[arthasta]'));

	    if ($this->getRequest()->getMethod() == sfRequest::POST)
	    {
	      $this->updateFaartpvpFromRequest();
	      if ($this->saveFaartpvp($this->faartpvp)==-1)
		  {
		      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

              $this->faartpvp->setId(Herramientas::getX_vacio('codart','faartpvp','id',$this->faartpvp->getCodart()));

		      if ($this->getRequestParameter('save_and_add'))
		      {
		        return $this->redirect('faactpre/create');
		      }
		      else if ($this->getRequestParameter('save_and_list'))
		      {
		        return $this->redirect('faactpre/list');
		      }
		      else
		      {
				return $this->redirect('faactpre/edit?id='.$this->faartpvp->getId());
		      }
		    }
		   else
		    {
	          $this->labels = $this->getLabels();
	          return sfView::SUCCESS;
	        }
	    }
	    else
	    {
	      $this->labels = $this->getLabels();
	    }

	}
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
		//$this->configGrid();

  }

  public function setVars(){
	    $this->mascaraarticulo = Herramientas::getMascaraArticulo();
	    $this->longitud = strlen($this->mascaraarticulo);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($id=' ',$artdesde=' ',$arthasta=' ')
  {
		$this->setVars();

		$c = new Criteria();
		$c->add(CaregartPeer::TIPO,'A');
	    $c->add(CaregartPeer::CODART, CaregartPeer::CODART." between '{$artdesde}' AND '{$arthasta}' AND length(codart) >= '".$this->longitud."'", Criteria::CUSTOM);
		$c->addAscendingOrderByColumn(CaregartPeer::CODART);
		$per = CaregartPeer::doSelect($c);

	    $filas_arreglo=0;

	    $opciones = new OpcionesGrid();
        $opciones->setTabla('Caregart');
        $opciones->setAnchoGrid(860);
        $opciones->setTitulo(' ');
        $opciones->setName('a');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas($filas_arreglo);
        $opciones->setEliminar(false);

        // Se generan las columnas
        $col1 = new Columna('Codigo Artículo');
        $col1->setTipo(Columna::TEXTO);
        $col1->setEsGrabable(true);
        $col1->setAlineacionObjeto(Columna::CENTRO);
        $col1->setAlineacionContenido(Columna::CENTRO);
        $col1->setNombreCampo('Codart');
        $col1->setHTML('type="text" size="20" readonly=true');

        $col2 = new Columna('Descripción');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('Desart');
        $col2->setHTML('type="text" size="100" readonly=true');

		$opciones->addColumna($col1);
		$opciones->addColumna($col2);

		$this->obj = $opciones->getConfig($per);

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
     $codigo=$this->getRequestParameter('codigo');
	 if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$dato=Herramientas::getX('codart','Caregart','desart',trim($codigo));
		 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
		 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		 	$this->configGrid($this->getRequestParameter('id'),$this->getRequestParameter('artdesde'),$this->getRequestParameter('arthasta'));
		 	//$this->configGrid($this->getRequestParameter('id'),'01-0003-003','01-0003-007');
	    }

	    //return sfView::HEADER_ONLY;

  }

  public function executeGrid()
  {
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
 		$dato='';
 		$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
 		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		$this->configGrid($this->getRequestParameter('id'),$this->getRequestParameter('artdesde'),$this->getRequestParameter('arthasta'));
		//$this->configGrid($this->getRequestParameter('id'),'01-0003-003','01-0003-007');
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

      $this->configGrid();
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
  protected function saveFaartpvp($faartpvp)
	{
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
		Facturacion::salvarFaactpre($faartpvp,$grid,$this->getRequestParameter('faartpvp[tipo]'),$this->getRequestParameter('faartpvp[precio]'),$this->getRequestParameter('faartpvp[monaum]'));
		return -1;
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


}
