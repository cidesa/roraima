<?php

/**
 * principal actions.
 *
 * @package    cidesa
 * @subpackage principal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2692 2006-11-15 21:03:55Z fabien $
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
		H::printr($confyml);
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
