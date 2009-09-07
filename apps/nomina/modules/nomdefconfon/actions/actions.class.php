<?php

/**
 * nomdefconfon actions.
 *
 * @package    Roraima
 * @subpackage nomdefconfon
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class nomdefconfonActions extends autonomdefconfonActions
{

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
  protected function saveNpconfon($npconfon)
  {
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
	Nomina::salvarNomdefconfon($npconfon,$grid,$this->getRequestParameter('txtdeduccion'),$this->getRequestParameter('txtaportes'),$this->getRequestParameter('txtajudeduccion'),$this->getRequestParameter('txtajuaportes'));

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
	 {
	    $dato="";
	    $existe="N";
		$c= new Criteria();
		$c->add(NpconfonPeer::CODNOM,$this->getRequestParameter('codigo'));
		$data= NpconfonPeer::doSelect($c);
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
	  else if ($this->getRequestParameter('ajax')=='2')
	  {
	    $d= new Criteria();
		$d->add(NpdefcptPeer::CODCON,$this->getRequestParameter('codigo'));
		$resul=NpdefcptPeer::doSelectOne($d);
		if ($resul)
		{
		   $c = new Criteria();
           $c->addJoin(NpdefcptPeer::CODCON,NpasiconnomPeer::CODCON);
           $c->add(NpasiconnomPeer::CODNOM,$this->getRequestParameter('nomina'));
           $c->add(NpasiconnomPeer::CODCON,$this->getRequestParameter('codigo'));
		   if ($this->getRequestParameter('cat')=='0')
		   { $c->add(NpdefcptPeer::OPECON,'D');}
		   else if ($this->getRequestParameter('cat')=='2')
		   { $c->add(NpdefcptPeer::OPECON,'P',Criteria::NOT_EQUAL);}
		   else if ($this->getRequestParameter('cat')=='1' || $this->getRequestParameter('cat')=='3')
		   { $c->add(NpdefcptPeer::OPECON,'P');}
		   $data=NpdefcptPeer::doSelectOne($c);
			if ($data)
			{
			 $dato=NpdefcptPeer::getDescon($this->getRequestParameter('codigo'));
			 $existe='N';
			}
			else
			{
			 $dato="";
			 $existe='S';
			}
		}
		else
		{ $existe='SS'; $dato="";}

		$output = '[["'.$cajtexmos.'","'.$dato.'",""],["existe","'.$existe.'",""]]';
		$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	   return sfView::HEADER_ONLY;
	  }


	}

public function executeAutocomplete()
	{
		if ($this->getRequestParameter('ajax')=='1')
	    {
		 	$this->tags=Herramientas::autocompleteAjax('CODNOM','Npnomina','CODNOM',$this->getRequestParameter('npconfon[codnom]'));
	    }
	}


/**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
  	$this->npconfon = $this->getNpconfonOrCreate();
  	$this->configGrid($this->npconfon->getCodnom());

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$this->npconfon->getCodnom());
	$c->add(NpconfonPeer::TIPCON,'D');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->deduccion=$resul->getCodcon();}else { $this->deduccion='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$this->npconfon->getCodnom());
	$c->add(NpconfonPeer::TIPCON,'A');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->aporte=$resul->getCodcon();}else { $this->aporte='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$this->npconfon->getCodnom());
	$c->add(NpconfonPeer::TIPCON,'J');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->ajudeduccion=$resul->getCodcon();}else { $this->ajudeduccion='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$this->npconfon->getCodnom());
	$c->add(NpconfonPeer::TIPCON,'U');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->ajuaporte=$resul->getCodcon();}else { $this->ajuaporte='';}


    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpconfonFromRequest();

      $this->saveNpconfon($this->npconfon);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefconfon/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefconfon/list');
      }
      else
      {
        return $this->redirect('nomdefconfon/edit?id='.$this->npconfon->getCodnom());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npconfon/filters');

    // pager
    $this->pager = new sfPropelPager('Npnomina', 8);
    $c = new Criteria();
    $c->addJoin(NpconfonPeer::CODNOM,NpnominaPeer::CODNOM);
	$c->Setdistinct();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

  protected function getNpconfonOrCreate($id = 'id', $nomina = 'nomina')
  {
    if (!$this->getRequestParameter($nomina))
    {
      $npconfon = new Npconfon();
    }
    else
    {
      $c = new Criteria();
  	  $c->add(NpconfonPeer::CODNOM,$this->getRequestParameter($nomina));
  	  $npconfon = NpconfonPeer::doSelectOne($c);
      $this->forward404Unless($npconfon);
    }

    return $npconfon;
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

      $sql="Select coalesce((select (case when (tipcon='S') then 1 else 0 end) as check1
				 from  npconfon where codnom='".$codnom."' and a.codnom = codnom and codcon = a.codcon  ),0) as check, a.codcon as codcon ,b.nomcon as nomcon, 9 as id
				 from Npasiconnom a, npdefcpt b
				 where a.codnom='".$codnom."' and a.codcon=b.codcon order by a.codcon";

		$resp = Herramientas::BuscarDatos($sql,&$reg);

	    $opciones = new OpcionesGrid();
	    $opciones->setTabla('Npconfon');
        $opciones->setAnchoGrid(500);
        $opciones->setTitulo('Conceptos para el Calculo');
        $opciones->setHTMLTotalFilas(' ');
        $opciones->setFilas(0);

        $col1 = new Columna('Marque');
	    $col1->setTipo(Columna::CHECK);
	    $col1->setEsGrabable(true);
	    $col1->setNombreCampo('check');
	    $col1->setHTML(' ');
	    $col1->setJScript('onClick="validar(this.id)"');

        $col2 = new Columna('Código');
        $col2->setTipo(Columna::TEXTO);
        $col2->setAlineacionObjeto(Columna::IZQUIERDA);
        $col2->setAlineacionContenido(Columna::IZQUIERDA);
        $col2->setNombreCampo('Codcon');
        $col2->setEsGrabable(true);
        $col2->setHTML('type="text" size="6" readonly=true');

	    $col3 = new Columna('Nombre del Concepto');
        $col3->setTipo(Columna::TEXTO);
        $col3->setAlineacionObjeto(Columna::IZQUIERDA);
        $col3->setAlineacionContenido(Columna::IZQUIERDA);
        $col3->setNombreCampo('Nomcon');
        $col3->setHTML('type="text" size="50" readonly=true');

        $opciones->addColumna($col1);
        $opciones->addColumna($col2);
        $opciones->addColumna($col3);

        $this->obj = $opciones->getConfig($reg);

	}

/**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $c = new Criteria();
  	$c->add(NpconfonPeer::CODNOM,$this->getRequestParameter('nomina'));
    $this->npconfon = NpconfonPeer::doSelectOne($c);

    $this->forward404Unless($this->npconfon);

    try
    {
      $this->deleteNpconfon($this->npconfon);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npconfon. Make sure it does not have any associated items.');
      return $this->forward('nomdefconfon', 'list');
    }

    return $this->redirect('nomdefconfon/list');
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
    $this->npconfon = $this->getNpconfonOrCreate();
    $this->updateNpconfonFromRequest();

    $this->labels = $this->getLabels();

    Herramientas::CargarDatosGrid($this,$this->obj);

    return sfView::SUCCESS;
  }

  protected function deleteNpconfon($npconfon)
  {
    $c = new Criteria();
  	$c->add(NpconfonPeer::CODNOM,$npconfon->getCodnom());
  	NpconfonPeer::doDelete($c);
  }

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateNpconfonFromRequest()
  {
    $npconfon = $this->getRequestParameter('npconfon');
    $this->configGrid($npconfon['codnom']);
	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$npconfon['codnom']);
	$c->add(NpconfonPeer::TIPCON,'D');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->deduccion=$resul->getCodcon();}else { $this->deduccion='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$npconfon['codnom']);
	$c->add(NpconfonPeer::TIPCON,'A');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->aporte=$resul->getCodcon();}else { $this->aporte='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$npconfon['codnom']);
	$c->add(NpconfonPeer::TIPCON,'J');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->ajudeduccion=$resul->getCodcon();}else { $this->ajudeduccion='';}

	$c= new Criteria();
	$c->add(NpconfonPeer::CODNOM,$npconfon['codnom']);
	$c->add(NpconfonPeer::TIPCON,'U');
	$resul= NpconfonPeer::doSelectOne($c);
	if ($resul)
	{ $this->ajuaporte=$resul->getCodcon();}else { $this->ajuaporte='';}

    if (isset($npconfon['codnom']))
    {
      $this->npconfon->setCodnom($npconfon['codnom']);
    }
    if (isset($npconfon['codcon']))
    {
      $this->npconfon->setCodcon($npconfon['codcon']);
    }
    if (isset($npconfon['tipcon']))
    {
      $this->npconfon->setTipcon($npconfon['tipcon']);
    }
  }



}
