<?php

/**
 * Subclass for representing a row from the 'npadeint' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Npadeint extends BaseNpadeint
{
	protected $codtipcon='';
	protected $destipcon='';
	protected $nomemp='';
	protected $monantint=0;
	
   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->codtipcon=self::getCodcon();
   }
   
	public  function getDestipcon()
	{
		return H::getx('Codtipcon','Nptipcon','destipcon',self::getCodcon());	
	}
	public  function getNomemp()
	{
		return H::getx('Codemp','Nphojint','Nomemp',self::getCodemp());	
	}
	public  function getMonantint()
	{
		return H::formatoMonto(H::getx('Codemp','nppresoc','Intacu',self::getCodemp()));	
	}
}
