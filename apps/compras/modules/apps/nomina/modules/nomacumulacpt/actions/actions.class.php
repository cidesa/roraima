<?php

/**
 * nomacumulacpt actions.
 *
 * @package    siga
 * @subpackage nomacumulacpt
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomacumulacptActions extends autonomacumulacptActions
{
   public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/nomacumulacpt/filters');

    // pager
    $this->pager = new sfPropelPager('Npacumulacpt', 20);
    $c = new Criteria();

    $c->addSelectColumn(NpacumulacptPeer::CODACU);
    $c->addSelectColumn(NpacumulacptPeer::NOMACU);
    $c->addSelectColumn("'' AS CODCON");
    $c->addSelectColumn("'' AS CODNOM");
    $c->addSelectColumn("'' AS TIPACU");
    $c->addSelectColumn("0 AS FACTOR");
    $c->addSelectColumn("max(ID) AS ID");
   // $c->addSelectColumn(NpconfonPeer::CODNOM." AS ID");

    $c->addGroupByColumn(NpacumulacptPeer::CODACU);
    $c->addGroupByColumn(NpacumulacptPeer::NOMACU);

    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }	

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->configGrid();
  }
  
  public function configGrid()
  {
     $c = new Criteria();
	$c->add(NpacumulacptPeer::CODACU,$this->npacumulacpt->getCodacu());
    $per = NpacumulacptPeer::doSelect($c);

    
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Npacumulacpt');
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(900);
	$opciones->setFilas(1);	
	$opciones->setName('a');
    $opciones->setTitulo(' ');
    $opciones->setHTMLTotalFilas(' ');
	
    // Se generan las columnas
	
	$col1 = new Columna('Código Nómina');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);
    $col1->setNombreCampo('codnom');
	$col1->setCatalogo('npnomina','sf_admin_edit_form',array('codnom' => 1,'nomnom' => 2), 'Npnomina_Vacdefgen');
	$col1->setHTML('type="text" size="10" ');

    $col2 = new Columna('Descripción Nómina');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomnom');
    $col2->setHTML('type="text" size="20" readonly="true" ');
	
	$col3 = new Columna('Código Concepto');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);
    $col3->setNombreCampo('codcon');
	$col3->setCatalogo('npdefcpt','sf_admin_edit_form',array('codcon' => 3,'nomcon' => 4), 'Npdefcpt_Vacdefgen',array('param1'=>"'+getCeldav2(this.id,-2)+'"));
	$col3->setHTML('type="text" size="10" ');

    $col4 = new Columna('Descripción Concepto');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomcon');
    $col4->setHTML('type="text" size="20" readonly="true" ');
	
    $col5 = new Columna('Tipo Acumulador');
    $col5->setTipo(Columna::COMBO);
	$col5->setCombo(array('C'=>'Cantidad','M'=>'Monto','S'=>'Saldo'));
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);
    $col5->setNombreCampo('tipacu');
	$col5->setHTML(' ');

    $col6 = new Columna('Factor');
    $col6->setTipo(Columna::MONTO);
    $col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);
    $col6->setNombreCampo('factor');
	$col6->setHTML(' ');
 

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
	$opciones->addColumna($col6);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->objcon = $opciones->getConfig($per);
	$this->npacumulacpt->setObjcon($this->objcon);
     
  }

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
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){

       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->npacumulacpt->getObjcon());
	   
	   if(count($grid[0])>0)
	   {
	   	foreach($grid[0] as $r)
		{
			if($r->getCodnom()=='')
			{
				$this->coderr=496;
			}
			if($r->getCodcon()=='')
			{
				$this->coderr=496;
			}
			if($r->getTipacu()=='')
			{
				$this->coderr=496;
			}
			if($r->getFactor()==0)
			{
				$this->coderr=496;
			}
		}
	   }else
	   {
	   		$this->coderr=495;
	   }

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
    $this->configGrid();   
	
	$grid = Herramientas::CargarDatosGridv2($this,$this->npacumulacpt->getObjcon());

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjcon());	
	$arreglo=array('codacu','nomacu');
    return H::Guardar_Grid($grid,$arreglo,$clasemodelo);
  }

  public function deleting($clasemodelo)
  {
  	$c = new Criteria();
	$c->add(NpacumulacptPeer::CODACU,$clasemodelo->getCodacu());
	NpacumulacptPeer::doDelete($c);
    return '-1';
  }


}
