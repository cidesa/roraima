<?php

/**
 * Subclase para representar una fila de la tabla 'npdefrepcon'.
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
class Npdefrepcon extends BaseNpdefrepcon
{
    protected $grid=array();

    public function getNomcon()
    {
        return H::GetX('Codcon','Npdefcpt','Nomcon',$this->codcon);
    }
    public function getSumtot()
    {
        if($this->sumtot=='0' || $this->sumtot=='' )
        {
            return null;
        }else
        {
            return $this->sumtot;
        }
    }

}
