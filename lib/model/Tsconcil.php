<?php

/**
 * Subclass for representing a row from the 'tsconcil'.
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
class Tsconcil extends BaseTsconcil
{
    protected $ano="";
    protected $movtxt="0";

   public function getAno()
   {
      $contaba=ContabaPeer::doSelectOne(new Criteria());
      if ($contaba)
        $anno=substr($contaba->getFecini(),0,4);
      else $anno=date('Y');
     return $anno;
}

   public function setAno()
   {
     return $this->ano;
   }
}
