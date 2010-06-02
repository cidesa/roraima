<?php

/**
 * Subclase para representar una fila de la tabla 'cadefcen'.
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
class Cadefcen extends BaseCadefcen
{
    public function getNompai()
    {
      return Herramientas::getX('CODPAI','Nppais','Nompai',self::getCodpai());
    }
}
