<?php

/**
 * Subclase para representar una fila de la tabla 'npasiconemp'.
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
class Npasiconemp extends BaseNpasiconemp
{

   private $check = '';
   private $status = '';
   protected $codnom = '';
   protected $codnom2='';
   protected $grid='';
   

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
        parent::hydrate($rs, $startcol);
	    $c = new Criteria();
		$c->add(NpasiconnomPeer::CODCON,self::getCodcon());
		$nomina = NpasiconnomPeer::doSelectone($c);
		if ($nomina)
			$this->codnom2 = $nomina->getCodnom();
	    $c = new Criteria();
		$c->add(NpdefmovPeer::CODCON,self::getCodcon());
		$c->addJoin(NpnominaPeer::CODNOM,NpdefmovPeer::CODNOM);
		$nomnom = NpnominaPeer::doSelectone($c);
		if ($nomnom)
		   $this->codnom = $nomnom->getCodnom();
   }



  public function setCheck($val)
  {
	$this->check = $val;
  }

  public function getCheck()
  {
     return $this->check;
  }

 public function getCheck_gri()
  {
	return $this->check;
  }

	public function getNomemp()
	{
		$c = new Criteria();
		$c->add(NphojintPeer::CODEMP,self::getCodemp());
		$nomemp = NphojintPeer::doSelectone($c);
		if ($nomemp)
		return $nomemp->getNomemp();
		else
		return ' ';
	}
	public function getNomcar()
	{
		$c = new Criteria();
		$c->add(NpcargosPeer::CODCAR,self::getCodcar());
		$nomcar = NpcargosPeer::doSelectone($c);
		if ($nomcar)
		return $nomcar->getNomcar();
		else
		return ' ';
	}



	public function getNomnom()
	{
		$c = new Criteria();
		$c->add(NpnominaPeer::CODNOM,$this->codnom);
		$nomnom = NpnominaPeer::doSelectone($c);
		if ($nomnom)
		return $nomnom->getNomnom();
		else
		return ' ';
	}

	public function getNomcon()
	{
		$c = new Criteria();
		$c->add(NpdefcptPeer::CODCON,self::getCodcon());
		$nomcon = NpdefcptPeer::doSelectone($c);
		if ($nomcon)
		return $nomcon->getNomcon();
		else
		return ' ';
	}

	public function getStatus()
	{
		$c = new Criteria();
		$c->add(NpdefmovPeer::CODCON,self::getCodcon());
		$nomcon = NpdefmovPeer::doSelectOne($c);
		if ($nomcon)
		return $nomcon->getStatus();
		else
		return ' ';
	}

  public function getDesnom()
  {
    $c = new Criteria();
    $c->add(NpnominaPeer::CODNOM, $this->codnom2);
	$nomnom = NpnominaPeer::doSelectone($c);
	if ($nomnom)
	return $nomnom->getNomnom();
	else return '';
  }
}
