<?php

/**
 * Subclass for performing query and update operations on the 'ccparcre' table.
 *
 *
 *
 * @package lib.model
 */
class CcparcrePeer extends BaseCcparcrePeer
{

  public static function buscarProParCre($id1,$id2,$id3){
    $c = new Criteria();
    $c->add(CcparcrePeer::CCPROGRA_ID,$id1);
    $c->add(CcparcrePeer::CCPARTID_ID,$id2);
    $c->add(CcparcrePeer::CCCREDIT_ID,$id3);
    $per = CcparcrePeer::doSelectOne($c);

    return $per;
  }

}
