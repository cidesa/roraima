<?php

/**
 * Subclase para representar una fila de la tabla 'npasicon'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author: cramirez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Npasicon.php 40124 2010-08-11 21:20:13Z cramirez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npasicon extends BaseNpasicon
{
    public function getNomcon()
    {
        return H::GetX('Codcon','Npdefcpt','Nomcon',$this->codcon);
    }
    public function getCodpar()
    {
        return H::GetX('Codcon','Npdefcpt','Codpar',$this->codcon);
    }
    public function getNompar()
    {
        return H::GetX('Codpar','Nppartidas','Nompar',self::getCodpar());
    }
}
