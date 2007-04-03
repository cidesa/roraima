<?php

/**
 * bieregsegmue actions.
 *
 * @package    siga
 * @subpackage bieregsegmue
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class bieregsegmueActions extends autobieregsegmueActions
{
	protected function updateBnsegmueFromRequest()
	{
		$bnsegmue = $this->getRequestParameter('bnsegmue');

		if (isset($bnsegmue['codact']))
		{
			$this->bnsegmue->setCodact(str_pad($bnsegmue['codact'],30,' '));
		}
		if (isset($bnsegmue['codmue']))
		{
			$this->bnsegmue->setCodmue(str_pad($bnsegmue['codmue'],10,'0',STR_PAD_LEFT));
		}
		if (isset($bnsegmue['nrosegmue']))
		{
			$this->bnsegmue->setNrosegmue(str_pad($bnsegmue['nrosegmue'],6,'0',STR_PAD_LEFT));
		}
		if (isset($bnsegmue['fecsegmue']))
		{
			if ($bnsegmue['fecsegmue'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($bnsegmue['fecsegmue']))
					{
						$value = $dateFormat->format($bnsegmue['fecsegmue'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $bnsegmue['fecsegmue'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->bnsegmue->setFecsegmue($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->bnsegmue->setFecsegmue(null);
			}
		}
		if (isset($bnsegmue['nomsegmue']))
		{
			$this->bnsegmue->setNomsegmue($bnsegmue['nomsegmue']);
		}
		if (isset($bnsegmue['cobsegmue']))
		{
			$this->bnsegmue->setCobsegmue($bnsegmue['cobsegmue']);
		}
		if (isset($bnsegmue['monsegmue']))
		{
			$this->bnsegmue->setMonsegmue($bnsegmue['monsegmue']);
		}
		if (isset($bnsegmue['fecsegven']))
		{
			if ($bnsegmue['fecsegven'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($bnsegmue['fecsegven']))
					{
						$value = $dateFormat->format($bnsegmue['fecsegven'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $bnsegmue['fecsegven'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->bnsegmue->setFecsegven($value);
				}
				catch (sfException $e)
				{
					// not a date
				}
			}
			else
			{
				$this->bnsegmue->setFecsegven(null);
			}
		}
		if (isset($bnsegmue['prosegmue']))
		{
			$this->bnsegmue->setProsegmue($bnsegmue['prosegmue']);
		}
		if (isset($bnsegmue['obssegmue']))
		{
			$this->bnsegmue->setObssegmue($bnsegmue['obssegmue']);
		}
		//if (isset($bnsegmue['stasegmue']))
		//{
		//$this->bnsegmue->setStasegmue($bnsegmue['stasegmue']);
		#$dateFormat->format($this->getRequestParameter('fecha_actual'), 'i', $dateFormat->getInputPattern('d'));
	    if ( $dateFormat->format($this->getRequestParameter('fecha_actual'), 'i', $dateFormat->getInputPattern('d')) > $value)
	  	{
	  		$this->bnsegmue->setStasegmue('V');		
	  	}else{
	  		$this->bnsegmue->setStasegmue('A');
	  	}
	  
      
    //}
  }	
}
