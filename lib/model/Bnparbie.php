<?php

/**
 * Subclass for representing a row from the 'bnparbie' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Bnparbie extends BaseBnparbie
{
  public function getNompardes()
   {  	
  	return Herramientas::getX('codpar','nppartidas','nompar',self::getPardes());  	
   }
   
  public function getNomparhas()
  {
  	 return Herramientas::getX('codpar','nppartidas','nompar',self::getParhas());  	
   }
}
