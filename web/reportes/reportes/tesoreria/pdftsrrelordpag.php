<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{

		var $acum=0;
		var $result=0;
		var $bd;
		var $titulos;
		var $titulos2;
		var $anchos;
		var $anchos2;
		var $campos;
		var $sql1;
		var $sql2;
		var $sql3;
		var $sql4;
		var $rep;
		var $numero;
		var $cab;
		var $numcue1;
		var $numcue2;
		var $cedrif1;
		var $cedrif2;
		var $tipcau1;
		var $tipcau2;
		var $fecdis1;
		var $fecdis2;

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
			$this->numcue2=$_POST["numcue2"];
			$this->cedrif1=$_POST["cedrif1"];
			$this->cedrif2=$_POST["cedrif2"];
			$this->codubi1=$_POST["codubi1"];
			$this->codubi2=$_POST["codubi2"];
			$this->tipcau1=$_POST["tipcau1"];
			$this->tipcau2=$_POST["tipcau2"];
			$this->fecdis1=$_POST["fecdis1"];
			$this->fecdis2=$_POST["fecdis2"];
			$this->concepto=$_POST["concepto"];


				$this->sql= "SELECT A.NUMCUE,A.NUMCHE,A.MONCHE,to_char(A.FECENT,'dd/mm/yyyy') as afecent,D.DESORD,C.NOMBEN,D.TIPCAU,
							D.NUMORD2 FROM TSCHEEMI A,OPBENEFI C,OPORDPAG D
							WHERE A.CEDRIF = C.CEDRIF AND RTRIM(A.NUMCHE)=D.NUMORD AND
							A.STATUS = 'E'  AND A.NUMCUE= Rpad('".$this->numcue1."',20,' ') AND
							A.CEDRIF >= Rpad('".$this->cedrif1."',15,' ') AND
							A.CEDRIF <= Rpad('".$this->cedrif2."',15,' ') AND
							A.FECENT >= to_date('".$this->fecdis1."','dd/mm/yyyy') AND
							A.FECENT <= to_date('".$this->fecdis2."','dd/mm/yyyy') AND
							D.TIPCAU >= ('".$this->tipcau1."') AND
							D.TIPCAU <= ('".$this->tipcau2."')
							ORDER BY A.FECENT,A.NUMCHE";
							//print $this->sql;

			$this->cab=new cabecera();

		}


		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],"p","s",$parte[$ubica]);
			$titulo1="Secretaría de administración";
			$titulo2="              y finanzas";
			$titulo3="Dirección de Finanzas y Tesorería";
			$this->setFont("Arial","B",8);
			$this->SetTextColor(0,0,128);
			$this->setFont("Arial","B",7);
			$this->SetTextColor(0,0,128);
			$this->ln(1);
			$this->cell(20,3,$_POST["fecdis1"]);
			$this->cell(10,3,"Al");
			$this->cell(20,3,$_POST["fecdis2"]);
			$this->ln(5);
			$this->setFont("Arial","B",7);
			$this->SetTextColor(0,0,0);
			$this->SetTextColor(0,0,0);
			$this->setFont("Arial","",7);
			$this->cell(20,3,"Cta.Bancaria N°:");
			$y5=$this->GetY();
			$this->cell(30,3,$_POST["numcue1"]);
			$this->ln(3);
			$this->SetX(10);
			$this->cell(20,3,"Concepto: ");
			$x=$this->GetX();
			$this->cell(60);
			$y1=$this->GetY();
			$this->ln(6);
			$this->setFont("Arial","B",7);
			$this->SetY($y1+5);
			$this->cell(20,3,"N° Orden Pago",0,0,'');
			$this->cell(10);
			$this->cell(55,3,"Beneficiario",0,0,'');
			$this->cell(7);
			$this->cell(20,3,"Tipo Orden",0,0,'');
			$this->cell(5);
			$this->cell(20,3,"Monto",0,0,'');
			$this->cell(5);
			$this->cell(25,3,"Pagado",0,0,'');
			$this->cell(20,3,"N° Ticket",0,0,'');
			$this->setFont("Arial","",7);
			$this->SetXY($x,$y1);
			$this->MultiCell(30,3,$_POST["concepto"]);
			$this->Line(10,$y1+9,200,$y1+9);
			$this->Line(10,42,200,42);
			$this->ln(8);
		}

		function Cuerpo()
		{

		    $tb=$this->bd->select($this->sql);
		    $tb2=$tb;
			$this->setFont("Arial","",7);
			$ncampos=count($this->titulos);

			if (!$tb2->EOF)
			$ref=$tb2->fields["fecent"];

			while(!$tb2->EOF)
			{
				if ($tb2->fields["fecent"]!=$ref)
				//if ($tb2->EOF)
				{
					$this->SetAutoPageBreak(false);
					$acum1=0;
					$cont=0;
					$this->setFont("Arial","B",8);
					$this->cell(25,3,"Subtotal del Día:");
					$this->cell(30,3,$tb6->fields["fecent"],0,0,'');
					$this->cell(10,3,"es:",1,0,'');
					$this->cell(30,3,"".number_format($this->acum1),0,0,'');
					$this->ln();
					$y7=$this->GetY();
					$this->Line(10,$y7+14,200,$y7+14);
					$this->ln(5);
					$this->SetXY(20,$y7+16);
					$this->cell(25,3,"Monto Total del:");
					$this->cell(30,3,$_POST["fecdis1"],0,0,'');
					$this->cell(10,3,"Al");
					$this->cell(30,3,$_POST["fecdis2"],0,0,'');
					$this->cell(10,3,"es:");
					$this->cell(30,3,"".number_format($this->acum2),0,0,'');
					$this->ln(6);
					$this->SetXY(20,$y7+23);
					$this->cell(35,3,"Total Ordenes Pagadas:");
					$this->cell(30,3,"".number_format($this->cont),0,0,'');
					$this->cell(20,3,"N° Orden Pago",0,0,'');
					$this->cell(10);
					$this->cell(55,3,"Beneficiario",0,0,'');
					$this->cell(7);
					$this->cell(20,3,"Tipo Orden",0,0,'');
					$this->cell(5);
					$this->cell(20,3,"Monto",0,0,'');
					$this->cell(5);
					$this->cell(25,3,"Pagado",0,0,'');
					$this->cell(20,3,"N° Ticket",0,0,'');
					$this->Line(10,42,200,42);
					$this->ln(8);
					$ref=$tb2->fields["fecent"];
				}
				//Detalle

					$this->SetX(10);
					$this->setFont("Arial","",8);
					$this->cell(30,3,$tb2->fields["numord"],0,0,'');
					$x1=$this->GetX();
					$this->cell(50);
					$this->cell(12,3,$tb2->fields["tipcau"],0,0,'');
					$y2=$this->GetY();
					$this->cell(25);
					$this->cell(25,3,$tb2->fields["monche"],0,0,'');
					$this->acum1=($this->acum1+$tb2->fields["monche"]);
					$this->acum2=($this->acum1+$tb2->fields["monche"]);
					$fecha=date("d/m/Y");
					$this->cell(25,3,$fecha,0,0,'');
					$this->cell(20);
					$this->SetX($x1);
					$this->MultiCell(50,3,$tb2->fields["nomben"],0,0,'');
					$this->ln(10);

					$this->sql1="SELECT coalese(COUNT(TIPCAU)) as CONTADOR
    						FROM CPCAUSAD WHERE REFCAU=RTRIM(A.NUMCHE)";
    				$tb3=$this->bd->select($this->sql1);

    				$this->sql2="SELECT A.NOMEXT as NOMBRE FROM CPDOCCAU A,CPCAUSAD B
       						WHERE A.TIPCAU=B.TIPCAU AND b.refcau=RTRIM(A.NUMCHE)";
       				$tb4=$this->bd->select($this->sql2);

       				$this->sql3="SELECT A.NOMEXT as NOMBRE FROM CPDOCCOM A,CPCOMPRO B WHERE A.TIPCOM=B.TIPCOM AND
             				 B.REFCOM=RTRIM(A.NUMCHE)";
             		$tb5=$this->bd->select($this->sql3);


    				if ($tb3->fields["contador"]> 0)
    				{
    					$this->SetXY(102,$y2);
						$this->cell(25,3,$tb4->fields["nombre"],0,0,'');
    				}
   					if ($tb3->fields["contador"]< 0)
   					{
   						$this->SetXY(102,$y2);
						$this->cell(25,3,$tb5->fields["nombre"],0,0,'');
   					}
      				else
  					{
   						$this->SetXY(102,$y2);
   						$tb4->fields["nombre"]= ' ';
						$this->cell(25,3,$tb4->fields["nombre"],0,0,'');
   					}

   					$this->sql4="SELECT A.NUMTIQ as TICKET
  							FROM OPORDPER A,OPCHEPER B
  							WHERE A.REFOPP=B.REFOPP AND B.NUMCHE=(A.NUMCHE)
  							AND B.CTABAN=(A.NUMCUE)";
  					$tb6=$this->bd->select($this->sql4);


					$this->SetXY(177,$y2);
					$this->cell(20,3,$tb6->fields["ticket"],0,0,'');
					if($tb2->fields["numche"]!='')
					{
						$this->cont=($this->cont1+1);
					}
					$y=$this->GetY();
					$this->SetAutoPageBreak(true);
					$tb->MoveNext();
					if ($y>=170)
					{
						$this->AddPage();
					}

		}

				$this->ln(3);
				$y4=$this->GetY();
				$this->Line(10,$y4+6,200,$y4+6);
				$this->SetXY(20,$y4+9);
				$this->setFont("Arial","B",8);
				$this->cell(25,3,"Subtotal del Día:");
				$this->cell(30,3,$tb6->fields["fecent"],0,0,'');
				$this->cell(10,3,"es:",0,0,'');
				$this->cell(30,3,"".number_format($this->acum1),0,0,'');
				$this->ln();
				$this->Line(10,$y4+14,200,$y4+14);
				$this->ln(5);
				$this->SetXY(20,$y4+16);
				$this->cell(25,3,"Monto Total del:");
				$this->cell(30,3,$_POST["fecdis1"],0,0,'');
				$this->cell(10,3,"Al");
				$this->cell(30,3,$_POST["fecdis2"],0,0,'');
				$this->cell(10,3,"es:");
				$this->cell(30,3,"".number_format($this->acum2),0,0,'');
				$this->ln(6);
				$this->SetXY(20,$y4+23);
				$this->cell(35,3,"Total Ordenes Pagadas:");
				$this->cell(30,3,"".number_format($this->cont),0,0,'');



		}


	}
?>