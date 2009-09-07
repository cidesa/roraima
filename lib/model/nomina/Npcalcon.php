<?php

/**
 * Subclase para representar una fila de la tabla 'npcalcon'.
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
class Npcalcon extends BaseNpcalcon
{
  public function getNomcon()
  {
    return Herramientas::getX('codcon','npdefcpt','nomcon',self::getCodcon());
  }
  public function getNomnom()
  {
    return Herramientas::getX('codnom','npnomina','nomnom',self::getCodnom());
  }

/*  public function getConfor()
  {
  	print parent::getConfor();
  	return htmlspecialchars(parent::getConfor());
  }
*/
}
