<?
	require_once("../../lib/general/fpdf/fpdf.php");
	require_once("../../lib/bd/basedatosAdo.php");
	require_once("../../lib/general/cabecera.php");

	class pdfreporte extends fpdf
	{
		var $bd;
		var $titulos;
		var $refcaudes;
		var $nombendes;
		var $nombenhas;
		var $contrato;
		var $concepto;
		var $agencia;
		var $administracion;
		var $ci_administracion;
		var $secretario;
		var $ci_secretario;
		var $contralor;
		var $ci_contralor;
		var $y;
		var $x;
		var $numcuedes;
		var $tipodes;
		var $tipohas;
		var $refdes;
		var $refhas;
		var $fecha_tra_des;
		var $fecha_tra_has;
		var $status;


		function pdfreporte()
		{
			$this->conf="l";
			$this->fpdf($this->conf,"mm","letter");
			$this->cab=new cabecera();
			$this->bd=new basedatosAdo();
			$this->nroorddes=trim($_POST["nroorddes"]);
			$this->nroordhas=trim($_POST["nroordhas"]);
			$this->bendes=trim($_POST["bendes"]);
			$this->benhas=trim($_POST["benhas"]);
			$this->fechades=trim($_POST["fechades"]);
			$this->fechahas=trim($_POST["fechahas"]);
			$this->cuentades=trim($_POST["cuentades"]);
			$this->cuentahas=trim($_POST["cuentahas"]);

			$this->sql="select 	a.reflib,
								a.numcue,
								a.deslib,
								to_char(a.feclib,'dd/mm/yyyy') as feclib,
								a.monmov,
								b.cedrif,
								c.nomben,
								d.nomcue
						from
							tsmovlib a,
							tscheemi b,
							opbenefi c,
							tsdefban d
						where
							a.reflib=b.numche and
							a.numcue=b.numcue and
							b.cedrif=c.cedrif and
							a.numcue=d.numcue and
							b.numche >= rpad('".$this->nroorddes."',20,' ') and
							b.numche <= rpad('".$this->nroordhas."',20,' ') and
							b.cedrif >= rpad('".$this->bendes."',15,' ') and
							b.cedrif <= rpad('".$this->benhas."',15,' ') and
							b.fecemi >= to_date('".$this->fechades."','dd/mm/yyyy') and
							b.fecemi <= to_date('".$this->fechahas."','dd/mm/yyyy') and
							a.numcue >= rpad('".$this->cuentades."',20,' ') and
							a.numcue <= rpad('".$this->cuentahas."',20,' ')
							order by d.nomcue, a.reflib";
		}



		function Header()
		{
			$dir = parse_url($_SERVER["HTTP_REFERER"]);
			$parte = explode("/",$dir["path"]);
			$ubica = count($parte)-2;
			$this->cab->poner_cabecera($this,$_POST["titulo"],$this->conf,"s",$parte[$ubica]);
			$this->setFont("Arial","",8);
			$this->SetXY(10,45);

			/*			$this->Line($this->GetX(),$this->GetY(),$this->GetX()+260,$this->GetY());//horizontal
			$this->Line($this->GetX(),$this->GetY()+10,$this->GetX()+260,$this->GetY()+10);//horizontal

			$this->Line($this->GetX(),$this->GetY()+15,$this->GetX()+260,$this->GetY()+15);//horizontal
			$this->Line($this->GetX(),$this->GetY()+20,$this->GetX()+260,$this->GetY()+20);//horizontal
			$this->Line($this->GetX(),$this->GetY()+150,$this->GetX()+260,$this->GetY()+150);//horizontal
			$this->SetXY(10,45);
			$this->Line($this->GetX(),$this->GetY(),$this->GetX(),$this->GetY()+150);//verical MARCO
			$this->Line($this->GetX()+20,$this->GetY()+10,$this->GetX()+20,$this->GetY()+150);
			$this->Line($this->GetX()+40,$this->GetY()+10,$this->GetX()+40,$this->GetY()+150);
			$this->Line($this->GetX()+60,$this->GetY()+10,$this->GetX()+60,$this->GetY()+150);
			$this->Line($this->GetX()+70,$this->GetY()+10,$this->GetX()+70,$this->GetY()+150);
			$this->Line($this->GetX()+90,$this->GetY()+10,$this->GetX()+90,$this->GetY()+150);
			$this->Line($this->GetX()+185,$this->GetY()+10,$this->GetX()+185,$this->GetY()+150);
			$this->Line($this->GetX()+210,$this->GetY()+10,$this->GetX()+210,$this->GetY()+150);
			$this->Line($this->GetX()+235,$this->GetY()+10,$this->GetX()+235,$this->GetY()+150);
			$this->Line($this->GetX()+260,$this->GetY(),$this->GetX()+260,$this->GetY()+150);//verical MARCO
			$this->SetXY(10,55);
			//$this->cell(5,5,"      Correl               Emision          Registrado        Tipo      Referencia        Beneficiario Cheque/Origen Deposito                                                                   Debitos                   Creditos                    Saldo");
			$this->SetXY(10,70);*/


		}

		function Cuerpo()
		{

			$tb=$this->bd->select($this->sql);
			$this->tb2=$tb;
			$this->setFont("Arial","",8);
			$this->SetXY(10,40);
			$this->cell(5,5,"Del: ".$this->fechades." Hasta: ".$this->fechahas);
			$this->SetXY(10,50);
			$this->Line(10,45,$this->GetX()+250,45);
			$this->cell(5,5,"Cuenta: ".$tb->fields["numcue"]);
			$this->SetXY(70,50);
			$this->cell(5,5,"Banco: ".$tb->fields["nomcue"]);
			$this->SetXY(10,55);
			$this->cell(20,5,"Nro.Oficio",1,0,'C');
			$this->SetXY(30,55);
			$this->cell(45,5,"Beneficiario",1,0,'C');
			$this->SetXY(75,55);
			$this->cell(15,5,"N.Ticket",1,0,'C');
			$this->SetXY(90,55);
			$this->cell(25,5,"Monto",1,0,'C');
			$this->SetXY(115,55);
			$this->cell(20,5,"Fecha Emision",1,0,'C');
			$this->SetXY(135,55);
			$this->cell(95,5,"Concepto",1,0,'C');
			$this->SetXY(230,55);
			$this->cell(30,5,"Concepto",1,0,'C');
			$this->setFont("Arial","",7);
			$this->numero =   $tb->fields["numcue"];
			$yy=$this->GetY()+5;
			$this->totalbanco=0;
			$this->totalgral=0;
			while (!$tb->EOF)
			{



 			if ($tb->fields["numcue"]!=$this->numero){
			$this->SetXY(70,$this->GetY()+10);
			$this->cell(17,5,"TOTAL POR BANCO:",0,0,'R');
			$this->SetXY(90,$this->GetY());
			$this->cell(25,5,number_format($this->totalbanco,2,',','.'),0,0,'R');
			$this->Line(60,$this->GetY(),$this->GetX()+15,$this->GetY());
			$this->totalbanco=0;
			$this->Ln(8);
			$this->Line(10,$this->GetY()+5,260,$this->GetY()+5);
 							$this->SetXY(10,$this->GetY()+10);
							$this->cell(5,5,"Cuenta: ".$tb->fields["numcue"]);
							$this->SetXY(70,$this->GetY());
							$this->cell(5,5,"Banco: ".$tb->fields["nomcue"]);
								$this->SetXY(10,$this->GetY()+5);
			$this->cell(20,5,"Nro.Oficio",1,0,'C');
			$this->SetXY(30,$this->GetY());
			$this->cell(45,5,"Beneficiario",1,0,'C');
			$this->SetXY(75,$this->GetY());
			$this->cell(15,5,"N.Ticket",1,0,'C');
			$this->SetXY(90,$this->GetY());
			$this->cell(25,5,"Monto",1,0,'C');
			$this->SetXY(115,$this->GetY());
			$this->cell(20,5,"Fecha Emision",1,0,'C');
			$this->SetXY(135,$this->GetY());
			$this->cell(95,5,"Concepto",1,0,'C');
			$this->SetXY(230,$this->GetY());
			$this->cell(30,5,"Concepto",1,0,'C');
			$yy=$this->GetY()+5;


 			}


			$this->sql2="select b.numtiq
     					from cppagos a,
          					 opordpag b
    					where b.numord=a.refcau	and
          				a.refpag='".trim($tb->fields["reflib"])."'";
			$tb2=$this->bd->select($this->sql2);
				//	print $this->sql2;
			//	exit;


					$this->sql3="select case when b.status='C' then 'Contraloria'
									when b.status='N' then 'Pendiente por pagar'
									when b.status='I' then 'Pagada'
									when b.status='A' then 'Anulada' end as valor
     							from cppagos a,
          							opordpag b
    							where b.numord=a.refcau	and
          							a.refpag=rtrim('".$tb->fields["reflib"]."')";
					$tb3=$this->bd->select($this->sql3);


					$this->SetAutoPageBreak(false);
					$this->SetXY(10,$yy);
					$this->cell(20,5,$tb->fields["reflib"]);
					$this->SetXY(30,$yy);
					$this->Multicell(45,4,trim($tb->fields["nomben"]));
					$this->SetXY(75,$yy);
						$y3=$this->GetY();
					$this->cell(15,5,trim($tb2->fields["numtiq"]));
					$this->SetXY(90,$yy);
					$this->cell(25,5,number_format($tb->fields["monmov"],2,'.',','),0,0,'R');
					$this->SetXY(115,$yy);
					$this->cell(10,5,trim($tb->fields["feclib"]));
					$this->SetXY(135,$yy);
					$this->MultiCell(90,4,trim($tb->fields["deslib"]));
					$y2=$this->GetY();
					$this->SetXY(230,$yy);
					$this->cell(10,5,trim($tb3->fields["valor"]));
					$this->SetXY(245,$yy);
					$this->SetAutoPageBreak(true);
					$this->Line(10,$yy,$this->GetX()+15,$yy);//horizontal*/

$this->numero =   $tb->fields["numcue"];
$this->totalbanco= $this->totalbanco + $tb->fields["monmov"];
$this->totalgral= $this->totalgral + $tb->fields["monmov"];

			$tb->MoveNext();
			if($y3>$y2)
				$this->SetY($y3);
				else $this->SetY($y2);


			$yy=$this->GetY()+5;
			if ($yy>=170)
				{ $yy=45;
					$this->AddPage();}

			}//ciclo
					$this->SetXY(70,$this->GetY()+5);

			$this->cell(17,5,"TOTAL POR BANCO:",0,0,'R');
			$this->SetXY(90,$this->GetY());
			$this->cell(25,5,number_format($this->totalbanco,2,',','.'),0,0,'R');
			$this->Line(60,$this->GetY(),$this->GetX()+15,$this->GetY());
			$this->setFont("Arial","B",7);
					$this->SetXY(70,$this->GetY()+10);
					$this->cell(10,5,"TOTAL: ",0,0,'R');
					$this->SetXY(100,$this->GetY());
					$this->cell(20,5,number_format($this->totalgral,2,',','.'),0,0,'R',0);
					$this->Line(60,$this->GetY(),$this->GetX()+12,$this->GetY());


			///////////////////////*/
		}
	}



?>