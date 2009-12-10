<?php

/**
 * Subclass for representing a row from the 'cpcausad'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author:lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id:Cpcausad.php 35042 2009-11-26 01:33:34Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Cpcausad extends BaseCpcausad
{
  protected $salaju2=0;
  protected $salpre=0;
  protected $totpag=0;
  protected $msganulado="";

  public function afterHydrate(){
    	$this->nomext = Herramientas::getX_vacio('TIPCAU','Cpdoccau','Nomext',self::getTipcau());
		$this->descom = Herramientas::getX_vacio('REFCOM','Cpcompro','Descom',self::getRefcom());
		$this->nomben = Herramientas::getX_vacio('CEDRIF','Opbenefi','Nomben',self::getCedrif());
  }


   public function getMsganulado(){
   	$c = new Criteria();
    $c->add(CpcausadPeer::REFCAU,$this->getRefcau());
    $reg = CpcausadPeer::doSelectOne($c);

	if($reg){
		if($reg->getFecanu()){
		   	return "ANULADO EL ".$reg->getFecanu2();
		}else return "";
	}
  }

   public function getFecanu2($format = 'd/m/Y') {
    	return parent::getFecanu($format);
    }

  public function getSalpre(){
  	return H::FormatoMonto($this->getMoncau() - $this->getSalaju());
  }
  public function getSalaju2(){
  	if($this->getSalaju()<0){
  		return $this->salaju2=H::FormatoMonto($this->getSalaju()*-1);
  	}else{
  		return $this->salaju2=H::FormatoMonto($this->getSalaju());
  	}

  }

  public function getRefmov()
  {
    return self::getRefcau();
  }
}
