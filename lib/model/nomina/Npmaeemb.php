<?php

/**
 * Subclase para representar una fila de la tabla 'npmaeemb'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2.nomina
 */ 
class Npmaeemb extends BaseNpmaeemb
{
	protected $codcon='';
	protected $nomcon='';
	protected $nomemp='';
	protected $desjuz='';
	
	public function hydrate(ResultSet $rs, $startcol = 1)
    {
      parent::hydrate($rs, $startcol);
      $this->codcon=self::getCodconemb();
    }	
	public function getNomcon()
	{
		return H::getX('Codcon','Npdefcpt','nomcon',self::getCodconemb());
	}
	public function getNomemp()
	{
		return H::getX('Codemp','Nphojint','nomemp',self::getCodemp());		
	}
	public function getDesjuz()
	{
		return H::getX('Codjuz','Npjuzgados','desjuz',self::getCodjuz());		
	}
}
