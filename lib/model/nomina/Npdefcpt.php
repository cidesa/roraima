<?php

/**
 * Subclase para representar una fila de la tabla 'npdefcpt'.
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
class Npdefcpt extends BaseNpdefcpt
{
  protected $objnominas=array();

  public function getestado()
  {
    if (($this->getConact())=='S')
      return 'Activo';
    else
        return 'Inactivo';
    }

  public function getNompar(){
    return Herramientas::getX('codpar','Nppartidas','nompar',self::getCodpar());
  }

  public function setCheck($val)
  {
    $this->check = $val;
  }

  public function getCheck()
  {
    return $this->check;
  }

}
