<?php

/**
 * Subclase para representar una fila de la tabla 'causualm'.
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
class Causualm extends BaseCausualm
{
    protected $grid=array();
    protected $check=0;
    protected $codest='';
    protected $todos='';

    public function getNomuse()
    {
        return H::getX('Cedemp','Usuarios','Nomuse',$this->cedemp);
    }

    public function getNomalm()
    {
        return H::getX('Codalm','Cadefalm','Nomalm',$this->codalm);
    }
}
