<?php

/**
 * fordefaccespivss actions.
 *
 * @package    siga
 * @subpackage fordefaccespivss
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fordefaccespivssActions extends autofordefaccespivssActions
{
	public function executeSQL()
	{
		//Funcion que ejecuta sql lista
		$con =
		sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "Select codaccesp, desaccesp, nomabraccesp from fordefaccesp where codpro='".$this->fordefpry->getCodpro()."'";
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
		$this->fordefpry = $this->getFordefpryOrCreate();
		$this->rs = $this->executeSQL();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateFordefpryFromRequest();

			$this->saveFordefpry($this->fordefpry);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('fordefaccespivss/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('fordefaccespivss/list');
			}
      else
      {
        return $this->redirect('fordefaccespivss/edit?id='.$this->fordefpry->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }    
}
