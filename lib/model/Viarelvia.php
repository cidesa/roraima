<?php

/**
 * Subclase para representar una fila de la tabla 'viarelvia'.
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
class Viarelvia extends BaseViarelvia
{
    protected $grid=array();
    protected $totfac='0,00';

    public function getNomext()
    {
        return H::GetX('Tipcom','Cpdoccom','Nomext',$this->tipcom);
    }
    public function getFecha()
    {
        return self::getFecrel();
    }
    public function getDescrip()
    {
        return self::getDesrel();
    }
    public function getCompromiso()
    {
        return $this->refcom ? 'COMPROMISO NRO '.$this->refcom : '';
    }
}
