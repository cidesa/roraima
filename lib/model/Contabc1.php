<?php

/**
 * Subclass for representing a row from the 'contabc1' table.
 *
 *
 *
 * @package lib.model
 */
class Contabc1 extends BaseContabc1
{
	protected $mondebito = 0.00;
	protected $moncredito = 0.00;
	protected $refasi = '';

	public function getDesnum()
	{
		return Herramientas::getX('codcta','Contabb','descta',self::getCodcta());
	}

	public function getDescta()
	{
		return Herramientas::getX('codcta','Contabb','descta',self::getCodcta());
	}


   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      if (parent::getDebcre()=='C')
	  {
		$this->moncredito= number_format(parent::getMonasi(),2,',','.');
	  }
	  else
	  {
		$this->moncredito= number_format(0,2,',','.');
	  }

	  if (parent::getDebcre()=='D')
	  {
		$this->mondebito= number_format(parent::getMonasi(),2,',','.');
	  }
	  else
	  {
		$this->mondebito= number_format(0,2,',','.');
	  }

	  /*if (parent::getNumcom()!='')
	  {
		$this->refasi=parent::getNumcom();
	  }
	  else
	  {
		$this->refasi='';
	  }*/

   }

}
