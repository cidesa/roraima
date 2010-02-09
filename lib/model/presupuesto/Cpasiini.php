<?php

/**
 * Subclass for representing a row from the 'cpasiini'.
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
class Cpasiini extends BaseCpasiini
{
	protected $obj = array();
	protected $monmov = '';
	protected $nommov= '';
	protected $pormov= '';
    protected $asiper="";
    protected $numper=1;
    protected $mascarapre="";
    protected $lonpre="";
    protected $etadef="";

    public function AfterHydrate() {

    }

    public function getNompre() {
    	return Herramientas::getX('codpre','cpdeftit','nompre',self::getCodpre());
    }

    public function getAsiper() {
    	$cpdefniv=CpdefnivPeer::doSelectOne(new Criteria());
    	if ($cpdefniv){
		if ($cpdefniv->getAsiper()=='S') {
			return 'S';
		} else return 'N';
		} else return 'N';
    }

    public function setAsiper()
    {
        return $this->asiper;
    }

    public function getNumper() {
    	$cpdefniv=CpdefnivPeer::doSelectOne(new Criteria());
		if ($cpdefniv){
			return $cpdefniv->getNumper();
		} else return 1;
    }

    public function setNumper()
    {
        return $this->numper;
    }

    public function getEtadef() {
    	$cpdefniv=CpdefnivPeer::doSelectOne(new Criteria());
		if ($cpdefniv){
			return $cpdefniv->getEtadef();
		} else return 1;
    }

    public function setEtadef()
    {
        return $this->etadef;
    }


}
