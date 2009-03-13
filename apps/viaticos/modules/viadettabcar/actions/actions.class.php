<?php

/**
 * viadettabcar actions.
 *
 * @package    siga
 * @subpackage viadettabcar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class viadettabcarActions extends autoviadettabcarActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  $this->configGrid();

  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $this->regelim = $regelim;

    if(!count($reg)>0)
    {
      // Aquí va el código para traernos los registros que contendrá el grid
      //$reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    //$this->obj = array();
    }

     $c = new Criteria();
     $c->add(ViadettabcarPeer::VIAREGTIPTAB_ID ,$this->viaregtiptab->getId());
     $reg = ViadettabcarPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viadettabcar/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_viadettabcar');
     $this->columnas[1][0]->setCatalogo('Npcargos','sf_admin_edit_form', array('nomcar'=>'2','codcar'=>'1'), 'Viadettabcar_Npcargos');
     //$this->columnas[1][0]->setCatalogo('viaregente','sf_admin_edit_form', array('desente'=>'2','id'=>'1'), 'Viaregsolvia_Viaregente');

   $this->obj = $this->columnas[0]->getConfig($reg);

   $this->viaregtiptab->setObjcargos($this->obj);

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

      $this->viaregtiptab = $this->getViaregtiptabOrCreate();
      $this->updateViaregtiptabFromRequest();
      $this->configGrid();

      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      $this->coderr = Viaticos::validarViadettabcar($this->viaregtiptab,$grid);

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
    $grid = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjcargos());
    $x = $grid[0];
    $j = 0;
    while ($j<count($x))
    {
      $x[$j]->setViaregtiptabid($clasemodelo->getId());
      $x[$j]->save();
      $j++;
    }

    $z=$grid[1];
    $j=0;
    while ($j<count($z))
    {
      $z[$j]->delete();
      $j++;
    }

    return -1;

  } catch (Exception $ex){
    return 0;
  }
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
