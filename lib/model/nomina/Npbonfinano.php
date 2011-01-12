<?php

/**
 * Subclase para representar una fila de la tabla 'npbonfinano'.
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
class Npbonfinano extends BaseNpbonfinano
{
    protected $obj=array();

    public function getNomnom()
    {
        return $dato = H::GetX('Codnom','Npnomina','Nomnom',$this->codnom);
    }
}
