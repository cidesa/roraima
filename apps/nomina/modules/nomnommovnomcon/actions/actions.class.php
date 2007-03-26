<?php

/**
 * nomnommovnomcon actions.
 *
 * @package    siga
 * @subpackage nomnommovnomcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnommovnomconActions extends autonomnommovnomconActions
{
	protected function addFiltersCriteria($c)
	{
		$this->sql = "Npasiconemp.codcon IN (select distinct npdefmov.codcon from npdefmov, npnomina where npdefmov.codnom=npnomina.codnom)";
		$c->add(NpasiconempPeer::CODCON, $this->sql, Criteria::CUSTOM);

		//parent::addFiltersCriteria($c);
		if (isset($this->filters['codemp_is_empty']))
		{
			$criterion = $c->getNewCriterion(NpasiconempPeer::CODEMP, '');
			$criterion->addOr($c->getNewCriterion(NpasiconempPeer::CODEMP, null, Criteria::ISNULL));
			$c->add($criterion);
		}
		else if (isset($this->filters['codemp']) && $this->filters['codemp'] !== '')
		{
			$c->add(NpasiconempPeer::CODEMP, strtr(str_pad($this->filters['codemp'], 16, ' '), '*', '%'), Criteria::LIKE);
		}
		if (isset($this->filters['codcon_is_empty']))
		{
			$criterion = $c->getNewCriterion(NpasiconempPeer::CODCON, '');
			$criterion->addOr($c->getNewCriterion(NpasiconempPeer::CODCON, null, Criteria::ISNULL));
			$c->add($criterion);
		}
		else if (isset($this->filters['codcon']) && $this->filters['codcon'] !== '')
		{
			$c->add(NpasiconempPeer::CODCON, strtr($this->filters['codcon'], '*', '%'), Criteria::LIKE);
		}
		if (isset($this->filters['codcar_is_empty']))
		{
			$criterion = $c->getNewCriterion(NpasiconempPeer::CODCAR, '');
			$criterion->addOr($c->getNewCriterion(NpasiconempPeer::CODCAR, null, Criteria::ISNULL));
			$c->add($criterion);
		}
		else if (isset($this->filters['codcar']) && $this->filters['codcar'] !== '')
    {
      $c->add(NpasiconempPeer::CODCAR, strtr($this->filters['codcar'], '*', '%'), Criteria::LIKE);
    }		
	}

	protected function updateNpasiconempFromRequest()
	{
		$npasiconemp = $this->getRequestParameter('npasiconemp');

		if (isset($npasiconemp['codemp']))
		{
			$this->npasiconemp->setCodemp(str_pad($npasiconemp['codemp'], 16, " "));
		}
		if (isset($npasiconemp['nomemp']))
		{
			$this->npasiconemp->setNomemp($npasiconemp['nomemp']);
		}
		if (isset($npasiconemp['codcar']))
		{
			$this->npasiconemp->setCodcar($npasiconemp['codcar']);
		}
		if (isset($npasiconemp['nomcar']))
		{
			$this->npasiconemp->setNomcar($npasiconemp['nomcar']);
		}
		if (isset($npasiconemp['monto']))
		{
			$this->npasiconemp->setMonto($npasiconemp['monto']);
		}
		if (isset($npasiconemp['cantidad']))
		{
			$this->npasiconemp->setCantidad($npasiconemp['cantidad']);
		}
	}
	
}
