<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum1=0;
		var $acum2=0;
		var $acum3=0;
		var $cont=0;
		var $cont1=0;
		var $result=0;
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
		var $numcue1;
		var $ben1;
		var $ben2;
		var $fecreg1;
		var $fecreg2;


		function pdfreporte()
		{
			$this->fpdf("p","mm","Letter");
			$this->bd=new basedatosAdo();
			$this->titulos=array();
			$this->titulos2=array();
			$this->campos=array();
			$this->anchos=array();
			$this->anchos2=array();
			$this->numcue1=$_POST["numcue1"];
			$this->ben1=$_POST["ben1"];
			$this->ben2=$_POST["ben2"];
			$this->fecreg1=$_POST["fecreg1"];
			$this->fecreg2=$_POST["fecreg2"];


			$this->sql="SELECT  distinct(A.FECENT) as fec, to_char(A.FECENT,'dd/mm/yyyy') as fecent
							FROM
							TSCHEEMI A,
							OPORDPAG D
							WHERE
							RTRIM(A.NUMCHE)=D.NUMORD AND
							A.STATUS = 'E'  AND
							A.NUMCUE = RPAD('".$this->numcue1."',20,' ') AND
							A.CEDRIF >= RPAD('".$this->ben1."',15,' ') AND
							A.CEDRIF <= RPAD('".$this->ben2."',15,' ') AND
							A.FECENT >=  to_date('".$this->fecreg1."','dd/mm/yyyy') AND
							A.FECENT <=  to_date('".$this->fecreg2."','dd/mm/yyyy')
							order by fec";


			$this->llenartitulosmaestro();
			$this->cab=new cabecera();
			$this->SetAutoPageBreak(true,30);

		}

		function llenartitulosmaestro()
		{
				$this->titulos[0]="Fecha";
				$this->titulos[1]="Nro Orden";
				$this->titulos[2]="Beneficiario";
				$this->titulos[3]="   Monto Concepto";
				$this->anchos[0]=20;
				$this->anchos[1]=20;
				$this->anchos[2]=73;
				$this->anchos[3]=15;
		}

		function Header()
		{
			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",8);
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$this->SetDrawColor(255,255,255);
			$this->Line(10,35,270,35);
			$this->SetDrawColor(0,0,0);
			$this->SetY(32);
			$this->cell(180,10," Del: ".$this->fecreg1."   Al   ".$this->fecreg2,0,0,'C',0);
			$this->ln(12);
			$this->Line(10,$this->GetY(),200,$this->GetY());
			$this->setFont("Arial","B",9);
			$this->SetTextColor(0,0,0);
			$ncampos=count($this->titulos);
			for($i=0;$i<$ncampos;$i++)
			{
				$this->cell($this->anchos[$i],7,$this->titulos[$i]);
			}
			 $this->ln();

			$this->Line(10,$this->GetY(),200,$this->GetY());
   		    $this->ln();

		}



		function Cuerpo()
		{
		    $tb=$this->bd->select($this->sql);
			$TotalTotal=0;
			while(!$tb->EOF)
			{
				$sql="SELECT distinct(A.CEDRIF) as cedrif, C.NOMBEN as nomben
						FROM
						TSCHEEMI A,
						OPBENEFI C,
						OPORDPAG D
						WHERE
						RTRIM(A.NUMCHE)=D.NUMORD AND
						A.CEDRIF = C.CEDRIF AND
						A.STATUS = 'E'  AND
						A.NUMCUE = RPAD('".$this->numcue1."',20,' ') AND
						A.CEDRIF >= RPAD('".$this->ben1."',15,' ') AND
						A.CEDRIF <= RPAD('".$this->ben2."',15,' ') AND
						A.FECENT =  to_date('".$tb->fields["fecent"]."','dd/mm/yyyy')
						order by C.NOMBEN";
					$tbBen=$this->bd->select($sql);
                    $SumDia=0;
					while(!$tbBen->EOF)
					{
					  $sqlDet="SELECT A.NUMCHE as numche,
							A.MONCHE as monche,
							to_char(A.FECENT,'dd/mm/yyyy') as fecent,
							to_char(A.FECENT,'dd/mm/yyyy') as fechab,
							to_char(A.FECENT,'dd/mm/yyyy') as fecha,
							B.DESLIB as deslib,
							C.NOMBEN as  nombre,
							D.NUMORD2 as numord2
							FROM
							TSCHEEMI A,
							TSMOVLIB B,
							OPBENEFI C,
							OPORDPAG D
							WHERE
							A.NUMCHE = B.REFLIB AND
							A.NUMCUE = B.NUMCUE AND
							A.CEDRIF = C.CEDRIF AND
							RTRIM(A.NUMCHE)=D.NUMORD AND
							A.STATUS = 'E'  AND
							A.NUMCUE = RPAD('".$this->numcue1."',20,' ') AND
							A.CEDRIF = RPAD('".$tbBen->fields["cedrif"]."',15,' ') AND
							A.FECENT =  to_date('".$tb->fields["fecent"]."','dd/mm/yyyy')
							ORDER BY A.NUMCHE";
					   $tbDet=$this->bd->select($sqlDet);
					   $SumBenDia=0;
					   while(!$tbDet->EOF)
					   {
 					    $this->setFont("Arial","",8);
						$this->cell($this->anchos[0],3,$tbDet->fields["fecha"]);
						$this->cell($this->anchos[1],3,$tbDet->fields["numord2"]);
						$this->cell($this->anchos[2]+7,3,"");
						$this->cell($this->anchos[3],3,number_format($tbDet->fields["monche"],2,'.',','),0,0,'R');
						$this->SetX(52);
						$miY=$this->GetY();
						$this->multicell(65,3,$tbDet->fields["nombre"],0,'l');
						$this->SetY($miY);
						$this->SetX(150);
						$this->multicell(50,3,$tbDet->fields["deslib"],0,'l');
						$this->ln(2);
						$SumBenDia=$SumBenDia + $tbDet->fields["monche"];
						$SumDia=$SumDia + $tbDet->fields["monche"];
						$TotalTotal=$TotalTotal + $tbDet->fields["monche"];
	 					$tbDet->MoveNext();
					   }
					$this->Line(125,$this->GetY(),147,$this->GetY());
					$this->ln();
					$this->setFont("Arial","B",8);
					$this->cell(16,3,"Subtotal de  ");
					$this->cell(65,3,"");
					$this->cell(39,3,"del d�a  ".$tb->fields["fecent"] . "  es:  ");
					$this->cell($this->anchos[3],3,number_format($SumBenDia,2,'.',','),0,0,'R');
					$this->SetX(27);
					$this->multicell(65,3,$tbBen->fields["nomben"],0,'l');
					$this->ln(3);
					$tbBen->MoveNext();
				   }
				 $this->ln();
				 $this->Line(10,$this->GetY(),200,$this->GetY());
	   		     $this->ln();
				 $this->cell(40,3,"");
				 $this->cell(80,3,"Subtotal del d�a  ". $tb->fields["fecent"] . "  es:  ");
				 $this->cell($this->anchos[3],3,number_format($SumDia,2,'.',','),0,0,'R');
 				 $this->ln(4);
				 $this->Line(10,$this->GetY()+1,200,$this->GetY()+1);
	   		     $this->ln();
				 $this->ln(4);
				$tb->MoveNext();
			}
				 $this->ln(2);
 				 $this->setFont("Arial","B",9);
				 $this->cell(30,3,"");
				 $this->cell(90,3,"Monto Total del ".$this->fecreg1." al ".$this->fecreg2. "  es: ");
				 $this->cell($this->anchos[3],3,number_format($TotalTotal,2,'.',','),0,0,'R');
				 $this->ln(3);
		}

	}
?>