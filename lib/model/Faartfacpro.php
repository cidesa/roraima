<?php

/**
 * Subclase para representar una fila de la tabla 'faartfacpro'.
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
class Faartfacpro extends BaseFaartfacpro
{
    protected $rifpro='';
    protected $check='';
    public function getEstatus()
    {
        if($this->estatus=='')
          $sta='N';
        else
          $sta=$this->estatus;
        return $sta;
    }
    public function afterHydrate()
    {
        if($this->codart!='')
            $this->check=true;
        else
            $this->check=false;
    }

}
