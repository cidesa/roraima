<?php

/**
 * nomfalpersal actions.
 *
 * @package    siga
 * @subpackage nomfalpersal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomfalpersalActions extends autonomfalpersalActions
{
  public function executeList()
  {
    $this->processSort();

    $this->processFilters();

    $this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/npfalper/filters');

    // pager
    $this->pager = new sfPropelPager('Npfalper', 10);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', 1));
    $this->pager->init();
  }

	protected function updateNpfalperFromRequest()
	{
		$npfalper = $this->getRequestParameter('npfalper');

		if (Herramientas::getX('codemp','npasicaremp','status',trim($npfalper['codemp']))=='V')
		{
			$this->npfalper->setCodnom(Herramientas::getX('codemp','npasicaremp','codnom',trim($npfalper['codemp'])));
		}

		if (isset($npfalper['codemp']))
		{
			$this->npfalper->setCodemp($npfalper['codemp']);
		}
		if (isset($npfalper['nomemp']))
		{
			$this->npfalper->setNomemp($npfalper['nomemp']);
		}
		if (isset($npfalper['codmot']))
		{
			$this->npfalper->setCodmot(str_pad($npfalper['codmot'],4,'0',STR_PAD_LEFT));
		}
		if (isset($npfalper['desmotfal']))
		{
			$this->npfalper->setDesmotfal($npfalper['desmotfal']);
		}
		if (isset($npfalper['observ']))
		{
			$this->npfalper->setObserv($npfalper['observ']);
		}

		//$this->nphojint->setStaemp('P');
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
					$this->npfalper->setFechas(Herramientas::dateAdd('d',0,$value,'-'));
					//$this->npfalper->setFecdes($value);
				}
				catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npfalper->setFechas(null);
        $this->npfalper->setFecdes(null);
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
  	$this->updateNpfalperFromRequest();
  	$this->npfalper->setFecdes(date('Y-m-d'));
  	//$this->npfalper->setFechas();
    $npfalper->save();
	$c= new Criteria();
	$c->add(NphojintPeer::CODEMP,$npfalper->getCodemp());
	$nphojint_up = NphojintPeer::doSelectOne($c);
	if (count($nphojint_up)>0)
	{
		$nphojint_up->setStaemp('P');
  	    $nphojint_up->save();
	}
  }


}

