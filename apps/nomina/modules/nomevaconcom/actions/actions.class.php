<?php

/**
 * nomevaconcom actions.
 *
 * @package    siga
 * @subpackage nomevaconcom
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class nomevaconcomActions extends autonomevaconcomActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	$this->configGridValores($this->rhevaconcom->getCodevdo(),$this->rhevaconcom->getCodniv());
  }

  public function configGridValores($codevdo='', $codniv='')
  {	
  
	$c = new Criteria();
	$c->add(RhevaconcomPeer::CODEVDO,$codevdo);
	$c->add(RhevaconcomPeer::CODNIV,$codniv);
    $per = RhevaconcomPeer::doSelect($c);

    // Se crea el objeto principal de la clase OpcionesGrid
    $opciones = new OpcionesGrid();
    // Se configuran las opciones globales del Grid	
	$opciones->setTabla('Rhevaconcom');	
	$opciones->setEliminar(true);
    $opciones->setAnchoGrid(900);
	$opciones->setAncho(850);
	$opciones->setName('a');
	$opciones->setFilas(1);	
    $opciones->setTitulo('Datos de Valores');
    $opciones->setHTMLTotalFilas(' ');
    // Se generan las columnas	
	
    $col1 = new Columna('Código Valores');
    $col1->setTipo(Columna::TEXTO);
    $col1->setEsGrabable(true);
    $col1->setAlineacionObjeto(Columna::CENTRO);
    $col1->setAlineacionContenido(Columna::CENTRO);    
	$col1->setNombreCampo('codvalins');
	$col1->setCatalogo('rhdefvalins','sf_admin_edit_form',array('codvalins' => 1,'desvalins' => 2), 'rhdefvalins_codvalins');
	$col1->setHTML('type="text" size=5 onBlur="toAjax(\'3\',getUrlModulo()+\'ajax\',this.value,\'\',\'&codniv=\'+$(\'rhevaconcom_codniv\').value+\'&idcaja=\'+this.id)"');
   
    $col2 = new Columna('Nombre');
    $col2->setTipo(Columna::TEXTO);
    $col2->setAlineacionObjeto(Columna::CENTRO);
    $col2->setAlineacionContenido(Columna::CENTRO);    
	$col2->setNombreCampo('desvalins');
	$col2->setHTML('type="text" size=50');
	
	$col3 = new Columna('Peso');
    $col3->setTipo(Columna::MONTO);
    $col3->setEsGrabable(true);
    $col3->setAlineacionObjeto(Columna::CENTRO);
    $col3->setAlineacionContenido(Columna::CENTRO);    
	$col3->setNombreCampo('pesval');
	$col3->setHTML('type="text" size=5 readonly="true"');
	
	$col4 = new Columna('Puntuación');
    $col4->setTipo(Columna::MONTO);
    $col4->setEsGrabable(true);
    $col4->setAlineacionObjeto(Columna::CENTRO);
    $col4->setAlineacionContenido(Columna::CENTRO);    
	$col4->setNombreCampo('punval');
	$col4->setHTML('type="text" size=5 onBlur="toAjax(\'4\',getUrlModulo()+\'ajax\',this.value,\'\',\'&porvalins=\'+$(obtenerColumnaAnterior(this.id)).value+\'&maxpun=\'+$(\'rhevaconcom_maxpun\').value+\'&minpun=\'+$(\'rhevaconcom_minpun\').value+\'&idcaja=\'+this.id);"');
	
	$col5 = new Columna('%');
    $col5->setTipo(Columna::TEXTO);
    $col5->setAlineacionObjeto(Columna::CENTRO);
    $col5->setAlineacionContenido(Columna::CENTRO);    
	$col5->setNombreCampo('pesval');
	$col5->setHTML('type="text" readonly="true" size=5 ');
	
    // Se guardan las columnas en el objetos de opciones
    $opciones->addColumna($col1);
    $opciones->addColumna($col2);
	$opciones->addColumna($col3);		
	$opciones->addColumna($col4);
	$opciones->addColumna($col5);		

    // Se genera el arreglo de opciones necesario para generar el grid
    $this->obj = $opciones->getConfig($per);
	$this->rhevaconcom->setObj_valniv($this->obj);

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
			
        $output = '[["rhevaconcom_nomemp","'.$nomemp.'",""],["rhevaconcom_cargoevdo","'.$cargo.'",""],["","",""]]';
        break;
	  case '2':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion		
		$desniv = '';
		$minpun = '';
		$maxpun = '';
		$tipcal = '';
		$c = new Criteria();
		$c->add(RhdefnivPeer::CODNIV,$codigo);
		$per = RhdefnivPeer::doSelectOne($c);
		if($per)
		{
			$desniv = $per->getDesniv();
			$minpun = $per->getMinpun();
			$maxpun = $per->getMaxpun();
			$tipcal = $per->getTipcal();
		}			
        $output = '[["rhevaconcom_desniv","'.$desniv.'",""],["rhevaconcom_minpun","'.$minpun.'",""],["rhevaconcom_maxpun","'.$maxpun.'",""],
					["rhevaconcom_tipcal","'.$tipcal.'",""]]';
        break;	
	  case '3':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion				
		$idcaja = $this->getRequestParameter('idcaja','');
		$codniv = $this->getRequestParameter('codniv','');
		$auxid= split("_", $idcaja);
		$c = new Criteria();
		$c->add(RhvalnivPeer::CODNIV,$codniv);
		$c->add(RhvalnivPeer::CODVALINS,$codigo);
		$per = RhvalnivPeer::doSelectOne($c);		
		
		if($per)
		{
			$dato='';
			$c = new Criteria();
			$c->add(RhdefvalinsPeer::CODVALINS,$codigo);
			$per2 = RhdefvalinsPeer::doSelectOne($c);
			if($per2)
				$dato=$per2->getDesvalins();
		
			$output = '[["'.$auxid[0].'_'.$auxid[1].'_3","'.$per->getPorvalins().'",""],["'.$auxid[0].'_'.$auxid[1].'_2","'.$dato.'",""]]';
		}else		
			$output = '[["","",""],["","",""],["","",""]]';			
        break;
	  case '4':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion				
		$idcaja = $this->getRequestParameter('idcaja','');
		$minpun = $this->getRequestParameter('minpun','');
		$maxpun = $this->getRequestParameter('maxpun','');
		$porvalins = $this->getRequestParameter('porvalins','');
		$auxid= split("_", $idcaja);
		
		$valor=0;			
		if($codigo>=$minpun && $codigo<=$maxpun)
		{
			$valor=floatval($codigo)*floatval($porvalins);
		}
		$output = '[["'.$auxid[0].'_'.$auxid[1].'_5","'.$valor.'",""],["","",""]]';			
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
	  $this->rhevaconcom = $this->getRhevaconcomOrCreate();
	  $this->updateRhevaconcomFromRequest();
	  $this->configGridValores();
	  
	  if($this->rhevaconcom->getCodemp())
	  {
	  	
	  }
	  
	  $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	  
	  if(count($grid[0])>0)
	  {
	  	foreach($grid[0] as $reg)
		{
			if(!$reg->getCodvalins())
			{
				$this->coderr=819;
			    return false;
			}
			if(!$reg->getPunval())
			{
				$this->coderr=819;
			    return false;
			}
		}
	  }else
	  {
	  	 $this->coderr=818;
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
    //$this->configGrid();

    $this->configGridValores();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
	$arreglo=array('Codevdo','Codniv','Feceval');
	H::Guardar_Grid($grid,$arreglo,$clasemodelo);
    return '-1';
  }

  public function deleting($clasemodelo)
  {
  	$c = new Criteria();
	$c->add(RhevaconcomPeer::CODEVDO,$clasemodelo->getCodevdo());
	RhevaconcomPeer::doDelete($c);
	
    return '-1';
  }


}
