<?php

/**
 * Subclass for representing a row from the 'liempofe'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Liempofe.php 32428 2009-09-02 04:18:52Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Liempofe extends BaseLiempofe
{
    protected $grid=array();
    protected $check='';

    public function getDescrip()
    {
        return H::GetX('Numexp','Liplieesp','Descrip',$this->numexp);
    }

    public function getNumplie()
    {
        return H::GetX('Numexp','Liplieesp','Numplie',$this->numexp);
    }

    public function getNompro()
    {
        return H::GetX('Codpro','Caprovee','Nompro',$this->codpro);
    }
}
