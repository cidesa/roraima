<?php

/**
 * Subclase para representar una fila de la tabla 'lipliecrileg'.
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
class Lipliecrileg extends BaseLipliecrileg
{
    protected  $limita=false;

    public function afterHydrate()
    {
        if(self::getLimit()=='S')
            $this->limita=true;
    }

    public function getDescri()
    {
        return H::GetX('Codcri','Liasplegcrieva','Descri',$this->codcri);
    }
}
