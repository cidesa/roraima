<?php

/**
 * nomespdefinicion actions.
 *
 * @package    siga
 * @subpackage nomespdefinicion
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomespdefinicionActions extends autonomespdefinicionActions
{
	public function Nomina()
	{
		if ($this->npnomesptipos->getCodnomesp()!='')
		{
			$con = sfContext::getInstance()->getDatabaseConnection($connection='propel');
			$sql = "select DISTINCT npnomespnomtip.codnom, npnomina.nomnom from npnomespnomtip, npnomesptipos, npnomina where ((npnomespnomtip.codnomesp='".($this->npnomesptipos->getCodnomesp())."') AND (npnomespnomtip.codnom=npnomina.codnom))";
			$stmt = $con->createStatement();
			$stmt->setLimit(5000);
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
		else
		{
			return '';
    }    
    
}	
	
  public function executeEdit()
	{
		$this->npnomesptipos = $this->getNpnomesptiposOrCreate();
		$this->rs = $this->Nomina();

		if ($this->getRequest()->getMethod() == sfRequest::POST)
		{
			$this->updateNpnomesptiposFromRequest();

			$this->saveNpnomesptipos($this->npnomesptipos);

			$this->setFlash('notice', 'Your modifications have been saved');

			if ($this->getRequestParameter('save_and_add'))
			{
				return $this->redirect('nomespdefinicion/create');
			}
			else if ($this->getRequestParameter('save_and_list'))
			{
				return $this->redirect('nomespdefinicion/list');
			}
			else
			{
				return $this->redirect('nomespdefinicion/edit?id='.$this->npnomesptipos->getId());
			}
		}
		else
		{
			$this->labels = $this->getLabels();
		}
	}

  protected function updateNpnomesptiposFromRequest()
	{
		$npnomesptipos = $this->getRequestParameter('npnomesptipos');

		if (isset($npnomesptipos['codnomesp']))
		{
			$this->npnomesptipos->setCodnomesp($npnomesptipos['codnomesp']);
		}
		if (isset($npnomesptipos['desnomesp']))
		{
			$this->npnomesptipos->setDesnomesp($npnomesptipos['desnomesp']);
		}
		if (isset($npnomesptipos['fecnomdes']))
		{
			if ($npnomesptipos['fecnomdes'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($npnomesptipos['fecnomdes']))
					{
						$value = $dateFormat->format($npnomesptipos['fecnomdes'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $npnomesptipos['fecnomdes'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->npnomesptipos->setFecnomdes($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->npnomesptipos->setFecnomdes(null);
			}
		}
		if (isset($npnomesptipos['fecnomhas']))
		{
			if ($npnomesptipos['fecnomhas'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($npnomesptipos['fecnomhas']))
					{
						$value = $dateFormat->format($npnomesptipos['fecnomhas'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $npnomesptipos['fecnomhas'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->npnomesptipos->setFecnomhas($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npnomesptipos->setFecnomhas(null);
      }
    }
  }
}
