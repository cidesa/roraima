<?php

/**
 * Subclase para representar una fila de la tabla 'viaasoproniv'.
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
class Viaasoproniv extends BaseViaasoproniv
{
    public function getDesproced()
    {
        return H::Getx('Codproced','Viadefproced','Desproced',$this->codproced);
    }
    public function getDesnivapr()
    {
        return H::Getx('Codnivapr','Viadefnivapr','Desnivapr',$this->codnivapr);
    }

}
