<?php

/**
 * Subclase para representar una fila de la tabla 'liprergo'.
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
class Liprergo extends BaseLiprergo
{
    public function getNomrgo()
    {
        return H::GetX('Codrgo','Carecarg','Nomrgo',$this->codrgo);
    }

    public function getTiprgo()
    {
        return H::GetX('Codrgo','Carecarg','Tiprgo',$this->codrgo);
    }

    public function getMonto()
    {
        return H::FormatoMonto(H::GetX('Codrgo','Carecarg','Monrgo',$this->codrgo));
    }
    
}
