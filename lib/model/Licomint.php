<?php

/**
 * Subclase para representar una fila de la tabla 'licomint'.
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
class Licomint extends BaseLicomint
{
    protected  $respon;
    protected  $objreq=array();
    protected  $objart=array();
    protected  $obj=array();
    protected  $check=false;

    public function getRespon()
    {
        return H::getX('Codcom','Licomlic','Respon',$this->codcom);
    }

    public function getDescom()
    {
        return H::getX('Codcom','Licomlic','Descom',$this->codcom);
    }
}
