<?php

/**
 * pagbenfic actions.
 *
 * @package    siga
 * @subpackage pagbenfic
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class pagbenficActions extends autopagbenficActions
{
	
protected function updateOpbenefiFromRequest()
  {
    $opbenefi = $this->getRequestParameter('opbenefi');

    if (isset($opbenefi['cedrif']))
    {
      $this->opbenefi->setCedrif($opbenefi['cedrif']);
    }
    if (isset($opbenefi['nomben']))
    {
      $this->opbenefi->setNomben($opbenefi['nomben']);
    }
    if (isset($opbenefi['dirben']))
    {
      $this->opbenefi->setDirben($opbenefi['dirben']);
    }
    if (isset($opbenefi['telben']))
    {
      $this->opbenefi->setTelben($opbenefi['telben']);
    }
    if (isset($opbenefi['codcta']))
    {
      $this->opbenefi->setCodcta($opbenefi['codcta']);
    }
    if (isset($opbenefi['nitben']))
    {
      $this->opbenefi->setNitben($opbenefi['nitben']);
    }
    if (isset($opbenefi['codtipben']))
    {
      $this->opbenefi->setCodtipben($opbenefi['codtipben']);
    }
    //if (isset($opbenefi['tipper']))
    //{
      $this->opbenefi->setTipper($this->getRequestParameter('tipper'));
    //}
    //if (isset($opbenefi['nacionalidad']))
    //{
      $this->opbenefi->setNacionalidad($this->getRequestParameter('nacionalidad'));
    //}
    //if (isset($opbenefi['residente']))
    //{
      $this->opbenefi->setResidente($this->getRequestParameter('residente'));
    //}
    //if (isset($opbenefi['constituida']))
    //{
      $this->opbenefi->setConstituida($this->getRequestParameter('constituida'));
    //}
    if (isset($opbenefi['codord']))
    {
      $this->opbenefi->setCodord($opbenefi['codord']);
    }
    if (isset($opbenefi['codpercon']))
    {
      $this->opbenefi->setCodpercon($opbenefi['codpercon']);
    }
    if (isset($opbenefi['codordadi']))
    {
      $this->opbenefi->setCodordadi($opbenefi['codordadi']);
    }
    if (isset($opbenefi['codperconadi']))
    {
      $this->opbenefi->setCodperconadi($opbenefi['codperconadi']);
    }
    /*if (isset($opbenefi['codordcontra']))
    {
      $this->opbenefi->setCodordcontra($opbenefi['codordcontra']);
    }
    if (isset($opbenefi['codpercontra']))
    {
      $this->opbenefi->setCodpercontra($opbenefi['codpercontra']);
    }
    if (isset($opbenefi['temcedrif']))
    {
      $this->opbenefi->setTemcedrif($opbenefi['temcedrif']);
    }*/
    if (isset($opbenefi['codctasec']))
    {
      $this->opbenefi->setCodctasec($opbenefi['codctasec']);
    }
    if (isset($opbenefi['codctacajchi']))
    {
      $this->opbenefi->setCodctacajchi($opbenefi['codctacajchi']);
    }
  }
	
protected function addFiltersCriteria($c)
  {
    if (isset($this->filters['cedrif_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpbenefiPeer::CEDRIF, '');
      $criterion->addOr($c->getNewCriterion(OpbenefiPeer::CEDRIF, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['cedrif']) && $this->filters['cedrif'] !== '')
    {
      $c->add(OpbenefiPeer::CEDRIF, strtr(str_pad($this->filters['cedrif'],15,' '), '*', '%'), Criteria::LIKE);
    }
    if (isset($this->filters['nomben_is_empty']))
    {
      $criterion = $c->getNewCriterion(OpbenefiPeer::NOMBEN, '');
      $criterion->addOr($c->getNewCriterion(OpbenefiPeer::NOMBEN, null, Criteria::ISNULL));
      $c->add($criterion);
    }
    else if (isset($this->filters['nomben']) && $this->filters['nomben'] !== '')
    {
      $c->add(OpbenefiPeer::NOMBEN, strtr($this->filters['nomben'], '*', '%'), Criteria::LIKE);
    }
  }
  
}
