<?php

/**
 * almreqser actions.
 *
 * @package    siga
 * @subpackage almreqser
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class almreqserActions extends autoalmreqserActions
{
	public function executeSQL()
	{
		//Funcion que ejecuta sql
		$con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
		$sql = "SELECT reqart,codart,codcat,fecrea FROM caartreqser where reqart ='".$this->careqartser->getReqart()."'";
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
		$this->careqartser = $this->getCareqartserOrCreate();
		$this->rs = $this->executeSQL();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateCareqartserFromRequest();

			$this->saveCareqartser($this->careqartser);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('almreqser/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('almreqser/list');
			}
			else
			{
				return $this->redirect('almreqser/edit?id='.$this->careqartser->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}

	protected function updateCareqartserFromRequest()
	{
		$careqartser = $this->getRequestParameter('careqartser');

		if (isset($careqartser['reqart']))
		{
			$this->careqartser->setReqart($careqartser['reqart']);
		}
		if (isset($careqartser['desreq']))
		{
			$this->careqartser->setDesreq($careqartser['desreq']);
		}
		if (isset($careqartser['fecreq']))
		{
			if ($careqartser['fecreq'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($careqartser['fecreq']))
          {
            $value = $dateFormat->format($careqartser['fecreq'], 'i', $dateFormat->getInputPattern('d'));
          }
          else
          {
            $value_array = $careqartser['fecreq'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->careqartser->setFecreq($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->careqartser->setFecreq(null);
      }
    }
  //  if (isset($careqartser['stareq']))
  //  {
	  //$stareq=$careqartser['stareq'];
      $this->careqartser->setStareq('A');
  //  }
  }  
  
}
