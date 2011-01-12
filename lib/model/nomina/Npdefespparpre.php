<?php

/**
 * Subclase para representar una fila de la tabla 'npdefespparpre'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2.nomina
 */ 
class Npdefespparpre extends BaseNpdefespparpre
{
	protected $nomnom='';
	protected $desret='';
        protected $objclau=array();
	
	public  function getNomnom()
	{
		return H::getX('Codnom','Npnomina','Nomnom',self::getCodnom());
	}		
	public  function getDesret()
	{
		return H::getX('Codret','Nptipret','Desret',self::getCodret());
	}
}
