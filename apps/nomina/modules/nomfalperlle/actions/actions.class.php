<?php

/**
 * nomfalperlle actions.
 *
 * @package    siga
 * @subpackage nomfalperlle
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomfalperlleActions extends autonomfalperlleActions
{
  protected function updateNpfalperFromRequest()
  {
    $npfalper = $this->getRequestParameter('npfalper');

    if (isset($npfalper['codemp']))
    {
      $this->npfalper->setCodemp($npfalper['codemp']);
    }
    if (isset($npfalper['codmot']))
    {
      $this->npfalper->setCodmot($npfalper['codmot']);
    }
    if (isset($npfalper['nrodia']))
    {
      $this->npfalper->setNrodia($npfalper['nrodia']);
    }
    if (isset($npfalper['observ']))
    {
      $this->npfalper->setObserv($npfalper['observ']);
    }
    if (isset($npfalper['fecdes']))
    {
      if ($npfalper['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npfalper['fecdes']))
          {
            $value = $dateFormat->format($npfalper['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npfalper['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npfalper->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npfalper->setFecdes(null);
      }
    }
    if (isset($npfalper['fecdes']))
    {
      if ($npfalper['fecdes'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npfalper['fecdes']))
          {
            $value = $dateFormat->format($npfalper['fecdes'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npfalper['fecdes'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npfalper->setFecdes($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npfalper->setFecdes(null);
      }
    }
    if (isset($npfalper['fechas']))
    {
      if ($npfalper['fechas'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($npfalper['fechas']))
          {
            $value = $dateFormat->format($npfalper['fechas'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $npfalper['fechas'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->npfalper->setFechas($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npfalper->setFechas(null);
      }
    }
  }

    public function executeAjax()
	{
	 $cajtexmos=$this->getRequestParameter('cajtexmos');
	 $cajtexcom=$this->getRequestParameter('cajtexcom');
	 if ($this->getRequestParameter('ajax')=='1')
	 {
	 	$dato=NphojintPeer::getNomemp(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
	 if ($this->getRequestParameter('ajax')=='2')
	 {
	 	$dato=NpmotfalPeer::getDesmotfal_text(trim($this->getRequestParameter('codigo')));
	 	$output = '[["'.$cajtexmos.'","'.$dato.'",""]]';
	 	$this->getResponse()->setHttpHeader("X-JSON", '('.$output.')');
	 	return sfView::HEADER_ONLY;
	 }
	}

  protected function saveNpfalper($npfalper)
  {
    $npfalper->save();
	$c= new Criteria();
	$c->add(NphojintPeer::CODEMP,$npfalper->getCodemp());
	$nphojint_up = NphojintPeer::doSelectOne($c);
	if (count($nphojint_up)>0)
	{
		$nphojint_up->setStaemp('A');
  	    $nphojint_up->save();
	}
  }
    public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npfalper/filters');

    // pager
    $this->pager = new sfPropelPager('Npfalper', 5);
    $c = new Criteria();
	//$c->addJoin(NpfalperPeer::CODEMP,NpasicarempPeer::CODEMP);
	//$c->add(NpasicarempPeer::STATUS,'P');
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }
}
