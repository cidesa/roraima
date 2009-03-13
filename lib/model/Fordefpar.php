<?php

/**
 * Subclass for representing a row from the 'fordefpar' table.
 *
 *
 *
 * @package lib.model
 */
class Fordefpar extends BaseFordefpar
{
	public function getDesest()
	{
		return Herramientas::getX('codest','fordefest','desest',self::getCodest());
    }

    public function getDesmun()
	{	$c = new Criteria();
    	$c->add(FordefmunPeer::CODEST,self::getCodest());
    	$c->add(FordefmunPeer::CODMUN,self::getCodmun());
        $result = FordefmunPeer::doSelectOne($c);
        if ($result)
           return $result->getDesmun();
        else
           return 'NO ENCONTRADO';

    }
}
