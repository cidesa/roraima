<?php

/**
 * Subclase para representar una fila de la tabla 'lidetcomint'.
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
class Lidetcomint extends BaseLidetcomint
{
    public function getCoduniste()
    {
        return H::getX('Numsol','Lisolegr','Coduniste',$this->numsol);
    }

    public function getDesuniste()
    {
        $cod = H::getX('Numsol','Lisolegr','Coduniste',$this->numsol);
        return H::getX('Coduniste','Lidatste','Desuniste',$cod);
    }

    public function getCampoId()
    {
        return H::getX('Numsol','Lisolegr','Id',$this->numsol);
    }

    public function getMontote()
    {      
      $val = H::GetX('Numsol','Lisolegr','Valcam',$this->numsol);      
      if($val>0)
        return H::FormatoMonto(self::getMontot()/$val);
      else
        return '';
    }
}
