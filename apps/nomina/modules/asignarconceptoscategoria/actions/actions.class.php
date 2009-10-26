<?php

/**
 * asignarconceptoscategoria actions.
 *
 * @package    Roraima
 * @subpackage asignarconceptoscategoria
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class asignarconceptoscategoriaActions extends autoasignarconceptoscategoriaActions
{


 /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->npconceptoscategoria = $this->getNpconceptoscategoriaOrCreate();
	$this->configGrid($this->npconceptoscategoria->getCodcat());
    $this->setVars();
    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateNpconceptoscategoriaFromRequest();

      $this->saveNpconceptoscategoria($this->npconceptoscategoria);

      $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('asignarconceptoscategoria/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('asignarconceptoscategoria/list');
      }
      else
      {
        return $this->redirect('asignarconceptoscategoria/edit?id='.$this->npconceptoscategoria->getId());
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
  protected function updateNpconceptoscategoriaFromRequest()
  {
    $npconceptoscategoria = $this->getRequestParameter('npconceptoscategoria');
     $this->setVars();
    if (isset($npconceptoscategoria['codcat']))
    {
      $this->npconceptoscategoria->setCodcat($npconceptoscategoria['codcat']);
    }
    if (isset($npconceptoscategoria['codcon']))
    {
      $this->npconceptoscategoria->setCodcon($npconceptoscategoria['codcon']);
    }
  }
  
   public function setVars()
  {
      $this->formatocategoria = Herramientas::ObtenerFormato('Cpdefniv','forpre');
      $this->c=null;
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/Npconceptoscategoria/filters');

    // pager
    $this->pager = new sfPropelPager('Npconceptoscategoria', 10);
    $c = new Criteria();
    $c->addSelectColumn(NpconceptoscategoriaPeer::CODCAT);    
    $c->addSelectColumn("'' AS CODCON");
    $c->addSelectColumn("max(ID) AS ID");
    
    $c->addGroupByColumn(NpconceptoscategoriaPeer::CODCAT);
       
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }





 protected function getNpconceptoscategoriaOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npconceptoscategoria = new Npconceptoscategoria();
      $this->configGrid($this->getRequestParameter('npconceptoscategoria[codcat]'));
    }
    else
    {
      $npconceptoscategoria = NpconceptoscategoriaPeer::retrieveByPk($this->getRequestParameter($id));
      $this->configGrid($this->getRequestParameter('npconceptoscategoria[codcat]'));
      $this->forward404Unless($npconceptoscategoria);
    }

    return $npconceptoscategoria;
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
 
  $sql= "SELECT
        (case when (npconceptoscategoria.CODcat is null )then 0 else 1 end) as check,
        npconceptoscategoria.codcat,npdefcpt.CODCON, npdefcpt.NOMCON, npdefcpt.CODPAR, 9 as id
        FROM npdefcpt LEFT OUTER JOIN npconceptoscategoria on npdefcpt.codcon=npconceptoscategoria.codcon and npconceptoscategoria.codcat = '".$codigo."'
        order by npdefcpt.codcon";
    
    $resp = Herramientas::BuscarDatos($sql,&$per);
   // print ($codigo);exit;
    $filas_arreglo=100;
    $opciones = new OpcionesGrid();
    $opciones->setEliminar(false);
    $opciones->setTabla('Npdefcpt');
    $opciones->setAnchoGrid(800);
    $opciones->setName('a');
    $opciones->setFilas($filas_arreglo);
    $opciones->setTitulo('');
    $opciones->setHTMLTotalFilas(' ');
    
    $col1 = new Columna('Check');
	$col1->setTipo(Columna::CHECK);
	$col1->setEsGrabable(true);
	$col1->setNombreCampo('check');
	$col1->setHTML('size="5"');
	$col1->setJScript('onClick=validarCodigo(this.id)');
		
    $col2 = new Columna('Cod. Concepto');
    $col2->setTipo(Columna::TEXTO);
    $col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);
    $col2->setEsGrabable(true);
    $col2->setNombreCampo('codcon');
    $col2->setHTML('type="text" size="10"');

    $col3 = new Columna('Nombre del Concepto');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('nomcon');
    $col3->setHTML('type="text" size="25"');
      
    $col4 = new Columna('Partida Presupuestaria');
    $col4->setTipo(Columna::TEXTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('codpar');
    $col4->setHTML('type="text" size="25"');

    //$col4->setCombo(Constantes::ListaModoCestatick());
    //$col4->setHTML(' ');

    $opciones->addColumna($col1);        
    $opciones->addColumna($col2);
    $opciones->addColumna($col3);
    $opciones->addColumna($col4);
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
   {
     $this->configGrid($this->getRequestParameter('codigo'));
     $dato = Herramientas::getX('codcat','Npcatpre','nomcat',$this->getRequestParameter('codigo'));
     $output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

     //return sfView::HEADER_ONLY;
   }
   else if ($this->getRequestParameter('ajax')=='2')
   	{   
   		$j=$this->getRequestParameter('cod');
        $c = new Criteria();
        $c->add(CpdeftitPeer::CODPRE,$j);
        $per = CpdeftitPeer::doSelect($c);
  	    if ($per)
  	         { //print " el titulo presupuestario '".$this->getRequestParameter('cod')."' no existe en presupuesto"; 
               //$dato = Herramientas::getX('codnom','Npnomina','nomnom',$this->getRequestParameter('codigo'));
               $dato = '0';
  	         }
  		    else 
  		    {
  		    	 //print " el titulo presupuestario '".$this->getRequestParameter('cod')."' no existe en presupuesto";  		    	 
               //$dato = Herramientas::getX('codnom','Npnomina','nomnom',$this->getRequestParameter('codigo'));
               $dato = '-1';
               
  		    }
  		 $output = '[["varcontrol","'.$dato.'",""]]';
	     $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');   
  		    
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
  protected function saveNpconceptoscategoria($npconceptoscategoria)
  {
   
    //$npconceptoscategoria->save();
    $grid=Herramientas::CargarDatosGrid($this,$this->obj,true);
  //  print_r ($grid);exit;
    $j=$this->getRequestParameter('npconceptoscategoria[codcat]');  

    EmpleadosBanco::Grabar_grid_Npconceptoscategoria($npconceptoscategoria,$grid,$j);
  }



}
