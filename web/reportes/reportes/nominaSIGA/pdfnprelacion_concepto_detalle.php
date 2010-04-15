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
			$this->codcondes=$_POST["codcondes"];
			$this->codconhas=$_POST["codconhas"];
			$this->tipnom=$_POST["tipnom"];
			$this->sql="SELECT
							A.CODEMP,         
							E.CODCAT,
							substr(C.NOMEMP,1,25) as nomemp,
							C.CEDEMP,
							D.CODCON,
							D.CODPAR,
							A.CODCAR,         
							substr(B.NOMCAR,1,30) as nomcar,
							A.NOMCON, 
							A.SALDO,
							C.CODEMPANT,
							D.OPECON,
							D.IMPCPT,
							D.CONACT      
						FROM 
							NPNOMCAL A, NPCARGOS B, NPHOJINT C,
							NPDEFCPT D,NPASICAREMP E
						WHERE
							D.CODCON=A.CODCON AND
							C.CODEMP=A.CODEMP AND
							E.CODEMP=A.CODEMP AND
							E.CODCAR=A.CODCAR AND
							B.CODCAR=A.CODCAR AND
							D.IMPCPT='S' AND
							(D.OPECON='A' OR D.OPECON='D')  AND
							A.SALDO<>0.00 AND
							D.CONACT='S' AND
							(A.CODEMP) >= RPAD('".$this->codempdes."',16,' ') AND
							(A.CODEMP) <= RPAD('".$this->codemphas."',16,' ') AND
							(A.CODCAR) >= RPAD('".$this->codcardes."',16,' ') AND
							(A.CODCAR) <= RPAD('".$this->codcarhas."',16,' ') AND
							(A.CODCON) >= RPAD('".$this->codcondes."',3,' ') AND
							(A.CODCON) <= RPAD('".$this->codconhas."',3,' ') AND
							A.CODNOM='".$this->tipnom."'
						ORDER BY A.CODCON,C.CODEMP";
						//print $this->sql;			
			
		}

		function Header()
		{
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s","s");
			$this->setFont("Arial","B",8);
			$rs=$this->bd->select("select upper(nomnom) as nombre from NPASICAREMP where codnom='".$this->tipnom."'");
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
			$this->cell(100,5,'NOMINA: '.$this->tipnom.' - '.$this->nombre);
			$this->cell(60,5,'DEL: '.$fechad.' AL '.$fechah);
			$this->ln(5);
			
		}
		function Cuerpo()
		{
			$this->setFont("Arial","B",8);
		    $tb=$this->bd->select($this->sql);
		    $tb2=$this->bd->select($this->sql);
			$ref="";
			$acum1=0;
			$cont=0;
			if(!$tb2->EOF)
			{
				 $this->setFont("Arial","B",8); 
				 $ref=$tb2->fields["codcon"];
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->SetFillColor(195,195,195);
				 $this->cell(35,3,$tb2->fields["codcon"],0,0,'',1);
				 $this->cell(60,3,$tb2->fields["nomcon"],0,0,'',1);
				 $this->cell(95,3,'Partida: '.$tb2->fields["codpar"],0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","B",8); 
				 $this->cell(15,5,'CEDULA');
				 $this->cell(50,5,'NOMBRE EMPLEADO');
				 $this->cell(60,5,'CARGO EMPLEADO');
				 $this->cell(40,5,'CODIGO PRESUPUESTARIO');
				 $this->cell(25,5,'SALDO');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
			}
			while(!$tb->EOF)
			{
				if($tb->fields["codcon"]!=$ref)
				{
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(10,$this->getY(),200,$this->getY());
				 //totales
				 $this->setFont("Arial","B",8); 
				 $this->cell(45,5,'CANTIDAD DE TRABAJADORES:');
				 $this->cell(20,5,$cont);
				 $this->cell(55,5,'');
				 $this->cell(40,5,'TOTAL CONCEPTO',0,0,'R');
				 $this->cell(25,5,number_format($acum1,2,'.',','));
				 $acum1=0;
				 $cont=0;
				 $this->ln(4);
				 //
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->ln(2);
				 $this->SetFillColor(195,195,195);
				 $this->cell(35,3,$tb->fields["codcon"],0,0,'',1);
				 $this->cell(60,3,$tb->fields["nomcon"],0,0,'',1);
				 $this->cell(95,3,'Partida: '.$tb->fields["codpar"],0,0,'',1);
				 $this->SetFillColor(0,0,0);
				 $this->ln(5);
				 $this->line(10,$this->getY(),200,$this->getY());
				 $this->setFont("Arial","B",8); 
				 $this->cell(15,5,'CEDULA');
				 $this->cell(50,5,'NOMBRE EMPLEADO');
				 $this->cell(60,5,'CARGO EMPLEADO');
				 $this->cell(40,5,'CODIGO PRESUPUESTARIO');
				 $this->cell(25,5,'SALDO');
				 $this->ln(4);
				 $this->line(10,$this->getY(),200,$this->getY());
				}
				
				 $this->setFont("Arial","",8); 
				 $this->cell(15,5,$tb->fields["codemp"]);
				 $this->cell(50,5,$tb->fields["nomemp"]);
				 $this->cell(60,5,$tb->fields["nomcar"]);
				 $l=$this->bd->select("SELECT coalesce(CODCAT,'0') as categoria FROM npconceptoscategoria WHERE CODCON = '".$tb->fields["codcon"]."'");
				 if(!$l->EOF)
				 {
				 	$categoria=$l->fields["categoria"];
				 }
				 if($categoria==NULL)
				 {
				 	$cod_pres=rtrim($tb->fields["codcat"]).'-'.rtrim($tb->fields["codpar"]);
				 }
				 else
				 {
				 	$cod_pres=rtrim($categoria).'-'.rtrim($tb->fields["codpar"]);
				 }
				 $this->cell(40,5,$cod_pres);
				 $this->cell(25,5,number_format($tb->fields["saldo"],2,'.',','));
				 $acum1=$acum1+$tb->fields["saldo"];
				 $ref=$tb->fields["codcon"];
				 $cont=$cont+1;
				 $tb->MoveNext();
			     $this->ln(3);
			}
				 $this->setFont("Arial","B",8);
				 $this->ln(2);
				 $this->line(10,$this->getY(),200,$this->getY());
				 //totales
				 $this->setFont("Arial","B",8); 
				 $this->cell(45,5,'CANTIDAD DE TRABAJADORES:');
				 $this->cell(20,5,$cont);
				 $this->cell(55,5,'');
				 $this->cell(40,5,'TOTAL CONCEPTO',0,0,'R');
				 $this->cell(25,5,number_format($acum1,2,'.',','));
				 $acum1=0;
				 $cont=0;
				 $this->ln(4);
				 //
				 $this->line(10,$this->getY(),200,$this->getY());
				 // 
		}
	}
?>