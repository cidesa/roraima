<?php

/**
 * facrecliq actions.
 *
 * @package    siga
 * @subpackage facrecliq
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class facrecliqActions extends autofacrecliqActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
	  $this->configGrid();
	  $this->configGridb();
	  if ($this->fcdefrecint->getPromedio()=="N")
      {
        $this->fcdefrecint->setPromedio("");
      }

  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcrangosrecPeer::CODREC,$this->fcdefrecint->getCodrec());
    $per = FcrangosrecPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facrecliq/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcdefrecint->setGrid($this->grid);
  }

  public function configGridb($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcfuentesrecPeer::CODREC,$this->fcdefrecint->getCodrec());
    $per = FcfuentesrecPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facrecliq/'.sfConfig::get('sf_app_module_config_dir_name').'/gridb');
	$this->columnas[1][0]->setCatalogo('Fcfuepre','sf_admin_edit_form', array('codfue'=>'1','nomfue'=>'2'), 'Facrecliq_fcfuepre');
	$this->columnas[1][2]->setCatalogo('Fcfuepre','sf_admin_edit_form', array('codfue'=>'3','nomfue'=>'4'), 'Facrecliq_fcfuepre');
    $this->gridb = $this->columnas[0]->getConfig($per);
    $this->fcdefrecint->setGridb($this->gridb);
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

  public function saving($fcdefdesc)
  {
    $fcdefdesc->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $gridb = Herramientas::CargarDatosGridv2($this,$this->gridb);
    Hacienda::salvar_grid_Fcdefrecint($fcdefdesc, $grid);
	Hacienda::salvar_gridb_Fcdefrecint($fcdefdesc, $gridb);
    return -1;
  }

  protected function updateFcdefrecintFromRequest()
  {
    $fcdefrecint = $this->getRequestParameter('fcdefrecint');

    if (isset($fcdefrecint['codrec']))
    {
      $this->fcdefrecint->setCodrec($fcdefrecint['codrec']);
    }
    if (isset($fcdefrecint['nomrec']))
    {
      $this->fcdefrecint->setNomrec($fcdefrecint['nomrec']);
    }
    if (isset($fcdefrecint['tipo']))
    {
      $this->fcdefrecint->setTipo($fcdefrecint['tipo']);
    }
    if (isset($fcdefrecint['modo']))
    {
      $this->fcdefrecint->setModo($fcdefrecint['modo']);
    }
    if (isset($fcdefrecint['periodo']))
    {
      $this->fcdefrecint->setPeriodo($fcdefrecint['periodo']);
    }
    if (isset($fcdefrecint['promedio']))
    {
      $this->fcdefrecint->setPromedio($fcdefrecint['promedio']);
    }
    if (isset($fcdefrecint['grid']))
    {
      $this->fcdefrecint->setGrid($fcdefrecint['grid']);
    }
    if (isset($fcdefrecint['gridb']))
    {
      $this->fcdefrecint->setGridb($fcdefrecint['gridb']);
    }

    if (isset($fcdefrecint['codrec']))
    {
      $this->fcdefrecint->setCodrec($fcdefrecint['codrec']);
    }
    if (isset($fcdefrecint['nomrec']))
    {
      $this->fcdefrecint->setNomrec($fcdefrecint['nomrec']);
    }
    if (isset($fcdefrecint['tipo']))
    {
      $this->fcdefrecint->setTipo($fcdefrecint['tipo']);
    }
    if (isset($fcdefrecint['modo']))
    {
      $this->fcdefrecint->setModo($fcdefrecint['modo']);
    }
    if (isset($fcdefrecint['periodo']))
    {
      $this->fcdefrecint->setPeriodo($fcdefrecint['periodo']);
    }
    if (isset($fcdefrecint['promedio']))
    {
      $this->fcdefrecint->setPromedio($fcdefrecint['promedio']);
    }

    if (isset($fcdefrecint['codrec']))
    {
      $this->fcdefrecint->setCodrec($fcdefrecint['codrec']);
    }
    if (isset($fcdefrecint['nomrec']))
    {
      $this->fcdefrecint->setNomrec($fcdefrecint['nomrec']);
    }
    if (isset($fcdefrecint['tipo']))
    {
      $this->fcdefrecint->setTipo($fcdefrecint['tipo']);
    }
    if (isset($fcdefrecint['modo']))
    {
      $this->fcdefrecint->setModo($fcdefrecint['modo']);
    }
    if (isset($fcdefrecint['periodo']))
    {
      $this->fcdefrecint->setPeriodo($fcdefrecint['periodo']);
    }
    if (isset($fcdefrecint['promedio']))
    {
      $this->fcdefrecint->setPromedio("S");
    }
    else
    {
      $this->fcdefrecint->setPromedio("N");
    }

  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
