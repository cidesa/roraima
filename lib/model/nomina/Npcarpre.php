<?php

/**
 * Subclase para representar una fila de la tabla 'npcarpre'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Npcarpre extends BaseNpcarpre
{
    protected $dispo='0,00';
    protected $objasig=array();

    public function getNomcat()
    {
        return H::GetX('Codcat','Fordefcatpre','Nomcat',$this->codcat);
    }
    public function getNomcar()
    {
        return H::GetX('Codcar','Npcargos','Nomcar',$this->codcar);
    }
    public function getDispo()
    {
        return H::FormatoMonto($this->monpre-$this->monasi);
    }
}
