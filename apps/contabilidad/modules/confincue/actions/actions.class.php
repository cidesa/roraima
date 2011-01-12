<?php

/**
 * confincue actions.
 *
 * @package    Roraima
 * @subpackage confincue
 * @author     $Author: atong $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: actions.class.php 39329 2010-07-07 13:17:39Z atong $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class confincueActions extends autoconfincueActions
{
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
	$err = Contabilidad::validarDefiniciones();
	if ($err!=-1) {
		$err = Herramientas::obtenerMensajeError($err);
       	$this->getRequest()->setError('',$err);
	}
	$this->configGrid();
    $this->setVars();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($reg = array(),$regelim = array()) {
	$this->params=array();

	if ($this->contabb->getId()!='') {
   	 $contaba = ContabaPeer::doSelectOne(new Criteria());

   	 $c = new Criteria();
         $c->add(Contabb1Peer::CODCTA,$this->contabb->getCodcta());
         //$c->add(Contabb1Peer::CODCTA,$this->contabb->getCodcta().'_',Criteria::LIKE);
         //$c->add(Contabb1Peer::CODCTA,$this->contabb->getCodcta().'-__',Criteria::LIKE);
         $c->add(Contabb1Peer::FECINI,$contaba->getFecini());
         $c->add(Contabb1Peer::FECCIE,$contaba->getFeccie());
	 $c->addAscendingOrderByColumn(Contabb1Peer::PEREJE);
         $reg = Contabb1Peer::doSelect($c);
   } else {
   	 $sql="select MAX(PEREJE) as pereje from Contaba1";
   	 if (Herramientas::BuscarDatos($sql,&$numper))
   	 {
       for($i=0;$i<$numper[0]["pereje"];$i++)
       {
	     $reg[$i]["id"]="";
	     $reg[$i]["pereje"]=str_pad((string)($i+1),2,"0",STR_PAD_LEFT);
       	}


     }
   }
   $reg1[0]["id"]="";
   $reg1[0]["pereje"]="";
   $reg1[0]["totdeb"]="";
   $reg1[0]["totcre"]="";
   $reg1[0]["salper"]="";
   //
   
   $c2 = new Criteria();
   $c2->add(Contabb1Peer::CODCTA,$this->contabb->getCodcta().'-_',Criteria::LIKE);
   $c2->add(Contabb1Peer::CODCTA,$this->contabb->getCodcta().'-__',Criteria::LIKE);
   $saldos = Contabb1Peer::doSelect($c2);

   if ($saldos){
       $acum = 0;
       foreach ($saldos as $saldo){
            $acum += $saldo->getSalact();
       }
   }else{
       $c = new Criteria();
       $c->add(Contabb1Peer::CODCTA,$this->contabb->getCodcta());
       $saldos = Contabb1Peer::doSelect($c);

       $acum = 0;
       foreach ($saldos as $saldo){
            $acum += $saldo->getSalact();
       }
   }
    $reg1[0]["salact"]=H::formatoMonto($acum);

   $reg1[0]["salacu"]="";
   $datos = array_merge($reg1, $reg);

   $this->obj = H::getConfigGrid($this->contabb->getId()=='' ? 'grid_contabb1_create' : 'grid_contabb1_edit',$datos);

   $this->params['grid'] = $this->obj;
  }

  /**
   * Función para procesar _todas_ las funciones Ajax del formulario
   * Cada función esta identificada con el valor de la vista "ajax"
   * el cual traerá el indice de lo que se quiere procesar.
   *
   */
  public function executeAjaxfila()
  {

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
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
   * Para mayor información vease http://www.symfony-project.org/book/1_0/06-Inside-the-Controller-Layer#chapter_06_validation_and_error_handling_methods
   *
   */
  public function validateEdit() {
    $this->coderr =-1;

	if($this->getRequest()->getMethod() == sfRequest::POST) {
	  $this->coderr = Contabilidad::validarDefiniciones();
      if ($this->coderr==-1) {
      	$this->contabb = $this->getContabbOrCreate();
    	$this->updateContabbFromRequest();
    	$this->coderr = Contabilidad::validarConfincue($this->contabb);
      }
	  if($this->coderr!=-1) {
	    return false;
	  } else return true;

      } else return true;
	}

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   */
  public function updateError(){
    $this->configGrid();
    //$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    //$this->configGrid($grid[0],$grid[1]);
    $this->setVars();
  }

  public function setVars() {
	$contaba = ContabaPeer::doSelectOne(new Criteria());

	$this->params[0] = $contaba->getForcta();
	$this->params[1] = strlen($contaba->getForcta());
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de guardar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function saving($clasemodelo) {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    return Contabilidad::salvarConfincue($clasemodelo,$grid);
  }

  /**
   * Función para colocar el codigo necesario para
   * el proceso de eliminar.
   * Esta función debe retornar un valor igual a -1 si no hubo
   * Inconvenientes al guardar, y != de -1 si existe algún error.
   * Si es diferente de -1 el valor devuelto debe ser un código de error
   * Válido que exista en el archivo config/errores.yml
   *
   */
  public function deleting($clasemodelo)
  {
  	$grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    return Contabilidad::eliminarConfincue($clasemodelo,$grid);
  }

}
