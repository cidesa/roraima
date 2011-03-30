<?php

/**
 * Subclase para representar una fila de la tabla 'lisolegrrgo'.
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
class Lisolegrrgo extends BaseLisolegrrgo
{
    public function getNomrgo()
    {
        return H::GetX('Codrgo','Carecarg','Nomrgo',$this->codrgo);
    }
}
