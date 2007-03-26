<?php

/**
 * fordefcatpre actions.
 *
 * @package    siga
 * @subpackage fordefcatpre
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefcatpreActions extends autofordefcatpreActions
{
  public function getMostrarUnidad()
	{
		$c = new Criteria;
		$this->campo = str_pad($this->fordefcatpre->getCoduni(),3,' ');
		$c->add(FordefuniejePeer::CODUNI, $this->campo);
		$this->uni = FordefuniejePeer::doSelect($c);
		if ($this->uni)
		return $this->uni[0]->getNomuni();
		else
		return ' ';
	}

  public function executeEdit()
	{
		$this->fordefcatpre = $this->getFordefcatpreOrCreate();
		$this->unidad = $this->getMostrarUnidad();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateFordefcatpreFromRequest();

			$this->saveFordefcatpre($this->fordefcatpre);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('fordefcatpre/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('fordefcatpre/list');
			}
			else
			{
				return $this->redirect('fordefcatpre/edit?id='.$this->fordefcatpre->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}

  protected function updateFordefcatpreFromRequest()
	{
		$fordefcatpre = $this->getRequestParameter('fordefcatpre');

		if (isset($fordefcatpre['codcat']))
		{
			$this->fordefcatpre->setCodcat($fordefcatpre['codcat']);
		}
		if (isset($fordefcatpre['nomcat']))
		{
			$this->fordefcatpre->setNomcat($fordefcatpre['nomcat']);
		}
		if (isset($fordefcatpre['descat']))
		{
			$this->fordefcatpre->setDescat($fordefcatpre['descat']);
		}
		if (isset($fordefcatpre['objesp']))
		{
			$this->fordefcatpre->setObjesp($fordefcatpre['objesp']);
		}
		if (isset($fordefcatpre['mision']))
		{
			$this->fordefcatpre->setMision($fordefcatpre['mision']);
		}
		if (isset($fordefcatpre['vision']))
		{
			$this->fordefcatpre->setVision($fordefcatpre['vision']);
    }
    if (isset($fordefcatpre['coduni']))
    {
      $this->fordefcatpre->setCoduni($fordefcatpre['coduni']);
    }
  }
}
