<?php

/**
 * Subclase para representar una fila de la tabla 'viadeffortra'.
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
class Viadeffortra extends BaseViadeffortra
{
    protected $grid=array();
    protected $opt='';
    
    public function getDestiptra()
    {
        return H::getX('Codtiptra','Viadeftiptra','Destiptra',$this->codtiptra);
    }
}
