<?php

/**
 * Subclase para representar una fila de la tabla 'formetdistra'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Formetdistra extends BaseFormetdistra
{
    public function getNomorg()
    {
      return Herramientas::getX('CODORG','Fordeforgpub','Nomorg',self::getCodorg());
    }
}
