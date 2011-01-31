<?php

/**
 * Subclass for representing a row from the 'fcfuentesmul'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: lhernandez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcfuentesmul.php 32426 2009-09-02 03:49:02Z lhernandez $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcfuentesmul extends BaseFcfuentesmul
{
	protected $nomfue="";
	protected $nomfuegen="";

    public function getNomfue()
    {
        return Herramientas::getX_vacio('codfue','FCfuepre','nomfue',self::getCodfue());
    }

    public function getNomfuegen()
    {
        return Herramientas::getX_vacio('codfue','FCfuepre','nomfue',self::getCodfuegen());
    }
}
