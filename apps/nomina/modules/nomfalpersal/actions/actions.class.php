<?php

/**
 * nomfalpersal actions.
 *
 * @package    siga
 * @subpackage nomfalpersal
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class nomfalpersalActions extends autonomfalpersalActions
{
	protected function addFiltersCriteria($c)
	{
		$this->sql = " (FecDes-FecHas)=1";
		$c->add(NpfalperPeer::FECDES, $this->sql, Criteria::CUSTOM);

		parent::addFiltersCriteria($c);
	}

	protected function updateNpfalperFromRequest()
	{
		$npfalper = $this->getRequestParameter('npfalper');

		if (isset($npfalper['codemp']))
		{
			$this->npfalper->setCodemp(str_pad($npfalper['codemp'],16,' '));
		}
		if (isset($npfalper['nomemp']))
		{
			$this->npfalper->setNomemp($npfalper['nomemp']);
		}
		if (isset($npfalper['codmot']))
		{
			$this->npfalper->setCodmot(str_pad($npfalper['codmot'],4,'0',STR_PAD_LEFT));
		}
		if (isset($npfalper['desmotfal']))
		{
			$this->npfalper->setDesmotfal($npfalper['desmotfal']);
		}
		if (isset($npfalper['observ']))
		{
			$this->npfalper->setObserv($npfalper['observ']);
		}
		
		//$this->nphojint->setStaemp('P');
		
		if (isset($npfalper['fechas']))
		{
			if ($npfalper['fechas'])
			{
				try
				{
					$dateFormat = new sfDateFormat($this->getUser()->getCulture());
					if (!is_array($npfalper['fechas']))
					{
						$value = $dateFormat->format($npfalper['fechas'], 'i', $dateFormat->getInputPattern('d'));
					}
					else
					{
						$value_array = $npfalper['fechas'];
						$value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
					}
					$this->npfalper->setFechas($value);
					$this->npfalper->setFecdes($value);
				}
				catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->npfalper->setFechas(null);
        $this->npfalper->setFecdes(null);
      }
    }
  }	
}

