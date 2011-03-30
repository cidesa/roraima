<?php

/**
 * Subclase para representar una fila de la tabla 'liregofedet'.
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
class Liregofedet extends BaseLiregofedet
{
    public function getDesart()
    {
        return H::GetX('Codart','Caregart','Desart',$this->codart);
    }
}
