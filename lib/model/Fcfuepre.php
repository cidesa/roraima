<?php

/**
 * Subclass for representing a row from the 'fcfuepre' table.
 *
 *
 *
 * @package lib.model
 */
class Fcfuepre extends BaseFcfuepre
{
  protected $fueing="";
  public function getDescta()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getIngrec());
  }

  public function getDescta1()
  {
    return Herramientas::getX('codcta','contabb','descta',self::getFueing());
  }

  public function getDescta2()
  {
    return Herramientas::getX('codpar','fcpreing','nompar',self::getCodprei());
  }

  public function getFueing()
  {
    return self::getCodfue();
  }

  public function getCodcta()
  {
    return self::getIngrec();
  }

  public function getCodparing()
  {
    return self::getCodprei();
  }

  public function getNomparing()
  {
    return Herramientas::getX('codparing','fordefparing','nomparing',self::getCodprei());
  }

  public function getCodrede()
  {
    return self::getFueing();
  }

  public function getDesrede()
  {
    return Herramientas::getX('desrede','fcrecdes','codrede',self::getFueing());
  }


}
