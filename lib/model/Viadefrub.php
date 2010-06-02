<?php

/**
 * Subclase para representar una fila de la tabla 'viadefrub'.
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
class Viadefrub extends BaseViadefrub
{
    public function getNompar()
    {
        return H::GetX('Codpar','Nppartidas','Nompar',$this->codpar);
    }
    public function getLtipo()
    {
        return $this->tipo=='C' ? 'Calculable por Tabla' : 'Monto Manual';
    }

    public function getLtiprub()
    {
        return $this->tiprub=='1' ? 'Alojamiento y Hospedaje' : ($this->tiprub=='2' ? 'Transporte' : 'Otros') ;
    }
}
