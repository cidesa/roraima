<?php

/**
 * Subclase para representar una fila de la tabla 'lianaofefin'.
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
class Lianaofefin extends BaseLianaofefin
{
    public function getDescri()
    {
        return H::GetX('Codcri','Liaspfincrieva','Descri',$this->codcri);
    }
    public function getLimit()
    {
        $val = H::GetX('Codcri','Lipliecrifin','Limit',$this->codcri);
        return $val!='S' ? 'NO' : 'SI';
    }
    public function getPuntua()
    {
        return  H::FormatoMonto(H::GetX('Codcri','Lipliecrifin','Puntua',$this->codcri));
    }

    public function getPorcen()
    {
        return  H::FormatoMonto(H::GetX('Codcri','Lipliecrifin','Porcen',$this->codcri));
    }
}
