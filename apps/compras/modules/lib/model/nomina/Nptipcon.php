<?php

/**
 * Subclase para representar una fila de la tabla 'nptipcon'.
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
class Nptipcon extends BaseNptipcon
{
	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpasinomcontPeer::CODTIPCON,self::getCodtipcon());
		$c->addJoin(NpnominaPeer::CODNOM,NpasinomcontPeer::CODNOM);
		$codnom = NpnominaPeer::doSelectone($c);
		if ($codnom){
			return $codnom->getNomnom();
		}else{
			return ' ';
		}
	}

	public function getAnovig()
	{
		return Herramientas::getX('CODTIPCON','Npbonocont','Anovig',self::getCodtipcon());
	}

	public function getAnovighas()
	{
		return Herramientas::getX('CODTIPCON','Npbonocont','Anovighas',self::getCodtipcon());
	}


}
