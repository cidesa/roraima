<?php

/**
 * tesfirmascheq actions.
 *
 * @package    siga
 * @subpackage tesfirmascheq
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class tesfirmascheqActions extends autotesfirmascheqActions
{

  public function executeIndex()
  {
    return $this->forward('tesfirmascheq', 'edit');
  }

  /**
   * Función para colocar el codigo necesario en
   * el proceso de edición.
   * Aquí se pueden buscar datos adicionales que necesite la vista
   * Esta función es parte de la acción executeEdit, que maneja tanto
   * el create como el edit del formulario.
   * Generalmente aqui se debe y puede colocar los llamados a los configGrid
   * Para generar la información de configuración de los grids.
   *
   */
  public function editing()
  {
    $this->configGrid();
    $this->tscheemi->setFilasord($this->filas);
  }

   /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGrid()
  {
    $this->configGridCheques();
  }

  /**
   * Esta función permite definir la configuración del grid de datos
   * que contiene el formulario. Esta función debe ser llamada
   * en las acciones, create, edit y handleError para recargar en todo momento
   * los datos del grid.
   *
   */
  public function configGridCheques()
  {
    $c = new Criteria();
    $c->add(TscheemiPeer::STATUS,'F');
    $detalle = TscheemiPeer::doSelect($c);

    $this->filas=count($detalle);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/tesfirmascheq/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_cheques');

    $this->objeto =$this->columnas[0]->getConfig($detalle);

    $this->tscheemi->setObjeto($this->objeto);
  }

  public function updateError()
  {
    $this->configGrid();
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
  }

   /**
   * Función que debe ser reescrita en la clase que hereda para
   * implementar el proceso de guardado adecuado para cada formulario.
   *
   */
  protected function saving($tscheemi)
  {
    $grid=Herramientas::CargarDatosGridv2($this,$this->objeto);
    Cheques::ActualizarEstatusCheques($grid);
    return -1;

  }
}
