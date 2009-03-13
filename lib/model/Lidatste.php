<?php

/**
 * Subclass for representing a row from the 'lidatste' table.
 *
 *
 *
 * @package lib.model
 */
class Lidatste extends BaseLidatste
{

	protected $nomemp = '';
	protected $cedemp = '';
	protected $telemp = '';
	protected $diremp = '';
	public function afterHydrate()
	{
         $c = new Criteria();
         $c->add(NphojintPeer::CODEMP,self::getCodemp());
         $empleado = NphojintPeer::doSelectOne($c);
         if ($empleado)
         {
         	$this->cedemp=$empleado->getCedemp();
         	$this->nomemp=$empleado->getNomemp();
            $this->diremp=$empleado->getDirhab();
            $this->telemp=$empleado->getTelhab();
         }

  }

}
