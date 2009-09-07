<?php

/**
 * Subclase para representar una fila de la tabla 'npcontra'.
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
class Npcontra extends BaseNpcontra
{
  public function getNomnom()
  {
  	$dato= Herramientas::getX('codnom','npnomina','Nomnom',self::getCodnom());
    return $dato;
  }

  public function getNomcon()
  {
  	$dato= Herramientas::getX('codcon','npdefcpt','Nomcon',self::getCodcon());
    return $dato;
  }
}
