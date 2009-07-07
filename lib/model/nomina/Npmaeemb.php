<?php

/**
 * Subclass for representing a row from the 'npmaeemb' table.
 *
 * 
 *
 * @package lib.model.nomina
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
