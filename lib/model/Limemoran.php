<?php

/**
 * Subclase para representar una fila de la tabla 'limemoran'.
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
class Limemoran extends BaseLimemoran
{
    protected  $respon;
    
    public function getNomext()
    {
        return H::getX('Codfin','Fortipfin','Nomext',$this->codfin);
    }

    public function getDesuniste()
    {
        return H::getX('Coduniste','Lidatste','Desuniste',$this->coduniste);
    }

    public function getDesclacomp()
    {
        return H::getX('Codclacomp','Occlacomp','Desclacomp',$this->codclacomp);
    }

    public function getRespon()
    {
        return H::getX('Codcom','Licomlic','Respon',$this->codcom);
    }

    public function getDescom()
    {
        return H::getX('Codcom','Licomlic','Descom',$this->codcom);
    }
}
