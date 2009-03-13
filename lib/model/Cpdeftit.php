<?php

/**
 * Subclass for representing a row from the 'cpdeftit' table.
 *
 *
 *
 * @package lib.model
 */
class Cpdeftit extends BaseCpdeftit
{
  protected $listaperiodo = array();
  protected $obj = array();

  public function getCodigo1()
  {
   return self::getCodpre();
  }
  public function getNombre1()
  {
   return self::getNompre();
  }

  public static function Listaperiodo()
  {
    $c = new Criteria();
    $nroperiod = CpdefnivPeer::doSelectone($c);

	$lista = array();
	if ($nroperiod)
	{
      for ($i=0;$i<=$nroperiod->getNumper();$i++)
      {
    	$i = str_pad($i,2,'0',STR_PAD_LEFT);
		$lista += array($i => $i);
      }
	}
	return $lista;

  }
}
