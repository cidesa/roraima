<?php

/**
 * Subclass for representing a row from the 'inprofes' table.
 *
 *
 *
 * @package lib.model
 */
class Inprofes extends BaseInprofes
{
	  protected $municipio = array();
      protected $parroquia = array();
      protected $codespeci="";
      protected $desespeci="";

      public function afterHydrate(){
 	  $especialidad=$this->getInespeci();
 	  if ($especialidad)
 	  {
        $this->codespeci=$especialidad->getCodespeci();
        $this->desespeci=$especialidad->getDesespeci();
 	  }
 }
}
