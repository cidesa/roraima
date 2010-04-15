<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $empdes;
		var $emphas;
		var $cardes;
		var $carhas;
		var $nivdes;
		var $nivhas;
		var $condes;
		var $conhas;
		var $revisado;
		var $autorizado;
		var $elaborado;
		var $tipnomdes;

		function pdfreporte()
		{
			$this->conf="p";
			$this->fpdf($this->conf,"mm","Letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->empdes=$_POST["empdes"];
			$this->emphas=$_POST["emphas"];
			$this->cardes=$_POST["cardes"];
			$this->carhas=$_POST["carhas"];
			$this->nivdes=$_POST["nivdes"];
			$this->nivhas=$_POST["nivhas"];
			$this->condes=$_POST["condes"];
			$this->conhas=$_POST["conhas"];
			$this->fecdes=$_POST["fecdes"];
			$this->fechas=$_POST["fechas"];
			$this->tipnomdes=$_POST["tipnomdes"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
			$this->autorizado=$_POST["autorizado"];

			$this->sql="SELECT DISTINCT(B.CODEMP) as codemp,
to_char(C.FECRET,'dd/mm/yyyy') as fecret,
to_char(C.FECING,'dd/mm/yyyy') as fecing,
C.NOMEMP,
B.codcat,
d.nomcat,
C.NUMCUE AS CUENTA_BANCO,
B.CODNIV,
C.CEDEMP,
f.nomban,
A.NOMCAR,
E.DESNIV,
B.CODEMP,
B.CODCON,
G.OPECON,
LTRIM(RTRIM(G.NOMCON)) AS NOMCON,
LTRIM(RTRIM(B.CODCAR)) AS CODCAR,
(CASE WHEN G.OPECON='A' THEN coalesce(B.MONTO,0) ELSE 0 END) as ASIGNA,
(CASE WHEN G.OPECON='D' THEN coalesce(B.MONTO,0) ELSE 0 END) as DEDUC
FROM
NPHISCON B LEFT OUTER JOIN NPCATPRE D ON (B.CODCAT=D.CODCAT),
NPHOJINT C LEFT OUTER JOIN npbancos f ON (C.CODBAN=f.codban),
 NPCARGOS A,NPDEFCPT G, NPESTORG E
 WHERE
B.CODNOM= RPAD('".$this->tipnomdes."',3,' ')
 AND B.CODEMP>= RPAD('".$this->empdes."',16,' ')
 AND B.CODEMP <= RPAD('".$this->emphas."',16,' ')
 AND B.FECNOM>=to_date('".$this->fecdes."','dd/mm/yyyy')
 AND B.FECNOM<=to_date('".$this->fechas."','dd/mm/yyyy')
 and B.CODCON>='".$this->condes."'
 AND B.CODCON<='".$this->conhas."'
 AND B.CODCAR>= RPAD('".$this->cardes."',16,' ')
 AND B.CODCAR <= RPAD('".$this->carhas."',16,' ')
 AND B.CODNIV >= RPAD('".$this->nivdes."',16,' ')
 AND B.CODNIV <= RPAD('".$this->nivhas."',16,' ')
AND G.IMPCPT='S'
 AND E.CODNIV=C.CODNIV
 AND B.CODEMP=C.CODEMP
 and B.CODCON=G.CODCON
 AND A.CODCAR=B.CODCAR
 ORDER BY B.CODNIV,B.CODEMP";
			//  print $this->sql;

				}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$rs=$this->bd->select("select nomnom as nombre from NPASICAREMP where codnom='".$this->tipnomdes."'");
			if(!$rs->EOF)
			{
				$this->nombre=$rs->fields["nombre"];
			}
			$sr=$this->bd->select("SELECT to_char(ULTFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnomdes."',3,' ')");
			if(!$sr->EOF)
			{
				$fechad=$sr->fields["fecha"];
			}
			$ss=$this->bd->select("SELECT to_char(PROFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnomdes."',3,' ')");
			if(!$ss->EOF)
			{
				$fechah=$ss->fields["fecha"];
			}
			$this->cell(100,5,'NOMINA: '.$this->tipnomdes.' - '.$this->nombre);
			$this->cell(60,5,'PERIODO DEL: '.$fechad.' AL '.$fechah);
			$this->ln(5);

		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    /////print $this->sql;
		    $tb2=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$acum2=0;
			$acum3=0;
			$totacum1=0;
			$totacum2=0;
			$totacum3=0;
			$acumulado=0;
			$cont=0;
			$contador=0;
			$total1=0;
			$total2=0;
			$total3=0;
			if(!$tb2->EOF)
			{
				 $ref=$tb2->fields["codemp"];
				 $niv=$tb2->fields["codniv"];
				 $contador=$contador+1;
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'UNIDAD:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(80,5,$tb2->fields["codniv"].' '.$tb2->fields["desniv"]);
				 $unidad=$tb2->fields["desniv"];
				 $this->cell(20,5,'CATEGORIA:  ');
				 $this->cell(60,5,$tb2->fields["codcta"].' '.$tb2->fields["nomcat"]);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->SetFillColor(195,195,195);
				 $this->setFont("Arial","B",7);
				 $this->cell(70,3,$tb2->fields["codemp"].' '.$tb2->fields["nomemp"],0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'CARGO:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb2->fields["codcar"].' - '.$tb2->fields["nomcar"]);
				 $this->ln(4);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Fecha de Ingreso:  ');
				 $this->setFont("Arial","",8);
				 $this->cell(30,5,$tb2->fields["fecing"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Fecha de Egreso:  ');
				 $this->setFont("Arial","",8);
				 $this->cell(30,5,$tb2->fields["fecret"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'SUELDO:  ');
				 $gp=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as VALOR FROM NPASICONEMP A,NPCONSUELDO B WHERE (CODEMP) =RPAD('".$tb2->fields["codemp"]."',16,' ') AND (CODCAR) =RPAD('".$tb2->fields["codcar"]."',16,' ') AND A.CODCON=B.CODCON");
				 if(!$gp->EOF)
				 {
				 	$sueldo=$gp->fields["valor"];
				 }
				 $this->cell(30,5,number_format($sueldo,2,'.',','));
				 $this->ln(4);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Centro de Pago:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(65,5,$tb2->fields["nomban"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Cuenta Bancaria:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb2->fields["cuenta_banco"]);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'Código');
				 $this->cell(70,5,'Nombre del Concepto');
				 $this->cell(20,5,'Cantidad');
				 $this->cell(25,5,'Asignación');
				 $this->cell(25,5,'Deducción');
				 $this->cell(25,5,'Saldo');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codemp"]!=$ref)
				{
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());
				 //totales
				 $cont=$cont+1;
				 $this->cell(20,5,'');
				 $this->cell(70,5,'');
				 $this->cell(20,5,'Total ');
				 $this->cell(25,5,number_format($acum1,2,'.',','));
				 $this->cell(25,5,number_format($acum2,2,'.',','));
				 $this->ln(4);
				 $this->cell(20,5,'');
				 $this->cell(70,5,'');
				 $this->cell(20,3,'Neto ');
				 $this->SetFillColor(195,195,195);
				 $this->cell(25,3,number_format(($acum1-$acum2),2,'.',','),0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->cell(25,5,'');
				 $this->ln(5);
				 $acum1=0;
				 $acum2=0;
				 //
				 if($tb->fields["codniv"]!=$niv)
				 {
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->cell(110,5,'TOTAL:  '.$unidad);
				 	$this->cell(25,5,number_format($totacum1,2,'.',','));
				 	$this->cell(25,5,number_format($totacum2,2,'.',','));
				 	$this->cell(25,5,number_format(($totacum1-$totacum2),2,'.',','));
					$total1=$total1+$totacum1;
					$total2=$total2+$totacum2;
					$total3=$total3+($totacum1-$totacum2);
				 	$totacum1=0;
				 	$totacum2=0;
				 	//
				 	$acumulado=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->cell(50,5,'CANTIDAD DE TRABAJADORES: '.$cont);
					$cont=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->ln(6);
				 	$this->cell(20,5,'UNIDAD:  ');
				 	$this->setFont("Arial","",7);
				 	$this->cell(80,5,$tb->fields["codniv"].' '.$tb->fields["desniv"]);
				 	$unidad=$tb->fields["desniv"];
				 	$this->cell(20,5,'CATEGORIA:  ');
				 	$this->cell(60,5,$tb->fields["codcta"].' '.$tb->fields["nomcat"]);
				 	$this->ln(5);
				 }
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $niv=$tb->fields["codniv"];
				 $this->setFont("Arial","B",7);
				 $this->SetFillColor(195,195,195);
				 $this->cell(70,3,$tb->fields["codemp"].' '.$tb->fields["nomemp"],0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'CARGO:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb->fields["codcar"].' - '.$tb->fields["nomcar"]);
				 $this->ln(4);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Fecha de Ingreso:  ');
				 $this->setFont("Arial","",8);
				 $this->cell(30,5,$tb->fields["fecing"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Fecha de Egreso:  ');
				 $this->setFont("Arial","",8);
				 $this->cell(30,5,$tb->fields["fecret"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'SUELDO:  ');
				 $gp=$this->bd->select("SELECT coalesce(SUM(MONTO),0) as VALOR FROM NPASICONEMP A,NPCONSUELDO B WHERE (CODEMP) =RPAD('".$tb->fields["codemp"]."',16,' ') AND (CODCAR) =RPAD('".$tb->fields["codcar"]."',16,' ') AND A.CODCON=B.CODCON");
				 if(!$gp->EOF)
				 {
				 	$sueldo=$gp->fields["valor"];
				 }
				 $this->cell(30,5,number_format($sueldo,2,'.',','));
				 $this->ln(4);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Centro de Pago:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(65,5,$tb->fields["nomban"]);
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,'Cuenta Bancaria:  ');
				 $this->setFont("Arial","",7);
				 $this->cell(60,5,$tb->fields["cuenta_banco"]);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","B",8);
				 $this->cell(20,5,'Código');
				 $this->cell(70,5,'Nombre del Concepto');
				 $this->cell(20,5,'Cantidad');
				 $this->cell(25,5,'Asignación');
				 $this->cell(25,5,'Deducción');
				 $this->cell(25,5,'Saldo');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $contador=$contador + 1;
				}

				 $this->setFont("Arial","",8);
				 $this->cell(20,5,$tb->fields["codcon"]);
				 $this->cell(70,5,$tb->fields["nomcon"]);
				 $this->cell(20,5,'');
				 $this->cell(25,5,number_format($tb->fields["asigna"],2,'.',','));
				 $acum1=$acum1+$tb->fields["asigna"];
				 $totacum1=$totacum1+$tb->fields["asigna"];
				 $this->cell(25,5,number_format($tb->fields["deduc"],2,'.',','));
				 $acum2=$acum2+$tb->fields["deduc"];
				 $totacum2=$totacum2+$tb->fields["deduc"];
				 $hh=$this->bd->select("SELECT coalesce(ACUMULADO,0) as SALDO FROM NPASICONEMP WHERE CODCAR = RPAD('".$tb->fields["codcar"]."',16,' ') AND CODEMP=RPAD('".$tb->fields["codemp"]."',16,' ') AND CODCON='".$tb->fields["codcon"]."'");
				 if(!$hh->EOF)
				 {
				 	$saldo=$hh->fields["saldo"];
				 }
				 //$acumulado=$acumulado+$saldo;
				 $p=$this->bd->select("  SELECT CODTIPPRE as VALOR FROM NPTIPPRE WHERE CODCON='".$tb->fields["codcon"]."'");
				 if(!$p->EOF)
				 {
				 	$tipo=$p->fields["valor"];
				 }
				 if(($tipo==NULL)||($saldo==0))
				 {
				 	$acumulado=0;
				 }
				 else
				 {
				 	$acumulado=$acumulado+$saldo;
				 }
				 $this->cell(25,5,number_format($acumulado,2,'.',','));
				 $ref=$tb->fields["codemp"];
				 $tb->MoveNext();
			     $this->ln(3);
			}
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(100,$this->getY(),200,$this->getY());
				 //totales
				 $this->cell(20,5,'');
				 $this->cell(70,5,'');
				 $this->cell(20,5,'Total ');
				 $this->cell(25,5,number_format($acum1,2,'.',','));
				 $this->cell(25,5,number_format($acum2,2,'.',','));
				 $this->ln(4);
				 $this->cell(20,5,'');
				 $this->cell(70,5,'');
				 $this->cell(20,3,'Neto ');
				 $this->SetFillColor(195,195,195);
				 $this->cell(25,3,number_format(($acum1-$acum2),2,'.',','),0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->cell(25,5,'');
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(110,5,'TOTAL:  '.$unidad);
				 $this->cell(25,5,number_format($totacum1,2,'.',','));
				 $acum1=0;
				 $this->cell(25,5,number_format($totacum2,2,'.',','));
				 $acum2=0;
				 $this->cell(25,5,number_format(($totacum1-$totacum2),2,'.',','));
				 $total1=$total1+$totacum1;
				 $total2=$total2+$totacum2;
				 $total3=$total3+($totacum1-$totacum2);
				 $totacum1=0;
				 $totacum2=0;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(50,5,'CANTIDAD DE TRABAJADORES: '.($cont+1));
				 $cont=0;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(3);
				 $this->cell(110,5,'TOTAL NOMINA:  '.$this->nombre);
				 $this->cell(25,5,number_format($total1,2,'.',','));
				 $acum1=0;
				 $this->cell(25,5,number_format($total2,2,'.',','));
				 $acum2=0;
				 $this->cell(25,5,number_format($total3,2,'.',','));
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(50,5,'TOTAL DE TRABAJADORES: '.($contador));
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(5);
				 $this->setFont("Arial","BU",8);
				 $this->cell(150,5,$this->elaborado);
				 $this->cell(50,5,$this->revisado);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(150,5,'						Elaborado Por');
				 $this->cell(50,5,'							Revisado Por');
				 $this->ln(3);
				 $this->setFont("Arial","BU",8);
				 $this->cell(110,5,$this->autorizado,0,0,'R');
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->cell(110,5,'Autorizado Por						',0,0,'R');
				 //
		}
	}
?>