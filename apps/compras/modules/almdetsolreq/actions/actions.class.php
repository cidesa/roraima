<?php

/**
 * almdetsolreq actions.
 *
 * @package    siga
 * @subpackage almdetsolreq
 * @author     $Auhor$ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id: actions.class.php 32371 2009-09-01 16:06:59Z lhernandez $
 * @copyright  Copyright 2007, Cidesa C.A.
 */

class almdetsolreqActions extends autoalmdetsolreqActions
{

  public function executeIndex()
  {
    return $this->forward('almdetsolreq', 'edit');
  }

  // Para incluir funcionalidades al executeEdit()
  public function editing()
  {
     $reqart=$this->getUser()->getAttribute('reqart',null,$this->getRequestParameter('formulario'));
     $this->configGrid($reqart);
  }

  public function configGrid($reqart='')
  {
   $c = new Criteria();
   $c->add(CaartreqPeer::REQART,$reqart);
   $reg = CaartreqPeer::doSelect($c);

   $this->columnas = Herramientas::getConfigGrid(sfConfig::get('sf_app_module_dir').'/almdetsolreq/'.sfConfig::get('sf_app_module_config_dir_name').'/grid_caartreq');

   $this->obj =$this->columnas[0]->getConfig($reg);

   $this->careqart->setObj($this->obj);
  }


}
