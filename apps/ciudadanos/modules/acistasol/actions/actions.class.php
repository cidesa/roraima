<?php

/**
 * acistasol actions.
 *
 * @package    siga
 * @subpackage acistasol
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class acistasolActions extends autoacistasolActions
{

  public function executeSave()
  {
    return $this->forward('acistasol', 'list');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();

  }

  public function configGrid()
  {
    // Detalle de Ayudas

    $c = new Criteria();
    $c->add(AtdetayuPeer::ATAYUDAS_ID,$this->atayudas->getId());

    $reg = AtdetayuPeer::doSelect($c);

    if(!$reg) $reg = array();

    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/acistasol/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atdetayu',$reg);

    $this->atayudas->setObjitems($this->obj);

    // Detalle de Recaudos
    $this->configGridRecaudos();

  }

  public function configGridRecaudos($idrubros='')
  {
    $reg = $this->atayudas->getAtdetrecayus();
    $regrecaudos = array();
    $c = new Criteria();
    if($idrubros!='') $c->add(AtdetrecrubPeer::ATRUBROS_ID,$idrubros);
    else $c->add(AtdetrecrubPeer::ATRUBROS_ID,$this->atayudas->getAtrubrosId());

    $recaudos = AtdetrecrubPeer::doSelect($c);

    //H::PrintR($reg);

    if($recaudos){
      foreach($recaudos as $rec){
        $idrec = $rec->getAtrecaudId();
        $encontrado=false;
        $iddetrecayu = '';
        if($reg){
          foreach($reg as $r){
            if($r->getAtrecaudId()==$idrec){
              $encontrado=true;
              $iddetrecayu = $r->getId();
            }
          }
        }

        if($iddetrecayu!=''){
          $regaxu = AtdetrecayuPeer::retrieveByPK($iddetrecayu);
          $regaxu->setEntregado(true);
        }else{
          $regaxu = new Atdetrecayu();
          $regaxu->setAtrecaudId($idrec);
          $regaxu->setAtayudasId($this->atayudas->getId());
          $regaxu->afterHydrate();
        }

        //if($encontrado) $regaxu->setEntregado(true);
        //else $regaxu->setEntregado(false);

        $regrecaudos[] = $regaxu;
      }
    }
    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/acistasol/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_atdetrecayu',$regrecaudos);

    $this->atayudas->setObjrecaudos($this->obj);

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

    $grid = Herramientas::CargarDatosGrid($this,$this->obj);

    $this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
