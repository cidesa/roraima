<?php

/**
 * Subclass for representing a row from the 'atrecayu' table.
 *
 *
 *
 * @package lib.model
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
