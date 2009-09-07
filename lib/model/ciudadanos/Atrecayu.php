<?php

/**
 * Subclase para representar una fila de la tabla 'atrecayu'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.ciudadanos
 * @author     $Author$ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id$
 * 
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Atrecayu extends BaseAtrecayu
{
  protected $desayu = '';
  protected $desrec = '';

  public function hydrate(ResultSet $rs, $startcol = 1){
    parent::hydrate($rs, $startcol);

    $attipayu = $this->getAttipayu();
    $atrecaud = $this->getAtrecaud();
    if($attipayu) $this->desayu = $attipayu->getDesayu();
    if($atrecaud) $this->desrec = $atrecaud->getDesrec();

  }

}
