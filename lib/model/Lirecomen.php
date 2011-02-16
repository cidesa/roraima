<?php

/**
 * Subclase para representar una fila de la tabla 'lirecomen'.
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
class Lirecomen extends BaseLirecomen
{
    protected $grid=array();

    public function getFecreg()
    {
        return H::GetX('Codlic','Lireglic','fecreg',$this->codlic);
    }

    public function getNumexp()
    {
        return H::GetX('Codlic','Lireglic','numexp',$this->codlic);
    }

    public function getUnidad()
    {
        $dato = H::GetX('Codlic','Lireglic','numemo',$this->codlic);
        $dato2 = H::GetX('Numemo','Limemoran','Coduniste',$dato);
        return H::GetX('Coduniste','Lidatste','Desuniste',$dato2);
    }

    public function getRespon()
    {
        $dato = H::GetX('Codlic','Lireglic','numemo',$this->codlic);
        $dato2 = H::GetX('Numemo','Limemoran','Coduniste',$dato);
        $dato3 =  H::GetX('Coduniste','Lidatste','codemp',$dato2);
        return H::GetX('Codemp','Nphojint','Nomemp',$dato3);
    }

    public function getComision()
    {
        $dato = H::GetX('Codlic','Lireglic','numemo',$this->codlic);
        $dato2 = H::GetX('Numemo','Limemoran','codcom',$dato);
        return  H::GetX('Codcom','Licomlic','descom',$dato2);
    }

    public function getTipfin()
    {
        $dato = H::GetX('Codlic','Lireglic','numemo',$this->codlic);
        $dato2 = H::GetX('Numemo','Limemoran','codfin',$dato);
        return  H::GetX('Codfin','Fortipfin','nomext',$dato2);
    }

    public function getNompro()
    {
        $dato = H::GetX('Codlic','Lireglic','numemo',$this->codlic);
        return  H::GetX('Numemo','Limemoran','nompro',$dato);
    }

    public function getDeslic()
    {
        return H::GetX('Codlic','Lireglic','deslic',$this->codlic);
    }

    public function getDecretos()
    {
        return H::GetX('Codlic','Lireglic','decretos',$this->codlic);
    }

    public function getModad()
    {
        $dato = H::GetX('Codlic','Lireglic','litiplic_id',$this->codlic);
        return  H::GetX('id','Litiplic','destiplic  ',$dato);
    }


}
