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
  

}
