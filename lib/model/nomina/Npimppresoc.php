<?php

/**
 * Subclase para representar una fila de la tabla 'npimppresoc'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Npimppresoc extends BaseNpimppresoc
{
	protected $mondia=0;
	protected $monto='';
	protected $dias='';
	protected $monpro='';
	protected $capital=0;
	protected $capitalact=0;
	protected $monpres=0;
	protected $tasa=0;
	protected $monint=0;
	//protected $monint=0;
	protected $mesactual='';
	protected $monant=0;
	protected $monadeint=0;

	protected $codtipcon='';
	protected $intacu=0;
	protected $antdias=0;
	protected $antmeses=0;
	protected $antannos=0;
  protected $salint=0;

  public function getSalint()
  {
    return $this->salemp+$this->aliuti+$this->alibono+$this->aliadi;
  }

}
