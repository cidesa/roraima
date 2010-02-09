<?php

/**
 * Subclass for representing a row from the 'cpcompro'.
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
class Cpcompro extends BaseCpcompro {

	protected $obj = array();
	protected $check = "";
	protected $check2 = "";
    protected $nompro = "";
    protected $salcom = 0;
    protected $msganulado = "";

	public function afterHydrate() {
		$this->nompro = Herramientas::getX('RIFPRO','Caprovee','Nompro',self::getCedrif());
		$this->salcom = H::FormatoMonto($this->getMoncom() - $this->getSalaju());
		$this->nomext = Herramientas::getX_vacio('TIPCOM','Cpdoccom','Nomext',self::getTipcom());
		$this->desprc = Herramientas::getX_vacio('REFPRC','Cpprecom','Desprc',self::getRefprc());
		$this->nomben = Herramientas::getX_vacio('CEDRIF','Opbenefi','Nomben',self::getCedrif());
	}

	public function getRefmov() {
		return self::getRefcom();
	}

	public function getMsganulado() {
   		$c = new Criteria();
    	$c->add(CpcomproPeer::REFCOM,$this->getRefcom());
    	$reg = CpcomproPeer::doSelectOne($c);

		if($reg){
			if ($reg->getStacom()=='N'){
				if($reg->getFecanu()){
		   			return "ANULADO EL ".$reg->getFecanu2();
				}else return "";
			}
		}
  	}

  	public function getFecanu2($format = 'd/m/Y') {
  		return parent::getFecanu($format);
  	}
}
