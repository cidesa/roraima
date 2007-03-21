<?php

/**
 * nomconceptossalariointegral actions.
 *
 * @package    siga
 * @subpackage nomconceptossalariointegral
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomconceptossalariointegralActions extends autonomconceptossalariointegralActions
{
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npconsalint/filters');

    // pager
    $this->pager = new sfPropelPager('Npconsalint', 5);
    $c = new Criteria();
    //$c->addJoin(NpconsalintPeer::CODNOM,NpnominaPeer::CODNOM);
    //$c->addJoin(NpconsalintPeer::CODCON,NpdefcptPeer::CODCON);
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
	
}
