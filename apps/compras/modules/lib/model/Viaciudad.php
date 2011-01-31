<?php

/**
 * Subclase para representar una fila de la tabla 'viaciudad'.
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
class Viaciudad extends BaseViaciudad
{
    public function getNompai()
    {
        return H::GetX('Codpai','Viapais','Nompai',$this->codpai);
    }
    public function getNomest()
    {
        return H::GetX('Codest','Viaestado','Nomest',$this->codest);
    }
}
