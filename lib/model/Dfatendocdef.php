<?php

/**
 * Subclass for representing a row from the 'dfatendocdef' table.
 *
 *
 *
 * @package lib.model
 */
class Dfatendocdef extends BaseDfatendocdef
{

  public function getCoddoc(){

    return Herramientas::getX('id','dfatendoc','coddoc',self::getIdDfatendoc());

  }

  public function getNomuse(){

    return Herramientas::getX('id','usuarios','nomuse',self::getIdUsuarios());

  }


  public function getNomunio(){

    return Herramientas::getX('id','acunidad','nomuni', self::getIdNumuniori());


  }

  public function getNomunid(){

    return Herramientas::getX('id','acunidad','nomuni',self::getIdNumuni());


  }


}
