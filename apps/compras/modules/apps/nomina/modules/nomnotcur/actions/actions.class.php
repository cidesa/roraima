<?php

/**
 * nomnotcur actions.
 *
 * @package    siga
 * @subpackage nomnotcur
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomnotcurActions extends autonomnotcurActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->configGridPersonal($this->rhnotcur->getCodcur(),$this->rhnotcur->getId());		
  }

  public function configGridPersonal($codcur='',$id='')
  {
    
	if(!$id)
	{
		$c = new Criteria();
		$c->add(RhinscurPeer::CODCUR,$codcur);
	    $per = RhinscurPeer::doSelect($c);	
	}else
	{
		$c = new Criteria();
		$c->add(RhnotcurPeer::CODCUR,$codcur);
	    $per = RhnotcurPeer::doSelect($c);
	}

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
	if(!$id)
    	$opciones->setTabla('Rhinscur');
	else
		$opciones->setTabla('Rhnotcur');	
	$opciones->setEliminar(false);
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(1300);
	$opciones->setName('a');
	$opciones->setFilas(0);	
    $opciones->setTitulo('Personal Inscrito');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas	
	
    $col1 = new Columna('Código Empleado');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);    
	$col1->setNombreCampo('codemp');
	$col1->setHTML('type="text" size="10" readonly="true" ');

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomemp');
    $col2->setHTML('type="text" size="40" readonly="true"');
	
	$col3 = new Columna('Código del Cargo');
    $col3->setTipo(Columna::TEXTO);	
    $col3->setAlineacionObjeto(Columna::IZQUIERDA);
    $col3->setAlineacionContenido(Columna::IZQUIERDA);
    $col3->setNombreCampo('codcar');
    $col3->setHTML('type="text" size="10" readonly="true"');	
	
	$col4 = new Columna('Nombre');
    $col4->setTipo(Columna::TEXTO);	
    $col4->setAlineacionObjeto(Columna::IZQUIERDA);
    $col4->setAlineacionContenido(Columna::IZQUIERDA);
    $col4->setNombreCampo('nomcar');
    $col4->setHTML('type="text" size="40" readonly="true" ');
	
	$col5 = new Columna('Nota');
    $col5->setTipo(Columna::MONTO);	
    $col5->setEsGrabable(true);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setNombreCampo('notcur');
    $col5->setHTML('type="text" size="20" onBlur="ValidarMontoGridv2(this);ValidarNota(this)"');
	
	$col6 = new Columna('Aprobó');
    $col6->setTipo(Columna::CHECK);	
    $col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
	$col6->setNombreCampo('aprcur');
    $col6->setHTML(' disabled="true"');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);	
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
	$opciones->addColumna($col6);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
	$this->rhnotcur->setObj_percur($this->obj);

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
        $this->rhnotcur = $this->getRhnotcurOrCreate();
		$this->configGridPersonal($codigo);
        $c = new Criteria();
		$c->add(RhdefcurPeer::CODCUR,$codigo);
		$per = RhdefcurPeer::doSelectOne($c);
		if($per)
		{
			$turno = $per->getTurcur()=='D' ? 'Diurno' : 'Nocturno';
			$output = '[["rhnotcur_descur","'.$per->getDescur().'",""],["rhnotcur_fecini","'.date('d/m/Y',strtotime($per->getFecini())).'",""],["rhnotcur_fecfin","'.date('d/m/Y',strtotime($per->getFecfin())).'",""],
		            	["rhnotcur_durcur","'.H::FormatoMonto($per->getDurcur()).'",""],["rhnotcur_turcur","'.$turno.'",""],["rhnotcur_notapr","'.H::FormatoMonto($per->getNotapr()).'",""]]';
		}        	
		else			
			$output = '[["","",""],["","",""],["","",""]]';			
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    #return sfView::HEADER_ONLY;

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
	  
	  $this->rhnotcur = $this->getRhnotcurOrCreate();
      $this->updateRhnotcurFromRequest();
      $this->configGridPersonal($this->rhnotcur->getCodcur(),$this->rhnotcur->getId());	
	  
	  $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  
	  if(count($grid[0])<1)
	  {
	  	$this->coderr=811;
		return false;
	  }else
	  {
	  	$sw=false;
	  	foreach($grid[0] as $dat)
		{
			if(!$dat->getCodemp())
			{
				$this->coderr=812;
				return false;
			}
			if(!$dat->getNotcur() || intval($dat->getNotcur())==0)
			{
				$this->coderr=812;
				return false;		
			}
		}		
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
    $this->configGridPersonal($this->rhnotcur->getCodcur(),$this->rhnotcur->getId());	
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	
	if($clasemodelo->getId())
	{
		$grid = Herramientas::CargarDatosGridv2($this,$this->obj);	
		foreach($grid[0] as $reg)
		{  
		    $reg->setCodcur($clasemodelo->getCodcur());
			if($reg->getNotcur()>=$clasemodelo->getNotapr())
				$reg->setAprcur(1);
			else
				$reg->setAprcur(null);
			$reg->save();
		}
	}else
	{
		$c = new Criteria();
		$c->add(RhnotcurPeer::CODCUR,$clasemodelo->getCodcur());
		RhnotcurPeer::doDelete($c);
		
		foreach($grid[0] as $dat)
		{		
			$rhnotcur = new Rhnotcur();
			$rhnotcur->setCodcur($clasemodelo->getCodcur());
			$rhnotcur->setCodemp($dat->getCodemp());	
			$rhnotcur->setNotcur($dat->getNotcur());					
			if($dat->getNotcur()>=$clasemodelo->getNotapr())
				$rhnotcur->setAprcur(1);
			else
				$rhnotcur->setAprcur(null);
			$rhnotcur->save();				
		}			
	}
    return '-1';
  }

  public function deleting($clasemodelo)
  {
    return '-1';
  }


}
