<?php

/**
 * Subclass for representing a row from the 'npliquidacion_det' table.
 *
 *
 *
 * @package lib.model
 */
class NpliquidacionDet extends BaseNpliquidacionDet
{
	protected $nomemp="";
	protected $sue311296="0,00";
	protected $sue180697="0,00";
	protected $ultimosueldo="0,00";
	protected $salarioint="0,00";
	protected $fecing="";
	protected $feccor="";
	protected $fecegr="";
	protected $diaefe="";
	protected $mesefe="";
	protected $anoefe="";
	protected $diarn="";
	protected $mesrn="";
	protected $anorn="";
	protected $diara="";
	protected $mesra="";
	protected $anora="";
	protected $objvaca=array();
	protected $objasig=array();
	protected $objdeduc=array();
	protected $codret='';
	
	public function hydrate(ResultSet $rs, $startcol = 1)
   {
      parent::hydrate($rs, $startcol);
      $this->codret=self::getCodret();
   }
	
}
