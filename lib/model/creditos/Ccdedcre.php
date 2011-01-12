<?php

/**
 * Subclass for representing a row from the 'ccdedcre' table.
 *
 *
 *
 * @package lib.model
 */
class Ccdedcre extends BaseCcdedcre
{

    public function getNomded()
   {
     return Herramientas::getX('id','ccdeducc','nomded',self::getCcdeduccid());
   }

}
