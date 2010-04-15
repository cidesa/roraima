<?php

/**
 * Subclase para representar una fila de la tabla 'npexplab'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Npexplab.php 34274 2009-10-26 22:32:03Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npexplab extends BaseNpexplab
{
  public function getDesniv()
  {
    return Herramientas::getX('CODNIV','Npestorg','Desniv',self::getCodniv());
  }
}
