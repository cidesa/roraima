<?php

/**
 * bdchkbd actions.
 *
 * @package    siga
 * @subpackage bdchkbd
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class bdchkbdActions extends autobdchkbdActions
{

  public function executeIndex()
  {
    return $this->redirect('bdchkbd/edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
    $this->configGrid();
    $this->bdcriterio->setNumfilas($this->filas);
  }

  public function configGrid()
  {
    $reg=Autenticacion::cargarResultados();
    $this->filas=count($reg);

    $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/bdchkbd/'.sfConfig::get('sf_app_module_config_dir_name').'/grid');

    $this->obj = $this->columnas[0]->getConfig($reg);
    $this->bdcriterio->setObj($this->obj);
  }

}
