<?php

/**
 * catreginm actions.
 *
 * @package    siga
 * @subpackage catreginm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class catreginmActions extends autocatreginmActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
  $this->configGridP();  //Personas
  $this->configGridT();  //Terreno
  $this->configGridC();  //Construccion

  }

  public function configGridC()
  {
     $c = new Criteria();
     $c->add(CatcarconinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatcarconinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catcarconinm');
     $this->columnas[1][0]->setCombo(Constantes::ListaCaractConst());
     $this->columnas[1][1]->setCatalogo('catcarcon','sf_admin_edit_form', array('id'=>'2' ,'nomcarcon'=>'3'), 'Catreginm_Catcarcon', array( 'param1'=>"'+getCeldav2(this.id,-1)+'" ) );

     $this->objC = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjconstruccion($this->objC);
  }


  public function configGridT()
  {
     $c = new Criteria();
     $c->add(CatcarterinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatcarterinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catcarterinm');
     $this->columnas[1][0]->setCombo(Catcarterinm::CargarTerrenos());
     //echo $this->columnas[1][0]->getCatcarterid();
     //exit();

     //$this->columnas[1][0]->setCombo(Catcarterinm::CargarTerrenos());
//H::printr($this->columnas);
     $this->objT = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjterreno($this->objT);
  }


  public function configGridP()
  {
     $c = new Criteria();
     $c->add(CatperinmPeer::CATREGINM_ID,$this->catreginm->getId());
     $per = CatperinmPeer::doSelect($c);

     $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/catreginm/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_catperinm');
     $this->columnas[1][4]->setCombo(Constantes::ListaCondOcupac());

     $this->objP = $this->columnas[0]->getConfig($per);

     $this->catreginm->setObjpersonas($this->objP);
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
       $this->catreginm  =  $this->getCatreginmOrCreate();
      //	 $this->editing();

      // if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->objC)))!=-1){ return false; }
      // if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->objT)))!=-1){ return false; }
      // if (($this->coderr=Herramientas::ValidarGrid(Herramientas::CargarDatosGridv2($this,$this->objP)))!=-1){ return false; }

        return true;
    /*
      if($this->coderr!=-1){
        return false;
      } else return true;
*/
    }else return true;
  }

  /**
   * Función para actualziar el grid en el post si ocurre un error
   * Se pueden colocar aqui los grids adicionales
   *
   */
  public function updateError()
  {
    $this->configGridC();
    $this->configGridP();
    $this->configGridT();

    $grid = Herramientas::CargarDatosGridv2($this,$this->objC);
    $grid = Herramientas::CargarDatosGridv2($this,$this->objP);
    $grid = Herramientas::CargarDatosGridv2($this,$this->objT);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $gridP = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjpersonas());
    $gridC = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjconstruccion());
    $gridT = Herramientas::CargarDatosGridv2($this,$clasemodelo->getObjterreno());
    return Inmuebles::SalvarCatreginm($clasemodelo,$gridP,$gridC,$gridT);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
