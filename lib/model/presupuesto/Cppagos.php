<?php

/**
 * Subclass for representing a row from the 'cppagos'.
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
class Cppagos extends BaseCppagos
{
	protected $reflib = '';
	protected $numcue = '';
	protected $salpag = 0.00;
	protected $salaju2 = 0.00;
	protected $totnet = 0.00;
	protected $msganulado = "";


  public function afterHydrate(){
    $this->reflib = Herramientas::getX('refpag','tsmovlib','reflib',self::getRefpag());
    $this->numcue = Herramientas::getX('refpag','tsmovlib','numcue',self::getRefpag());
    $this->salpag = H::FormatoMonto($this->getMonpag() - $this->getSalaju());
    $this->nomext = Herramientas::getX('TIPPAG','Cpdocpag','Nomext',self::getTippag());
	//$this->desprc = Herramientas::getX_vacio('REFPRC','Cpprecom','Desprc',self::getRefprc());
	//$this->nomben = Herramientas::getX_vacio('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }

  public function getRefmov()
  {
    return self::getRefpag();
  }

  public function getMsganulado() {
	$c = new Criteria();
   	$c->add(CppagosPeer::REFPAG,$this->getRefpag());
   	$reg = CppagosPeer::doSelectOne($c);

	if($reg){
		if ($reg->getStapag()=='N'){
			if($reg->getFecanu()){
	   			return "ANULADO EL ".$reg->getFecanu2();
			}else return "";
		}
	}
  }

  	public function getFecanu2($format = 'd/m/Y') {
  		return parent::getFecanu($format);
  	}

  	public function getSalaju2(){
  		if (parent::getSalaju()<0){
  			return $this->salaju2 = H::FormatoMonto((-1)*parent::getSalaju());
  		}else return $this->salaju2 = H::FormatoMonto(parent::getSalaju());
  	}
}
