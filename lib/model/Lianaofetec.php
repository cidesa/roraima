<?php

/**
 * Subclase para representar una fila de la tabla 'lianaofetec'.
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
class Lianaofetec extends BaseLianaofetec
{
    public function getDescri()
    {
        return H::GetX('Codcri','Liaspteccrieva','Descri',$this->codcri);
    }
    public function getLimit()
    {
        $val = H::GetX('Codcri','Lipliecritec','Limit',$this->codcri);
        return $val!='S' ? 'NO' : 'SI';
    }
    public function getPuntua()
    {
        return  H::FormatoMonto(H::GetX('Codcri','Lipliecritec','Puntua',$this->codcri));
    }

    public function getPorcen()
    {
        return  H::FormatoMonto(H::GetX('Codcri','Lipliecritec','Porcen',$this->codcri));
    }
}
