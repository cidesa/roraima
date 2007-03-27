<?php

/**
 * Subclass for representing a row from the 'fordefparing' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefparing extends BaseFordefparing
{
	public function getMontoing()
	{
		$c = new Criteria();
		$c->add(ForparingPeer::CODPARING,str_pad(self::getCodparing(),32,' '));
		$montoing = ForparingPeer::doSelectone($c);
		if ($montoing)
	  	  #return $montoing->getMontoing();
	  	  return number_format($montoing->getMontoing(),2,'.',',');
	  	  else
	  	  return number_format('0.00',2,'.',',');
	}

	public function getCodtipfin()
	{
		$c = new Criteria();
		$c->add(ForparingPeer::CODPARING,str_pad(self::getCodparing(),32,' '));
		$rs = ForparingPeer::doSelectone($c);
		if ($rs)
			return $rs->getcodtipfin();		
	  	  else
	  	  	return ' ';
	}	
	
	
	public function getNomext()
	{
		$c = new Criteria();
		$c->add(ForparingPeer::CODPARING,str_pad(self::getCodparing(),32,' '));
		$c->addJoin(FortipfinPeer::CODFIN,ForparingPeer::CODTIPFIN);
		$nomext = FortipfinPeer::doSelectone($c);
		if ($nomext)		
		    return $nomext->getNomext();
	    else 
	        return ' 1';
    }	    
}
