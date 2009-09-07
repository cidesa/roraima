<?php

/**
 * Subclase para crear funcionalidades específicas de busqueda y actualización en la tabla 'bncobseg'.
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
class BncobsegPeer extends BaseBncobsegPeer
{
  public static function getDesubi($codigo)
  {
    return Herramientas::getX('CODCOB','Bncobseg','Descob',str_pad($codigo,4,'0',STR_PAD_LEFT));
  }
}
