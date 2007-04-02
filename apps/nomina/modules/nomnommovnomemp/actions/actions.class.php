<?php

/**
 * nomnommovnomemp actions.
 *
 * @package    siga
 * @subpackage nomnommovnomemp
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomnommovnomempActions extends autonomnommovnomempActions
{
	public function executeSQL()
	{
		//Funcion que ejecuta sql lista
		$con =
		sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "Select distinct a.codcon, case2(a.mensaje,NULL,b.nomcon,a.mensaje),a.status,case2n(a.status,'C',b.cantidad,b.monto) from npdefmov a, npasiconemp b where b.codemp= '".str_pad($this->npasicaremp->getCodemp(),16,' ')."' and b.codcar='".str_pad($this->npasicaremp->getCodcar(),16,' ')."' and a.codnom='".$this->npasicaremp->getCodnom()."' and a.codcon=b.codcon order by a.codcon";
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
				return $this->redirect('nomnommovnomemp/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('nomnommovnomemp/list');
			}
			else
      {
        return $this->redirect('nomnommovnomemp/edit?id='.$this->npasicaremp->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }    
}
