<?php

/**
 * Subclass for representing a row from the 'cpasiini'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Cpasiini.php 35042 2009-11-26 01:33:34Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpasiini extends BaseCpasiini
{
	protected $obj = array();
	protected $monmov = '';
	protected $nommov= '';
	protected $pormov= '';

    public function AfterHydrate() {

    }

    public function getNompre() {
    	return Herramientas::getX('codpre','cpdeftit','nompre',self::getCodpre());
    }

    public function getAsiper() {
    	$cpdefniv=CpdefnivPeer::doSelectOne(new Criteria());
		if ($cpdefniv->getasiper()=='S') {
			return 'S';
		} else 'N';
    }
}
