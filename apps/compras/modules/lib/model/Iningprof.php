<?php

/**
 * Subclass for representing a row from the 'iningprof'.
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
class Iningprof extends BaseIningprof
{

	protected $codtipsol="";
    protected $destipsol="";


 public function afterHydrate(){
 	$tipsol=$this->getIntipsol();
 	if ($tipsol)
 	{
      $this->codtipsol=$tipsol->getCodtipsol();
      $this->destipsol=$tipsol->getDestipsol();
 	}
 }

}
