<?php

/**
 * nomespconceptos actions.
 *
 * @package    Roraima
 * @subpackage nomespconceptos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomespconceptosActions extends autonomespconceptosActions
{
 public  $coderr=-1;

 /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npnomespnomtip/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomespnomtip', 6);
    $c = new Criteria();
    $c->addJoin(NpnomespconnomtipPeer::CODNOMESP,NpnomespnomtipPeer::CODNOMESP);
    $c->addJoin(NpnomespconnomtipPeer::CODNOM,NpnomespnomtipPeer::CODNOM);
    $c->setDistinct();
    $c->addAscendingOrderByColumn(NpnomespnomtipPeer::CODNOMESP);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }



 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npnomespnomtip = $this->getNpnomespnomtipOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpnomespnomtipFromRequest();

      $this->saveNpnomespnomtip($this->npnomespnomtip);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomespconceptos/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomespconceptos/list');
      }
      else
      {
        return $this->redirect('nomespconceptos/edit?id='.$this->npnomespnomtip->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpnomespnomtipFromRequest22()
  {
    $npnomespnomtip = $this->getRequestParameter('npnomespnomtip');

    if (isset($npnomespnomtip['codnomesp']))
    {
      $this->npnomespnomtip->setCodnomesp(str_pad($npnomespnomtip['codnomesp'],3,'0',STR_PAD_LEFT));
    }
    if (isset($npnomespnomtip['codnom']))
    {
      $this->npnomespnomtip->setCodnom(str_pad($npnomespnomtip['codnom'],3,'0',STR_PAD_LEFT));
    }
  }

  protected function getNpnomespnomtipOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npnomespnomtip = new Npnomespnomtip();
      $this->configGrid($this->getRequestParameter('npnomespnomtip[codnomesp]'),$this->getRequestParameter('npnomespnomtip[codnom]'));
    }
    else
    {
      $npnomespnomtip = NpnomespnomtipPeer::retrieveByPk($this->getRequestParameter($id));

      $this->configGrid($npnomespnomtip->getCodnomesp(), $npnomespnomtip->getCodnom());

      $this->forward404Unless($npnomespnomtip);
    }

    return $npnomespnomtip;
  }


      /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigonomesp='', $codigonom = '')
	 {
		$c = new Criteria();
		$c->add(NpnomespconnomtipPeer::CODNOMESP, $codigonomesp);
		$c->add(NpnomespconnomtipPeer::CODNOM, $codigonom);
		$c->addJoin(NpnomespconnomtipPeer::CODCON, NpdefcptPeer::CODCON);

		$per = NpnomespconnomtipPeer::doSelect($c);

		$filas_arreglo=30;

		// Se crea el objeto principal de la clase OpcionesGrid
		$opciones = new OpcionesGrid();
		// Se configuran las opciones globales del Grid
		$opciones->setEliminar(true);
		$opciones->setFilas($filas_arreglo);
		$opciones->setTabla('Npnomespconnomtip');
		$opciones->setName('a');
		$opciones->setAnchoGrid(650);
		$opciones->setAncho(650);
		$opciones->setTitulo('Conceptos Asociados');
		$opciones->setHTMLTotalFilas(' ');

		// Se generan las columnas
		$col1 = new Columna('Código/Concepto');
		$col1->setTipo(Columna::TEXTO);
		$col1->setEsGrabable(true);
		$col1->setAlineacionObjeto(Columna::CENTRO);
		$col1->setAlineacionContenido(Columna::CENTRO);
		$col1->setNombreCampo('codcon');
		$col1->setHTML('type="text" size="10"');
		$col1->setJScript('onBlur="javascript:event.keyCode=13; verificar_codcon(event,this.id);"');
		$col1->setCatalogo('Npdefcpt','sf_admin_edit_form', array('codcon' => 1,'nomcon' => 2),'Npdefcpt_Nomespconceptos');
		$col1->setAjax('nomespconceptos',3,2);

		$col2 = new Columna('Descripción');
		$col2->setTipo(Columna::TEXTO);
		$col2->setEsGrabable(false);
		$col2->setAlineacionObjeto(Columna::CENTRO);
		$col2->setAlineacionContenido(Columna::CENTRO);
		$col2->setNombreCampo('nomcon');
		$col2->setHTML('type="text" size="50" readonly=true');

		$col3 = new Columna('Especial');
		$col3->setTipo(Columna::COMBO);
		$col3->setEsGrabable(true);
		$col3->setAlineacionObjeto(Columna::CENTRO);
		$col3->setAlineacionContenido(Columna::CENTRO);
		$col3->setNombreCampo('especial');
		$col3->setCombo(Constantes::NominaEspecial());
        $col3->setHTML(' ');

		// Se guardan las columnas en el objetos de opciones
		$opciones->addColumna($col1);
		$opciones->addColumna($col2);
		$opciones->addColumna($col3);

		// Se genera el arreglo de opciones necesario para generar el grid
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
	 $codnomesp = $this->getRequestParameter('codnomesp');
	 $codnom    = $this->getRequestParameter('codnom');
	 $cajanomnom= $this->getRequestParameter('cajanomnom');
	 $cajtexmos = $this->getRequestParameter('cajtexmos');
	 $codigo    = $this->getRequestParameter('codigo');

	 $this->mensaje="";

	 if ($this->getRequestParameter('ajax')=='1')
       {

         $this->configGrid('','');

   	   $descripcion = NpnominaPeer::getDesnomesp(trim($codnom),trim($codnomesp));

	   $output = '[["'.$cajanomnom.'","'.$descripcion.'",""]]';

	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

	   if (($codnomesp<>'') and ($codnom<>''))
	    	{
             $c = new Criteria();
             $c->add(NpnomespconnomtipPeer::CODNOMESP,$codnomesp);
             $c->add(NpnomespconnomtipPeer::CODNOM,$codnom);
             $objNE = NpnomespconnomtipPeer::doSelect($c);


             if (!$objNE)
	        {
	           $this->mensaje="";
		  }
		 else
	        {
	           $this->mensaje="Ya existe información asociada a estas nominas";
	        }
            }

       }
       elseif ($this->getRequestParameter('ajax')=='2')
       {
	   $descripcion = NpnomesptiposPeer::getDesnomesp(trim($codnomesp));

	   $output = '[["'.$cajanomnom.'","'.$descripcion.'",""]]';

	   $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

       }
		else  if ($this->getRequestParameter('ajax')=='3')
    	{
      	  $dato=Herramientas::getX('codcon','npdefcpt','nomcon',$codigo);
	      $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';

      	  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
      	  return sfView::HEADER_ONLY;
    	}
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
  protected function saveNpnomespnomtip($npnomespnomtip)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    Nomina::salvarNpnomespconnomtip($npnomespnomtip,$grid);
  }


  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $this->npnomespnomtip = NpnomespnomtipPeer::retrieveByPk($this->getRequestParameter('id'));
    //H::printR($this->npnomespnomtip);exit();
    $this->forward404Unless($this->npnomespnomtip);

    try
    {
      //$this->deleteNpnomespnomtip($this->npnomespnomtip);
      $c = new Criteria();
      $c->add(NpnomespconnomtipPeer::CODNOMESP,$this->npnomespnomtip->getCodnomesp());
      $c->add(NpnomespconnomtipPeer::CODNOM,$this->npnomespnomtip->getCodnom());
      $per = NpnomespconnomtipPeer::doDelete($c);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npnomespnomtip. Make sure it does not have any associated items.');
      return $this->forward('nomespconceptos', 'list');
    }

    return $this->redirect('nomespconceptos/list');
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

    if($this->getRequest()->getMethod() == sfRequest::POST){

      $this->npnomespnomtip = $this->getNpnomespnomtipOrCreate();

      $this->updateNpnomespnomtipFromRequest();

      if (!$this->npnomespnomtip->getId())
      {
      	$c= new Criteria();
      	$c->add(NpnomespconnomtipPeer::CODNOMESP,$this->npnomespnomtip->getCodnomesp());
      	$c->add(NpnomespconnomtipPeer::CODNOM,$this->npnomespnomtip->getCodnom());
      	$datos=NpnomespconnomtipPeer::doSelectOne($c);
      	if ($datos)
      	{
  			$this->coderr=448;
            return false;
      	}
      }

      if($this->coderr!=-1){
        return false;
      } else return true;

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
      $this->npnomespnomtip = $this->getNpnomespnomtipOrCreate();
      try
      {
       $this->updateNpnomespnomtipFromRequest();
      }
      catch (Exception $ex){}
      $this->labels = $this->getLabels();
      if($this->getRequest()->getMethod() == sfRequest::POST)
      {
        if($this->coderr!=-1)
        {
            $err = Herramientas::obtenerMensajeError($this->coderr);
            $this->getRequest()->setError('',$err);

        }
      }
      return sfView::SUCCESS;
    }
}
