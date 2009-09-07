<?php

/**
 * Subclase para representar una fila de la tabla 'atrubros'.
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
class Atrubros extends BaseAtrubros
{
  protected $destipayu = '';
  protected $objrecaudos = Array();

  public function afterHydrate()
  {
    $datos = $this->getAttipayu();
    if($datos) $this->destipayu = $datos->getDesayu();

  }

  public function __toString()
  {
    return $this->desrub;
  }

}
