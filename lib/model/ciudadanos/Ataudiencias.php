<?php

/**
 * Subclase para representar una fila de la tabla 'ataudiencias'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Ataudiencias extends BaseAtaudiencias
{
  protected $unidad = '';
  protected $nombre = '';
  protected $cedula = '';
  protected $status = '';

  public function afterHydrate(){

    $atciudadano = $this->getAtciudadano();
    $atunidad = $this->getAtunidades();
    if($atunidad) $this->unidad = $atunidad->getDesuni();
    if($atciudadano) $this->nombre = $atciudadano->getNomsol();
    if($atciudadano) $this->cedula = $atciudadano->getCedsol();

  }

  public function getStatus()
  {
    $this->status = parent::getStatus();
    $arrayanalizado = Constantes::listaAtencionCiudadanos();
    if(array_key_exists($this->status,$arrayanalizado)) return $arrayanalizado[$this->status];
    return $this->status;

  }

  public function getStatus_()
  {
    return $this->status;
  }

}
