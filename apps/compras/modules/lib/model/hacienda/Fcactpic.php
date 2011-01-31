<?php

/**
 * Subclass for representing a row from the 'fcactpic'.
 *
 *
 *
 * @package    Roraima
 * @subpackage lib.model
 * @author     $Author: jlobaton $ <desarrollo@cidesa.com.ve>
 * @version SVN: $Id: Fcactpic.php 32925 2009-09-10 13:11:09Z jlobaton $
 *
 * @copyright  Copyright 2007, Cide S.A.
 * @license    http://opensource.org/licenses/gpl-2.0.php GPLv2
 */
class Fcactpic extends BaseFcactpic
{
  protected $exonerable="";
  protected $camdat="";
  protected $mascarapre="";
  protected $monbru=0;
  protected $imppag=0;
  protected $mtrcon='';

  public function afterHydrate()
  {
    $this->desact = Herramientas::getX('codact','fcactcom','desact',self::getCodact());
    $this->exonerable = Herramientas::getX('codact','fcactcom','exoner',self::getCodact());
    $this->monbru = 0;
	$this->unidad = Herramientas::getX('codemp','fcdefins','unipic','001');
	$this->valunitri = Herramientas::getX('codemp','fcdefins','valunitri','001');

   		$c = new Criteria();
   		$c->add(FcactcomPeer::CODACT, self::getCodact()."%", Criteria::LIKE );
   		$c->add(FcactcomPeer::ANOACT, self::getAnodec());
   		$reg= FcactcomPeer::doselectone($c);
/*
    sql = "Select a.CodAct as Codigo_Actividad," 0
    		"a.DesAct as Descripcion," 1
    		"a.MinTri as Minimo_Tributable," 2
    		"a.AfoAct as Alicuota_a_Pagar," 3
    		"case2(a.MinoFac,'F','Factor','Minimo') as Minimo_o_Factor, " 4
    		"case2(a.Exoner,'S','SI','NO') as Exonerable  " 5
    		"from FCACTCOM a Where  " _
          + "trim(a.codact) like '" + Trim(GridBd2.TextMatrix(Pos, 1)) + "%' and a.anoact='" + GridBd2.TextMatrix(Pos, 0) + "'"

*/
		$PorDec = '1';
   		if ($reg)
   		{
			$this->desact = $reg->getDesact();

			if ($this->unidad=='B')
			{
				$MontoaComparar = $reg->getMintri();
			}else{
				$MontoaComparar = $reg->getMintri() * $this->valunitri;
			}

			if ($reg->getMintri() == 'F')
			{
				$this->impbru = H::FormatoMonto(self::getMonact() * $PorDec * $reg->getAfoact());
			}else{
				$this->impbru = H::FormatoMonto(self::getMonact() * $PorDec * $reg->getAfoact() / 100);
			}

			$this->mintri = H::FormatoMonto($reg->getAfoact());
   		}

  }


   public function getImpbru55()
   {
   		$c = new Criteria();
   		$c = add(FcactcomPeer::CODACT, self::getCodact()."%", Criteria::LIKE );
   		$c = add(FcactcomPeer::ANOACT, self::getAnodec());
   		$reg= FcactcomPeer::doselect($c);

   		if ($reg)
   		{

   		}
/*
		sql = "Select a.CodAct as Codigo_Actividad,a.DesAct as Descripcion,a.MinTri as Minimo_Tributable,a.AfoAct as Alicuota_a_Pagar,case2(a.MinoFac,'F','Factor','Minimo') as Minimo_o_Factor, case2(a.Exoner,'S','SI','NO') as Exonerable  from FCACTCOM a Where  " _
          + "trim(a.codact) like '" + Trim(GridBd2.TextMatrix(Pos, 1)) + "%' and a.anoact='" + GridBd2.TextMatrix(Pos, 0) + "'"
*/
   		return '1';
   }


  public function getMonbru55()
  {
/*
    sql = "Select a.CodAct as Codigo_Actividad,a.DesAct as Descripcion,a.MinTri*b.valunitri as Minimo_Tributable," .
    		"a.AfoAct as Alicuota_a_Pagar," .
    		"case2(a.MinoFac,'F','Factor','Minimo') as Minimo_o_Factor, " .
    		"case2(a.Exoner,'S','SI','NO') as Exonerable  from FCACTCOM a,FCDEFINS b Where  " _
    + "RPAD(A.CodAct,16,' ')='" + FILL(GridBd2.TextMatrix(Pos, 1), " ", 16, 3) + "' and A.AnoAct='" + AnoDeclar + "' "

    $c = new Criteria();
    $c->add(FcactcomPeer::CODACT,self::getCodact());
    $c->add(FcactcomPeer::CODACT,self::getCodact());
*/
  }


}
