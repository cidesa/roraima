<?php

/**
 * Subclass for representing a row from the 'catdefaval' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catdefaval extends BaseCatdefaval
{
  protected $obj=array();

  public function getDesdivgeo()
  {
   return Herramientas::getX('CODDIVGEO','Catdivgeo','Desdivgeo',self::getCoddivgeo());
  }

  public function getNomcom()
  {
  	$nombre="";
    $p= new Criteria();
    $p->add(CatreginmPeer::CODDIVGEO,self::getCoddivgeo());
    $p->add(CatreginmPeer::NROCAS,self::getNrocas());
    $reg= CatreginmPeer::doSelectOne($p);
    if ($reg)
    {
      $o= new Criteria();
      $o->add(CatperinmPeer::CATREGINM_ID,$reg->getId());
      $o->add(CatperinmPeer::CONOCU,'P');
      $data= CatperinmPeer::doSelectOne($o);
      if ($data)
      {
      	$t= new Criteria();
      	$t->add(CatregperPeer::ID,$data->getCatregperId());
      	$res= CatregperPeer::doSelectOne($t);
      	if ($res)
      	{
      	  $nombre= $res->getPrinom()." ".$res->getSegnom()." ".$res->getPriape()." ".$res->getSegape();
      	}
      }
    }
    return $nombre;
  }
}
