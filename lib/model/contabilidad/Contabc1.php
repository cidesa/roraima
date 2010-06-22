<?php

/**
 * Subclase para representar una fila de la tabla 'contabc1'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model.contabilidad
 * @author     $Author: dmartinez $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Contabc1.php 38320 2010-05-21 14:10:13Z dmartinez $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Contabc1 extends BaseContabc1
{

	protected $mondebito = '';
	protected $moncredito = 0.00;
	protected $totdeb = 0.00;
	protected $totcre = 0.00;
	protected $refasi = '';
        protected $codcencos = '';
        protected $descencos = '';
        protected $moncencos = '0,00';

   public function getDesnum()
   {
     return Herramientas::getX('codcta','Contabb','descta',self::getCodcta());
   }

   public function getDescta()
   {
     return Herramientas::getX('codcta','Contabb','descta',self::getCodcta());
   }

   /*public function getTotdeb()
   {
     return $this->totdeb=$this->totdeb+$this->mondebito;
   }

   public function getTotcre()
   {
     return $this->totcre=$this->totcre+$this->moncredito;
   }*/

   public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      if (parent::getDebcre()=='C')
	  {
		$this->moncredito= H::FormatoMonto(parent::getMonasi());
	  }
	  else
	  {
	  	$this->moncredito= H::FormatoMonto('');
	  }

      if (parent::getDebcre()=='D')
	  {
		$this->mondebito= H::FormatoMonto(parent::getMonasi());
	  }
	  else
	  {
	  	$this->mondebito= H::FormatoMonto('');
	  }
   }
}
