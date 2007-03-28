<?php

/**
 * fortitingivss actions.
 *
 * @package    siga
 * @subpackage fortitingivss
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class fortitingivssActions extends autofortitingivssActions
{
	protected function updateFordefparingFromRequest()
	{
		$fordefparing = $this->getRequestParameter('fordefparing');

		if (isset($fordefparing['codparing']))
		{
			$this->fordefparing->setCodparing(str_pad($fordefparing['codparing'],32,' '));
		}
		if (isset($fordefparing['nomparing']))
		{
			$this->fordefparing->setNomparing($fordefparing['nomparing']);
		}
		if (isset($fordefparing['montoing']))
		{
			$this->fordefparing->setMontoing($fordefparing['montoing']);
		}
		if (isset($fordefparing['codtipfin']))
		{
			$this->fordefparing->setCodtipfin(str_pad($fordefparing['codtipfin'],4,'0',STR_PAD_LEFT));
    }
    if (isset($fordefparing['nomext']))
    {
      $this->fordefparing->setNomext($fordefparing['nomext']);
    }
  }	
}
