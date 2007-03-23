<?php

/**
 * presnomreghisantpre actions.
 *
 * @package    siga
 * @subpackage presnomreghisantpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomreghisantpreActions extends autopresnomreghisantpreActions
{
  protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['codemp_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpantprePeer::CODEMP, '');
      $criterion->addOr($c->getNewCriterion(NpantprePeer::CODEMP, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['codemp']) && $this->filters['codemp'] !== '')
    {
      $c->add(NpantprePeer::CODEMP, strtr(str_pad($this->filters['codemp'],16,' '), '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['fecant_is_empty']))
    {
      $criterion = $c->getNewCriterion(NpantprePeer::FECANT, '');
      $criterion->addOr($c->getNewCriterion(NpantprePeer::FECANT, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['fecant']))
    {
      if (isset($this->filters['fecant']['from']) && $this->filters['fecant']['from'] !== '')
      {
        $criterion = $c->getNewCriterion(NpantprePeer::FECANT, date('Y-m-d', $this->filters['fecant']['from']), Criteria::GREATER_EQUAL);
      }
      if (isset($this->filters['fecant']['to']) && $this->filters['fecant']['to'] !== '')
      {
        if (isset($criterion))
        {
          $criterion->addAnd($c->getNewCriterion(NpantprePeer::FECANT, date('Y-m-d', $this->filters['fecant']['to']), Criteria::LESS_EQUAL));
        }
        else
        {
          $criterion = $c->getNewCriterion(NpantprePeer::FECANT, date('Y-m-d', $this->filters['fecant']['to']), Criteria::LESS_EQUAL);
        }
      }

      if (isset($criterion))
      {
        $c->add($criterion);
      }
    }
  }
}
