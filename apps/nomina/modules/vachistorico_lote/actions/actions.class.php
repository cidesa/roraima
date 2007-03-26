<?php

/**
 * vachistorico_lote actions.
 *
 * @package    siga
 * @subpackage vachistorico_lote
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vachistorico_loteActions extends autovachistorico_loteActions
{
  public function executeEdit()
	{
		$this->npvacdisfrute = $this->getNpvacdisfruteOrCreate();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNpvacdisfruteFromRequest();

			$this->saveNpvacdisfrute($this->npvacdisfrute);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('vachistorico_lote/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('vachistorico_lote/list');
			}
			else
			{
				return $this->redirect('vachistorico_lote/edit?id='.$this->npvacdisfrute->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}

  protected function updateNpvacdisfruteFromRequest()
	{
		$npvacdisfrute = $this->getRequestParameter('npvacdisfrute');

		if (isset($npvacdisfrute['perini']))
		{
			$this->npvacdisfrute->setPerini($npvacdisfrute['perini']);
		}
		if (isset($npvacdisfrute['perfin']))
		{
			$this->npvacdisfrute->setPerfin($npvacdisfrute['perfin']);
		}
		if (isset($npvacdisfrute['codemp']))
		{
			$this->npvacdisfrute->setCodemp($npvacdisfrute['codemp']);
		}
		if (isset($npvacdisfrute['diasdisfutar']))
		{
			$this->npvacdisfrute->setDiasdisfutar($npvacdisfrute['diasdisfutar']);
    }
    if (isset($npvacdisfrute['diasdisfrutados']))
    {
      $this->npvacdisfrute->setDiasdisfrutados($npvacdisfrute['diasdisfrutados']);
    }
  }
}
