<?php

/**
 * Subclass for representing a row from the 'inprofes'.
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
