<?php

/**
 * Subclase para representar una fila de la tabla 'liregofefia'.
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
class Liregofefia extends BaseLiregofefia
{
    public function getDescomres()
    {
        return H::GetX('Codcomres','Liccomres','Descomres',$this->codcomres);
    }
    public function getLimit()
    {
        $val = H::GetX('Codcomres','Lipliecrifian','Limit',$this->codcomres);
        return $val!='S' ? 'NO' : 'SI';
    }
}
