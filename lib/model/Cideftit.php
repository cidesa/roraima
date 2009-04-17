<?php

/**
 * Subclass for representing a row from the 'cideftit' table.
 *
 *
 *
 * @package lib.model
 */
class Cideftit extends BaseCideftit
{
  protected $grid= array();

  public function getCodigo1()
    {
     return self::getCodpre();
    }
    public function getNombre1()
    {
     return self::getNompre();
    }
  public function getDescta()
    {
      return Herramientas::getX('CODCTA','Contabb','Descta',self::getCodcta());
    }

  public function getMascara()
      {
      return Herramientas::getX('Codemp','Cidefniv','Forpre','001');

      }

    public function getLonpre()
      {
      return strlen(self::getMascara());

      }

    public function getMascaraConta()
      {
      return Herramientas::getX('Codemp','Contaba','Forcta','001');

      }

    public function getLoncta()
      {
      return strlen(self::getMascaraConta());

      }


}
