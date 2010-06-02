<?php

/**
 * Subclase para representar una fila de la tabla 'viacalrub'.
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
class Viacalrub extends BaseViacalrub
{
    protected $grid=array();

    public function getDesrub()
    {
        return H::GetX('Codrub','Viadefrub','Desrub',$this->codrub);
    }

    public function getDesnivtra()
    {
        $c = new Criteria();
        $c->add(ViadefrubPeer::CODRUB,$this->codrub);
        $per = ViadefrubPeer::doSelectOne($c);

        if($per)
            if($per->getTiprub()=='1')
                return H::GetX('Codniv','Viadefniv','Desniv',$this->codnivtra);
            else
                return H::GetX('Codtiptra','Viadeftiptra','Destiptra',$this->codnivtra);
        else return '';
    }
}
