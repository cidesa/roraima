<?php

/**
 * Vacdefgen actions.
 *
 * @package    siga
 * @subpackage Vacdefgen
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class VacdefgenActions extends autoVacdefgenActions
{
	protected function updateNpvacdefgenFromRequest()
	{
		$npvacdefgen = $this->getRequestParameter('npvacdefgen');

		if (isset($npvacdefgen['codnomvac']))
		{
			$this->npvacdefgen->setCodnomvac($npvacdefgen['codnomvac']);
		}
		if (isset($npvacdefgen['nomnom']))
		{
			$this->npvacdefgen->setNomnom($npvacdefgen['nomnom']);
		}
		if (isset($npvacdefgen['codconvac']))
		{
			$this->npvacdefgen->setCodconvac($npvacdefgen['codconvac']);
		}
		if (isset($npvacdefgen['nomcon']))
		{
			$this->npvacdefgen->setNomcon($npvacdefgen['nomcon']);
		}
		//if (isset($npvacdefgen['pagoad']))
    //{
      //$this->npvacdefgen->setPagoad($npvacdefgen['pagoad']);
	  $this->npvacdefgen->setPagoad($this->getRequestParameter('checkbox1'));
    //}
  }	
}
