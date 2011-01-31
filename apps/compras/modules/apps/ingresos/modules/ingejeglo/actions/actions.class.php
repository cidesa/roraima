<?php

/**
 * ingejeglo actions.
 *
 * @package    Roraima
 * @subpackage ingejeglo
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:actions.class.php 32380 2009-09-01 17:11:59Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class ingejegloActions extends autoingejegloActions
{
	
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cideftit/filters');


     // 15    // pager
    $this->pager = new sfPropelPager('Cideftit', 15);
    $c = new Criteria();
		$this->sql = "length(cideftit.codpre) = length(cidefniv.forpre)";
		$c->add(CidefnivPeer :: FORPRE, $this->sql, Criteria :: CUSTOM);    
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
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
    $this->configGrid($this->cideftit->getCodpre());
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid($codpre,$perpre='00',$reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
      $this->grid = array();

    }
     $anopre = substr(Herramientas::getX_vacio('codemp','cidefniv','fecper','001'),0,4);
     $sql = "SELECT coalesce(sum(monAsi),0) as monasi,Sum(MonPrc) as monprc,Sum(MonAju) as monAju,
            coalesce(Sum(MonTra),0) as montra,Sum(MonTrn) as montrn,
            coalesce(Sum(MonAdi),0) as monadi,Sum(MonDim) as mondim,Sum(MonDis) as mondis, '' as id
            From CIASIINI
            where
            codpre='".$codpre."' and
            perpre='".$perpre."' and
            anopre='".$anopre."' ";


    Herramientas :: BuscarDatos($sql, & $reg);
      $array_cod[0]["movimiento"] = 'Estimado';
      $array_cod[0]["montos"] = H::formatoMonto($reg[0]["monasi"]);
      $array_cod[0]["porc"] = self::CalcularPorcentaje($reg[0]["monasi"],$reg[0]["monasi"]);
      $array_cod[0]["id"] = '';

      $array_cod[1]["movimiento"] = 'Ajustado';
      $array_cod[1]["montos"] = H::formatoMonto($reg[0]["monaju"]);
      $array_cod[1]["porc"] = self::CalcularPorcentaje($reg[0]["monaju"],$reg[0]["monasi"]);
      $array_cod[1]["id"] = '';

      $array_cod[2]["movimiento"] = 'Ejecutado';
      $array_cod[2]["montos"] = H::formatoMonto($reg[0]["monprc"]);
      $array_cod[2]["porc"] = self::CalcularPorcentaje($reg[0]["monprc"],$reg[0]["monasi"]);
      $array_cod[2]["id"] = '';

      $array_cod[3]["movimiento"] = 'Traslado(+)';
      $array_cod[3]["montos"] = H::formatoMonto($reg[0]["montra"]);
      $array_cod[3]["porc"] = self::CalcularPorcentaje($reg[0]["montra"],$reg[0]["monasi"]);
      $array_cod[3]["id"] = '';

      $array_cod[4]["movimiento"] = 'Traslado(-)';
      $array_cod[4]["montos"] = H::formatoMonto($reg[0]["montrn"]);
      $array_cod[4]["porc"] = self::CalcularPorcentaje($reg[0]["montrn"],$reg[0]["monasi"]);
      $array_cod[4]["id"] = '';

      $array_cod[5]["movimiento"] = 'Aumento';
      $array_cod[5]["montos"] = H::formatoMonto($reg[0]["monadi"]);
      $array_cod[5]["porc"] = self::CalcularPorcentaje($reg[0]["monadi"],$reg[0]["monasi"]);
      $array_cod[5]["id"] = '';

      $array_cod[6]["movimiento"] = 'Disminuciones';
      $array_cod[6]["montos"] = H::formatoMonto($reg[0]["mondim"]);
      $array_cod[6]["porc"] = self::CalcularPorcentaje($reg[0]["mondim"],$reg[0]["monasi"]);
      $array_cod[6]["id"] = '';

      $array_cod[7]["movimiento"] = '';
      $array_cod[7]["montos"] = '';
      $array_cod[7]["porc"] = '';
      $array_cod[7]["id"] = '';

      $array_cod[8]["movimiento"] = 'Recaudar';
      $array_cod[8]["montos"] = H::formatoMonto($reg[0]["mondis"]);
      $array_cod[8]["porc"] = self::CalcularPorcentaje($reg[0]["mondis"],$reg[0]["monasi"]);
      $array_cod[8]["id"] = '';

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/ingejeglo/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

     $this->grid = $this->columnas[0]->getConfig($array_cod);
     $this->cideftit->setGrid($this->grid);


  }

  public function CalcularPorcentaje($monto1,$monto2,$signo='%')
  {
    $monto = 0;
    if (($monto1!=0) and ($monto1!=0))
    {
      if($monto2>0) $monto = (( $monto1 * 100) / $monto2);
      else $monto = (( $monto1 * 100));
    }
    return H::FormatoMonto($monto).$signo;
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
    $ajax = $this->getRequestParameter('ajax','');
    $cajtexmos = $this->getRequestParameter('cajtexmos','');
    $codpre = $this->getRequestParameter('codpre','');

    switch ($ajax){
      case '1':
         $this->cideftit = $this->getCideftitOrCreate();
         $this->updateCideftitFromRequest();

        $this->configGrid($codpre,$codigo);

        $output = '[["","",""],["","",""],["","",""]]';
        $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
        break;

      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    //$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
   // return sfView::HEADER_ONLY;

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
    return parent::saving($clasemodelo);
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


}
