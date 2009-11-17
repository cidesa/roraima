<?php

/**
 * nomdefcur actions.
 *
 * @package    siga
 * @subpackage nomdefcur
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomdefcurActions extends autonomdefcurActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->rhdefcur = $this->getRhdefcurOrCreate();
	if($this->rhdefcur->getId()!='')
	{
		$this->configGridClase($this->rhdefcur->getCodcur());	
		$this->configGridInstructores($this->rhdefcur->getCodcur());
	}else
	{
		$this->configGridClase();
		$this->configGridInstructores();
	}		
  }

 public function configGridClase($codcur='')
  {
    
	$c = new Criteria();
	$c->add(RhclacurPeer::CODCUR,$codcur);
    $per = RhclacurPeer::doSelect($c);
    
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Rhclacur');
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(800);
	$opciones->setName('a');
	$opciones->setFilas(1);	
    $opciones->setTitulo('Clases del Curso');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Nro. Clase');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);    
	$col1->setNombreCampo('numcla');
	$col1->setHTML('type="text" size="15" maxlength="3"');

    $col2 = new Columna('Fecha');
    $col2->setTipo(Columna::FECHA);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
	$col2->setEsGrabable(true);
    $col2->setNombreCampo('feccla');
	$col2->setVacia(true);
    $col2->setHTML('type="text" size="40" ');
	
	$col3 = new Columna('Num. Horas');
    $col3->setTipo(Columna::MONTO);
	$col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('numhor');
    $col3->setHTML('type="text" size="15" ');
	
	$col4 = new Columna('Hora Inicio');
    $col4->setTipo(Columna::TEXTO);
	$col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('horini');
    $col4->setHTML('type="text" size="15" maxlength="6" onKeypress="return EscribirHora(event,this);"');
	
	$col5 = new Columna('Hora Fin');
    $col5->setTipo(Columna::TEXTO);
	$col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setNombreCampo('horfin');
    $col5->setHTML('type="text" size="15" maxlength="6" onKeypress="return EscribirHora(event,this);"');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);	
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
	$this->rhdefcur->setObj_cla($this->obj);

  }
  
  public function configGridInstructores($codcur='')
  {    
	$c = new Criteria();
	$c->add(RhprocurPeer::CODCUR,$codcur);
    $per = RhprocurPeer::doSelect($c);
    
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Rhprocur');
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(600);
	$opciones->setName('b');
	$opciones->setFilas(1);	
    $opciones->setTitulo('Instructores del Curso');
    $opciones->setHTMLTotalFilas(' ');
	
    // Se generan las columnas
    $col1 = new Columna('Cédula');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);    
	$col1->setNombreCampo('cedpro');
	$col1->setCatalogo('nphojint','sf_admin_edit_form',array('cedemp' => 1,'nomemp' => 2), 'Oycregsol_nphojint');
	$col1->setHTML('type="text" size="15" maxlength="10"');

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTO);
	$col2->setEsGrabable(true);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nompro');
    $col2->setHTML('type="text" size="60" maxlength="100"');
	
    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	
    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj2 = $opciones->getConfig($per);
	$this->rhdefcur->setObj_inst($this->obj2);

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

      // $this->configGrid();
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
	  
	  $this->rhdefcur = $this->getRhdefcurOrCreate();
      $this->updateRhdefcurFromRequest();
	  $this->configGridClase();
	  $this->configGridInstructores();
	  
	  $gridcla = Herramientas::CargarDatosGridv2($this,$this->obj);
	  
	  if(count($gridcla[0])>=1)
	  {
	  	foreach($gridcla[0] as $dat)
		{
			if(!$dat->getNumcla())
			{
				$this->coderr=802;
				return false;
			}
			if(!$dat->getFeccla())
			{
				$this->coderr=802;
				return false;
			}
			if($dat->getNumhor()==0)
			{
				$this->coderr=802;
				return false;
			}
			
			if(!$dat->getHorini())
			{
				$this->coderr=802;
				return false;
			}else
			{	
				if(strtotime(strtolower($dat->getHorini()))===false)
				{					
					$this->coderr=803;
					return false;
				}elseif(!(strrpos(strtolower($dat->getHorini()),'am') || strrpos(strtolower($dat->getHorini()),'pm')))
				{
					$this->coderr=804;
					return false;
				}
				
			}
			if(!$dat->getHorfin())
			{
				$this->coderr=802;
				return false;
			}else
			{
				if(strtotime(strtolower($dat->getHorfin()))===false)
				{
					$this->coderr=803;
					return false;
				}elseif(!(strrpos(strtolower($dat->getHorfin()),'am') || strrpos(strtolower($dat->getHorfin()),'pm')))
				{
					$this->coderr=804;
					return false;
				}
			}
		}	  		  	
	  }else
	  {
	  	$this->coderr=801;
	  }
	  
	  $gridinst = Herramientas::CargarDatosGridv2($this,$this->obj2);

	  if(count($gridinst[0])>=1)
	  {
	  	foreach($gridinst[0] as $reg)
		{
			if(!$reg->getCedpro())
			{
				$this->coderr=805;
				return false;
			}
			if(!$reg->getNompro())
			{
				$this->coderr=805;
				return false;
			}			
		}	  	
	  }else
	  {
	  	$this->coderr=806;
		return false;
	  }

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
    $this->configGridClase();
	$this->configGridInstructores();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	$grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	$arreglo=array('codcur');
    H::Guardar_Grid($grid,$arreglo,$clasemodelo);
	$grid2 = Herramientas::CargarDatosGridv2($this,$this->obj2);	
	$arreglo=array('codcur');
    H::Guardar_Grid($grid2,$arreglo,$clasemodelo);
	
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
  	$c = new Criteria();
	$c->add(RhclacurPeer::CODCUR,$clasemodelo->getCodcur());
	RhclacurPeer::doDelete($c);
	
	$c = new Criteria();
	$c->add(RhprocurPeer::CODCUR,$clasemodelo->getCodcur());
	RhprocurPeer::doDelete($c);
	
    return parent::deleting($clasemodelo);
  }


}
