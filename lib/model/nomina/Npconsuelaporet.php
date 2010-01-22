<?php

/**
 * Subclase para representar una fila de la tabla 'npconsuelaporet'.
 *
 * 
 *
 * @package    Roraima
 * @subpackage lib.model.nomina
 * @author     $ <desarrollo@cidesa.com.ve>
 * @version SVN: $
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2 
 */ 
class Npconsuelaporet extends BaseNpconsuelaporet
{
  public function getnomnom()
  {
    return H::getX_vacio('Codnom', 'Npnomina', 'Nomnom', self::getCodnom());
  }

  public function getnomcon()
  {
    return H::getX_vacio('Codcon', 'Npdefcpt', 'Nomcon', self::getCodcon());
  }
}
