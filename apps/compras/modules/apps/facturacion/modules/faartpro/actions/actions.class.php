<?php

/**
 * faartpro actions.
 *
 * @package    Roraima
 * @subpackage faartpro
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class faartproActions extends autofaartproActions
{
  public $coderror=-1;

    /**
   * Función principal para el manejo de las acciones create y edit
   * del formulario.
   *
   */
  public function executeEdit()
  {
    $this->setVars();
    $this->faartpro = $this->getFaartproOrCreate();
    $this->configGrid();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateFaartproFromRequest();

      if($this->saveFaartpro($this->faartpro) ==-1){
        $this->setFlash('notice', 'Your modifications have been saved');
$this->Bitacora('Guardo');

		$codigo=Herramientas::getX('rifpro','facliente','codpro',$this->getRequestParameter('faartpro[rifpro]'));
        $this->faartpro->setId(Herramientas::getX_vacio('codpro','faartpro','id',$codigo));
        if ($this->getRequestParameter('save_and_add'))
        {
          return $this->redirect('faartpro/create');
        }
        else if ($this->getRequestParameter('save_and_list'))
        {
          return $this->redirect('faartpro/list');
        }
        else
        {
            return $this->redirect('faartpro/edit?id='.$this->faartpro->getId());
            //return $this->redirect('faartpro/edit?id='.$this->faartpro->getId().'&codpro='.$this->faartpro->getCodpro().'&codalm='.$this->faartpro->getCodalm());
        }

      }else{
        $this->labels = $this->getLabels();
      }

    }
    else
    {
      $this->labels = $this->getLabels();
    }
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
	$this->configGrid();

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
	if (($this->getRequestParameter('codpro') != "")&&($this->getRequestParameter('codalm') != "")){
		$c->add(FaartproPeer::CODPRO,$this->getRequestParameter('codpro'));
		$c->add(FaartproPeer::CODALM,$this->getRequestParameter('codalm'));
	}
	else{
	    $codigo=Herramientas::getX('codpro','facliente','codpro',$this->getRequestParameter('faartpro[rifpro]'));
        $c->add(FaartproPeer::CODPRO,$codigo);
	}
    $reg = FaartproPeer::doSelect($c);

	$mascaraarticulo=$this->mascaraarticulo;

	$opciones = new OpcionesGrid();
	$opciones->setTabla('Faartpro');
	$opciones->setAnchoGrid(805);
	$opciones->setAncho(800);
	$opciones->setFilas(50);
	$opciones->setTitulo('Artículos a consignación');
	$opciones->setHTMLTotalFilas(' ');
	if ($this->faartpro->getId())
		$opciones->setEliminar(false);
    else
       $opciones->setEliminar(true);


    $col1 = new Columna('Cod. Proveedor');
    $col1->setTipo(Columna::TEXTO);
    $col1->setNombreCampo('codpro');
    $col1->setOculta(true);

    $col2 = new Columna('Cod. Almacen');
    $col2->setTipo(Columna::TEXTO);
    $col2->setNombreCampo('codalm');
    $col2->setOculta(true);

	$obj1= array ('codart' => '3','desart' =>'4');
	$col3 = new Columna('Cod. Artículo');
	$col3->setTipo(Columna::TEXTO);
	$col3->setEsGrabable(true);
	$col3->setNombreCampo('codart');
	$col3->setAlineacionObjeto(Columna::CENTRO);
	$col3->setAlineacionContenido(Columna::CENTRO);
	$col3->setHTML('type="text" size="10"');
	$col3->setCatalogo('Caregart','sf_admin_edit_form',$obj1,'Caregart_Faproalt');
	$col3->setJScript('onKeyDown="javascript:return dFilter (event.keyCode, this,'.chr(39).$mascaraarticulo.chr(39).')" onKeyPress="javascript:cadena=rayaenter(event,this.value);if (event.keyCode==13 || event.keyCode==9){document.getElementById(this.id).value=cadena;}"');
    $col3->setAjax('faartpro',1,4);

	$col4 = new Columna('Descripción');
	$col4->setTipo(Columna::TEXTO);
	$col4->setNombreCampo('desart');
	$col4->setEsGrabable(false);
	$col4->setAlineacionObjeto(Columna::CENTRO);
	$col4->setAlineacionContenido(Columna::CENTRO);
	$col4->setHTML('type="text" size="70" readonly=true');

	$col5 = new Columna('Comisión (%)');
	$col5->setTipo(Columna::MONTO);
	$col5->setNombreCampo('comisi');
	$col5->setHTML('type="text" size="12"');
    $col5->setEsNumerico(true);
    $col5->setEsGrabable(true);
    $col5->setAlineacionContenido(Columna::DERECHA);
    $col5->setAlineacionObjeto(Columna::DERECHA);
    $col5->setJScript('onKeypress="entermonto(event,this.id)"');

	$opciones->addColumna($col1);
	$opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);

	$this->obj = $opciones->getConfig($reg);

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
    // Esta variable ajax debe ser usada en cada llamado para identificar
    // que objeto hace el llamado y por consiguiente ejecutar el código necesario
    $ajax = $this->getRequestParameter('ajax','');

    // Se debe enviar en la petición ajax desde el cliente los datos que necesitemos
    // para generar el código de retorno, esto porque en un llamado Ajax no se devuelven
    // los datos de los objetos de la vista como pasa en un submit normal.

    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
        $output = '[["","",""],["","",""],["","",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;

    // Si por el contrario se quiere reemplazar un div en la vista, se debe deshabilitar
    // por supuesto tomando en cuenta que debe existir el archivo ajaxSuccess.php en la carpeta templates.

  }

  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit()
  {
    $resp=-1;
    if($this->getRequest()->getMethod() == sfRequest::POST){
      $this->faartpro= $this->getFaartproOrCreate();
      $this->updateFaartproFromRequest();
      $this->configGrid();
      $this->setVars();
      $grid = Herramientas::CargarDatosGrid($this,$this->obj);
      $this->configGrid($grid[0],$grid[1]); // [3]
      if (count($grid[0])==0){
        $resp = 1024;
      }
      if($resp!=-1){
        $this->coderr = $resp;
        return false;
      } else return true;
    }else return true;

  }



   public function ValidarDatosVaciosenGrid($grid,&$error)
   {
      $error=-1;
      $x=$grid[0];
      $j=0;
      $codcatvacio=false;

      if (count($x)==0)
      {
         $error=178;
         return true;
      }
      if ($codcatvacio)
        return true;
      else
        return false;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateError()
  {
     self::configGrid();
     $grid=Herramientas::CargarDatosGrid($this,$this->obj);
    return true;
  }

  public function setVars()
  {
      $this->mascara = Herramientas::ObtenerFormato('Contaba','Forcta');
      $this->loncta=strlen($this->mascara);
      $this->encontrado=false;
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
    $this->faartpro = $this->getFaartproOrCreate();
    $this->updateFaartproFromRequest();
   	$this->configGrid();
   	$this->setVars();
    $this->labels = $this->getLabels();
	if($this->coderror!=-1)
      {
       $err = Herramientas::obtenerMensajeError($this->coderror);
       $this->getRequest()->setError('',$err);
      }
    return sfView::SUCCESS;
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
  protected function saveFaartpro($faartpro)
  {
		$grid=Herramientas::CargarDatosGrid($this,$this->obj);
		Facturacion::salvarFaartpro($faartpro,$grid,$this->getRequestParameter('faartpro[rifpro]'),$this->getRequestParameter('faartpro[codalm]'));
		return -1;
  }

  /**
   * Función principal para procesar la eliminación de registros 
   * en el formulario.
   *
   */
  public function executeDelete()
  {
    $c = new Criteria();
    $c->add(FaartproPeer::CODPRO,$this->getRequestParameter('codpro'));
    $c->add(FaartproPeer::CODALM,$this->getRequestParameter('codalm'));
    $datos = FaartproPeer::doSelect($c);
    $this->forward404Unless($datos);

    try
    {
       if ($datos)
       {
    	foreach ($datos as $farecart)
    	{
           $farecart->delete();
    	}
    	$this->SalvarBitacora($this->getRequestParameter('id') ,'Elimino');
    }
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Faartpvp. Make sure it does not have any associated items.');
      return $this->forward('faartpro', 'list');
    }

    return $this->redirect('faartpro/list');
  }

  public function executeAutocomplete()
  {
    if ($this->getRequestParameter('ajax')=='1')
      {
       $this->tags=Herramientas::autocompleteAjax('RIFPRO','Facliente','rifpro',trim($this->getRequestParameter('faartpro[rifpro]')));
      }
    else if ($this->getRequestParameter('ajax')=='2')
      {
       $this->tags=Herramientas::autocompleteAjax('CODALM','Cadefalm','codalm',trim($this->getRequestParameter('faartpro[codalm]')));
      }
    else if ($this->getRequestParameter('ajax')=='3')
      {
       $this->tags=Herramientas::autocompleteAjax('CODCTA','Contabb','codcta',trim($this->getRequestParameter('faartpro[codcta]')));
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

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/faartpro/filters');

	$this->pager = new sfPropelPager('Faartpro', 10);
	$c = new Criteria();
	$c->clearSelectColumns();
	$c->clearGroupByColumns();
	$c->Setdistinct();
	$c->addSelectColumn(FaartproPeer::CODPRO);
	$c->addSelectColumn(FaartproPeer::CODALM);
	$c->addSelectColumn('0');
	$c->addSelectColumn('0');
	$c->addSelectColumn('0');
	$c->addSelectColumn('0');
	$c->addJoin(FaartproPeer::CODALM,CadefalmPeer::CODALM);
	$c->addJoin(FaartproPeer::CODPRO,FaclientePeer::CODPRO);
	$c->addGroupByColumn(FaartproPeer::CODPRO);
	$c->addGroupByColumn(FaartproPeer::CODALM);
	$this->addSortCriteria($c);
	$this->addFiltersCriteria($c);
	$this->pager->setCriteria($c);
	$this->pager->setPage($this->getRequestParameter('page', 1));
	$this->pager->init();

  }

  protected function getFaartproOrCreate($id = 'id', $codpro = 'codpro', $codalm = 'codalm')
  {

    if ((!$this->getRequestParameter($codpro) )&&(!$this->getRequestParameter($codalm) ))
    {
      $faartpro = new Faartpro();
    }
    else
    {
      //$caretser = CaretserPeer::retrieveByPk($this->getRequestParameter($id));
      	$c = new Criteria();
		$c->add(FaartproPeer::CODPRO,$this->getRequestParameter($codpro));
		$c->add(FaartproPeer::CODALM,$this->getRequestParameter($codalm));
  	  	$faartpro = FaartproPeer::doSelectOne($c);

      	$this->forward404Unless($faartpro);

    }

    return $faartpro;
  }

}
