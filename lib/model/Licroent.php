<?php

/**
 * Subclase para representar una fila de la tabla 'licroent'.
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
class Licroent extends BaseLicroent
{
    public function getDesart()
    {
        return H::GetX('Codart','Caregart','Desart',$this->codart);
    }

    public function getDesuniste()
    {
        return H::GetX('Coduniste','Lidatste','Desuniste',$this->coduniadm);
    }

    public function getDir()
  {
      return H::GetX('Coduniste','Lidatste','Dirste',$this->coduniadm);
  }
}
