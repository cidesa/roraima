<?php

/**
 * Subclass for representing a row from the 'inempresa' table.
 *
 *
 *
 * @package lib.model
 */
class Inempresa extends BaseInempresa
{
      protected $municipio = array();
      protected $parroquia = array();
      protected $codtipemp="";
      protected $destipemp="";

      public function afterHydrate(){
 	  $tipo=$this->getIntipemp();
 	  if ($tipo)
 	  {
        $this->codtipemp=$tipo->getCodtipemp();
        $this->destipemp=$tipo->getDestipemp();
 	  }
 }

}
