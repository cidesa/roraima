<?php

/**
 * Subclass for performing query and update operations on the 'fordefobjestnvaeta' table.
 *
 *
 *
 * @package lib.model
 */
class FordefobjestnvaetaPeer extends BaseFordefobjestnvaetaPeer
{
  public static function getObjnvaeta($codigo1)
  {
  	return Herramientas::getX('CODOBJNVAETA','Fordefobjestnvaeta','Desobjnvaeta',$codigo1);
  }
}
