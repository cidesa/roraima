<?php

/**
 * biedefconm actions.
 *
 * @package    siga
 * @subpackage biedefconm
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class biedefconmActions extends autobiedefconmActions
{
	protected function updateBndefconFromRequest()
	{
		$bndefcon = $this->getRequestParameter('bndefcon');

		if (isset($bndefcon['codact']))
		{
			$this->bndefcon->setCodact($bndefcon['codact']);
		}
		if (isset($bndefcon['codmue']))
		{
			$this->bndefcon->setCodmue($bndefcon['codmue']);
		}
		if (isset($bndefcon['desmue']))
		{
			$this->bndefcon->setDesmue($bndefcon['desmue']);
		}
		if (isset($bndefcon['ctadepcar']))
		{
			$this->bndefcon->setCtadepcar($bndefcon['ctadepcar']);
		}
		if (isset($bndefcon['descta']))
		{
			$this->bndefcon->setDescta($bndefcon['descta']);
		}
		if (isset($bndefcon['ctadepabo']))
		{
			$this->bndefcon->setCtadepabo($bndefcon['ctadepabo']);
		}
		if (isset($bndefcon['desctaabo']))
		{
			$this->bndefcon->setDesctaabo($bndefcon['desctaabo']);
		}
		if (isset($bndefcon['ctaajucar']))
		{
			$this->bndefcon->setCtaajucar($bndefcon['ctaajucar']);
		}
		if (isset($bndefcon['desctaajucar']))
		{
			$this->bndefcon->setDesctaajucar($bndefcon['desctaajucar']);
		}
		if (isset($bndefcon['ctaajuabo']))
		{
			$this->bndefcon->setCtaajuabo($bndefcon['ctaajuabo']);
		}
		if (isset($bndefcon['desctaajuabo']))
		{
			$this->bndefcon->setDesctaajuabo($bndefcon['desctaajuabo']);
		}
		if (isset($bndefcon['ctarevcar']))
		{
			$this->bndefcon->setCtarevcar($bndefcon['ctarevcar']);
		}
		if (isset($bndefcon['desctarevcar']))
		{
			$this->bndefcon->setDesctarevcar($bndefcon['desctarevcar']);
		}
		if (isset($bndefcon['ctarevabo']))
		{
			$this->bndefcon->setCtarevabo($bndefcon['ctarevabo']);
		}
		if (isset($bndefcon['desctarevabo']))
		{
			$this->bndefcon->setDesctarevabo($bndefcon['desctarevabo']);
		}
		if (isset($bndefcon['ctapercar']))
		{
			$this->bndefcon->setCtapercar($bndefcon['ctapercar']);
		}
		if (isset($bndefcon['desctapercar']))
		{
			$this->bndefcon->setDesctapercar($bndefcon['desctapercar']);
		}
		if (isset($bndefcon['ctaperabo']))
		{
			$this->bndefcon->setCtaperabo($bndefcon['ctaperabo']);
		}
		if (isset($bndefcon['desctaperabo']))
		{
      $this->bndefcon->setDesctaperabo($bndefcon['desctaperabo']);
    }
		if (!isset($bndefcon['stacta']))
		{
			$this->bndefcon->setStacta('A');
		}    
  }	
}
