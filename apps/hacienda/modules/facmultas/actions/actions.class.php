<?php

/**
 * Facmultas actions.
 *
 * @package    siga
 * @subpackage Facmultas
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class FacmultasActions extends autoFacmultasActions
{

  public function editing()
  {
	  $this->configGrid();
	  $this->configGridb();
	  /*if ($this->fcdefrecint->getPromedio()=="N")
      {
        $this->fcdefrecint->setPromedio("");
      }*/

  }


  public function deleting($fcmultas)
  {
   if ($fcmultas->getId()!="")
   {
	$c = new Criteria();
	$c->add(FcrangosmulPeer::CODMUL,$fcmultas->getCodmul());
	FcrangosmulPeer::doDelete($c);
	$c = new Criteria();
	$c->add(FcfuentesmulPeer::CODMUL,$fcmultas->getCodmul());
	FcfuentesmulPeer::doDelete($c);
    $fcmultas->delete();
    return -1;
   }
  }

  public function configGrid($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcrangosmulPeer::CODMUL,$this->fcmultas->getCodmul());
    $per = FcrangosmulPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facmultas/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->grid = $this->columnas[0]->getConfig($per);
    $this->fcmultas->setGrid($this->grid);
  }

  public function configGridb($reg = array(),$regelim = array())
  {
    $c = new Criteria();
    $c->add(FcfuentesmulPeer::CODMUL,$this->fcmultas->getCodmul());
    $per = FcfuentesmulPeer::doSelect($c);
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/facmultas/'.sfConfig::get('sf_app_module_config_dir_name').'/gridb');
	$this->columnas[1][0]->setCatalogo('Fcfuepre','sf_admin_edit_form', array('codfue'=>'1','nomfue'=>'2'), 'Facmultas_fcfuepre_fcdefins');
	$this->columnas[1][2]->setCatalogo('Fcfuepre','sf_admin_edit_form', array('codfue'=>'3','nomfue'=>'4'), 'Facmultas_fcfuepre_fcdefins');
    $this->gridb = $this->columnas[0]->getConfig($per);
    $this->fcmultas->setGridb($this->gridb);
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

  public function saving($fcmultas)
  {
    $fcmultas->save();
    $grid = Herramientas::CargarDatosGridv2($this,$this->grid);
    $gridb = Herramientas::CargarDatosGridv2($this,$this->gridb);
    Hacienda::salvar_grid_Fcmultas($fcmultas, $grid);
	Hacienda::salvar_gridb_Fcmultas($fcmultas, $gridb);
    return -1;
  }



}
