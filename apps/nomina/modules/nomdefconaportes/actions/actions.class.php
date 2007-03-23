<?php

/**
 * nomdefconaportes actions.
 *
 * @package    siga
 * @subpackage nomdefconaportes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomdefconaportesActions extends autonomdefconaportesActions
{
  protected function updateNpcontipaporetFromRequest()
  {
    $npcontipaporet = $this->getRequestParameter('npcontipaporet');

    if (isset($npcontipaporet['codtipapo']))
    {
      $this->npcontipaporet->setCodtipapo(str_pad($npcontipaporet['codtipapo'],4,'0',STR_PAD_LEFT));
    }
    if (isset($npcontipaporet['destipapo']))
    {
      $this->npcontipaporet->setDestipapo($npcontipaporet['destipapo']);
    }
    if (isset($npcontipaporet['codnom']))
    {
      $this->npcontipaporet->setCodnom($npcontipaporet['codnom']);
    }
    if (isset($npcontipaporet['nomina']))
    {
      $this->npcontipaporet->setNomina($npcontipaporet['nomina']);
    }
    if (isset($npcontipaporet['codcon']))
    {
      $this->npcontipaporet->setCodcon($npcontipaporet['codcon']);
    }
    if (isset($npcontipaporet['concepto']))
    {
      $this->npcontipaporet->setConcepto($npcontipaporet['concepto']);
    }

    $this->npcontipaporet->setTipo('A');

    
  }

  protected function getNpcontipaporetOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $npcontipaporet = new Npcontipaporet();
    }
    else
    {
      $npcontipaporet = NpcontipaporetPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($npcontipaporet);
    }

    return $npcontipaporet;
  }

  protected function processFilters()
  {
    if ($this->getRequest()->hasParameter('filter'))
    {
      $filters = $this->getRequestParameter('filters');

      $this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/npcontipaporet/filters');
      $this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/npcontipaporet/filters');
    }
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/npcontipaporet/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/npcontipaporet/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/npcontipaporet/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codtipapo_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpcontipaporetPeer::CODTIPAPO, '');
      $criterion->addOr($c->getNewCriterion(NpcontipaporetPeer::CODTIPAPO, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codtipapo']) && $this->filters['codtipapo'] !== '')
    {
      $c->add(NpcontipaporetPeer::CODTIPAPO, strtr($this->filters['codtipapo'], '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['codcon_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpcontipaporetPeer::CODCON, '');
      $criterion->addOr($c->getNewCriterion(NpcontipaporetPeer::CODCON, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codcon']) && $this->filters['codcon'] !== '')
    {
      $c->add(NpcontipaporetPeer::CODCON, strtr($this->filters['codcon'], '*', '%'), Criteria::LIKE);
    }
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/npcontipaporet/sort'))
    {
      $sort_column = NpcontipaporetPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/npcontipaporet/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'npcontipaporet{codtipapo}' => 'Cod. de Retencion:',
      'npcontipaporet{destipapo}' => 'Retencion:',
      'npcontipaporet{codnom}' => 'Cod. de Nomina:',
      'npcontipaporet{nomina}' => 'Nomina:',
      'npcontipaporet{codcon}' => 'Cod. de Concepto:',
      'npcontipaporet{concepto}' => 'Concepto:',
    );
  }	
}
