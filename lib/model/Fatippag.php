<?php

/**
 * Subclass for representing a row from the 'fatippag'.
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
class Fatippag extends BaseFatippag
{
	protected $monpag="0,00";
	protected $codban="";
	protected $numide2="";
	protected $codtip="";
	protected $desban="";
	protected $fatippagId=0;

   public function getFatippagId(){
     return self::getId();
  }
  
  public function getMonpag($val=false)
  {
    if($val) return number_format($this->monpag,2,',','.');
    else return $this->monpag;

  }
  
   public function setMonpag($val)
   {
     $this->monpag = $val;
   }
}
