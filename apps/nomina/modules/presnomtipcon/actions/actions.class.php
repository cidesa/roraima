<?php

/**
 * presnomtipcon actions.
 *
 * @package    siga
 * @subpackage presnomtipcon
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class presnomtipconActions extends autopresnomtipconActions
{
	public function executeSQL()
	{
		//Funcion que ejecuta sql lista
		$con =
		sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "select anovig,anovighas,hasta,diauti,diavac,calinc,antap,antapvac from npbonocont where codtipcon ='".$this->nptipcon->getCodtipcon()."'";
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
	public function executeNomina()
	{
		//Funcion que ejecuta sql lista
		$con =
		sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "select b.codnom, b.nomnom from npasinomcont a, npnomina b where a.codtipcon ='".$this->nptipcon->getCodtipcon()."' and a.codnom=b.codnom";
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
	public function executeEdit()
	{
		$this->nptipcon = $this->getNptipconOrCreate();
        $this->rs = $this->executeSQL();
        $this->rs2 = $this->executeNomina();	

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
		//	$this->updateNptipconFromRequest();

			//$this->saveNptipcon($this->nptipcon);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('presnomtipcon/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('presnomtipcon/list');
			}
			else
      {
        return $this->redirect('presnomtipcon/edit?id='.$this->nptipcon->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }    
	
}
