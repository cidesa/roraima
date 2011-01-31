<?php

/**
 * Subclass for representing a row from the 'fordefpar'.
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
