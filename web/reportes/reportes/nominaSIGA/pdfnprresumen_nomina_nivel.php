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
		var $campos;
		var $sql1;
		var $sql2;
		var $rep;
		var $numero;
		var $cab;
		var $codempdes;
		var $codemphas;
		var $codcardes;
		var $codcarhas;
		var $codnivdes;
		var $codnivhas;
		var $codcondes;
		var $codconhas;
		var $tipnom;
		var $elaborado;
		var $revisado;
		var $autorizado;
		var $conf;
		var $nombre;
				
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
			$this->codempdes=$_POST["codempdes"];
			$this->codemphas=$_POST["codemphas"];
			$this->codcardes=$_POST["codcardes"];
			$this->codcarhas=$_POST["codcarhas"];
			$this->codnivdes=$_POST["codnivdes"];
			$this->codnivhas=$_POST["codnivhas"];
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnom=$_POST["tipnom"];
			$this->elaborado=$_POST["elaborado"];
			$this->revisado=$_POST["revisado"];
			$this->autorizado=$_POST["autorizado"];
			$this->sql="SELECT DISTINCT
							C.CODEMP as codemp,
							to_char(C.FECRET,'dd/mm/yyyy') as fecret,         
							C.NOMEMP as nomemp,
							to_char(C.FECING,'dd/mm/yyyy') as fecing,
							C.NUMCUE as CUENTA_BANCO,
							C.CODNIV as codniv,
							C.CEDEMP as cedemp,
							LTRIM(RTRIM(B.CODCAR)) as CODCAR,         
							B.NOMCAR as nomcar,
							E.DESNIV as desniv,
							(CASE WHEN C.STAEMP='A' THEN 'ACTIVO' WHEN C.STAEMP='S' THEN 'SUSPENDIDO' WHEN C.STAEMP='V' THEN 'VACACIONES' ELSE '' END) as ESTATUS,
							G.CODCAR as codcargo,
							G.CODCON as codcon,
							LTRIM(RTRIM(G.NOMCON)) AS NOMCON,
							(CASE WHEN G.ASIDED='A' THEN coalesce(G.SALDO,0) ELSE 0 END) as ASIGNA,
							(CASE WHEN G.ASIDED='D' THEN coalesce(G.SALDO,0) ELSE 0 END) as DEDUC,
							(CASE WHEN G.ASIDED='P' THEN coalesce(G.SALDO,0) ELSE 0 END) as APORTE 
						FROM  
							NPHOJINT C, 
							NPASICAREMP B, 
							NPCATPRE D,
							NPESTORG E,
							NPNOMCAL G,
							NPDEFCPT H  
						WHERE
							(B.CODNOM) = RPAD('".$this->tipnom."',3,' ') AND
							E.CODNIV=C.CODNIV AND
							B.CODEMP=C.CODEMP AND
							C.CODEMP>= RPAD('".$this->codempdes."',16,' ') AND
							C.CODEMP <= RPAD('".$this->codemphas."',16,' ') AND 
							B.CODCAR>= RPAD('".$this->codcardes."',16,' ') AND
							B.CODCAR <= RPAD('".$this->codcarhas."',16,' ') AND
							C.CODNIV >= RPAD('".$this->codnivdes."',16,' ') AND
							C.CODNIV <= RPAD('".$this->codnivhas."',16,' ') AND 
							B.STATUS='V' AND
							G.CODCON=H.CODCON AND
							G.CODCON>='".$this->codcondes."' AND
							G.CODCON<='".$this->codconhas."' AND
							(G.CODNOM) = RPAD('".$this->tipnom."',3,' ') AND
							G.CODCAR=B.CODCAR AND 
							G.CODEMP=C.CODEMP
						ORDER BY
							C.CODNIV,C.CODEMP";
						//print $this->sql;			
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$rs=$this->bd->select("select nomnom as nombre from NPASICAREMP where codnom='".$this->tipnom."'");
			if(!$rs->EOF)
			{
				$this->nombre=$rs->fields["nombre"];
			}
			$sr=$this->bd->select("SELECT to_char(ULTFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnom."',3,' ')");
			if(!$sr->EOF)
			{
				$fechad=$sr->fields["fecha"];
			}
			$ss=$this->bd->select("SELECT to_char(PROFEC,'dd/mm/yyyy') as FECHA FROM NPNOMINA  WHERE CODNOM=RPAD('".$this->tipnom."',3,' ')");
			if(!$ss->EOF)
			{
				$fechah=$ss->fields["fecha"];
			}
			$this->setTextColor(0,0,255); 
			$this->cell(100,5,'NOMINA: '.$this->tipnom.' - '.$this->nombre);
			$this->cell(60,5,'PERIODO DEL: '.$fechad.' AL '.$fechah);
			$this->setTextColor(0,0,255); 
			$this->ln(5);
			
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
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
			$neto=0;
			$totalneto=0;
			if(!$tb2->EOF)
			{
				 $ref=$tb2->fields["codemp"];
				 $niv=$tb2->fields["codniv"];
				 $contador=$contador+1;
				 $this->setFont("Arial","B",8);
				 $this->setTextColor(0,0,255); 
				 $this->cell(80,5,$tb2->fields["codniv"].' '.$tb2->fields["desniv"]);
				 $this->setTextColor(0,0,0); 
				 $unidad=$tb2->fields["desniv"];
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->cell(20,5,'Cédula');
				 $this->cell(50,5,'Trabajador');
				 $this->cell(55,5,'Cargo');
				 $this->cell(25,5,'Asignación');
				 $this->cell(25,5,'Deducción');
				 $this->cell(25,5,'Neto');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","",8); 
				 $this->cell(20,5,$tb->fields["codemp"]);
				 $this->setFont("Arial","",6); 
				 $this->cell(50,5,$tb->fields["nomemp"]);
				 $this->cell(55,5,$tb->fields["nomcar"]);
				 
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codemp"]!=$ref)
				{
				 $this->setFont("Arial","B",8);
				 $cont=$cont+1;
				 $this->cell(25,5,number_format($acum1,2,'.',','));
				 $totacum1=$totacum1+$acum1;
				 $this->cell(25,5,number_format($acum2,2,'.',','));
				 $totacum2=$totacum2+$acum2;
				 $this->cell(25,5,number_format($acum3,2,'.',','));
				 $totacum3=$totacum3+$acum3;
				 $this->ln(4);
				 $acum1=0;
				 $acum2=0;
				 $acum3=0;
				 //
				 if($tb->fields["codniv"]!=$niv)
				 {
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->setTextColor(0,0,255); 
				 	$this->cell(125,5,'TOTAL:  '.$unidad);
				 	$this->cell(25,5,number_format($totacum1,2,'.',','));
				 	$this->cell(25,5,number_format($totacum2,2,'.',','));
				 	$this->cell(25,5,number_format($totacum3,2,'.',','));
					$total1=$total1+$totacum1;
					$total2=$total2+$totacum2;
					$total3=$total3+$totacum3;
				 	$totacum1=0;
				 	$totacum2=0;
				 	$totacum3=0;
				 	// 
				 	$acumulado=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->cell(110,5,'CANTIDAD DE TRABAJADORES: '.$cont);
				 	$this->setTextColor(0,0,0); 
					$cont=0;
					$this->ln(4);
					$this->line(10,$this->getY(),200,$this->getY());
				 	$this->ln(8);
				 	$this->setTextColor(0,0,255); 
				 	$this->cell(80,5,$tb->fields["codniv"].' '.$tb->fields["desniv"]);
				 	$this->setTextColor(0,0,0); 
				 	$unidad=$tb->fields["desniv"];
				 	$this->ln(5);
				 	$this->line(10,$this->getY(),200,$this->getY());
				 	$this->ln(2);
				 	$this->cell(20,5,'Cédula');
				 	$this->cell(50,5,'Trabajador');
				 	$this->cell(55,5,'Cargo');
				 	$this->cell(25,5,'Asignación');
				 	$this->cell(25,5,'Deducción');
				 	$this->cell(25,5,'Neto');
				 	$this->ln(4);
				 	$this->line(10,$this->getY(),200,$this->getY());
				 }	
				 $niv=$tb->fields["codniv"];
				 $this->setFont("Arial","",8); 
				 $this->cell(20,5,$tb->fields["codemp"]);
				 $this->setFont("Arial","",6); 
				 $this->cell(50,5,$tb->fields["nomemp"]);
				 $this->cell(55,5,$tb->fields["nomcar"]);
				 $contador=$contador + 1;
				}
				
				 $this->setFont("Arial","",8); 
				 $acum1=$acum1+$tb->fields["asigna"];
				 $acum2=$acum2+$tb->fields["deduc"];
				 $acum3=$acum3+($tb->fields["asigna"]-$tb->fields["deduc"]);
				 $ref=$tb->fields["codemp"];
				 $tb->MoveNext();
			     //$this->ln(3);
			}
				 $this->setFont("Arial","B",8);
				 $this->cell(25,5,number_format($acum1,2,'.',','));
				 $totacum1=$totacum1+$acum1;
				 $this->cell(25,5,number_format($acum2,2,'.',','));
				 $totacum2=$totacum2+$acum2;
				 $this->cell(25,5,number_format($acum3,2,'.',','));
				 $totacum3=$totacum3+$acum3;
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setTextColor(0,0,255); 
				 $this->cell(125,5,'TOTAL:  '.$unidad);
				 $this->cell(25,5,number_format($totacum1,2,'.',','));
				 $acum1=0;
				 $this->cell(25,5,number_format($totacum2,2,'.',','));
				 $acum2=0;
				 $acum3=0;
				 $this->cell(25,5,number_format($totacum3,2,'.',','));
				 $total1=$total1+$totacum1;
				 $total2=$total2+$totacum2;
				 $total3=$total3+$totacum3;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(115,5,'CANTIDAD DE TRABAJADORES: '.($cont+1));
				 $cont=0;
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(5);
				 $this->cell(125,5,'TOTAL NOMINA:  '.$this->nombre);
				 $this->cell(25,5,number_format($total1,2,'.',','));
				 $this->cell(25,5,number_format($total2,2,'.',','));
				 $this->cell(25,5,number_format($total3,2,'.',','));
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->cell(110,5,'TOTAL DE TRABAJADORES: '.($contador));
				 $this->ln(4);
				 $this->setTextColor(0,0,0); 
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(5);
				 $this->setFont("Arial","BU",8);
				 $this->cell(150,5,$this->elaborado);
				 $this->cell(50,5,$this->revisado);
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->setTextColor(0,0,255); 
				 $this->cell(150,5,'						Elaborado Por');
				 $this->cell(50,5,'							Revisado Por');
				 $this->ln(3);
				 $this->setTextColor(0,0,0); 
				 $this->setFont("Arial","BU",8);
				 $this->cell(110,5,$this->autorizado,0,0,'R');
				 $this->ln(3);
				 $this->setFont("Arial","B",8);
				 $this->setTextColor(0,0,255); 
				 $this->cell(110,5,'Autorizado Por						',0,0,'R');
				 $this->setTextColor(0,0,0); 
				 // 
		}
	}
?>