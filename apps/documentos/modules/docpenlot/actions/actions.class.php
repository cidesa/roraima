<?php

/**
 * docpenlot actions.
 *
 * @package    siga
 * @subpackage docpenlot
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class docpenlotActions extends autodocpenlotActions
{

  public function executeList()
  {

    $this->redirect('docpenlot/edit');

  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->dfatendoc->setStaate($this->getRequestParameter('dfatendoc_staate',''));
    $this->dfatendoc->setAnuate($this->getRequestParameter('dfatendoc_anuate',''));
    $this->dfatendoc->setIdDftabtip($this->getRequestParameter('dfatendoc_id_dftabtip',''));
    
    $this->configGrid();
    

  }

  public function configGrid()
  { 
    $c = new Criteria();
    
    //H::PrintR($this->dfatendoc);
    
    if($this->dfatendoc->getIdDftabtip()!='') $c->add(DfatendocPeer::ID_DFTABTIP ,$this->dfatendoc->getIdDftabtip());
    if($this->dfatendoc->getStaate()!='') $c->add(DfatendocPeer::STAATE ,$this->dfatendoc->getStaate());
    if($this->dfatendoc->getAnuate()!='') $c->add(DfatendocPeer::ANUATE ,$this->dfatendoc->getAnuate());
    
    if(($this->dfatendoc->getIdDftabtip()=='') && ($this->dfatendoc->getStaate()=='') && ($this->dfatendoc->getAnuate()=='')) {
      $c->add(DfatendocPeer::ID ,0);
    }

    $reg = DfAtendocPeer::doSelect($c);

    $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/docpenlot/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_dfatendoc',$reg);

    $this->dfatendoc->setObjitems($this->obj);

  }

  public function executeAjax()
  {

    $output = '[["","",""],["","",""],["","",""]]';

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    return sfView::HEADER_ONLY;


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
    //$this->configGrid();

    //$grid = Herramientas::CargarDatosGrid($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    //return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    //return parent::deleting($clasemodelo);
  }


}
