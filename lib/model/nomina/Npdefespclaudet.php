<?php

/**
 * Subclase para representar una fila de la tabla 'npdefespclaudet'.
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
class Npdefespclaudet extends BaseNpdefespclaudet
{
    protected $objclau=array();

    public function getNomnom()
    {
        return H::GetX('Codnom','Npnomina','Nomnom',$this->codnom);
    }

    public function getNompar()
    {
        return H::GetX('Codpar','Nppartidas','Nompar',$this->codpar);
    }
    public function getDesret()
    {
        return H::GetX('Codret','Nptipret','Desret',$this->codret);
    }
}
