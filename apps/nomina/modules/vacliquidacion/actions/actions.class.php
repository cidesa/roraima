<?php

/**
 * vacliquidacion actions.
 *
 * @package    siga
 * @subpackage vacliquidacion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class vacliquidacionActions extends autovacliquidacionActions
{
	public function executeSQL()
	{
		$c = new Criteria();
		$c->add(NpvacdisfrutePeer::CODEMP,$this->nphojint->getCodemp());
		$datos= NpvacdisfrutePeer::doSelect($c);
		#while ($rs->next())
		#{
		#	$resultado[]=$rs->getRow();
		#}

		#$this->rs = array();
		#foreach($datos as $obj)
		#{
		#$this->rs += array($obj_emp->getPassemp() => $obj_emp->getNomemp());
		#	$this->rs[]=$obj->getRow();
		#}

		#$lista_emp = EmpresaUserPeer::doSelect($c);
	
		$this->rs = array();
		
		foreach($datos as $obj_emp)
		{
			#$this->rs += array($obj_emp->getPassemp() => $obj_emp->getNomemp());
			$this->rs[]=$obj_emp->getRow();    
		}

		
		#$this->rs=$resultado;
		return $this->rs;
	}

	public function executeEdit()
	{
		$this->nphojint = $this->getNphojintOrCreate();
		$this->rs = $this->executeSQL();		 

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNphojintFromRequest();

			$this->saveNphojint($this->nphojint);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('vacliquidacion/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('vacliquidacion/list');
			}
			else
      {
        return $this->redirect('vacliquidacion/edit?id='.$this->nphojint->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }	
}
