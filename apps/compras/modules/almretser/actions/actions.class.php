<?php

/**
 * almretser actions.
 *
 * @package    siga
 * @subpackage almretser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almretserActions extends autoalmretserActions
{
	public function executeSQL()
	{
		//Funcion que ejecuta sql
		$con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "SELECT codtip, destip FROM optipret where codtip='".$this->caretser->getCodret()."'";
		$stmt = $con->createStatement();
		$stmt->setLimit(50000);
		$rs = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
		$resultado=array();
		//aqui lleno el array con los resultados:
		while ($rs->next())
		{
			$resultado[]=$rs->getRow();
		}
		//y la envio al template:
		$this->rs=$resultado;
		return $this->rs;
	}

	public function executeEdit()
	{
		$this->caretser = $this->getCaretserOrCreate();
		$this->desart = $this->getdesart();		
		$this->rs = $this->executeSQL();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateCaretserFromRequest();

			$this->saveCaretser($this->caretser);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('almretser/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('almretser/list');
			}
			else
			{
				return $this->redirect('almretser/edit?id='.$this->caretser->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}


	public function getdesart()
	{
		$c = new Criteria;
		$this->campo = $this->caretser->getCodser();
		$c->add(CaregartPeer::CODART, $this->campo);
		$this->desart = CaregartPeer::doSelect($c);
		if ($this->desart)
		return $this->desart[0]->getdesart();
		else
		return ' ';
	}  
}
