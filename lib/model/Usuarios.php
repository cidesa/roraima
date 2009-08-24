<?php

/**
 * Subclass for representing a row from the 'usuarios' table.
 *
 *
 *
 * @package lib.model
 */
class Usuarios extends BaseUsuarios
{
  protected $confirm = '';
  protected $password = '';
  protected $repassword = '';


  public function getNomuni(){

    return Herramientas::getX('id','acunidad','nomuni',self::getNumuni());
  }

  public function getDesniv(){

    return Herramientas::getX('CODNIV','Segnivapr','Desniv',self::getCodniv());
  }

}
