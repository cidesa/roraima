<?php

/**
 * Subclase para representar una fila de la tabla 'npconfon'.
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
class Npconfon extends BaseNpconfon
{

 private $check = '';


 public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
	return $this->check;
  }


  public function getNomnom()
  {
	return Herramientas::getX('CODNOM','Npnomina','Nomnom',self::getCodnom());
  }

  public function getNomcon()
  {
	return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
  }






}
