<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'bnclafun'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class BnclafunPeer extends BaseBnclafunPeer
{
  public static function getDescla_ajax($codigo)
  {
    return Herramientas::getX('codcla','Bnclafun','descla',str_pad($codigo,3,'0',STR_PAD_LEFT));
  }
}
