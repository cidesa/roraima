<?php

/**
 * Subclass for representing a row from the 'inrecaud' table.
 *
 *
 *
 * @package lib.model
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
