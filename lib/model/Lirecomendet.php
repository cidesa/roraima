<?php

/**
 * Subclase para representar una fila de la tabla 'lirecomendet'.
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
class Lirecomendet extends BaseLirecomendet
{
    public function getNompro()
    {
        return H::GetX('Codpro','Caprovee','Nompro',$this->codpro);
    }

    public function getRifpro()
    {
        return H::GetX('Codpro','Caprovee','Rifpro',$this->codpro);
    }

    public function getNomrepleg()
    {
        return H::GetX('Codpro','Caprovee','Nomrepleg',$this->codpro);
    }

    public function getDestipemp()
    {
        $val = H::GetX('Codpro','Liregofe','Codtipemp',$this->codpro);
        return H::GetX('Codemp','Litipemp','desemp',$val);
    }
}
