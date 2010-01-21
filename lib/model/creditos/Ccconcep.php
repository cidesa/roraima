<?php

/**
 * Subclass for representing a row from the 'ccconcep' table.
 *
 *
 *
 * @package lib.model
 */
class Ccconcep extends BaseCcconcep
{
  public function getDespar()
  {
    $ccpartid = $this->getCcpartid();
    if($ccpartid) return $ccpartid->getNompar();
    else return '';
  }

  public function getNompar(){

    if (self::getCodpar()!="")
  {
    $c = new Criteria();
      $c->add(NppartidasPeer::CODPAR,'%'.self::getCodpar().'%',Criteria::LIKE);
      $lista = NppartidasPeer::doSelectOne($c);
       if ($lista)
          $nompar=$lista->getNompar();
       else
       { $nompar= '';}
  }    else
       { $nompar= '';}
      return $nompar;

  }

}
