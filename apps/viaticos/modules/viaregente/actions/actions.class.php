<?php

/**
 * viaregente actions.
 *
 * @package    siga
 * @subpackage viaregente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class viaregenteActions extends autoviaregenteActions
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
      $reg = array();
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }

    //if(!count($reg)>=0)
    //{
   $c = new Criteria();
   $c->add(ViaciuentePeer::VIAREGENTE_ID,$this->viaregente->getId());
   //$c->add(ViaregentePeer::ID,$this->viaregente->getId());
   //$c->addJoin(ViaciuentePeer::ID,viaregentePeer::VIAREGTIPSER_ID);
   $per = ViaciuentePeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viaregente/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_ciudades');
   $this->columnas[1][1]->setCatalogo('ocpais','sf_admin_edit_form', array('nompai'=>'2','codpai'=>'1'), 'Ocpais');
   $this->columnas[1][3]->setCatalogo('ocestado','sf_admin_edit_form', array('nomedo'=>'4','codedo'=>'3'), 'Ocestado', array( 'param1'=>"'+getCeldav2(this.id,-3)+'" ) );
   $this->columnas[1][5]->setCatalogo('occiudad','sf_admin_edit_form', array('nomciu'=>'6','id'=>'5'), 'Occiudad', array( 'param1'=>"'+getCeldav2(this.id,-3)+'", 'param2'=>"'+getCeldav2(this.id,-5)+'" ) );

   $this->obj = $this->columnas[0]->getConfig($per);

   $this->viaregente->setObjc($this->obj);
    //}
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

    if($this->getRequest()->getMethod() == sfRequest::POST){

    $this->viaregente = $this->getViaregenteOrCreate();
    $this->updateViaregenteFromRequest();

      $this->configGrid();
      $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

      $this->coderr = Viaticos::validarViaregente($this->viaregente,$grid);

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


   // $this->configGrid($grid[0],$grid[1]);


  }

  public function saving($clasemodelo)
  {
    $gridC = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjc());
    return Viaticos::SalvarViaregente($clasemodelo,$gridC);
  }

  public function deleting($clasemodelo)
  {
    $this->configGrid();
    $gridC = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjc());
    if (Viaticos::validarEliminarViaregente($clasemodelo,$gridC)==-1)
    {
      $c = new Criteria();
      $c->add(ViaciuentePeer::VIAREGENTE_ID,$clasemodelo->getId());
      ViaciuentePeer::doDelete($c);
      $clasemodelo->delete();
    }else{
      return 5;
    }
    return -1;
  }
}
