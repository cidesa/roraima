<?php

/**
 * viacalrub actions.
 *
 * @package    siga
 * @subpackage viacalrub
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class viacalrubActions extends autoviacalrubActions
{

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
  }

  public function configGrid($codigo='',$reg = array(),$regelim = array())
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
     $c->add(ViacalrubPeer::CODRUB,$this->viacalrub->getCodrub());
     $reg = ViacalrubPeer::doSelect($c);

     $c = new Criteria();
     $c->add(ViadefrubPeer::CODRUB,$this->codrub);
     $rs = ViadefrubPeer::doSelectOne($c);

     if($rs)
     {
        if($rs->getTiprub()=='1')
            $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viacalrub/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
        else
            $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viacalrub/'.sfConfig::get('sf_app_module_config_dir_name').'/grid2');
     }else
     {
        $this->obj = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/viacalrub/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
     }

     $unitri='0,00';
     $c = new Criteria();
     $rs = ViadefgenPeer::doSelectOne($c);
     if($rs)
        $unitri = H::FormatoMonto($rs->getValunitri());
     $this->obj[1][2]->setHtml(' onBlur="ValidarMontoGridv2(this.id);calculamontofinal(this.id);"');
     $this->obj[1][3]->setHtml(' value="'.$unitri.'"');

     $this->obj = $this->obj[0]->getConfig($reg);
     $this->viacalrub->setGrid($this->obj);

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
    $header=true;
    switch ($ajax){
      case '1':
        // La variable $output es usada para retornar datos en formato de arreglo para actualizar
        // objetos en la vista. mas informacion en
        // http://201.210.211.26:8080/www/wiki/index.php/Agregar_Ajax_para_buscar_una_descripcion
          $this->viacalrub = $this->getViacalrubOrCreate();
          $this->updateViacalrubFromRequest();
          $this->codrub=$codigo;
          $this->configGrid();
        $dato = H::GetX('Codrub','Viadefrub','Desrub',$codigo);
        $output = '[["viacalrub_desrub","'.$dato.'",""],["","",""],["","",""]]';
        $header=false;
        break;
      case '2':
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($header)
        return sfView::HEADER_ONLY;

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
    $this->configGrid();

    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);

    //$this->configGrid($grid[0],$grid[1]);

  }

  public function saving($clasemodelo)
  {
    $grid = Herramientas::CargarDatosGridv2($this,$this->obj);
    $arrget=array('Codrub');
    H::Guardar_Grid($grid, $arrget, $clasemodelo);
    return '-1';
  }

  public function deleting($clasemodelo)
  {
    $c = new Criteria();
    $c->add(ViacalrubPeer::CODRUB,$clasemodelo->getCodrub());
    $per = ViacalrubPeer::doSelect($c);
    if($per)
        foreach($per as $r)
            $r->delete();
    return '-1';
  }


}
