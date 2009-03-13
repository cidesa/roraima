<?php

/**
 * Subclass for representing a row from the 'npcalcon' table.
 *
 *
 *
 * @package lib.model
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
