<?php

/**
 * Subclass for representing a row from the 'inmulta'.
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
class Inmulta extends BaseInmulta
{
    protected $codsan="";
    protected $dessan="";


 public function afterHydrate(){
 	$sancion=$this->getInsancion();
 	if ($sancion)
 	{
      $this->codsan=$sancion->getCodsan();
      $this->dessan=$sancion->getDessan();
 	}
 }

}
