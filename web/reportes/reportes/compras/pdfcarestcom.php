<?
	require_once("../../lib/general/fpdf/fpdf.php");

	require_once("../../lib/general/Herramientas.class.php");
		require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $numcom1;
		var $numcom2;
		var $feccom1;
		var $feccom2;
		var $tipcom1;
		var $tipcom2;
		var $stacom;
		var $codpre1;
		var $codpre2;
		var $comodin;

		function pdfreporte()
		{
			$this->fpdf("l","mm","Letter");

	$this->arrp=array("no_vacio");
				$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numcom1=H::GetPost("numcom1");
			$this->numcom2=H::GetPost("numcom2");
			$this->bendes=H::GetPost("bendes");
			$this->benhas=H::GetPost("benhas");
			$this->feccom1=H::GetPost("feccom1");
			$this->feccom2=H::GetPost("feccom2");
			$this->stacom=H::GetPost("estado");
			$this->tipcom1=H::GetPost("tipcom1");
			$this->comodin=H::GetPost("comodin");

			if (!empty($this->tipcom1))
			{
				$sqltipo="(A.TIPCOM) = ('".$this->tipcom1."') AND ";
			}else
			    $sqltipo="";

			if ($this->stacom=="0")
			{
				$sqlstatus="";
				$this->estatus="Todos";
			}
			elseif($this->stacom=="1")
			{
				$sqlstatus=" a.moncom > 0 and salcau=0 and salpag=0 and ";
				$this->estatus="Solo Comprometidos";
			}
			elseif($this->stacom=="2")
			{
				$sqlstatus=" a.salcau > 0 and a.salpag=0 and ";
				$this->estatus="Comprometidos Causados";
			}
			else
			{
				$sqlstatus=" a.salpag > 0 and";
				$this->estatus="Comprometidos Pagados";
			}
			//if ($this->comodin<>"%%"){
			//$a=",b.monimp as monto, b.moncau as causado , b.monpag as paga";
			//}
			//else $a="";

			$this->sql="
SELECT
distinct A.refcom as referencia,
A.tipcom as tipo,
to_char(A.feccom,'dd/mm/yyyy') as fecha,
A.CEDRIF, (CASE WHEN A.STACOM='A' THEN 'Activo' WHEN A.STACOM='N' THEN 'Anulado' ELSE '' END) as STATUS2,
A.FECANU,
a.stacom,
a.salcau as salcau,
a.salpag as salpag,
D.NOMBEN as provee ,
a.moncom as moncom,
sum( b.monimp) as monto,
sum(b.moncau) as causado ,
sum(b.monpag) as paga
FROM CPCOMPRO A,CPIMPCOM b, OPBENEFI D
      WHERE
   A.STACOM<>'N' AND
               				(A.REFCOM)>=('".$this->numcom1."')  AND
                			(A.REFCOM) <=('".$this->numcom2."') AND
                			(A.CEDRIF)>=('".$this->bendes."')  AND
                			(A.CEDRIF) <=('".$this->benhas."') AND
               				(A.FECCOM)>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
               				(A.FECCOM)<=to_date('".$this->feccom2."','dd/mm/yyyy') AND
               				(a.refcom) = (b.refcom) and
               				(D.CEDRIF)= (A.CEDRIF) AND
							".$sqltipo."
							".$sqlstatus."
               				 b.codpre LIKE RTRIM('".$this->comodin."')
         group by
         A.refcom , A.tipcom , to_char(A.feccom,'dd/mm/yyyy') , A.CEDRIF, A.FECANU,
	a.stacom, a.salcau , a.salpag , D.NOMBEN ,a.moncom ";



		/*	$this->sql="SELECT distinct A.refcom as referencia,
							A.tipcom as tipo,
							to_char(A.feccom,'dd/mm/yyyy') as fecha,
							A.CEDRIF,
							(CASE WHEN A.STACOM='A' THEN 'Activo' WHEN A.STACOM='N' THEN 'Anulado' ELSE '' END) as STATUS2,
							A.FECANU,
							a.stacom,
							a.salcau as salcau,
							a.salpag as salpag,
							a.moncom as moncom,
							D.NOMBEN as provee ,
							sum( b.monimp) as monto,
							b.moncau as causado ,
							b.monpag as paga
						FROM CPCOMPRO A,CPIMPCOM b, OPBENEFI D
						WHERE
							A.STACOM<>'N' AND
               				(A.REFCOM)>=RPAD('".$this->numcom1."',8,' ')  AND
                			(A.REFCOM) <=RPAD('".$this->numcom2."',8,' ') AND
                			(A.CEDRIF)>=RPAD('".$this->bendes."',15,' ')  AND
                			(A.CEDRIF) <=RPAD('".$this->benhas."',15,' ') AND
               				(A.FECCOM)>=to_date('".$this->feccom1."','dd/mm/yyyy') AND
               				(A.FECCOM)<=to_date('".$this->feccom2."','dd/mm/yyyy') AND
               				trim(a.refcom) = trim(b.refcom) and
               				trim(D.CEDRIF)=trim(A.CEDRIF) AND
							".$sqltipo."
							".$sqlstatus."
               				 b.codpre LIKE RTRIM('".$this->comodin."')
               				 group by
							 A.refcom ,
							A.tipcom ,
							to_char(A.feccom,'dd/mm/yyyy')  ,
							A.CEDRIF,
							A.FECANU, a.stacom,
							a.salcau ,
							a.salpag ,
							a.moncom ,
							D.NOMBEN ,
							b.moncau,
							b.monpag ";
//print 	$this->sql;exit;*/



			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->arrp=$this->bd->select($this->sql);
			if ($this->arrp->EOF)
				$this->arrp=array();

		}
		function llenartitulosmaestro()
		{
				$this->titulos[]="NUMERO";
				$this->titulos[]="ESTATUS COMPROMISOS";
				$this->titulos[]="FECHA";
				$this->titulos[]="TIPO";
				$this->titulos[]="PROVEEDOR";
				$this->titulos[]="COMPROMETIDO";
				$this->titulos[]="CAUSADO";
				$this->titulos[]="PAGADO";
				$this->anchos[]=25;
				$this->anchos[]=25;
				$this->anchos[]=20;
				$this->anchos[]=15;
				$this->anchos[]=80;
				$this->anchos[]=30;
				$this->anchos[]=30;
				$this->anchos[]=30;
			}

		function Header()
		{
			$this->cab->poner_cabecera($this,H::GetPost("titulo"),"l","s","n");
			$this->setFont("Arial","B",9);
			$this->setTextcolor(0,0,155);
			$this->cell(90,5,'FECHA DESDE :'.$this->feccom1.' HASTA :'.$this->feccom2);
			$this->ln(4);
			if (!empty($this->tipcom1))
			{
				$tb0=$this->bd->select("select nomext from cpdoccom where tipcom='".$this->tipcom1."'");
				//print "<pre>p";print_r($tb0);exit;
				$this->cell(90,5,'TIPO DE COMPROMISO :'.$tb0->fields["nomext"]);
			}else
				$this->cell(90,5,'TIPO DE COMPROMISO :  TODOS');
			$this->ln(4);
			$this->cell(90,5,'ESTATUS :  '.strtoupper($this->estatus));
			$this->ln(5);
			$comodin = trim(str_replace("%"," ",$this->comodin));
			if(!empty($comodin))
			{
				$tb00=$this->bd->select("Select nompre FROM CPDEFTIT where (codpre) like '".$this->comodin."' order by codpre");
				$nombre=$tb00->fields["nompre"];
				$this->cell(90,5,'Categoria-Partida:  '.$comodin."  -  ".$nombre);
				$this->ln(5);
				$tb01=$this->bd->select("Select mondis as mondis FROM CPASIINI where (codpre) like '".$this->comodin."' and perpre='00'");
				$mondis=$tb01->fields["mondis"];
				$this->cell(90,5,'DISPONIBILIDAD:  '.H::FormatoMonto($mondis));
				$this->ln(5);
			}
			$fecha=split("/",$this->feccom2);
			$this->cell(90,5,'EJERCICIO FISCAL:  '.$fecha[2]);
			$this->ln(5);
			$this->setTextcolor(0,0,0);
			$this->Line(10,$this->getY(),270,$this->getY());
			$this->ln(3);
			$this->setWidths($this->anchos);
		    $this->setAligns(array("C","C","C","C","L","R","R","R"));
		    $this->setTextcolor(155,0,0);
			$this->Row($this->titulos);
			$this->setTextcolor(0,0,0);
			$this->Line(10,$this->getY()+3,270,$this->getY()+3);
			$this->ln(5);

		}
		function Cuerpo()
		{
	        $this->setFont("Arial","",8);
		    $tb=$this->arrp;
		    $this->setWidths($this->anchos);
		    $this->setAligns(array("C","C","C","C","L","R","R","R"));
		    $totalcom=0;
		    $totalcau=0;
		    $totalpag=0;
			while(!$tb->EOF)
			{
				if(strtoupper($tb->fields["stacom"])=="A")
					$status="Activo";
				else
				    $status="Anulado";
			 //print	$this->comodin	;
				/*if ($this->comodin=="%%"){
				$monto=$tb->fields["moncom"];
				$causado=$tb->fields["salcau"];
				$pagado=$tb->fields["salpag"];
				}
				else
				{*/
				//print "se fur por aqui";
				$monto=$tb->fields["monto"];
				$causado=$tb->fields["causado"];
				$pagado=$tb->fields["paga"];

				//}

				$this->Row(array($tb->fields["referencia"],$status,$tb->fields["fecha"],$tb->fields["tipo"],$tb->fields["provee"],H::FormatoMonto($monto),H::FormatoMonto($causado),H::FormatoMonto($pagado)));
				$totalcom+=$monto;
				$totalcau+=$causado;
				$totalpag+=$pagado;
				$tb->MoveNext();
			}
			$this->setFont("Arial","B",9);
			$this->setBorder(true);
			$this->Row(array("","","","","TOTALTES",H::FormatoMonto($totalcom),H::FormatoMonto($totalcau),H::FormatoMonto($totalpag)));
			$this->bd->closed();
		}
	}
?>