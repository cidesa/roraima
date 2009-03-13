<?php

/**
 * Subclass for representing a row from the 'npasiempcont' table.
 *
 *
 *
 * @package lib.model
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
