<?php
   //
/**
 * activarconceptos actions.
 *
 * @package    siga
 * @subpackage activarconceptos
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class activarconceptosActions extends autoactivarconceptosActions
{
	protected function updateNpdefcptFromRequest()
	{
		$npdefcpt = $this->getRequestParameter('npdefcpt');

		/*if (isset($npdefcpt['codcon']))
		{
			$this->npdefcpt->setCodcon($npdefcpt['codcon']);
		}
		if (isset($npdefcpt['nomcon']))
    {
      $this->npdefcpt->setNomcon($npdefcpt['nomcon']);
    }*/
    //if (isset($npdefcpt['estados']))
   //{
      $this->npdefcpt->setConact($this->getRequestParameter('radio1'));
    //}
  }	
}
