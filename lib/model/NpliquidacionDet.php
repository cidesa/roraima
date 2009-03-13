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
	protected $sue311296=0;
	protected $sue180697=0;
	protected $ultimosueldo=0;
	protected $fecing="";
	protected $feccor="";
	protected $fecegr="";
	protected $diaefe="";
	protected $mesefe="";
	protected $anoefe="";
	protected $dianr="";
	protected $mesnr="";
	protected $anonr="";
	protected $diara="";
	protected $mesra="";
	protected $anora="";
	protected $objvaca=array();
	protected $objasig=array();
	protected $objdeduc=array();




  /*public function getSue211296()
  {
  	  $sql="Select coalesce(sum(MonAsi),0) as monasi from NPSALINT where CodEmp='".self::getCodemp()."' and  FECFINCON= to_date('31/12/1996','dd/mm/yyyy') order by FECFINCON Desc";
	  if (Herramientas :: BuscarDatos($sql, & $rs)) {
			return $rs[0]['monasi'];
	  }else
	       return 0;
  }*/
}
