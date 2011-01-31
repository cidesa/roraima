<?php

/**
 * Facdesliq actions.
 *
 * @package    Roraima
 * @subpackage Facdesliq
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class FacdesliqActions extends autoFacdesliqActions
{

  /**
   * Actualiza la informacion que viene de la vista 
   * luego de un get/post en el objeto principal del modelo base del formulario.
   *
   */
  protected function updateFcdefdescFromRequest()
  {
    $fcdefdesc = $this->getRequestParameter('fcdefdesc');

    if (isset($fcdefdesc['coddes']))
    {
      $this->fcdefdesc->setCoddes($fcdefdesc['coddes']);
    }
    if (isset($fcdefdesc['nomdes']))
    {
      $this->fcdefdesc->setNomdes($fcdefdesc['nomdes']);
    }
    if (isset($fcdefdesc['tipo']))
    {
      $this->fcdefdesc->setTipo($fcdefdesc['tipo']);
    }

    if (isset($fcdefdesc['auto'])) $this->fcdefdesc->setAuto("S");
    else  $this->fcdefdesc->setAuto("N");

    if (isset($fcdefdesc['limita'])) $this->fcdefdesc->setLimita("S");
    else  $this->fcdefdesc->setLimita("N");

    if (isset($fcdefdesc['anoact'])) $this->fcdefdesc->setAnoact("S");
    else  $this->fcdefdesc->setAnoact("N");

    if (isset($fcdefdesc['modo']))
    {
      $this->fcdefdesc->setModo($fcdefdesc['modo']);
    }
    if (isset($fcdefdesc['grid']))
    {
      $this->fcdefdesc->setGrid($fcdefdesc['grid']);
    }
    if (isset($fcdefdesc['gridb']))
    {
      $this->fcdefdesc->setGridb($fcdefdesc['gridb']);
    }

    if (isset($fcdefdesc['coddes']))
    {
      $this->fcdefdesc->setCoddes($fcdefdesc['coddes']);
    }
    if (isset($fcdefdesc['nomdes']))
    {
      $this->fcdefdesc->setNomdes($fcdefdesc['nomdes']);
    }
    if (isset($fcdefdesc['codfue']))
    {
      $this->fcdefdesc->setCodfue($fcdefdesc['codfue']);
    }
    if (isset($fcdefdesc['tipo']))
    {
      $this->fcdefdesc->setTipo($fcdefdesc['tipo']);
    }
    if (isset($fcdefdesc['modo']))
    {
      $this->fcdefdesc->setModo($fcdefdesc['modo']);
    }

    if (isset($fcdefdesc['coddes']))
    {
      $this->fcdefdesc->setCoddes($fcdefdesc['coddes']);
    }
    if (isset($fcdefdesc['nomdes']))
    {
      $this->fcdefdesc->setNomdes($fcdefdesc['nomdes']);
    }
    if (isset($fcdefdesc['codfue']))
    {
      $this->fcdefdesc->setCodfue($fcdefdesc['codfue']);
    }
    if (isset($fcdefdesc['tipo']))
    {
      $this->fcdefdesc->setTipo($fcdefdesc['tipo']);
    }
    if (isset($fcdefdesc['modo']))
    {
      $this->fcdefdesc->setModo($fcdefdesc['modo']);
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
      $this->configGridb();
	  if ($this->fcdefdesc->getAuto()=="N")
      {
        $this->fcdefdesc->setAuto("");
      }
	  if ($this->fcdefdesc->getLimita()=="N")
      {
        $this->fcdefdesc->setLimita("");
      }
	  if ($this->fcdefdesc->getAnoact()=="N")
      {
        $this->fcdefdesc->setAnoact("");
      }
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
  public function deleting($fcdefdesc)
  {
   if ($fcdefdesc->getId()!="")
   {
	$c = new Criteria();
	$c->add(FcrangosdesPeer::CODDES,$fcdefdesc->getCoddes());
	FcrangosdesPeer::doDelete($c);
	$c = new Criteria();
	$c->add(FcdefrecdesPeer::CODDES,$fcdefdesc->getCoddes());
	FcdefrecdesPeer::doDelete($c);
    $fcdefdesc->delete();
    return -1;
   }
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
    $c = new Criteria();
    $c->add(FcrangosdesPeer::CODDES,$this->fcdefdesc->getCoddes());
    $per = FcrangosdesPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facdesliq/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcdefdesc->setGrid($this->grid);
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridb($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcdefrecdesPeer::CODDES,$this->fcdefdesc->getCoddes());
    $per = FcdefrecdesPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facdesliq/'.sfConfig::get('sf_app_module_config_dir_name').'/gridb');
	$this->columnas[1][0]->setCatalogo('Carecaud','sf_admin_edit_form', array('codrec'=>'1','desrec'=>'2'), 'Fcdefdesc_carecaud');
    $this->gridb = $this->columnas[0]->getConfig($per);
    $this->fcdefdesc->setGridb($this->gridb);
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
    $this->configGrid();
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->configGrid($grid[0],$grid[1]);
    $this->configGridb();
    $gridb = Herramientas::CargarDatosGridv2($this,$this->obj);
    $this->configGridb($gridb[0],$gridb[1]);
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
  public function saving($fcdefdesc)
  {
    $fcdefdesc->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $gridb = Herramientas::CargarDatosGridv2($this,$this->gridb);
    Hacienda::salvar_grid_DefDesc($fcdefdesc, $grid);
	Hacienda::salvar_grid_Fcdefrecdes($fcdefdesc, $gridb);
    return -1;
  }


}
