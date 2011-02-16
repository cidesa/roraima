<?php

/**
 * Subclass for representing a row from the 'lidetcom'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Lidetcom.php 32428 2009-09-02 04:18:52Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
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
            $this->nomcar=$empleado->getNomcar();
         }

  }

}
