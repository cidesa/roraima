<?php

/**
 * Subclass for representing a row from the 'inrecaud'.
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
class Inrecaud extends BaseInrecaud
{
	  protected $codgrup="";
      protected $desgrup="";

      public function afterHydrate(){
 	  $recaudo=$this->getIngruprec();
 	  if ($recaudo)
 	  {
        $this->codgrup=$recaudo->getCodgrup();
        $this->desgrup=$recaudo->getDesgrup();
 	  }
 }


}
