<?php

/**
 * Subclase para representar una fila de la tabla 'viadefniv'.
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
class Viadefniv extends BaseViadefniv
{
    protected $codnivaco='';
    
    public function getcodnivaco()
    {
    	return self::getCodniv();
    }

    public function getDesnivaco()
    {
    	return self::getDesniv();
    }
}
