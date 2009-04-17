<?php

/**
 * Subclass for representing a row from the 'cidefniv' table.
 *
 *
 *
 * @package lib.model
 */
class Cidefniv extends BaseCidefniv
{

  protected $grid= array();
  protected $gridper= array();
  protected $gridper2= array();

  public function getNomemp()
    {
      $c = new Criteria();
      $c->add(EmpresaPeer::CODEMP,'001');
      $nombre = EmpresaPeer::doSelectone($c);
    if ($nombre)
      return $nombre->getNomemp();
    else
      return 'No encontrado';
    }



}
