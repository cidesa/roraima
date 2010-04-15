<?php

/**
 * Subclase para representar una fila de la tabla 'segranapr'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.sima_user
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2.sima_user
 */
class Segranapr extends BaseSegranapr
{
  public function getDesniv(){

    return Herramientas::getX('CODNIV','Segnivapr','Desniv',self::getCodniv());
  }
}
