<?php
require_once("../../lib/modelo/baseClases.class.php");
class Nprprescajaho extends BaseClases {

  public function sqlp($ced1,$ced2,$nom,$tipcre)
    {

       if ($ced1 == "" and $ced2 == "")
       {
       	 $filtroced = "";
       }
       else
       {
       	$filtroced= " and a.CODEMP >= '".$ced1."' AND a.CODEMP <= '".$ced2."' ";
       }

       if ($nom == "")
       {
       	$filtronom = "";
       }
       else
       {
       	$filtronom = " and (a.codnom =  '".$nom."')";
       }

       if ($tipcre == "")
       {
       	$filtrotipcre = "";
       }
       else
       {
       	$filtrotipcre = " and b.codtippre = '".$tipcre."'";
       }

	    $sql= "select a.codemp,CAST(a.CODEMP AS INT) AS CEDORD,a.monto,a.saldo,a.acumulado, c.nomcon, e.nomemp
		from npnomcal a right outer join nptippre b
		on (a.codcon = b.codcon), npdefcpt c, nphojint e
		where
		a.codcon = c.codcon
		and a.codemp = e.codemp".
		$filtroced.$filtronom.$filtrotipcre.
		 "order by cedord";
         // print '<pre>'; print $sql;exit;
	      return $this->select($sql);

    }


}
?>