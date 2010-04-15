<?php

/**
 * vacdefgen actions.
 *
 * @package    Roraima
 * @subpackage vacdefgen
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class vacdefgenActions extends autovacdefgenActions
{
 // variable donde se debe colocar el código de error generado en el validateEdit 
  // para que sea procesado por el handleErrorEdit.
private static $coderror=-1;


  
  
  
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
        $this->npvacdefgen = $this->getNpvacdefgenOrCreate();
        $this->updateNpvacdefgenFromRequest();
        $grid=Herramientas::CargarDatosGrid($this,$this->obj);
        self::$coderror=EmpleadosBanco::Validar_Datos_Vacdefgen($grid);

       if ((self::$coderror==-1))
        {
        self::$coderror=EmpleadosBanco::Validar_Vacdefgen($grid);
        if (self::$coderror<>-1)
	     {
                return false;
             }else return true;

        }else return false;

      }else return true;
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
    $this->npvacdefgen = $this->getNpvacdefgenOrCreate();


   try{
     $this->updateNpvacdefgenFromRequest();
      }
      catch(Exception $ex){}
      $this->labels = $this->getLabels();

      if($this->getRequest()->getMethod() == sfRequest::POST)
      {

       if (self::$coderror!=-1)
        {
        	$err = Herramientas::obtenerMensajeError(self::$coderror);
        	$this->getRequest()->setError('',$err);
        }
       }
      return sfView::SUCCESS;
  }

 public function executeIndex()
  {
      return $this->redirect('vacdefgen/edit');
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
    $params = array("'+$(this.id).up().previous(1).descendants()[0].value+'",'val2');
    $params1 = array("'+$(this.id).up().previous(3).descendants()[0].value+'",'val3');

    $c = new Criteria();
    $per = NpvacdefgenPeer::doSelect($c);

    $filas_arreglo=20;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npvacdefgen');
    $opciones->setName('a');
    $opciones->setAnchoGrid(1000);
    $opciones->setTitulo('Datos Para El Cálculo y Pago De Vacaciones');
    $opciones->setHTMLTotalFilas(' ');


    $obj1=array('codnom'=> 1, 'nomnom' => 2);
    $col1 = new Columna('Tipo De nomina');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codnomvac');
    $col1->setCatalogo('Npnomina','sf_admin_edit_form',$obj1,'Npnomina_Vacdefgen');
    $col1->setHTML('type="text" size="5"');
  	$col1->setAjax('vacdefgen',1,2);

    $col2 = new Columna('Descripcíon Del Tipo De Nomina');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setNombreCampo('nomnom');
    $col2->setHTML('type="text" size="20"');

    $obj2=array('codcon'=> 3, 'nomcon' => 4);
    $col3 = new Columna('Codigo Del Concepto Vacaciones');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('codconvac');
    $col3->setEsGrabable(true);
   // $col3->setJScript('onKeyPress="verificar_codconc(event,this.id);"');
    $col3->setCatalogo('Npdefcpt','sf_admin_edit_form',$obj2,'Npdefcpt_Vacdefgen', $params);
    $col3->setHTML('type="text" size="5"');
    $col3->setAjax('vacdefgen',2,4);

    $col4 = new Columna('Descripción');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setEsGrabable(true);
    $col4->setNombreCampo('nomcon1');
    $col4->setHTML('type="text" size="20" readonly=true');

    $obj3=array('codcon'=> 5, 'nomcon' => 6);
    $col5 = new Columna('Concepto De Utilidades');
    $col5->setTipo(Columna::TEXTO);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('codconuti');
    $col5->setEsGrabable(true);
    $col5->setCatalogo('Npdefcpt','sf_admin_edit_form',$obj3,'Npdefcpt_Vacdefgen',$params1);
    $col5->setHTML('type="text" size="5"');
    $col5->setAjax('vacdefgen',2,6);

    $col6 = new Columna('Descripción');
    $col6->setTipo(Columna::TEXTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('nomcon2');
    $col6->setEsGrabable(true);
    $col6->setHTML('type="text" size="20" readonly=true');


    $col7 = new Columna('Pago Anticipado');
    $col7->setTipo(Columna::COMBO);
    $col7->setEsGrabable(true);
    $col7->setNombreCampo('pagoad');
    $col7->setCombo(Constantes::PagoDoble());
    $col7->setHTML('');


    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
    $opciones->addColumna($col5);
    $opciones->addColumna($col6);
    $opciones->addColumna($col7);

    $this->obj = $opciones->getConfig($per);



  }

protected function getNpvacdefgenOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $this->configGrid();
      $npvacdefgen = new Npvacdefgen();
    }
    else
    {
      $npvacdefgen = NpvacdefgenPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid();
      $this->forward404Unless($npvacdefgen);
    }

    return $npvacdefgen;

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
	   if ($this->getRequestParameter('ajax')=='1')
	    {//print $this->getRequestParameter('codigo');exit;

			$dato=Herramientas::getX('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
			//NpdefcptPeer::getNomcon($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	    }
	    else
	       {

	       	  $dato=Herramientas::getX('codcon','npdefcpt','nomcon',$this->getRequestParameter('codigo'));
			//NpdefcptPeer::getNomcon($this->getRequestParameter('codigo'));
            $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

	       }


  	    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	    return sfView::HEADER_ONLY;
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
  public function saveNpvacdefgen($npvacdefgen)
   {
    $coderr = -1;

    $grid=Herramientas::CargarDatosGrid($this,$this->obj);

	     $coderr = EmpleadosBanco::Grabar_grid_Vacdefgen($npvacdefgen,$grid);
         $this->coderror=$coderr;
         return $this->coderror;
  }



 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npvacdefgen = $this->getNpvacdefgenOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpvacdefgenFromRequest();

   //   $this->saveNpvacdefgen($this->npvacdefgen);

      if ($this->saveNpvacdefgen($this->npvacdefgen)==-1)
      {
	      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

	      if ($this->getRequestParameter('save_and_add'))
	      {
	        return $this->redirect('vacdefgen/create');
	      }
	      else if ($this->getRequestParameter('save_and_list'))
	      {
	        return $this->redirect('vacdefgen/list');
	      }
	      else
	      {
	        return $this->redirect('vacdefgen/edit');
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

}