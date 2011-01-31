<?php

/**
 * vacdiafer actions.
 *
 * @package    Roraima
 * @subpackage vacdiafer
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class vacdiaferActions extends autovacdiaferActions
{
	   // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;

public function executeIndex()
    {
      return $this->redirect('vacdiafer/edit');
    }

protected function getNpvacdiaferOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $this->configGrid();
      $npvacdiafer = new Npvacdiafer();
    }
    else
    {
      $npvacdiafer = NpvacdiaferPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid();
      $this->forward404Unless($npvacdiafer);
    }

    return $npvacdiafer;
  }

	 
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->npvacdiafer = $this->getNpvacdiaferOrCreate();
      $this->updateNpvacdiaferFromRequest();
      $grid=Herramientas::CargarDatosGrid($this,$this->obj);
      self::$coderror=EmpleadosBanco::Validar_Datos_Vacdiafer($grid);

  if ((self::$coderror==-1))
        {
          self::$coderror=EmpleadosBanco::Validar_Vacdiafer($grid);($grid);
          if ((self::$coderror <> -1))
             {
                return false;
             }else return true;

        }else return false;

      }else return true;
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
  public function saveNpvacdiafer($npvacdiafer)
  {
   $coderr=-1;
   $grid=Herramientas::CargarDatosGrid($this,$this->obj);

   $coderr = EmpleadosBanco::Grabar_grid_Vacdiafer($npvacdiafer,$grid);
   $this->coderror = $coderr;
   return $this->coderror;
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
	    $this->npvacdiafer = $this->getNpvacdiaferOrCreate();


	   try{
	     $this->updateNpvacdiaferFromRequest();
	      }
      catch(Exception $ex){}

       $this->labels = $this->getLabels();
       $grid=Herramientas::CargarDatosGrid($this,$this->obj);

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror<>-1)
        {
        	$err = Herramientas::obtenerMensajeError(self::$coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }



  /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()

  {
    $this->npvacdiafer = $this->getNpvacdiaferOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
    	$this->updateNpvacdiaferFromRequest();
        // print $this->saveNpvacdiafer($this->npvacdiafer);exit;
       if ($this->saveNpvacdiafer($this->npvacdiafer)==-1)
       {
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('vacdiafer/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('vacdiafer/list');
	      }
	      else
	      {
	        return $this->redirect('vacdiafer/edit');
	      }
      }
      else
      	{
      	 $this->labels = $this->getLabels();
       	 $err = Herramientas::obtenerMensajeError($this->coderror);
         $this->getRequest()->setError('',$err);
      	  return sfView::SUCCESS;
      	}
    }
    else
    {
      $this->labels = $this->getLabels();
    }
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
    $per = NpvacdiaferPeer::doSelect($c);

    $filas_arreglo=30;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npvacdiafer');
    $opciones->setName('a');
    $opciones->setAnchoGrid(450);
    $opciones->setAncho(600);
    $opciones->setTitulo('Dias Feriados');
    $opciones->setHTMLTotalFilas(' ');

    $col1 = new Columna('Mes');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('mes');
    $col1->setJScript('onBlur=validarMes(this.id)');
    $col1->setHTML('type="text" size="2" ');

    $col2 = new Columna('Dia');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('dia');
    $col2->setJScript('onBlur=validarDiafer(this.id)');
    $col2->setHTML('type="text" size="2" ');

    $col3 = new Columna('Descripcion');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('descripcion');
    $col3->setHTML('type="text" size="30" ');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

    $this->obj = $opciones->getConfig($per);



  }
}
