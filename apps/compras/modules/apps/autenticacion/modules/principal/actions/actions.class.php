<?php

/**
 * principal actions.
 *
 * @package    Roraima
 * @subpackage principal
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version    SVN: $Id:actions.class.php 32813 2009-09-08 16:19:47Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class principalActions extends sfActions
{
  /**
   * Executes index action
   *
   */
  public function executeIndex()
  {
    $this->menu=$this->getUser()->obtenerModulos();

    $dir2=CIDESA_CONFIG.'/configuracion/contabilidad.yml';
    cidesaTools::exitsfile($dir2) ? $configuracion = CIDESA_CONFIG.'/configuracion/contabilidad.yml' : $configuracion =  sfConfig::get('sf_config_dir').'/configuracion/contabilidad.yml';
    $confyml = sfYaml::load($configuracion);

	if(is_array($confyml)){
	  if(array_key_exists('comprobantes',$confyml)) $this->getUser()->setAttribute('confcorcom', H::iif(($confyml["comprobantes"]["confcorcom"])=='S','S','N'));
	  else $this->getUser()->setAttribute('confcorcom', 'S');
	}
  }

  public function executeMenu()
  {

    $this->modulo = $this->getRequestParameter('m','');

    $this->getUser()->setAttribute('menu',$this->modulo,'autenticacion');

  }
}
