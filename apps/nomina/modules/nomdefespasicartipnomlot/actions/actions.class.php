<?php

/**
 * nomdefespasicartipnomlot actions.
 *
 * @package    Roraima
 * @subpackage nomdefespasicartipnomlot
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 39539 2010-07-20 17:05:26Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 * Manufacturado por JJSG
 */
class nomdefespasicartipnomlotActions extends autonomdefespasicartipnomlotActions
{

  private $coderror = -1;


  /**
   * Función principal para el manejo de la accion list
   * del formulario.
   *
   */
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npasicarnom/filters');

    // pager
    $this->pager = new sfPropelPager('Npasicarnom', 8);
    $c = new Criteria();

    $c->addSelectColumn(NpasicarnomPeer::CODNOM);
    $c->addSelectColumn("0 AS NOMNOM");
    $c->addSelectColumn("0 AS ID");
    $c->addGroupByColumn(NpasicarnomPeer::CODNOM);


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
    $this->npasicarnom = $this->getNpasicarnomOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpasicarnomFromRequest();

      $this->saveNpasicarnom($this->npasicarnom);

    $this->npasicarnom->setId(Herramientas::getX_vacio('codnom','npasicarnom','id',$this->npasicarnom->getCodnom()));

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('nomdefespasicartipnomlot/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('nomdefespasicartipnomlot/list');
      }
      else
      {
        return $this->redirect('nomdefespasicartipnomlot/edit?id='.$this->npasicarnom->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }



  protected function getNpasicarnomOrCreate($id = 'id', $codnom = 'codnom')
  {
    if (!$this->getRequestParameter($codnom))
    {
      $this->configGrid();
      $npasicarnom = new Npasicarnom();

    }
    else
    {
      $c = new Criteria();
      $c->add(NpasicarnomPeer::CODNOM,$this->getRequestParameter($codnom));

      $npasicarnom = NpasicarnomPeer::doSelectOne($c);
      //print $this->getRequestParameter($id); exit;
      //$npasicarnom = NpasicarnomPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($npasicarnom->getCodnom());
      $this->forward404Unless($npasicarnom);

    }

    return $npasicarnom;
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codigo='')
  {
    $c = new Criteria();
    $c->add(NpasicarnomPeer::CODNOM,$codigo);
    $per = NpasicarnomPeer::doSelect($c);
    $filas_arreglo=300;
    //print $codigo;

  	$filvac="";
  	$varemp = $this->getUser()->getAttribute('configemp');
	  if(is_array($varemp))
	    if(array_key_exists('aplicacion',$varemp))
	  	  if(array_key_exists('nomina',$varemp['aplicacion']))
		   if(array_key_exists('modulos',$varemp['aplicacion']['nomina']))
		     if(array_key_exists('nomasicarconnom',$varemp['aplicacion']['nomina']['modulos']))
			 {
				if(array_key_exists('filvac',$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']))
		        {
		       	 $filvac=$varemp['aplicacion']['nomina']['modulos']['nomasicarconnom']['filvac'];
		        }

			 }


    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setFilas($filas_arreglo);
    $opciones->setTabla('Npasicarnom');
    $opciones->setName('a');
    $opciones->setAnchoGrid(1000);
    $opciones->setTitulo('Cargos');
    $opciones->setHTMLTotalFilas(' ');

    // Se generan las columnas
    $col1 = new Columna('Código Cargo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codcar');
    $col1->setHTML('type="text" size="10"');
    $col1->setCatalogo('npcargos','sf_admin_edit_form', array('codcar' => 1, 'nomcar' => 2),'Npcargos_Nomhojint',array('param1' => $filvac));
    $col1->setJScript('onBlur="javascript:event.keyCode=13; verificar_codigo_repetido(event,this.id)"');
    //$col1->setAjax('nomdefespasicartipnomlot',2,2);


    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(false);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomcar');
    $col2->setHTML('type="text" size="100"');


    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);

    // Ee genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
  }


/*  public function executeGrid()
  {
  $cajtexmos=$this->getRequestParameter('cajtexmos');
  if ($this->getRequestParameter('ajax')=='1')
  {
    $dato=NpasicarnomPeer::getNomnom(trim($this->getRequestParameter('codigo')));
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
    $this->configGrid($this->getRequestParameter('codigo'));
  }
    }*/

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {$this->mensaje="";
  $cajtexmos=$this->getRequestParameter('cajtexmos');
  $cajtexcom=$this->getRequestParameter('cajtexcom');

  if ($this->getRequestParameter('ajax')=='1')
  {
    if ($this->getRequestParameter('codigo')<>'')
        {
          $x=Herramientas::getX_vacio('codnom','npasicarnom','codnom',$this->getRequestParameter('codigo'));

          if (trim($x)=="")
          {
            $dato=Herramientas::getX('codnom','npnomina','nomnom',$this->getRequestParameter('codigo'));
      }
          else
              {   $dato="";
                $this->mensaje="Ya existe información asociada a esta nomina";
              }

          }
  }
  else

    {
      if ($this->getRequestParameter('ajax')=='2')
        {  // print "hola".$this->getRequestParameter('codigo');
          $dato=Herramientas::getX('codcar','npcargos','nomcar',$this->getRequestParameter('codigo'));
        }

    }
    $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
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
  protected function saveNpasicarnom($npasicarnom)
  {
  $grid=Herramientas::CargarDatosGrid($this,$this->obj);//0
  Nomina::Grabar_grid_nomdefespasicartipnomlot($npasicarnom,$grid);
  }

  public function executeDelete()
  {
    //$this->npasicarnom = NpasicarnomPeer::retrieveByPk($this->getRequestParameter('id'));
    //$this->forward404Unless($this->npasicarnom);

    try
    {
      $r= new Criteria();
      $r->add(NpasicarnomPeer::CODNOM,$this->getRequestParameter('codnom'));
      NpasicarnomPeer::doDelete($r);
      $this->Bitacora('Elimino');
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Npasicarnom. Make sure it does not have any associated items.');
      return $this->forward('nomdefespasicartipnomlot', 'list');
    }

    return $this->redirect('nomdefespasicartipnomlot/list');
  }




  protected function deleteNpasicarnom($npasicarnom)
  {

  }

}
