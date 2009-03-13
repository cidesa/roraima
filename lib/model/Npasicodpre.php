<?php

/**
 * Subclass for representing a row from the 'npasicodpre' table.
 *
 *
 *
 * @package lib.model
 */
class Npasicodpre extends BaseNpasicodpre
{


  public function getNomcon()
  {
     return Herramientas::getX('CODCON','Npdefcpt','Nomcon',self::getCodcon());
  }

  public function getNomnom()
  {
  return Herramientas::getX('CODNOM','Npnomina','Nomnom',self::getCodnom());
  }

  public function getNompar()
  {
  return Herramientas::getX('CODPAR','Nppartidas','Nompar',self::getCodpre());
  }


}
