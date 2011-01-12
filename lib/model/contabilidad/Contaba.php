<?php

/**
 * Subclase para representar una fila de la tabla 'contaba'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Contaba.php 32405 2009-09-01 21:27:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Contaba extends BaseContaba{
	protected $grids=array();
	protected $descta = "";
	protected $descta2 = "";
	protected $esqori = "";
	protected $esqdes = "";


  public function afterHydrate(){
    $this->descta = Herramientas::getX('CODCTA','Contabb','descta',self::getCodresant());
    $this->descta2 = Herramientas::getX('CODCTA','Contabb','descta',self::getCodres());
  }

  public function getCodemp(){
  	return sfContext::getInstance()->getUser()->getAttribute('empresa');
  }

  public function getNomemp(){
	  	$c= new Criteria();
	    $c->add(EmpresaUserPeer::CODEMP,sfContext::getInstance()->getUser()->getAttribute('empresa'));

		$empresa = EmpresaUserPeer::doSelectOne($c);

		if($empresa) return $empresa->getNomemp();
		else return '';
	}

  public function getFecini2($format = 'd/m/Y'){
		return parent::getFecini($format);
  }

  public function getFeccie2($format = 'd/m/Y'){
		return parent::getFeccie($format);
  }

}
