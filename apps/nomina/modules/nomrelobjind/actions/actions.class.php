<?php

/**
 * nomrelobjind actions.
 *
 * @package    siga
 * @subpackage nomrelobjind
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomrelobjindActions extends autonomrelobjindActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGridObjetivos($this->rhrelobjind->getCodevdo(),$this->rhrelobjind->getCodniv());
  }

  public function configGridObjetivos($codevdo='', $codniv='')
  {	
  
	$c = new Criteria();
	$c->add(RhrelobjindPeer::CODEVDO,$codevdo);
	$c->add(RhrelobjindPeer::CODNIV,$codniv);
    $per = RhrelobjindPeer::doSelect($c);

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid	
	$opciones->setTabla('Rhrelobjind');	
	$opciones->setEliminar(true);
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(1200);
	$opciones->setName('a');
	$opciones->setFilas(1);	
    $opciones->setTitulo('Datos de Objetivos');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas	
	
    $col1 = new Columna('Código Objetivo');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);    
	$col1->setNombreCampo('codobj');
	$col1->setCatalogo('rhdefobj','sf_admin_edit_form',array('codobj' => 1,'desobj' => 2), 'rhdefobj_codobj');
	$col1->setHTML('type="text" size=13 ');
   
    $col2 = new Columna('Descripción');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);    
	$col2->setNombreCampo('desobj');
	$col2->setHTML('type="text" size=50 readonly="true"');
	
	$col3 = new Columna('Código Indicador');
    $col3->setTipo(Columna::TEXTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);    
	$col3->setNombreCampo('codind');
	$col3->setCatalogo('rhdefind','sf_admin_edit_form',array('codind' => 3,'desind' => 4), 'rhdefind_codind');
	$col3->setHTML('type="text" size=13 onBlur="toAjax(\'3\',getUrlModulo()+\'ajax\',this.value,\'\',\'&codniv=\'+$(\'rhrelobjind_codniv\').value+\'&idcaja=\'+this.id);"');
   
    $col4 = new Columna('Descripción');
    $col4->setTipo(Columna::TEXTO);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);    
	$col4->setNombreCampo('desind');
	$col4->setHTML('type="text" size=50 readonly="true"');
	
	$col5 = new Columna('Peso');
	$col5->setEsGrabable(true);
    $col5->setTipo(Columna::MONTO);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);    
	$col5->setNombreCampo('pesobj');
	$col5->setHTML('type="text"  size=5 ');
	
	$col6 = new Columna('Planificado');
	$col6->setEsGrabable(true);
    $col6->setTipo(Columna::MONTO);
    $col6->setAlineacionObjeto(Columna::CENTRO);
    $col6->setAlineacionContenido(Columna::CENTRO);    
	$col6->setNombreCampo('plaobj');
	$col6->setHTML('type="text"  size=5 onBlur="toAjax(\'4\',getUrlModulo()+\'ajax\',this.value,\'\',\'&porind=\'+$(obtenerColumnaAnterior(this.id)).value+\'&idcaja=\'+this.id);"');
	
    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);		
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);		
	$opciones->addColumna($col6);

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
	$this->rhrelobjind->setObj_objind($this->obj);

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
        $cargo='';
		$nomemp='';
		$c = new Criteria();
		$c->add(NpasicarempPeer::CODEMP,$codigo);
		$c->add(NpasicarempPeer::STATUS,'V');
		$per = NpasicarempPeer::doSelectOne($c);
		if($per)
		{
			$cargo = $per->getCodcar().'  '.$per->getNomcar();
			$nomemp = $per->getNomemp();
		}
			
        $output = '[["rhrelobjind_nomemp","'.$nomemp.'",""],["rhrelobjind_cargoevdo","'.$cargo.'",""],["","",""]]';
        break;
	  case '2':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion		
		$desniv = '';		
		$c = new Criteria();
		$c->add(RhdefnivPeer::CODNIV,$codigo);
		$per = RhdefnivPeer::doSelectOne($c);
		if($per)
		{
			$desniv = $per->getDesniv();			
		}			
        $output = '[["rhrelobjind_desniv","'.$desniv.'",""],["","",""],["","",""]]';
        break;	
	  case '3':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion				
		$idcaja = $this->getRequestParameter('idcaja','');		
		$codniv = $this->getRequestParameter('codniv','');
		$auxid= split("_", $idcaja);		
	
		$c = new Criteria();
		$c->add(RhindnivPeer::CODNIV,$codniv);
		$per = RhindnivPeer::doSelectOne($c);
		$porind='';
		if($per)
		{
			$porind = $per->getPorind();			
		}
		
		$output = '[["'.$auxid[0].'_'.$auxid[1].'_5","'.$porind.'",""],["","",""]]';			
        break;
	  case '4':	
		
		$idcaja = $this->getRequestParameter('idcaja','');		
		$porind = $this->getRequestParameter('porind','');
		$js='';
		
		if($codigo>$porind)
		{
			$js.="$('$idcaja').value='';
			      alert('Lo planificado no puede ser mayor que el Peso');";
		}
		$output = '[["javascript","'.$js.'",""],["","",""],["","",""]]';
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
	  
	  $this->rhrelobjind = $this->getRhrelobjindOrCreate();
	  $this->updateRhrelobjindFromRequest();
	  $this->configGridObjetivos();
	  
	  if($this->rhrelobjind->getCodemp())
	  {
	  	
	  }
	  
	  $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  
	  if(count($grid[0])>0)
	  {
	  	foreach($grid[0] as $reg)
		{
			if(!$reg->getCodobj())
			{
				$this->coderr=822;
			    return false;
			}
			if(!$reg->getCodind())
			{
				$this->coderr=822;
			    return false;
			}
			if(!$reg->getPlaobj())
			{
				$this->coderr=822;
			    return false;
			}
		}
	  }else
	  {
	  	 $this->coderr=823;
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
    $this->configGridObjetivos();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	$arreglo=array('Codevdo','Codniv');
	H::Guardar_Grid($grid,$arreglo,$clasemodelo);
    return '-1';
  }

  public function deleting($clasemodelo)
  {
    $c = new Criteria();
	$c->add(RhrelobjindPeer::CODEVDO,$clasemodelo->getCodevdo());
	RhrelobjindPeer::doDelete($c);
	
    return '-1';
  }


}
