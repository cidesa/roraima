<?php

/**
 * Subclass for representing a row from the 'fordefunieje'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */ 
class Fordefunieje extends BaseFordefunieje
{
  public function getNomemp()
  {
    return Herramientas::getX('CODEMP','Nphojint','Nomemp',self::getCodemp());
  }
}
