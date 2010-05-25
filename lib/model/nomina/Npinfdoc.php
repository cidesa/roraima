<?php

/**
 * Subclase para representar una fila de la tabla 'npinfdoc'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npinfdoc extends BaseNpinfdoc
{
   public function getDesdoc()
    {
      return Herramientas::getX('coddoc','Npdocemp','desdoc',self::getCoddoc());
    }
}
