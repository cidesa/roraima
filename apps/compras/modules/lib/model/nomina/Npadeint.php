<?php

/**
 * Subclase para representar una fila de la tabla 'npadeint'.
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
