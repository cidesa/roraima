<?php

/**
 * oycregpro actions.
 *
 * @package    siga
 * @subpackage oycregpro
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class oycregproActions extends autooycregproActions
{
	public function executeSQL()
	{
		//Funcion que ejecuta sql lista
		$con =
		sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "Select b.codrec, b.desrec, a.fecinscir, a.fecven From caprovee a, carecaud b where a.codtiprec=b.codtiprec and a.codpro ='".$this->caprovee->getCodpro()."'";
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

	public function executeSQL2()
	{
		//Funcion que ejecuta sql lista
		$con =
		sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "Select c.cedper, c.nomper, d.destippro  From caprovee a, ocproper b, ocdefper c, octippro d where a.codpro=b.codpro and b.cedper=c.cedper and c.codtippro=d.codtippro and a.codpro ='".$this->caprovee->getCodpro()."'";
		$stmt = $con->createStatement();
		$stmt->setLimit(50000);
		$rs2 = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
		$resultado=array();
		//aqui lleno el array con los resultados:
		while ($rs2->next())
		{
			$resultado[]=$rs2->getRow();
		}
		//y la envio al template:
		$this->rs2=$resultado;
		return $this->rs2;
	}

	public function executeSQL3()
	{
		//Funcion que ejecuta sql lista
		$con =
		sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "Select b.codequ, c.desequ, b.canequ  From caprovee a, ocproequ b, ocdefequ c where b.codequ=c.codequ and a.codpro ='".$this->caprovee->getCodpro()."'";
		$stmt = $con->createStatement();
		$stmt->setLimit(50000);
		$rs3 = $stmt->executeQuery($sql, ResultSet::FETCHMODE_NUM);
		$resultado=array();
		//aqui lleno el array con los resultados:
		while ($rs3->next())
		{
			$resultado[]=$rs3->getRow();
		}
		//y la envio al template:
		$this->rs3=$resultado;
		return $this->rs3;
	}

	public function executeEdit()
	{
		$this->caprovee = $this->getCaproveeOrCreate();
		$this->rs = $this->executeSQL();
		$this->rs2 = $this->executeSQL2();
		$this->rs3 = $this->executeSQL3();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateCaproveeFromRequest();

			$this->saveCaprovee($this->caprovee);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('oycregpro/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('oycregpro/list');
			}
			else
			{
				return $this->redirect('oycregpro/edit?id='.$this->caprovee->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}

}

