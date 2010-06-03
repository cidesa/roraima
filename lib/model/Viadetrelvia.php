<?php

/**
 * Subclase para representar una fila de la tabla 'viadetrelvia'.
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
class Viadetrelvia extends BaseViadetrelvia
{
    public function getNomemp()
    {
        return H::GetX('Codemp','Nphojint','Nomemp',$this->codemp);
    }
    public function getNomcat()
    {
        return H::GetX('Codcat','Npcatpre','Nomcat',$this->codcat);
    }
    public function getNompar()
    {
        return H::GetX('Codpar','Nppartidas','Nompar',$this->codpar);
    }    
}
