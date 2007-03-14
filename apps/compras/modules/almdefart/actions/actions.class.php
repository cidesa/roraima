<?php

/**
 * almdefart actions.
 *
 * @package    siga
 * @subpackage almdefart
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almdefartActions extends sfActions
{
	public function executeIndex()
	{
		return $this->forward('almdefart', 'list');
	}

	public function executeList()
	{
		$this->processSort();

		$this->processFilters();

		$this->filters = $this->getUser()->getAttributeHolder()->getAll('sf_admin/cadefart/filters');

		// pager
		$this->pager = new sfPropelPager('Cadefart', 6);
		$c = new Criteria();
		$this->addSortCriteria($c);
		$this->addFiltersCriteria($c);
		$this->pager->setCriteria($c);
		$this->pager->setPage($this->getRequestParameter('page', 1));
		$this->pager->init();
	}

	public function executeCreate()
	{
		return $this->forward('almdefart', 'edit');
	}

	public function executeSave()
	{
		return $this->forward('almdefart', 'edit');
	}

	public function executeEdit()
	{
		$this->cadefart = $this->getCadefartOrCreate();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateCadefartFromRequest();

			$this->saveCadefart($this->cadefart);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('almdefart/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('almdefart/list');
			}
			else
			{
				return $this->redirect('almdefart/edit?id='.$this->cadefart->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}

	public function executeDelete()
	{
		$this->cadefart = CadefartPeer::retrieveByPk($this->getRequestParameter('id'));
		$this->forward404Unless($this->cadefart);

		try
		{
			$this->deleteCadefart($this->cadefart);
		}
		catch (PropelException $e)
		{
			$this->getRequest()->setError('delete', 'Could not delete the selected Cadefart. Make sure it does not have any associated items.');
			return $this->forward('almdefart', 'list');
		}

		return $this->redirect('almdefart/list');
	}

	public function handleErrorEdit()
	{
		$this->preExecute();
		$this->cadefart = $this->getCadefartOrCreate();
		$this->updateCadefartFromRequest();

		$this->labels = $this->getLabels();

		return sfView::SUCCESS;
	}

	protected function saveCadefart($cadefart)
	{
		$cadefart->save();

	}

	protected function deleteCadefart($cadefart)
	{
		$cadefart->delete();
	}

	protected function updateCadefartFromRequest()
	{
		$cadefart = $this->getRequestParameter('cadefart');

		if (isset($cadefart['codemp']))
		{
			$this->cadefart->setCodemp($cadefart['codemp']);
		}
		if (isset($cadefart['lonart']))
		{
			$this->cadefart->setLonart($cadefart['lonart']);
		}
		if (isset($cadefart['rupart']))
		{
			$this->cadefart->setRupart($cadefart['rupart']);
		}
		if (isset($cadefart['forart']))
		{
			$this->cadefart->setForart($cadefart['forart']);
		}
		if (isset($cadefart['desart']))
		{
			$this->cadefart->setDesart($cadefart['desart']);
		}
		if (isset($cadefart['forubi']))
		{
			$this->cadefart->setForubi($cadefart['forubi']);
		}
		if (isset($cadefart['desubi']))
		{
			$this->cadefart->setDesubi($cadefart['desubi']);
		}
		if (isset($cadefart['correq']))
		{
			$this->cadefart->setCorreq($cadefart['correq']);
		}
		if (isset($cadefart['corord']))
		{
			$this->cadefart->setCorord($cadefart['corord']);
		}
		if (isset($cadefart['correc']))
		{
			$this->cadefart->setCorrec($cadefart['correc']);
		}
		if (isset($cadefart['cordes']))
		{
			$this->cadefart->setCordes($cadefart['cordes']);
		}
		if (isset($cadefart['generaop']))
		{
			$this->cadefart->setGeneraop($cadefart['generaop']);
		}
		if (isset($cadefart['asiparrec']))
		{
			$this->cadefart->setAsiparrec($cadefart['asiparrec']);
		}
		if (isset($cadefart['generacom']))
		{
			$this->cadefart->setGeneracom($cadefart['generacom']);
		}
		if (isset($cadefart['mercon']))
		{
			$this->cadefart->setMercon($cadefart['mercon']);
		}
		if (isset($cadefart['ctadev']))
		{
			$this->cadefart->setCtadev($cadefart['ctadev']);
		}
		if (isset($cadefart['ctavco']))
		{
			$this->cadefart->setCtavco($cadefart['ctavco']);
		}
		if (isset($cadefart['univta']))
		{
			$this->cadefart->setUnivta($cadefart['univta']);
		}
		if (isset($cadefart['artven']))
		{
			$this->cadefart->setArtven($cadefart['artven']);
		}
		if (isset($cadefart['artins']))
		{
			$this->cadefart->setArtins($cadefart['artins']);
		}
		if (isset($cadefart['artser']))
		{
			$this->cadefart->setArtser($cadefart['artser']);
		}
		if (isset($cadefart['codalmven']))
		{
			$this->cadefart->setCodalmven($cadefart['codalmven']);
		}
		if (isset($cadefart['recart']))
		{
			$this->cadefart->setRecart($cadefart['recart']);
		}
		if (isset($cadefart['ordcom']))
		{
			$this->cadefart->setOrdcom($cadefart['ordcom']);
		}
		if (isset($cadefart['reqart']))
		{
			$this->cadefart->setReqart($cadefart['reqart']);
		}
		if (isset($cadefart['dphart']))
		{
			$this->cadefart->setDphart($cadefart['dphart']);
		}
		if (isset($cadefart['ordser']))
		{
			$this->cadefart->setOrdser($cadefart['ordser']);
		}
		if (isset($cadefart['tipimprec']))
		{
			$this->cadefart->setTipimprec($cadefart['tipimprec']);
		}
		if (isset($cadefart['artvenhas']))
		{
			$this->cadefart->setArtvenhas($cadefart['artvenhas']);
		}
		if (isset($cadefart['corcot']))
		{
			$this->cadefart->setCorcot($cadefart['corcot']);
		}
		if (isset($cadefart['solart']))
		{
			$this->cadefart->setSolart($cadefart['solart']);
		}
		if (isset($cadefart['apliclades']))
		{
			$this->cadefart->setApliclades($cadefart['apliclades']);
		}
		if (isset($cadefart['solcom']))
		{
			$this->cadefart->setSolcom($cadefart['solcom']);
		}
		if (isset($cadefart['unidad']))
		{
			$this->cadefart->setUnidad($cadefart['unidad']);
		}
	}

	protected function getCadefartOrCreate($id = 'id')
	{
		if (!$this->getRequestParameter($id))
		{
			$cadefart = new Cadefart();
		}
		else
		{
			$cadefart = CadefartPeer::retrieveByPk($this->getRequestParameter($id));

			$this->forward404Unless($cadefart);
		}

		return $cadefart;
	}

	protected function processFilters()
	{
		if ($this->getRequest()->hasParameter('filter'))
		{
			$filters = $this->getRequestParameter('filters');

			$this->getUser()->getAttributeHolder()->removeNamespace('sf_admin/cadefart/filters');
			$this->getUser()->getAttributeHolder()->add($filters, 'sf_admin/cadefart/filters');
		}
	}

	protected function processSort()
	{
		if ($this->getRequestParameter('sort'))
		{
			$this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/cadefart/sort');
			$this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/cadefart/sort');
		}

		if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/cadefart/sort'))
		{
		}
	}

	protected function addFiltersCriteria($c)
	{
		if (isset($this->filters['lonart_is_empty']))
		{
			$criterion = $c->getNewCriterion(CadefartPeer::LONART, '');
			$criterion->addOr($c->getNewCriterion(CadefartPeer::LONART, null, Criteria::ISNULL));
			$c->add($criterion);
		}
		else if (isset($this->filters['lonart']) && $this->filters['lonart'] !== '')
		{
			$c->add(CadefartPeer::LONART, $this->filters['lonart']);
		}
		if (isset($this->filters['forart_is_empty']))
		{
			$criterion = $c->getNewCriterion(CadefartPeer::FORART, '');
			$criterion->addOr($c->getNewCriterion(CadefartPeer::FORART, null, Criteria::ISNULL));
			$c->add($criterion);
		}
		else if (isset($this->filters['forart']) && $this->filters['forart'] !== '')
		{
			$c->add(CadefartPeer::FORART, strtr($this->filters['forart'], '*', '%'), Criteria::LIKE);
		}
		if (isset($this->filters['desart_is_empty']))
		{
			$criterion = $c->getNewCriterion(CadefartPeer::DESART, '');
			$criterion->addOr($c->getNewCriterion(CadefartPeer::DESART, null, Criteria::ISNULL));
			$c->add($criterion);
		}
		else if (isset($this->filters['desart']) && $this->filters['desart'] !== '')
		{
			$c->add(CadefartPeer::DESART, strtr($this->filters['desart'], '*', '%'), Criteria::LIKE);
		}
	}

	protected function addSortCriteria($c)
	{
		if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/cadefart/sort'))
		{
			$sort_column = CadefartPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
			if ($this->getUser()->getAttribute('type', null, 'sf_admin/cadefart/sort') == 'asc')
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
		'cadefart{codemp}' => 'Codemp:',
		'cadefart{lonart}' => 'Longitud del Codigo:',
		'cadefart{rupart}' => 'Rupart:',
		'cadefart{forart}' => 'Formato:',
		'cadefart{desart}' => 'Descripcion:',
		'cadefart{forubi}' => 'Forubi:',
		'cadefart{desubi}' => 'Desubi:',
		'cadefart{correq}' => 'Correq:',
		'cadefart{corord}' => 'Corord:',
		'cadefart{correc}' => 'Correc:',
		'cadefart{cordes}' => 'Cordes:',
		'cadefart{generaop}' => 'Generaop:',
		'cadefart{asiparrec}' => 'Asiparrec:',
		'cadefart{generacom}' => 'Generacom:',
		'cadefart{mercon}' => 'Mercon:',
		'cadefart{ctadev}' => 'Ctadev:',
		'cadefart{ctavco}' => 'Ctavco:',
		'cadefart{univta}' => 'Univta:',
		'cadefart{artven}' => 'Artven:',
		'cadefart{artins}' => 'Artins:',
		'cadefart{artser}' => 'Artser:',
		'cadefart{codalmven}' => 'Codalmven:',
		'cadefart{recart}' => 'Recart:',
		'cadefart{ordcom}' => 'Ordcom:',
		'cadefart{reqart}' => 'Reqart:',
		'cadefart{dphart}' => 'Dphart:',
      'cadefart{ordser}' => 'Ordser:',
      'cadefart{tipimprec}' => 'Tipimprec:',
      'cadefart{artvenhas}' => 'Artvenhas:',
      'cadefart{corcot}' => 'Corcot:',
      'cadefart{solart}' => 'Solart:',
      'cadefart{apliclades}' => 'Apliclades:',
      'cadefart{solcom}' => 'Solcom:',
      'cadefart{unidad}' => 'Unidad:',
      'cadefart{id}' => 'Id:',
    );
  }
}
