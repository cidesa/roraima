<?php

/**
 * nomasicarconnom actions.
 *
 * @package    siga
 * @subpackage nomasicarconnom
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomasicarconnomActions extends autonomasicarconnomActions
{
	public function executeSQL()
	{
		//Funcion que ejecuta sql lista
		$con =
		sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "Select b.CodCon,b.NomCon,b.FecIni,b.FecExp,b.Cantidad,b.monto,b.FreCon,b.activo from npasiconnom a, npasiconemp b where b.codemp='".$this->npasicaremp->getCodemp()."' and b.codcar='".$this->npasicaremp->getCodcar()."' and a.codnom='".$this->npasicaremp->getCodnom()."'  and a.codcon=b.codcon order by a.codcon";
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
		$this->npasicaremp = $this->getNpasicarempOrCreate();
	    $this->rs = $this->executeSQL();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNpasicarempFromRequest();

			$this->saveNpasicaremp($this->npasicaremp);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('nomasicarconnom/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('nomasicarconnom/list');
			}
			else
      {
        return $this->redirect('nomasicarconnom/edit?id='.$this->npasicaremp->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }    
}
