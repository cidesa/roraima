<?php

/**
 * biedefconi actions.
 *
 * @package    siga
 * @subpackage biedefconi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefconiActions extends autobiedefconiActions
{
	protected function updateBndefconiFromRequest()
	{
		$bndefconi = $this->getRequestParameter('bndefconi');

		if (isset($bndefconi['codact']))
		{
			$this->bndefconi->setCodact($bndefconi['codact']);
		}
		if (isset($bndefconi['codinm']))
		{
			$this->bndefconi->setCodinm($bndefconi['codinm']);
		}
		if (isset($bndefconi['desmue']))
		{
			$this->bndefconi->setDesmue($bndefconi['desmue']);
		}
		if (isset($bndefconi['ctadepcar']))
		{
			$this->bndefconi->setCtadepcar($bndefconi['ctadepcar']);
		}
		if (isset($bndefconi['descta']))
		{
			$this->bndefconi->setDescta($bndefconi['descta']);
		}
		if (isset($bndefconi['ctadepabo']))
		{
			$this->bndefconi->setCtadepabo($bndefconi['ctadepabo']);
		}
		if (isset($bndefconi['desctaabo']))
		{
			$this->bndefconi->setDesctaabo($bndefconi['desctaabo']);
		}
		if (isset($bndefconi['ctaajucar']))
		{
			$this->bndefconi->setCtaajucar($bndefconi['ctaajucar']);
		}
		if (isset($bndefconi['desctaajucar']))
		{
			$this->bndefconi->setDesctaajucar($bndefconi['desctaajucar']);
		}
		if (isset($bndefconi['ctaajuabo']))
		{
			$this->bndefconi->setCtaajuabo($bndefconi['ctaajuabo']);
		}
		if (isset($bndefconi['desctaajuabo']))
		{
			$this->bndefconi->setDesctaajuabo($bndefconi['desctaajuabo']);
		}
		if (isset($bndefconi['ctarevcar']))
		{
			$this->bndefconi->setCtarevcar($bndefconi['ctarevcar']);
		}
		if (isset($bndefconi['desctarevcar']))
		{
			$this->bndefconi->setDesctarevcar($bndefconi['desctarevcar']);
		}
		if (isset($bndefconi['ctarevabo']))
		{
			$this->bndefconi->setCtarevabo($bndefconi['ctarevabo']);
		}
		if (isset($bndefconi['desctarevabo']))
		{
			$this->bndefconi->setDesctarevabo($bndefconi['desctarevabo']);
		}
		if (isset($bndefconi['ctapercar']))
		{
			$this->bndefconi->setCtapercar($bndefconi['ctapercar']);
		}
		if (isset($bndefconi['desctapercar']))
		{
			$this->bndefconi->setDesctapercar($bndefconi['desctapercar']);
		}
		if (isset($bndefconi['ctaperabo']))
		{
			$this->bndefconi->setCtaperabo($bndefconi['ctaperabo']);
		}
		if (isset($bndefconi['desctaperabo']))
    {
      $this->bndefconi->setDesctaperabo($bndefconi['desctaperabo']);
    }
		if (!isset($bndefconi['stacta']))
		{
			$this->bndefconi->setStacta('A');
		}       
  }	
}
