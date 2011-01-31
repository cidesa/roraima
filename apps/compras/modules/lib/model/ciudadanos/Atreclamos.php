<?php

/**
 * Subclase para representar una fila de la tabla 'atreclamos'.
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
class Atreclamos extends BaseAtreclamos
{
  protected $nombre = '';
  protected $unidad = '';
  protected $status = '';

  public function afterHydrate()
  {
    //$atsolici = $this->getAtsolici();
    $atunidad = $this->getAtunidades();
    //if($atsolici) $this->nombre = $atsolici->getNombre();
    if($atunidad) $this->unidad = $atunidad->getDesuni();

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
