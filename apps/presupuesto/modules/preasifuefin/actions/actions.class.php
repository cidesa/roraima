<?php

/**
 * preasifuefin actions.
 *
 * @package    siga
 * @subpackage preasifuefin
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class preasifuefinActions extends autopreasifuefinActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }


  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cpasiini/filters');

     // 10    // pager
    $this->pager = new sfPropelPager('Cpasiini', 10);
    $c = new Criteria();
    $c->add(CpasiiniPeer::PERPRE,'00');
    $c1 = $c->getNewCriterion(CpasiiniPeer::MONASI,'0',Criteria::GREATER_THAN);
    $c2 = $c->getNewCriterion(CpasiiniPeer::MONADI,'0',Criteria::GREATER_THAN);
    $c1->addOr($c2);
    $c->add($c1);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }


  public function configGrid($reg = array(),$regelim = array())
  {
    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }
	 $c = new Criteria();
	 $per = FortipfinPeer::doSelect($c);

	 foreach ($per as $reg)
	 {
	   $reg->setCodpre($this->cpasiini->getCodpre());
	 }

	 $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/preasifuefin/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_fuefin');

	 $this->obj = $this->columnas[0]->getConfig($per);

	 $this->cpasiini->setObj($this->obj);
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


  public function validateEdit()
  {
    $this->coderr =-1;

    // Se deben llamar a las funciones necesarias para cargar los
    // datos de la vista que serán usados en las funciones de validación.
    // Por ejemplo:

    if($this->getRequest()->getMethod() == sfRequest::POST){
	   $this->cpasiini = $this->getCpasiiniOrCreate();
	   $this->updateCpasiiniFromRequest();

       $this->configGrid();
       $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      // Aqui van los llamados a los métodos de las clases del
      // negocio para validar los datos.
      // Los resultados de cada llamado deben ser analizados por ejemplo:

       $this->coderr = Presupuesto::validarPreasifuefin($this->cpasiini,$grid);

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

  }

  public function saving($clasemodelo)
  {
	try{
        $grid = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObj());
		return Presupuesto::SalvarPreAsiFueFin($clasemodelo,$grid);

	} catch (Exception $ex){
		return 0;
	}
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
