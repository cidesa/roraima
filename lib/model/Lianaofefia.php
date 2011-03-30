<?php

/**
 * Subclase para representar una fila de la tabla 'lianaofefia'.
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
class Lianaofefia extends BaseLianaofefia
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
    public function getPuntua()
    {
        return  H::FormatoMonto(H::GetX('Codcomres','Lipliecrifian','Puntua',$this->codcomres));
    }

    public function getPorcen()
    {
        return  H::FormatoMonto(H::GetX('Codcomres','Lipliecrifian','Porcen',$this->codcomres));
    }
}
