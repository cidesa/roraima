<?php

/**
 * Subclass for performing query and update operations on the 'fordefobjnvaeta' table.
 *
 *
 *
 * @package lib.model
 */
class FordefobjnvaetaPeer extends BaseFordefobjnvaetaPeer
{
  public static function getObjnvaeta($codigo1)
  {
  	return Herramientas::getX('CODOBJNVAETA','Fordefobjnvaeta','Desobjnvaeta',$codigo1);
  }
}
