<?php

/**
 * Subclass for representing a row from the 'bnparbie'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
