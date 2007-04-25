<?php

/**
 * oycdatsol actions.
 *
 * @package    siga
 * @subpackage oycdatsol
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycdatsolActions extends autooycdatsolActions
{
	public function Cargarpais()
	{
		$c = new Criteria();
		$lista_pais = OcpaisPeer::doSelect($c);
		
		$pais = array();
		
		foreach($lista_pais as $obj_pais)
		{
			$pais += array($obj_pais->getCodpai() => $obj_pais->getNompai());
		}
		return $pais;
    } 	
	
	public function executeEdit()
	{
		$this->ocdatste = $this->getOcdatsteOrCreate();
		$this->desste ='';
		$this->pais = $this->Cargarpais();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateOcdatsteFromRequest();

			$this->saveOcdatste($this->ocdatste);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('oycdatsol/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('oycdatsol/list');
			}
			else
			{
				return $this->redirect('oycdatsol/edit?id='.$this->ocdatste->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}
}
