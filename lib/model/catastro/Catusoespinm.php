<?php

/**
 * Subclass for representing a row from the 'catusoespinm' table.
 *
 *
 *
 * @package lib.model.catastro
 */
class Catusoespinm extends BaseCatusoespinm
{
	protected $tipocons='';
	protected $costo="0,00";
	protected $montot="0,00";

  public static function Tipocons()
  {
    $c = new Criteria();
    $lista = CatusoespPeer::doSelect($c);
    $modulos = array();

    foreach($lista as $arr)
    {
    	$modulos += array($arr->getId() => $arr->getDesuso());
    }
	return $modulos;
  }

  public function getCosto()
  {
    $t= new Criteria();
    $t->add(CatreginmPeer::ID,self::getCatreginmId());
    $reg= CatreginmPeer::doSelectOne($t);
    if ($reg)
    {
      $y= new Criteria();
      $y->add(CatcosavalPeer::CODDIVGEO,$reg->getCoddivgeo());
      $y->add(CatcosavalPeer::TIPO,self::getTipo());
      $y->add(CatcosavalPeer::CATUSOESP_ID,self::getCatusoespId());
      $reg2= CatcosavalPeer::doSelectOne($y);
      if ($reg2)
      {
        $this->costo=number_format($reg2->getCosto(), 2, ',', '.');
      }
    }
   return $this->costo;
  }

  public function afterHydrate()
  {
    $calculo=self::getValor()*self::getCosto();
    $this->montot=number_format($calculo, 2, ',', '.');

    //return $this->montot;
  }

/*  public function getMontot()
  {
    $calculo=self::getValor()*self::getCosto();
    $this->montot=number_format($calculo, 2, ',', '.');

   return $this->montot;
  }*/
}
