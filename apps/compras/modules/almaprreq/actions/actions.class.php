<?php

/**
 * almaprreq actions.
 *
 * @package    Roraima
 * @subpackage almaprreq
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class almaprreqActions extends autoalmaprreqActions
{

  public function executeIndex()
  {
    return $this->forward('almaprreq', 'edit');
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
  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      $reg = array();
      $this->obj = array();
    }
    	$c = new Criteria();
    	$c->add(CareqartPeer::STAREQ,'A');
        $sql = "((careqart.APRREQ<>'S' and careqart.APRREQ<>'R') or careqart.APRREQ isnull or careqart.APRREQ='D')";
        $c->add(CareqartPeer::APRREQ, $sql, Criteria :: CUSTOM);
    	$c->addAscendingOrderByColumn(CareqartPeer::REQART);
    	$c->addAscendingOrderByColumn(CareqartPeer::FECREQ);
    	$reg = CareqartPeer::doSelect($c);

        $this->careqart->setTotfil(count($reg));

        $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almaprreq/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_careqart');

	    $this->columnas[1][0]->setHTML('onClick="verificar(this.id)"');
	    $this->columnas[1][1]->setHTML('onClick="verificar(this.id)"');
	    $this->columnas[1][2]->setHTML('onClick="verificar(this.id)"');
            $this->columnas[1][3]->setHTML('type="text" size="10" readOnly=true onBlur="javascript:event.keyCode=13; ajaxmostrardetallereq(event,this.id);"');

	    $this->obj =$this->columnas[0]->getConfig($reg);

        $this->careqart->setObj($this->obj);

  }


  
  
  
  /**
   *
   * Función que se ejecuta luego los validadores del negocio (validators)
   * Para realizar validaciones específicas del negocio del formulario
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

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

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
  public function saving($clasemodelo)
  {
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->careqart->getObj());

    $coderr = Articulos::salvarAlmaprreq($clasemodelo,$grid);

    return $coderr;
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
    return parent::deleting($clasemodelo);
  }

  /**
   * FunciÃ³n para procesar _todas_ las funciones Ajax del formulario
   * Cada funciÃ³n esta identificada con el valor de la vista "ajax"
   * el cual traerÃ¡ el indice de lo que se quiere procesar.
   *
   */
  public function executeAjax()
  {
    $codigo = $this->getRequestParameter('codigo','');
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $cajtexcom = $this->getRequestParameter('cajtexcom','');
    $javascript="";
    switch ($ajax){
      case '1':
        $this->formulario=array();
        $this->i="";
        $i=0;
        $form="sf_admin/almaprreq/almdetsolreq";
        $f[$i]=$form.$i;
        $this->getUser()->setAttribute('reqart',$codigo,$f[$i]);
        $this->formulario=$f;
        $this->i=$i;

        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        return sfView::HEADER_ONLY;
        break;
    }
  }


}
