<?php

/**
 * Subclase para representar una fila de la tabla 'npdefmov'.
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
class Npdefmov extends BaseNpdefmov
{
  private $monto = '';
  private $cantidad = '';
  //private $check = '';

  public function getNomnom()
  {
    return Herramientas::getX('codnom','Npnomina','nomnom',self::getCodnom());
  }

  public function getNomcon()
  {
    return Herramientas::getX('codcon','Npdefcpt','nomcon',self::getCodcon());
  }

  public function getMonto()
  {
	return $this->monto;
  }

  public function getCantidad()
  {
	return $this->cantidad;
  }

  public function setMonto($val)
  {
	$this->monto = $val;
  }

  public function setCantidad($val)
  {
	$this->cantidad = $val;
  }

 /*   public function getCheck()
  {
	return $this->check;
  }

  public function setCheck($val)
  {
	$this->check = $val;
  }*/


}
