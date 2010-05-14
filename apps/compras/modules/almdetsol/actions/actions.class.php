<?php

/**
 * almdetsol actions.
 *
 * @package    siga
 * @subpackage almdetsol
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almdetsolActions extends autoalmdetsolActions
{

  public function executeIndex()
  {
    return $this->forward('almdetsol', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $refsol=$this->getUser()->getAttribute('refsol',null,$this->getRequestParameter('formulario'));
     $this->configGrid($refsol);
  }

  public function configGrid($refsol='')
  {
   $c = new Criteria();
   $c->add(CaartsolPeer::REQART,$refsol);
   $reg = CaartsolPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almdetsol/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartsol');

   $this->obj =$this->columnas[0]->getConfig($reg);

   $this->casolart->setObj($this->obj);
  }

}
