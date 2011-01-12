<?php

/**
 * Subclase para representar una fila de la tabla 'tscormestxt'.
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
class Tscormestxt extends BaseTscormestxt
{
    public function getNomcue()
    {
        return Herramientas::getX('NUMCUE','Tsdefban','Nomcue',self::getNumcue());
    }
}
