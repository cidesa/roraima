<?php

/**
 * Subclase para representar una fila de la tabla 'liregofeleg'.
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
class Liregofeleg extends BaseLiregofeleg
{
    public function getDescri()
    {
        return H::GetX('Codcri','Liasplegcrieva','Descri',$this->codcri);
    }
    public function getLimit()
    {
        $val = H::GetX('Codcri','Lipliecrileg','Limit',$this->codcri);
        return $val!='S' ? 'NO' : 'SI';
    }

}
