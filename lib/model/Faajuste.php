<?php

/**
 * Subclass for representing a row from the 'faajuste'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Faajuste.php 34082 2009-10-16 14:15:16Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Faajuste extends BaseFaajuste
{
	public $obj = array();

	public $codpro = '';

	public function getCodpro()
    {
    	$codpro = '';
        $c = new Criteria();
  		$c->add(FaajustePeer::REFAJU,self::getRefaju());
  		$datos = FaajustePeer::doSelectOne($c);
  		if ($datos){
			if ($datos->getTipaju() == 'P'){
				$c1 = new Criteria();
				$c1->add(FapedidoPeer::NROPED, $datos->getCodref());
				$reg1 = FapedidoPeer::doSelectOne($c1);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
			else if ($datos->getTipaju() == 'NE'){
				$c1 = new Criteria();
				$c1->add(FanotentPeer::NRONOT, $datos->getCodref());
				$reg1 = FanotentPeer::doSelectOne($c1);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
			else if ($datos->getTipaju() == 'F'){
				$c1 = new Criteria();
				$c1->add(FafacturPeer::REFFAC, $datos->getCodref());
				$reg1 = FafacturPeer::doSelectOne($c1);
				if ($reg1){
					$codpro = $reg1->getCodcli();
				}
			}
  		}
  		else{
  			$codpro = '';
  		}

        return $codpro;
    }

	public function getRifpro()
    {
        return Herramientas::getX('CODPRO','Facliente','Rifpro',self::getCodpro());
    }

    public function getNompro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Nompro',self::getCodpro());
    }

    public function getDirpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Dirpro',self::getCodpro());
    }

    public function getTelpro()
    {
  	    return Herramientas::getX('CODPRO','Facliente','Telpro',self::getCodpro());
    }

}