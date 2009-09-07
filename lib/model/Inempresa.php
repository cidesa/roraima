<?php

/**
 * Subclass for representing a row from the 'inempresa'.
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
