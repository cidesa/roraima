<?php

/**
 * Subclass for representing a row from the 'cpdefniv'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Cpdefniv.php 35042 2009-11-26 01:33:34Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpdefniv extends BaseCpdefniv
{
	protected $nomemp='';
	protected $gridper= array();

	public function afterHydrate(){
		$this->nomemp = H::getX('CODEMP','Empresa','nomemp',self::getCodemp());
	}
}
