<?php

/**
 * Subclase para representar una fila de la tabla 'npasicarcolemp'.
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
class Npasicarcolemp extends BaseNpasicarcolemp
{
    public function getNomemp()
    {
        return H::GetX('Codemp','Nphojint','Nomemp',$this->codemp);
    }

    public function getNomcar()
    {
        return H::GetX('Codcar','Npcargos','Nomcar',$this->codcar);
    }
}
