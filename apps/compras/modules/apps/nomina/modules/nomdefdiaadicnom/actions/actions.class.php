<?php

/**
 * nomdefdiaadicnom actions.
 *
 * @package    Roraima
 * @subpackage nomdefdiaadicnom
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefdiaadicnomActions extends autonomdefdiaadicnomActions
{


/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npdiaadicnom = $this->getNpdiaadicnomOrCreate();
    $this->configGrid($this->npdiaadicnom->getCodnom());

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpdiaadicnomFromRequest();

      $this->saveNpdiaadicnom($this->npdiaadicnom);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefdiaadicnom/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefdiaadicnom/list');
      }
      else
      {
        return $this->redirect('nomdefdiaadicnom/edit?id='.$this->npdiaadicnom->getCodnom());
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
  public function configGrid($codnom='')
  {
    $sql="Select coalesce((select (CASE when codcon is not null then 1 end) as check1
            from  npdiaadicnom where codnom='".$codnom."' and a.codnom = codnom and codcon = a.codcon  ),0) as check,a.codcon,b.nomcon, 9 as id
            from Npasiconnom a, npdefcpt b
            where a.codnom='".$codnom."' and a.codcon=b.codcon order by a.codcon";

    $resp = Herramientas::BuscarDatos($sql,&$per);

    $opciones = new OpcionesGrid();
    $opciones->setTabla('Npdiaadicnom');
    $opciones->setAnchoGrid(600);
    $opciones->setTitulo('Conceptos');
    $opciones->setHTMLTotalFilas(' ');
    $opciones->setFilas(0);
    $opciones->setEliminar(false);

    $col1 = new Columna('Marque');
    $col1->setTipo(Columna::CHECK);
    $col1->setEsGrabable(true);
    $col1->setNombreCampo('check');
    $col1->setHTML(' ');

    $col2 = new Columna('Cod. Concepto');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('Codcon');
    $col2->setEsGrabable(true);
    $col2->setHTML('type="text" size="5" readonly=true');

    $col3 = new Columna('Nombre del Concepto');
    $col3->setTipo(Columna::TEXTO);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('Nomcon');
    $col3->setHTML('type="text" size="50" readonly=true');

    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);

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

    if ($this->getRequestParameter('ajax')=='1')
	{ $dato="";
	  $existe="N";
		$c= new Criteria();
		$c->add(NpdiaadicnomPeer::CODNOM,$this->getRequestParameter('codigo'));
		$data= NpdiaadicnomPeer::doSelect($c);
		if (empty($data))
		{
		 $dato=NpnominaPeer::getDesnom($this->getRequestParameter('codigo'));
		 $this->configGrid($this->getRequestParameter('codigo'));
		 $output = '[["'.$cajtexmos.'","'.$dato.'",""],["duplicado","'.$existe.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		}
		else
		{
		  $existe="S";
		   $this->configGrid();
		  $output = '[["duplicado","'.$existe.'",""],["'.$cajtexmos.'","'.$dato.'",""]]';
		  $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
		  return sfView::HEADER_ONLY;
		}
	}
  }


  public function executeAutocomplete()
  {
	if ($this->getRequestParameter('ajax')=='1')
	{
	 $this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npdiaadicnom[codnom]'));
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
  protected function saveNpdiaadicnom($npdiaadicnom)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
    Nomina::salvarNomdefdiaadicnom($npdiaadicnom,$grid);

  }

  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npdiaadicnom/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 8);
    $c = new Criteria();
    $c->addJoin(NpdiaadicnomPeer::CODNOM,NpnominaPeer::CODNOM);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getNpdiaadicnomOrCreate($id = 'id', $nomina = 'nomina')
  {
    if (!$this->getRequestParameter($nomina))
    {
      $npdiaadicnom = new Npdiaadicnom();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpdiaadicnomPeer::CODNOM,$this->getRequestParameter($nomina));
  	  $npdiaadicnom = NpdiaadicnomPeer::doSelectOne($c);

      $this->forward404Unless($npdiaadicnom);
    }

    return $npdiaadicnom;
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpdiaadicnomFromRequest()
  {
    $npdiaadicnom = $this->getRequestParameter('npdiaadicnom');
    $this->configGrid($npdiaadicnom['codnom']);

    if (isset($npdiaadicnom['codnom']))
    {
      $this->npdiaadicnom->setCodnom($npdiaadicnom['codnom']);
    }
    if (isset($npdiaadicnom['nomnom']))
    {
      $this->npdiaadicnom->setNomnom($npdiaadicnom['nomnom']);
    }
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $c = new Criteria();
  	$c->add(NpdiaadicnomPeer::CODNOM,$this->getRequestParameter('nomina'));
    $this->npdiaadicnom = NpdiaadicnomPeer::doSelectOne($c);

    $this->forward404Unless($this->npdiaadicnom);

    try
    {
      $this->deleteNpdiaadicnom($this->npdiaadicnom);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npdiaadicnom. Make sure it does not have any associated items.');
      return $this->forward('nomdefdiaadicnom', 'list');
    }

    return $this->redirect('nomdefdiaadicnom/list');
  }

  protected function deleteNpdiaadicnom($npdiaadicnom)
  {
    $c = new Criteria();
  	$c->add(NpdiaadicnomPeer::CODNOM,$npdiaadicnom->getCodnom());
  	NpdiaadicnomPeer::doDelete($c);
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
    $this->npdiaadicnom = $this->getNpdiaadicnomOrCreate();
    $this->updateNpdiaadicnomFromRequest();

    $this->labels = $this->getLabels();

    Herramientas::CargarDatosGrid($this,$this->obj);

    return sfView::SUCCESS;
  }

}
