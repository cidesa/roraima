<?php

/**
 * Subclase para representar una fila de la tabla 'npasiempcont'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npasiempcont extends BaseNpasiempcont
{
	protected $montocalculado=0;
	protected $codasi='';
	  public function getDestipcon()
  {
  	  	  return Herramientas::getX('codtipcon','nptipcon','destipcon',self::getCodtipcon());
  }

 /* public function getMontocalculado(){
		$c= new Criteria();
	    $c->add(NpasiempcontPeer::CODTIPCON,$this->npsalint->getCodcon(),Criteria::EQUAL);
	    $c->add(NpasiempcontPeer::CODNOM,$this->npsalint->getCodnom(),Criteria::EQUAL);
	    $c->addJoin(NpsalintPeer :: CODEMP, NpasiempcontPeer :: CODEMP);
	    $per= NpasiempcontPeer::doSelectOne($c);
	    if ($per){

	    //$montocalculado= $per[0]->getMonasi() ;

	    }
  	return $montocalculado;
  }*/

}
