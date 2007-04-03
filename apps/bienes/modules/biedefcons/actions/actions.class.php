<?php

/**
 * biedefcons actions.
 *
 * @package    siga
 * @subpackage biedefcons
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefconsActions extends autobiedefconsActions
{
	protected function updateBndefconsFromRequest()
	{
		$bndefcons = $this->getRequestParameter('bndefcons');

		if (isset($bndefcons['codact']))
		{
			$this->bndefcons->setCodact($bndefcons['codact']);
		}
		if (isset($bndefcons['codsem']))
		{
			$this->bndefcons->setCodsem($bndefcons['codsem']);
		}
		if (isset($bndefcons['desmue']))
		{
			$this->bndefcons->setDesmue($bndefcons['desmue']);
		}
		if (isset($bndefcons['ctadepcar']))
		{
			$this->bndefcons->setCtadepcar($bndefcons['ctadepcar']);
		}
		if (isset($bndefcons['descta']))
		{
			$this->bndefcons->setDescta($bndefcons['descta']);
		}
		if (isset($bndefcons['ctadepabo']))
		{
			$this->bndefcons->setCtadepabo($bndefcons['ctadepabo']);
		}
		if (isset($bndefcons['desctaabo']))
		{
			$this->bndefcons->setDesctaabo($bndefcons['desctaabo']);
		}
		if (isset($bndefcons['ctaajucar']))
		{
			$this->bndefcons->setCtaajucar($bndefcons['ctaajucar']);
		}
		if (isset($bndefcons['desctaajucar']))
		{
			$this->bndefcons->setDesctaajucar($bndefcons['desctaajucar']);
		}
		if (isset($bndefcons['ctaajuabo']))
		{
			$this->bndefcons->setCtaajuabo($bndefcons['ctaajuabo']);
		}
		if (isset($bndefcons['desctaajuabo']))
		{
			$this->bndefcons->setDesctaajuabo($bndefcons['desctaajuabo']);
		}
		if (isset($bndefcons['ctarevcar']))
		{
			$this->bndefcons->setCtarevcar($bndefcons['ctarevcar']);
		}
		if (isset($bndefcons['desctarevcar']))
		{
			$this->bndefcons->setDesctarevcar($bndefcons['desctarevcar']);
		}
		if (isset($bndefcons['ctarevabo']))
		{
			$this->bndefcons->setCtarevabo($bndefcons['ctarevabo']);
		}
		if (isset($bndefcons['desctarevabo']))
		{
			$this->bndefcons->setDesctarevabo($bndefcons['desctarevabo']);
		}
		if (isset($bndefcons['ctapercar']))
		{
			$this->bndefcons->setCtapercar($bndefcons['ctapercar']);
		}
		if (isset($bndefcons['desctapercar']))
		{
			$this->bndefcons->setDesctapercar($bndefcons['desctapercar']);
		}
		if (isset($bndefcons['ctaperabo']))
		{
			$this->bndefcons->setCtaperabo($bndefcons['ctaperabo']);
		}
		if (isset($bndefcons['desctaperabo']))
    {
      $this->bndefcons->setDesctaperabo($bndefcons['desctaperabo']);
    }
		if (!isset($bndefcons['stacta']))
		{
			$this->bndefcons->setStacta('A');
		}         
  }	
}
