<?php

/**
 * licrecomen actions.
 *
 * @package    siga
 * @subpackage licrecomen
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class licrecomenActions extends autolicrecomenActions
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
      $sql = "select b.nompro,a.codpro,0 as legal, 0 as tecnico, 0 as financieron, 0 as total, 0 as check, max(a.id) as id
                from liempofe a, caprovee b
                where
                a.codpro=b.codpro and
                a.codlic='".$this->lirecomen->getCodlic()."'
                group by b.nompro,a.codpro";

    H::BuscarDatos($sql, $reg);
      // Aquí va el código para generar arreglo de configuración del grid
    $this->obj = array();
    }
    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/licrecomen/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');
    $this->obj =$this->columnas[0]->getConfig($reg);
    $this->lirecomen->setGrid($this->obj);
    
  }

  public function executeAjax()
  {
    $sw=true;
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
        $fecreg = H::GetX('codlic','Lireglic','fecreg',$codigo);
        $dato = H::GetX('codlic','Lireglic','numemo',$codigo);
        $numexp = H::GetX('numemo','Limemoran','numexp',$dato);
        $dato = H::GetX('Codlic','Lireglic','numemo',$codigo);
        $dato2 = H::GetX('Numemo','Limemoran','Coduniste',$dato);
        $unidad = H::GetX('Coduniste','Lidatste','Desuniste',$dato2);
        $dato = H::GetX('Codlic','Lireglic','numemo',$codigo);
        $dato2 = H::GetX('Numemo','Limemoran','Coduniste',$dato);
        $dato3 =  H::GetX('Coduniste','Lidatste','codemp',$dato2);
        $respon =  H::GetX('Codemp','Nphojint','Nomemp',$dato3);
        $dato = H::GetX('Codlic','Lireglic','numemo',$codigo);
        $dato2 = H::GetX('Numemo','Limemoran','codcom',$dato);
        $comision = H::GetX('Codcom','Licomlic','descom',$dato2);
        $dato = H::GetX('Codlic','Lireglic','numemo',$codigo);
        $dato2 = H::GetX('Numemo','Limemoran','codfin',$dato);
        $tipfin = H::GetX('Codfin','Fortipfin','nomext',$dato2);
        $dato = H::GetX('Codlic','Lireglic','numemo',$codigo);
        $nompro = H::GetX('Numemo','Limemoran','nompro',$dato);
        $deslic = H::GetX('Codlic','Lireglic','deslic',$codigo);
        $decretos = H::GetX('Codlic','Lireglic','decretos',$codigo);
        $dato = H::GetX('Codlic','Lireglic','litiplic_id',$codigo);
        $modad = H::GetX('id','Litiplic','destiplic  ',$dato);
        $this->lirecomen = $this->getLirecomenOrCreate();
        $this->lirecomen->setCodlic($codigo);
        $this->configGrid();
        $sw=false;

        $output = '[["lirecomen_fecreg","'.$fecreg.'",""],["lirecomen_numexp","'.$numexp.'",""],["lirecomen_unidad","'.$unidad.'",""],
                    ["lirecomen_comision","'.$comision.'",""],["lirecomen_respon","'.$respon.'",""],["lirecomen_tipfin","'.$tipfin.'",""],
                    ["lirecomen_nompro","'.$nompro.'",""],["lirecomen_deslic","'.$deslic.'",""],["lirecomen_decretos","'.$decretos.'",""],
                    ["lirecomen_modad","'.$modad.'",""]]';
        break;
      default:
        $output = '[["","",""],["","",""],["","",""]]';
    }

    // Instruccion para escribir en la cabecera los datos a enviar a la vista
    $this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');

    // Si solo se va usar ajax para actualziar datos en objetos ya existentes se debe
    // mantener habilitar esta instrucción
    if($sw)
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
    return parent::saving($clasemodelo);
  }

  public function deleting($clasemodelo)
  {
    return parent::deleting($clasemodelo);
  }


}
