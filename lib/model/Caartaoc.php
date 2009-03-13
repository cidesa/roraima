<?php

/**
 * Subclass for representing a row from the 'caartaoc' table.
 *
 *
 *
 * @package lib.model
 */
class Caartaoc extends BaseCaartaoc
{

  function getCosart()
  {
    if  (self::getCanaju()!=0)
      return self::getMonaju() / self::getCanaju();
   else
      return 0.00;

  }

  function getDesart()
  {

    return Herramientas::getX('codart','caregart','desart',self::getCodart());

  }

  function getUnimed()
  {

    return Herramientas::getX('codart','caregart','unimed',self::getCodart());

  }



}
