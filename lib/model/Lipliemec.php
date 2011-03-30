<?php

/**
 * Subclase para representar una fila de la tabla 'lipliemec'.
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
class Lipliemec extends BaseLipliemec
{
    public function getDesmec()
    {
        return H::GetX('Codmec','Limeccon','Desmec',$this->codmec);
    }
}
