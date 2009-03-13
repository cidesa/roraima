<?php

/**
 * Subclass for representing a row from the 'lidetcom' table.
 *
 *
 *
 * @package lib.model
 */
class Lidetcom extends BaseLidetcom
{
	protected $nomemp = '';
	protected $cedemp = '';
	protected $dirhab = '';

	public function afterHydrate()
	{
         $c = new Criteria();
         $c->add(NphojintPeer::CODEMP,self::getCodemp());
         $empleado = NphojintPeer::doSelectOne($c);
         if ($empleado)
         {
         	$this->cedemp=$empleado->getCedemp();
         	$this->nomemp=$empleado->getNomemp();
            $this->dirhab=$empleado->getDirhab();
         }

  }

}
