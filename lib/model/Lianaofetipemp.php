<?php

/**
 * Subclase para representar una fila de la tabla 'lianaofetipemp'.
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
class Lianaofetipemp extends BaseLianaofetipemp
{
    public function getDestipemp()
    {
        return H::GetX('Codemp','Litipemp','Desemp',$this->codtipemp);
    }
    public function getLimit()
    {
        $val = H::GetX('Codtipemp','Liplietipemp','Limit',$this->codtipemp);
        return $val!='S' ? 'NO' : 'SI';
    }
    public function getPuntua()
    {
        return  H::FormatoMonto(H::GetX('Codtipemp','Liplietipemp','Puntua',$this->codtipemp));
    }

    public function getPorcen()
    {
        return  H::FormatoMonto(H::GetX('Codtipemp','Liplietipemp','Porcen',$this->codtipemp));
    }
}
