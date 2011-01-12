<?php

/**
 * Subclass for representing a row from the 'fcdecpag'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcdecpag.php 32426 2009-09-02 03:49:02Z lhernandez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcdecpag extends BaseFcdecpag
{

	protected $nombre='';
	protected $tipo='';
	protected $autliq='';
	protected $mora='';
	protected $prontopg='';
	protected $montopag='';
	protected $montopagcon='';
	protected $fueing='';
	protected $saldo='';
	protected $check= false;

	public function hydrate(ResultSet $rs, $startcol = 1) {
		parent :: hydrate($rs, $startcol);

		//$this->montopag = self::getMondec() + self::getMora() - self::getProntopg();

	}

}
