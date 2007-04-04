<?php

/**
 * bieregseginm actions.
 *
 * @package    siga
 * @subpackage bieregseginm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class bieregseginmActions extends autobieregseginmActions
{
	protected function updateBnseginmFromRequest()
	{
		$bnseginm = $this->getRequestParameter('bnseginm');

		if (isset($bnseginm['codact']))
		{
			$this->bnseginm->setCodact($bnseginm['codact']);
		}
		if (isset($bnseginm['codmue']))
		{
			$this->bnseginm->setCodmue($bnseginm['codmue']);
		}
		if (isset($bnseginm['nroseginm']))
		{
			$this->bnseginm->setNroseginm($bnseginm['nroseginm']);
		}
		if (isset($bnseginm['fecseginm']))
		{
			if ($bnseginm['fecseginm'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($bnseginm['fecseginm']))
					{
						$value = $dateFormat->format($bnseginm['fecseginm'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $bnseginm['fecseginm'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->bnseginm->setFecseginm($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->bnseginm->setFecseginm(null);
			}
		}
		if (isset($bnseginm['nomseginm']))
		{
			$this->bnseginm->setNomseginm($bnseginm['nomseginm']);
		}
		if (isset($bnseginm['cobseginm']))
		{
			$this->bnseginm->setCobseginm($bnseginm['cobseginm']);
		}
		if (isset($bnseginm['monseginm']))
		{
			$this->bnseginm->setMonseginm($bnseginm['monseginm']);
		}
		if (isset($bnseginm['fecsegven']))
		{
			if ($bnseginm['fecsegven'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($bnseginm['fecsegven']))
					{
						$value = $dateFormat->format($bnseginm['fecsegven'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $bnseginm['fecsegven'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->bnseginm->setFecsegven($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->bnseginm->setFecsegven(null);
			}
		}
		if (isset($bnseginm['proseginm']))
		{
			$this->bnseginm->setProseginm($bnseginm['proseginm']);
		}
		if (isset($bnseginm['obsseginm']))
		{
			$this->bnseginm->setObsseginm($bnseginm['obsseginm']);
		}
		//if (isset($bnseginm['staseginm']))
		//{
		//  $this->bnseginm->setStaseginm($bnseginm['staseginm']);
		// }
		if ( $dateFormat->format($this->getRequestParameter('fecha_actual'), 'i', $dateFormat->getInputPattern('d')) > $value)
	  	{
	  		$this->bnseginm->setStaseginm('V');		
	  	}else{
	  		$this->bnseginm->setStaseginm('A');
	  	}
  }
	
}
