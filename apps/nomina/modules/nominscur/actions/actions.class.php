<?php

/**
 * nominscur actions.
 *
 * @package    siga
 * @subpackage nominscur
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nominscurActions extends autonominscurActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->rhinscur = $this->getRhinscurOrCreate();
	if($this->rhinscur->getId()!='')
	{
		$this->configGridPersonal($this->rhinscur->getCodcur());	
	}else
	{
		$this->configGridPersonal();
	}
  }

  public function configGridPersonal($codcur='')
  {
    
	$c = new Criteria();
	$c->add(RhinscurPeer::CODCUR,$codcur);
    $per = RhinscurPeer::doSelect($c);
    
    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid
    $opciones->setEliminar(true);
    $opciones->setTabla('Rhinscur');
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(1300);
	$opciones->setName('a');
	$opciones->setFilas(1);	
    $opciones->setTitulo('Personal Inscrito');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas
    $col1 = new Columna('Código Empleado');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);    
	$col1->setNombreCampo('codemp');
	$col1->setCatalogo('nphojint','sf_admin_edit_form',array('codemp' => 1,'nomemp' => 2), 'Oycregsol_nphojint');
	$col1->setHTML('type="text" size="10" maxlength="16" onBlur="toAjax(\'2\',getUrlModulo()+\'ajax\',this.value,\'\',\'&idcaja=\'+this.id)"');

    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::IZQUIERDA);
    $col2->setAlineacionContenido(Columna::IZQUIERDA);
    $col2->setNombreCampo('nomemp');
    $col2->setHTML('type="text" size="40" readonly="true"');
	
	$col3 = new Columna('Código del Cargo');
    $col3->setTipo(Columna::TEXTO);
	$col3->setEsGrabable(true);
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
	
	$col5 = new Columna('Fecha Inscripción');
    $col5->setTipo(Columna::FECHA);
	$col5->setEsGrabable(true);
	$col5->setVacia(true);
    $col5->setAlineacionObjeto(Columna::IZQUIERDA);
    $col5->setAlineacionContenido(Columna::IZQUIERDA);
    $col5->setNombreCampo('fecins');
    $col5->setHTML('type="text" size="20"  ');
	
	$col6 = new Columna('Tipo');
    $col6->setTipo(Columna::COMBO);
	$col6->setCombo(array('I'=>'INTERNO','E'=>'EXTERNO'));
	$col6->setEsGrabable(true);
    $col6->setAlineacionObjeto(Columna::IZQUIERDA);
    $col6->setAlineacionContenido(Columna::IZQUIERDA);
    $col6->setNombreCampo('tipper');
    $col6->setHTML('type="text"  ');

    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);	
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);
	$opciones->addColumna($col6);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
	$this->rhinscur->setObj_percur($this->obj);

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
		$c = new Criteria();
		$c->add(RhdefcurPeer::CODCUR,$codigo);
		$per = RhdefcurPeer::doSelectOne($c);
		if($per)
		{
			$turno = $per->getTurcur()=='D' ? 'Diurno' : 'Nocturno';
			$output = '[["rhinscur_descur","'.$per->getDescur().'",""],["rhinscur_fecini","'.date('d/m/Y',strtotime($per->getFecini())).'",""],["rhinscur_fecfin","'.date('d/m/Y',strtotime($per->getFecfin())).'",""],
		            	["rhinscur_durcur","'.H::FormatoMonto($per->getDurcur()).'",""],["rhinscur_turcur","'.$turno.'",""]]';
		}        	
		else			
			$output = '[["","",""],["","",""],["","",""]]';			
        break;
	  case '2':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
		$idcaja = $this->getRequestParameter('idcaja','');
		$auxid= split("_", $idcaja);
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,$codigo);
		$per = NpasicarempPeer::doSelectOne($c);
		if($per)
		{
			$output = '[["'.$auxid[0].'_'.$auxid[1].'_3","'.$per->getCodcar().'",""],["'.$auxid[0].'_'.$auxid[1].'_4","'.$per->getNomcar().'",""],["","",""]]';			
		}else		
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
	  
	  $this->rhinscur = $this->getRhinscurOrCreate();
      $this->updateRhinscurFromRequest();
	  $this->configGridPersonal();	  
	  
	  $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  
	  if(count($grid[0])>=1)
	  {
	  	foreach($grid[0] as $dat)
		{
			if(!$dat->getCodemp())
			{
				$this->coderr=807;
				return false;
			}
			if(!$dat->getCodcar())
			{
				$this->coderr=807;
				return false;
			}
			if(!$dat->getFecins())
			{
				$this->coderr=807;
				return false;
			}
			if(!$dat->getTipper())
			{
				$this->coderr=807;
				return false;
			}
		}	  		  	
	  }else
	  {
	  	$this->coderr=808;
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
    $this->configGridPersonal();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    //$this->configGrid($grid[0],$grid[1]);
  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	$arreglo=array('Codcur');
  	H::Guardar_Grid($grid,$arreglo,$clasemodelo);
    return '-1';
    #return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
  	$c = new Criteria();
	$c->add(RhasicurPeer::CODCUR,$clasemodelo->getCodcur());
	$per = RhasicurPeer::doSelectOne($c);
	if($per)
	{
		return '809';
	}else	
	{
		$c = new Criteria();
		$c->add(RhinscurPeer::CODCUR,$clasemodelo->getCodcur());
		RhinscurPeer::doDelete($c);
		return '-1';
	} 	
    
  }


}
