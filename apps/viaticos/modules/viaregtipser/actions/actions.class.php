<?php

/**
 * viaregtipser actions.
 *
 * @package    siga
 * @subpackage viaregtipser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class viaregtipserActions extends autoviaregtipserActions
{

  public function setVars()
  {
    $this->mascaranivel = Herramientas::ObtenerFormato('Npdefgen','Fororg');
    $this->lonnivel=strlen($this->mascaranivel);
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->setVars();
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

   $c = new Criteria();
   $c->add(ViaregtipserPeer::ID,$this->viaregtipser->getId());
   $c->addJoin(ViaregtipserPeer::ID,ViadettipserPeer::VIAREGTIPSER_ID);
   $per = ViadettipserPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viaregtipser/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_viadettipser');
   $this->columnas[1][1]->setCatalogo('ocpais','sf_admin_edit_form', array('nompai'=>'2','codpai'=>'1'), 'Ocpais');
   $this->columnas[1][2]->setCatalogo('ocestado','sf_admin_edit_form', array('nomedo'=>'3','codedo'=>'4'), 'Ocestado', array( 'param1'=>"'+getCeldav2(this.id,-2)+'" ) );
   $this->columnas[1][4]->setCatalogo('occiudad','sf_admin_edit_form', array('nomciu'=>'5','id'=>'6'), 'Occiudad', array( 'param1'=>"'+getCeldav2(this.id,-1)+'", 'param2'=>"'+getCeldav2(this.id,-4)+'" ) );
   //$this->columnas[1][6]->setCombo(Viadettipser::ListaNivOrg($this->lonnivel));
   $this->columnas[1][6]->setCombo(Viadettipser::ListaTipTab());

   $this->obj = $this->columnas[0]->getConfig($per);

   $this->viaregtipser->setObj($this->obj);
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

   // $this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
  try{
    $grid = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObj());
    return Viaticos::SalvarViaRegtipser($clasemodelo,$grid);

  } catch (Exception $ex){
    return 0;
  }
  }

  public function deleting($clasemodelo)
  {
    try{

    $this->configGrid();
    $gridC = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObj());
    if (Viaticos::validarEliminarViaregtipser($clasemodelo,$gridC)==-1)
    {
      return Viaticos::EliminarTipoServicio($clasemodelo);

    }else{
      return 5;
    }

  } catch (Exception $ex){
    return 0;
  }
  }
}
